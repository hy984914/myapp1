@extends('common/admins')

<script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="/ueditor/lang/zh-cn/zh-cn.js"></script>
@section('title',$title)

@section('content')
<style type="text/css">
#wang{
  margin:0 auto;
}
</style>
<div class="row-fluid">
              
 
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
               
            <!-- BEGIN VALIDATION STATES-->

            <div class="portlet box blue tabbable">

              <div class="portlet-title">
                    
                <div class="caption"><i class="icon-reorder"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$title}}</font></font></div>

                <div class="tools">

                  <a href="javascript:;" class="collapse"></a>

                  <a href="#portlet-config" data-toggle="modal" class="config"></a>

                  <a href="javascript:;" class="reload"></a>

                  <a href="javascript:;" class="remove"></a>

                </div>

              </div>

              <div class="portlet-body form">

                <!-- BEGIN FORM-->

                <form action="/admin/articles" id="form_sample_1" class="form-horizontal"  method="post" enctype="multipart/form-data">

                  
                  <div class="control-group">

                    <label class="control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">标题</font></font><span class="required"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">*</font></font></span></label>

                    <div class="controls">

                      <input type="text" name="title" data-required="1" class="span6 m-wrap" placeholder="在此处输入标题">

                    </div>

                  </div>

                  <div class="control-group">

                    <label class="control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">内容</font></font><span class="required"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">*</font></font></span></label>

                    <div class="controls">

                      <script name="content" id="editor" type="text/plain" style="width:1024px;height:500px;"></script>

                    </div>

                  </div>

                  <div class="control-group">

                    <label class="control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">关键字</font></font><span class="required"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">*</font></font></span></label>

                    <div class="controls">

                      <input name="keywords" type="text" class="span6 m-wrap" placeholder="请输入关键字">

                      

                    </div>

                  </div>

                  <div class="control-group">

                    <label class="control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">导航</font></font><span class="required"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">*</font></font></span></label>

                    <div class="controls">

                      <select class="span6 m-wrap" name="catid">

                        <option value="0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">选择...</font></font></option>
                          @foreach($rs as $k => $v)
                        <option value="{{$v->id}}"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$v->catename}}</font></font></option>
                         @endforeach

                        
                        

                      </select>

                    </div>

                  </div>
                  

                  <div class="control-group">
                      <label class="control-label">标签</label>
                      <div class="controls">
                          <select class="large m-wrap"  name='tags'>                       
                              <option value='0'>
                                  请选择
                              </option>
                              @foreach($labels as $k => $v)
                              <option value='{{$v->labelname}}'>
                                  {{$v->labelname}}
                              </option>
                              @endforeach            
                          </select>
                      </div>
                  </div>


                  <div class="control-group">

                    <label class="control-label">标题图片</label>

                    <div class="controls">


                      <input type="file" name='gimg[]' class="default" multiple>

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

                            <div class="radio"><span><input type="radio" name="status" value="0" checked></span></div><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">禁用
                            </font></font></label>  
                          </div>

                        </div>
                  
                  

                  <div class="form-actions">
                    {{csrf_field()}}
                    <button type="submit" class="btn blue"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">提交</font></font></button>

                    

                  </div>

                </form>

                <!-- END FORM-->

              </div>

            </div>

            <!-- END VALIDATION STATES-->

          </div>

        </div>
@stop

@section('js')
<script>
   //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('editor');

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