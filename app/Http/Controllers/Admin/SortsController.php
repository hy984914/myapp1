<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Admin\Sorts;

use DB;

class SortsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $rs = Sorts::select(DB::raw('*,concat(path,id) as paths'))->where('catename','like','%'.$request->catename.'%')->
        orderBy('paths','asc')->
        paginate($request->input('num',10));

        foreach($rs as $k => $v){
            //根据字符串重复的次数
            $info = substr_count($v->path, ',')-1;
            //改变分类名的样式
            $v->catename = str_repeat('|--', $info).$v->catename;
        }
        return view('admin.sorts.list',[
            'title'=>'导航的列表页面',
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

        //select *,concat(path,id) as paths from sorts ORDER BY paths asc
        //查询数据
        // $rs = Sorts::all();
        //第一种方式
        // $rs = DB::select('select *,concat(path,id) as paths from sorts ORDER BY paths asc');

         //查询构造器
        //第二种方式
        /*$rs = DB::table('sorts')->select(DB::raw('*,concat(path,id) as paths'))->
        orderBy('paths','asc')->
        get();*/
        // var_dump($rs);


        //模型方式
        //第三种方式
        $rs = Sorts::select(DB::raw('*,concat(path,id) as paths'))->
        orderBy('paths','asc')->
        get();

        //第一种方式
       /* foreach($rs as $k => $v){
            //通过path路径
            $info = count(explode(',',$v->path))-2;

            $v->catename = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;', $info).$v->catename;

            // dump($info);
        }*/

        //第二种方式
        foreach($rs as $k => $v){
            //根据字符串重复的次数
            $info = substr_count($v->path, ',')-1;
            //改变分类名的样式
            $v->catename = str_repeat('|--', $info).$v->catename;
        }

        return view('admin.sorts.create',[
            'title'=>'导航的添加页面',
            'rs'=>$rs
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
            'catename' => 'required',            
        ],[
            'catename.required' => '导航名不能为空',
        ]);
        // dump($request->all());

        $rs = $request->except('_token');

        // 判断
        if($request->pid == '0'){

            $rs['path'] = '0,';
        } else {
            //根据pid进行查询数据
            $res = Sorts::where('id',$request->pid)->first();

            //拼接path路径
            $rs['path'] = $res->path.$res->id.',';
        }

        //添加数据
        //用户模型方式添加数据的时候返回的数据不是boolran也不是受影响行数
        //是一个数据的集合

        try{
           
            $data = Sorts::create($rs);

            if($data){

                return redirect('/admin/sorts')->with('success','添加成功');
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
        $rs = Sorts::find($id);
        // dump($rs);
        $res = Sorts::select(DB::raw('*,concat(path,id) as paths'))->
        orderBy('paths','asc')->
        get();

        foreach($res as $k => $v){
            //根据字符串重复的次数
            $info = substr_count($v->path, ',')-1;
            //改变分类名的样式
            $v->catename = str_repeat('|--', $info).$v->catename;
        }

        //显示页面
        return view('admin.sorts.edit',[
            'title'=>'导航的修改页面',
            'rs'=>$rs,
            'res'=>$res
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

        $data = Sorts::where('id',$id)->update($rs);

        if($data){

            return redirect('/admin/sorts')->with('success','修改成功');
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
        //根据id查询  你底下是否有其他的子分类
        $res = Sorts::where('id', $id)->first();

        //如果有的话的就删除
        $rs = Sorts::where('path','like','%'.$res->path.$res->id.',%')->delete();

        if(!$rs){

            echo '删除子类失败';
        }

        //删除完子分类的信息  就删除自己
        //如果查不到底下有其他的子分类  那么就直接删除自己
        $data = Sorts::destroy($id);

        //判断
        if($data){

            return redirect('/admin/sorts')->with('success','删除成功');
        } else {

            return back()->with('error','删除失败');
        }
    }

    /**
     *  无限极分类的递归
     *
     * @return \Illuminate\Http\Response
     */
    public static function getfenleiMessage($pid)
    {
        /*
            [
                'catename'=>'家用电器',
                'sub_type'=>[
                        [
                            'catename'=>'冰箱',
                            'sub_type'=>[
                                [
                                    'catename'=>'haier冰箱',
                                ],
                                [
                                    'catename'=>'TCL冰箱',
                                ]
            

                            ]

                        ],
                        [
                            'catename'=>'洗衣机',
                            'sub_type'=>[
                                ['catname'=>'LG洗衣机'],
                                ['catname'=>'TCL洗衣机'],

                            ]

                        ],


                ]

            ]


        */
        //前台的遍历
        /*foreach ($rs as $key => $value) {
            # code...

            foreach ($v->sub_type as $key => $value) {
                # code...

                foreach ($v->sub_type as $key => $value) {
                    # code...
                }
            }
        }*/

        //获取顶级的分类
        $cate = Sorts::where('pid',$pid)->get();
        
        $arr = [];

        foreach($cate as $k=>$v){

            if($v->pid==$pid){

                $v->sub=self::getfenleiMessage($v->id);

                $arr[]=$v;
            }
        }  
        return $arr;
    }


   /* public function demo()
    {
        $res = self::getfenleiMessage(0);

        dump($res);
    }*/
}
