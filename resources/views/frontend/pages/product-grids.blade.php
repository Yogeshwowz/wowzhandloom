@extends('frontend.layouts.master')

@section('title','E-SHOP || SHOP')

@section('main-content')
<!-- Product Style -->

       @php
        $settings=DB::table('settings')->get();
       @endphp 
        @foreach($settings as $key=>$banner)
        @endforeach
        @php $a= preg_split ("/\,/", $banner->page_banners); @endphp
<!--Page Title-->
<section class="page-title" style="background-image:url({{$a[2]}})">
        <div class="auto-container">
            <h1>Shop</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{route('home')}}">home</a></li>
                <li>Shop</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->
<form action="{{route('shop.filter')}}" method="POST">
      @csrf
    <!--Sidebar Page Container-->
    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">

                <!--Content Side-->
                <div class="content-side col-lg-9 col-md-12 col-sm-12">
                    <div class="our-shop shop-top">
                        <div class="shop-upper-box clearfix shop-shorter">
                            <div class="single-shorter">
                                            <label>Show :</label>
                                            <select class="show" name="show" onchange="this.form.submit();">
                                                <option value="">Default</option>
                                                <option value="9" @if(!empty($_GET['show']) && $_GET['show']=='9') selected @endif>09</option>
                                                <option value="15" @if(!empty($_GET['show']) && $_GET['show']=='15') selected @endif>15</option>
                                                <option value="21" @if(!empty($_GET['show']) && $_GET['show']=='21') selected @endif>21</option>
                                                <option value="30" @if(!empty($_GET['show']) && $_GET['show']=='30') selected @endif>30</option>
                                            </select>
                                        </div>
                                        <div class="single-shorter orderby">
                                            <select class='sortBy sortby-select select2-offscreen' name='sortBy' onchange="this.form.submit();">
                                                <option value="">Sort By</option>
                                                <option value="title" @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='title') selected @endif>Sort By Name</option>
                                                <option value="price" @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='price') selected @endif>Sort By Price</option>
                                                <option value="category" @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='category') selected @endif>Sort By Category</option>
                                               <!--  <option value="brand" @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='brand') selected @endif>Sort By Tag</option> -->
                                            </select>
                                        </div>
                        </div>
          
                        <div class="row clearfix">
                            
                           

                        
                            @if(count($products)>0)
                                @foreach($products as $product)
                      
                            <!-- Shop Item --> 
                            <div class="single-product shop-item col-lg-4 col-md-6 col-sm-12">
                                <div class="inner-box">
                                    <div class="image-box">
                                    @if($product->discount)
                                                            
                                    <div class="sale-tag">{{$product->discount}}% Off</div>
                                    @endif
                                                     @php 
                                                        $photo=explode(',',$product->photo);
                                                    @endphp
                                        <figure class="image"><a href="{{route('product-detail',$product->slug)}}"><img src="{{$photo[0]}}" alt="{{$photo[0]}}"></a></figure>
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
                                                                <span class="yellow fa fa-star"></span>
                                                            @else 
                                                            <i class="fa fa-star"></i>
                                                            @endif
                                                        @endfor
                                        </div>
                                        @php
                                                    $after_discount=($product->price-($product->price*$product->discount)/100);
                                                @endphp
                                                <span class="price">${{number_format($after_discount,2)}}</span>
                                                <del style="padding-left:4%;">${{number_format($product->price,2)}}</del>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @else
                                    <h4 class="text-warning" style="margin:100px auto;">There are no products.</h4>
                            @endif
                           
                        </div>
                           
                    </div>
                </div>
          </form>            
                <!--Sidebar Side-->
                <div class="sidebar-side sticky-container col-lg-3 col-md-12 col-sm-12">
                    <aside class="sidebar theiaStickySidebar">
                        <div class="sticky-sidebar">
                            <!-- Search Widget -->
                            <div class="sidebar-widget search-widget">
                                <form method="POST" action="{{route('product.search')}}">
                                @csrf
                                    <div class="form-group">
                                        <input type="search" name="search" value="" placeholder="Search products…" required>
                                        <button type="submit"><span class="icon fa fa-search"></span></button>
                                    </div>
                                </form>
                            </div>
                            <br/>
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

