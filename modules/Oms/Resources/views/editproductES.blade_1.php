@extends('oms::layouts.dashboardlayout')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Product
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('oms.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Edit Product</li>
    </ol>
</section>
@if(isset($productArray))
{{--*/ $product = json_decode($productArray) /*--}}
{{--*/ $productResults = $product->results; /*--}}
{{--*/ $productResult = $productResults[0]; /*--}}
{{--*/ $sku = $productResult->sku; /*--}}
{{--*/ $productType = $productResult->type_product; /*--}}
{{--*/ $productName = $productResult->product_name; /*--}}
{{--*/ $productDescription = $productResult->short_description; /*--}}
{{--*/ $productFullDescription = $productResult->description; /*--}}
{{--*/ $brand = $productResult->brand; /*--}}
{{--*/ $color = $productResult->color; /*--}}
{{--*/ $price = $productResult->price; /*--}}
{{--*/ $weightPackage = $productResult->weight_package; /*--}}
{{--*/ $weightProduct = $productResult->weight_product; /*--}}
{{--*/ $dimensionWidth = $productResult->dimension_package_width; /*--}}
{{--*/ $dimensionLength = $productResult->dimension_package_length; /*--}}
{{--*/ $dimensionHeight = $productResult->dimension_package_height; /*--}}
{{--*/ $images = $productResult->images; /*--}}
{{--*/ $youtubeUrl = $productResult->youtube_url; /*--}}
@else
{{--*/ $sku = ''; /*--}}
{{--*/ $productType = ''; /*--}}
{{--*/ $productName = ''; /*--}}
{{--*/ $productDescription = ''; /*--}}
{{--*/ $productFullDescription = ''; /*--}}
{{--*/ $brand = ''; /*--}}
{{--*/ $color = ''; /*--}}
{{--*/ $price = ''; /*--}}
{{--*/ $weightPackage = ''; /*--}}
{{--*/ $weightProduct = ''; /*--}}
{{--*/ $dimensionWidth = ''; /*--}}
{{--*/ $dimensionLength = ''; /*--}}
{{--*/ $dimensionHeight = ''; /*--}}
{{--*/ $images = ''; /*--}}
{{--*/ $youtubeUrl = ''; /*--}}
@endif

<!-- Main content -->
<section class="content">
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">{{$productName}}</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <form action="{{route('oms.saveproduct')}}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
            <input type="hidden" name="sku" value="{{ $sku }}" />
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group"> 
                    
                    <div class="form-group">              
                        <label>Sku</label>
                        {!! Form::text('sku', $sku , ['id' => 'sku','class'=>'form-control add-top-margin', 'placeholder'=>'Sku'] ) !!}
                    </div>
                        
                    <label>Product Name</label>
                        {!! Form::text('productName', $productName , ['id' => 'productName','class'=>'form-control add-top-margin', 'placeholder'=>'product name'] ) !!}
                    </div>

                    
                    <div class="form-group">              
                        <label>Brand</label>
                        {!! Form::text('brand', $brand , ['id' => 'brand','class'=>'form-control add-top-margin', 'placeholder'=>'Brand' ] ) !!}
                        {!! Form::hidden('brandValue', '' , ['id' => 'brandValue','class'=>'form-control add-top-margin', 'placeholder'=>'brandValue' ] ) !!}
                    </div>
                    
                    <div class="form-group">              
                        <label>Product Type</label>
                        {!! Form::text('productType', $productType , ['id' => 'productType','class'=>'form-control add-top-margin', 'placeholder'=>'Product Type' ] ) !!}
                        {!! Form::hidden('productTypeValue', '' , ['id' => 'productTypeValue','class'=>'form-control add-top-margin', 'placeholder'=>'Product Type Value' ] ) !!}
                    </div>
                    
                    <div class="form-group">              
                        <label>Color</label>
                        {!! Form::text('color', $color , ['id' => 'color','class'=>'form-control add-top-margin', 'placeholder'=>'Color' ] ) !!}
                        {!! Form::hidden('colorValue', '' , ['id' => 'colorValue','class'=>'form-control add-top-margin', 'placeholder'=>'colorValue' ] ) !!}
                    </div>
                    
                    <div class="form-group">              
                        <label>Price</label>
                        {!! Form::text('price', $price , ['id' => 'price','class'=>'form-control add-top-margin', 'placeholder'=>'Price' ] ) !!}
                    </div>
                    
                    <div class="form-group">              
                        <label>Weight Package</label>
                        {!! Form::text('weightPackage', $weightPackage , ['id' => 'weightPackage','class'=>'form-control add-top-margin', 'placeholder'=>'Weight Package' ] ) !!}
                    </div>
                    
                    <div class="form-group">              
                        <label>Weight Product</label>
                        {!! Form::text('weightProduct', $weightProduct , ['id' => 'weightProduct','class'=>'form-control add-top-margin', 'placeholder'=>'weight Product' ] ) !!}
                    </div>
                    
    
                </div>
                
                <div class="col-md-6">
                    <div class="box-body pad">
                        <textarea name="productDescription" class="textarea" placeholder="Product Description" 
                                  style="width: 100%; height: 200px; font-size: 14px; 
                                          line-height: 18px; border: 1px solid #dddddd; 
                                          padding: 10px;">{{$productDescription}}</textarea>
                    </div>
                    
                    <div class="box-body pad">
                        <textarea name="productFullDescription" class="textarea" placeholder="Product Description" 
                                  style="width: 100%; height: 200px; font-size: 14px; 
                                          line-height: 18px; border: 1px solid #dddddd; 
                                          padding: 10px;">{{$productFullDescription}}</textarea>
                    </div>
                </div>
                
                <div class="col-md-12">
                    <label class='pull-left'>Images</label>
                    @foreach($images as $imagesDetail)
                    <div class='col-md-2'>                        
                    <img src='{{$imagesDetail->url}}' class='img-responsive'>
                    {!! Form::hidden('imagesUrl[]', $imagesDetail->url , ['id' => 'imagesUrl-{{$imagesDetail->position}}','class'=>'form-control add-top-margin', 'placeholder'=>'images url' ] ) !!}
                    </div>
                    @endforeach
                </div>
                
                <!-- /.col -->
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Send To Matahari Mall</button>
            </div>
            <!-- /.row -->
            </form>
        </div>

    </div>
    <!-- /.row -->
</section>
<!-- /.content -->

<script>
    $(document).on('ready', function(){
        $('#datepicker').datepicker({
        autoclose: true,
        format: 'dd/mm/yyyy' 
      });
      
//      var brandOptions = {
//	url: function(phrase) {
//		return "{!! route('oms.getBrand') !!}" +"/"+ phrase;
//	},
//
//	getValue: "brand",
//        
//        list: {
//
//		onSelectItemEvent: function() {
//			var brandId = $("#brand").getSelectedItemData().id;
//			$("#brandValue").val(brandId).trigger("change");
//		}
//            }
//        
//        };
//      $("#brand").easyAutocomplete(brandOptions);
//    })    
</script>
@stop
