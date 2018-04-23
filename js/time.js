function showTime() {
    //创建Date对象
    var today = new Date();
    var hours = today.getHours();
    var minutes = today.getMinutes();
    var seconds = today.getSeconds();
    //如果是单个数，则前面补0
    hours = hours < 10 ? "0" + hours : hours;
    minutes = minutes < 10 ? "0" + minutes : minutes;
    seconds = seconds < 10 ? "0" + seconds : seconds;

    //构建要输出的字符串
    var str = hours + " : " + minutes + " : " + seconds;

    //获取id=result的对象
    var obj = document.getElementById("now");
    //将str的内容写入到id=result的<div>中去
    obj.innerHTML = str;
    //延时器
    window.setTimeout("showTime()", 1000);
}

//倒计时
function resetTime(30) {
    var timer = null;
    var t = time;
    var m = 0;
    var s = 0;
    var time = null;
    m = Math.floor(t / 60 % 60);
    m < 10 && (m = '0' + m);
    s = Math.floor(t % 60);

    function countDown() {
        s--;
        s < 10 && (s = '0' + s);
        if (s.length >= 3) {
            s = 59;
            m = "0" + (Number(m) - 1);
        }
        if (m.length >= 3) {
            m = '00';
            s = '00';
            clearInterval(timer);
        }
        time = m + " : " + " : ";
    }
    // timer = setInterval(countDown, 1000);
    var obj = document.getElementById("time");
    obj.innerHTML = time;
    window.setTimeout("resetTime()",1000);
}