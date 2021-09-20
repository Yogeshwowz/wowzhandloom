@extends('frontend.layouts.master')
@section('title','E-SHOP || HOME PAGE')
@section('main-content')

<!--Main Slider-->
<section class="main-slider">
        <div class="slider_wave"></div>
        <div class="rev_slider_wrapper fullwidthbanner-container"  id="rev_slider_one_wrapper" data-source="gallery">
            <div class="rev_slider fullwidthabanner" id="rev_slider_one" data-version="5.4.1">
                <ul>
                    @if(count($banners)>0)
                    @php $layer = 4; $s=4; $l=44; $c=40; $rs=33; $cr=31; $lfive=41; $lsix=42; $lsev=43; @endphp
                    @foreach($banners as $key=>$banner)
                    <li data-index="rs-{{$layer}}" data-transition="zoomout" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="850"  data-thumb="#"  data-delay="5999"  data-rotate="0"  data-saveperformance="off"  data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                    
                    <!-- MAIN IMAGE -->
                    <img src="{{$banner->photo}}"  alt="" title="Home Cakes"  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                    <!-- LAYERS -->

                    <!-- LAYER NR. 1 -->
                    <div class="tp-caption tp-shape tp-shapewrapper  tp-resizeme" 
                        id="slide-{{$s}}-layer-{{$l}}" 
                        data-x="center" data-hoffset="1" 
                        data-y="center" data-voffset="-3" 
                        data-width="['full','full','full','full']"
                        data-height="['full','full','full','full']"
                        data-type="shape" 
                        data-basealign="slide" 
                        data-responsive_offset="on" 
                        data-frames='[{"delay":10,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                        data-textAlign="['inherit','inherit','inherit','inherit']"
                        data-paddingtop="[0,0,0,0]"
                        data-paddingright="[0,0,0,0]"
                        data-paddingbottom="[0,0,0,0]"
                        data-paddingleft="[0,0,0,0]"
                        style="z-index: 5;background-color:rgba(80,81,92,0.15);"></div>

                    <!-- LAYER NR. 2 -->
                    <div class="tp-caption   tp-resizeme" 
                        id="slide-{{$s}}-layer-{{$c}}" 
                        data-x="center" data-hoffset="" 
                        data-y="center" data-voffset="" 
                        data-width="['none','none','none','none']"
                        data-height="['none','none','none','none']"
                        data-type="image" 
                        data-responsive_offset="on"
                        data-frames='[{"delay":500,"speed":1000,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                        data-textAlign="['inherit','inherit','inherit','inherit']"
                        data-paddingtop="[0,0,0,0]"
                        data-paddingright="[0,0,0,0]"
                        data-paddingbottom="[0,0,0,0]"
                        data-paddingleft="[0,0,0,0]"
                        style="z-index: 6;"><img src="{{asset('front_asset/images/main-slider/slider_bg_1.png')}}" alt="" data-ww="654px" data-hh="654px" width="654" height="654" data-no-retina> </div>

                    <!-- LAYER NR. 3 -->
                    <div class="tp-caption   tp-resizeme" 
                        id="slide-{{$s}}-layer-{{$rs}}" 
                        data-x="center" data-hoffset="" 
                        data-y="center" data-voffset="100" 
                        data-width="['auto']"
                        data-height="['auto']"
                        data-visibility="['on','on','off','off']"
                        data-type="text" 
                        data-responsive_offset="on" 
                        data-frames='[{"delay":500,"speed":1000,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"nothing"}]'
                        data-textAlign="['center','center','center','center']"
                        data-paddingtop="[0,0,0,0]"
                        data-paddingright="[0,0,0,0]"
                        data-paddingbottom="[0,0,0,0]"
                        data-paddingleft="[0,0,0,0]"
                        style="z-index: 7; white-space: nowrap; font-size: 16px; line-height: 24px; font-weight: 400; color: #4b4342;font-family:ABeeZee;">{!! html_entity_decode($banner->description) !!}</div>

                    <!-- LAYER NR. 4 -->
                    <div class="tp-caption   tp-resizeme" 
                        id="slide-{{$s}}-layer-{{$cr}}" 
                        data-x="center" data-hoffset="" 
                        data-y="center" data-voffset="-18" 
                        data-width="['399']"
                        data-height="['auto']"
                        data-type="text" 
                        data-responsive_offset="on" 
                        data-frames='[{"delay":500,"speed":1000,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"nothing"}]'
                        data-textAlign="['center','center','center','center']"
                        data-paddingtop="[0,0,0,0]"
                        data-paddingright="[0,0,0,0]"
                        data-paddingbottom="[0,0,0,0]"
                        data-paddingleft="[0,0,0,0]"
                        style="z-index: 8; min-width: 399px; max-width: 399px; white-space: normal; font-size: 72px; line-height: 72px; font-weight: 400; color: #4b4342;font-family:Leckerli One;">{{$banner->title}}</div>

                    <!-- LAYER NR. 5 -->
                    <div class="tp-caption   tp-resizeme" 
                        id="slide-{{$s}}-layer-{{$lfive}}" 
                        data-x="center" data-hoffset="" 
                        data-y="center" data-voffset="-150" 
                        data-width="['none','none','none','none']"
                        data-height="['none','none','none','none']"
                        data-type="image" 
                        data-responsive_offset="on" 
                        data-frames='[{"delay":500,"speed":1000,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                        data-textAlign="['inherit','inherit','inherit','inherit']"
                        data-paddingtop="[0,0,0,0]"
                        data-paddingright="[0,0,0,0]"
                        data-paddingbottom="[0,0,0,0]"
                        data-paddingleft="[0,0,0,0]"
                        style="z-index: 9;"><img src="{{asset('front_asset/images/main-slider/slider_bg_4.png')}}" alt="" data-ww="125px" data-hh="60px" width="125" height="60" data-no-retina> </div>

                    <!-- LAYER NR. 6 -->
                    <div class="tp-caption tp-resizeme hide-sm" 
                        id="slide-{{$s}}-layer-{{$lsix}}" 
                        data-x="398" 
                        data-y="center" data-voffset="" 
                        data-width="['none','none','none','none']"
                        data-height="['none','none','none','none']"
                        data-type="image" 
                        data-responsive_offset="on" 
                        data-frames='[{"delay":500,"speed":1000,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                        data-textAlign="['inherit','inherit','inherit','inherit']"
                        data-paddingtop="[0,0,0,0]"
                        data-paddingright="[0,0,0,0]"
                        data-paddingbottom="[0,0,0,0]"
                        data-paddingleft="[0,0,0,0]"
                        style="z-index: 10;"><img src="{{asset('front_asset/images/main-slider/slider_bg_3.png')}}" alt="" data-ww="196px" data-hh="107px" width="196" height="107" data-no-retina> </div>

                        <!-- LAYER NR. 7 -->
                        <div class="tp-caption tp-resizeme hide-sm" 
                            id="slide-{{$s}}-layer-{{$lsev}}" 
                            data-x="1325" 
                            data-y="center" data-voffset="" 
                            data-width="['none','none','none','none']"
                            data-height="['none','none','none','none']"
                            data-type="image" 
                            data-responsive_offset="on" 
                            data-frames='[{"delay":500,"speed":1000,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                            data-textAlign="['inherit','inherit','inherit','inherit']"
                            data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]"
                            data-paddingbottom="[0,0,0,0]"
                            data-paddingleft="[0,0,0,0]"
                            style="z-index: 11;"><img src="{{asset('front_asset/images/main-slider/slider_bg_2.png')}}" alt="" data-ww="196px" data-hh="107px" width="196" height="107" data-no-retina></div>
                    </li>
                    @php $layer++; $s++; $l++; $c++; $rs++; $cr++; $lfive++; $lsix++; $lsev++; @endphp
                @endforeach 
                @endif
                 
                </ul>
            </div>
        </div>
    </section>
    <!--End Main Slider-->

    <!-- Services Section -->
    @php
        $settings=DB::table('settings')->get();
       @endphp 
    <section class="services-section" style="background-image: url(@foreach($settings as $data) {{$data->home_section2_background}} @endforeach);">
        <div class="auto-container">

            <div class="sec-title text-center">
                <div class="divider"><img src="{{asset('front_asset/images/icons/divider_1.png')}}" alt=""></div>
                <h2>Our Specialties</h2>
            </div>
            <!-- Services Carousel -->
            <div class="services-carousel owl-carousel owl-theme">
              @if(count($specialties)>0)
                    @foreach($specialties as $key=>$specialtie)
                <!-- Service Block -->
                <div class="service-block">
                    <div class="inner-box">
                        <div class="image-box">
                            <div class="services_frame"><svg viewBox="0 0 500 500"><path d="M488.5,274.5L488.5,274.5l1.8-0.5l-2,0.5c-2.4-8.7-4.5-16.9-4.5-24.5c0-8,2.3-16.5,4.7-25.5 c3.5-13,7.1-26.5,3.7-39.5c-3.6-13.2-13.5-23.1-23.1-32.7c-6.5-6.5-12.6-12.6-16.6-19.4c-3.9-6.8-6.1-15.2-8.5-24.1 c-3.5-13.1-7.1-26.7-16.7-36.3c-9.5-9.5-22.9-13.1-35.9-16.6c-9-2.4-17.5-4.6-24.4-8.7c-6.5-3.8-12.5-9.8-18.9-16.2 c-9.7-9.8-19.6-19.8-33.2-23.4c-13.5-3.7-27.3,0.1-40.4,3.7c-8.7,2.4-16.9,4.6-24.5,4.6c-8,0-16.5-2.3-25.5-4.7 c-9.3-2.5-18.8-5-28.1-5c-3.8,0-7.6,0.4-11.3,1.4C172,11.1,162,21.1,152.4,30.7c-6.5,6.5-12.6,12.6-19.4,16.6 c-6.8,3.9-15.2,6.1-24.1,8.5c-13.1,3.5-26.7,7.1-36.3,16.7c-9.5,9.5-13.1,23-16.6,36c-2.4,9-4.6,17.5-8.7,24.4 c-3.8,6.5-9.8,12.5-16.2,18.9c-9.8,9.7-19.7,19.6-23.4,33.2c-3.7,13.5,0.1,27.3,3.7,40.5c2.4,8.7,4.6,16.9,4.6,24.5 c0,8-2.3,16.5-4.6,25.5c-3.5,13-7.1,26.6-3.7,39.5c3.6,13.2,13.5,23.1,23.1,32.7c6.5,6.5,12.6,12.6,16.6,19.4 c3.9,6.8,6.1,15.1,8.5,24c3.5,13.1,7.1,26.8,16.7,36.4c9.5,9.5,23,13.1,35.9,16.6c9,2.4,17.5,4.6,24.4,8.7 c6.5,3.8,12.5,9.8,18.9,16.2c9.7,9.8,19.6,19.8,33.2,23.5c3.8,1,7.6,1.5,11.8,1.5c9.6,0,19.3-2.7,28.5-5.1c8.8-2.4,17-4.6,24.5-4.6 c8,0,16.5,2.3,25.5,4.6c13,3.6,26.6,7.1,39.5,3.7c13.2-3.6,23.1-13.5,32.7-23.1c6.5-6.5,12.6-12.6,19.4-16.6 c6.7-3.9,15.1-6.1,24-8.5c13.1-3.5,26.8-7.1,36.4-16.8c9.5-9.5,13.1-23,16.6-36c2.4-9,4.6-17.5,8.7-24.4c3.8-6.5,9.8-12.5,16.2-18.9 c9.8-9.7,19.9-19.7,23.6-33.3C495.7,301.4,494.4,287.7,488.5,274.5z"></path></svg></div>
                            <!-- cake img -->
                            <figure class="image"><img src="{{$specialtie->photo}}" alt=""></figure>
                        </div>
                        <h3>{{$specialtie->title}}</h3>
                        <p>{{strip_tags($specialtie->description)}}</p> 
                    </div>
                </div>
                @endforeach
                @endif

                
            </div>
        </div>
    </section>
    <!--End Services Section -->




    <!-- Features Section -->
    <div class="call-to-action">
        <div class="shape_wrapper shape_one">
            <div class="shape_inner shape_two" style="background-image: url(@foreach($settings as $data) {{$data->home_section3_background}} @endforeach);"><div class="overlay"></div></div>
        </div>

        <div class="auto-container">
            <div class="row">
                @if(count($features)>0)
                    @foreach($features as $key=>$feature)
                <!-- Feature Block -->
                <div class="feature-block col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="icon-box">
                            <div class="icon-frame"><svg x="0px" y="0px" viewBox="0 0 500 500"> <path d="M488.5,274.5L488.5,274.5l1.8-0.5l-2,0.5c-2.4-8.7-4.5-16.9-4.5-24.5c0-8,2.3-16.5,4.7-25.5 c3.5-13,7.1-26.5,3.7-39.5c-3.6-13.2-13.5-23.1-23.1-32.7c-6.5-6.5-12.6-12.6-16.6-19.4c-3.9-6.8-6.1-15.2-8.5-24.1 c-3.5-13.1-7.1-26.7-16.7-36.3c-9.5-9.5-22.9-13.1-35.9-16.6c-9-2.4-17.5-4.6-24.4-8.7c-6.5-3.8-12.5-9.8-18.9-16.2 c-9.7-9.8-19.6-19.8-33.2-23.4c-13.5-3.7-27.3,0.1-40.4,3.7c-8.7,2.4-16.9,4.6-24.5,4.6c-8,0-16.5-2.3-25.5-4.7 c-9.3-2.5-18.8-5-28.1-5c-3.8,0-7.6,0.4-11.3,1.4C172,11.1,162,21.1,152.4,30.7c-6.5,6.5-12.6,12.6-19.4,16.6 c-6.8,3.9-15.2,6.1-24.1,8.5c-13.1,3.5-26.7,7.1-36.3,16.7c-9.5,9.5-13.1,23-16.6,36c-2.4,9-4.6,17.5-8.7,24.4 c-3.8,6.5-9.8,12.5-16.2,18.9c-9.8,9.7-19.7,19.6-23.4,33.2c-3.7,13.5,0.1,27.3,3.7,40.5c2.4,8.7,4.6,16.9,4.6,24.5 c0,8-2.3,16.5-4.6,25.5c-3.5,13-7.1,26.6-3.7,39.5c3.6,13.2,13.5,23.1,23.1,32.7c6.5,6.5,12.6,12.6,16.6,19.4 c3.9,6.8,6.1,15.1,8.5,24c3.5,13.1,7.1,26.8,16.7,36.4c9.5,9.5,23,13.1,35.9,16.6c9,2.4,17.5,4.6,24.4,8.7 c6.5,3.8,12.5,9.8,18.9,16.2c9.7,9.8,19.6,19.8,33.2,23.5c3.8,1,7.6,1.5,11.8,1.5c9.6,0,19.3-2.7,28.5-5.1c8.8-2.4,17-4.6,24.5-4.6 c8,0,16.5,2.3,25.5,4.6c13,3.6,26.6,7.1,39.5,3.7c13.2-3.6,23.1-13.5,32.7-23.1c6.5-6.5,12.6-12.6,19.4-16.6 c6.7-3.9,15.1-6.1,24-8.5c13.1-3.5,26.8-7.1,36.4-16.8c9.5-9.5,13.1-23,16.6-36c2.4-9,4.6-17.5,8.7-24.4c3.8-6.5,9.8-12.5,16.2-18.9 c9.8-9.7,19.9-19.7,23.6-33.3C495.7,301.4,494.4,287.7,488.5,274.5z"></path></svg>
                            </div>

                            <!-- cake img -->
                            @if (filter_var($feature->photo, FILTER_VALIDATE_URL) === FALSE) 
                            <div class="{{$feature->photo}}"></div>
                            @else
                            <div ><img src="{{$feature->photo}}" style="width: 30px;"></div>
                            @endif
                        </div>
                        <h3>{{$feature->title}}</h3>
                        <p>{{strip_tags($feature->description)}}</p>
                    </div>
                </div>

                 @endforeach
                @endif               
            </div>

            <!-- <div class="btn-box">
                <a href="#" class="theme-btn btn-style-two large"><span></span>Know Us Better<span></span></a>
            </div> -->
        </div>
    </div>
    <!-- End Features Section -->

    <!-- Recipes Section  -->
    
    <!--<section class="recipes-section" style="background-image: url(@foreach($settings as $data) {{$data->recipes_background}} @endforeach);">-->
    <!--    <div class="auto-container">-->
    <!--        <div class="sec-title text-center">-->
    <!--            <div class="divider"><img src="{{asset('front_asset/images/icons/divider_1.png')}}" alt=""></div>-->
    <!--            <h2>Recipes For You</h2>-->
    <!--        </div>-->

            <!-- Recipes Carousel -->
    <!--        <div class="recipes-carousel owl-carousel owl-theme">-->

    <!--            @if(count($recipes)>0)-->
    <!--                @foreach($recipes as $key=>$recipe)-->
                <!-- Recipe Block -->
    <!--            <div class="recipe-block">-->
    <!--                <figure class="recipe-image"><img src="{{$recipe->photo}}" alt=""></figure>-->
    <!--            </div>-->

    <!--             @endforeach-->
    <!--            @endif    -->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->
    <!-- End Recipes Section  -->

    <!-- Testimonial Section -->
    <section class="recipes-section">
        <div class="shape_wrapper shape_one">
            <div class="shape_inner shape_two"><div class="overlay"></div></div>
        </div>

        <div class="auto-container">
            <div class="sec-title light text-center">
                <h2>Clients Say</h2>
            </div>

            <!-- Testimonial Carousel -->
            <div class="testimonial-carousel owl-carousel owl-theme">
            @if(count($testimonials)>0)
                    @foreach($testimonials as $key=>$testimonial)
                <!-- Testimonial Block -->
                <div class="testimonial-block">
                    <div class="inner-box">
                        <div class="testimonial_img">
                            <svg class="div_left" fill="#ffffff" viewBox="0 0 25 8"><path d="M1.7,5.2C2,5.4,2.1,5.7,1.9,6C1.8,6.2,1.7,6.3,1.5,6.3c-0.4,0.1-1-0.4-0.7,0.4c0.1,0.4,0.6,0.4,0.9,0.5 c1.8,0.2,3.6-1.2,5.1-1.9c-0.9-0.5-2-1.1-2.3-2.1c-0.2-0.8,0-1.8,0.6-2.4C5.7,0,6.8-0.2,7.7,0.3C8,0.6,8.2,1.2,8.1,1.6 C7.9,2.3,7.6,2.5,7,2.5C7,2.1,7.2,1.3,6.8,1C6.5,0.8,6,0.9,5.7,1.2C4.8,1.9,5.2,3.1,6,3.7C6.5,4,6.9,4.2,7.4,4.4 c0.6,0.2,0.9,0,1.5-0.2c1.3-0.6,2.6-1,3.9-1.4c1.4-0.4,2.8-0.5,4.2-0.4c1.1,0.1,2.2,0.5,3.2,1.1c1,0.6,2.1,0.9,3.2,0.9 c0.4,0,1.6,0,1.6,0.4c0,0.4-1.5,0.1-1.7,0.5c0.2,0.1,0.9,0.3,0.7,0.7c-0.2,0.4-0.9,0-1-0.2c-0.4-0.4-1-0.7-1.6-0.6 c-1,0.1-2.1,0.3-3.1,0.4c-1,0.1-1.8,0.1-2.7,0.2C13.7,6.1,11.7,6.2,9.8,6C9.1,5.7,8.2,5.8,7.5,6.1C6.7,6.5,6,7,5.2,7.3 C4,7.9,1.7,8.4,0.5,7.4S0.5,4.3,1.7,5.2z M20.3,4.2c-1.3-1-3-1.4-4.6-1.1c-0.9,0.2-1.9,0.5-2.8,0.7c-0.5,0.1-1,0.3-1.6,0.5 S10.3,4.5,10.4,5L20.3,4.2z"></path></svg>
                        
                            <!-- Thumb Box -->
                            <figure class="thumb-box"><img src="{{$testimonial->photo}}" alt=""></figure>

                            <svg class="div_right" fill="#ffffff" viewBox="0 0 25 8"><path d="M23.31,5.22a.59.59,0,0,0,.22,1.1c.36.08,1-.38.75.38-.13.4-.57.43-.93.46-1.77.17-3.6-1.21-5.11-1.95.87-.51,2-1.09,2.33-2.1A2.43,2.43,0,0,0,19.94.73,2,2,0,0,0,17.36.34a1.25,1.25,0,0,0-.43,1.29c.17.67.5.84,1.13.88-.05-.42-.28-1.17.12-1.49a1,1,0,0,1,1.17.15c.91.76.42,1.94-.38,2.54a4.91,4.91,0,0,1-1.37.66c-.64.22-.89,0-1.51-.22a25.55,25.55,0,0,0-3.94-1.39,13.51,13.51,0,0,0-4.2-.44A7.77,7.77,0,0,0,4.77,3.43a6.29,6.29,0,0,1-3.21.87c-.37,0-1.59,0-1.56.43s1.48.08,1.74.54c-.24.07-.89.29-.66.71s.86,0,1-.18a1.85,1.85,0,0,1,1.58-.6c1,.06,2.06.33,3.09.44s1.81.11,2.72.19a21.75,21.75,0,0,0,5.7.13,3.18,3.18,0,0,1,2.39.15c.76.37,1.47.84,2.23,1.2,1.25.6,3.56,1.12,4.74.13S24.51,4.34,23.31,5.22Zm-18.64-1a6.16,6.16,0,0,1,4.58-1.1c.93.19,1.86.45,2.78.69.52.14,1,.28,1.55.46s1.14.21,1.08.75Z"></path></svg>
                        </div>
                        <div class="text">{{strip_tags($testimonial->description)}}</div>
                        <div class="name">{{$testimonial->title}}</div>
                    </div>
                </div>

                @endforeach
                @endif

            </div>
        </div>
    </section>
    <!--End Testimonial Section -->

    <!-- Pricing Section -->
    <section class="pricing-section">
        <div class="auto-container">
            <div class="sec-title text-center">
                <div class="divider"><img src="{{asset('front_asset/images/icons/divider_1.png')}}" alt=""></div>
                <h2>Our Prices</h2>
            </div>

            <div class="row">
                  @if(count($products)>0)
                    @foreach($products as $key=>$product)
                <!-- Pricing Table -->
                <div class="pricing-table tagged col-xl-3 col-lg-6 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <!-- Pricing Highlight -->
                        <div class="pricing-highlight">
                            <svg viewBox="0 0 67.3 67.3">
                                <path class="st0" d="M40.7,2.8c0.4,0,0.7,0,1.1,0.1c1.3,0.4,2.4,1.5,3.6,2.6c0.9,1,1.9,1.8,3,2.5c1.2,0.6,2.5,1.1,3.8,1.4 c1.6,0.4,3.1,0.8,4,1.7s1.3,2.4,1.7,4c0.3,1.3,0.7,2.5,1.3,3.7c0.7,1.1,1.6,2.1,2.6,3c1.2,1.2,2.3,2.2,2.6,3.5 c0.3,1.3-0.1,2.7-0.5,4.3c-0.4,1.3-0.6,2.6-0.7,3.9c0.1,1.2,0.3,2.5,0.6,3.7v0.1v0.1l0,0l0.5,1.9h0.1c0.2,0.9,0.1,1.7-0.1,2.6 c-0.3,1.3-1.4,2.4-2.6,3.6l0,0c-1,0.9-1.8,1.9-2.5,3c-0.6,1.2-1.1,2.5-1.4,3.8c-0.4,1.6-0.8,3.1-1.7,4s-2.5,1.2-4.1,1.7 c-1.3,0.3-2.5,0.7-3.7,1.3c-1.1,0.7-2.1,1.6-3,2.6c-1.2,1.2-2.2,2.3-3.5,2.6c-0.3,0.1-0.7,0.1-1,0.1c-1.1-0.1-2.2-0.3-3.3-0.6 c-1.3-0.4-2.6-0.6-3.9-0.7c-1.3,0.1-2.6,0.3-3.8,0.7c-1.1,0.3-2.2,0.6-3.3,0.6c-0.4,0-0.7,0-1.1-0.1c-1.3-0.4-2.4-1.5-3.6-2.6 c-0.9-1-1.9-1.8-3-2.5c-1.2-0.6-2.5-1.1-3.8-1.4c-1.6-0.4-3-0.8-4-1.7c-0.9-0.9-1.3-2.4-1.8-4c-0.3-1.3-0.7-2.5-1.3-3.7 c-0.7-1.1-1.6-2.1-2.6-3c-1.2-1.2-2.3-2.2-2.6-3.5s0.1-2.7,0.5-4.3c0.4-1.3,0.6-2.6,0.7-4c-0.1-1.3-0.3-2.6-0.7-3.8 c-0.4-1.6-0.8-3.1-0.5-4.4c0.4-1.3,1.5-2.4,2.6-3.6c1-0.9,1.8-1.9,2.5-3c0.6-1.2,1.1-2.5,1.4-3.8c0.4-1.6,0.8-3.1,1.7-4 s2.4-1.2,4-1.7c1.3-0.3,2.5-0.7,3.7-1.3c1.1-0.7,2.1-1.6,3-2.6c1.2-1.2,2.3-2.3,3.5-2.6c0.3-0.1,0.7-0.1,1-0.1 c1.1,0.1,2.2,0.3,3.3,0.6c1.3,0.4,2.6,0.6,4,0.7c1.3-0.1,2.6-0.3,3.8-0.7C38.5,3,39.6,2.8,40.7,2.8L40.7,2.8"></path>
                            </svg>@if($product->discount)<h5>{{$product->discount}}%</h5>@endif
                        </div>
                                 @php 
                                    $photo=explode(',',$product->photo);
                                @endphp
                        <div class="image-box">
                            <figure class="image"><img src="{{$photo[0]}}" alt="" style="width: 178px;height: 167px;"></figure>
                        </div>
                        <div class="pricing-svg">
                            <svg viewBox="0 0 1000 690">
                                <path class="st0" d="M1503-747c-669.3,0-1338.7,0-2008,0c0.3,425,0.7,850,1,1275c0,7.7,0,15.3,0,23c168.3,0.1,336.7,0.3,505,0.4 c18.1-10.6,32.9-15.9,58.4-10.8c80.7,16.2,160.7,100.3,240.4,93.8c93-7.5,184.6-116.6,284.6-96c88.9,18.3,101.9,175.6,227.2,147.5 c79.9-17.9,68.2-118.2,149.1-138.7c12.8-3.3,20.2-4.2,38.4-3.4c167.7,0.7,335.3,1.5,503,2.2c0.3-6,0.7-12,1-18 C1503,103,1503-322,1503-747z"></path>
                            </svg>
                        </div>
                        <div class="title-box"><h3>{{Str::limit($product->title,10)}}</h3></div>
                        <div class="price-box">
                            @php
                                $after_discount=($product->price-($product->price*$product->discount)/100);
                            @endphp
                            <div class="price">{{number_format($after_discount)}}<sup>$</sup></div>
                            <!-- <span class="title">FOR 1 CAKE</span> -->
                        </div>
                        <div class="table-content">
                            <ul>@php $features = preg_split ("/\,/", $product->feature); @endphp
                                @foreach($features as $feature)
                                <li><span>{{$feature}}</span></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="table-footer">
                            <a href="{{route('add-to-cart',$product->slug)}}" class="theme-btn btn-style-two regular"><span></span>Order Now<span></span></a>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </section>
    <!--End Pricing Section -->

