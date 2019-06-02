<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Admin\Labels;

use DB;

class LabelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $rs = Labels::where('labelname','like','%'.$search.'%')->paginate($request->input('num',5));

        //显示一个列表页
         return view('admin.labels.list',[
            'title'=>'标签页面',
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
        return view('admin.labels.create',[
            'title'=>'后台的标签添加页面'

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
            'labelname' => 'required',
            'description' => 'required',  
        ],[
            'labelname.required' => '标签名不能为空',
            'description.required' => '别名不能为空',
        ]);
        $rs = $request->except('_token');

        

        try{
           
            $data = labels::create($rs);

            if($data){

                return redirect('/admin/labels')->with('success','添加成功');
            }
        }catch(\Exception $e){

            return back()->with('error','添加失败');

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
        $rs = Labels::find($id);

        //显示页面
        return view('admin.labels.edit',[
            'title'=>'标签的修改页面',
            'rs'=>$rs,
            
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
        //获取数据
        $rs = $request->except('_token','_method');

        $data = Labels::where('id',$id)->update($rs);

        if($data){

            return redirect('/admin/labels')->with('success','修改成功');
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
        $data = Labels::destroy($id);

        if($data){

            return redirect('/admin/labels')->with('success','删除成功');
            
        } else {

            return back()->with('error','删除失败');


        }
    }
}