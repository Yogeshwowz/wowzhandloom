@extends('frontend.layouts.master')

@section('title','Ecommerce || Blog Detail page')

@section('main-content')
@php
 $settings=DB::table('settings')->get();
       @endphp 
        @foreach($settings as $key=>$banner)
        @endforeach
        @php $a= preg_split ("/\,/", $banner->page_banners); @endphp
    <!--Page Title-->
    <section class="page-title" style="background-image:url({{$a[2]}})">
        <div class="auto-container">
            <h1>{{$post->title}}</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{route('home')}}">home</a></li>
                <li>{{$post->title}}</li>
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
                    <div class="blog-single">
                        <!-- News Block -->
                        <div class="news-block">
                            <div class="inner-box">
                                <div class="image-column">
                                    <div class="inner-column">
                                        <figure class="image" style="height: 500px;"><img src="{{$post->photo}}" alt="{{$post->photo}}"></figure>
                                        <div class="date">{{$post->created_at->format('d')}} <span>{{$post->created_at->format('M')}}</span></div>
                                    </div>
                                </div>
                                <div class="content-column">
                                    <div class="inner-column">
                                        <ul class="post-info">
                                            @php 
                                                $author_info=DB::table('users')->select('name')->where('id',$post->added_by)->get();
                                            @endphp
                                            <li><span class="icon fa fa-user"></span> by @foreach($author_info as $data)
                                                    @if($data->name != '')
                                                        {{$data->name}}
                                                    @else
                                                        Anonymous
                                                    @endif
                                                @endforeach</li>
                                            <li><span class="icon fa fa-bookmark"></span> {{$post->tags}}</li>
                                        </ul>
                                        
                                        <p>{!! html_entity_decode($post->summary) !!}</p>
                                        
                                        @if($post->quote != '')
                                        <blockquote>{!! html_entity_decode($post->quote) !!}</blockquote>
                                        @endif
                                        <p>{!! html_entity_decode($post->description) !!}</p>
                                    </div>
                                </div>
                                <!-- <div class="two-column row">
                                    <div class="image-column col-lg-6 col-md-12">
                                        <figure class="image"><img src="https://via.placeholder.com/1920x1080" alt=""></figure>
                                    </div>
                                    <div class="content-column col-lg-6 col-md-12">
                                        <ul class="list-style-one"> 
                                            <li>Donec ligula leo, ornare at posuere.</li>
                                            <li>Donec eu sollicitudin quam, vitae.</li>
                                            <li>Phasellus ac nulla lacinia, sodales.</li>
                                            <li>Vestibulum tincidunt felis non lectus.</li>
                                            <li>Cras sem libero, porta vestibulum in.</li>
                                            <li>Nam accumsan nulla viverra tincidunt.</li>
                                        </ul>
                                    </div>
                                </div> -->
                                <div class="devider"><img src="{{asset('front_asset/images/icons/icon-devider-gray.png')}}" alt=""></div>
                            </div>
                        </div>
                          <div class="comments-area">
                            
                            @php
                                $comments = DB::table('post_comments')->where('post_id',$post->id)->get();
                            @endphp
                            <div class="group-title">
                                <h3>Recent Comment</h3>
                            </div>
                            @if($comments->count() == 0)
                                    <h3>No Comments</h3>
                            @endif
                            @foreach($comments as $data)
                           
                                                <!--Comment Box-->
                                                <div class="comment-box">
                                                    <div class="comment">
                                                       
                                                        <div class="comment-inner">
                                                            <div class="comment-info clearfix">
                                                                <strong class="name">{{$data->name}}</strong> 
                                                                <span class="date">– {{$data->created_at}}</span>
                                                            </div> 
                                                        
                                                            <div class="text">{{$data->comment}}</div>
                                                        </div>
                                                    </div>
                                                </div>
                            @endforeach         
                            
                        <!--Comment Form-->
                    </div>
                        <div class="comment-form">
                            <div class="group-title">
                                <h3>Leave a Reply</h3>
                            </div>
                            <div class="form-outer">
                                <p>Your email address will not be published. Required fields are marked *</p>
                                <form class="form comment_form" id="commentForm" action="{{route('post-comment.store',$post->slug)}}" method="POST">
                                            @csrf
                                    <div class="row clearfix">
                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                            <div class="field-label">Comment</div>
                                            <textarea name="comment" id="comment" placeholder=""></textarea>
                                                <input type="hidden" name="post_id" value="{{ $post->id }}" />
                                                <input type="hidden" name="parent_id" id="parent_id" value="" />
                                        </div>

                                        <div class="col-lg-4 col-md-12 col-sm-12 form-group">
                                            <div class="field-label">Name *</div>
                                            <input type="text" name="name" placeholder="" required="">
                                        </div>
                                        
                                        <div class="col-lg-4 col-md-12 col-sm-12 form-group">
                                            <div class="field-label">Email *</div>
                                            <input type="email" name="email" placeholder="" required="">
                                        </div>
                                        
                                        <div class="col-lg-4 col-md-12 col-sm-12 form-group">
                                            <div class="field-label">Website</div>
                                            <input type="url" name="website" placeholder="" required="">
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
                
                <!--Sidebar Side-->
                <div class="sidebar-side sticky-container col-lg-3 col-md-12 col-sm-12">
                    <aside class="sidebar theiaStickySidebar">
                        <div class="sticky-sidebar">
                            <!-- Search -->
                            <div class="sidebar-widget search-widget">
                                <form method="post" action="contact.html">
                                    <div class="form-group">
                                        <input type="search" name="search-field" value="" placeholder="Search…" required>
                                        <button type="submit"><span class="icon fa fa-search"></span></button>
                                    </div>
                                </form>
                            </div>
                            
                            <!-- Gallery Widget -->
                            <div class="sidebar-widget gallery-widget">
                                <div class="widget-content">
                                    <h3 class="widget-title">Gallery</h3>
                                    <div class="instagram-gallery">
                                        <div class="outer-box clearfix">
                                            <figure class="image"><a href="https://via.placeholder.com/500x500" class="lightbox-image" data-fancybox='instagram'><img src="https://via.placeholder.com/150x150" alt=""></a></figure>

                                            <figure class="image"><a href="https://via.placeholder.com/500x500" class="lightbox-image" data-fancybox='instagram'><img src="https://via.placeholder.com/150x150" alt=""></a></figure>

                                            <figure class="image"><a href="https://via.placeholder.com/500x500" class="lightbox-image" data-fancybox='instagram'><img src="https://via.placeholder.com/150x150" alt=""></a></figure>

                                            <figure class="image"><a href="https://via.placeholder.com/500x500" class="lightbox-image" data-fancybox='instagram'><img src="https://via.placeholder.com/150x150" alt=""></a></figure>

                                            <figure class="image"><a href="https://via.placeholder.com/500x500" class="lightbox-image" data-fancybox='instagram'><img src="https://via.placeholder.com/150x150" alt=""></a></figure>

                                            <figure class="image"><a href="https://via.placeholder.com/500x500" class="lightbox-image" data-fancybox='instagram'><img src="https://via.placeholder.com/150x150" alt=""></a></figure>

                                            <figure class="image"><a href="https://via.placeholder.com/500x500" class="lightbox-image" data-fancybox='instagram'><img src="https://via.placeholder.com/150x150" alt=""></a></figure>

                                            <figure class="image"><a href="https://via.placeholder.com/500x500" class="lightbox-image" data-fancybox='instagram'><img src="https://via.placeholder.com/150x150" alt=""></a></figure>

                                            <figure class="image"><a href="https://via.placeholder.com/500x500" class="lightbox-image" data-fancybox='instagram'><img src="https://via.placeholder.com/150x150" alt=""></a></figure>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Category  Widget -->
                            <div class="sidebar-widget category-widget">
                                <div class="widget-content">
                                    <h3 class="widget-title">Categories</h3>
                                    @if(!empty($_GET['category']))
                                    @php 
                                        $filter_cats=explode(',',$_GET['category']);
                                    @endphp
                                    @endif
                                    <ul class="categories-list">
                                 <form action="{{route('blog.filter')}}" method="POST">
                                    @csrf
                                    {{-- {{count(Helper::postCategoryList())}} --}}
                                    @foreach(Helper::postCategoryList('posts') as $cat)
                                    <li>
                                        <a href="{{route('blog.category',$cat->slug)}}">{{$cat->title}} </a>
                                    </li>
                                    @endforeach
                                </form>
                                
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <!--End Sidebar Page Container-->


@endsection
@push('styles')
<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5f2e5abf393162001291e431&product=inline-share-buttons' async='async'></script>
@endpush
@push('scripts')
<script>
$(document).ready(function(){
    
    (function($) {
        "use strict";

        $('.btn-reply.reply').click(function(e){
            e.preventDefault();
            $('.btn-reply.reply').show();

            $('.comment_btn.comment').hide();
            $('.comment_btn.reply').show();

            $(this).hide();
            $('.btn-reply.cancel').hide();
            $(this).siblings('.btn-reply.cancel').show();

            var parent_id = $(this).data('id');
            var html = $('#commentForm');
            $( html).find('#parent_id').val(parent_id);
            $('#commentFormContainer').hide();
            $(this).parents('.comment-list').append(html).fadeIn('slow').addClass('appended');
          });  

        $('.comment-list').on('click','.btn-reply.cancel',function(e){
            e.preventDefault();
            $(this).hide();
            $('.btn-reply.reply').show();

            $('.comment_btn.reply').hide();
            $('.comment_btn.comment').show();

            $('#commentFormContainer').show();
            var html = $('#commentForm');
            $( html).find('#parent_id').val('');

            $('#commentFormContainer').append(html);
        });
        
 })(jQuery)
})
</script>
@endpush