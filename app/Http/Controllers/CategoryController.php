<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Auth;
use Session;
use App\BlogCategory;

class CategoryController extends Controller{

    function index(Request $request){
        $blogCategory = new BlogCategory;
        $blogCategory = $blogCategory->orderBy('title','ASC')->paginate(4)->appends($request->all());
        return view('blog.category.index',['blogCategory'=>$blogCategory]);
    }

    function create(){
        return view('blog.category.create');
    }
    function store(Request $request){
       
        $title=$request->input('title');

        if(!$title)
        {
            Session::flash('error-message','Vui lòng nhập tiêu đề');
            return Redirect::to('/blog/category/create');    
        }

        $createCategory = new BlogCategory;
        $createCategory->title     = $title;
        $createCategory->save();

        return Redirect::to('blog/category/detail/'.$createCategory->id);
    }

    function detail($id){
        $category= new BlogCategory;
        $category= $category->find($id);
        return view('blog.category.detail',['category'=>$category]);
    }

    function delete($id){
        $category= new BlogCategory;
        $category= $category->find($id);
        $category->delete();
        return Redirect::to('/blog/category/create'); 
    }
}
?>