import Vue from 'vue'
import Router from 'vue-router'


import Silence from '@/components/Silence'
import login from '@/components/login'
import register from '@/components/register'

import start from '@/components/start'
import setting from '@/components/setting'
import focus from '@/components/focus'

import account from '@/components/account'

Vue.use(Router)

export default new Router({
  routes: [
    { path: '/', name: 'Silence', component: Silence},
    { path: '/login', name: 'login', component: login},
    { path: '/register', name: 'register', component: register},

    { path: '/start', name: 'start', component: start},
    { path: '/setting', name: 'setting', component: setting},
    { path: '/focus', name: 'focus', component: focus},

    { path: '/account', name: 'account', component: account}
  ]
})
