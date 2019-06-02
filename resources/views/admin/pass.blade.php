@extends('common.admins')

@section('title',$title)

@section('content')
<style type="text/css">
#wang{
    margin:0 auto;
}
</style>
<div class="span12" id="wang">
                               
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

                                <form action="/admin/dopass" class="form-horizontal" method="post" >
 
                                    <div class="control-group">

                                        <label class="control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">旧密码</font></font></label>

                                        <div class="controls">

                                            <input type="password" name="oldpass" class="m-wrap large">

                                            <span class="help-inline"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font></font></span>

                                        </div>

                                    </div>
                                    <div class="control-group">

                                        <label class="control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">新密码</font></font></label>

                                        <div class="controls">

                                            <input type="password" name="password" class="m-wrap large">

                                            <span class="help-inline"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font></font></span>

                                        </div>

                                    </div>
                                    <div class="control-group">

                                        <label class="control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">确认密码</font></font></label>

                                        <div class="controls">

                                            <input type="password" name="repass" class="m-wrap large">

                                            <span class="help-inline"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font></font></span>

                                        </div>

                                    </div>

                                 
                                    <div class="form-actions">
                                        {{csrf_field()}}
                                         
                                        <input type="submit" value="修改" class="btn btn-primary">

                                    </div>
                                    

                                </form>

                                <!-- END FORM-->       

                            </div>

                        </div>

                        <!-- END SAMPLE FORM PORTLET-->

                    </div>
@stop