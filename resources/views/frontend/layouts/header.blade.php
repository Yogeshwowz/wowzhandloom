<div class="page-wrapper">

    <!-- Main Header-->
    <header class="main-header">
        <!-- Menu Wave -->
        <div class="menu_wave"></div>

        <!-- Main box -->
        <div class="main-box">
            <div class="menu-box">
                <div class="logo">
                        @php
                            $settings=DB::table('settings')->get();
                        @endphp                    
                        <a href="{{route('home')}}"><img src="@foreach($settings as $data) {{$data->logo}} @endforeach" alt="logo"></a>
                </div>
                <!--Nav Box-->
                <div class="nav-outer clearfix">
                    <!-- Main Menu -->
                    <nav class="main-menu navbar-expand-md navbar-light">
                        <div class="collapse navbar-collapse clearfix" id="navbarSupportedContent">
                            <ul class="navigation menu-left clearfix">
                                <li class="{{Request::path()=='/' ? 'current' : ''}}"><a href="{{route('home')}}">Home</a>
                                  
                                </li>
                                <li class="{{Request::path()=='about-us' ? 'current' : ''}}"><a href="{{route('about-us')}}">About Us</a></li>
                                <!-- <li class="{{Request::path()=='portfolio' ? 'current' : ''}}"><a href="{{route('portfolio')}}">Portfolio</a>
                                   
                                </li> -->
                            </ul>

                            <ul class="navigation menu-right clearfix">
                                <li class="{{Request::path()=='blog' ? 'current' : ''}}"><a href="{{route('blog')}}">Blog</a></li>
                                <li class="{{Request::path()=='product-grids' ? 'current' : ''}}"><a href="{{route('product-grids')}}">Shop</a> </li>
                                <li class="{{Request::path()=='contact' ? 'current' : ''}}"><a href="{{route('contact')}}">Contacts</a></li>
                            </ul>
                        </div>
                    </nav>

                                        <!-- Main Menu End-->
                    <div class="outer-box clearfix">
                        <!-- Shoppping Car -->
                        <div class="cart-btn">
                            <a href="{{route('cart')}}"><i class="icon flaticon-commerce"></i> <span class="count">{{Helper::cartCount()}}</span></a>

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
                                       <a href="{{route('cart-delete',$data->id)}}"> <button class="remove-item"><span class="fa fa-times"></span></button></a>
                                    </li>
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

                        <!-- Search Btn -->
                        <div class="search-box">
                            <button class="search-btn"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sticky Header  -->
        <div class="sticky-header">
            <div class="auto-container clearfix">
                <!--Logo-->
                <div class="logo">
                        @php
                            $settings=DB::table('settings')->get();
                        @endphp                    
                    <a href="{{route('home')}}"><img src="@foreach($settings as $data) {{$data->stickylogo}} @endforeach" alt="logo"></a>
                </div>

                <!--Nav Outer-->
                <div class="nav-outer">
                    <!-- Main Menu -->
                    <nav class="main-menu">
                        <!--Keep This Empty / Menu will come through Javascript-->
                    </nav><!-- Main Menu End-->
                </div>
            </div>
        </div><!-- End Sticky Menu -->

        <!-- Mobile Header -->
        <div class="mobile-header">
                        @php
                            $settings=DB::table('settings')->get();
                        @endphp                    
                    <a href="{{route('home')}}"><img src="@foreach($settings as $data) {{$data->stickylogo}} @endforeach" alt="logo"></a>
                
            <!--Nav Box-->
            <div class="nav-outer clearfix">
                <!--Keep This Empty / Menu will come through Javascript-->
            </div>
        </div>

        <!-- Mobile Menu  -->
        <div class="mobile-menu">            
            <nav class="menu-box">
                <div class="nav-logo"><a href="{{route('home')}}"><img src="@foreach($settings as $data) {{$data->stickylogo}} @endforeach" alt="" title=""></a></div> 
                <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
            </nav>
        </div><!-- End Mobile Menu -->

        <!-- Header Search -->
        <div class="search-popup">
            <span class="search-back-drop"></span>
            
            <div class="search-inner">
                <button class="close-search"><span class="fa fa-times"></span></button>
                <form method="post" action="{{route('product.search')}}">
                     @csrf
                    <div class="form-group">
                        <input type="search" name="search" value="" placeholder="Search..." required="">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <!-- End Header Search -->

    </header>
    <!--End Main Header -->