
<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->

<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->

<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<!-- BEGIN HEAD -->

<head>

	<meta charset="utf-8" />

	<title>{{$title}}</title>

	<meta content="width=device-width, initial-scale=1.0" name="viewport" />

	<meta content="" name="description" />

	<meta content="" name="author" />

	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

	<link href="css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>

	<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css"/>

	<link href="css/style-metro.css" rel="stylesheet" type="text/css"/>

	<link href="css/style.css" rel="stylesheet" type="text/css"/>

	<link href="css/style-responsive.css" rel="stylesheet" type="text/css"/>

	<link href="css/default.css" rel="stylesheet" type="text/css" id="style_color"/>

	<link href="css/uniform.default.css" rel="stylesheet" type="text/css"/>

	<!-- END GLOBAL MANDATORY STYLES -->

	<!-- BEGIN PAGE LEVEL STYLES -->

	<link href="css/login.css" rel="stylesheet" type="text/css"/>

	<!-- END PAGE LEVEL STYLES -->

	<link rel="shortcut icon" href="image/favicon.ico" />

</head>


<!-- END HEAD -->

<!-- BEGIN BODY -->

<body class="login">

	<!-- BEGIN LOGO -->

	<div class="logo">

		<img src="image/logo-big.png" alt="" /> 

	</div>

	<!-- END LOGO -->

	<!-- BEGIN LOGIN -->

	<div class="content">

		<!-- BEGIN LOGIN FORM -->
	
		<form class="form-vertical login-form" action="/admin/dologin" method="post">

			<h3 class="form-title" align="center">登录</h3>

			
			<div class="control-group">
				@if(session('error'))
				<div class="alert alert-error">

									<button class="close" data-dismiss="alert"></button>

									<strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">错误！</font></font></strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{session('error')}}

								</font></font></div>
				@endif

				@if(session('success'))
				<div class="alert alert-success">

									<button class="close" data-dismiss="alert"></button>

									<strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">成功！</font></font></strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{session('success')}}

								</font></font></div>
				@endif

				

				<div class="controls">

					<div class="input-icon left">

						<i class="icon-user"></i>

						<input class="m-wrap placeholder-no-fix" type="text" placeholder="请输入账号" name="username"/>

					</div>

				</div>

			</div>

			<div class="control-group">

				<div class="controls">

					<div class="input-icon left">

						<i class="icon-lock"></i>

						<input class="m-wrap placeholder-no-fix" type="password" placeholder="请输入密码" name="password"/>

					</div>

				</div>

			</div>

			<div class="control-group">

				<div class="controls">

					<div class="input-icon left">

						<i class="icon-lock"></i>

						<input style="width:40%" class="m-wrap placeholder-no-fix" type="text" placeholder="请输入验证码" name="code"/>
						<img src="/admin/captcha" alt="" style="border-radius:5px;cursor:pointer" onclick='this.src = this.src+="?1"'>

					</div>

				</div>

			</div>

			<div class="form-actions">

				
				{{csrf_field()}}

				<input type="submit" value="登录" class="btn green pull-right">
			            

			</div>

		</form>

		<!-- END LOGIN FORM -->        		

	</div>

	<!-- END LOGIN -->

	<!-- BEGIN COPYRIGHT -->

	<div class="copyright">

		2013 &copy; Metronic. Admin Dashboard Template.

	</div>

	<!-- END COPYRIGHT -->

	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->

	<!-- BEGIN CORE PLUGINS -->

	<script src="js/jquery-1.10.1.min.js" type="text/javascript"></script>

	<script src="js/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>

	<!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->

	<script src="js/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>      

	<script src="js/bootstrap.min.js" type="text/javascript"></script>

	<!--[if lt IE 9]>

	<script src="js/excanvas.min.js"></script>

	<script src="js/respond.min.js"></script>  

	<![endif]-->   

	<script src="js/jquery.slimscroll.min.js" type="text/javascript"></script>

	<script src="js/jquery.blockui.min.js" type="text/javascript"></script>  

	<script src="js/jquery.cookie.min.js" type="text/javascript"></script>

	<script src="js/jquery.uniform.min.js" type="text/javascript" ></script>

	<!-- END CORE PLUGINS -->

	<!-- BEGIN PAGE LEVEL PLUGINS -->

	<script src="js/jquery.validate.min.js" type="text/javascript"></script>

	<!-- END PAGE LEVEL PLUGINS -->

	<!-- BEGIN PAGE LEVEL SCRIPTS -->

	<script src="js/app.js" type="text/javascript"></script>

	<script src="js/login.js" type="text/javascript"></script>      

	<!-- END PAGE LEVEL SCRIPTS --> 

	<script>

	

	</script>

	<!-- END JAVASCRIPTS -->

</body>

<!-- END BODY -->

</html>