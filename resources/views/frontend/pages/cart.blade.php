@extends('frontend.layouts.master')
@section('title','Cart Page')
@section('main-content')



  <!--Page Title-->
    <section class="page-title" style="background-image:url(https://via.placeholder.com/1920x400)">
        <div class="auto-container">
            <h1>Cart</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{route('home')}}">home</a></li>
                <li>Cart</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->

    <!--Cart Section-->
    <section class="cart-section">
        <div class="auto-container">
            <!--Cart Outer-->
            <div class="cart-outer">
                <div class="table-outer">
                    <table class="cart-table">
                        <thead class="cart-header">
                            <tr>
                                <th class="product-thumbnail">&nbsp;</th>
                                <th class="product-name">Product</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-subtotal">Total</th>
                                <th class="product-remove">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<form action="{{route('cart.update')}}" method="POST">
								@csrf
								@if(Helper::getAllProductFromCart())
									@foreach(Helper::getAllProductFromCart() as $key=>$cart)
                            <tr class="cart-item">
                            	@php 
											$photo=explode(',',$cart->product['photo']);
											@endphp
                                <td class="product-thumbnail"><a href="shop-single.html"><img src="{{$photo[0]}}" alt="{{$photo[0]}}"></a></td>
                                <td class="product-name"><a href="shop-single.html">{{$cart->product['title']}}</a></td>
                                <td class="product-price">${{number_format($cart['price'],2)}}</td> 
                                <td class="product-quantity"><div class="quantity"><label>Quantity</label><input type="number" class="qty" name="quant[{{$key}}]" value="{{$cart->quantity}}">
                                <input type="hidden" name="qty_id[]" value="{{$cart->id}}"></div></td>
                                <td class="product-subtotal"><span class="amount">${{$cart['amount']}}</span></td>
                                <td class="product-remove"> <a href="{{route('cart-delete',$cart->id)}}" class="remove"><span class="fa fa-times"></span></a></td>
                            </tr>

                            	@endforeach
									<track>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td class="float-right">
											<button class="btn float-right theme-btn proceed-btn" type="submit">Update</button>
										</td>
									</track>
								@else 
										<tr>
											<td class="text-center">
												There are no any carts available. <a href="{{route('product-grids')}}" style="color:blue;">Continue shopping</a>

											</td>
										</tr>
								@endif
								
							</form>
                        </tbody>
                    </table>
                </div>

            <div class="row justify-content-between">                    
                <div class="column col-lg-4 offset-lg-8 col-md-6 col-sm-12">
                    <!--Totals Table-->
                    <ul class="totals-table">
                        <li><h3>Cart Totals</h3></li>
                        <li class="clearfix" data-price="{{Helper::totalCartPrice()}}"><span class="col">Subtotal</span><span class="col price">${{number_format(Helper::totalCartPrice(),2)}}</span></li>
                        <li class="clearfix"><span class="col">Total</span><span class="col total-price">${{number_format(Helper::totalCartPrice(),2)}}</span></li>
                        <li class="text-right"><a href="{{route('checkout')}}"><button type="submit" class="theme-btn proceed-btn">Proceed to Checkout</button></a></li>
                    </ul>
                </div>  
            </div>
        </div>
    </section>
    <!--End Cart Section-->
@endsection
@push('scripts')
	<script src="{{asset('frontend/js/nice-select/js/jquery.nice-select.min.js')}}"></script>
	<script src="{{ asset('frontend/js/select2/js/select2.min.js') }}"></script>
	<script>
		$(document).ready(function() { $("select.select2").select2(); });
  		$('select.nice-select').niceSelect();
	</script>
	<script>
		$(document).ready(function(){
			$('.shipping select[name=shipping]').change(function(){
				let cost = parseFloat( $(this).find('option:selected').data('price') ) || 0;
				let subtotal = parseFloat( $('.order_subtotal').data('price') ); 
				let coupon = parseFloat( $('.coupon_price').data('price') ) || 0; 
				// alert(coupon);
				$('#order_total_price span').text('$'+(subtotal + cost-coupon).toFixed(2));
			});

		});

	</script>

@endpush