window.axios = require('axios');
import Vue from 'vue';
import Search from './components/Search.vue';
import hljs from 'highlight.js/lib/core';

// Syntax highlighting
hljs.registerLanguage('python', require('highlight.js/lib/languages/python'));

document.querySelectorAll('pre code').forEach((block) => {
    hljs.highlightBlock(block);
});

Vue.config.productionTip = false;

new Vue({
    components: {
        Search,
    },
}).$mount('#vue-search');

