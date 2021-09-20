@extends('frontend.layouts.master')

@section('title','E-SHOP || About Us')

@section('main-content')
    <!--Page Title-->
    @php
        $settings=DB::table('settings')->get();
       @endphp 
        @foreach($settings as $key=>$banner)
        @endforeach
        @php $a= preg_split ("/\,/", $banner->page_banners); @endphp
    <section class="page-title" style="background-image:url({{$a[0]}})">
        <div class="auto-container">
            <h1>About Us</h1>
            <ul class="page-breadcrumb">
                <li><a href="/">home</a></li>
                <li>About Us</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->
       @php
        $abouts=DB::table('abouts')->get();
       @endphp 
       @foreach($abouts as $key=>$about)
        @endforeach
    <!-- About Section Two -->
    <section class="about-section-two alternate" style="background-image: url({{$about->story_background}});">
        <div class="auto-container">
            <div class="sec-title text-center">
                <div class="divider"><img src="images/icons/divider_1.png" alt=""></div>
                <h2>Our Story</h2>
            </div>
            <div class="content-box">
                <span class="devider_icon_one"></span>
                <p>{{$about->our_story}}</p>
            </div>
            
        </div>
    </section>
    <!--End About Section -->

    <!-- Chef Section -->
    <section class="chef-section" style="background-image: url({{$about->section2_background}});">
        <div class="auto-container">
            <div class="row">
                <div class="content-column col-lg-6 col-md-12 col-sm-12 order-2">
                    <div class="inner-column">                    
                        <div class="content">
                            <div class="sec-title text-center">
                                <div class="divider"><img src="{{asset('front_asset/images/icons/divider_4.png')}}" alt=""></div>
                                <h2>{{$about->name}}</h2>
                            </div>
                            <h4>{{$about->position}}</h4>
                            <div class="divider"><img src="{{asset('front_asset/images/icons/icon-devider.png')}}" alt=""></div>
                            <p>{{$about->descreption}}</p>
                            <!-- <div class="btn-box">
                                <a href="#" class="theme-btn btn-style-two regular alt"><span></span>Our Services<span></span></a>
                            </div> -->
                        </div>
                    </div>
                </div>

                <div class="image-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <figure class="image"><img src="{{$about->side_image}}" alt=""></figure>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Chef Section -->

	
@endsection