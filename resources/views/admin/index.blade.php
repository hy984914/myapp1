@extends('common/admins')


@section('title','MyApp后台')

@section('content')
<style type="text/css">
.row-fluid .span6 {
	margin: 0 auto;
	width: 100%;
	height: 100%;
}
</style>
	<div class="span6">
    <!-- BEGIN WORLD PORTLET-->
    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-reorder">
                </i>
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">
                        世界
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
            <div id="vmap_world" class="vmaps" style="width: 590px; position: relative; overflow: hidden;">
                
                <div class="jqvmap-zoomin">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">
                            +
                        </font>
                    </font>
                </div>
                <div class="jqvmap-zoomout">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">
                            -
                        </font>
                    </font>
                </div>
            </div>
        </div>
    </div>
    <!-- END WORLD PORTLET-->
</div>
@stop