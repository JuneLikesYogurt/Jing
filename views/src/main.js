// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import router from './router'
import axios from 'axios'

// import vuex from 'vuex'

Vue.config.productionTip = false
// Vue.use(vuex)

Vue.prototype.axios = axios
axios.defaults.withCredentials = true;

// let store = new vuex.Store({
// 	state: {
// 		uid: ''
// 	},

// 	mutations: {
// 		storeuserInfo (state, user) {
// 			state.uid = uid
// 		}
// 	}
// })

/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
//   store,
  components: { App },
  template: '<App/>'
})
