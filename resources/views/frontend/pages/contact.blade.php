@extends('frontend.layouts.master')

@section('main-content')
	  <!--Page Title-->
       @php
        $settings=DB::table('settings')->get();
       @endphp 
        @foreach($settings as $key=>$banner)
        @endforeach
        @php $a= preg_split ("/\,/", $banner->page_banners); @endphp
    <section class="page-title" style="background-image:url({{$a[3]}})">
        <div class="auto-container">
            <h1>Contacts</h1>
            <ul class="page-breadcrumb">
                <li><a href="index.html">home</a></li>
                <li>Contacts</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->
        @php
        $datas=DB::table('contacts')->get();
       @endphp 
        @foreach($datas as $key=>$data)
        @endforeach
    <!-- Contact Section -->
    <section class="contact-section">
        <div class="auto-container">
            <div class="sec-title text-center">
                <div class="divider"><img src="images/icons/divider_1.png" alt=""></div>
                <h2>Our Contacts</h2>
                <div class="text">{{$data->description}}</div>
            </div>

            <div class="row clearfix">
                <div class="column col-xl-3 col-lg-6 col-md-6 col-sm-12">
                    <div class="inner-column">
                        <div class="title">
                            <div class="icon"><img src="{{asset('front_asset/images/icons/icon-devider-gray.png')}}" alt=""></div>
                            <h4>Opening Hours</h4>
                        </div>

                        <ul class="contact-info">
                            {!! $data->opening_hours !!}
                        </ul>
                    </div>
                </div>

                <div class="column col-xl-3 col-lg-6 col-md-6 col-sm-12 order-3">
                    <div class="inner-column">
                        <div class="title">
                            <div class="icon"><img src="{{asset('front_asset/images/icons/icon-devider-gray.png')}}" alt=""></div>
                            <h4>Our Contacts</h4>
                        </div>

                        <ul class="contact-info">
                          {!! $data->contact_detail !!}
                        </ul>
                    </div>
                </div>

                <!-- Form Column -->
                <div class="column col-xl-6 col-lg-12 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="title">
                            <div class="icon"><img src="{{asset('front_asset/images/icons/icon-devider-gray.png')}}" alt=""></div>
                            <h4>Send Message</h4>
                        </div>
                       
                        <div class="contact-form">
                        <form class="form-contact form contact_form" method="post" action="{{route('contact.store')}}" id="contactForm" novalidate="novalidate">
                                    @csrf

                                <div class="form-group">
                                    <input type="text"name="name" id="name" class="username" placeholder="Your Name *">
                                    @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input name="email" type="email" id="email" placeholder="Your Email *">
                                    @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <textarea name="message" id="message" placeholder="Text Message"></textarea>

                                    @error('message')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <button type="submit" class="btn theme-btn">Send</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Contact Section -->

@endsection

@push('scripts')
<script src="{{ asset('frontend/js/jquery.form.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('frontend/js/contact.js') }}"></script>
@endpush