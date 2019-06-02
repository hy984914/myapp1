@extends('common/homes')

@section('title',$title)

@section('content')

<div id="content">

	<div class="container">
		

		<div id="respond" class="box">
			<div class="box-header">
				
				<h6 class="align-left">个人资料</span></h6>
				
			</div>

				@php 
		            $rs = DB::table('user')->where('id',session('uid'))->first();
		           
		        @endphp
				<form action="/home/dogeren" method="post" enctype="multipart/form-data" id="comment-form" class="form clearfix">
					
                    <div class="input_block">

						<dl>
				            <dt>用户名称：</dt>
				            <dd> <span class="w400"> 
				              {{$rs->username}}
				          </span> </dd>
				          </dl>
				          <dl>
				            <dt>邮箱：</dt>
				            <dd><span class="w400">
				                  {{$rs->email}}
				                </span> </dd>
				          </dl>
				         @php 
				         $re = DB::table('userinfo')
				          ->join('user','userinfo.uid','=','user.id')
				          ->where('uid',session('uid'))->first();
				        @endphp
						
						@if(empty($re->uid))
						
			          
				          <dl>
				            <dt>地址：</dt>
				            <dd><span class="w400">
				              <input type="text" class="text" id="address" name="address" value='' />
				              </span> </dd>
				          </dl>

				          <dl>
				            <dt>爱好</dt>
				            <dd><span class="w400">
				              <input type="text" class="text" id="like" name="like" value='' />
				              </span> </dd>
				          </dl>
							
							

				           <dl>
				            <dt>年龄：</dt>
				            <dd><span class="w400">
				              <input type="text" class="text" id="age" name="age" value='' />
				              </span> </dd>
				          </dl>

				           
                       @else
                       		
			          
				          <dl>
				            <dt>地址：</dt>
				            <dd><span class="w400">
				              <input type="text" class="text" id="address" name="address" value='{{$re->address}}' />
				              </span> </dd>
				          </dl>
							
							<dl>
				            <dt>爱好</dt>
				            <dd><span class="w400">
				              <input type="text" class="text" id="like" name="like"  value='{{$re->like}}' />
				              </span> </dd>
				          </dl>

				           <dl>
				            <dt>年龄：</dt>
				            <dd><span class="w400">
				              <input type="text" class="text" id="age" name="age" value='{{$re->age}}' />
				              </span> </dd>
				          </dl>

				           
						@endif
						
                    </div>
                    <div class="textarea_block">

                        <div class="form-actions"">
							{{csrf_field()}}
							<input type="submit" value="修改"  id="wangq">

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