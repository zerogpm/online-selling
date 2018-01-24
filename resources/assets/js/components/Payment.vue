<template>
    <form method="post" v-if="loaded">
        <button type="submit" class="btn btn-primary">Complete</button>
    </form>
</template>

<script>
    export default {

      props: ['listing', 'price'],

      data () {
        return {
          loaded: true,
          stripe: null,
          listPrice: this.price,
          list: this.listing,
          stripeEmail: '',
          stripeToken: '',
        }
      },

      created() {
        let self = this;
        this.stripe = StripeCheckout.configure({
          key: keyhash.key,
          image: "https://stripe.com/img/documentation/checkout/marketplace.png",
          locale: "auto",
          token: function (token) {
            self.stripeEmail = token.email;
            self.stripeToken = token.id;
            axios.post('/purchases', self.$data).then(
              response => {
                console.log(response);
                alert('Complete! Thanks for your payment!')
              });
          }
        });
      },
    }
</script>
