<template>
    <div id="silence">
        <h1 class="title">Silence</h1>
        <p>—— A silence place in the nosiy world.</p>
    </div> 
</template>

<script>
export default {
    mounted() {
        this.click()
    },

    methods: {
        click() {
            let self = this;
            document.body.addEventListener('click', function() {
                self.$router.push({
                    path: 'login'
                })
            })
        }
    }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<!-- <style scoped> -->
<style>
/* body {
    background-color: pink;
} */

/* #Silence {
    background-color: red;
} */

#silence {
    width: 80%;
    margin: 0 auto;
    padding: 14% 10%;
    /* background-color: pink; */
}
@-webkit-keyframes fade_in {
    0% { opacity: 0; transform: translateY(20px);}
    100% { opacity: 1; transform: translateY(0px);}
}

#silence h1 {
    width: 50%;
    margin: 0 auto;
    margin-bottom: 100px;
    font-size: 120px;
    letter-spacing: 20px;
    font-weight: lighter;
    align-self: center;

    animation: fade_in 2s ease 1;
    animation-fill-mode: forwards;
}

#silence p {
    display: inline;
    margin-left: 50%;
    /*margin-top: 300px;*/
    letter-spacing: 2px;
    text-transform: uppercase;
    font-family: Times;
}
</style>
