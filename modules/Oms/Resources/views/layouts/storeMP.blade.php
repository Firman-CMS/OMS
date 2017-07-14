@extends('oms::layouts.dashboardlayout')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Brand
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Store</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Brand</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <a href="{{route('oms.editBrandMP')}}"><span class="icon24 glyphicon glyphicon-plus"></span></a>
                    <table id="tabledata" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="25%">Store Name</th>
                                <th width="20%">Store Mapping ID</th>
                                <th width="25%">Store Mapping Desc</th>
                                <th width="20%">MarketPlace</th>
                                <th width="10%">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($storeArray as $storeArrayDetail)
                            <tr>
                                <td>{{$storeArrayDetail->name}}</td>
                                <td>{{$storeArrayDetail->id}}</td>
                                <td>{{$storeArrayDetail->kota}}</td>
                                <td>{{$storeArrayDetail->marketplace_name}}</td>
                                <td>
                                    <a href="{!! route('oms.editBrandMP').'/'.$storeArrayDetail->id !!}" title="edit"><span class="glyphicon glyphicon-edit"></span></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th width="25%">Brand ES</th>
                                <th width="20%">Brand Mapping ID</th>
                                <th width="25%">Brand Mapping Desc</th>
                                <th width="20%">MarketPlace</th>
                                <th width="10%">Action</th>
                            </tr>

                        </tfoot>
                    </table>

                    <div class="row">
                        <div class="col-xs-12 col-md-12 pull-right">
                            <form method="post" action='{{route('oms.searchBrandES')}}'>
                                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                                <input type="text" name="searchParam" class="pull-right"> 
                            </form>
                        </div>                    
                    </div>

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