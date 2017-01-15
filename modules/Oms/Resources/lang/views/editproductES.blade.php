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

@if(isset($productArray))
{{--*/ $productResult = $productArray; /*--}}
{{--*/ $productID = ''; /*--}}
{{--*/ $productESID = $productResult->product_id; /*--}}
{{--*/ $sku = $productResult->sku; /*--}}
{{--*/ $productType = $productResult->type_product; /*--}}
{{--*/ $productName = $productResult->product_name; /*--}}
{{--*/ $productDescription = explode('-',$productResult->short_description); /*--}}

{{--*/ $hightlight = $productResult->highlight /*--}}
{{--*/ $n = 1; /*--}}

@foreach($hightlight as $hightlightDetail)
    {{--*/ $hightlight = 'hightlight'.$n; /*--}}
    {{--*/ $$hightlight = $hightlightDetail; /*--}}
    {{--*/ $n++; /*--}}
@endforeach

@if($n<=4)
@for($x = $n;$x<=4;$x++)
    {{--*/ $hightlight = 'hightlight'.$x; /*--}}
    {{--*/ $$hightlight = 'No description Yet'; /*--}}
    {{--*/ $n++; /*--}}
@endfor
@endif

{{--*/ $productFullDescription = $productResult->description; /*--}}
{{--*/ $brand = $productResult->brand; /*--}}
{{--*/ $color = $productResult->color; /*--}}
{{--*/ $price = $productResult->price; /*--}}
{{--*/ $weightPackage = (int)$productResult->weight_package; /*--}}
{{--*/ $weightProduct = explode(",",$productResult->weight_product) /*--}}
{{--*/ $weightProductIndoor = isset($weightProduct[0])?str_replace('(Indoor)','',$weightProduct[0]):""; /*--}}
{{--*/ $weightProductOutdoor = isset($weightProduct[1])?str_replace('(Outdoor)','',$weightProduct[1]):""; /*--}}
{{--*/ $dimensionWidth = $productResult->dimension_package_width; /*--}}
{{--*/ $dimensionLength = $productResult->dimension_package_length; /*--}}
{{--*/ $dimensionHeight = $productResult->dimension_package_height; /*--}}
{{--*/ $dimension = (int)$dimensionWidth . ' x ' . (int)$dimensionHeight . ' x ' . (int)$dimensionLength .' cm' /*--}}
{{--*/ $dimensionProduct = explode(',',$productResult->dimension_product) /*--}}
{{--*/ $dimensionProductIndoorReplace = isset($dimensionProduct[0])? trim(str_replace('mm','',$dimensionProduct[0])):""; /*--}}
{{--*/ $dimensionProductOutdoorReplace = isset($dimensionProduct[1])? trim(str_replace('mm','',$dimensionProduct[1])):""; /*--}}
{{--*/ $dimensionProductIndoor = isset($dimensionProduct[0])? trim(str_replace('(indoor)','',$dimensionProductIndoorReplace)) .' cm':""; /*--}}
{{--*/ $dimensionProductOutdoor = isset($dimensionProduct[1])? trim(str_replace('(outdoor)','',$dimensionProductOutdoorReplace)) .' cm':""; /*--}}
{{--*/ $images = $productResult->images; /*--}}
{{--*/ $youtubeUrl = $productResult->youtube_url; /*--}}
{{--*/ $category = $productResult->category; /*--}}
{{--*/ $skuMP = ''; /*--}}
{{--*/ $skuVariantMP = ''; /*--}}
@else
{{--*/ $sku = ''; /*--}}
{{--*/ $productID = ''; /*--}}
{{--*/ $productESID = ''; /*--}}
{{--*/ $productType = ''; /*--}}
{{--*/ $productName = ''; /*--}}
{{--*/ $hightlight1 = ''; /*--}}
{{--*/ $hightlight2 = ''; /*--}}
{{--*/ $hightlight3 = ''; /*--}}
{{--*/ $hightlight4 = ''; /*--}}
{{--*/ $productFullDescription = ''; /*--}}
{{--*/ $brand = ''; /*--}}
{{--*/ $color = ''; /*--}}
{{--*/ $price = ''; /*--}}
{{--*/ $weightPackage = ''; /*--}}
{{--*/ $weightProduct = ''; /*--}}
{{--*/ $dimensionWidth = ''; /*--}}
{{--*/ $dimensionLength = ''; /*--}}
{{--*/ $dimensionHeight = ''; /*--}}
{{--*/ $dimensionProductIndoor = '' /*--}}
{{--*/ $dimensionProductOutdoor = '' /*--}}
{{--*/ $weightProductIndoor = ''; /*--}}
{{--*/ $weightProductOutdoor = ''; /*--}}
{{--*/ $dimension = '' /*--}}
{{--*/ $images = ''; /*--}}
{{--*/ $youtubeUrl = ''; /*--}}
{{--*/ $category = ''; /*--}}
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
                        {!! Form::text('brandMappingDesc', '' , ['id' => 'brandMappingDesc','class'=>'form-control add-top-margin', 'placeholder'=>'' ] ) !!}
                        {!! Form::hidden('brandMappingID', '' , ['id' => 'brandMappingID','class'=>'form-control add-top-margin', 'placeholder'=>'' ] ) !!}
                        {!! Form::hidden('brandValue', $brand , ['id' => 'brandValue','class'=>'form-control add-top-margin', 'placeholder'=>'brandValue' ] ) !!}
                        {!! Form::hidden('brandID', $brand , ['id' => 'brandID','class'=>'form-control add-top-margin', 'placeholder'=>'brandID' ] ) !!}
                    </div>
                    
                    <div class="form-group">              
                        <label>Category</label>
                        {!! Form::text('categoryMappingDesc', '' , ['id' => 'categoryMappingDesc','class'=>'form-control add-top-margin', 'placeholder'=>'' ] ) !!}
                        {!! Form::hidden('categoryMappingID', '' , ['id' => 'categoryMappingID','class'=>'form-control add-top-margin', 'placeholder'=>'' ] ) !!}
                        {!! Form::hidden('categoryValue', $category , ['id' => 'categoryValue','class'=>'form-control add-top-margin', 'placeholder'=>'category' ] ) !!}
                        {!! Form::hidden('categoryID', $category , ['id' => 'categoryID','class'=>'form-control add-top-margin', 'placeholder'=>'categoryID' ] ) !!}
                    </div>
                    
                    <div class="form-group">              
                        <label>Color</label>
                        {!! Form::text('colorMappingDesc', '' , ['id' => 'colorMappingDesc','class'=>'form-control add-top-margin', 'placeholder'=>'' ] ) !!}
                        {!! Form::hidden('colorMappingID', '' , ['id' => 'colorMappingID','class'=>'form-control add-top-margin', 'placeholder'=>'' ] ) !!}
                        {!! Form::hidden('colorValue', $color , ['id' => 'colorValue','class'=>'form-control add-top-margin', 'placeholder'=>'colorValue' ] ) !!}
                        {!! Form::hidden('colorID', $color , ['id' => 'colorID','class'=>'form-control add-top-margin', 'placeholder'=>'colorID' ] ) !!}
                    </div>
                    
                    <div class="form-group">              
                        <label>Dimension Package</label>
                        {!! Form::text('dimension', $dimension , ['id' => 'dimension','class'=>'form-control add-top-margin', 'placeholder'=>'dimension' ] ) !!}
                    </div>
                    
                    <div class="form-group">              
                        <label>Dimension Product Indoor</label>
                        {!! Form::text('dimensionProductIndoor', $dimensionProductIndoor , ['id' => 'dimensionProductIndoor','class'=>'form-control add-top-margin', 'placeholder'=>'dimension Product Indoor' ] ) !!}
                    </div>

                    <div class="form-group">              
                        <label>Dimension Product Outdoor</label>
                        {!! Form::text('dimensionProductOutdoor', $dimensionProductOutdoor , ['id' => 'dimensionProductOutdoor','class'=>'form-control add-top-margin', 'placeholder'=>'dimension Product Outdoor' ] ) !!}
                    </div>
                    
                    <div class="form-group">              
                        <label>Youtube Url</label>
                        {!! Form::text('youtubeUrl', $youtubeUrl , ['id' => 'youtubeUrl','class'=>'form-control add-top-margin', 'placeholder'=>'Youtube Url' ] ) !!}
                    </div>
    
                    <div class="form-group">              
                        <label>Handling Fee</label>
                        {!! Form::text('handlingFee', '' , ['id' => 'handlingFee','class'=>'form-control add-top-margin', 'placeholder'=>'handlingFee' ] ) !!}
                    </div>
                    
                    
                    <div class="form-group">              
                        <label>Insurance Option</label>
                        <select class="form-control" id="insurance" name='insurance'>
                            <option value="0">Optional</option>
                            <option value="1">Mandatory</option>
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
                        {!! Form::text('stockAvailable', '100' , ['id' => 'stockAvailable','class'=>'form-control add-top-margin', 'placeholder'=>'stock Available' ] ) !!}
                    </div>
                    
                    <div class="form-group">              
                        <label>Stock Minimum</label>
                        {!! Form::text('stockMinimum', '10' , ['id' => 'stockMinimum','class'=>'form-control add-top-margin', 'placeholder'=>'stock Minimum' ] ) !!}
                    </div>
                    
                    <div class="form-group">              
                        <label>Jabodetabek only</label>
                        <select class="form-control" id="jabodetabekOnly" name='jabodetabekOnly'>
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">              
                        <label>Weight Package</label>
                        {!! Form::text('weightPackage', $weightPackage , ['id' => 'weightPackage','class'=>'form-control add-top-margin', 'placeholder'=>'Weight Package' ] ) !!}
                    </div>
                    
                    <div class="form-group">              
                        <label>Weight Product Indoor</label>
                        {!! Form::text('weightProductIndoor', $weightProductIndoor , ['id' => 'weightProductIndoor','class'=>'form-control add-top-margin', 'placeholder'=>'weight Product Indoor' ] ) !!}
                    </div>
                    
                    <div class="form-group">              
                        <label>Weight Product Outdoor</label>
                        {!! Form::text('weightProductOutdoor', $weightProductOutdoor , ['id' => 'weightProductOutdoor','class'=>'form-control add-top-margin', 'placeholder'=>'weight Product Outdoor' ] ) !!}
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
                        {!! Form::text('promoPrice', '' , ['id' => 'promoPrice','class'=>'form-control add-top-margin', 'placeholder'=>'promoPrice' ] ) !!}
                    </div>
                    
                    <div class="form-group">              
                        <label>Start Promo Date</label>
                        {!! Form::text('startDate', '' , ['id' => 'startDate','class'=>'form-control add-top-margin', 'placeholder'=>'startDate' ] ) !!}
                    </div>
                    
                    <div class="form-group">              
                        <label>End Promo Date</label>
                        {!! Form::text('endDate', '' , ['id' => 'endDate','class'=>'form-control add-top-margin', 'placeholder'=>'endDate' ] ) !!}
                    </div>
                    
                    
                    <div class="form-group">              
                        <label>Limit qty on cart</label>
                        {!! Form::text('limit', '' , ['id' => 'limit','class'=>'form-control add-top-margin', 'placeholder'=>'limit' ] ) !!}
                    </div>
                    
                </div>
                
                <div class="col-md-12">
                    <label class='pull-left'>Images : </label>
                    @if(count($images) == 0)
                        <b>No</b>
                    @else
                        {{--*/ $sequence = 1; /*--}}
                        @foreach($images as $imagesDetail)
                         {{--*/ 
                             $imagesParam = [
                                 'sequence' => (string)$sequence,
                                 'path' => $imagesDetail->url,
                             ]; 
                             array_push($imagesArray,$imagesParam);
                             $sequence++;
                             /*--}}
                         
                        <div class='col-md-2'>                        
                        <img src='{{$imagesDetail->url}}' class='img-responsive'>
                        
                        </div>
                        @endforeach
                    @endif
                    
                    
                    
                    {!! Form::text('imagesUrl', json_encode($imagesArray) , ['id' => 'imagesArray','class'=>'form-control add-top-margin', 'placeholder'=>'' ] ) !!}
                    
                    <label>Attributes</label>
                    {!! Form::text('attributesValue', '' , ['id' => 'attributesValue','class'=>'form-control add-top-margin', 'placeholder'=>'', 'readonly'=>'readonly' ] ) !!}
                    
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
