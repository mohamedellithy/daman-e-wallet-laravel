/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import axios from 'axios';
import VueAxios from 'vue-axios';
import { Lang } from 'laravel-vue-lang';

// Register the plugin
Vue.use(Lang, {
    locale: window.default_locale,
    fallback: window.fallback_locale
});

// we import the vue router from our router/index.js file
import router from './router';

axios.defaults.baseURL = 'http://e-wallet.test/';
//axios.defaults.baseURL = 'http://daman.shop/';
Vue.use(VueAxios, axios);


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('form-create-payment-order', require('./components/FormCreatePaymentOrder.vue').default);
Vue.component('show-payment-order', require('./components/ShowPaymentOrder.vue').default);
Vue.component('edit-payment-order', require('./components/EditPaymentOrder.vue').default);
Vue.component('show-payments-in-wallet', require('./components/ShowPaymentsInWallet.vue').default);
Vue.component('show-withdraw-orders', require('./components/ShowWithdrawOrders.vue').default);
Vue.component('edit-withdraw-order', require('./components/EditWithdrawOrder.vue').default);
Vue.component('show-wallet-charge-orders', require('./components/ShowWalletChargeOrders.vue').default);
Vue.component('edit-charge-wallet-order', require('./components/EditChargeWalletOrder.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
const app = new Vue({
    el: '#app',
    router
});
