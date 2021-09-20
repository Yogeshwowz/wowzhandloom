@extends('frontend.layouts.master')

@section('title','E-SHOP || Blogs')

@section('main-content')
@php
 $settings=DB::table('settings')->get();
       @endphp 
        @foreach($settings as $key=>$banner)
        @endforeach
        @php $a= preg_split ("/\,/", $banner->page_banners); @endphp
    <!--Page Title-->
    <section class="page-title" style="background-image:url({{$a[1]}})">
        <div class="auto-container">
            <h1>Blog</h1>
            <ul class="page-breadcrumb">
                <li><a href="/">home</a></li>
                <li>Blog</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->
    <!-- End Breadcrumbs -->
   <!--Sidebar Page Container-->
    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">

                <!--Content Side-->
                <div class="content-side col-lg-9 col-md-12 col-sm-12">
                    <div class="blog-sidebar">

                          @foreach($posts as $post)
                        {{-- {{$post}} --}}
            <!-- News Block -->
            <div class="news-block">
                <div class="inner-box">
                    <div class="image-column ">
                        <div class="inner-column">
                            <figure class="image"><img src="{{$post->photo}}" alt=""></figure>
                            <div class="date">{{$post->created_at->format('d')}} <span>{{$post->created_at->format('M')}}</span></div>
                        </div>
                    </div>
                    <div class="content-column">
                        <div class="inner-column">
                            <h3><a href="{{route('blog.detail',$post->slug)}}">{{$post->title}}</a></h3>
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
                            <div class="text">{!! html_entity_decode($post->summary) !!}</div>
                            <div class="devider"><img src="{{asset('front_asset/images/icons/icon-devider-gray.png')}}" alt=""></div>
                        </div>
                    </div>
                </div>
            </div>
       @endforeach
                     

                        <!-- Styled Pagination -->
                        <div class="styled-pagination text-center">
                            {{-- {{$posts->appends($_GET)->links()}} --}}
                        </div>
                    </div>
                </div>
                
                <!--Sidebar Side-->
                <div class="sidebar-side sticky-container col-lg-3 col-md-12 col-sm-12">
                    <aside class="sidebar theiaStickySidebar">
                        <div class="sticky-sidebar">
                            <!-- Search -->
                            <div class="sidebar-widget search-widget">
                                <form method="GET" action="{{route('blog.search')}}">
                                    <div class="form-group">
                                        <input type="search" name="search" value="" placeholder="Search…" required>
                                        <button type="submit"><span class="icon fa fa-search"></span></button>
                                    </div>
                                </form>
                            </div>
                            
                            <!-- Gallery Widget -->
                            <div class="sidebar-widget gallery-widget">
                                <div class="widget-content">
                                    <h3 class="widget-title">Recent Post</h3>
                                    <div class="instagram-gallery">
                                        <div class="outer-box clearfix">
                                            
                                            @foreach($recent_posts as $post)
                                            <figure class="image"><a href="{{route('blog.detail',$post->slug)}}"><img height="150px" width="150px" src="{{$post->photo}}" alt="{{$post->photo}}"></a></figure>
                                            @endforeach
                                       
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
@endsection
@push('styles')
    <style>
        .pagination{
            display:inline-flex;
        }
    </style>

@endpush