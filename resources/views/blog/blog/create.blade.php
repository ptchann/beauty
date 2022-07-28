@section('title')
CREATE NEW BLOG
@stop
@extends('blog.general.master')
@section('content')
<div class="page-header page-header-blog">
                <div class="container">
                    <div class="text-center">
                        <h2>CREATE BLOG<span><i class="one-round"></i></span><span><a href="{{url('')}}" style="color:white">Home</a>   / Beauty / Post</span></h2>
                    </div>
                </div>
            </div>
            <br>
            <br>
        <div class="container">
            @if(Session::has('error-message'))
            <div class="alert alert-warning">{{Session::get('error-message')}}</div>
            @endif
            <div class="row">
                <div class="col-12">
                    <form action="{{url('blog/create')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <table class="table table-stripe">
                            <tr>
                                <td>
                                    Tiêu đề
                                </td>
                                <td><input type="text" name="title" placeholder="Tiêu đề" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>
                                    Danh mục
                                </td>
                                <td>
                                    <select name="cate" class="form-control">
                                        <option value="0">Chọn danh  mục</option>
                                        @foreach ($category as $key=>$value)
                                        <option value="{{$value->id}}">{{$value->title}}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Mô tả
                                </td>
                                <td><textarea name="description" placeholder="Mô tả" class="form-control"></textarea></td>
                            </tr>
                            <tr>
                                <td>
                                    Nội dung
                                </td>
                                <td><textarea name="content" placeholder="Nội dung" class="form-control textarea"></textarea></td>
                            </tr>
                            <tr>
                                <td>
                                    Hình ảnh
                                </td>
                                <td><input type="file" name="image"></td>
                            </tr>
                            <tr>
                                <td>
                                    Tạo
                                </td>
                                <td colspan="2"><input type="submit" value="Tạo mới" class="btn btn-primary"></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
@stop