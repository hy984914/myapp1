@extends('common/homes')

@section('title',$title)

@section('content')

<div id="content">

	<div class="container">
		

		<div id="respond" class="box">
			<div class="box-header">
				
				<h6 class="align-left">申请广告</span></h6>

				<p class="align-right">
					<b>申请成功后将自动跳转网站</b>
				</p>
				
			</div>
				<form action="/home/guang" method="post" enctype="multipart/form-data" id="comment-form" class="form clearfix">
                    <div class="input_block">

                        <p>
							<label for="name">联系人</label>
							
							<input type="text" name="poster_man" id="email" class="input placeholder">  

						</p>

						<p>
							
							<label for="email">联系人邮箱</label>
							<input type="text" name="poster_email" id="email" class="input placeholder">  
							
							
						</p>

						<p>
							<label for="name">联系人电话</label>
							
							<input type="text" name="poster_phone" id="email" class="input placeholder">  

						</p>

						<p>
							
							<label for="email">轮播图片</label>
							<input type="file" name='profile' >
							
							
						</p>

                    </div>
                    <div class="textarea_block">
                   

                        <div class="form-actions"">
							{{csrf_field()}}
							<input type="submit" value="添加" class="submit" id="wangq">

						</div>
                    </div>
                    </form>
</div>
</div>
</div>
<style type="text/css">

#wangq{
	margin-left: -100px;
	margin-top: 200px;

	float: left;
}

#comment-form .input_block{
	margin-left: 200px; 

}

#wangq {
    position: relative;
    display: inline-block;
    background: #D0EEFF;
    border: 1px solid #99D3F5;
    border-radius: 4px;
    padding: 4px 12px;
    overflow: hidden;
    color: #1E88C7;
    text-decoration: none;
    text-indent: 0;
    line-height: 20px;
}


</style>
@stop