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

        <div class="center">
            <form :model="setting" ref="setting">

                <div class="Setting" prop="howLong">
                    <label>LASTING：</label>
                    <input type="number" v-model="setting.howLong">    
                </div>
                <div class="Setting">
                    <input type="button" value="CONFIRM" id="confirm" @click="Setting">                
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
            setting: {
                howLong: '25'
            }
        }
    },

    methods: {
        Setting() {
            // console.log(this.setting.howLong);
            
            let info = {
                uid: this.$route.query.uid,
                time: this.setting.howLong
            }
            // console.log(info);

            api.setTime(info).then(res => {
                //alert(res.data.time);

                this.$router.push({
                    path:'/focus',
                    query: {
                        did: res.data.did,
                        uid: res.data.uid,
                        time: res.data.time
                        // checkPage: "1"
                    }
                })
            })
        }
    }
}
</script>

<style scoped>
form {
    width: 70%;
    margin: 0 auto;
    margin-top: 100px;
}
.Setting {
    width: 90%;
    margin: 50px auto;

    display: flex;
    flex-wrap: nowrap;
    flex-direction: row;
    justify-content: space-around;

    font-size: 40px;
    letter-spacing: 15px;
    text-transform: uppercase;
}
.Setting select {
    width: 300px;
    height: 50px;

    font-size: 20px;
    color: #666;
    padding-left: 20px;
    letter-spacing: 4px;
    text-transform: uppercase;
}
.Setting input {
    width: 276px;
    height: 50px;
    margin-left: -5px;

    font-size: 20px;
    color: #666;
    padding-left: 20px;
    letter-spacing: 4px;
    text-transform: uppercase;
}
#confirm {
    height: 45px;
    width: 150px;
    margin: 0 auto;
    margin-top: 50px;
    padding-right: 10px;
    color: white;
    font-size: 18px;
    letter-spacing: 8px;
    text-transform: uppercase;
    background-color: black;
    border-width: 0.1em;
    border-color: #ccc;
    box-sizing: content-box;
    border-style: solid; 
}
</style>

