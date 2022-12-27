<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Order PDF</title>
	<style type="text/css">
		.details pre{
			margin-left: 20%;
			font-size: 25sp;
		}
	</style>
<body>

	<div class="details">
		<h2 style="text-align:center;">Order Details</h2>
		<pre><b>Customer Name    :</b> {{$order->name}}</pre>
		<pre><b>Customer Email   :</b> {{$order->email}}</pre>
		<pre><b>Customer Phone   :</b> {{$order->phone}}</pre>
		<pre><b>Customer Address :</b> {{$order->address}}</pre>
		<pre><b>Customer Id      :</b> {{$order->user_id}}</pre>
		<pre><b>Product Name     :</b> {{$order->product_title}}</pre>
		<pre><b>Product Quantity :</b> {{$order->quantity}}</pre>
		<pre><b>Product Price    :</b> {{$order->price}}</pre>
		<pre><b>Product Id       :</b> {{$order->Product_id}}</pre>
		<pre><b>Product Image    :</b></pre>
		 <img height="250" width="400" src="product/{{$order->image}}" style="margin-left: 20%;">
	</div>

</body>
</html>