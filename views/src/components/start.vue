<template>
    <div>
        <div id="header">
            <div id="control">
                <a><router-link :to="{path:'/account', query:{ uid:this.$route.query.uid}}">ACCOUNT</router-link></a>
            </div>
        </div>

        <div class="slogan">
            <span>Be happy for this moment. This moment is your life.</span>
        </div>

        <div id="now"></div>

        <div id="start">
            <a><router-link :to="{path:'/setting', query:{ uid:this.$route.query.uid}}">START</router-link></a>
        </div>
    </div>
</template>

<script>
export default {
    mounted() {
        let uid = this.$route.query.uid;
        setInterval(function () {
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
            
            /** ！！！防止单页面跳转后，没有obj.innerHTML，而导致的控制台报错（内存溢出？） */
            if(obj) {
                //将str的内容写入到id=result的<div>中去
                obj.innerHTML = str;
            }         
        })
        console.log(this.$route.query);
    }
}
</script>

<style scoped>
#now{
    width: 1000px;
    height: 320px;
    margin: 0 auto;

    font-size: 120px;
    text-align: center;
    line-height: 320px;
    letter-spacing: 15px;
}

#start{
  margin: 0 auto;
  margin-top: 60px;
  height: 45px;
  width: 150px;
  text-align: center;
  /*display: flex;
  justify-content: center;*/
  color: white;
  font-size: 24px;
  line-height: 45px;
  /*opacity: 0.5;*/
  background-color: black;
  border-width: 0.1em;
  border-color: #ccc;
  box-sizing: content-box;
  border-style: solid; 
}
#start a{
    letter-spacing: 2px;
    text-transform: uppercase;
    text-decoration: none;
    color: white;

}
#start a:hover{
    color: #ccc;
}
</style>
