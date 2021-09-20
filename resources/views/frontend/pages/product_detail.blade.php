@extends('frontend.layouts.master')

@section('meta')
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name='copyright' content=''>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="keywords" content="online shop, purchase, cart, ecommerce site, best online shopping">
	<meta name="description" content="{{$product_detail->summary}}">
	<meta property="og:url" content="{{route('product-detail',$product_detail->slug)}}">
	<meta property="og:type" content="article">
	<meta property="og:title" content="{{$product_detail->title}}">
	<meta property="og:image" content="{{$product_detail->photo}}">
	<meta property="og:description" content="{{$product_detail->description}}">
@endsection
@section('title','E-SHOP || PRODUCT DETAIL')
@section('main-content')

       @php
        $settings=DB::table('settings')->get();
       @endphp 
        @foreach($settings as $key=>$banner)
        @endforeach
        @php $a= preg_split ("/\,/", $banner->page_banners); @endphp
   <!--Page Title-->
    <section class="page-title" style="background-image:url({{$a[3]}})">
        <div class="auto-container">
            <h1>{{$product_detail->title}}</h1>
            <ul class="page-breadcrumb">
                <li><a href="index.html">home</a></li>
                <li><a href="shop.html">Products</a></li>
                <li>{{$product_detail->title}}</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->

    <!--Sidebar Page Container-->
    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">

                <!--Content Side-->
                <div class="content-side col-lg-9 col-md-12 col-sm-12">
                    <div class="shop-single">
                        <!-- Product Detail -->
                        <div class="product-details">
                            <!--Basic Details-->
                            <div class="basic-details">
                                <div class="row clearfix">
                                    <div class="image-column col-md-6 col-sm-12">
                                    	@php 
														$photo=explode(',',$product_detail->photo);
													// dd($photo);
													@endphp
														<figure class="image"><a href="{{$photo[0]}}" class="lightbox-image" title="Image Caption Here"><img src="{{$photo[0]}}" alt="{{$photo[0]}}"><span class="icon fa fa-search"></span></a>
														</figure>
                                        
                                    </div>
                                    <div class="info-column col-md-6 col-sm-12">
                                        <div class="details-header">
                                            <h4>{{$product_detail->title}}</h4>
                                            <div class="rating">
                                               @php
															$rate=ceil($product_detail->getReview->avg('rate'))
														@endphp
															@for($i=1; $i<=5; $i++)
																@if($rate>=$i)
																	<span class="fa fa-star"></span>
																@else 
																	<span class="fa fa-star-o"></span>
																@endif
															@endfor
                                            </div>
                                            <a class="reviews" href="#">({{$product_detail['getReview']->count()}}) Review</a>
                                            @php 
                                                    $after_discount=($product_detail->price-(($product_detail->price*$product_detail->discount)/100));
                                                @endphp
                                            <div class="item-price">${{number_format($after_discount,2)}}
                                            	<s>${{number_format($product_detail->price,2)}}</s></div>
                                            <div class="text">{!!($product_detail->summary)!!}</div>

                                        </div>

                                        <div class="other-options clearfix">
                                        	<form action="{{route('single-add-to-cart')}}" method="POST">
													@csrf 
                                            <div class="item-quantity">Quantity <input type="hidden" name="slug" value="{{$product_detail->slug}}"> <input class="qty" type="number" value="1" name="quant[1]" id="quantity"></div>
                                            <a href="{{route('add-to-cart',$product_detail->slug)}}"><button type="button" class="theme-btn add-to-cart"><span class="btn-title">Add To Cart</span></button></a>
                                            <ul class="product-meta">
                                                <li class="posted_in">Category: <a href="#">{{$product_detail->cat_info['title']}}</a></li>
                                               <!--  <li class="tagged_as">Tag: <a href="#">Nuts</a></li> -->
                                            </ul>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Basic Details-->
                            
                            <!--Product Info Tabs-->
                            <div class="product-info-tabs">
                                <!--Product Tabs-->
                                <div class="prod-tabs tabs-box">
                                
                                    <!--Tab Btns-->
                                    <ul class="tab-btns tab-buttons clearfix">
                                        <li data-tab="#prod-details" class="tab-btn">Descripton</li>
                                        <li data-tab="#prod-reviews" class="tab-btn active-btn">Review ({{$product_detail['getReview']->count()}})</li>
                                    </ul>
                                    
                                    <!--Tabs Container-->
                                    <div class="tabs-content">
                                        
                                        <!--Tab-->
                                        <div class="tab" id="prod-details">
                                            <h2 class="title">Descripton</h2>
                                            <div class="content">
                                                <p>{!! ($product_detail->description) !!}</p>
                                            </div>
                                        </div>
                                        
                                        <!--Tab-->
                                        <div class="tab active-tab" id="prod-reviews">
                                            <h2 class="title">{{$product_detail['getReview']->count()}} reviews for {{$product_detail->title}}</h2>
                                            <!--Reviews Container-->
                                            <div class="comments-area">
                                                {{-- @php 
                                                     $rate=0;
                                                        foreach($product_detail->rate as $key=>$rate){
                                                             $rate +=$rate
                                                            }
                                                @endphp --}}
                                                @foreach($product_detail['getReview'] as $data)
                                                <!--Comment Box-->
                                                <div class="comment-box">
                                                    <div class="comment">
                                                        <div class="author-thumb"><img src="https://via.placeholder.com/60x60" alt=""></div>
                                                        <div class="comment-inner">
                                                            <div class="comment-info clearfix">
                                                                <strong class="name">{{$data->name}}</strong> 
                                                                <span class="date">– {{$data->created_at->format('d M')}}</span>
                                                            </div> 
                                                            <div class="rating">
                                                                @for($i=1; $i<=5; $i++)
                                                                                        @if($data->rate>=$i)
                                                                                            <li><i class="fa fa-star"></i></li>
                                                                                        @else 
                                                                                            <li><i class="fa fa-star-o"></i></li>
                                                                                        @endif
                                                                                    @endfor
                                                            </div>
                                                            <div class="text">{{$data->review}}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                                
                                            </div>
                                            
                                            <!--Comment Form-->
                                            <div class="comment-form">
                                                <div class="sub-title">Add a review</div>
                                                <div class="form-outer">
                                                    <p>Your email address will not be published. Required fields are marked *</p>
                                                    
                                                    <form class="form" method="post" action="{{route('review.store',$product_detail->slug)}}">
                                                                    @csrf
                                                        <div class="rating-box">
                                                        <div class="field-label">Your Rating</div>
                                                        <div class="rating_box">
                                                                                  <div class="star-rating">
                                                                                    <div class="star-rating__wrap">
                                                                                      <input class="star-rating__input" id="star-rating-5" type="radio" name="rate" value="5">
                                                                                      <label class="star-rating__ico fa fa-star-o" for="star-rating-5" title="5 out of 5 stars"></label>
                                                                                      <input class="star-rating__input" id="star-rating-4" type="radio" name="rate" value="4">
                                                                                      <label class="star-rating__ico fa fa-star-o" for="star-rating-4" title="4 out of 5 stars"></label>
                                                                                      <input class="star-rating__input" id="star-rating-3" type="radio" name="rate" value="3">
                                                                                      <label class="star-rating__ico fa fa-star-o" for="star-rating-3" title="3 out of 5 stars"></label>
                                                                                      <input class="star-rating__input" id="star-rating-2" type="radio" name="rate" value="2">
                                                                                      <label class="star-rating__ico fa fa-star-o" for="star-rating-2" title="2 out of 5 stars"></label>
                                                                                      <input class="star-rating__input" id="star-rating-1" type="radio" name="rate" value="1">
                                                                                      <label class="star-rating__ico fa fa-star-o" for="star-rating-1" title="1 out of 5 stars"></label>
                                                                                      @error('rate')
                                                                                        <span class="text-danger">{{$message}}</span>
                                                                                      @enderror
                                                                                    </div>
                                                                                  </div>
                                                                            </div>
                                                    </div>
                                                        <div class="row clearfix">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                                                <div class="field-label">Your review *</div>
                                                                <textarea name="review" placeholder=""></textarea>
                                                            </div>

                                                            <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                                                <div class="field-label">Name *</div>
                                                                <input type="text" name="name" placeholder="" required="">
                                                            </div>
                                                            
                                                            <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                                                <div class="field-label">Email *</div>
                                                                <input type="email" name="email" placeholder="" required="">
                                                            </div>

                                                            <div class="col-lg-12 col-md-12 col-sm-12 form-group text-right">
                                                                <input type="submit" name="submit" value="Submit">
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                            <!--End Product Info Tabs-->
                            
                            <!-- Related Products -->
                            <div class="related-products">
                                <div class="sec-title">
                                    <h2>Related products</h2>
                                </div>

                                <div class="row clearfix">
                                 {{-- {{dd($recent_products)}} --}}
                                  @php
                                    $recent_products=DB::table('products')
                                    ->where('status','active')
                                    ->where('cat_id', $product_detail->cat_id)
                                    ->orderBy('id','DESC')->limit(3)->get()
                                   @endphp 
                                    @foreach($recent_products as $product)
                                        <!-- Single Post -->
                                        @php 
                                            $photo=explode(',',$product->photo);
                                        @endphp
                                     <!-- Shop Item --> 
                                    <div class="shop-item col-lg-4 col-md-6 col-sm-12">
                                        <div class="inner-box">
                                            <div class="image-box">
                                                <figure class="image"><a href="{{route('product-detail',$product->slug)}}l"><img src="{{$photo[0]}}" alt="{{$photo[0]}}"></a></figure>
                                                <div class="btn-box"><a href="{{route('add-to-cart',$product->slug)}}">Add to cart</a></div>
                                            </div>
                                            <div class="lower-content">
                                                <h4 class="name"><a href="{{route('product-detail',$product->slug)}}">{{$product->title}}</a></h4>
                                                <div class="rating">
                                                    @php
                                                            $rate=DB::table('product_reviews')->where('product_id',$product->id)->avg('rate');
                                                            $rate_count=DB::table('product_reviews')->where('product_id',$product->id)->count();
                                                        @endphp
                                                        @for($i=1; $i<=5; $i++)
                                                            @if($rate>=$i)
                                                                <i class="yellow fa fa-star"></i>
                                                            @else 
                                                            <i class="fa fa-star"></i>
                                                            @endif
                                                        @endfor
                                                </div>
                                                <div class="price">  @php
                                                    $org=($product->price-($product->price*$product->discount)/100);
                                                @endphp
                                                <del class="text-muted">${{number_format($product->price,2)}}</del>   ${{number_format($org,2)}}
                                            </div>
                                            </div>
                                        </div>
                                    </div>

                                  @endforeach
                                </div>
                            </div><!-- End Related Products -->
                        </div><!-- Product Detail -->
                    </div><!-- End Shop Single -->
                </div>
                
                <!--Sidebar Side-->
                <div class="sidebar-side sticky-container col-lg-3 col-md-12 col-sm-12">
                    <aside class="sidebar theiaStickySidebar">
                        <div class="sticky-sidebar">
                            <!-- Search Widget -->
                            <!-- <div class="sidebar-widget search-widget">
                                <form method="post" action="contact.html">
                                    <div class="form-group">
                                        <input type="search" name="search-field" value="" placeholder="Search products…" required>
                                        <button type="submit"><span class="icon fa fa-search"></span></button>
                                    </div>
                                </form>
                            </div> -->
                            
                            <!-- Cart Widget -->
                            <div class="sidebar-widget cart-widget">
                                <div class="widget-content">
                                    <h3 class="widget-title">Cart</h3>
                                    
                                     <div class="shopping-cart">
                                <ul class="shopping-cart-items">
                                    {{-- {{Helper::getAllProductFromCart()}} --}}
                                            @foreach(Helper::getAllProductFromCart() as $data)
                                                    @php
                                                        $photo=explode(',',$data->product['photo']);
                                                    @endphp
                                    <li class="cart-item">
                                        <img src="{{$photo[0]}}" alt="{{$photo[0]}}" class="thumb" />
                                        <span class="item-name">{{$data->product['title']}}</span>
                                        <span class="item-quantity">{{$data->quantity}}  x <span class="item-amount">${{number_format($data->price,2)}}</span></span>
                                        <a href="#" class="product-detail"></a>
                                       
                                    </li>
                                    <a href="{{route('cart-delete',$data->id)}}"><span class="fa fa-times"></span></a>
                                    @endforeach
                                </ul>
                                 @if(Helper::totalCartPrice() > 0)
                                <div class="cart-footer">
                                    <div class="shopping-cart-total"><strong>Subtotal:</strong> ${{Helper::totalCartPrice()}}</div>
                                    <a href="{{route('cart')}}" class="theme-btn">View Cart</a>
                                    <a href="{{route('checkout')}}" class="theme-btn">Checkout</a>
                                </div>
                                @else
                                <div class="cart-footer">
                                    <div class="shopping-cart-total"><strong>No Product</strong></div>
                                    <a href="{{route('product-grids')}}" class="theme-btn">goto shop</a>
                                </div>
                                @endif
                            </div> <!--end shopping-cart -->
                                </div>
                            </div>

                            <!-- Tags Widget -->
                             <div class="sidebar-widget tags-widget">
                                <h3 class="widget-title">Tags</h3>
                                <ul class="tag-list clearfix">
                                    
                                     @php
                                            $brands=DB::table('brands')->orderBy('title','ASC')->where('status','active')->get();
                                        @endphp
                                        @foreach($brands as $brand)
                                            <li><a href="{{route('product-brand',$brand->slug)}}">{{$brand->title}}</a></li>
                                        @endforeach
                                </ul>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <!--End Sidebar Page Container-->
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    {{-- <script>
        $('.cart').click(function(){
            var quantity=$('#quantity').val();
            var pro_id=$(this).data('id');
            // alert(quantity);
            $.ajax({
                url:"{{route('add-to-cart')}}",
                type:"POST",
                data:{
                    _token:"{{csrf_token()}}",
                    quantity:quantity,
                    pro_id:pro_id
                },
                success:function(response){
                    console.log(response);
					if(typeof(response)!='object'){
						response=$.parseJSON(response);
					}
					if(response.status){
						swal('success',response.msg,'success').then(function(){
							document.location.href=document.location.href;
						});
					}
					else{
                        swal('error',response.msg,'error').then(function(){
							document.location.href=document.location.href;
						});
                    }
                }
            })
        });
    </script> --}}

@endpush