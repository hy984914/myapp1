<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Admin\Lunbo;

class LunboController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $rs = Lunbo::orderBy('id','asc')

            ->where(function($query) use($request){
                //检测关键字
                $name = $request->input('name');
               
                //如果用户名不为空
                if(!empty($name)) {
                    $query->where('name','like','%'.$name.'%');
                }
            })
            ->paginate($request->input('num', 10));
        return view('admin.lunbo.list',[
            'title'=>'轮播的列表页面',
            'request'=>$request,
            'rs'=>$rs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.lunbo.create',[
            'title'=>'轮播添加页面'

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
        $this->validate($request, [
            'name' => 'required',
            'profile' => 'required|image',
            
            
        ],[
            'profile.required' => '轮播图片不能为空',
            'profile.image' => '轮播图片格式不正确',
            'name.required' => '轮播名不能为空',
           
        ]);
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
        //存放数据库里面
        $data = Lunbo::create($rs);

        if($data){

            return redirect('/admin/lunbo')->with('success','添加成功');

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
        $rs = Lunbo::find($id);

        //显示页面
        return view('admin.lunbo.edit',[
            'title'=>'轮播的修改页面',
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
        $data = Lunbo::where('id',$id)->update($rs);

        if($data){

            return redirect('/admin/lunbo')->with('success','修改成功');
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
        //根据id删除数据
        $data = Lunbo::destroy($id);

        if($data){

            return redirect('/admin/lunbo')->with('success','删除成功');
        } else {

            return back()->with('error','删除失败');

        }
    }
}
