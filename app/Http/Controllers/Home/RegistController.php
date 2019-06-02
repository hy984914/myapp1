<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

use Mail;

use Hash;

class RegistController extends Controller
{
    //
    public function regist()
    {
    	return view('home.regist.zhuce',['title'=>'前台的注册页面']);
    }

     /**
     * 注册的处理方法
     *
     * @return \Illuminate\Http\Response
     */
    public function doregist(Request $request)
    {
    	//表单验证
    	$rs = $request->except('_token');

    	$rs['password'] = Hash::make($request->password);

    	$rs['token'] = str_random(48);

    	$data = DB::table('user')->insertGetId($rs);

    	session(['uid'=>$data]);

    	//给id加密
    	$userid = base64_encode($data);

    		//注册成功发送邮件
	    	if($data){
	    		//emails.reminder --> 页面信息
	    		Mail::send('home.regist.reminder', ['rs'=>$rs,'uid'=>$userid], function ($m) use ($rs){

		            $m->from(env('MAIL_USERNAME'), '小灰灰博客');

		            $m->to($rs['email'], $rs['username'])->subject('账号注册');
		      });
	     }

    	//发送成功的提示信息
    	return view('home.regist.jihuo');
	}
	/**
     * 点击的邮件处理方法
     *
     * @return \Illuminate\Http\Response
     */
    public function doremind(Request $request)
    {
    	$uid = base64_decode($request->id);

    	$res = DB::table('user')->where('id',$uid)->first();
       
         //点击传过来的参数
    	$token = $request->token;

    	//token的对比
    	if($token != $res->token){

    		echo '验证失败,不能激活';
    	}

    	$rs['status'] = '1';

    	DB::table('user')->where('id',$uid)->update($rs);

    	//跳转
    	return redirect('/home/login');

    }
}
