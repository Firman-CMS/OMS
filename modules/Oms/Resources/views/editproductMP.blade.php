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
{{--*/ $imagesArray = [] /*--}}

@if(count($productArray)>0)

{{--*/ $productResult = $productArray; /*--}}
{{--*/ $productID = $productResult->product_id; /*--}}
{{--*/ $productESID = $productResult->productES_id; /*--}}
{{--*/ $sku = $productResult->sku; /*--}}
{{--*/ $productName = $productArray->product_name; /*--}}
{{--*/ $productDescription = json_decode($productResult->product_hightlight); /*--}}
{{--*/ $hightlight1 = isset($productDescription[0])? $productDescription[0]->description: "No description Yet"; /*--}}
{{--*/ $hightlight2 = isset($productDescription[1])? $productDescription[1]->description: "No description Yet"; /*--}}
{{--*/ $hightlight3 = isset($productDescription[2])? $productDescription[2]->description: "No description Yet"; /*--}}
{{--*/ $hightlight4 = isset($productDescription[3])? $productDescription[3]->description: "No description Yet"; /*--}}
{{--*/ $productFullDescription = $productResult->product_full_description; /*--}}
{{--*/ $brandID = $productResult->brand_id; /*--}}
{{--*/ $colorID = $productResult->color_id; /*--}}
{{--*/ $categoryID = $productResult->category_id; /*--}}
{{--*/ $brandMPDesc = $productResult->brand_marketplace_desc; /*--}}
{{--*/ $colorMPDesc = $productResult->color_marketplace_desc; /*--}}
{{--*/ $categoryMPDesc = $productResult->category_marketplace_desc; /*--}}
{{--*/ $brandMPID = $productResult->brand_marketplace_id; /*--}}
{{--*/ $colorMPID = $productResult->color_marketplace_id; /*--}}
{{--*/ $categoryMPID = $productResult->category_marketplace_id; /*--}}
{{--*/ $price = $productResult->price; /*--}}
{{--*/ $weightPackage = $productResult->weight_package; /*--}}
{{--*/ $weightProduct = $productResult->weight_product; /*--}}
{{--*/ $weightProduct = $productResult->weight_product; /*--}}
{{--*/ $dimensionPackage = $productResult->dimension_package; /*--}}
{{--*/ $dimensionProduct = $productResult->dimension_product; /*--}}
{{--*/ $images = $productResult->images; /*--}}
{{--*/ $youtubeUrl = $productResult->youtube_url; /*--}}
{{--*/ $productAttributes = $productResult->product_attributes; /*--}}
{{--*/ $handlingFee = $productResult->handling_fee; /*--}}
{{--*/ $insurance = $productResult->insurance; /*--}}
{{--*/ $jabodetabekOnly = $productResult->jabodetabek_only; /*--}}
{{--*/ $limitQty = $productResult->limit_qty; /*--}}
{{--*/ $promoPrice = $productResult->promo_price; /*--}}
{{--*/ $startDate = $productResult->start_date; /*--}}
{{--*/ $endDate = $productResult->end_date; /*--}}
{{--*/ $stockAvailable = $productResult->stock_available; /*--}}
{{--*/ $stockMinimum = $productResult->stock_minimum; /*--}}
{{--*/ $skuMP = $productResult->product_marketplace_id; /*--}}
{{--*/ $skuVariantMP = $productResult->product_marketplace_variant_id; /*--}}

@else
{{--*/ $productID = ''; /*--}}
{{--*/ $productESID = ''; /*--}}
{{--*/ $sku = ''; /*--}}
{{--*/ $productName = ''; /*--}}
{{--*/ $productDescription = ''; /*--}}
{{--*/ $hightlight1 = ''; /*--}}
{{--*/ $hightlight2 = ''; /*--}}
{{--*/ $hightlight3 = ''; /*--}}
{{--*/ $hightlight4 = ''; /*--}}
{{--*/ $productFullDescription = ''; /*--}}
{{--*/ $brandID = ''; /*--}}
{{--*/ $colorID = ''; /*--}}
{{--*/ $categoryID = ''; /*--}}
{{--*/ $brandMPDesc = ''; /*--}}
{{--*/ $colorMPDesc = ''; /*--}}
{{--*/ $categoryMPDesc = ''; /*--}}
{{--*/ $brandMPID = ''; /*--}}
{{--*/ $colorMPID = ''; /*--}}
{{--*/ $categoryMPID = ''; /*--}}
{{--*/ $price = ''; /*--}}
{{--*/ $weightPackage = ''; /*--}}
{{--*/ $weightProduct = ''; /*--}}
{{--*/ $weightProduct = ''; /*--}}
{{--*/ $dimensionPackage = ''; /*--}}
{{--*/ $dimensionProduct = ''; /*--}}
{{--*/ $images = ''; /*--}}
{{--*/ $youtubeUrl = ''; /*--}}
{{--*/ $productAttributes = ''; /*--}}
{{--*/ $handlingFee = ''; /*--}}
{{--*/ $insurance = ''; /*--}}
{{--*/ $jabodetabekOnly = ''; /*--}}
{{--*/ $limitQty = ''; /*--}}
{{--*/ $promoPrice = ''; /*--}}
{{--*/ $startDate = ''; /*--}}
{{--*/ $endDate = ''; /*--}}
{{--*/ $stockAvailable = ''; /*--}}
{{--*/ #stockMinimum = ''; /*--}}
{{--*/ $skuMP = ''; /*--}}
{{--*/ $skuVariantMP = ''; /*--}}
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
            
            @if(trim(session()->get('message')) !== "" && @trim(session()->get('message')) !== null)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    @if(trim(session()->get('message')) !== "")
                        <li>{{session()->get('message')}}</li>
                    @endif
                </ul>
            </div>
            @endif
            
            <form name="form" id="form" action="{{route('oms.saveproduct')}}" method="post" enctype="multipart/form-data">
            <input type="hidden" id="token" name="_token" value="{{{ csrf_token() }}}" />
            <input type="hidden" id="productID" name='productID' value="{{$productID}}">
            <input type="hidden" id="productESID" name='productESID' value="{{$productESID}}">
            <input type="hidden" id="skuMP" name='skuMP' value="{{$skuMP}}">
            <input type="hidden" id="skuVariantMP" name='skuVariantMP' value="{{$skuVariantMP}}">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group"> 
                    
                    <div class="form-group">              
                        <label>Sku *</label>
                        {!! Form::text('sku', $sku , ['id' => 'sku','class'=>'form-control add-top-margin', 'placeholder'=>'Sku', 'required' => 'required'] ) !!}
                    </div>
                        
                    <label>Product Name *</label>
                        {!! Form::text('productName', $productName , ['id' => 'productName','class'=>'form-control add-top-margin', 'placeholder'=>'product name', 'required' => 'required'] ) !!}
                    </div>

                    
                    <div class="form-group">              
                        <label>Brand</label>
                        {!! Form::text('brandMappingDesc', $brandMPDesc , ['id' => 'brandMappingDesc','class'=>'form-control add-top-margin', 'placeholder'=>'' ] ) !!}
                        {!! Form::hidden('brandMappingID', $brandMPID , ['id' => 'brandMappingID','class'=>'form-control add-top-margin', 'placeholder'=>'' ] ) !!}
                        {!! Form::hidden('brandValue', '' , ['id' => 'brandValue','class'=>'form-control add-top-margin', 'placeholder'=>'brandValue' ] ) !!}
                        {!! Form::hidden('brandID', $brandID , ['id' => 'brandID','class'=>'form-control add-top-margin', 'placeholder'=>'brandID' ] ) !!}
                    </div>
                    
                    <div class="form-group">              
                        <label>Category</label>
                        {!! Form::text('categoryMappingDesc', $categoryMPDesc , ['id' => 'categoryMappingDesc','class'=>'form-control add-top-margin', 'placeholder'=>'' ] ) !!}
                        {!! Form::hidden('categoryMappingID', $categoryMPID , ['id' => 'categoryMappingID','class'=>'form-control add-top-margin', 'placeholder'=>'' ] ) !!}
                        {!! Form::hidden('categoryValue', '' , ['id' => 'categoryValue','class'=>'form-control add-top-margin', 'placeholder'=>'category' ] ) !!}
                        {!! Form::hidden('categoryID', $categoryID , ['id' => 'categoryID','class'=>'form-control add-top-margin', 'placeholder'=>'categoryID' ] ) !!}
                    </div>
                    
                    <div class="form-group">              
                        <label>Color</label>
                        {!! Form::text('colorMappingDesc', $colorMPDesc , ['id' => 'colorMappingDesc','class'=>'form-control add-top-margin', 'placeholder'=>'' ] ) !!}
                        {!! Form::hidden('colorMappingID', $colorMPID , ['id' => 'colorMappingID','class'=>'form-control add-top-margin', 'placeholder'=>'' ] ) !!}
                        {!! Form::hidden('colorValue', '' , ['id' => 'colorValue','class'=>'form-control add-top-margin', 'placeholder'=>'colorValue' ] ) !!}
                        {!! Form::hidden('colorID', $colorID , ['id' => 'colorID','class'=>'form-control add-top-margin', 'placeholder'=>'colorID' ] ) !!}
                    </div>
                    
                    <div class="form-group">              
                        <label>Dimension Package</label>
                        {!! Form::text('dimension', $dimensionPackage , ['id' => 'dimension','class'=>'form-control add-top-margin', 'placeholder'=>'dimension' ] ) !!}
                    </div>
                    
                    <div class="form-group">              
                        <label>Dimension Product</label>
                        {!! Form::text('dimensionProductOutdoor', $dimensionProduct , ['id' => 'dimensionProductOutdoor','class'=>'form-control add-top-margin', 'placeholder'=>'dimension Product' ] ) !!}
                    </div>

                    <div class="form-group">              
                        <label>Youtube Url</label>
                        {!! Form::text('youtubeUrl', $youtubeUrl , ['id' => 'youtubeUrl','class'=>'form-control add-top-margin', 'placeholder'=>'Youtube Url' ] ) !!}
                    </div>
    
                    <div class="form-group">              
                        <label>Handling Fee</label>
                        {!! Form::text('handlingFee', $handlingFee , ['id' => 'handlingFee','class'=>'form-control add-top-margin', 'placeholder'=>'handlingFee' ] ) !!}
                    </div>
                    
                    
                    <div class="form-group">              
                        <label>Insurance Option</label>
                        <select class="form-control" id="insurance" name='insurance'>
                            <option value="0" @if($insurance == '0') {{'selected'}}@endif>Optional</option>
                            <option value="1" @if($insurance == '1') {{'selected'}}@endif>Mandatory</option>
                        </select>
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
                        <label>Stock Available</label>
                        {!! Form::text('stockAvailable', $stockAvailable , ['id' => 'stockAvailable','class'=>'form-control add-top-margin', 'placeholder'=>'stock Available' ] ) !!}
                    </div>
                    
                    <div class="form-group">              
                        <label>Stock Minimum</label>
                        {!! Form::text('stockMinimum', $stockMinimum , ['id' => 'stockMinimum','class'=>'form-control add-top-margin', 'placeholder'=>'stock Minimum' ] ) !!}
                    </div>
                    
                    <div class="form-group">              
                        <label>Jabodetabek only</label>
                        <select class="form-control" id="jabodetabekOnly" name='jabodetabekOnly'>
                            <option value="0" @if($jabodetabekOnly == '0') {{'selected'}}@endif>No</option>
                            <option value="1" @if($jabodetabekOnly == '1') {{'selected'}}@endif>Yes</option>
                        </select>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">              
                        <label>Weight Package</label>
                        {!! Form::text('weightPackage', $weightPackage , ['id' => 'weightPackage','class'=>'form-control add-top-margin', 'placeholder'=>'Weight Package' ] ) !!}
                    </div>
                    
                    <div class="form-group">              
                        <label>Weight Product</label>
                        {!! Form::text('weightProduct', $weightProduct , ['id' => 'weightProduct','class'=>'form-control add-top-margin', 'placeholder'=>'weight Product' ] ) !!}
                    </div>
                    
                    
                    <div class="box-body pad">
                        <label>Hightlight *</label>
                        {!! Form::text('hightlight1', $hightlight1 , ['id' => 'hightlight1','class'=>'form-control add-top-margin', 'placeholder'=>'Hightlight', 'required' => 'required' ] ) !!}
                        {!! Form::text('hightlight2', $hightlight2 , ['id' => 'hightlight2','class'=>'form-control add-top-margin', 'placeholder'=>'Hightlight', 'required' => 'required' ] ) !!}
                        {!! Form::text('hightlight3', $hightlight3 , ['id' => 'hightlight3','class'=>'form-control add-top-margin', 'placeholder'=>'Hightlight', 'required' => 'required' ] ) !!}
                        {!! Form::text('hightlight4', $hightlight4 , ['id' => 'hightlight4','class'=>'form-control add-top-margin', 'placeholder'=>'Hightlight', 'required' => 'required' ] ) !!}
                        
                    </div>
                    
                    <div class="box-body pad">
                        <label>Description *</label>
                        <textarea name="productFullDescription" class="textarea" placeholder="Product Description" 
                                  style="width: 100%; height: 200px; font-size: 14px; 
                                          line-height: 18px; border: 1px solid #dddddd; 
                                          padding: 10px;">{{$productFullDescription}}</textarea>
                    </div>
                    
                    <div class="form-group">              
                        <label>Price * </label>
                        {!! Form::text('price', $price , ['id' => 'price','class'=>'form-control add-top-margin', 'placeholder'=>'Price', 'required' => 'required'] ) !!}
                    </div>
                    
                    <div class="form-group">              
                        <label>Promo Price</label>
                        {!! Form::text('promoPrice', $promoPrice , ['id' => 'promoPrice','class'=>'form-control add-top-margin', 'placeholder'=>'promoPrice' ] ) !!}
                    </div>
                    
                    <div class="form-group">              
                        <label>Start Promo Date</label>
                        {!! Form::text('startDate', $startDate , ['id' => 'startDate','class'=>'form-control add-top-margin', 'placeholder'=>'startDate' ] ) !!}
                    </div>
                    
                    <div class="form-group">              
                        <label>End Promo Date</label>
                        {!! Form::text('endDate', @endDate , ['id' => 'endDate','class'=>'form-control add-top-margin', 'placeholder'=>'endDate' ] ) !!}
                    </div>
                    
                    
                    <div class="form-group">              
                        <label>Limit qty on cart</label>
                        {!! Form::text('limit', $limitQty , ['id' => 'limit','class'=>'form-control add-top-margin', 'placeholder'=>'limit' ] ) !!}
                    </div>
                    
                </div>
                
                <div class="col-md-12">
                    <label class='pull-left'>Images : </label>
                    {!! Form::text('imagesUrl', $images , ['id' => 'imagesArray','class'=>'form-control add-top-margin', 'placeholder'=>'' ] ) !!}
                    {{--*/ $imagesArray = json_decode($images) /*--}}
                    
                    <div class="row">
                    @foreach($imagesArray as $imagesArrayDetail)
                    <div class='col-md-2'>
                        <img src='{{$imagesArrayDetail->path}}' class='img-responsive'>
                    </div>
                    @endforeach
                    </div>
                    
                    <label>Attributes</label>
                    {!! Form::text('attributesValue', $productAttributes , ['id' => 'attributesValue','class'=>'form-control add-top-margin', 'placeholder'=>'', 'readonly'=>'readonly' ] ) !!}
                    
                    <button type='button' class="btn btn-default" onclick="callPopUp('{{route('oms.listattributes')}}')">Add Attributes</button>
                </div>
                
                <!-- /.col -->
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Post & Save</button>
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
        $('#startDate').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd' 
        });
        
        $('#endDate').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd' 
        });
        
        getMapping();
    });
          
    function callPopUp(menu){
        var categoryMappingID = $("#categoryMappingID").val(); 
        var marketPlace = $("#marketPlace").val();
        var attributes = $("#attributesValue").val();
        if(categoryMappingID !== ""){
        if(attributes!==""){
            var menuPage = menu + '/' + categoryMappingID + '/' +marketPlace + '/' +attributes;
        }else{
            var menuPage = menu + '/' + categoryMappingID + '/' +marketPlace;
        }
        
        showPopup(menuPage, '850', '700');
        }else{
            alert("categroy can't empty");
        }
        return false;
    }
    
    function getMapping(){
        var urlAPI = "{{route('oms.getMapping')}}";
        var requestData = {
            'marketplaceID': $("#marketPlace").val(),
            'categoryID' : $("#categoryValue").val(),
            'brandID' : $("#brandValue").val(),
            'colorID' : $("#colorValue").val(),
        };

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('#token').val(),
                    },
            data: requestData,
            url: urlAPI,
            type: 'post',
            beforeSend: function() {
            },
            complete: function() {
            },
            success: function(data) {
            if(data.brandResult.length > 0){
                $("#brandMappingDesc").val(data.brandResult[0]['brand_marketplace_desc']);
                $("#brandMappingID").val(data.brandResult[0]['brand_marketplace_id']);
                $("#brandID").val(data.brandResult[0]['brand_mapping_id']);
            }else{
                alert('Brand belum tersedia');
            }
            
            if(data.colorResult.length > 0){
                $("#colorMappingDesc").val(data.colorResult[0]['color_marketplace_desc']);
                $("#colorMappingID").val(data.colorResult[0]['color_marketplace_id']);
                $("#colorID").val(data.colorResult[0]['color_mapping_id']);
            }else{
                alert('Color belum tersedia');
            }
            
            if(data.categoryResult.length > 0){
                $("#categoryMappingDesc").val(data.categoryResult[0]['category_marketplace_desc']);
                $("#categoryMappingID").val(data.categoryResult[0]['category_marketplace_id']);
                $("#categoryID").val(data.categoryResult[0]['category_mapping_id']);
            }else{
                alert('Category belum tersedia');
            }

            }
        });
    }
</script>
@stop
