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
        <li class="active">Brand</li>
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
                    @if(policy($cms_model)->write_brand())
                        <a href="{{route('oms.editBrandMP')}}"><span class="icon24 glyphicon glyphicon-plus"></span></a>
                    @endif
                    @if(count($brandArray)>0)

                    <table id="tabledata" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="25%">Brand ES</th>
                                <th width="20%">Brand Mapping ID</th>
                                <th width="25%">Brand Mapping Desc</th>
                                <th width="20%">MarketPlace</th>
                                <th width="10%">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($brandArray as $brandArrayDetail)
                            <tr>
                                <td>{{$brandArrayDetail->brand_es}}</td>
                                <td>{{$brandArrayDetail->brand_marketplace_id}}</td>
                                <td>{{$brandArrayDetail->brand_marketplace_desc}}</td>
                                <td>{{$brandArrayDetail->marketplace_name}}</td>
                                <td>
                                    @if(policy($cms_model)->write_brand())
                                        <a href="{!! route('oms.editBrandMP').'/'.$brandArrayDetail->brand_mapping_id !!}" title="edit"><span class="glyphicon glyphicon-edit"></span></a>
                                    @else
                                        -
                                    @endif
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