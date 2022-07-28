@section('title')
LOGIN
@stop
@extends('blog.general.master')
@section('content')
        <div class="container">
        <div class="page-header page-header-blog">
                <div class="container">
                    <div class="text-center">
                        <h2>LOGIN<span><i class="one-round"></i></span><span><a href="{{url('')}}" style="color:white">Home</a>   / Beauty / Post</span></h2>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <br>
            @if(Session::has('error-message'))
            <div class="alert alert-warning">{{Session::get('error-message')}}</div>
            @endif
            <div class="row">
                <div class="col-12">
                    <form action="{{url('login')}}" method="POST">
                        @csrf
                        <input type="email" name="email" placeholder="Email">
                        <input type="password" name="password" placeholder="Mật khẩu">
                        <input type="submit" value="Đăng nhập">
                    </form>
                </div>
            </div>
        </div>
@stop