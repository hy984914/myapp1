<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\FormRequest;

use App\Model\Admin\User;
use App\Model\Admin\Role;
use Hash;

use DB;

class UserController extends Controller
{

    /**
     * 给用户添加角色的页面
     *
     * @return \Illuminate\Http\Response
     */
    public function user_role(Request $request)
    {

        //把用户的信息显示出来
        $uid = $request->uid;

        $us = User::find($uid); 

        //获取所有的角色
        $roles = Role::all();

        //查找当前登录的管理员 具有哪些角色
        //多对多
        // $ur = $us->usr()->get();

        // $urr = [];
        // foreach($ur as $k => $v){

        //     $urr[] = $v->id;
        // }

        return view('admin.user.userrole',[
            'title'=>'用户角色添加页面',
            'us'=>$us,
            'roles'=>$roles,
            // 'urr'=>$urr

        ]);
    }
    /**
     * 处理用户和角色方法
     *
     * @return \Illuminate\Http\Response
     */
    public function do_user_role(Request $request)
    {
        //获取用户的id
        $uid = $request->id;


        //根据用户的id把user_role里面的相关信息 进行删除
        //就是删除之前的角色
        DB::table('user_role')->where('userid',$uid)->delete();

        //获取角色的id
        $rid = $request->roleid;

        //遍历角色
        $ur = [];
        foreach($rid as $k => $v){
            $arr = [];
            $arr['userid'] =  $uid;
            $arr['roleid'] = $v;

            $ur[] = $arr;

            // array_push()
        }

        //往数据表user_role里面添加数据
        $data = DB::table('user_role')->insert($ur);

        if($data){

            return redirect('/admin/user')->with('success','添加角色成功');
        } else {

            return back();
        }


    }





    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //获取传过来的数据
       /* $um = $_GET['num'];
        $se = $_GET['search'];

        // dd($um, $se);
        dump($um, $se);*/

        // $num = $request->num;

        // $search = $request->search;

        //获取数据
        //单个条件的搜索
        // $rs = User::where('username','like','%'.$search.'%')->paginate($request->input('num',10));

        //多个条件的搜索
        $rs = User::orderBy('id','asc')

            ->where(function($query) use($request){
                //检测关键字
                $username = $request->input('username');
                $email = $request->input('email');
                //如果用户名不为空
                if(!empty($username)) {
                    $query->where('username','like','%'.$username.'%');
                }
                //如果邮箱不为空
                if(!empty($email)) {
                    $query->where('email','like','%'.$email.'%');
                }
            })
            ->paginate($request->input('num', 10));


        //显示一个列表页
        return view('admin.user.list',[
            'title'=>'用户的列表页面',
            'rs'=>$rs,
            'request'=>$request

        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.user.create',[
            'title'=>'后台的用户添加页面'

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //表单验证
        
        $this->validate($request, [
            'username' => 'required|regex:/^\w{6,12}$/',
            'password' => 'required|regex:/^\S{8,16}$/',
            'repass'=>'same:password',
            'email'=> 'email',
            'phone'=>'required|regex:/^1[3456789]\d{9}$/',
            'profile' => 'required|image',
            
        ],[
            'username.required' => '用户名不能为空',
            'username.regex' => '用户名格式不正确',
            'username.unique' => '用户名已经存在',
            'password.required'=>'密码不能为空',
            'password.regex'=>'密码格式不正确',
            // 'repass.required'=>'确认密码不能为空',
            'repass.same'=>'两次密码不一致',
            'email.email'=>'邮箱格式不正确',
            'phone.required'=>'手机号码不能为空',
            'phone.regex'=>'手机号码格式不正确',
            'profile.required' => '头像不能为空',
            'profile.image' => '头像格式不正确',
        ]);

        

        //获取表单传过来的信息 返回的数据是一个数组
        $rs = $request->except('_token','repass','profile');

        //处理图片上传
        if($request->hasFile('profile')){

            //获取图片上传的信息
            $file = $request->file('profile');

            //名字
            $name = 'img_'.rand(1111,9999).time();

            //获取后缀
            $suffix = $file->getClientOriginalExtension();

            $file->move('./uploads',$name.'.'.$suffix);

            $rs['profile'] = '/uploads/'.$name.'.'.$suffix;

        }

        //密码的加密
        $rs['password'] = Hash::make($request->password);

        //存放数据库里面
        $data = User::create($rs);

        if($data){

            return redirect('/admin/user')->with('success','添加成功');

        } else {

            return back();

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //根据id获取数据
        $rs = User::find($id);

        //显示页面
        return view('admin.user.edit',[
            'title'=>'用户的修改页面',
            'rs'=>$rs
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //表单验证

        //删除头像
        //通过id获取头像的路径数据

        //通过unlink('.'.路径)删除


        //获取数据
        $rs = $request->except('_token','_method');

        //处理头像
        if($request->hasFile('profile')){

            //获取图片上传的信息
            $file = $request->file('profile');

            //名字
            $name = 'img_'.rand(1111,9999).time();

            //获取后缀
            $suffix = $file->getClientOriginalExtension();

            $file->move('./uploads',$name.'.'.$suffix);

            $rs['profile'] = '/uploads/'.$name.'.'.$suffix;

        }

        //修改数据
        $data = User::where('id',$id)->update($rs);

        if($data){

            return redirect('/admin/user')->with('success','修改成功');
        } else {

            return back()->with('error','修改失败');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //根据id获取路径信息

        //unlink()    返回的boolean

        //根据id删除数据
        $data = User::destroy($id);

        if($data){

            return redirect('/admin/user')->with('success','删除成功');
        } else {

            return back()->with('error','删除失败');

        }
    }
}
