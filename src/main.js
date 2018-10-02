require('dotenv').config()

import Vue from 'vue'
import App from './App.vue'
import DatatableFactory from 'vuejs-datatable'
import VueFirestore from 'vue-firestore'

import router from './router'
import 'nprogress/nprogress.css'
import './assets/app.less'
import 'font-awesome/css/font-awesome.min.css'

Vue.config.productionTip = false

Vue.use(VueFirestore)
Vue.use(require('vue-moment'))
Vue.use(DatatableFactory)

new Vue({
  router,
  render: h => h(App)
}).$mount('#app')
