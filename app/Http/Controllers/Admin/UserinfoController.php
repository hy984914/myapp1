<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\FormRequest;

use App\Model\Admin\Userinfo;
use Hash;
use DB;

class UserinfoController extends Controller
{
    public function list(Request $request)
    {
        echo '哈哈';


    }
    public function create(Request $request)
    {
        echo '添加';
    }
    // public function store()
    // {
    //    //一对一的添加
    //     $arr = ['uname'=>'joker_kko','password'=>'123456','age'=>30,'class'=>'212'];
    //     //返回的是一个集合
    //     $rs = User::create($arr);
    //     //查找user id
    //     $id = $rs->id;
    //     $res = User::find($id);

    //     $data = $res->uinfo()->create(['user_birthday'=>'321424@qq.com','user_age'=>'13901234567','user_qq'=>'13901234567','user_wx'=>'13901234567','user_geren'=>'13901234567','user_sex'=>'13901234567']);
    //     dump($data);

    //     //一对一的删除
    //     /*$rs = User::find(5);
    //     $rs->delete();
    //     $data = $rs->uinfo()->delete();*/

    //     // var_dump($data);
    // }
   

    
}
