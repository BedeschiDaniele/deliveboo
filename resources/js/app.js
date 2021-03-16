require('./bootstrap');

import axios from 'axios';
import Vue from 'vue/dist/vue';

var app = new Vue({
  el: '#app',
  data: {
    selectedCategory: "all",
    restaurants: [],
    categories: [],
    filteredRestaurant: []
  },
  mounted: function() {
    
    axios
    .get('http://127.0.0.1:8000/api/restaurants')
    .then((response) => {
      this.restaurants = response.data;
      // console.log(this.restaurants);
    });

    axios
    .get('http://127.0.0.1:8000/api/categories')
    .then((response) => {
      this.categories = response.data;
      // console.log(this.categories);
    });
  },
  methods: {
    filterCategory: function() {
      axios
      .get('http://127.0.0.1:8000/api/filtered/' + this.selectedCategory)
      .then((response) => {
        this.filteredRestaurant = response.data;
        console.log(response.data);
      });
    }
  }

})