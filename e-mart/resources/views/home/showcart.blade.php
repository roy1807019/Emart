<!DOCTYPE html>
<html>
   <head>
      <title>Cart</title>
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
      	.center{
      		margin: auto;
      		width: 50%;
      		text-align: center;
      		padding: 30px;
      	}

      	table,th,td
      	{
      		border: 1px solid black;
      	}

      	.th_deg
      	{
      		font-size: 30px;
      		padding: 5px;
      		background-color: skyblue;
      	}

      	.img_deg{
      		height: 100px;
      		width: 100px;
      	}

      	.total_deg{
      		font-size: 20px;
      		padding: 40px;
      	}
      </style>
   </head>
   <body>
      <div class="hero_area">
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
                        
                        
                        <li class="nav-item active">
                           <a class="nav-link" href="{{url('show_cart')}}">Cart</a>
                        </li>
                        <li class="nav-item">
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
         
        @if(session()->has('message'))

            <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
              {{session()->get('message')}}
            </div>
            @endif
     
      <div class="center">
      	<table>
      		<tr>
      			<th class="th_deg">Product Title</th>
      			<th class="th_deg">Product Quantity</th>
      			<th class="th_deg">Price</th>
      			<th class="th_deg">Image</th>
      			<th class="th_deg">Action</th>
      		</tr>

      		<?php $totalprice=0; ?>


      		@foreach($cart as $cart)
      		<tr>
      			<td>{{$cart->product_title}}</td>
      			<td>{{$cart->quantity}}</td>
      			<td>{{$cart->price}} tk</td>
      			<td><img class="img_deg" src="/product/{{$cart->image}}"></td>
      			<td><a class="btn btn-danger" onclick="return confirm('Are You Sure to Remove This Item?')" href="{{url('/remove_cart',$cart->id)}}">Remove Product</a></td>
      		</tr>

      		<?php $totalprice=$totalprice + $cart->price ?>

      		@endforeach


      	</table>
      	<div>
      		<h1 class="total_deg">Total Price : {{$totalprice}} tk</h1>
      	</div>

      	<div>
      		<h1 style="font-size : 25px; padding-bottom: 15px;">Proceed to order</h1>
      		<a href="{{url('cash_order')}}" class="btn btn-danger" style="margin:10px;">Cash On Delivery</a>
      		<a href="{{url('stripe',$totalprice)}}" class="btn btn-danger" style="margin:10px">Card Payment</a>
      		<a href="" class="btn btn-danger" style="margin:10px;">Mobile Banking</a>
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