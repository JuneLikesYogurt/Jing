<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>time</title>
    <!-- <script type="text/javascript" src="js/resetTime.js"></script> -->
    <link rel="stylesheet" type="text/css" href="../css/jingtop.css">
    <link rel="stylesheet" type="text/css" href="../css/time.css">

    <script type="text/javascript">
		window.onbeforeunload = function () {
			return false;
		};
        var maxtime = 60 * 60; //一个小时，按秒计算，自己调整!   
            function CountDown() {
                if (maxtime >= 0) {
                    minutes = Math.floor(maxtime / 60);
                    seconds = Math.floor(maxtime % 60);
                    msg = minutes + " : " + seconds;
                    document.all["time"].innerHTML = msg;
                    if( maxtime == 0) {
                        alert("success！");
                    }
                    maxtime--;
                } else{
                    clearInterval(timer);
                    alert("时间到，结束!");
                }
            }
            time = setInterval("CountDown()", 1000);       
    </script>
</head>

<body>
    <div id="header">
        <div id="control">
            <a href="achieve.html">account</a>
        </div>
    </div>
    <div class="slogan">
        <span>Be happy for this moment. This moment is your life.</span>
    </div>
    
    <div id="tree">
        tree
    </div>
    <div id="time"></div>
</body>

</html>