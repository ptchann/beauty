<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Auth;
use Session;
use App\Users;

class RegisterController extends Controller{
    function register(){
        return view('blog.register');
    }
    function create(Request $request){
        $email=$request->input('email');
        $name=$request->input('name');
        $password=$request->input('password');
        //Trong truong hop tat ca deu co thong tin
        if(!$email)
        {
            Session::flash('error-message','Vui lòng nhập email!');
            return Redirect::to('/register');
        }
        if(!$name)
        {
            Session::flash('error-message','Vui lòng nhập tên của bạn');
            return Redirect::to('/register');
        }
        if(!$password)
        {
            Session::flash('error-message','Vui lòng nhập mật khẩu');
            return Redirect::to('/register');
        }
        //kiem tra user co ton tai khong
        $newCheckUser = new Users;
        $newCheckUser = $newCheckUser->where('email',$email)->first();
        if($newCheckUser)
        {
            Session::flash('error-message','Email: '.$email.' đã được đăng ký!');
            return Redirect::to('/register');
        }

        $createNewUser = new Users;
        $createNewUser->name     = $name;
        $createNewUser->email    = $email;
        $createNewUser->password = bcrypt($password); //bcrypt:ma hoa password
        $createNewUser->save();
        // return Redirect::to('/');

        $userInfo=array(
            'email'=>$email,
            'password'=>$password,
        );

        if(Auth::validate($userInfo))
        {
            if(Auth::attempt($userInfo))
            {
                return Redirect::to('/'); 
            }
            else 
            {
                Session::flash('error-message','Lỗi đăng nhập');
                return Redirect::to('/login');
            }
        }
        else{
                Session::flash('error-message','Lỗi đăng nhập');
                return Redirect::to('/login');
        }
    }
}
?>