import Vue from 'vue';
import router from '@/router';
import BootstrapIcon from '@dvuckovic/vue-bootstrap-icons';
Vue.component('BootstrapIcon', BootstrapIcon);
import { library } from '@fortawesome/fontawesome-svg-core'
import { faUserSecret } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

library.add(faUserSecret)
Vue.component('font-awesome-icon', FontAwesomeIcon)

import App from '@/App.vue';

window.axios = require('axios');

new Vue({
    router,
    render: h => h(App),
}).$mount('#app');
