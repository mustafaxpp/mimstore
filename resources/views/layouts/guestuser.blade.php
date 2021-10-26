 <!DOCTYPE html>
 <html lang="en">

 <head>
     <!-- basic -->
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <!-- mobile metas -->
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="viewport" content="initial-scale=1, maximum-scale=1">
     <!-- site metas -->
     <title>MyShop</title>
     <meta name="keywords" content="">
     <meta name="description" content="">
     <meta name="author" content="">
     <!-- bootstrap css -->
     <link rel="stylesheet" href='{{ asset('css/bootstrap.min.css') }}'>
     <!-- style css -->
     <link rel="stylesheet" href='{{ asset('css/style.css') }}'>
     <link rel="stylesheet" href='{{ asset('css/mystyle.css') }}'>
     <!-- Responsive-->
     <link rel="stylesheet" href='{{ asset('css/responsive.css') }}'>
     <!-- fevicon -->
     <link rel="icon" href="images/fevicon.png" type="image/gif" />
     <!-- Scrollbar Custom CSS -->
     <link rel="stylesheet" href='{{ asset('css/jquery.mCustomScrollbar.min.css') }}'>
     <!-- Tweaks for older IEs-->
     <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
     <!-- owl stylesheets -->
     <link rel="stylesheet" href='{{ asset('css/owl.carousel.min.css') }}'>
     <link rel="stylesheet" href='{{ asset('css/owl.theme.default.min.css') }}'>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
         media="screen">
     @livewireStyles
 </head>
 <!-- body -->


 <body class="main-layout">
     <!-- header section start -->
     <div class="header_section">
         <div class="container">
             <div class="row">
                 <div class="col-lg-1">
                     <div class="logo img-fluid"><a href="{{ route('index') }}"><img src="images/logo.png"></a></div>
                 </div>
                 <div class="col-lg-11">
                     <nav class="navbar navbar-expand-lg navbar-light bg-light">
                         <div class="container-fluid">
                             {{-- <a class="navbar-brand" href="#">Navbar</a> --}}
                             <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                 data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
                                 aria-expanded="false" aria-label="Toggle navigation">
                                 <span class="navbar-toggler-icon"></span>
                             </button>
                             <div class="collapse navbar-collapse" id="navbarNavDropdown">
                                 <ul class="navbar-nav">
                                     <li class="nav-item">
                                         <a class="nav-item nav-link" href="{{ route('index') }}">Home</a>
                                     </li>
                                     <li class="nav-item">
                                         {{-- <a class="nav-item nav-link" href="{{ route('collection') }}">Collection</a> --}}
                                     </li>
                                     <li class="nav-item">
                                         {{-- <a class="nav-item nav-link" href="{{ route('shoes') }}">Shoes</a> --}}
                                     </li>
                                     <li class="nav-item">
                                         {{-- <a class="nav-item nav-link" href="{{ route('contact') }}">Contact</a> --}}
                                     </li>


                             </div>
                         </div>
                     </nav>
                 </div>
             </div>
         </div>
          {{ $slot }} <!-- section footer start -->
             <div class="">
                 <div class="container">

                 </div>
             </div>
     </div>




         <!-- Javascript files-->
         <script src="js/jquery.min.js"></script>
         <script src="js/popper.min.js"></script>
         <script src="js/bootstrap.bundle.min.js"></script>
         <script src="js/jquery-3.0.0.min.js"></script>
         <script src="js/plugin.js"></script>
         <!-- sidebar -->
         <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
         <script src="js/custom.js"></script>
         <!-- javascript -->
         <script src="js/owl.carousel.js"></script>
         <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js">
         </script>
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
             integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
             crossorigin="anonymous">
         </script>
         <script src="https://www.paypal.com/sdk/js?client-id=test"></script>
          <script>
            paypal.Buttons({
              createOrder: function(data, actions) {
                // This function sets up the details of the transaction, including the amount and line item details.
                return actions.order.create({
                  purchase_units: [{
                    amount: {
                      value: '0.01'
                    }
                  }]
                });
              },
              onApprove: function(data, actions) {
                // This function captures the funds from the transaction.
                return actions.order.capture().then(function(details) {
                  // This function shows a transaction success message to your buyer.
                  alert('Transaction completed by ' + details.payer.name.given_name);
                });
              }
            }).render('#paypal-button-container');
            //This function displays Smart Payment Buttons on your web page.
          </script>
         @livewireScripts
 </body>

 </html>
