@section('title')
{{$category->title}} - List Blog
@stop
@extends('blog.general.master')
@section('content')
        <div class="container">
            <div class="row">
                <div class="col-12">
                    Tiêu đề: {{$category->title}} <a href="javascript:(0)" onclick="return confirmDelete('{{url('blog/category/delete')}}/{{$category->id}}','Bạn có muốn xoá không?')" style="color:#a02c2d">Xoá</a>
                </div>
            </div>
        </div>
@stop
