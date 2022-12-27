<!DOCTYPE html>
<html>
   <head>
      <title>Order</title>
      <!-- Basic -->
     <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>e-mart</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{asset('home/css/bootstrap.css')}}" />
      <!-- font awesome style -->
      <link href="{{asset('home/css/font-awesome.min.css')}}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{asset('home/css/style.css')}}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{asset('home/css/responsive.css')}}" rel="stylesheet" />


      <style type="text/css">
         
         .table_deg{
            margin: auto;
            width: 70%;
            padding: 30px;
            text-align: center;
            margin-top: 100px;
         }
         table th,td{
            border: 1px solid black;
         }
      </style>



   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
        <!-- header section strats -->
        

 <header class="header_section">
            <div class="container">
               <nav class="navbar navbar-expand-lg custom_nav-container ">
                  <a class="navbar-brand" href="{{url('/')}}"><img width="250" height="60" src="/images/logo.png" alt="#" /></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class=""> </span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav">
                        <li class="nav-item">
                           <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
                        </li>
                       
                        <li class="nav-item">
                           <a class="nav-link" href="{{url('products')}}">Products</a>
                        </li>
                        
                        
                        <li class="nav-item ">
                           <a class="nav-link" href="{{url('show_cart')}}">Cart</a>
                        </li>
                        <li class="nav-item active">
                           <a class="nav-link" href="{{url('show_order')}}">Order</a>
                        </li>
                       

                         @if (Route::has('login'))

                         @auth
                         <li class="nav-item">
                          <x-app-layout>
    
                          </x-app-layout>

                        </li>


                        @else

                        <li class="nav-item">
                           <a class="btn btn-primary"  id="logincss" href="{{ route('login') }}" style="margin-bottom:10px;">Login</a>
                        </li>
                        <li class="nav-item">
                           <a class="btn btn-success" href="{{ route('register') }}">Register</a>
                        </li>   

                        @endauth
                        @endif

                     </ul>
                  </div>
               </nav>
            </div>
         </header>
        <!-- header section end-->
         <!-- end header section -->
         

         <div>
            <table class = "table_deg">
               <tr style="background-color: skyblue;font-size: 20px;font-weight: bold;">
                  <th>Product Title</th>
                  <th>Quantity</th>
                  <th>Price</th>
                  <th>Payment Status</th>
                  <th>Delivery Status</th>
                  <th>Image</th>
                  <th>Action</th>
               </tr>

               @foreach($order as $order)
               <tr>
                  <td>{{$order->product_title}}</td>
                  <td>{{$order->quantity}}</td>
                  <td>{{$order->price}}</td>
                  <td>{{$order->payment_status}}</td>
                  <td>{{$order->delivery_status}}</td>
                  <td>
                     
                     <img height="150" width="180" src="product/{{$order->image}}" style="margin:auto;">

                  </td>
                  <td>
                     @if($order->delivery_status=='Processing')
                     <a onclick="return confirm('Are you sure to cancel the order?')" class="btn btn-danger" href="{{url('cancel_order',$order->id)}}">Cancel Order</a>

                     @else
                     <p style="color: blue;">Not Allowed</p>
                     @endif
                  </td>
               </tr>
               @endforeach
            </table>
         </div>


      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>