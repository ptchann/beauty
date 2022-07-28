<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Auth;
use Session;
use App\Blog;
use App\BlogCategory;
use Validator;
use File;

class BlogController extends Controller{

    private $__uploads='uploads';

    function index(Request $request){
        $blog = new Blog;
        $search = $request->input('search');
        
        if($search)
        {
            $blog = $blog->where('title','like',"%$search%")->orderBy('title','ASC')->paginate(4)->appends($request->all());
        }
        else
        {
            $blog = $blog->orderBy('title','ASC')->paginate(8)->appends($request->all());
        }

        $getCategory = new BlogCategory;
        $getCategory = $getCategory->get();
        $category=array();
        $category[0]='';

        foreach($getCategory as $key=>$value)
        {
            $category[$value->id]=$value->title;
        }
        // echo "<pre>";
        // print_r($category);exit;
        return view('blog.blog.index',['blog'=>$blog, 'category'=>$category, 'search'=>$search]);
    }

    function create(){
        $category = new BlogCategory;
        $category = $category->orderBy('title','ASC')->get();
        return view('blog.blog.create', ['category'=>$category]);
    }
    function store(Request $request){
       
        $title=$request->input('title');
        $description=$request->input('description');
        $content=$request->input('content');
        $cate=$request->input('cate');

        if(!$title)
        {
            Session::flash('error-message','Vui lòng nhập tiêu đề');
            return Redirect::to('/blog/create');    
        }

        if(!$description)
        {
            Session::flash('error-message','Vui lòng nhập mô tả');
            return Redirect::to('/blog/create');    
        }

        if(!$content)
        {
            Session::flash('error-message','Vui lòng nhập nội dung');
            return Redirect::to('/blog/create');    
        }

        $image='';
        if($request->hasFile('image'))
        {
            $rules = array('image' => 'mimes:jpeg,jpg,png,gif,svg|required|max:1500');
            $file = $request->file('image');
            $files = array('image' => $file);
            $getClientOriginalName=$file->getClientOriginalName();
            $validator = Validator::make($files, $rules);

            if ($validator->fails())
            {
                Session::flash('error-message', 'Không thể upload hình ảnh');
            }
            else
            {
                $fileName=time().$file->getClientOriginalName();
                $destinationPath = $this->__uploads;
                $fileLocation = $destinationPath.'/'.$fileName;
                $file->move($destinationPath,$fileName);
                $image=$fileLocation;
            }
        }

        $blog = new Blog;
        $blog->title           = $title;
        $blog->description     = $description;
        $blog->content         = $content;
        $blog->image           = $image;
        $blog->cate_id         = $cate;
        $blog->save();

        return Redirect::to('blog/detail/'.$blog->id);
    }

    function detail($id){
        $blog= new Blog;
        $blog= $blog->find($id);
        $category = new BlogCategory;
        $category = $category->find($blog->cate_id);
        return view('blog.blog.detail',['blog'=>$blog, 'category'=>$category]);
    }

    function delete($id){
        $blog= new Blog;
        $blog= $blog->find($id);

        //delete image
        if($blog->image)
        {
            File::delete($blog->image);
        }
        
        $blog->delete();
        return Redirect::to('/blog/create'); 
    }

    function edit($id){
        $blog= new Blog;
        $blog= $blog->find($id);
        $category = new BlogCategory;
        $category = $category->orderBy('title','ASC')->get();
        return view('blog.blog.edit',['blog'=>$blog, 'category'=>$category]);
    }
    
    function update($id,Request $request){
       
        $title=$request->input('title');
        $description=$request->input('description');
        $content=$request->input('content');
        $cate=$request->input('cate');

        if(!$title)
        {
            Session::flash('error-message','Vui lòng nhập tiêu đề');
            return Redirect::to('/blog/create');    
        }

        if(!$description)
        {
            Session::flash('error-message','Vui lòng nhập mô tả');
            return Redirect::to('/blog/create');    
        }

        if(!$content)
        {
            Session::flash('error-message','Vui lòng nhập nội dung');
            return Redirect::to('/blog/create');    
        }

        if($request->hasFile('image'))
        {
            $rules = array('image' => 'mimes:jpeg,jpg,png,gif,svg|required|max:1500');
            $file = $request->file('image');
            $files = array('image' => $file);
            $getClientOriginalName=$file->getClientOriginalName();
            $validator = Validator::make($files, $rules);

            if ($validator->fails())
            {
                Session::flash('error-message', 'Không thể  upload  hình  ảnh');
            }
            else
            {
                $fileName=time().$file->getClientOriginalName();
                $destinationPath = $this->__uploads;
                $fileLocation = $destinationPath.'/'.$fileName;
                $file->move($destinationPath,$fileName);
                $image=$fileLocation;
            }
        }

        $blog = new Blog;
        $blog                  = $blog->find($id);
        $blog->title           = $title;
        $blog->description     = $description;
        $blog->content         = $content;
        if(isset($image))
        {
            $blog->image       = $image;
        }
        
        $blog->cate_id         = $cate;
        $blog->save();

        return Redirect::to('blog/detail/'.$blog->id);
    }
}
?>