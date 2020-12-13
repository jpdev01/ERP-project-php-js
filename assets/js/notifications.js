$(document).ready(function () {
    var notice = Cookies.get("notification");
    if (notice != "null") {
        newNotification();
    }
});