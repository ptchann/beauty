@section('title')
List Blog
@stop
@extends('blog.general.master')
@section('content')
<div class="page-header page-header-blog">
                <div class="container">
                    <div class="text-center">
                        <h2>LIST BLOG<span><i class="one-round"></i></span><span><a href="{{url('')}}" style="color:white">Home</a>   / Beauty / Post</span></h2>
                    </div>
                </div>
            </div>
            <br>
<style>
    .pagination svg{width: 20px;}
</style>
        <div class="container">
            <div class="row">
                <div class="col-12"> 
                    <form action="{{url('blog')}}" method="get">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="search" value="{{$search}}" placeholder="Nhập từ khoá" aria-describedby="basic-addon2">
                            <span class="input-group-text" id="basic-addon2"><input type="submit" value="Tìm kiếm" class="btn btn-primary"></span>
                        </div>
                    </form>
                </div>
                <br>
                <div class="col-12">
                    <table class="table table-stripe">
                        <tr>
                            <td>ID</td>
                            <td>Tiêu đề</td>
                            <td>Danh mục</td>
                            <td>Hành động</td>
                        </tr>
                        @foreach ($blog as $key=>$value)
                        <tr>
                            <td>{{$value->id}}</td>
                            <td>{{$value->title}}</td>
                            <td>{{$category[$value->cate_id]}}</td>
                            <td><a href="{{url('blog/detail')}}/{{$value->id}}">Hiển thị</a> <a href="javascript:(0)" onclick="return confirmDelete('{{url('blog/delete')}}/{{$value->id}}','Bạn có muốn xoá không?')" style="color:#a02c2d">Xoá</a></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                <div class="col-12">
                    <div class="pagination">{{$blog->render()}}</div>
                </div>
            </div>
        </div>
@stop