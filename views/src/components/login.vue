<template>
    <div>
        <div id="header">
            <div id="control">
                <!-- <a href="account.html">account</a> -->
            </div>
        </div>

        <div class="slogan">
            <span>Be happy for this moment. This moment is your life.</span>
        </div>

        <div class="center">
            <form :model="login" ref="login">
                <div class="input" prop="username">
                    <img src="../picture/zhanghu.png">
                    <input type="text" class="blank" v-model="login.username" value="" placeholder="username"/>
                </div>
                <div class="input" prop="password">
                    <img src="../picture/mima.png">
                    <input type="password" class="blank" v-model="login.password" placeholder="password"/>
                </div>
                
                <div id="logSub">
                    <input type="button" value="LOGIN" class="submit" @click="submitLogin">
                    <input type="button" value="REGISTER" class="submit" @click="toRegister">
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import api from '../api/api.js'

export default {
    // name: 'login',
    data() {
        return {
            login: {
                username: '',
                password: ''
            }
        }
    },

    methods: {
        submitLogin() {
            this.loginLoading = true;

            let info = {
                username: this.login.username,
                password: this.login.password
            }

            api.login(info).then(res => {
                console.log(res.data);
                this.$router.push({ 
                    path:'/start', 
                    query: {uid: res.data.uid}
                    
                    // name: 'login',
                    // params: {uid: res.data.uid } 
                })
            })
        },

        toRegister () {
            this.$router.push({
                path:'/register'
            })
        }
    }
}
</script>

<style>
.input {
  width: 400px;
  height: 120px;
  line-height: 100px;
  border-bottom: 1px solid #000;
  padding: 0 2px;
  margin: 0 auto;
}
.input .blank {
  font-size: 17px;
  font-weight: 400px;
  height: 50px;
  width: 270px;
  padding-left:20px;
  margin-left: 30px;
  margin-top: 60px;
  border-width: 0px;
  background-color: transparent;
}
#down{
  margin-top: 100px;
}
#logSub {
  width: 700px;
  margin: 0 auto;
  display: flex;
  flex-wrap: nowrap;
  flex-direction: row;
  justify-content: space-between;
}

.submit {
  margin: 0 auto;
  margin-top: 100px;
  height: 45px;
  width: 150px;
  text-align: center;
  color: white;
  font-size: 18px;
  background-color: black;
  border-width: 0.1em;
  border-color: #ccc;
  box-sizing: content-box;
  border-style: solid; 
}
</style>


