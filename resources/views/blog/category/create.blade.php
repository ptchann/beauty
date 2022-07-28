@section('title')
CREATE NEW BLOG
@stop
@extends('blog.general.master')
@section('content')
<div class="page-header page-header-blog">
                <div class="container">
                    <div class="text-center">
                        <h2>CREATE CATEGORY<span><i class="one-round"></i></span><span><a href="{{url('')}}" style="color:white">Home</a>   / Beauty / Post</span></h2>
                    </div>
                </div>
            </div>
            <br>
        <div class="container">
            @if(Session::has('error-message'))
            <div class="alert alert-warning">{{Session::get('error-message')}}</div>
            @endif
            <div class="row">
                <div class="col-12">
                    <form action="{{url('blog/category/create')}}" method="POST">
                        @csrf
                        <input type="text" name="title" placeholder="Chủ đề">
                        <input type="submit" value="Tạo mới">
                    </form>
                </div>
            </div>
        </div>
@stop