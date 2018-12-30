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
            <form :model="register" ref="register">
                <div class="input" prop="username">
                    <img src="../picture/zhanghu.png">
                    <input type="text" class="blank" v-model="register.username" value="" placeholder="username,    suggest email"/>
                </div>
                <div class="input" prop="name">
                    <img src="../picture/zhanghu.png">
                    <input type="text" class="blank" v-model="register.name" value="" placeholder="name"/>
                </div>
                <div class="input" prop="password">
                    <img src="../picture/mima.png">
                    <input type="password" class="blank" v-model="register.password" id="ps" placeholder="password"/>
                </div>
                <div class="input" prop="checkPassword">
                    <img src="../picture/repassword.png">
                    <input type="password" class="blank" v-model="register.checkPassword" id="checkPS" placeholder="check your password"/>
                </div>

                <div id="regSub">
                    <input type="button" value="REGISTER" class="submit" @click="submitRegister">
                </div>
            </form>
        </div>

    </div>
</template>

<script>
import api from '../api/api.js'

export default {

    data() {
        return {
            register: {
                username: '',
                name: '',
                password:'',
                checkPassword: ''
            }
        }
    },
    
    methods: {
        submitRegister() {
            if(this.register.password !== this.register.checkPassword) {
                alert('两次密码不一致');
            } else {
                let sub = {
                    username: this.register.username,
                    name: this.register.name,
                    password: this.register.password                  
                }

                //api.js文件中的register接口
                api.register(sub).then(res => {
                    alert('创建用户成功！');
                    this.$router.push({ path: '/login' })
                })
            }
        } 
    }
}
</script>

<style>
.input {
  width: 400px;
  height: 100px;
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
  margin-top: 45px;
  border-width: 0px;
  background-color: transparent;
}
#down{
  margin-top: 100px;
}
#regSub {
  width: 400px;
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
