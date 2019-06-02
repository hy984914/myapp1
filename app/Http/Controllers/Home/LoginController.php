<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;


use Session;
use Hash;

class LoginController extends Controller
{
    //
    public function login()
    {
    	return view('home.login.denglu',['title'=>'前台的登陆界面']);
    }
    public function dologin(Request $request)
    {


    	//检测状态
    	//第一种方式  session
    	/*$us = DB::table('user')->where('id',session('uid'))->first();

    	if($us->status == 0){
    		echo '登录失败，请到你注册时的邮箱进行激活';die;
    	}*/

    	//获取用户名
    	$data = DB::table('user')->where('username',$request->username)->first();
    	if(!$data){
    		//echo '用户名或者密码错误';die;
            return back()->with('error','用户名或者密码错误');
    	}

    	if($data->status == 0){
    		echo '登录失败，请到你注册时的邮箱进行激活';die;
    	}

        //验证码
        $code = session('code');
        if($code != $request->code)
        {
            return back()->with('error','验证码错误');
        }

    	//获取密码
    	//hash检测
    	//Hash::check()
        
        $pass = $data->password;

        if(!Hash::check($request->password,$pass))
        {
             return back()->with('error','密码错误');
             
        }
    //dump($data);
    	//echo 123;
       //存储用户信息
        session(['uid'=>$data->id]);
        

        return redirect('/homes')->with('success','登陆成功');
 
    }
    
    /**
     * 验证码
     *
     * @return \Illuminate\Http\Response
     */
       public function captcha()
        {
            //生成验证码图片的Builder对象，配置相应属性
            $builder = new CaptchaBuilder;
            //可以设置图片宽高及字体
            $builder->build($width = 100, $height = 35, $font = null);
            //获取验证码的内容
            $phrase = $builder->getPhrase();
            //把内容存入session
            // Session::flash('milkcaptcha', $phrase);
            session(['code'=> $phrase]);
            //生成图片
            header("Cache-Control: no-cache, must-revalidate");
            header('Content-Type: image/jpeg');
            $builder->output();
        }

    /**
     * 前台退出
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        //清除session
        session(['uid'=>'']);

        //重定向
        return redirect('/homes')->with('success','退出成功');


    }
     /**
     * 密码
     *
     * @return \Illuminate\Http\Response
     */
    public function mima(){
        return view('home.mima.xiugaimima',['title'=>'前台的修改密码页面']);
    }

   public function domima(Request $request)
    {
        //验证
        //
        //获取旧密码
        $pass = $request->password;

        //获取当前用户的信息
        $rs = DB::table('user')->where('id',session('uid'))->first();
        //dump($rs);
        //Hash
        if(!Hash::check($pass,$rs->password )){

            return back()->with('error','旧密码有误');
        }

        //两次密码一致
        $res['password'] = Hash::make($request->repassword);

        $data = DB::table('user')->where('id',session('uid'))->update($res);

        if($data){
            //清空session
            session(['uid'=>'']);

            return redirect('/home/login');
        } else {

            return back();
        }

    }






    // public function pwduser(Request $request)
    // {
    //     // dump($request->all());
    //     // 获取当前用户的信息
    //     $rs = DB::table('user')->where('id',session('hid'))->first();

    //     // 获取旧密码
    //     $pass = $request->nowpass;

    //     // Hash
    //     if(!Hash::check($pass,$rs->password )){

    //         return back()->with('error','旧密码有误');
    //     }

    //     // 比较两次新密码
    //     $pwd = $request->password;
    //     $repwd = $request->repass;

    //     if($repwd != $pwd){
    //         return back()->with('error','两次密码不一致');
    //     }

    //     // 两次密码一致
    //     $res['password'] = Hash::make($pwd);

    //     $data = DB::table('user')->where('id',session('hid'))->update($res);

    //     if($data){
    //         // 清空session
    //         session(['hid'=>'']);
    //         return redirect('/home/login')->with('success','修改完成');
    //     } else {

    //         return back()->with('error','修改密码错误');
    //     }
    // }
   

}
