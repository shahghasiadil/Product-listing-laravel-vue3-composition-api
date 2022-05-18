require('./bootstrap');

require('alpinejs');

import { createApp } from "vue";
import router from './router'
import ProductsIndex from './components/companies/ProductsIndex'

createApp({
    components: {
        ProductsIndex
    }
}).use(router).mount('#app')
