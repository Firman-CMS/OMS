@extends('oms::layouts.dashboardlayout')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Brand
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('oms.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Edit Product</li>
    </ol>
</section>

@if(count($brandArray)>0)
{{--*/ $brand = $brandArray[0] /*--}}
{{--*/ $brandES = $brand->brand_es /*--}}
{{--*/ $brandMarketplace = $brand->brand_marketplace_desc /*--}}
{{--*/ $brandMarketplaceID = $brand->brand_marketplace_id /*--}}
{{--*/ $brandMappingID = $brand->brand_mapping_id /*--}}
@else
{{--*/ $brandES = $brandResults; /*--}}
{{--*/ $brandMarketplace = '' /*--}}
{{--*/ $brandMarketplaceID = '' /*--}}
{{--*/ $brandMappingID = '' /*--}}
@endif

<!-- Main content -->
<section class="content">
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">{{$brandES}}</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <form name='form' id='form' action="{{route('oms.saveBrand')}}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
            <input type="hidden" name="brandMappingID" value="{{$brandMappingID}}" />
            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">              
                        <label>Brand</label>
                        {!! Form::text('brand', $brandES , ['id' => 'brand','class'=>'form-control add-top-margin', 'placeholder'=>'Brand', 'readonly'=>'readonly'] ) !!}
                    </div>
                
                    <div class="form-group">              
                        <label>Market Place</label>

                        <select class="form-control" id="marketPlace" name='marketPlace'>
                            @foreach($marketPlaceArray as $marketPlaceArrayDetail)                        
                            <option value="{{$marketPlaceArrayDetail->marketplace_id}}">{{$marketPlaceArrayDetail->marketplace_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group">              
                        <label>Mapping</label>
                        {!! Form::text('brandMarketplace', $brandMarketplace , ['id' => 'brand','class'=>'form-control add-top-margin', 'readonly'=>'readonly'] ) !!}
                        {!! Form::hidden('brandMarketplaceID', $brandMarketplaceID , ['id' => 'brand','class'=>'form-control add-top-margin', 'placeholder'=>'brand', 'readonly'=>'readonly'] ) !!}
                        <button type='button' class="btn btn-default" onclick="callPopUp('{{route('oms.listbrand')}}')">Find</button>
                    </div>
                    
                </div>
                
                <div class="col-md-6">
                    
                </div>
                
                <!-- /.col -->
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Post & save</button>
            </div>
            <!-- /.row -->
            </form>
        </div>

    </div>
    <!-- /.row -->
</section>
<!-- /.content -->

<script>
    function callPopUp(menu){
        var marketPlace = $("#marketPlace").val();
        var menuPage = menu + '/' + marketPlace;
        showPopup(menuPage, '850', '700');
        return false;
    }
</script>
@stop
