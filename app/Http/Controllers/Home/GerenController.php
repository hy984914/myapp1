<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Home\geren;
use DB;
class GerenController extends Controller
{
   
    /**
     * 个人资料
     *
     * @return \Illuminate\Http\Response
     */
    public function geren()
    {
        
        return view('home.geren.geren',[
            'title'=>'个人资料详情页', 
        ]);
    }
   public function dogeren(Request $request ){
        $dt = DB::table('userinfo')->where('uid',session('uid'))->first();
        if(!empty($dt->uid)){

    $rs = $request->except('_token');

    $data = DB::table('userinfo')->where('uid',session('uid'))->update(['age'=>$rs['age'],'address'=>$rs['address'],'like'=>$rs['like'],'uid'=>session('uid')]);
    if($data){
        echo "<script>alert('修改个人资料成功');location.href='/home/geren'</script>";
    }else{
        echo "<script>alert('修改个人资料失败');location.href='/home/geren'</script>";
    }

    }else{
        $rs = $request->except('_token');

   $data = DB::table('userinfo')->where('uid',session('uid'))->insert(['age'=>$rs['age'],'address'=>$rs['address'],'like'=>$rs['like'],'uid'=>session('uid')]);
    if($data){
        echo "<script>alert('修改个人资料成功');location.href='/home/geren'</script>";
    }else{
        echo "<script>alert('修改个人资料失败');location.href='/home/geren'</script>";
    }

    }

  } 
}
