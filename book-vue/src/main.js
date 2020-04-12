// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import VueRouter from 'vue-router'
import routes from './routes'
// import App from './App'
import Master from './components/Master'
import VueSimpleAlert from "vue-simple-alert"
import { vueTopprogress } from 'vue-top-progress'
Vue.use(VueSimpleAlert)
Vue.use(vueTopprogress)
Vue.use(VueRouter)


Vue.config.productionTip = false

  const router = new VueRouter({
    routes,
    mode: 'history'
  })

/* eslint-disable no-new */

new Vue({
  el: '#app',
  router: router,
  components: { Master },
  template: '<Master/>'
})