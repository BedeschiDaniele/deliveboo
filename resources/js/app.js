require('./bootstrap');

import axios from 'axios';
import Vue from 'vue/dist/vue';

var app = new Vue({
  el: '#app',
  data: {
    selectedCategory: "all",
    restaurants: [],
    categories: [],
    filteredRestaurant: [],
    onSearch: false
  },
  mounted: function() {
    
    axios
    .get('http://127.0.0.1:8000/api/restaurants')
    .then((response) => {
      this.onSearch=false;
      this.restaurants = response.data;
    });

    axios
    .get('http://127.0.0.1:8000/api/categories')
    .then((response) => {
      this.categories = response.data;
    });
  },
  methods: {
    filterCategory: function() {
      if(this.selectedCategory== "all") {
        axios
        .get('http://127.0.0.1:8000/api/restaurants')
        .then((response) => {
          this.onSearch=false;
          this.filteredRestaurant = response.data;
      });

      } else {
        axios
        .get('http://127.0.0.1:8000/api/filtered/' + this.selectedCategory)
        .then((response) => {
          this.onSearch=false;
          if(response.data.length > 0 ) {
            this.filteredRestaurant = response.data;
            console.log(response.data);
          } else {
            this.onSearch=true;
          }
        });
      }  
    },

  }
})