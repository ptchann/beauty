@section('title')
List Blog
@stop
@extends('blog.general.master')
@section('content')
<div class="page-header page-header-blog">
                <div class="container">
                    <div class="text-center">
                        <h2>LIST CATEGORIES<span><i class="one-round"></i></span><span><a href="{{url('')}}" style="color:white">Home</a>   / Beauty / Post</span></h2>
                    </div>
                </div>
            </div>
            <br>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <table class="table table-stripe">
                        <tr>
                            <td>ID</td>
                            <td>Chủ đề</td>
                            <td>Hành động</td>
                        </tr>
                        @foreach ($blogCategory as $key=>$value)
                        <tr>
                            <td>{{$value->id}}</td>
                            <td>{{$value->title}}</td>
                            <td><a href="{{url('blog/category/detail')}}/{{$value->id}}" style="color:#2d5f73">Hiển thị</a> <a href="javascript:(0)" onclick="return confirmDelete('{{url('blog/category/delete')}}/{{$value->id}}','Bạn có muốn xoá không?')" style="color:#a02c2d">Xoá</a></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                <div class="col-12">
                    {{$blogCategory->render()}}
                </div>
            </div>
        </div>
@stop