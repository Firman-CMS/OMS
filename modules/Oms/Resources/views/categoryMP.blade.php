@extends('oms::layouts.dashboardlayout')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Category
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Category</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Category</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <a href="{{route('oms.editCategoryMP')}}"><span class="icon24 glyphicon glyphicon-plus"></span></a>
                    @if(count($categoryArray)>0)

                    <table id="tabledata" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="25%">Category ES</th>
                                <th width="20%">Category Mapping ID</th>
                                <th width="25%">Category Mapping Desc</th>
                                <th width="20%">MarketPlace</th>
                                <th width="10%">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($categoryArray as $categoryArrayDetail)
                            <tr>
                                <td>{{$categoryArrayDetail->category_es}}</td>
                                <td>{{$categoryArrayDetail->category_marketplace_id}}</td>
                                <td>{{$categoryArrayDetail->category_marketplace_desc}}</td>
                                <td>{{$categoryArrayDetail->marketplace_name}}</td>
                                <td>
                                    <a href="{!! route('oms.editCategoryMP').'/'.$categoryArrayDetail->category_mapping_id !!}" title="edit"><span class="glyphicon glyphicon-edit"></span></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th width="25%">Category ES</th>
                                <th width="20%">Category Mapping ID</th>
                                <th width="25%">Category Mapping Desc</th>
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