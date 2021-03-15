require('./bootstrap');

import axios from 'axios';
import Vue from 'vue/dist/vue';

var app = new Vue({
  el: '#app',
  data: {
    message: 'Hello Vue!',
    restaurants: []
  },
  mounted: function() {
    axios
    .get('http://127.0.0.1:8000/api/restaurants')
    .then((response) => {
      this.restaurants = response.data.results;
      console.log(this.restaurants);
    });
  }

})