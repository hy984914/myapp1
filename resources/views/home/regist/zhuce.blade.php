
@section('title',$title)


<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <link type="text/css" rel="stylesheet" href="css/login.css">
    <script type="text/javascript" src="js/jquery.min.js"></script>

</head>
<body class="login_bj" >

<div class="zhuce_body">
	<div class="logo"><a href="#"><img src="/home/images/xiaohuihui.png" width="200" height="54" border="0"></a></div>
    <div class="zhuce_kong">
    	<div class="zc">
        	<div class="bj_bai">
            <h3>{{$title}}</h3>
       	  	  <form action="/home/doregist" method="post" >
                <input name="username" type="text" class="kuang_txt phone" placeholder="用户名">
                <input name="password" type="password" class="kuang_txt possword" placeholder="密码">
                <input name="phone" type="text" class="kuang_txt phone" placeholder="手机号">
                <input name="email" type="text" class="kuang_txt email" placeholder="邮箱">   
                <br />
                <br />

                {{csrf_field()}}
                <button class="btn_zhuce"  value="注册" style="width: 100px;">注册</button>
                
                
                </form>
            </div>
        	<div class="bj_right">
            	<p>使用以下账号直接登录</p>
                <a href="#" class="zhuce_qq">QQ登录</a>
                <a href="#" class="zhuce_wb">微博登录</a>
                <a href="#" class="zhuce_wx">微信登录</a>
                <p>已有账号？<a href="/home/login">立即登录</a></p>
            
            </div>
        </div>
    </div>

</div>
    


</body>

