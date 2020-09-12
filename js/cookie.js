function setCookie(key, value, day, path = "/") {
    if (day) {
        // 存7天
        var date = new Date();
        date.setDate(date.getDate() + day);

        document.cookie = key + "=" + encodeURIComponent(value) + ";expires=" + date.toUTCString() + ";path=" + path;
    } else {
        document.cookie = key + "=" + encodeURIComponent(value) + ";path=" + path;
    }
}


// 简化
function getCookie(key) {
    var cookie = document.cookie;
    if (cookie) {
        var dataList = cookie.split("; ");
        for (var i = 0; i < dataList.length; i++) {
            var data = dataList[i];
            var name = data.split("=")[0];
            var val = data.split("=")[1];

            // 循环过程中判断  如果name是我们要查找的键名(key) 直接返回
            if (key == name) {
                return decodeURIComponent(val);
            }
        }

    }
    return "";

}