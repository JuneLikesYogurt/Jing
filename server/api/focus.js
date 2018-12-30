var express = require('express');
var router = express.Router();
var mysql = require('mysql');

var db = require('../config/db');
var sqlMap = require('../config/sqlMap');

var conn = mysql.createConnection(db.mysql);
conn.connect();

router.post('/setTime', function (req, res) {
    var param = req.body;
    let info = [param.uid, param.time];
    // res.send(info);

    conn.query(sqlMap.setTime, info, function (err, results) {
        if (err) throw err
        else {
            //res.send(results);

            //如果设置时间成功，查询返回  did
            let info = results.insertId;
            conn.query(sqlMap.findData, info,function(err, results) {
                if (err) throw err
                else {
                    //res.send(results);
                    res.end(JSON.stringify({
                        status: '1',
                        msg: '设置成功',
                        data: {
                            did: results[0].did,
                            uid: results[0].uid,
                            time: results[0].time
                        }
                    }))
                }
            })
        }
    })
}),

router.post('/success', function (req, res) {
    var param = req.body;
    /*！！！注意顺序，updat的sql语句中，flag在前面 */
    let info = [param.flag, param.did,];
    //res.send(info);

    conn.query(sqlMap.success, info, function (err, results) {
        if (err) throw err
        else {
            // res.send(results);

            //如果设置时间成功，查询返回  uid
            let info = param.did;
            conn.query(sqlMap.findData, info, function(err, results) {
                if (err) throw err
                else {
                    // res.send(results);
                    res.end(JSON.stringify({
                        status: '1',
                        msg: '专注成功',
                        data: {
                            did: results[0].did,
                            uid: results[0].uid,
                            time: results[0].time
                        }
                    }))
                }
            })
        }
    })
})

module.exports = router;