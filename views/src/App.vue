<template>
	<div id="Silence">
    	<router-view/>
  	</div>
</template>

<script>
export default {
  name: 'App'
}
</script>

<style>
/* #app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
} */
*{
	margin: 0;
	padding: 0;
	font-family: ApercuMono;
}

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
.center{
  width: 1000px;
  margin: 0 auto;
  margin-top: 70px;
}
.center img{
  margin-bottom: -10px;
  margin-left: 20px;
  height: 30px;
  width: 30px;
}

#header{
	width: 100%;
	height: 60px;
	/*border-bottom: solid 1px #000;*/
	margin-bottom: 50px;
	/* margin-top: 40px; */
	padding-top: 40px;
}
#control {
	position: absolute;
	right: 50px;
	width: 18%;
	display: flex;
	flex-wrap: nowrap;
	flex-direction: row;
	justify-content: space-around;
}
#control a{
	height: 60px;
	line-height: 60px;
	/*float: right;*/
	width: auto;
	text-decoration: none;
	color: black;
	font-size: 20px;
    letter-spacing: 2px;
    text-transform: uppercase;
}
#control a:hover{
	color: gray;
}
</style>
