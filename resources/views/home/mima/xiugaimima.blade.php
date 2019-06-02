@extends('common/homes')

@section('title',$title)

@section('content')

<div id="content">

	<div class="container">
		

		<div id="respond" class="box">
			<div class="box-header">
				
				<h6 class="align-left">修改密码</span></h6>

				
			</div>
				<form action="/home/domima" method="post" enctype="multipart/form-data" id="comment-form" class="form clearfix">
                    <div class="input_block">

                        <p>
							<label for="name">旧密码：</label>
							
							<input type="password" name="password" id="email" class="input placeholder">  

						</p>

						<p>
							
							<label for="email">新密码</label>
							<input type="password" name="repassword" id="email" class="input placeholder">  
							
							
						</p>

						<p>
							<label for="name">确认密码</label>
							
							<input type="password" name="repass" id="email" class="input placeholder">  

						</p>


                    </div>
                    <div class="textarea_block">
                   

                        <div class="form-actions"">
							{{csrf_field()}}
							<input type="submit" value="修改" class="submit" id="wangq">

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