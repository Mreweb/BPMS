import { parseFullSymbol } from "./helpers.js";
import { PiXLight } from "react-icons/pi";
let socket = new WebSocket("ws://localhost:8080");
const channelToSubscription = new Map();

socket.addEventListener("open", () => {
  console.log("[socket] Connected");
});

socket.addEventListener("close", (event) => {
  console.log("[socket] Disconnected:", event.reason);
});

socket.addEventListener("error", (error) => {
  console.log("[socket] Error:", error);
});

socket.addEventListener("message", (event) => {
  console.log("data", JSON.parse(event.data));
  const data = JSON.parse(event.data);
  console.log("[socket] Message:", data);
//   const [
//     eventTypeStr,
//     exchange,
//     fromSymbol,
//     toSymbol,
//     tradeTimeStr,
//     tradePriceStr,
//   ] = data.split("~");

  const tradePriceStr = data.price;
  const tradeTimeStr = data.time;

//   if (parseInt(eventTypeStr) !== 0) {
//     // Skip all non-trading events
//     return;
//   }
  const tradePrice = tradePriceStr;
  const tradeTime = tradeTimeStr;
  const channelString = `${data.name}`;
  const subscriptionItem = channelToSubscription.get(channelString);
  if (subscriptionItem === undefined) {
    return;
  }
  const lastDailyBar = subscriptionItem.lastDailyBar;
  const nextDailyBarTime = getNextDailyBarTime(lastDailyBar.time);

  let bar;
  if (tradeTime >= nextDailyBarTime) {
    bar = {
      time: nextDailyBarTime,
      open: tradePrice,
      high: tradePrice,
      low: tradePrice,
      close: tradePrice,
    };

    console.log("[socket] Generate new bar", bar);
  } else {
    bar = {
      ...lastDailyBar,
      high: Math.max(lastDailyBar.high, tradePrice),
      low: Math.min(lastDailyBar.low, tradePrice),
      close: tradePrice,
    };
    console.log("[socket] Update the latest bar by price", tradePrice);
  }
  subscriptionItem.lastDailyBar = bar;

  // Send data to every subscriber of that symbol
  subscriptionItem.handlers.forEach((handler) => handler.callback(bar));
});

function getNextDailyBarTime(barTime) {
  const date = new Date(barTime * 1000);
  date.setDate(date.getDate() + 1);
  return date.getTime() / 1000;
}

export function subscribeOnStream(
  symbolInfo,
  resolution,
  onRealtimeCallback,
  subscriberUID,
  onResetCacheNeededCallback,
  lastDailyBar
) {
  const exchange = symbolInfo.base_name;
  const symName = symbolInfo.name;
  const symTo = symbolInfo.toSymbol;
  const symFrom = symbolInfo.fromSymbol;
  const parsedSymbol = parseFullSymbol(`${exchange}:${symName}`);
  const channelString = `${symbolInfo.name.split("/")[0]}`;

  const handler = {
    id: subscriberUID,
    callback: onRealtimeCallback,
  };
  let subscriptionItem = channelToSubscription.get(channelString);
  if (subscriptionItem) {
    // Already subscribed to the channel, use the existing subscription
    subscriptionItem.handlers.push(handler);
    return;
  }
  subscriptionItem = {
    subscriberUID,
    resolution,
    lastDailyBar,
    handlers: [handler],
  };
  channelToSubscription.set(channelString, subscriptionItem);
  console.log(
    "[subscribeBars]: Subscribe to streaming. Channel:",
    channelString
  );
  socket.send(JSON.stringify({ action: "SubAdd", subs: [channelString] }));
}

export function unsubscribeFromStream(subscriberUID) {
  // Find a subscription with id === subscriberUID
  for (const channelString of channelToSubscription.keys()) {
    const subscriptionItem = channelToSubscription.get(channelString);
    const handlerIndex = subscriptionItem.handlers.findIndex(
      (handler) => handler.id === subscriberUID
    );

    if (handlerIndex !== -1) {
      // Remove from handlers
      subscriptionItem.handlers.splice(handlerIndex, 1);

      if (subscriptionItem.handlers.length === 0) {
        socket.send(
          JSON.stringify({ action: "SubRemove", subs: [channelString] })
        );
        channelToSubscription.delete(channelString);
      }
    }
  }
}
