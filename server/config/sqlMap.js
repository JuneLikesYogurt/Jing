var sqlMap = {
    //register模块
    addUser:  'insert into user(username, name, password) values (?, ?, ?)',
    getUserByUserName: 'select * from user where username =?',

    //login模块        
    login: 'select * from user where username = ? AND password = ?',
    // loginInfo: 'select uid from user where username = ?'

    //设置专注时间
    setTime: 'insert into data(uid, time) value (?, ?)',
    //查询data id
    findData: 'select * from data where did = ?',

    //专注成功，修改flag
    success: 'update data set flag = ? where did = ?',

    //account模块
    accountTime: 'select sum(time) as total from data where uid = ? AND flag = "1" ',
    accountName: 'select name from user where uid =?'
}

module.exports = sqlMap;