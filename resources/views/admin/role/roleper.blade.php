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

			<form class="form-horizontal" action="/admin/doroleper?rid={{$res->id}}" method='post' >




			

				<div class="control-group">

					<label class="control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">角色名</font></font></label>

					<div class="controls">

						<input type="text" name="rolename" value="{{$res->rolename}}" class="m-wrap large" disabled>

						<span class="help-inline"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font></font></span>

					</div>

				</div>


				<div class="control-group">
                    <label class="control-label">角色</label>
                    <div class="mws-form-item clearfix">
                        <ul class="mws-form-list inline" style="margin:30px;">
                            @foreach($pers as $k => $v)

                                    @if(in_array($v->id, $arr))
                                        <li><label><input type="checkbox"  name='perid[]' value="{{$v->id}}" checked> {{$v->pername}}</label></li>
                                    @else
                                        <li><label><input type="checkbox"  name='perid[]' value="{{$v->id}}" > {{$v->pername}}</label></li>

                                    @endif
                                @endforeach
                        </ul>
                    </div>
                </div>
				



				<div class="form-actions">
					{{csrf_field()}}
					<input type="submit" value="添加" class="btn btn-primary">

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
      
    setTimeout(function(){

        $('#dong').hide(1200)
    },2000)  
  </script>
 


@stop