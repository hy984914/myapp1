<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Admin\Sorts;
use App\Model\Admin\Articles;
use App\Model\Admin\Articles_photo;
use App\Model\Admin\Labels;

use DB;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //获取传过来的数据
       /* $um = $_GET['num'];
        $se = $_GET['search'];*/

         //dd($um, $se);
          //dump($um, $se);
        
        $search = $request->search;

        $rs = Articles::where('title','like','%'.$search.'%')->paginate($request->input('num',5));

        //获取数据
       /* $rs = Articles::paginate(4);*/


        //显示一个列表页
        return view('admin.articles.list',[
            'title'=>'文章列表页面',
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

        //获取分类信息
        $rs = Sorts::select(DB::raw('*,concat(path,id) as paths'))->
        orderBy('paths','asc')->
        get();

        foreach($rs as $k => $v){
            //根据字符串重复的次数
            $info = substr_count($v->path, ',')-1;
            //改变分类名的样式
            $v->catename = str_repeat('|--', $info).$v->catename;
        }

        $labels = Labels::select(DB::raw('*,concat(labelname) as labelnames5'))->
        orderBy('labelname','asc')->
        get();

        
        return view('admin.articles.create',[
            'title'=>'后台的文章添加页面',
            'rs'=>$rs,
            'labels'=>$labels
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
            'title' => 'required',
            
            'keywords' => 'required',
            'catid' => 'required',
            // 'labelname' => 'required',
            'gimg' => 'required',
            'status' => 'required',
           
            
            
        ],[
            'title.required' => '标题不能为空',
            
            'keywords.required' => '关键字不能为空',
            'catid.required' => '栏目不能为空',
            // 'labelname.required' => '标签不能为空',
            'gimg.required' => '标题图片不能为空',
            'status.required' => '状态不能为空',
           
            
        ]);
        
        //获取表单传过来的信息
        $rs = $request->except('_token','gimg');

        $data = Articles::create($rs);

        //处理图片上传
        if ($request->hasFile('gimg')) {

            //获取图片上传的信息
            $files = $request->file('gimg');

           $gs = [];
            //遍历
            foreach($files as $k => $v){
                $garr = [];
                // $garr['gid'] = $gid;
                //更改名
                $names = 'gimg_'.rand(1111,9999).time();
                //获取后缀
                $suffix = $v->getClientOriginalExtension();
                //移动
                $v->move('./uploads/gimgs',$names.'.'.$suffix);
                //保存的是商品图片的路径
                $garr['gimg'] = "/uploads/gimgs/".$names.'.'.$suffix;
                //第一种方式
                // $gs[] = $garr;

                //第二种方式
                array_push($gs,$garr);
            }
        }

        try{ 
            //存储商品的图片
            $res = $data->gm()->createMany($gs);

            if ($res) {
                
                return redirect('/admin/articles')->with('success','添加成功');
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
       //根据id 删除图片存放的位置
        $res = Articles_photo::find($id);

        $data = @unlink('.'.$res->gimg);

        if(!$data){

            echo '删除路径图片失败';
        }

        //根据id获取信息
        $rs = Articles_photo::where('id',$id)->delete();

        if($rs){

            echo 1;
        } else {

            echo 0;
        } 

       
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
        $rs = Articles::find($id);

        //获取关联表的商品图片信息
        //一对多的查询  只查询关联的信息
        $gs = $rs->gm()->get();

        $res = Sorts::select(DB::raw('*,concat(path,id) as paths'))->
        orderBy('paths','asc')->
        get();
        $labels = Labels::select(DB::raw('*,concat(labelname) as labelnames5'))->
        orderBy('labelname','asc')->
        get();

        foreach($res as $k => $v){
            //根据字符串重复的次数
            $info = substr_count($v->path, ',')-1;
            //改变分类名的样式
            $v->catename = str_repeat('|--', $info).$v->catename;
        }


        return view('admin.articles.edit',[
            'title'=>'商品的修改页面',
            'rs'=>$rs,
            'res'=>$res,
            'gs'=>$gs,
            'labels'=>$labels
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
       //获取数据信息
        $rs = $request->except('_token','_method','gimg');

        //
        $data = Articles::where('id',$id)->update($rs);

          //商品的图片处理
        if ($request->hasFile('gimg')) {

            $files = $request->file('gimg');

            $gs = [];
            //遍历
            foreach($files as $k => $v){
                $garr = [];
                $garr['gid'] = $id;
                //更改名
                $names = 'gimg_'.rand(1111,9999).time();
                //获取后缀
                $suffix = $v->getClientOriginalExtension();
                //移动
                $v->move('./uploads/gimgs',$names.'.'.$suffix);
                //保存的是商品图片的路径
                $garr['gimg'] = "/uploads/gimgs/".$names.'.'.$suffix;
                //第一种方式
                // $gs[] = $garr;

                //第二种方式
                array_push($gs,$garr);
            }
        }

        //添加商品的关联图片
        $res = DB::table('articles_photo')->insert($gs);

        if($res){

            return redirect('/admin/articles')->with('success','修改成功');
        } else {

             return redirect('/admin/articles')->with('success','修改失败');
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
        //删除图片的路径信息
        $rs = Articles_photo::where('gid',$id)->get();

        foreach($rs as $k => $v){

            @unlink('./'.$v->gimg);
        }
        
        $gm = Articles::find($id);

        $gm->delete();

        $res = $gm->gm()->delete();

        if($res){

            return redirect('/admin/articles')->with('success','删除成功');
        } else {

            return back()->with('error','删除失败');
        }



        



    }


}
