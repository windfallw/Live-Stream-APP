import Vue from 'vue'
import vuetify from './plugins/vuetify'
import 'roboto-fontface/css/roboto/roboto-fontface.css'
import '@mdi/font/css/materialdesignicons.css'

import videojs from 'video.js';

window.videojs = videojs

require('video.js/dist/video-js.css')
require('video.js/dist/lang/zh-CN.js')


import Home from './views/home'

Vue.config.productionTip = false

const About = {template: '<p>about page</p>'}

const routes = {
    '/': Home,
    '/index.html': Home,
    '/about': About
}

new Vue({
    vuetify,
    el: '#app',
    data: {
        currentRoute: window.location.pathname
    },
    computed: {
        ViewComponent()
        {
            return routes[this.currentRoute] || NotFound
        }
    },
    mounted()
    {

    },
    render(h)
    {
        return h(Home)
    }
})
