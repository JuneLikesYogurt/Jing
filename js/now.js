function showNow() {
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