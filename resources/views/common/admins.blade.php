<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->

<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->

<!--[if !IE]><!--> <html lang="en" class="no-js"> <!--<![endif]-->

<!-- BEGIN HEAD -->

<head>

	<meta charset="utf-8" />

	<title>@yield('title')</title>

	<meta content="width=device-width, initial-scale=1.0" name="viewport" />

	<meta content="" name="description" />

	<meta content="" name="author" />

	<!-- BEGIN GLOBAL MANDATORY STYLES -->

	<link href="/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

	<link href="/admin/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>

	<link href="/admin/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>

	<link href="/admin/css/style-metro.css" rel="stylesheet" type="text/css"/>

	<link href="/admin/css/style.css" rel="stylesheet" type="text/css"/>

	<link href="/admin/css/style-responsive.css" rel="stylesheet" type="text/css"/>

	<link href="/admin/css/default.css" rel="stylesheet" type="text/css" id="style_color"/>

	<link href="/admin/css/uniform.default.css" rel="stylesheet" type="text/css"/>

	<!-- END GLOBAL MANDATORY STYLES -->

	<!-- BEGIN PAGE LEVEL STYLES --> 

	<!-- <link href="/admin/css/jquery.gritter.css" rel="stylesheet" type="text/css"/> -->

	<link href="/admin/css/daterangepicker.css" rel="stylesheet" type="text/css" />

	<link href="/admin/css/fullcalendar.css" rel="stylesheet" type="text/css"/>

	<link href="/admin/css/jqvmap.css" rel="stylesheet" type="text/css" media="screen"/>

	<link href="/admin/css/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>

	<!-- END PAGE LEVEL STYLES -->

	<link rel="shortcut icon" href="/admin/image/favicon.ico" />


</head>

<!-- END HEAD -->

<!-- BEGIN BODY -->

<body class="page-header-fixed">

	<!-- BEGIN HEADER -->

	<div class="header navbar navbar-inverse navbar-fixed-top">

		<!-- BEGIN TOP NAVIGATION BAR -->

		<div class="navbar-inner">

			<div class="container-fluid">

				<!-- BEGIN LOGO -->

				<a class="brand" href="index.html">

				<img src="/admin/image/xiaohuihui.png" alt="logo" style="height: 30px;" />

				</a>

				<!-- END LOGO -->

				<!-- BEGIN RESPONSIVE MENU TOGGLER -->

				<a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">

				<img src="/admin/image/menu-toggler.png" alt="" />

				</a>          

				<!-- END RESPONSIVE MENU TOGGLER -->            

				<!-- BEGIN TOP NAVIGATION MENU -->              

				<ul class="nav pull-right">

					@php
							$us = DB::table('user')->where('id',session('uid'))->first();

					@endphp

					<li class="dropdown user">

						<a href="#" class="dropdown-toggle" data-toggle="dropdown">

						<img alt="User Photo" src="{{$us->profile}}" style="width: 36px;" />

						<span class="username">
						{{$us->username}}
						</span>

						<i class="icon-angle-down"></i>

						</a>

						<ul class="dropdown-menu">

							
                    	<li><a href="/admin/profile">修改头像</a></li>
                        <li><a href="/admin/pass">修改密码</a></li>
                        <li><a href="/admin/logout">退出</a></li>
                    

						</ul>

					</li>

					<!-- END USER LOGIN DROPDOWN -->

				</ul>

				<!-- END TOP NAVIGATION MENU --> 

			</div>

		</div>

		<!-- END TOP NAVIGATION BAR -->

	</div>

	<!-- END HEADER -->
    <div class="copyrights">Collect from <a href="http://www.cssmoban.com/" >网页模板</a></div>

	<!-- BEGIN CONTAINER -->

	<div class="page-container">

		<!-- BEGIN SIDEBAR -->

		<div class="page-sidebar nav-collapse collapse">

			<!-- BEGIN SIDEBAR MENU -->        

			<ul class="page-sidebar-menu">

				<li>

					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->

					<div class="sidebar-toggler hidden-phone"></div>

					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->

				</li>

				<li>

