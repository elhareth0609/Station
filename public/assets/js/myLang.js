const lang = document.querySelector('meta[name="lang"]').getAttribute('content');

var translations = {
"en": {
    "No data available in table": "No data available in table",
    "No matching records found": "No matching records found",
    "to" : "to",
    "from" : "from",
    "Submit" : "Submit",
    "Cancel" : "Cancel",
    "Ok" : "Ok",
    "Do you really want to delete this Item?" : "Do you really want to delete this Item?",
    "Do you really want to Restore this Item?" : "Do you really want to Restore this Item?",
    "No Plan Selected" : "No Plan Selected",
    "Please select a plan before proceeding." : "Please select a plan before proceeding.",
    "Drag and drop files here or click to upload" : "Drag and drop files here or click to upload",
    "month" : "month",
    "today" : "today",
    "week" : "week",
    "day" : "day",
    "Add Event" : "Add Event",
    "Do you really want to delete this Photo?" : "Do you really want to delete this Photo?",
    "Successfully copied the URL!" : "Successfully copied the URL!",
    "Copy" : "Copy",
    "Just Now" : "Just Now",
    "Error" : "Error"


},
"ar": {
    "No data available in table": "لا تتوفر بيانات في الجدول",
    "No matching records found": "لم يتم العثور على سجلات مطابقة",
    "to" : "من",
    "from" : "إلى",
    "Submit" : "موافق",
    "Cancel" : "إلغاء",
    "Ok" : "حسنا",
    "Do you really want to delete this Item?" : "هل ترغب حقًا في حذف هذا العنصر؟",
    "Do you really want to Restore this Item?" : "هل ترغب حقًا في استعادة هذا العنصر؟",
    "No Plan Selected" : "لم يتم اختيار أي خطة",
    "Please select a plan before proceeding." : "يرجى اختيار خطة قبل المتابعة",
    "Drag and drop files here or click to upload" : "اسحب وأفلت الملفات هنا أو انقر للتحميل أو إضغط للرفع",
    "month" : "شهر",
    "today" : "اليوم",
    "week" : "أسبوع",
    "day" : "يوم",
    "Add Event" : "إضافة حدث",
    "Do you really want to delete this Photo?" : "هل ترغب حقًا في حذف هذه الصورة",
    "Successfully copied the URL!" : "تم نسخ الرابط بنجاح",
    "Copy" : "نسخ",
    "Just Now" : "الأن",
    "Error" : "خطأ"

}
};


function __(key) {
    if (translations.hasOwnProperty(lang) && translations[lang].hasOwnProperty(key)) {
        return translations[lang][key];
    } else {
        return key;
    }
}