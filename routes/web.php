<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// 路由组设置
//后台的登录页面
Route::get('admin/logins','Admin\LoginController@login');
Route::post('admin/dologin','Admin\LoginController@dologin');
Route::get('admin/captcha','Admin\LoginController@captcha');


// ['login','roleper']
//后台
Route::group(['middleware'=>'login'], function(){
	//后台的首页
	Route::get('admins','Admin\IndexController@index');
	Route::resource('/admin/index','Admin\IndexController');
	//后台的管理员
	Route::resource('/admin/user','Admin\UserController');
	Route::get('/admin/userrole','Admin\UserController@user_role');
	Route::post('/admin/douserrole','Admin\UserController@do_user_role');

	//角色管理
	Route::resource('/admin/role','Admin\RoleController');
	Route::get('/admin/roleper','Admin\RoleController@role_per');
	Route::post('/admin/doroleper','Admin\RoleController@doroleper');
	// 权限管理
	Route::resource('/admin/permission','Admin\PermissionController');

	
	//后台文章管理
	Route::resource('/admin/articles','Admin\ArticlesController');

	//修改头像
	Route::get('admin/profile','Admin\LoginController@profile');
	Route::post('admin/upload','Admin\LoginController@upload');

	//修改密码
	Route::get('admin/pass','Admin\LoginController@pass');
	Route::post('admin/dopass','Admin\LoginController@dopass');

	//退出
	Route::get('admin/logout','Admin\LoginController@logout');
	// 广告
	Route::resource('/admin/poster','Admin\PosterController');
	// 轮播
	Route::resource('/admin/lunbo','Admin\LunboController');
	// 友情链接
	Route::resource('/admin/friend','Admin\FriendController');
	// 评论
	Route::resource('/admin/comments','Admin\CommentsController');
	// 导航
	Route::resource('/admin/sorts','Admin\SortsController');
	//标签管理
	Route::resource('/admin/labels','Admin\LabelsController');


	

});


//前台首页
Route::get('/homes', 'Home\IndexController@index');
//前台的注册
Route::get('/home/regist','Home\RegistController@regist');
Route::post('/home/doregist','Home\RegistController@doregist');
Route::get('/home/doremind','Home\RegistController@doremind');
//前台的登录
Route::get('/home/login','Home\LoginController@login');
Route::post('/home/dologin','Home\LoginController@dologin');
Route::get('/home/captcha','Home\LoginController@captcha');

//前台退出
Route::get('home/logout','Home\LoginController@logout');

//前台修改密码
Route::get('home/mima','Home\LoginController@mima');
Route::post('home/domima','Home\LoginController@domima');

//前台
Route::group([], function(){
	

});

// Route::resource('/home/articles','Home\ArticlesController');
Route::get('home/articles/{id}','Home\ArticlesController@index');
Route::post('home/articles/{id}','Home\ArticlesController@create');
Route::resource('/home/articles','Home\ArticlesController');

// 申请广告
Route::resource('/home/guang','Home\GuangController');
// 申请链接
Route::resource('/home/lian','Home\LianController');


//文章分类
Route::get('/home/fenlei/{id}','Home\FenleiController@fenlei');

//标签
Route::get('/home/biaoqian/{labelname}','Home\BiaoqianController@biaoqian');

//搜索
/*Route::get('/home/sousuo/{keywords}','Home\SousuoController@sousuo');*/

//个人资料
Route::get('/home/geren','Home\GerenController@geren');
Route::post('/home/dogeren','Home\GerenController@dogeren');