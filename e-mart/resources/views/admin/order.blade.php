<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Admin</title>
    <!-- Required meta tags -->
   @include('admin.css')

   <style type="text/css">
     .title_deg{
        text-align: center;
        font-size: 25px;
        font-weight: bold;
        padding-bottom: 50px;
     }

     .table_deg{
       width: 80%%
       margin: auto;
       text-align: center;
       overflow: auto;
       white-space: nowrap;
       display: block;
     }
     .th_deg{
      background-color: springgreen;
      height: 40px;
      border: 2px solid white;
     }
     .img_size{
      width: 200px;
      height: 150px;
     }

   </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
     @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.header')

        <div class="main-panel">
          <div class="content-wrapper">

            <h1 class = "title_deg">All Order</h1>

            <div style="padding-left: 30%; padding-bottom: 30px;">
              <form action="{{url('search')}}" method="get">
                <input type="text" style="color:black;height: 30px;" name="search" placeholder="Search for something">
                <input type="submit" value="Search" class="btn btn-primary" style="height: 30px;">
              </form>
            </div>

            <table class="table_deg">
              
              <tr class="th_deg">
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Product Title</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Payment Status</th>
                <th>Delivery Status</th>
                <th>Image</th>
                <th>Delivered</th>
                <th>Print Pdf</th>
              </tr>

              @forelse($order as $order)

              <tr style="border:2px solid white;">

                <td>{{$order->name}}</td>
                <td>{{$order->email}}</td>
                <td>{{$order->address}}</td>
                <td>{{$order->phone}}</td>
                <td>{{$order->product_title}}</td>
                <td>{{$order->quantity}}</td>
                <td>{{$order->price}}</td>
                <td>{{$order->payment_status}}</td>
                <td>{{$order->delivery_status}}</td>
                <td>
                  
                 <img class="img_size" src="/product/{{$order->image}}">
                </td>

                <td>

                  @if($order->delivery_status=='Processing')

                  <a href="{{url('delivered',$order->id)}}" 
                   onclick="return confirm('Are you sure this product is delivered!!')" class="btn btn-primary">Deliver</a>

                  @else

                  <p style="color: lightgreen;">Delivered</p>

                  @endif
                </td>

                <td>
                  <a href="{{url('print_pdf',$order->id)}}" class="btn btn-danger">Print PDF</a>
                </td>

              </tr>

              @empty
              <tr>
                <td colspan="10" style="color:red; text-align: center;">
                  <div>
                    <p>No data Found!!</p>
                  </div>
                </td>
              </tr>

              @endforelse
            </table>

          </div>
        </div>

        <!-- partial -->
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>