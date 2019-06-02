@extends('common/homes')

@section('title',$title)

@section('content')
<div id="content">

	<div class="container">
		
		<div id="main" class="fullwidth">
			@foreach($rs as $k => $v)
			<div class="entry single">

				<div class="entry-header">
					
					
					<h2 class="title">{{$v->title}}</h2>
					


				
					<p class="meta">{{$v->time}}</p>
				

				</div><!-- end .entry-header -->



		
				<div class="entry-content">
				
					<p>{!!$v->content!!}</p>

				</div><!-- end .entry-content -->
			
				<div class="entry-footer">

					<strong class="align-left"></strong>

					<dl class="horizontal">

						<dt>标签 </dt>
							
							<dd>{{$v->tags}}</dd>
							
						<dt>关键字 </dt>
							<dd>{{$v->keywords}}</dd>
						
					</dl>

				</div><!-- end .entry-footer -->
				
			</div><!-- end .entry -->
			@endforeach
		</div><!-- end #main -->


	
	
<!--PC版-->
				<div id="SOHUCS" sid="{{$v->id}}"></div>


		</div><!-- end .container -->

	</div>




<script charset="utf-8" type="text/javascript" src="https://changyan.sohu.com/upload/changyan.js" ></script>
<script type="text/javascript">
window.changyan.api.config({
appid: 'cyufYpT97',
conf: 'prod_ac33068f438e6e4249cff0a578c789c8'
});
</script>
<style type="text/css">
/*控制消失...使用畅言*/
.section-service-w{height: 0px;opacity: 0;}
/*
#feedAv{ margin-top: -250px!important;transform: scale(0);}

.module-cmt-box{padding:10px 16px!important;}

.header-login{left: 746px!important;border: 0!important;border-radius: 0!important;}

.post-wrap-border-t-r,.post-wrap-border-t-l,.post-wrap-border-r,.post-wrap-border-l{display:none;}

.post-wrap-main{border:0!important;}

.post-wrap-w{background:#f0f0f0;border-radius:5px;box-shadow: 0 2px 6px rgba(0,0,0,.2)}

.btn-fw{background:#5fb878 url(https://static.krnet.cc/skin/images/release.svg)center no-repeat !important;width:60px !important; height:60px !important;border-radius:70px;important;margin-top:-5px!important;margin-right:40px!important;background-size:30px !important;box-shadow: 0 2px 6px rgba(0,0,0,.2);-webkit-transition:.3s;transition:.3s}

.btn-fw:hover{box-shadow: 0 6px 10px rgba(0,0,0,.2);}

.block-head-w{margin-top:-20px !important;}

.section-service-w{height: 0px;opacity: 0;}

.head-img-w{margin:0px 0 0 0 !important;}

.head-img-w img{width:50px !important;height:50px !important;}

.head-img-w{top:115px!important;left:-0px!important;}

.wrap-action-gw{border-bottom:1px solid #dee4e9 !important;padding-top:30px!important;}

.wrap-action-gw span,.wrap-action-gw i,.type-lists,.cmt-list-number,.title-name-gw-tag,.wrap-name-w{display:none!important;}

.cmt-list-type{margin:0!important;}

.build-floor-gw{background:#f0f0f0 !important}

.block-cont-gw{padding:20px 0 !important;border:0 !important;}

.section-list-w{width:95%!important;margin-left:2%!important;}

*/
</style>
@stop