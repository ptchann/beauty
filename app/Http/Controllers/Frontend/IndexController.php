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

class IndexController extends Controller{
    function index(Request $request){
        $blog = new Blog;
        $blog = $blog->orderBy('id','DESC')->paginate(7)->appends($request->all());
        $listCategory = new BlogCategory;
        $listCategory=$listCategory->get();
        return view('frontend.index',['blog'=>$blog, 'listCategory'=>$listCategory]);
    }
}
?>