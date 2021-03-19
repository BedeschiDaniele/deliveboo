require('./bootstrap');

import axios from 'axios';
import Vue from 'vue/dist/vue';

var app = new Vue({
  el: '#checkout',
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
    }
  },
  computed: {
    calculateTotal() {
      let total = 0;
      for (let i = 0; i < this.cart.length; i++) {
        total += this.cart[i].item.price * this.cart[i].quantity;
      }
      return total.toFixed(2);
    }
  },
  mounted: function(){
    if(localStorage.getItem('cart')) {
      try {
        this.cart = JSON.parse(localStorage.getItem('cart'));
      } catch(e) {
        localStorage.removeItem('cart');
      }
    }
    console.log(this.cart);
  }
})


