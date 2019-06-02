@extends('common/admins')

@section('title',$title);

@section('content')

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
                            <a href="javascript:;" class="collapse"></a>
                            <a href="#portlet-config" data-toggle="modal" class="config"></a>
                            <a href="javascript:;" class="reload"></a>
                            <a href="javascript:;" class="remove"></a>
                        </div>
                    </div>
                    <div class="portlet-body">
                      
                        <div id="sample_1_wrapper" class="dataTables_wrapper form-inline" role="grid">
                            <div class="row-fluid">
                                <div class="span6">

                                    <form action="/admin/labels" method='get'>
                                        <div id="DataTables_Table_1_length" class="dataTables_length">
                                         <label>
                                                    显示
                                                    <select size="1" name="num" aria-controls="DataTables_Table_1">
                                                        <option value="5" @if($request->num == '5') selected="selected" @endif >
                                                            5
                                                        </option>
                                                        <option value="10" @if($request->num == '10') selected="selected" @endif>
                                                            10
                                                        </option>
                                                        <option value="15" @if($request->num == '15') selected="selected" @endif>
                                                            15
                                                        </option>
                                                        
                                                    </select>
                                                    条数据
                                          </label>
                         </div>
                        </div>
                        <div class="span6">
                         <div class="dataTables_filter" id="sample_1_filter">
                          <label>标签:<input type="text" name='search'aria-controls="sample_1" class="m-wrap small" / style="height: 35px;"></label>
                          <button type="submit" class="btn">搜索</button>
                         </div>
                        </div>
                       </div>
                       </form>
                       <table class="table table-striped table-bordered table-hover table-full-width dataTable" id="sample_1" aria-describedby="sample_1_info"> 
                        <thead> 
                         <tr role="row">
                         	 <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 120px;">ID</th>
                          <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 120px;">标签</th>
                         
                          <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 120px;">描述</th>

                          <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 120px;">状态</th>
                          
                          <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 137px;">操作</th>
                           </tr> 
                           </tr> 
                        </thead> 
                        <tbody role="alert" aria-live="polite" aria-relevant="all">
                         
                  		@foreach($rs as $k => $v)
                        <!-- @if($k % 2 == 0)
                            <tr class="odd">
                        else
                            <tr class="even">
                        @endif -->

                  			<td class=" ">{{$v->id}}</td>

                  			<td class=" ">{{$v->labelname}}</td>

                  			<td class=" ">{{$v->description}}</td>

                  			<td class=" ">
                            
                            @if($v->status == 1)
                                开启
                            @else
                                禁用
                            @endif
                           
                        </td>

                  			<td class=" ">
                                            
                            <a class='btn wine red' href="/admin/labels/{{$v->id}}/edit">修改</a>


                            <form action="/admin/labels/{{$v->id}}" method='post' style='display: inline'>
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <button class='btn blue'>删除</button>
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