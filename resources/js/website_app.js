require('./bootstrap');
window.Vue = require('vue');
require('../js/app.js');

require('./LoadComponents/website/general');
Vue.component('success-error-msg', require('../js/components/SuccessErrorMsg').default);
require('../../public/website/custom/js/api.js');
require('../../public/admin_assets/custom/js/general.js');

// var app = new Vue({
//     el :'#app'
// });
