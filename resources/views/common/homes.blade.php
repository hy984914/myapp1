<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    
    <link rel="stylesheet" href="/home/css/reset.css" type="text/css" media="screen" />
    
    <!--[if ! lte IE 6]><!-->
    <link rel="stylesheet" href="/home/css/style.css" type="text/css" media="screen" />
    <!--<![endif]-->

    <!--[if gt IE 6]>
    <link rel="stylesheet" href="/home/css/ie.css" type="text/css" media="screen" />
    <![endif]-->
    
    <!--[if IE 7]>
    <link rel="stylesheet" href="/home/css/ie7.css" type="text/css" media="screen" />
    <![endif]-->

    <!--[if lte IE 6]>
    <link rel="stylesheet" href="/home/http://universal-ie6-css.googlecode.com/files/ie6.1.1.css" media="screen, projection">
    <![endif]-->
    
    <link rel="stylesheet" href="/home/css/fancybox.css" type="text/css" media="screen" />
</head>
<style type="text/css">
      body{
   background:url(/home/img/111.jpg)  no-repeat center center;
   background-size:cover;
   background-attachment:fixed;
   background-color:#CCCCCC;
}



</style>
<body>

<div id="header-top">





    <div class="container">
        
        <a href="#"><img src="/home/img/icon-rss-large.png" alt="icon-rss-large" class="rss-icon" /></a>
        @php 
            $us = DB::table('user')->where('id',session('uid'))->first();
           
        @endphp
        <ul>
        @if(empty(session('uid')))
        <li class="left"><a href="/home/login">登录</a></li> | <li class="left"><a href="/home/regist">注册</a> </li>
        <p class="right"><a href="#">电子邮件</a> | <strong>订阅者</strong></p>
        @else
        <li class="left">欢迎<a>{{$us->username}}</a>光临本网站</li> | <li class="left"><a href="/home/logout">退出</a></li>
         <p class="right"><a href="/home/geren">个人资料</a> | <a href="/home/mima">修改密码</a> |<a href="#">电子邮件</a> | <strong>订阅者</strong></p>
        @endif
        @if(session('success'))
        <li class="left">{{session('success')}}</li>
        @endif
        </ul>


       

    </div><!-- end .container -->

</div><!-- end #header-top -->

<div id="header">

    <div class="container">

        
        
        <div id="header-ads">
        
             <h1 id="logo">
            <a href="">
                <img src="/home/images/xiaohuihui.png" alt="Travel Guide">
            </a>
        </h1>
            
        </div><!-- end #header-ads -->

    </div><!-- end .container -->

</div><!-- end #header -->

<div id="nav">

    <div class="container">
        
        @php
        use App\Http\Controllers\Admin\SortsController;

        $rs = SortsController::getfenleiMessage(0);
        @endphp
                        
                        <ul>
                            <li><a href="/homes">首页</a></li>
                            @foreach($rs as $k => $v)
                            <li><a href="/home/fenlei/{{$v->id}}"><div>{{$v->catename}}</div></a>
                                <ul>
                                    @foreach($v->sub as $k2 => $v2)
                                    <li><a href="/home/fenlei/{{$v2->id}}"><div>{{$v2->catename}}</div></a>
                                        <ul>
                                            @foreach($v2->sub as $k3 => $v3)
                                            <li><a href="/home/fenlei/{{$v3->id}}"><div>{{$v3->catename}}</div></a></li>
                                            @endforeach
                                        
                                        </ul>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                            @endforeach
                            
                        </ul>
       

    <form role="form" method="GET" action="">
        <div id="search">
        
            <input type="text" class="input" value="" placeholder="搜索有关信息...">
            <button class="button" type="submit">搜索</button>
            
        </div><!-- end #search -->
    </form>
    </div><!-- end .container -->

</div><!-- end #nav -->

<div id="nav-shadow"></div>



<div id="content">
  @section('content')

 @show
</div><!-- end #content -->
       

<div id="footer">

    <div class="container clearfix">

        <a href="index.html"><img src="/home/img/footer-logo.png" alt="footer-logo" class="footer-logo" /></a>

        <div class="one-third">

            <h4>关爱我们的社区</h4>
            <p>Lorem Ipsum只是 <a href="#">印刷和排版</a> 行业的虚拟文本。自16世纪以来，Lorem Ipsum一直是业界标准的虚拟文本，当时一台未知的打印机采用了类型的厨房，并将其拼凑成一本类型的样本。它不仅存活了五个世纪，而且还延伸到了电子......</p>

            <p>Lorem Ipsum只是 <a href="#">印刷虚拟文本</a> 自16世纪以来，Lorem Ipsum一直是业界标准的虚拟文本，当时......</p>

            <strong><a href="#">寻找更多</a></strong>

        </div><!-- end .one-third -->

        <div class="one-fourth">

            <h4>网警提示</h4>

            <ul id="categories">
                <li><a href="#">网络刷单是违法 切莫轻信有返利</a></li>
                <li><a href="#">网上交友套路多 卖惨要钱需当心</a></li>
                <li><a href="#">电子红包莫轻点 个人信息勿填写</a></li>
                <li><a href="#">仿冒客服来行骗 官方核实最重要</a></li>
                <li><a href="#">招工诈骗有套路 预交费用需谨慎</a></li>
                <li><a href="#">低价充值莫轻信 莫因游戏陷套路</a></li>
                <li><a href="#">连接WIFI要规范 确认安全再连接</a></li>
            </ul>
        </div>


        <div class="two-fifth last">

            <h4><span>友情</span> 链接</h4>

        @php
        use App\Http\Controllers\Admin\FriendController;
       
        $rs = DB::table('friend')
                     ->select(DB::raw('count(*) as status,fname,url'))
                     ->where('status', '<>', 1)
                     ->groupBy('id')
                     ->get();
        @endphp
                        
                        
            <ul id="latest-tweets">
                 @foreach($rs as $k => $v)
                <li>
                    
                    <a href="http://{{$v->url}}" class="user">
                    
                        {{$v->fname}}</a>
                </li>
                @endforeach
                <li>
                    <br>
                    <a href="/home/lian/" class="user">申请链接</a>
                </li>                

            </ul><!-- end #latest-tweets -->
            

        </div><!-- end .one-misc -->

    </div><!-- end .container -->

</div><!-- end #footer -->

<div id="footer-bottom">

    <div class="container">

        <p class="align-center" >Copyright © 2018-2019 版权所有 xiaohuihui</p>

        

    </div><!-- end .container -->

</div><!-- end #footer-bottom -->

<!-- start scripts -->
<script src="/home/js/jquery.min.js"></script>
<script src="/home/js/jquery.cycle.all.min.js"></script>
<script src="/home/js/jquery.easing.1.3.js"></script>
<script src="/home/js/organictabs.jquery.js"></script>
<script src="/home/js/jquery.fancybox-1.3.4.pack.js"></script>
<script src="/home/js/css3-mediaqueries.js"></script>
<script src="/home/js/custom.js"></script>
<!--[if IE]> <script src="/home/js/selectivizr.js"></script> <![endif]-->
<!-- end scripts -->
@section('js')


@show
</body>
</html>