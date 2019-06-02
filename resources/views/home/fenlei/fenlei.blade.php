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

</style>
<div class="container">

		<div id="main" style="width: 1030px;">

@foreach($rs as $k => $v)
			<div class="entry">

				<div class="entry-header">
					
					<h2 class="title"><a href="#">{{$v->title}}</a></h2>
					

		
					<p class="meta">{{$v->time}}</p>
				


					<a href="/home/articles/{{$v->id}}" class="button">阅读更多</a>
					
				</div><!-- end .entry-header -->
					@php
						
						$us = DB::table('articles_photo')->where('articles_photo.gid','=',$v->id)->first();
						
					@endphp
					
				<div class="entry-content">
					

					
					<a href="#"><img src="{{$us->gimg}}" width="240" height="140" alt="" class="entry-image" /></a>
					
					
					<p>{!!str_limit($v->content,600,'...')!!}
					</p>

					<hr />

					<ul class="entry-links">
						<li><a href="#">评论</a> <span class="separator">|</span></li>

					</ul>

				</div><!-- end .entry-content -->

			</div><!-- end .entry -->
@endforeach
			
		</div><!-- end #main -->
		
		<div class="clear"></div>

	</div><!-- end .container -->
@stop