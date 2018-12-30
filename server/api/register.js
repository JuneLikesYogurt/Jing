var express = require('express');
var router = express.Router();
var mysql = require('mysql');

var db = require('../config/db');
var sqlMap = require('../config/sqlMap');

var conn = mysql.createConnection(db.mysql);
conn.connect();

router.post('/', function (req, res) {
    var param = req.body;
    // res.send(param);
    conn.query(sqlMap.getUserByUserName, [param.username], function (err, results) {
        if (err) throw err
        else {
            //res.send(results);
            if (results.length == 0) {
                // res.send("aaa");
                let info = [param.username, param.name, param.password];
                conn.query(sqlMap.addUser, info, function (err, results) {
                    if (err) throw err
                    else {
                        res.end(JSON.stringify({
                            status: '1',
                            msg: '注册成功！'
                        }))
                    }
                })
            } else {
                res.end(JSON.stringify({
                    status: '0',
                    msg: '用户名已存在'
                }))
            }
        }
    })
});

router.get('/test', function(req, res, next){
    res.send('aaa');
})

module.exports = router;