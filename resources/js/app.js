require('./bootstrap');

window.Vue = require('vue');

Vue.component('test', require('./components/Test').default);
Vue.component('forma', require('./components/Form').default);
Vue.component('countAns' , require('./components/Count').default);

const app = new Vue({
    el: '#app',
})

const testForm = new Vue({
    el: '#testForm'
})

const countAnswers = new Vue({
    el: '#countAnswers'
})
