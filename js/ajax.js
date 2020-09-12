var $ = {
    ajax: function (options) {   //要求传入一个对象
        // var success =function (res) {
        //     document.write("用户名" + res.user)
        // }

        // type == undefined ? "get":type
        var { type = "get", url, data = "", async = true, dataType = "text", success } = options;


        var xhr = new XMLHttpRequest();

        // 判断 data数据的类型  如果是对象类型 遍历对象拼接为对应的字符串
        if (data instanceof Object) {  //true  => 对象类型
            var dataStr = "";
            for (var key in data) {
                // console.log(key, data[key]);
                dataStr += key + "=" + data[key] + "&";
            }
            data = dataStr.substring(0, dataStr.length - 1);
            // console.log(data);
        }

        if (type == "get") {
            // get
            xhr.open("get", url + "?" + data, async);

            xhr.send();

        } else if (type == "post") {
            // post
            xhr.open("post", url, async);

            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            xhr.send(data);
        }


        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {

                var result = xhr.responseText;
                if (dataType == "json") { // JSON.parse()之后赋值原来的变量
                    result = JSON.parse(result);
                }
                // console.log(result);    //服务器返回的响应数据

                // 请求成功时如果存在回调函数  则执行回调函数
                if (success) {
                    success(result);  // 把 result当成 函数调用 的实际参数
                }

            }
        }
    }
}