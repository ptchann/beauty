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

class DetailController extends Controller{
    function index($id){
        $blog = new Blog;
        $blog = $blog->find($id);
        $category = new BlogCategory;
        $category = $category->find($blog->cate_id);
        $listCategory = new BlogCategory;
        $listCategory=$listCategory->get();
        return view('frontend.detail',['blog'=>$blog, 'category'=>$category, 'listCategory'=>$listCategory]);
    }
}
?>