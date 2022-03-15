
require('./bootstrap');

window.Vue = require('vue');


Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('principal-component', require('./components/PrincipalComponent.vue').default);
Vue.component('tiempo-component', require('./components/TiempoComponent.vue').default);



const app = new Vue({
    el: '#app',
});
