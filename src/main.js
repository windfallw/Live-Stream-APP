import Vue from 'vue'
import vuetify from './plugins/vuetify';
import 'roboto-fontface/css/roboto/roboto-fontface.css'
import '@mdi/font/css/materialdesignicons.css'

import Home from './views/home'
import NotFound from './views/404'

Vue.config.productionTip = false

const About = {template: '<p>about page</p>'}

const routes = {
    '/': Home,
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
    render(h)
    {
        return h(this.ViewComponent)
    }
})