@endsection

@push('styles')
    <style>
        /* Banner Sliding */
        #Gslider .carousel-inner {
        background: #000000;
        color:black;
        }

        #Gslider .carousel-inner{
        height: 550px;
        }
        #Gslider .carousel-inner img{
            width: 100% !important;
            opacity: .8;
        }

        #Gslider .carousel-inner .carousel-caption {
        bottom: 60%;
        }

        #Gslider .carousel-inner .carousel-caption h1 {
        font-size: 50px;
        font-weight: bold;
        line-height: 100%;
        color: #F7941D;
        }

        #Gslider .carousel-inner .carousel-caption p {
        font-size: 18px;
        color: black;
        margin: 28px 0 28px 0;
        }

        #Gslider .carousel-indicators {
        bottom: 70px;
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
							// document.location.href=document.location.href;
						});
					}
                    else{
                        window.location.href='user/login'
                    }
                }
            })
        });
    </script> --}}
    {{-- <script>
        $('.wishlist').click(function(){
            var quantity=1;
            var pro_id=$(this).data('id');
            // alert(pro_id);
            $.ajax({
                url:"{{route('add-to-wishlist')}}",
                type:"POST",
                data:{
                    _token:"{{csrf_token()}}",
                    quantity:quantity,
                    pro_id:pro_id,
                },
                success:function(response){
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
            });
        });
    </script> --}}
    <script>
        
        /*==================================================================
        [ Isotope ]*/
        var $topeContainer = $('.isotope-grid');
        var $filter = $('.filter-tope-group');

        // filter items on button click
        $filter.each(function () {
            $filter.on('click', 'button', function () {
                var filterValue = $(this).attr('data-filter');
                $topeContainer.isotope({filter: filterValue});
            });
            
        });

        // init Isotope
        $(window).on('load', function () {
            var $grid = $topeContainer.each(function () {
                $(this).isotope({
                    itemSelector: '.isotope-item',
                    layoutMode: 'fitRows',
                    percentPosition: true,
                    animationEngine : 'best-available',
                    masonry: {
                        columnWidth: '.isotope-item'
                    }
                });
            });
        });

        var isotopeButton = $('.filter-tope-group button');

        $(isotopeButton).each(function(){
            $(this).on('click', function(){
                for(var i=0; i<isotopeButton.length; i++) {
                    $(isotopeButton[i]).removeClass('how-active1');
                }

                $(this).addClass('how-active1');
            });
        });
    </script>
    <script>
         function cancelFullScreen(el) {
            var requestMethod = el.cancelFullScreen||el.webkitCancelFullScreen||el.mozCancelFullScreen||el.exitFullscreen;
            if (requestMethod) { // cancel full screen.
                requestMethod.call(el);
            } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
                var wscript = new ActiveXObject("WScript.Shell");
                if (wscript !== null) {
                    wscript.SendKeys("{F11}");
                }
            }
        }

        function requestFullScreen(el) {
            // Supports most browsers and their versions.
            var requestMethod = el.requestFullScreen || el.webkitRequestFullScreen || el.mozRequestFullScreen || el.msRequestFullscreen;

            if (requestMethod) { // Native full screen.
                requestMethod.call(el);
            } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
                var wscript = new ActiveXObject("WScript.Shell");
                if (wscript !== null) {
                    wscript.SendKeys("{F11}");
                }
            }
            return false
        }
    </script>

@endpush