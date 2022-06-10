import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

export default {
	mode: 'history',
    base: process.env.BASE_URL,
    render: h => h(App),
	routes:[{
		path:'/show/:id',
		name:'showsgc',
		component:require('./components/sgc/show.vue'),
		props:true
	}],

}