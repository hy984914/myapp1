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

								<form id="art_form" action="/admin/user" class="form-horizontal" method="post" enctype="multipart/form-data">
									<div class="control-group">

										<label class="control-label">头像</label>

										<div class="controls">
											<img id="imgs" src="{{$rs->profile}}" alt="" style="width:130px"><br />
											<input id="file_upload" type="file" name='file_upload' class="default">

										</div>

									</div>
									<div class="form-actions">
										{{csrf_field()}}
										
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

	// alert($);

	//文档加载
	$(function () {
        $("#file_upload").change(function () {
				//  判断是否有选择上传文件
		        var imgPath = $("#file_upload").val();

		        if (imgPath == "") {
		            alert("请选择上传图片！");
		            return;
		        }
		        //判断上传文件的后缀名
		        var strExtension = imgPath.substr(imgPath.lastIndexOf('.') + 1);
		        if (strExtension != 'jpg' && strExtension != 'gif'
		            && strExtension != 'png') {
		            alert("请选择图片文件");
		            return;
		        }

		        var formData = new FormData($('#art_form')[0]);
		       	$.ajax({
		            type: "POST",
		            url: "/admin/upload",
		            data: formData,
		            contentType: false,
		            processData: false,
		            success: function(data) {
		                $('#imgs').attr('src',data);

		                location.href ='/admins';
		            },

		            error: function(XMLHttpRequest, textStatus, errorThrown) {
		                alert("上传失败，请检查网络后重试");
		            }
		        });
        })
    })




   



</script>


@stop