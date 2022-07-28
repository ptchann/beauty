@section('title')
{{$blog->title}} - List Blog
@stop
@extends('blog.general.master')
@section('content')
        <div class="container">
            <div class="row">
                <div class="col-12">
                        <table class="table table-stripe">
                        <a href="javascript:(0)" onclick="return confirmDelete('{{url('blog/delete')}}/{{$blog->id}}','{{trans('general.confirmDelete',['title'=>$blog->title])}}')" style="color:#a02c2d">Xoá</a><br>
                                                     <a href="{{url('blog/edit')}}/{{$blog->id}}" style="color:#2d5f73">Chỉnh sửa</a>
                            <tr>
                                <td> {{trans('general.title')}}: </td>
                                <td>{{$blog->title}}</td>
                            </tr>
                            <tr>
                                <td>Danh mục: </td>
                                <td>{{$category->title}}</td>
                            </tr>
                            <tr>
                                <td>Hình ảnh</td>
                                <td><img src="{{url('')}}/{{$blog->image}}" width="600"></td>
                            </tr>
                            <tr>
                                <td>Mô tả</td>
                                <td>{!!nl2br($blog->description)!!}</td>
                            </tr>
                            <tr>
                                <td>Nội dung</td>
                                <td>{!!nl2br($blog->content)!!}</td>
                            </tr>
                            <tr>
                                <td>Ngày tạo</td>
                                <td>{{$blog->created_at}}</td>
                            </tr>
                        </table>
                </div>
            </div>
        </div>
@stop