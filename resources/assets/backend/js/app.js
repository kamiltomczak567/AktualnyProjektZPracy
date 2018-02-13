require('./bootstrap');
require('./materialize');
require('./script');

window.Vue = require('vue');

Vue.component('setting',	require('./components/Setting.vue'));
Vue.component('projects',	require('./components/Projects.vue'));
Vue.component('oferta',	require('./components/Oferta.vue'));

new Vue({
    el: '#app'
});
