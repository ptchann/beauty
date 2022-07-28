@section('title')
{{$category->title}}
@stop

@extends('frontend.general.master')
@section('content')
        <!-- header -->
        <div class="page-header page-header-blog">
                <div class="container">
                    <div class="text-center">
                        <h2>{{$category->title}}<span><i class="one-round"></i></span><span><a href="{{url('')}}" style="color:white">Home</a>   / {{$category->title}}</span></h2>
                    </div>
                </div>
            </div>
            <section id="blog" class="wow fadeInUp">
                <div class="container">
                    <div class="row">
                    @include('frontend.general.left')
                        <div class="col-md-9 col-xs-12">
                            <div id="p-blog" class="wow fadeInUp">
                                <div class="">
                                    <div class="row masonry-container">
                                        @foreach ($blog as $key=>$value)
                                            <div class="col-md-4 col-xs-6 mitem wow fadeInDown">
                                                <div class="p-blog-item">
                                                    <a href="{{url('')}}/detail/{{$value->id}}">
                                                        <img src="{{url('')}}/{{$value->image}}" alt="" class="img-responsive">
                                                    </a>
                                                    <div class="down-content">
                                                        <div class="date">{{$value->created_at}}</div>
                                                        <h3><a href="{{url('')}}/detail/{{$value->id}}">{{$value->title}}</a></h3>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>   
                            </div> 
                        </div>  
                    </div>
                    <div class="btn-cover">
                        <div class="row">
                            <div class="col-md-2 col-xs-12">
                                @if ($blog->hasPages())
                                    @if ($blog->onFirstPage())
                                        <a href="javascript:void(0)" class="btn btn-link disabled">
                                            <span><i></i></span>
                                            <span>PREV PAGE</span>
                                        </a>
                                    @else
                                    <a href="{{$blog->previousPageUrl()}}" class="btn btn-link disabled">
                                        <span><i></i></span>
                                        <span>PREV PAGE</span>
                                    </a>
                                    @endif
                                @endif
                            </div>
                            <div class="col-md-8 col-xs-12">
                                {{$blog->render("pagination::bootstrap-4")}}
                            </div>
                            <div class="col-md-2 col-xs-12">
                                @if ($blog->hasMorePages())
                                <a href="{{$blog->nextPageUrl()}}" class="btn btn-link">
                                    <span><i></i></span>
                                    <span>NEXT PAGE</span>
                                </a>
                                @else
                                <a href="javascript:void(0)" class="btn btn-link">
                                    <span><i></i></span>
                                    <span>NEXT PAGE</span>
                                </a> 
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </section>
@stop