@extends('oms::layouts.dashboardlayout')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Color
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Color</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Color</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    @if(policy($cms_model)->write_color())
                        <a href="{{route('oms.editColorMP')}}"><span class="icon24 glyphicon glyphicon-plus"></span></a>
                    @endif
                    @if(count($colorArray)>0)

                    <table id="tabledata" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="25%">Color ES</th>
                                <th width="20%">Color Mapping ID</th>
                                <th width="25%">Color Mapping Desc</th>
                                <th width="20%">MarketPlace</th>
                                <th width="10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($colorArray as $colorArrayDetail)
                            <tr>
                                <td>{{$colorArrayDetail->color_es}}</td>
                                <td>{{$colorArrayDetail->color_marketplace_id}}</td>
                                <td>{{$colorArrayDetail->color_marketplace_desc}}</td>
                                <td>{{$colorArrayDetail->marketplace_name}}</td>
                                <td>
                                    @if(policy($cms_model)->write_color())
                                        <a href="{!! route('oms.editColorMP').'/'.$colorArrayDetail->color_mapping_id !!}" title="edit"><span class="glyphicon glyphicon-edit"></span></a>
                                    @else
                                        -
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th width="25%">Color ES</th>
                                <th width="20%">Color Mapping ID</th>
                                <th width="25%">Color Mapping Desc</th>
                                <th width="20%">MarketPlace</th>
                                <th width="10%">Action</th>
                            </tr>

                        </tfoot>
                    </table>
                    @endif

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
<script>
    $(function () {
        $("#tabledata").DataTable();
    })
</script>    
@stop