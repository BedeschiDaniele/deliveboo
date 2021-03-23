require('./bootstrap');

import axios from 'axios';
import Vue from 'vue/dist/vue';

var app = new Vue({
  el: '#checkout',
  data: {
    cart: [],
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
    saveLocalStorage() {
      let parsed = JSON.stringify(this.cart);
      localStorage.setItem('cart', parsed);
    }
  },
  computed: {
    calculateTotal() {
      let total = 0;
      for (let i = 0; i < this.cart.length; i++) {
        total += this.cart[i].item.price * this.cart[i].quantity;
      }
      return total.toFixed(2);
    },

    

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

// Braintree
 var button = document.querySelector('#submit-button');

braintree.dropin.create({
   // Insert your tokenization key here
   authorization: 'sandbox_g42y39zw_348pk9cgf3bgyw2b',
   container: '#dropin-container'
 }, function (createErr, instance) {
   button.addEventListener('click', function () {
     instance.requestPaymentMethod(function (requestPaymentMethodErr, payload) {
      // When the user clicks on the 'Submit payment' button this code will send the
      // encrypted payment information in a variable called a payment method nonce
      $.ajax({        type: 'POST',
        url: '/checkout',
        data: {'paymentMethodNonce': payload.nonce}
      }).done(function(result) {
        // Tear down the Drop-in UI
        instance.teardown(function (teardownErr) {
          if (teardownErr) {
            console.error('Could not tear down Drop-in UI!');
          } else {
           console.info('Drop-in UI has been torn down!');
           // Remove the 'Submit payment' button
           $('#submit-button').remove();
         }
        });

         if (result.success) {
          $('#checkout-message').html('<h1>Success</h1><p>Your Drop-in UI is working! Check your <a href="https://sandbox.braintreegateway.com/login">sandbox Control Panel</a> for your test transactions.</p><p>Refresh to try another transaction.</p>');
        } else {
          console.log(result);
          $('#checkout-message').html('<h1>Error</h1><p>Check your console.</p>');
        }
      });
    });
  });
});

