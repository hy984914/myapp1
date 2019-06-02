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
<div class="portlet box blue tabbable">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-reorder">
            </i>
            <span class="hidden-480">
                {{$title}}
            </span>
        </div>
        <div class="tools">
            <a href="javascript:;" class="collapse"></a>
            <a href="#portlet-config" data-toggle="modal" class="config"></a>
            <a href="javascript:;" class="reload"></a>
            <a href="javascript:;" class="remove"></a>
        </div>
    </div>
    

    <div class="portlet-body form">
        <div class="tabbable portlet-tabs">
            <ul class="nav nav-tabs">               
                <li class="active1">
                    <a href="#portlet_tab1" data-toggle="tab">
                        <font style="vertical-align: inherit;">
                            <font >
                                &nbsp;
                            </font>
                        </font>
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="portlet_tab1">
                    <!-- BEGIN FORM-->
                    <form action="/admin/sorts" class="form-horizontal" method="post" >
                        

                        

                        <div class="control-group">
                            <label class="control-label">
                                分类名
                            </label>
                            <div class="controls">
                                <input type="text" name="catename" class="m-wrap large">  
                            </div>
                        </div>
                        <div class="control-group">

                            <label class="control-label">导航列表</label>

                            <div class="controls">

                                <select class="large m-wrap"  name='pid'>

                                    
                                    <option value='0'>
                                        请选择
                                    </option>
                                    @foreach($rs as $k => $v)
                                    <option value='{{$v->id}}'>
                                        {{$v->catename}}
                                    </option>
                                    @endforeach

                                   
                                      
                                   

                                </select>

                            </div>

                        </div>
                        
                        <div class="control-group">

                                        <label class="control-label">状态</label>

                                        <div class="controls">                                            
                                            <label class="radio line">

                                            <div class="radio"><span class="checked"><input type="radio" name="status" value="1" checked></span></div>
                                            启用
                                            </label>

                                            <label class="radio line">

                                            <div class="radio"><span><input type="radio" name="status" value="0" ></span></div>
                                            禁用
                                            </label>  

                                             

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
        </div>
    </div>
</div>
</div>
@stop

@section('js')
  <script>
      
    setTimeout(function(){

        $('#dong').hide(1200)
    },2000)  
  </script>
 


@stop