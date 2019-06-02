<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// use App\Model\Admin\Sorts;
use App\Model\Admin\Articles;
// use App\Model\Admin\Articles_photo;
use App\Model\Admin\Labels;


use App\Model\Admin\Comments;
use App\Model\Admin\User;
// use App\Model\Admin\Articles;

use DB;

// use DB;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($gid)
    {
        $labels = DB::table('labels')->join('articles','labels.id','=','articles.tags')->get();
        $rs=DB::table('articles')->where('id', $gid)->get();
        $res=DB::table('comments')->where('article_id',$gid)->get();

        // $user = User::select(DB::raw('*,concat(username) as username'))->
        // orderBy('username','asc')->
        // get();
        // $articles = Articles::select(DB::raw('*,concat(title) as title'))->
        // orderBy('id','asc')->
        // get();
        // $rss = Comments::select(DB::raw('*,concat(path,id) as paths'))->
        // orderBy('paths','asc')->
        // get();
 
// dump($rs);
// dump($labels);


        return view('home.articles.articles',[
            'title'=>'文章页面',
            'rs'=>$rs,
            'labels'=>$labels,
            'res'=>$res,
            // 'user'=>$user,
            // 'articles'=>$articles,
            // 'rss'=>$rss,

      

        ]);

    }
    public function create($id)
    {
        // //根据id获取数据
        // $rs = Comments::find($id);
        // // dump($rs);
        // $res = Comments::select(DB::raw('*,concat(path,id) as paths'))->
        // orderBy('paths','asc')->
        // get();

        // foreach($res as $k => $v){
        //     //根据字符串重复的次数
        //     $info = substr_count($v->path, ',')-1;
        //     //改变分类名的样式
        //     $v->catename = str_repeat('|--', $info).$v->catename;
        // }

        //显示页面
         echo "<script>alert('123');</script>";
    }


}