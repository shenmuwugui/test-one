<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //登录页面
    public function index(){
        return view('admin.login');
    }
    //验证登录
    public function login(Request $request){
        // 验证
        $request->validate([
            'username'=>'required',
            'password'=>'required'
        ],[
            'username.required'=>'账号不能为空',
            'password.required'=>'密码不能为空'
        ]);
        $credentials = $request->only('username', 'password');
        // 调用Auth认证类，完成登录认证
        if(!Auth::attempt($credentials)){
            // 登录不成功，回显错误信息
            return redirect()->back()->withErrors('账号或密码输入有误');
        }
        // 登录成功跳转至列表页面
        return redirect("novel");
    }
}