<br>

					<!-- END RESPONSIVE QUICK SEARCH FORM -->

				</li>

			
				<li class="">

					<a href="javascript:;">

					<i class="icon-home"></i> 

					<span class="title">首页</span>

					<span class="arrow "></span>

					</a>

					<ul class="sub-menu">

						<li><a href="/admin/index">首页</a></li>

					</ul>

				</li>






				<li class="">

					<a href="javascript:;">

					<i class="icon-android"></i> 

					<span class="title">用户管理</span>

					<span class="arrow "></span>

					</a>

					<ul class="sub-menu">

						<li><a href="/admin/user/create">添加管理员</a></li>
                        <li><a href="/admin/user">浏览管理员</a></li>

					</ul>

				</li>

				<li class="">

					<a href="javascript:;">

					<i class=" icon-user-md"></i> 

					<span class="title">角色管理</span>

					<span class="arrow "></span>

					</a>

					<ul class="sub-menu">

						<li><a href="/admin/role/create">添加角色</a></li>
                        <li><a href="/admin/role">浏览角色</a></li>

					</ul>

				</li>
				<li class="">

					<a href="javascript:;">

					<i class="icon-key"></i> 

					<span class="title">权限管理</span>

					<span class="arrow "></span>

					</a>

					<ul class="sub-menu">

						<li><a href="/admin/permission/create">添加权限</a></li>
                        <li><a href="/admin/permission">浏览权限</a></li>

					</ul>

				</li>

				<li class="">

					<a href="javascript:;">

					<i class=" icon-sitemap"></i> 

					<span class="title">导航管理</span>

					<span class="arrow "></span>

					</a>

					<ul class="sub-menu">

						<li >

							<a href="/admin/sorts/create">添加导航</a>

						</li>

						<li >

							<a href="/admin/sorts">浏览导航</a>

						</li>


					</ul>

				</li>

				<li class="">

					<a href="javascript:;">

					<i class="icon-picture"></i> 

					<span class="title">轮播管理</span>

					<span class="arrow "></span>

					</a>

					<ul class="sub-menu">

						<li >

							<a href="/admin/lunbo/create">添加轮播</a>

						</li>

						<li >

							<a href="/admin/lunbo">浏览轮播</a>

						</li>


					</ul>

				</li>

				<li class="">

					<a href="javascript:;">

					<i class=" icon-bullhorn"></i> 

					<span class="title">广告管理</span>

					<span class="arrow "></span>

					</a>

					<ul class="sub-menu">

						<li >

							<a href="/admin/poster/create">添加广告</a>

						</li>

						<li >

							<a href="/admin/poster">浏览广告</a>

						</li>


					</ul>

				</li>

				<li class="">

					<a href="javascript:;">

					<i class="icon-briefcase"></i> 

					<span class="title">文章管理</span>

					<span class="arrow "></span>

					</a>

					<ul class="sub-menu">

						<li >

							<a href="/admin/articles/create">添加文章</a>

						</li>

						<li >

							<a href="/admin/articles">浏览文章</a>

						</li>


					</ul>

				</li>

				<li class="">

					<a href="javascript:;">

					<i class="icon-paper-clip"></i> 

					<span class="title">链接管理</span>

					<span class="arrow "></span>

					</a>

					<ul class="sub-menu">

						<li >

							<a href="/admin/friend/create">添加链接</a>

						</li>

						<li >

							<a href="/admin/friend">浏览链接</a>

						</li>


					</ul>

				</li>

				<li class="">

					<a href="javascript:;">

					<i class="icon-comments-alt"></i> 

					<span class="title">评论管理</span>

					<span class="arrow "></span>

					</a>

					<ul class="sub-menu">

						<li >

							<a href="/admin/comments/create">添加评论</a>

						</li>

						<li >

							<a href="/admin/comments">浏览评论</a>

						</li>


					</ul>

				</li>

				<li class="">

					<a href="javascript:;">

					<i class=" icon-trello"></i> 

					<span class="title">标签管理</span>

					<span class="arrow "></span>

					</a>

					<ul class="sub-menu">

						<li >

							<a href="/admin/labels/create">添加标签</a>

						</li>

						<li >

							<a href="/admin/labels">浏览标签</a>

						</li>


					</ul>

				</li>


			</ul>

			<!-- END SIDEBAR MENU -->

		</div>

		<!-- END SIDEBAR -->

		<!-- BEGIN PAGE -->

		<div class="page-content">

			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->

		<!-- 	<div id="portlet-config" class="modal hide">

				<div class="modal-header">

					<button data-dismiss="modal" class="close" type="button"></button>

					<h3>Widget Settings</h3>

				</div>

				<div class="modal-body">

					Widget settings form goes here

				</div>

			</div> -->

			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->

			<!-- BEGIN PAGE CONTAINER-->

			<div class="container-fluid">

				<!-- BEGIN PAGE HEADER-->

				<div class="row-fluid">

					<div class="span12">

						<div class="color-panel hidden-phone">

							

						<!-- END BEGIN STYLE CUSTOMIZER -->    

						<!-- BEGIN PAGE TITLE & BREADCRUMB-->

						<h3 class="page-title">

							本页位置 <small></small>

						</h3>

						<ul class="breadcrumb">

							<li>

								<i class="icon-home"></i>

								<a href="/admin/index">首页</a> 

								<i class="icon-angle-right"></i>

							</li>

							<li><a href="">{{$title}}</a></li>

							

						</ul>

						<!-- END PAGE TITLE & BREADCRUMB-->

					</div>

				</div>

					@section('content')


					@show
					</div>

				</div>

				<!-- END PAGE HEADER-->

				<div id="dashboard">

					<!-- BEGIN DASHBOARD STATS -->

			

					<!-- END DASHBOARD STATS -->

					<div class="clearfix"></div>


				

				</div>

			</div>

			<!-- END PAGE CONTAINER-->    

		</div>

		<!-- END PAGE -->

	</div>

	<!-- END CONTAINER -->

	<!-- BEGIN FOOTER -->

	<div class="footer">

		<div class="footer-inner">

			2013 &copy; Metronic by keenthemes.Collect from <a href="http://www.cssmoban.com/" title="网站模板" target="_blank">网站模板</a> - More Templates <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a>

		</div>

		<div class="footer-tools">

			<span class="go-top">

			<i class="icon-angle-up"></i>

			</span>

		</div>

	</div>

	<!-- END FOOTER -->

	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->

	<!-- BEGIN CORE PLUGINS -->
	<script src="/admin/js/jquery-3.2.1.min.js" type="text/javascript"></script>

	<script src="/admin/js/jquery-1.10.1.min.js" type="text/javascript"></script>
	
	<script src="/admin/js/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>

	<!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->

	<script src="/admin/js/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>      

	<script src="/admin/js/bootstrap.min.js" type="text/javascript"></script>

	<!--[if lt IE 9]>

	<script src="/admin/js/excanvas.min.js"></script>

	<script src="/admin/js/respond.min.js"></script>  

	<![endif]-->   

	<script src="/admin/js/jquery.slimscroll.min.js" type="text/javascript"></script>

	<script src="/admin/js/jquery.blockui.min.js" type="text/javascript"></script>  

	<script src="/admin/js/jquery.cookie.min.js" type="text/javascript"></script>

	<script src="/admin/js/jquery.uniform.min.js" type="text/javascript" ></script>

	<!-- END CORE PLUGINS -->

	<!-- BEGIN PAGE LEVEL PLUGINS -->

	<script src="/admin/js/jquery.vmap.js" type="text/javascript"></script>   

	<script src="/admin/js/jquery.vmap.russia.js" type="text/javascript"></script>

	<script src="/admin/js/jquery.vmap.world.js" type="text/javascript"></script>

	<script src="/admin/js/jquery.vmap.europe.js" type="text/javascript"></script>

	<script src="/admin/js/jquery.vmap.germany.js" type="text/javascript"></script>

	<script src="/admin/js/jquery.vmap.usa.js" type="text/javascript"></script>

	<script src="/admin/js/jquery.vmap.sampledata.js" type="text/javascript"></script>  

	<script src="/admin/js/jquery.flot.js" type="text/javascript"></script>

	<script src="/admin/js/jquery.flot.resize.js" type="text/javascript"></script>

	<script src="/admin/js/jquery.pulsate.min.js" type="text/javascript"></script>

	<script src="/admin/js/date.js" type="text/javascript"></script>

	<script src="/admin/js/daterangepicker.js" type="text/javascript"></script>     

	<script src="/admin/js/jquery.gritter.js" type="text/javascript"></script>

	<script src="/admin/js/fullcalendar.min.js" type="text/javascript"></script>

	<script src="/admin/js/jquery.easy-pie-chart.js" type="text/javascript"></script>

	<script src="/admin/js/jquery.sparkline.min.js" type="text/javascript"></script>  

	<!-- END PAGE LEVEL PLUGINS -->

	<!-- BEGIN PAGE LEVEL SCRIPTS -->

	<script src="/admin/js/app.js" type="text/javascript"></script>

	<script src="/admin/js/index.js" type="text/javascript"></script>        

	<!-- END PAGE LEVEL SCRIPTS -->  
	<script>

		jQuery(document).ready(function() {    

		   App.init(); // initlayout and core plugins

		   Index.init();

		   Index.initJQVMAP(); // init index page's custom scripts

		   Index.initCalendar(); // init index page's custom scripts

		   Index.initCharts(); // init index page's custom scripts

		   Index.initChat();

		   Index.initMiniCharts();

		   Index.initDashboardDaterange();

		   Index.initIntro();

		});

	</script>
	

	<!-- END JAVASCRIPTS -->
@section('js')

@show
</body>

<!-- END BODY -->

</html>
