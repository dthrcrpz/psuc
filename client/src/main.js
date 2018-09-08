require('dotenv').config()

import Vue from 'vue'
import App from './App.vue'

import router from './router'
import 'nprogress/nprogress.css'
import './assets/app.less'

Vue.config.productionTip = false

Vue.use(require('vue-moment'))

new Vue({
  router,
  render: h => h(App)
}).$mount('#app')
