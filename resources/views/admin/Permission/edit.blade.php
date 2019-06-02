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
	            <a href="javascript:;" class="remove"></a>
	        </div>

		</div>

			



		<div class="portlet-body form">

			<!-- BEGIN FORM-->

			<form action="/admin/permission/{{$rs->id}}" class="form-horizontal" method="post" enctype="multipart/form-data">




			

				<div class="control-group">

					<label class="control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">权限名</font></font></label>

					<div class="controls">

						<input type="text" name="pername" class="m-wrap large" value="{{$rs->pername}}">

						<span class="help-inline"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font></font></span>

					</div>

				</div>

				<div class="control-group">

					<label class="control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">权限路径</font></font></label>

					<div class="controls">

						<input type="text" name="perurl" class="m-wrap large" value="{{$rs->perurl}}">

						<span class="help-inline"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font></font></span>

					</div>

				</div>

				

				








				<div class="form-actions">
					{{csrf_field()}}
					{{method_field('PUT')}}
					<input type="submit" value="修改" class="btn blue">

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