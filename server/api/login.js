var express = require('express');
var router = express.Router();
var mysql = require('mysql');

var db = require('../config/db');
var sqlMap = require('../config/sqlMap');

var conn = mysql.createConnection(db.mysql);
conn.connect();

router.post('/', function(req, res) {
    var param = req.body;
    let info = [param.username, param.password];
    conn.query(sqlMap.login, info, function (err, results) {
        if (err) throw err
        else {
            if (results.length == 0) {
                res.end(JSON.stringify({
                    status: '0',
                    msg: '用户名或密码错误'
                }));
            } else {
                if(results[0].username == param.username && results[0].password == param.password) {
                    res.end(JSON.stringify({
                        status: '1',
                        msg: '登录成功！',
                        data: {
                            uid: results[0].uid
                        }
                    }));
                }
            }
        }
    })
})

module.exports = router;