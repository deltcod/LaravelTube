import Vue from 'vue'
import App from './app.vue'
import VueRouter from 'vue-router'
import VueResource from 'vue-resource'
import videos from './components/main-wrapper/index.vue'
import videoView from './components/main-wrapper/video-view.vue'


Vue.use(VueResource)
Vue.use(VueRouter)

const router = new VueRouter()

router.map({
    '/': {
        component: {
            template: '<router-view></router-view>'
        },
        subRoutes: {
            '/best': {
                component: videos
            },
            '/videos/:id': {
                component: videoView
            },
            '/category/:name': {
                component: videos
            },
            '/search/:name': {
                component: videos
            }
        }
    }
})


router.redirect({
    '*': '/best',
    '/': '/best'
})

router.start(App, 'app')

Vue.http.headers.common['X-Authorization'] = $('meta[name=api_token]').attr("content");