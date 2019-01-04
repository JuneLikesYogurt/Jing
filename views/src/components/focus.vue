<template>
    <div id="focus">
        <div id="header">
            <div id="control">
                <a><router-link :to="{path:'/account', query:{ uid:this.$route.query.uid}}">ACCOUNT</router-link></a>
            </div>
        </div>
        <div class="slogan">
            <span>Be happy for this moment. This moment is your life.</span>
        </div>
        
        <div id="tree">
            <img src="../picture/sam-austin-438814-unsplash.jpg">
        </div>

        <div id="time"></div>
    </div>
</template>

<script>
import api from '../api/api.js'

export default {
    created() {
        this.focus();
        this.CountTime()
    },

    methods: {
        focus :function() {
            let self = this;
            let uid = this.$route.query.uid;
            
            document.body.onmouseleave = function () {   
                alert("专注失败a");
                self.$router.push({ 
                    path: '/start',
                    query: {
                        uid: uid
                    }
                });
            }

            document.body.onclick = function () {
                alert("专注失败");
                self.$router.push({ 
                    path: '/start',
                    query: {
                        uid: uid
                    }
                });
            }
        },

        CountTime() {
            let self = this; /**防止异步时获取不到 */
            let did = this.$route.query.did;
            let totalTime = this.$route.query.time * 60;//一个小时，按秒计算，自己调整! 
            let flag = 0;
            // let push = this.$router.push;

            //setInterval 异步
            this.CountDown = setInterval(function() {
                if (totalTime >= 0) {
                    let minutes = Math.floor(totalTime / 60);
                    let seconds = Math.floor(totalTime % 60);
                    let msg = minutes + " : " + seconds;

                    var obj = document.getElementById("time");
                    obj.innerHTML = msg;

                    if( totalTime == 0) {
                        /**！！！先关闭body的onmouseleave事件 */
                        document.body.onmouseleave = "";
                        document.body.onclick = "";
                        flag = 1; //成功！！！flag置1！！！
                        alert("success！");

                        let info = {
                            did: did,
                            flag: flag
                        }                        
                        api.success(info).then(res => {
                            // alert(res.data.time);
                            /**！！！self,setInterval的异步还没有结束 */
                            self.$router.push({
                                path:'/account',
                                query: {
                                    uid: res.data.uid
                                }
                            })
                        })
                    }
                    totalTime--;
                }
            }, 1000);
        }
    },

    beforeDestroy() {
        if (this.CountDown) {
            clearInterval(this.CountDown);
        }
        document.body.onmouseleave = "";
        document.body.onclick = "";
    }
}
</script>

<style>
#tree{
    width: 800px;
    height: 400px;
    background-color: #eee;
    margin: 0 auto;
    margin-top: 50px;
    margin-bottom: 50px;
}
#time{
  height: 50px;
  width: 300px;
  margin: 0 auto;
  margin-top: 80px;

  box-sizing: content-box;
  padding-bottom: 15px;
  border-bottom: 3px solid #000; 
  color: black;

  text-align: center;
  font-size: 50px;
  line-height: 50px;
  letter-spacing: 10px;
}
#tree img {
  width: 800px;
    height: 400px;
}
</style>
