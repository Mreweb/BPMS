// French translation provided courtesy of GitHub user tuxfamily.
// (C) 2022 CubicleSoft.  All Rights Reserved.

if (!$.fn.FancyFileUpload.langs) $.fn.FancyFileUpload.langs = {};

$.fn.FancyFileUpload.langs["fa"] = {
  "Start uploading": "شروع آپلود",

  "Starting upload...": "در حال آپلود...",

  "Upload completed": "آپلود با موفقیت انجام شد",

  "There is a file upload still in progress.  Leaving the page will cancel the upload.\n\nAre you sure you want to leave this page?":
    "هنوز یک فایل در حال آپلود است، خروج از صفحه باعث لغو شدن این آپلود میشود .\n\n برای خروج از صفحه اطمینان دارید؟",

  "There is a file that was added to the queue but the upload has not been started.  Leaving the page will clear the queue and not upload the file.\n\nAre you sure you want to leave this page?":
    "یک فایل به صف آپلود اضافه شده است ولی هنوز آپلود آن شروع نشده است. در صورتی که از صفحه خارج شوید صف آپلود فایلها حذف خواهد شد. \n\n برای خروج از این صفحه اطمینان دارید؟",

  "Cancel upload and remove from list": "لغو آپلود و حذف از لیست",

  "This file is currently being uploaded.\n\nStop the upload and remove the file from the list?":
    "این فایل آپلود شده است.\n\n قطع آپلود و حذف فایل از لیست ؟",

  "This file is waiting to start.\n\nCancel the operation and remove the file from the list?":
    "این فایل در انتظار شروع برای آپلود است.\n\nلغو و حذف  این فایل از لیست آپلود ؟ ",

  Preview: "پیش نمایش",

  "No preview available": "پیش نمایش در دسترس نیست",

  "Invalid file extension.": "پسوند فایل انتخابی نامعتبر است.",

  "File is too large.  Maximum file size is {0}.":
    "حجم فایل بیش از اندازه مجاز ، حداکثر حجم قابل قبول :  {0}.",

  "Remove from list": "حذف از لیست",

  "{0} of {1} | {2}%": "{0} از {1} | {2}%",

  "{0} | Network error, retrying in a moment... ({1})":
    "{0} | خطای شبکه ، چند لحظه دیگر دوباره تلاش میشود... ({1})",

  "The upload was cancelled.": "آپلود لغو شد.",

  "The upload failed.  {0} ({1})": "آپلود با شکست مواجه شد.  {0} ({1})",

  "The upload failed.": "آپلود موفقیت آمیز نبود.",

  "The server indicated that the upload was not successful.  No additional information available.":
    "اطلاعات سرور نشان میدهد آپلود موفقیت آمیز نبود است. اطلاعات بیشتری در دسترس نیست.",

  "Browse, drag-and-drop, or paste files to upload":
    "برای آپلود فایلها را انتخاب کنید یا آنها را اینجا بکشید و رها کنید.",

  "Record audio using a microphone": "ضبط صدا با استفاده از میکروفن",

  "Audio recording - {0}.mp3": "در حال ضبط صدا - {0}.mp3",

  "Unable to record audio.  Either a microphone was not found or access was denied.":
    "خطا در ضبط صدا ، خطای دسترسی یا عدم وجود میکروفن.",

  "Record video using a camera": "ضبط ویدیو با استفاده از دوربین",

  "Video recording - {0}.mp4": "در حال ضبط ویدیو - {0}.mp4",

  "Unable to record video.  Either a camera was not found or access was denied.":
    "خطا در ضبط ویدیو ، خطای دسترسی به دوربین یا عدم وجود دوربین",
};

$.fn.FancyFileUpload.defaults.langmap = $.fn.FancyFileUpload.langs["fa"];
