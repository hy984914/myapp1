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

            <form action="/admin/role" class="form-horizontal" method="post" enctype="multipart/form-data">




            

                <div class="control-group">

                    <label class="control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">角色名</font></font></label>

                    <div class="controls">

                        <input type="text" name="rolename" class="m-wrap large">

                        <span class="help-inline"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font></font></span>

                    </div>

                </div>



                <div class="control-group">

                    <label class="control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">状态</font></font></label>

                    <div class="controls">

                        

                        <label class="radio line">

                        <div class="radio"><span class="checked"><input type="radio" name="status" value="1" checked></span></div><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">

                        开启

                        </font></font></label>

                        <label class="radio line">

                        <div class="radio"><span><input type="radio" name="status" value="0" ></span></div><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                        
                        禁用

                        </font></font></label>  

                         

                    </div>

                </div>



                <div class="form-actions">
                    {{csrf_field()}}
                    <input type="submit" value="添加" class="btn blue">

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