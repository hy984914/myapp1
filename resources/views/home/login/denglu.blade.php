@section('title',$title)

<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <link type="text/css" rel="stylesheet" href="css/login.css">
    <script type="text/javascript" src="js/jquery-1.8.0.min.js"></script>
</head>

<body class="login_bj">
<div class="zhuce_body">
	<div class="logo"><a href="#"><img src="/home/images/xiaohuihui.png" width="200" height="54" border="0"></a></div>
    <div class="zhuce_kong login_kuang">
    	<div class="zc">
        	<div class="bj_bai">
            <h3>登录</h3>
                {{session('error')}}
       	  	  <form action="/home/dologin" method="post">
                <input name="username" type="text" class="kuang_txt" placeholder="用户名">
            
                <input name="password" type="password" class="kuang_txt" placeholder="密码">
               
                <input style="width:40%;height: 35px;padding-top: 20px;" class="kuang_txt" type="text" placeholder="请输入验证码" name="code"/>
                <img src="/admin/captcha" alt="" style="border-radius:5px;cursor:pointer;" onclick='this.src = this.src+="?1"'>
              
               
                 
                <a href="#">忘记密码？</a><br/>
                
                {{csrf_field()}}
                <button class="btn_zhuce"  value="注册" style="width: 100px;">登录</button>
                
                </form>
            </div>
        	<div class="bj_right">
                <p>使用以下账号直接登录</p>
                <a href="#" class="zhuce_qq">QQ登录</a>
                <a href="#" class="zhuce_wb">微博登录</a>
                <a href="#" class="zhuce_wx">微信登录</a>
                <p>没有账号？<a href="/home/regist">立即注册</a></p>
            
            </div>
        </div>
    </div>

</div>
    
</body>