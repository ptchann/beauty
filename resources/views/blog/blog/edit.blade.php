@section('title')
CREATE NEW BLOG
@stop
@extends('blog.general.master')
@section('content')
        <div class="container">
            @if(Session::has('error-message'))
            <div class="alert alert-warning">{{Session::get('error-message')}}</div>
            @endif
            <div class="row">
                <div class="col-12">
                    <form action="{{url('blog/edit/'.$blog->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <table class="table table-stripe">
                            <tr>
                                <td>
                                    Chủ đề
                                </td>
                                <td><input type="text" name="title" placeholder="Title" class="form-control" value="{{$blog->title}}"></td>
                            </tr>
                            <tr>
                                <td>
                                    Danh mục
                                </td>
                                <td>
                                    <select name="cate" class="form-control">
                                        <option value="0">Chọn danh mục</option>
                                        @foreach ($category as $key=>$value)
                                        <option value="{{$value->id}}"
                                        @if($blog->cate_id==$value->id) selected @endif
                                        >{{$value->title}}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Mô  tả
                                </td>
                                <td><textarea name="description" placeholder="Description" class="form-control">
                                    {{$blog->description}}
                                </textarea></td>
                            </tr>
                            <tr>
                                <td>
                                    Nội dung
                                </td>
                                <td><textarea name="content" placeholder="Content" class="form-control textarea">
                                    {!!nl2br($blog->content)!!}
                                </textarea></td>
                            </tr>
                            <tr>
                                <td>
                                    Image
                                </td>
                                <td>
                                    <div>  
                                        <input type="file" name="image">
                                        <br>
                                        <i>Chọn hình ảnh mới</i>
                                    </div>  
                                @if($blog->image)
                                    <div>
                                        <img src="{{url('')}}/{{$blog->image}}" wwidth="500">
                                    </div>
                                @endif
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Tạo
                                </td>
                                <td colspan="2"><input type="submit" value="Update" class="btn btn-primary"></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
@stop