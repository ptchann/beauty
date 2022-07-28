<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Auth; //kiem tra users co ton tai hay khong
use Session;
use App\Users;

class LoginController extends Controller{
    function index(){

        if(Auth::user()) //kiem tra user da dang nhap chua
        {
            //chuyen ve trang chu
            return Redirect::to('/'); 
        }
        return view('blog.login');
    }
    function login(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');
        $userInfo=array(
            'email'=>$email,
            'password'=>$password,
        );

        if(Auth::validate($userInfo))
        {
            if(Auth::attempt($userInfo,true))
            {
                return Redirect::to('/'); 
            }
            else 
            {
                Session::flash('error-message','Lỗi đăng nhập, vui lòng thử lại');
                return Redirect::to('/login');
            }
        }
        else{
                Session::flash('error-message','Lỗi đăng nhập, vui lòng thử lại');
                return Redirect::to('/login');
        }
        // return Redirect::to('/');
    }
}
?>