<form action="{{route('shop.filter')}}" method="POST">
        @csrf
         <div class="sidebar-widget category">
                                    <h3 class="title pb-3">Categories</h3>
                                    <ul class="categor-list">
                                        @php
                                            // $category = new Category();
                                            $menu=App\Models\Category::getAllParentWithChild();
                                        @endphp
                                        @if($menu)
                                        <li>
                                            @foreach($menu as $cat_info)
                                                    @if($cat_info->child_cat->count()>0)
                                                        <li><a href="{{route('product-cat',$cat_info->slug)}}">{{$cat_info->title}}</a>
                                                            <ul style="padding-left: 20px !important;">
                                                                @foreach($cat_info->child_cat as $sub_menu)
                                                                    <li><a href="{{route('product-sub-cat',[$cat_info->slug,$sub_menu->slug])}}">{{$sub_menu->title}}</a></li>
                                                                @endforeach
                                                            </ul>
                                                        </li>
                                                    @else
                                                        <li><a href="{{route('product-cat',$cat_info->slug)}}">{{$cat_info->title}}</a></li>
                                                    @endif
                                            @endforeach
                                        </li>
                                        @endif
                                        {{-- @foreach(Helper::productCategoryList('products') as $cat)
                                            @if($cat->is_parent==1)
                                                <li><a href="{{route('product-cat',$cat->slug)}}">{{$cat->title}}</a></li>
                                            @endif
                                        @endforeach --}}
                                    </ul>

                                </div>
                            <!-- Range Slider Widget -->
                            <div class="sidebar-widget rangeslider-widget">
                                <div class="widget-content">
                                    <h3 class="widget-title">Price Filter</h3>
                                    
                                    <div class="range-slider-one clearfix">
                                        <div class="price-range-slider"></div>
                                        <div class="clearfix">
                                            <div class="pull-left input-box">
                                                <div class="title">Price:</div>
                                                <div class="input"><input type="text" class="property-amount" name="price_range" readonly></div>
                                            </div>
                                            <div class="pull-right btn-box">
                                                <button type="submit" class="theme-btn"><span class="btn-title">Filtter</span></button>
                                            </div>
                                        </div>
                                    </div>
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
</form>   
@endsection
@push('styles')
<style>
    .pagination{
        display:inline-flex;
    }
    .filter_button{
        /* height:20px; */
        text-align: center;
        background:#F7941D;
        padding:8px 16px;
        margin-top:10px;
        color: white;
    }
</style>
@endpush
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    {{-- <script>
        $('.cart').click(function(){
            var quantity=1;
            var pro_id=$(this).data('id');
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
							// document.location.href=document.location.href;
						});
                    }
                }
            })
        });
    </script> --}}
    <script>
        $(document).ready(function(){
        /*----------------------------------------------------*/
        /*  Jquery Ui slider js
        /*----------------------------------------------------*/
        if ($("#slider-range").length > 0) {
            const max_value = parseInt( $("#slider-range").data('max') ) || 500;
            const min_value = parseInt($("#slider-range").data('min')) || 0;
            const currency = $("#slider-range").data('currency') || '';
            let price_range = min_value+'-'+max_value;
            if($("#price_range").length > 0 && $("#price_range").val()){
                price_range = $("#price_range").val().trim();
            }
            
            let price = price_range.split('-');
            $("#slider-range").slider({
                range: true,
                min: min_value,
                max: max_value,
                values: price,
                slide: function (event, ui) {
                    $("#amount").val(currency + ui.values[0] + " -  "+currency+ ui.values[1]);
                    $("#price_range").val(ui.values[0] + "-" + ui.values[1]);
                }
            });
            }
        if ($("#amount").length > 0) {
            const m_currency = $("#slider-range").data('currency') || '';
            $("#amount").val(m_currency + $("#slider-range").slider("values", 0) +
                "  -  "+m_currency + $("#slider-range").slider("values", 1));
            }
        })
    </script>
@endpush