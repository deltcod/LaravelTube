import Vue from 'vue'
import App from './app.vue'
import VueRouter from 'vue-router'
import VueResource from 'vue-resource'
import bestVideos from './components/main-wrapper/best-videos-view.vue'


Vue.use(VueResource)
Vue.use(VueRouter)

const router = new VueRouter()


router.map({
    '/': {
        component: {
            template: '<router-view></router-view>'
        },
        subRoutes: {
            '/': {
                component: bestVideos
            }
        }
    },
})


router.redirect({
    '*': '/'
})

router.start(App, 'app')