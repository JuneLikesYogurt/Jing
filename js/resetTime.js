//倒计时
// function resetTime(30) {
//     var timer = null;
//     var t = time;
//     var m = 0;
//     var s = 0;
//     var time = null;
//     m = Math.floor(t / 60 % 60);
//     m < 10 && (m = '0' + m);
//     s = Math.floor(t % 60);

//     function countDown() {
//         s--;
//         s < 10 && (s = '0' + s);
//         if (s.length >= 3) {
//             s = 59;
//             m = "0" + (Number(m) - 1);
//         }
//         if (m.length >= 3) {
//             m = '00';
//             s = '00';
//             clearInterval(timer);
//         }
//         time = m + " : " + " : ";
//         var obj = document.getElementById("time");
//         obj.innerHTML = time;
//     }
//     // timer = setInterval(countDown, 1000);
//     window.setTimeout("resetTime()",1000);
// }
var date = new Date();
var startTime = date.getTime();
var limitTimes = 10;
var endTime = (startTime.setMinutes(startTime.getMinutes() + limitTimes));
var surplusTimes = endTime.getTime()/1000 - startTime.getTime()/1000;

countDown = window.setInterval(function () {
    surplusTimes--;
    var minute = Math.floor(surplusTimes/60);
    var second = Math.round(surplusTimes%60);
    console.log(minute + ":" + second);
    if(surplusTimes <= 0) {
        console.log('时间到！');
        clearInterval(countDown);
    }
},1000)

// function cutDowns(limit,time) {
//     var arr = [];
//     currentTime.setMinutes(currentTime.getMinutes() + limit); //加上后的时间

// }