//import { generateSymbol, parseFullSymbol } from "./helpers.js";
//import { subscribeOnStream, unsubscribeFromStream } from "./streaming.js";

function generateSymbol(exchange, fromSymbol, toSymbol) {
  const short = `${fromSymbol}/${toSymbol}`;
  return {
    short,
    full: `${exchange}:${short}`,
  };
}
function parseFullSymbol(fullSymbol) {
  const match = fullSymbol.match(/^(\w+):(\w+)\/(\w+)$/);
  if (!match) {
    return null;
  }
  return { exchange: match[1], fromSymbol: match[2], toSymbol: match[3] };
}
let DataType = 1;
let SymbolName = "";
async function makeApiRequest(path) {
  try {
    // const response = await fetch(`http://192.168.90.32/${path}`);
    let response;
    if (DataType === 1) {
      // response = await fetch(`http://localhost:90/${path}`);
      response = await fetch('http://localhost:8080/PSACompany/Admin/Dashboard/Charting/history');
    } else {
      response = await fetch('http://localhost:8080/PSACompany/Admin/Dashboard/Charting/history');
    }

    return response.json();
  } catch (error) {
    throw new Error(`CryptoCompare request error: ${error.status}`);
  }
}
// DatafeedConfiguration implementation
const configurationData = {
  // Represents the resolutions for bars supported by your datafeed
  supported_resolutions: ["15", "30", "1D", "1W", "1M"],
  // The `exchanges` arguments are used for the `searchSymbols` method if a user selects the exchange
  exchanges: [
    { value: "Boorse", name: "Boorse", desc: "Boorse" },
    // { value: 'Kraken', name: 'Kraken', desc: 'Kraken bitcoin exchange'},
  ],
  // The `symbols_types` arguments are used for the `searchSymbols` method if a user selects this symbol type
  symbols_types: [{ name: "بورس", value: "بورس" }],
};

// Use it to keep a record of the most recent bar on the chart
const lastBarsCache = new Map();

// Obtains all symbols for all exchanges supported by CryptoCompare API
async function getAllSymbols() {
  let data;
  if (!data) {
    data = await makeApiRequest("data/v3/all/exchanges");
  }
  let allSymbols = [];
  // console.log(data);
  for (const exchange of configurationData.exchanges) {
    const pairs = data.Data[exchange.value].pairs;
    for (const leftPairPart of Object.keys(pairs)) {
      const symbols = pairs[leftPairPart].map((rightPairPart) => {
        const symbol = generateSymbol(
          exchange.value,
          leftPairPart,
          rightPairPart
        );
        return {
          symbol: symbol.short,
          full_name: symbol.full,
          description: symbol.short,
          exchange: exchange.value,
          type: configurationData.symbols_types[0].name,
          id: data.Data[exchange.value].ids[leftPairPart], // Accessing the corresponding id
        };
      });
      allSymbols = [...allSymbols, ...symbols];
    }
  }

  return allSymbols;
}

export default {
  onReady: (callback) => {
    console.log("[onReady]: Method call");
    setTimeout(() => callback(configurationData));
  },
  setDatafeedUrl: async (e) => {
    DataType = e;
  },
  searchSymbols: async ( userInput,  exchange,  symbolType,  onResultReadyCallback ) => {
    console.log("[searchSymbols]: Method call");
    const symbols = await getAllSymbols();
    const newSymbols = symbols.filter((symbol) => {
      const isExchangeValid = exchange === "" || symbol.exchange === exchange;
      const isFullSymbolContainsInput =
        symbol.full_name.toLowerCase().indexOf(userInput.toLowerCase()) !== -1;
      return isExchangeValid && isFullSymbolContainsInput;
    });
    onResultReadyCallback(newSymbols);
  },
  resolveSymbol: async ( symbolName,  onSymbolResolvedCallback,  onResolveErrorCallback,  extension) => {
    console.log("[resolveSymbol]: Method call", symbolName);
    const symbols = await getAllSymbols();
    const symbolItem = symbols.find(
      ({ full_name }) => full_name === symbolName
    );

    if (!symbolItem) {
      console.log("[resolveSymbol]: Cannot resolve symbol", symbolName);
      onResolveErrorCallback("Cannot resolve symbol");
      return;
    }
    // Symbol information object
    const symbolInfo = {
      ticker: symbolItem.full_name,
      name: symbolItem.symbol,
      id: symbolItem.id,
      description: symbolItem.description,
      type: symbolItem.type,
      session: "24x7",
      timezone: "Etc/UTC",
      exchange: symbolItem.exchange,
      minmov: 1,
      pricescale: 100,
      has_intraday: true,
      visible_plots_set: "ohlcv",
      has_weekly_and_monthly: false,
      has_empty_bars: false,
      supported_resolutions: configurationData.supported_resolutions,
      volume_precision: 2,
      data_status: "streaming",
    };
    console.log("[resolveSymbol]: Symbol resolved", symbolName);
    onSymbolResolvedCallback(symbolInfo);
  },
  getBars: async ( symbolInfo,  resolution,  periodParams,  onHistoryCallback,  onErrorCallback) => {
    SymbolName = symbolInfo.full_name;
    console.log(resolution)
    try {
      const data = await makeApiRequest(
        `data/histoday?type=${resolution}&name=${symbolInfo.name}&id=${symbolInfo.id}`
      );
  
      let bars = data.Data.map((bar) => ({
        time: bar.time * 1000,
        low: bar.Low,
        high: bar.High,
        open: bar.Open,
        close: bar.Close,
      }));
  
      // ذخیره آخرین بار در کش برای استفاده در داده‌های لحظه‌ای
      if (periodParams.firstDataRequest) {
        lastBarsCache.set(`${symbolInfo.exchange}:${symbolInfo.name}`, {
          ...bars[bars.length - 1],
        });
      }
  
      // تمامی داده‌ها را به callback ارسال می‌کنیم
      onHistoryCallback(bars, { noData: false });
    } catch (error) {
      console.log("[getBars]: Get error", error);
      onErrorCallback(error);
    }
  },
  CurrentSymbol: () => {
    return SymbolName;
  },
  subscribeBars: ( symbolInfo,  resolution,  onRealtimeCallback, subscriberUID,  onResetCacheNeededCallback ) => {
    console.log(
      "[subscribeBars]: Method call with subscriberUID:",
      subscriberUID
    );
    subscribeOnStream(
      symbolInfo,
      resolution,
      onRealtimeCallback,
      subscriberUID,
      onResetCacheNeededCallback,
      lastBarsCache.get(`${symbolInfo.exchange}:${symbolInfo.name}`)
    );
  },
  unsubscribeBars: (subscriberUID) => {
    console.log(
      "[unsubscribeBars]: Method call with subscriberUID:",
      subscriberUID
    );
    unsubscribeFromStream(subscriberUID);
  },
}
