<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <title>Beautiful Jewel</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    



    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="assets/css/owl.css">

  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="{{ 'redirect' }}"><h2>BeautiFul <em>Jewel</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="{{ 'redirect' }}">Home
                  <span class="sr-only">(current)</span>
                </a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" href="product.html">Our Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.html">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.html">Contact Us</a>
              </li>
              <li class="nav-item">
              @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                    <li class="nav-item">
                      <a class="nav-link" href="{{ url('showcart') }}">
                        <i class="far fa-shopping-cart"></i> 
                        Cart[{{ $count }}]</a>
                    </li>
                       <li><x-app-layout>
                         </x-app-layout></li>
                    @else
                        <li><a class="nav-link" href="{{ route('login') }}" >Log in</a></li>

                        @if (Route::has('register'))
                            <li><a class="nav-link" href="{{ route('register') }}" >Register</a></li>
                        @endif
                    @endauth
                </div>
            @endif
            </li>
            </ul>
          </div>
        </div>
      </nav>

      @if (session()->has('message'))
                <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">x</button>
                    {{ session()->get('message') }}
                </div>
                @endif
    </header>

    <div style="padding-bottom: 50px;padding-top:30px"  class="container-fluid page-body-wrapper">
        <div class="container" align="center">
            
            @if (session()->has('message'))
            <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">x</button>
                {{ session()->get('message') }}
            </div>
            @endif
            
            <table>
                <tr style="background-color: grey" style="padding-bottom: 40px">
                    <td style="padding: 60px;">Title</td>
                    {{-- <td style="padding: 60px;">Description</td> --}}
                    <td style="padding: 60px;">Quantity</td>
                    <td style="padding: 60px;">Price</td>
                    <td style="padding: 60px;">Action</td>
                    {{-- <td style="padding: 60px;">Image</td> --}}

                </tr>
                <form action="{{ url('order') }}" method="POST">
                  @csrf
                @foreach ($cart as $carts)
                    <tr align="center" style="background-color: black;" class="text-white" >
                        <td >
                          <input type="text" name="productname[]" value="{{ $carts->product_title }}" hidden="">
                          {{ $carts->product_title }}
                        </td>
                        {{-- <td >{{ $product->description }}</td> --}}
                        <td >
                          <input type="text" name="quantity[]" value="{{ $carts->quantity }}" hidden="">
                          {{ $carts->quantity }}
                        </td>
                        <td >
                          <input type="text" name="price[]" value="{{ $carts->price }}" hidden="">
                          {{ $carts->price }}
                        </td>
                        <td> <a  class="btn btn-danger" href="{{ url('delete',$carts->id) }}">Delete</a></td>
                        {{-- <td ><img height="150" width="150" src="/productimage/{{ $product->image }}"></td> --}}
                    </tr>
                
                @endforeach
            </table>
            <button class="btn btn-success">Order Product</button>
                </form>
        </div>
    </div>

    

    
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <p>Copyright &copy; 2020 Beautiful Jewel Co., Ltd.
            
            - Design
            </div>
          </div>
        </div>
      </div>
    </footer>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/accordions.js"></script>


    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>


  </body>

</html>
