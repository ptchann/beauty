<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Auth;
use Session;
use App\Blog;
use App\BlogCategory;

class CategoryController extends Controller{
    function index($id,Request $request){
        $category = new BlogCategory;
        $category = $category->find($id);
        $blog = new Blog;
        $blog = $blog->where('cate_id',$id)->orderBy('id','DESC')->paginate(4)->appends($request->all());
        $listCategory = new BlogCategory;
        $listCategory=$listCategory->get();
        return view('frontend.category',['blog'=>$blog, 'listCategory'=>$listCategory, 'category'=>$category]);
    }
}
?>