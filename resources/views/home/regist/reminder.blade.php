<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<per>
	<p>尊敬的{{$rs['username']}}:</p>

       <p>您好，感谢您注册（open.xiaohuihui.com）。这是一封注册确认邮件。 
	请点击以下链接完成确认： <a href="http://youwan.shop/home/doremind?id={{$uid}}&token={{$rs['token']}}">http://myapp.cn/home/doremind?id={{$uid}}&token={{$rs['token']}}</a> 
	如果链接不能点击，请复制地址到浏览器，然后直接打开。</p> 

	</per>
					
</body>
</html>