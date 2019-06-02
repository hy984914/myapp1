<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Admin\Lunbo;
use App\Model\Admin\Labels;
use App\Model\Admin\Articles;
use App\Model\Admin\Articles_photo;
use App\Model\Admin\Poster;
use DB;

class IndexController extends Controller
{
    //
    public function index(Request $request)
    {
        $rs = DB::table('lunbo')
                     ->select(DB::raw('count(*) as status,profile'))
                     ->where('status', '<>', 1)
                     ->groupBy('id')
                     ->get();
        // $rss = DB::table('labels')->get();
        $rss = DB::table('labels')
                     ->select(DB::raw('count(*) as status,labelname'))
                     ->where('status', '<>', 1)
                     ->groupBy('id')
                     ->get();

        $poster = DB::table('poster')
                     ->select(DB::raw('count(*) as status,profile'))
                     ->where('status', '<>', 1)
                     ->groupBy('id')
                     ->get();
        $rsss = DB::table('articles')->join('articles_photo','articles.id','=','articles_photo.gid')->paginate(5);

    	return view('home.index',[
            'title'=>'小灰灰博客',
            'rs'=>$rs,
            'rss'=>$rss,
            'rsss'=>$rsss,
            'poster'=>$poster,
            // 'search' => $search

        ]);
    }
}
