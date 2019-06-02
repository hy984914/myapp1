<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Home\Feilei;
use DB;
class FenleiController extends Controller
{
   
    /**
     * 文章分类
     *
     * @return \Illuminate\Http\Response
     */
   	public function fenlei($id)
   	{
   		$rs = DB::table('articles')->where('catid',$id)->get();
     
   		//dump($rs);

   		return view('home.fenlei.fenlei',[
            'title'=>'文章分类页面', 
     		/*'rsss'=>$rsss,*/
     		'rs'=>$rs, 
        /*'rss'=>$rss, */
        ]);
   	}
    

   

}
