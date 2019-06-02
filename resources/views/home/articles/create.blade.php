@extends('common/homes')

@section('title',$title)

@section('content')
<div id="content">

	<div class="container">
		
		
		<div id="respond" class="box">
			
				<div class="box-header">
				
					<h6 class="align-left">留言1<span>评论</span></h6>

					<p class="align-right">
						<strong><a href="#">添加评论</a></strong>
					</p>
					
				</div>
				
				@foreach($rs as $k => $v)
				<form action="/home/articles/" method="post" id="comment-form" class="form clearfix">

					<div class="input_block">
	
						<p>
							<label for="name">姓名 <span>(姓名)</span></label>
							
							<input type="text" name="username" id="email" class="input placeholder" value="{{$v->username}}">

						</p>

						<p>
							
							<label for="email">文章表id <span>(email)</span></label>
							<input type="text" name="article_id" id="email" class="input placeholder" value="{{$v->id}}">
							
							
						</p>
						
	

	

					</div>


					<div class="textarea_block">

						<p>
							<label for="comment">评论内容 <span>(下面添加)</span></label>
							<textarea id="comment" rows="10" cols="45" class="input" name="commentname"></textarea>
						</p>
						
						<p>
							{{csrf_field()}}
                            <input type="submit" value="添加ar" class="submit">
                            
							

						</p>

					</div>
					
				</form>
				 @endforeach
				
			</div>
	</div><!-- end .container -->

</div>
@php 
dump($res);
@endphp
@stop