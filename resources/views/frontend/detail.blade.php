@section('title')
    {{$blog->title}}
@stop

@extends('frontend.general.master')
@section('content')
        <!-- header -->
        <div class="page-header page-header-blog">
                <div class="container">
                    <div class="text-center">
                        <h2>{{$blog->title}}<span><i class="one-round"></i></span><span><a href="{{url('')}}" style="color:white">Home</a>   /<a href="{{url('')}}/category/{{$category->id}}" style="color:white" title="{{$category->title}}"> {{$category->title}}</a> /  {{$blog->title}}</span></h2>
                    </div>
                </div>
            </div>
            <section id="blog-detail" class="wow fadeInUp">
                <div class="container">
                    <div class="row">
                        @include('frontend.general.left')
                        <div class="col-md-9 wow fadeInUp">
                            <div class="blog-detail-title">
                                <div class="meta-cat">
                                    <span>In</span> <a href="{{url('')}}/category/{{$category->id}}" title="{{$category->title}}">{{$category->title}}</a>
                                </div>
                                <h3>{{$blog->description}}</h3>
                                <div class="meta-post">
                                    {{date('MM, d, Y', strtotime($blog->created_at))}}
                                </div>
                            </div>
                            @if ($blog->image)
                                <div class="blog-thumb">
                                    <div id="blog-thumb">
                                        <div class="item">
                                            <img src="{{url('')}}/{{$blog->image}}" alt="" class="img-responsive">
                                        </div>
                                    </div>
                                </div>
                            @endif
                            
                            <div class="excerpt">
                            {!!nl2br($blog->content)!!}
                            </div>
                        </div>
                    </div>
                </div>
            </section>
@stop