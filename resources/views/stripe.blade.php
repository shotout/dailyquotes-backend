<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Stripe</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-12 mt-4 text-center">
              <a href="#" class="btn btn-primary">Subscription</a>
            </div>
        </div>
    </div>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js" integrity="sha512-odNmoc1XJy5x1TMVMdC7EMs3IVdItLPlCeL5vSUPN2llYKMJ2eByTTAIiiuqLg+GdNr9hF6z81p27DArRFKT7A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://js.stripe.com/v3/"></script>

    <script>
      $(document).ready(function() {
        $('.btn-primary').on('click', function(ev){
          ev.preventDefault()
          axios.get(`http://motivation.test/api/v1/stripe/checkout?plan=3&price=price_1LyoE5KITpzX4txvQSHGWKQV`)
            .then(res => {
              console.log(res.data.id)
              onStripeSessionCreated("{{env('STRIPE_KEY')}}", res.data.data.id)
            })
            .catch()
        })

        function onStripeSessionCreated(stripeKey, sessionId) {
          const stripe = Stripe(stripeKey)
          stripe.redirectToCheckout({
            sessionId
          })
        }
      })
    </script>
  </body>
</html>
