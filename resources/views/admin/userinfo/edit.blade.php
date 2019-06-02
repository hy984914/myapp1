@extends('common/admins')

@section('title',$title)

@section('content')
<style type="text/css">
#wang{
	margin:0 auto;
}
</style>
<div class="span12" id="wang">
								@if (count($errors) > 0)
								    <div class="alert alert-block alert-error fade in" id="dong">
								        <ul>
								            @foreach ($errors->all() as $error)
								                <li style="color:red;">{{ $error }}</li>
								            @endforeach
								        </ul>
								    </div>
								@endif


						<!-- BEGIN SAMPLE FORM PORTLET-->   

						<div class="portlet box blue">

							<div class="portlet-title">

								<div class="caption">
									<i class="icon-reorder"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$title}}</font></font>
								</div>
								

								<div class="tools">

									<a href="javascript:;" class="collapse"></a>

									<a href="#portlet-config" data-toggle="modal" class="config"></a>

									<a href="javascript:;" class="reload"></a>

									

								</div>

							</div>

								



							<div class="portlet-body form">

								<!-- BEGIN FORM-->

								<form action="/admin/userinfo" class="form-horizontal" method="post" enctype="multipart/form-data">




								

									<div class="control-group">

										<label class="control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">用户名</font></font></label>

										<div class="controls">

											<input type="text" name="username" class="m-wrap large">

											<span class="help-inline"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font></font></span>

										</div>

									</div>

									

									<div class="control-group">

										<label class="control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">年龄</font></font></label>

										<div class="controls">

											<input type="text" name="user_age" class="m-wrap large">

											<span class="help-inline"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font></font></span>

										</div>

									</div>

									<div class="control-group">

										<label class="control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">qq</font></font></label>

										<div class="controls">

											<input type="text" name='user_qq' class="m-wrap large">

											<span class="help-inline"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font></font></span>

										</div>

									</div>





									<div class="control-group">

										<label class="control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">微信</font></font></label>

										<div class="controls">

											<input type="text" name="user_wx" class="m-wrap large">

											<span class="help-inline"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font></font></span>

										</div>

									</div>

									<div class="control-group">

										<label class="control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">性别</font></font></label>

										<div class="controls">

											<input type="text" name="user_sex" class="m-wrap large">

											<span class="help-inline"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font></font></span>

										</div>

									</div>

									<div class="control-group">

										<label class="control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">生日</font></font></label>

										<div class="controls">

											<input type="datetime-local" name="user_birthday" class="m-wrap large">

											<span class="help-inline"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font></font></span>

										</div>

									</div>



									<div class="control-group">

										<label class="control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">个人介绍</font></font></label>

										<div class="controls">

											<textarea class="large m-wrap" name="user_geren" rows="3"></textarea>

										</div>

									</div>



									<div class="form-actions">
										{{csrf_field()}}
										{{method_field('PUT')}}
										<input type="submit" value="修改" class="btn btn-primary">

									</div>
									

								</form>

								<!-- END FORM-->       

							</div>

						</div>

						<!-- END SAMPLE FORM PORTLET-->

					</div>
@stop


@section('js')

<script>
    //让错误的信息3秒钟之后消失
    /*setInterval(function(){


    },3000)*/

    setTimeout(function(){
        // $('.mws-form-message').slideUp(2000);
        $('#dong').hide();

    },3000)

    // delay(3000).

    
</script>

@stop