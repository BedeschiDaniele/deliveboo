require('./bootstrap');

import axios from 'axios';
import Vue from 'vue/dist/vue';

var app = new Vue({
  el: '#cart',
  data: {
    cart: []
  },
  methods: {
    addToCart: function (dish) {
      for (let i = 0; i < this.cart.length; i++) {
        if (this.cart[i].item.id === dish.id) {
          this.cart[i].quantity++;
          return;
        }
      }
      this.cart.push({
        item: dish,
        quantity: 1
      });
      console.log(this.cart);
    },
    increaseQuantity(dish) {
      dish.quantity++;
    },
    decreaseQuantity(dish) {
      dish.quantity--;
      if(dish.quantity <= 0) {
        this.removeProdFromCart(dish);
      }
    },
    removeProdFromCart(dish) {
      const prodIndex = this.cart.indexOf(dish);
      this.cart.splice(prodIndex, 1);
    },
  },
  mounted: function() {
  
  }

})