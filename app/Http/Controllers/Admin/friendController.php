<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Admin\Friend;

class friendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $rs = Friend::orderBy('id','asc')

            ->where(function($query) use($request){
                //检测关键字
                $fname = $request->input('fname');
                //如果用户名不为空
                if(!empty($fname)) {
                    $query->where('fname','like','%'.$fname.'%');
                }
            })
            ->paginate($request->input('num', 10));
        return view('admin.friend.list',[
            'title'=>'后台链接的列表页面',
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
         return view('admin.friend.create',[
            'title'=>'后台的友情添加页面'

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
        //
        //
        $this->validate($request, [
            'fname' => 'required',
            'url' => 'required',  
        ],[
            'fname.required' => '链接名不能为空',
            'url.required' => '链接url不能不正确',
        ]);
        $rs = $request->except('_token');
        $data = friend::create($rs);
        if($data){

        return redirect('/admin/friend')->with('success','添加成功');
            
        }else{

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
        $rs = Friend::find($id);
        return view('admin.friend.edit',[
            'title'=>'链接的修改页面',
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
        //获取数据
        $rs = $request->except('_token','_method');

        $data = friend::where('id',$id)->update($rs);
   

        if($data){

            return redirect('/admin/friend')->with('success','修改成功');
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
        $data = Friend::destroy($id);

        if($data){

            return redirect('/admin/friend')->with('success','删除成功');
        } else {

            return back()->with('error','删除失败');

        }
    }
}
