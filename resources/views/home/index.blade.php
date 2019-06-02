@extends('common/homes')

@section('title',$title)

@section('content')

<style type="text/css">
.entry-content{
  overflow: hidden;
}
.entry-content a img{
  cursor: pointer;
  transition: all 0.6s;
}
.entry-content a img:hover{
  transform: scale(1.1);
}
.active{
	height: 25px; 
     line-height: 27px; 
     text-decoration: none; 
     padding: 0 8px; 
    /* color: red;
     background: red; */
}
.disabled{
	height: 25px; 
     line-height: 27px; 
     text-decoration: none; 
     padding: 0 8px; 
    /* color: red;
     background: red; */
}
</style>
<div id="slider">


	<div class="container">

		<ul>
			@foreach($rs as $k => $v)
			<li>
				
				<img src="{{$v->profile}}" width="1010" height="330" alt="" />
				
			

			</li>

			@endforeach			
		</ul>

	</div><!-- end .container -->
	
</div><!-- end #slider -->
<div class="container">

		<div id="main">
			
		

			

@foreach($rsss as $k => $v)
			<div class="entry">

				<div class="entry-header">
					
					<h2 class="title"><a href="/home/articles/{{$v->gid}}">{{$v->title}}</a></h2>
					

		
					<p class="meta">{{$v->time}}</p>
				


					<a href="/home/articles/{{$v->gid}}" class="button">阅读更多</a>
					
				</div><!-- end .entry-header -->

				<div class="entry-content">
					
					<a href="#"><img src="{{$v->gimg}}" width="240" height="140" alt="" class="entry-image" /></a>
					<p>{!!str_limit($v->content,600,'...')!!}
					</p>

					<hr />

					<ul class="entry-links"">
						<li><a href="/home/articles/{{$v->gid}}">评论</a> <span class="separator">|</span></li>

						
					</ul>

				</div><!-- end .entry-content -->

			</div><!-- end .entry -->
			
@endforeach

			
			<ul class="pagination">
		<div class="align-right">
			{{$rsss->render()}}
		</div>
				
		</ul>	
			

		</div><!-- end #main -->

		<div id="sidebar">
		
			<div class="ads box">

				<ul>
					<li>
						<a href="#?ref=smuliii"><img width="125" height="125" src="http://envato.s3.amazonaws.com/referrer_adverts/tf_125x125_v5.gif" alt="Themeforest"></a>
					</li>
					<li class="even">
						<a href="http://graphicriver.net/?ref=smuliii"><img width="125" height="125" src="http://envato.s3.amazonaws.com/referrer_adverts/gr_125x125_v4.gif" alt="Graphicriver"></a>
					</li>
					<li>
						<a href="http://activeden.net/?ref=smuliii"><img width="125" height="125" src="http://envato.s3.amazonaws.com/referrer_adverts/ad_125x125_v4.gif" alt="Activeden"></a>
					</li>
					<li class="even">
						<a href="http://codecanyon.net/?ref=smuliii"><img width="125" height="125" src="http://envato.s3.amazonaws.com/referrer_adverts/cc_125x125_v1.gif" alt="CodeCanyon"></a>
					</li>
				</ul>
				
				

			</div><!-- end .ads -->
			
			<div id="recent-tabs" class="box">
			
				<div class="box-header">
		
					<ul class="nav">
						<li><a class="current" href="#recent-tabs-posts">最近文章</a></li>
					</ul>

				</div><!-- end .box-header -->

				<div class="list-wrap">
					@foreach($rsss as $k => $v)
					<ul id="recent-tabs-posts">

						<li>
							<a href="/home/articles/{{$v->gid}}" class="title">
								<img src="{{$v->gimg}}" width="40" height="40" alt="" />
								{{$v->title}}
							</a>
							<p class="meta">发表于<a href="#">{{$v->time}}</a></p>
						</li>

					@endforeach

					</ul><!-- end #recent-tabs-posts-->

					

				</div><!-- end .list-wrap -->
				
			</div><!-- end #recent-tabs -->
			<div id="recent-tabs" class="box">
			
				<div class="box-header">
		
					<ul class="nav">
						
						<li><a href="#recent-tabs-comments">最近评论</a></li>
					</ul>

				</div><!-- end .box-header -->
					<div class="#recent-tabs-comments">
					<!-- 代码1：放在页面需要展示的位置  -->
					<!-- 如果您配置过sourceid，建议在div标签中配置sourceid、cid(分类id)，没有请忽略  -->
					<div id="cyReping" role="cylabs" data-use="reping"></div>
					<!-- 代码2：用来读取评论框配置，此代码需放置在代码1之后。 -->
					<!-- 如果当前页面有评论框，代码2请勿放置在评论框代码之前。 -->
					<!-- 如果页面同时使用多个实验室项目，以下代码只需要引入一次，只配置上面的div标签即可 -->
					<script type="text/javascript" charset="utf-8" src="https://changyan.itc.cn/js/lib/jquery.js"></script>
					<script type="text/javascript" charset="utf-8" src="https://changyan.sohu.com/js/changyan.labs.https.js?appid=cyufYpT97"></script>
					</div>
				</div><!-- end #recent-tabs -->


			<div class="flickr-feed box">

				<div class="box-header">
					
					<h6 class="align-left"><img src="/home/img/icon-flickr-feed.png" alt="icon-flickr-feed" class="flickr-icon" />广告栏目</h6>

					<a href="/home/guang/" class="align-right">申请广告</a>

				</div><!-- end .box-header -->
				@foreach($poster as $k => $v)
				
				<ul>
						<p>
							
							<img src="{{$v->profile}}" style="width:280px;height:160px;">
						</p>
						
				</ul>
		
				@endforeach
			</div><!-- end .flickr-feed -->

			<div class="tags box">

				<div class="box-header">

					<h6>标签链接</h6>

				</div><!-- end .box-header -->

				<ul>
					@foreach($rss as $k => $v)
					<li><a href="/home/biaoqian/{{$v->labelname}}">{{$v->labelname}}</a></li>
					@endforeach
					
				</ul>

			</div><!-- end .tags -->

			<img src="/home/img/ad.gif" alt="ad" class="ad-bar" />
			<a href="#?ref=smuliii"><img src="http://envato.s3.amazonaws.com/referrer_adverts/tf_300x250_v5.gif" alt="tf_300x250_v5" class="ad" /></a>

		</div><!-- end #sidebar -->

		<div class="clear"></div>

	</div><!-- end .container -->
@stop