@extends('oms::layouts.dashboardlayout')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Product
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Product</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Product</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <a href="{{route('oms.productES')}}"><span class="icon24 glyphicon glyphicon-plus"></span></a>

                    <table id="configuration" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="10%">SKU</th>
                                <th width="20%">Product Name</th>
                                <th width="20%">Market Place</th>
                                <th width="10%">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($productArray as $productArrayDetail)  
                            {{--*/ $productParam = [
                                            'productID' => (string) $productArrayDetail->product_id, 
                                            'productMappingID' => (string) $productArrayDetail->product_marketplace_id, 
                                            'productMappingVariantID' => (string) $productArrayDetail->product_marketplace_variant_id,
                                            'marketplaceID' => (string) $productArrayDetail->marketplace_id,
                                    ]; /*--}}
                            
                            <tr>
                                <td>{{$productArrayDetail->sku}}</td>
                                <td>{{$productArrayDetail->product_name}}</td>
                                <td>{{$productArrayDetail->marketplace_name}}</td>
                                <td>
                                    <a href="{!! route('oms.editProductMP').'/'.$productArrayDetail->product_id !!}" title="edit"><span class="glyphicon glyphicon-edit"></span></a>
                                    <a href="#" title="delete" onclick="deleteProduct('{{json_encode($productParam)}}','{{route("oms.deleteProduct")}}'); return false;"><span class="glyphicon glyphicon-trash"></span></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th width="10%">SKU</th>
                                <th width="20%">Product Name</th>
                                <th width="20%">Market Place</th>
                                <th width="10%">Action</th>
                            </tr>

                        </tfoot>
                    </table>
                
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
        $("#configuration").DataTable();
    })
</script>    
@stop