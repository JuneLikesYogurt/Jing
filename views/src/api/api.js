// const baseURL = "http://172.16.8.112:8080"

// export const Login = params => { return axios.post('/login', params).then(res =>res.data)}

import axios from 'axios'
import qs from 'qs'

axios.defaults.timeout = 5000
//给后台传数据的格式
axios.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded'
// axios.defaults.headers.post['Content-Type'] = 'application/json'
axios.defaults.params = {}
axios.defaults.withCredentials = true

// 添加请求拦截器
axios.interceptors.request.use(function (config) {
    return config;
  }, function (error) {
    // 对请求错误做些什么
    return Promise.reject(error);
  });

// 添加响应拦截器
axios.interceptors.response.use(function (response) {
    // 对响应数据做点什么
    return response;
  }, function (error) {
    // 对响应错误做点什么
    return Promise.reject(error);
  });


  //封装获取数据
export const oGet = (url, params) => {
    return new Promise((resolve, reject) => {
        axios.get(url, params)
            .then(res => {
                resolve(res.data)
            }, err => {
                reject(err)
            }).catch(err => {
                reject(err)
            })
    })
};
//封装发送数据
export const oPost = (url, params) => {
    return new Promise((resolve, reject) => {
        axios.post(url, params)
            .then(res => {
                resolve(res.data)
            }, err => {
                reject(err)
            }).catch(err => {
                reject(err)
            })
    })
}
//封装修改数据
export const oUpdate = (url ,param,params) => {
    return new Promise((resolve , reject) => {
        axios.patch(url ,param, params)
            .then(res => {
                resolve(res.data)
            }, err => {
                reject(err)
            }).catch(err => {
                reject(err)
            })
    })
}
//封装删除数据
export const oRemove = (url , params) => {
    return new Promise((resolve,reject) => {
        axios.delete(url,params)
            .then(res => {
                resolve(res.data)
            },err => {
                reject(err)
            }).catch(err => {
                reject(err)
            })
    })
}

export default {
    //注册
    register(params) {
        return oPost('http://127.0.0.1:3000/api/register', params)
    },

    //登录
    login(params) {
        return oPost('http://127.0.0.1:3000/api/login', params)
    },

    //设置专注时间
    setTime(params) {
        return oPost('http://127.0.0.1:3000/api/focus/setTime', params)
    },

    //专注成功
    success(params) {
        return oPost('http://127.0.0.1:3000/api/focus/success', params)
    },

    //account信息
    accountMsg(params) {
        return oPost('http://127.0.0.1:3000/api/account', params)
    }
}
