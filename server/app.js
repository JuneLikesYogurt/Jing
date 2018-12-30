var createError = require('http-errors');
var express = require('express');
var path = require('path');
var cookieParser = require('cookie-parser');
var bodyParser = require('body-parser');
var logger = require('morgan');

//路由
var indexRouter = require('./routes/index');
var usersRouter = require('./routes/users');
var regApi = require('./api/register');
var loginApi = require('./api/login');
var focusApi = require('./api/focus');
var accountApi = require('./api/account');

var app = express();

// view engine setup
app.set('views', path.join(__dirname, 'views'));
app.set('view engine', 'jade');


//跨域
app.use('*', function(req, res, next) {
	res.header("Access-Control-Allow-Origin", "http://localhost:8080");
	res.header('Access-Control-Allow-Credentials','true');
	/** 当前端设置withCredentials = true(使每个请求带上session信息)，
	 * 后台origin必须制定具体域名，同时Credentials=true */
    // res.header("Access-Control-Allow-Origin", "*");
    res.header("Access-Control-Allow-Headers", "Content-Type" );
    res.header("Access-Control-Allow-Methods","PUT,POST,GET,DELETE,OPTIONS");
	res.header("X-Powered-By",' 3.2.1')
	//设置utf-8,防止后台发回给前端的中文字符乱码
	res.header("Content-Type",'application/x-www-form-urlencoded; charset=UTF-8');
    next();
});

app.use(logger('dev'));
app.use(express.json());
app.use(express.urlencoded({ extended: false }));
app.use(cookieParser());
app.use(express.static(path.join(__dirname, 'public')));
app.use(bodyParser());
app.use(express.urlencoded({ extended: false }));

app.use('/', indexRouter);
app.use('/users', usersRouter);

/** API */
app.use('/api/register', regApi);
app.use('/api/login', loginApi);
app.use('/api/focus', focusApi);
app.use('/api/account', accountApi);
 

// catch 404 and forward to error handler
app.use(function(req, res, next) {
  next(createError(404));
});

// error handler
app.use(function(err, req, res, next) {
  // set locals, only providing error in development
  res.locals.message = err.message;
  res.locals.error = req.app.get('env') === 'development' ? err : {};

  // render the error page
  res.status(err.status || 500);
  res.render('error');
});

// console.log("listening to port 3000");

module.exports = app;
