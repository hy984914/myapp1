<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Home\Biaoqian;
use DB;
class BiaoqianController extends Controller
{
   
    /**
     * 文章分类
     *
     * @return \Illuminate\Http\Response
     */
    public function biaoqian($labelname)
    {
        
        $rss = DB::table('articles')->where('tags',$labelname)->get();
        

        return view('home.biaoqian.biaoqian',[
            'title'=>'文章标签分类页面', 
            'rss'=>$rss, 
        ]);
    }
    

   

}
