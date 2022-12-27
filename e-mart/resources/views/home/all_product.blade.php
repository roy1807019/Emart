<!DOCTYPE html>
<html>
   <head>
      <title>Products</title>
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
                        <li class="nav-item ">
                           <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
                        </li>
                       
                        <li class="nav-item active">
                           <a class="nav-link" href="{{url('products')}}">Products</a>
                        </li>
                        
                        
                        <li class="nav-item">
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
         <!-- end header section -->
         <!-- slider section -->
         <!-- end slider section -->
      
      <!-- why section -->
      
      
      <!-- product section -->
      @include('home.product_view')
      <!-- end product section -->

      <!-- comment and reply section -->


      <div style="text-align: center; padding-bottom: 30px;">
         <h1 style="font-size: 30px; text-align: center; padding-top: 20px; padding-bottom: 20px;">Comments</h1>

         <form action="{{url('add_comment')}}" method="POST">

            @csrf

            <textarea style="height:80px;width: 60%;" placeholder="Comment something here" name = "comment"></textarea> <br>
            <input type="submit" class="btn btn-primary" value="comment">
         </form>
      </div>
      <div style="padding-left: 20%; padding-bottom:30px;">
         <h1 style="font-size: 20px; padding-bottom: 20px;">All Comments</h1>

         @foreach($comment as $comment)

         <div>
            <b>{{$comment->name}}</b>
            <p>{{$comment->comment}}</p>
            <a style="color: blue;" href="javascript::void(0);" onclick="reply(this)" data-Commentid="{{$comment->id}}">Reply</a>

            @foreach($reply as $rep)

               @if($rep->comment_id==$comment->id)
               <div style="padding-left: 3%; padding-bottom:10px;">

                  <b>{{$rep->name}}</b>
                  <p>{{$rep->reply}}</p>
                  <a style="color: blue;"href="javascript::void(0);" onclick="reply(this)" data-Commentid="{{$comment->id}}">Reply</a>
                  
               </div>
               @endif
            @endforeach

         </div>

         @endforeach

         <!-- Reply Textbox -->

         <div style="display:none;" class="replydiv">

            <form action="{{url('add_reply')}}" method="POST">
               
               @csrf

               <input type="text" id="commentId" name="commentId" hidden="">
               <textarea style="height:50px; width: 70%;" placeholder="write your reply here" name="reply"></textarea> <br>
               
               <button class="btn btn-warning" type="submit">Reply</button>

               <a href="javascript::void(0);" class="btn btn-danger" onclick="reply_close(this)">Close</a>
            </form>

         </div>
      </div>






      


      <script type="text/javascript">
         function reply(caller)
         {
            document.getElementById('commentId').value=$(caller).attr('data-Commentid');
            $('.replydiv').insertAfter($(caller));
            $('.replydiv').show();
         }

         function reply_close(caller)
         {
            $('.replydiv').hide();
         }
      </script>

      <script>
        document.addEventListener("DOMContentLoaded", function(event) { 
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
     </script>
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