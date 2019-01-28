// Packages
import Vue from 'vue';

// My Components
import InstagramImages from './components/InstagramImages.vue';
import ScoreboardList from './components/ScoreboardList.vue';

require('./bootstrap');

const app = new Vue({
    el: '#app',
    components: { InstagramImages, ScoreboardList },
});
