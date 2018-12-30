<template>
    <div>
        <div id="header">
            <div id="control">
                <a><router-link :to="{path:'/setting', query:{ uid:this.$route.query.uid}}">START</router-link></a>
            </div>
        </div>
        <div class="slogan">
            <span>Be happy for this moment. This moment is your life.</span>
        </div>
        <div class="Account">
            <p class="name">Hello<strong> {{ name }} </strong>,</p>
            <p class="name">How is everything goning on?</p>
            <p id="totalTime">You are in silence <strong> {{ time }} </strong> minutes.</p>
            <p id="sentence">Persistence will enable us to succeed, and perseverance of the source is to do not waver in the least, we should take to achieve the necessary means to success.</p>
        </div>
    </div>
</template>

<script>
import api from '../api/api.js'

export default {
    data() {
        return {
            name: '',
            time: ''
        }
    },

    mounted () {
        this.accountInfo()
    },

    methods: {
        accountInfo () {
            let info = {
                uid: this.$route.query.uid
            }
            console.log(info)
            api.accountMsg(info).then(res => {
                this.name = res.data.name,
                this.time = res.data.time
            })
        }
    }
}
</script>

<style scoped>
.slogan {
    position: absolute;
    left: 60px;
    bottom: 40px;
    transform: rotate(-90deg);
    transform-origin: top left;
    letter-spacing: 2px;
    text-transform: uppercase;
    font-size: 13px;
}

.Account {
    width: 45%;
    margin: 0 auto;
    margin-top: 120px;
    text-indent: 40px;
}
.Account span {
    font-style: italic;
}
.Account .name {
    font-size: 25px;
    margin-bottom: 5px;
    letter-spacing: 5px;
}
.Account #totalTime {
    font-size: 30px;
    margin-top: 30px;
    margin-bottom: 50px;
    letter-spacing: 5px;
}
.Account #sentence {
    /*display: inline;*/
    font-family: Times;
    font-size: 20px;
    line-height: 40px;
    letter-spacing: 2px;
}
</style>
