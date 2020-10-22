 @extends('layout')
@section('content')

<section id="cart_items">
		<div class="container col-sm-12">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<?php 
				$contents =Cart::getContent();
				 
				?>
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Image</td>
							<td class="description">Name</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td>Action</td>
							 
						</tr>
					</thead>
					<tbody>
					   <?php foreach($contents as $v_content) {?>
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{URL::to($v_content->attributes->image)}}" height="80px" width="80px" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$v_content->name}}</a></h4>
								 
							</td>
							<td class="cart_price">
								<p>{{$v_content->price}}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									 
									<input class="cart_quantity_input" type="text" name="quantity" value="{{$v_content->quantity}}" autocomplete="off" size="2">
									 
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{Cart::getTotal()}}</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{URL::to('/delete-to-cart/'.$v_content->id)}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
					
					<?php } ?>
						 
					</tbody>
				</table>
			</div>
		</div>
	</section>  




 <h1>      Thank yous      </h1>

<div class="container" >
	<div class="row">
		<div class="paymentCont">
						<div class="headingWrap"  >
								<h3 class="headingTop text-center">Select Your Payment Method</h3>	
							 
						</div>
						<div class="paymentWrap">
							<div class="btn-group paymentBtnGroup btn-group-justified" data-toggle="buttons">
					            <label class="btn paymentMethod active">
					            	<div class="method visa"></div>
					                <input type="radio" name="options" checked> 
					            </label>
					            <label class="btn paymentMethod">
					            	<div class="method master-card"></div>
					                <input type="radio" name="options"> 
					            </label>
					            <label class="btn paymentMethod">
				            		<div class="method amex"></div>
					                <input type="radio" name="options">
					            </label>
					             <label class="btn paymentMethod">
				             		<div class="method vishwa"></div>
					                <input type="radio" name="options"> 
					            </label>
					            <label class="btn paymentMethod">
				            		<div class="method ez-cash"></div>
					                <input type="radio" name="options"> 
					            </label>

					         
					        </div>  
					        <div class="footerNavWrap clearfix">
							<a href="{{URL::to('/')}}"><div class="btn btn-success pull-left btn-fyi"><span class="glyphicon glyphicon-chevron-left"></span> CONTINUE SHOPPING</div></a>
							 
						</div>      
						</div>
						 
					</div>
		
	</div>
</div>

@endsection