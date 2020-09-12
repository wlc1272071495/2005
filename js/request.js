// 使用前提
// 1. 实际参数 一一对应
// 2. params  必须是对象数据
// 3. 接口返回数据必须是json类型的字符串


// 引入前提 
// 先引入ajax.js
// 在引入request.js

// ajax进行二次封装
function requeset(url, params = {}, type = "get") {
    return new Promise(function (resolve, reject) {
        $.ajax({
            type: type,
            url: url,
            data: {
                ...params
            },
            dataType: "json",
            success(result) {
                resolve(result);  // 无论后端返回什么结果直接返回  {status:true/false}
            }
        })
    })
}

// 注册接口请求
// function register(params) {
//     return requeset("http://192.168.59.157/2005/demo_27/php/register.php", params, "post");
//     // return p;
// }

// 登录
// function login(params) {
//     return requeset("http://192.168.59.157/2005/demo_27/php/login.php", params, "post")
// }

// 改为箭头函数
const register = params => requeset("../php/register.php", params, "post");

const login = params => requeset("../php/login.php", params, "post");

const searchGoods = params => requeset("../php/searchGoodsList.php", params);

const searchGoodsListByGoodsId = params => requeset("../php/searchGoodsListByGoodsId.php", params);


const addToShoppingCar = params => requeset("../php/addToShoppingCar.php", params, "post");
const searchUserGoodsByUser = params => requeset("../php/searchUserGoodsByUser.php", params, "post");



