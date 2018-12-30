var express = require('express');
var router = express.Router();
var mysql = require('mysql');

var db = require('../config/db');
var sqlMap = require('../config/sqlMap');

var conn = mysql.createConnection(db.mysql);
conn.connect();

router.post('/', function(req, res) {
    var param = req.body;
    let info = [param.uid];

    conn.query(sqlMap.accountName, info, function(err, results) {
        if(err) throw err
        else {
            // res.send(results);
            let user = results[0].name;
            conn.query(sqlMap.accountTime, info, function(err, results) {
                if (err) throw err
                else {
                    res.end(JSON.stringify({
                        status: '1',
                        msg: '用户信息获取成功',
                        data: {
                            name: user,
                            time: results[0].total
                        }
                    }))
                }
            })
        }
    })
})

module.exports = router;