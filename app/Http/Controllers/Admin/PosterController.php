<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Admin\Poster;

class PosterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $rs = Poster::orderBy('id','asc')

            ->where(function($query) use($request){
                //检测关键字
                $name = $request->input('name');
               
                //如果用户名不为空
                if(!empty($name)) {
                    $query->where('name','like','%'.$name.'%');
                }
            })
            ->paginate($request->input('num', 5));
        return view('admin.poster.list',[
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
        return view('admin.poster.create',[
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
        $data = Poster::create($rs);

        if($data){

            return redirect('/admin/poster')->with('success','添加成功');

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
        $rs = Poster::find($id);

        //显示页面
        return view('admin.poster.edit',[
            'title'=>'广告的修改页面',
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
        $data = Poster::where('id',$id)->update($rs);

        if($data){

            return redirect('/admin/poster')->with('success','修改成功');
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
        $data = Poster::destroy($id);

        if($data){

            return redirect('/admin/poster')->with('success','删除成功');
        } else {

            return back()->with('error','删除失败');

        }
    }
}
