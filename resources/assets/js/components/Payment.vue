<template>
    <form method="post" v-if="loaded">
        <button type="submit" @click.prevent="buy" class="btn btn-primary">Complete</button>
    </form>
</template>

<script>
    export default {

      props: ['listing'],

      data () {
        return {
          loaded: true,
          stripe: null,
          list: this.listing,
          stripeEmail: '',
          stripeToken: '',
        }
      },

      created() {
        let self = this;
        console.log(this.list);
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

      methods: {
        buy() {

          this.stripe.open({
            name: this.list.title,
            description: this.list.body,
            zipCode: true,
            amount: this.list.category.price * 100
          });
        },
      },
    }
</script>
