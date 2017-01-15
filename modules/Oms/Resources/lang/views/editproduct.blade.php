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
@if(isset($userArray) && count($userArray)>0)
{{--*/ $note = "" /*--}}
{{--*/ $brand = "" /*--}}
{{--*/ $brandValue = "" /*--}}
{{--*/ $category = "" /*--}}
{{--*/ $categoryValue = "" /*--}}
{{--*/ $color = "" /*--}}
{{--*/ $colorValue = "" /*--}}
{{--*/ $productName = "" /*--}}
{{--*/ $productID = "" /*--}}
@else
{{--*/ $note = "" /*--}}
{{--*/ $brand = "" /*--}}
{{--*/ $brandValue = "" /*--}}
{{--*/ $category = "" /*--}}
{{--*/ $categoryValue = "" /*--}}
{{--*/ $color = "" /*--}}
{{--*/ $colorValue = "" /*--}}
{{--*/ $productName = "" /*--}}
{{--*/ $productID = "" /*--}}
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
            <input type="hidden" name="userID" value="{{ $productID }}" />
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">              
                        <label>Product Name</label>
                        {!! Form::text('productName', $productName , ['id' => 'productName','class'=>'form-control add-top-margin', 'placeholder'=>'product name'] ) !!}
                    </div>

                    
                    <div class="form-group">              
                        <label>Brand</label>
                        {!! Form::text('brand', $brand , ['id' => 'brand','class'=>'form-control add-top-margin', 'placeholder'=>'Brand' ] ) !!}
                        {!! Form::hidden('brandValue', $brandValue , ['id' => 'brandValue','class'=>'form-control add-top-margin', 'placeholder'=>'brandValue' ] ) !!}
                    </div>
                    
                    <div class="form-group">              
                        <label>Category</label>
                        {!! Form::text('category', $category , ['id' => 'category','class'=>'form-control add-top-margin', 'placeholder'=>'Category' ] ) !!}
                        {!! Form::hidden('categoryValue', $categoryValue , ['id' => 'categoryValue','class'=>'form-control add-top-margin', 'placeholder'=>'Category Value' ] ) !!}
                    </div>
                    
                    <div class="form-group">              
                        <label>Color</label>
                        {!! Form::text('color', $color , ['id' => 'color','class'=>'form-control add-top-margin', 'placeholder'=>'Color' ] ) !!}
                        {!! Form::hidden('colorValue', $colorValue , ['id' => 'colorValue','class'=>'form-control add-top-margin', 'placeholder'=>'colorValue' ] ) !!}
                    </div>
                    
    
                </div>
                <div class="col-md-6">
                    <div class="box-body pad">
                        <textarea name="Attribute" class="textarea" placeholder="note" 
                                  style="width: 100%; height: 200px; font-size: 14px; 
                                          line-height: 18px; border: 1px solid #dddddd; 
                                          padding: 10px;">{{$note}}</textarea>
                    </div>
                </div>
                
                <!-- /.col -->
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
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
      
      var brandOptions = {
	url: function(phrase) {
		return "{!! route('oms.getBrand') !!}" +"/"+ phrase;
	},

	getValue: "brand",
        
        list: {

		onSelectItemEvent: function() {
			var brandId = $("#brand").getSelectedItemData().id;
			$("#brandValue").val(brandId).trigger("change");
		}
            }
        
        };
      $("#brand").easyAutocomplete(brandOptions);
    })    
</script>
@stop
