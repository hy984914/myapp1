<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Admin\Poster;

class GuangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('home.guang.create',[
            'title'=>'小灰灰博客申请广告',
            

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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

            return redirect('/homes')->with('success','添加成功');


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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
