@extends('common/admins')


@section('title',$title)

@section('content')
<div class="row-fluid">  
    <div class="span12">

@if(session('success'))
    <div class="alert alert-info" id="wang">
        {{session('success')}}
    </div>
    @endif


        
          
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet box light-grey">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-globe">
                            </i>
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    {{$title}}
                                </font>
                            </font>
                        </div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse">
                            </a>
                            <a href="#portlet-config" data-toggle="modal" class="config">
                            </a>
                            <a href="javascript:;" class="reload">
                            </a>
                            <a href="javascript:;" class="remove">
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div id="sample_1_wrapper" class="dataTables_wrapper form-inline" role="grid">
                            <div class="row-fluid">
                                <div class="span6">

                            
                            <table class="table table-striped table-bordered table-hover dataTable"
                            id="sample_1" aria-describedby="sample_1_info">
                                <thead>
                                    <tr role="row">
                                        <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_1"
                                        rowspan="1" colspan="1" aria-label="要点：激活以对列升序进行排序" style="width: 137px;">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">
                                                    ID
                                                </font>
                                            </font>
                                        </th>
                                        <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_1"
                                        rowspan="1" colspan="1" aria-label="要点：激活以对列升序进行排序" style="width: 137px;">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">
                                                    用户名
                                                </font>
                                            </font>
                                        </th>
                                        <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_1"
                                        rowspan="1" colspan="1" aria-label="要点：激活以对列升序进行排序" style="width: 137px;">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">
                                                    邮箱
                                                </font>
                                            </font>
                                        </th>
                                        <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_1"
                                        rowspan="1" colspan="1" aria-label="要点：激活以对列升序进行排序" style="width: 137px;">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">
                                                    手机号
                                                </font>
                                            </font>
                                        </th>
                                        <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_1"
                                        rowspan="1" colspan="1" aria-label="要点：激活以对列升序进行排序" style="width: 137px;">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">
                                                    头像
                                                </font>
                                            </font>
                                        </th>
                                        <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_1"
                                        rowspan="1" colspan="1" aria-label="要点：激活以对列升序进行排序" style="width: 137px;">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">
                                                    用户生日
                                                </font>
                                            </font>
                                        </th>
                                        <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_1"
                                        rowspan="1" colspan="1" aria-label="要点：激活以对列升序进行排序" style="width: 137px;">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">
                                                    年龄
                                                </font>
                                            </font>
                                        </th>
                                        <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_1"
                                        rowspan="1" colspan="1" aria-label="要点：激活以对列升序进行排序" style="width: 137px;">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">
                                                    QQ
                                                </font>
                                            </font>
                                        </th>
                                        <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_1"
                                        rowspan="1" colspan="1" aria-label="要点：激活以对列升序进行排序" style="width: 137px;">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">
                                                    微信
                                                </font>
                                            </font>
                                        </th>
                                        <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_1"
                                        rowspan="1" colspan="1" aria-label="要点：激活以对列升序进行排序" style="width: 137px;">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">
                                                    个人介绍
                                                </font>
                                            </font>
                                        </th>
                                        <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_1"
                                        rowspan="1" colspan="1" aria-label="要点：激活以对列升序进行排序" style="width: 137px;">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">
                                                    性别
                                                </font>
                                            </font>
                                        </th>
                                      
                                        
                                        <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_1"
                                        rowspan="1" colspan="1" aria-label="要点：激活以对列升序进行排序" style="width: 137px;">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">
                                                    操作
                                                </font>
                                            </font>
                                        </th>
                                </thead>
                                <tbody role="alert" aria-live="polite" aria-relevant="all">
                                @foreach($rs as $k => $v)
                                    @if($k % 2 == 0)
                                    <tr class="gradeX odd">
                                    @else
                                    <tr class="gradeX even">
                                    @endif
                                        <td class="center hidden-480 ">
                                            {{$v->id}}
                                        </td>
                                        <td class="center hidden-480 ">
                                            {{$v->username}}
                                        </td>
                                        <td class="center hidden-480 ">
                                            {{$v->email}}
                                        </td>
                                        <td class="center hidden-480 ">
                                            {{$v->phone}}
                                        </td>
                                        <td class="center hidden-480 ">
                                            <img src="{{$v->profile}}">                                           
                                        </td>
                                        <td class="center hidden-480 ">
                                            {{$v->user_birthday}}
                                        </td>
                                        <td class="center hidden-480 ">
                                            {{$v->user_age}}
                                        </td>
                                        <td class="center hidden-480 ">
                                            {{$v->user_qq}}
                                        </td>
                                        <td class="center hidden-480 ">
                                            {{$v->user_wx}}
                                        </td>
                                        <td class="center hidden-480 ">
                                            {{$v->user_geren}}
                                        </td>
                                        <td class="center hidden-480 ">
                                            {{$v->user_sex}}
                                        </td>
                                        
                                        <td class=" ">
                                            
                                            <a class='btn btn-warning' href="/admin/userinfo/{{$v->id}}/update">修改</a>


                                            <form action="/admin/userinifo/{{$v->id}}" method='post' style='display: inline'>
                                                {{csrf_field()}}
                                                {{method_field('DELETE')}}
                                                <button class='btn btn-danger'>删除</button>
                                            </form>
                                        </td>   
                                    

                                    </tr>
                                @endforeach
                                   
                                    
                                </tbody>
                            </table>
                            <div class="row-fluid">
                                <div class="span6">
                                    <div class="dataTables_info" id="sample_1_info">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">
                                                 本页显示{{$rs->count()}}条数据   共是{{$rs->total()}}条数据
                                            </font>
                                        </font>
                                    </div>
                                </div>
                                <div class="span6">
                                    <div class="dataTables_paginate paging_bootstrap pagination">
                                        <ul>
                                            {{$rs->appends($request->all())->links()}}
                                           
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>


@stop


@section('js')
  <script>
      
    setTimeout(function(){

        $('#wang').hide(1200)
    },2000)  
  </script>
 


@stop