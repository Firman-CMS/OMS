@extends('oms::layouts.listlayout')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Order
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Order</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Order</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    {{--*/ $SODetail = json_decode($SODetail); /*--}}
                    {{--*/ $shipTo = $SODetail->ship_to; /*--}}                    
                    {{--*/ $cancelReason = '';/*--}}
                    {{--*/ $trackingNumber = '' /*--}}
                    {{--*/ $deliveryProvider = '' /*--}}
                    {{--*/ $statusInvoice = $SODetail->status /*--}}
                    
                    
                    @if(count($SODetail)>0)
                    {!! Form::hidden('storeNumber', $SODetail->so_store_number , ['id' => 'storeNumber','class'=>'form-control add-top-margin', 'placeholder'=>'store Number', 'readonly'=>'readonly' ] ) !!}
                    {!! Form::hidden('marketPlace', $marketPlace , ['id' => 'marketPlace','class'=>'form-control add-top-margin', 'placeholder'=>'market Place', 'readonly'=>'readonly' ] ) !!}

                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-xs-12">
                            <label>SO Number</label>
                            {!! Form::text('SONumber', $SODetail->so_number , ['id' => 'SONumber','class'=>'form-control add-top-margin', 'placeholder'=>'SONumber', 'readonly'=>'readonly' ] ) !!}
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-xs-12">
                            <label>Status</label>
                            {!! Form::text('status', $SODetail->status , ['id' => 'status','class'=>'form-control add-top-margin', 'placeholder'=>'status', 'readonly'=>'readonly' ] ) !!}
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-xs-12">
                            <label>Order Date</label>
                            {!! Form::text('orderdate', $SODetail->order_date , ['id' => 'orderdate','class'=>'form-control add-top-margin', 'placeholder'=>'Order Date', 'readonly'=>'readonly' ] ) !!}
                        </div>
                    </div>
                                        
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-xs-12">
                            <label>Total Price</label>
                            {!! Form::text('totalPrice', number_format($SODetail->total_price,'0',',','.')  , ['id' => 'totalPrice','class'=>'form-control add-top-margin', 'Total Price'=>'SONumber', 'readonly'=>'readonly' ] ) !!}
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-xs-12">
                            <label>Customer</label>
                            {!! Form::text('customer', $SODetail->customer , ['id' => 'customer','class'=>'form-control add-top-margin', 'placeholder'=>'customer', 'readonly'=>'readonly' ] ) !!}
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-xs-12">
                            <label>Total Commision</label>
                            {!! Form::text('totalCommision', number_format($SODetail->total_commision,'0',',','.')  , ['id' => 'totalCommision','class'=>'form-control add-top-margin', 'placeholder'=>'Total Commision', 'readonly'=>'readonly' ] ) !!}
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-xs-12">
                            <label>Weight</label>
                            {!! Form::text('weight', $SODetail->weight , ['id' => 'weight','class'=>'form-control add-top-margin', 'placeholder'=>'weight', 'readonly'=>'readonly' ] ) !!}
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-xs-12">
                            <label>Delivery Name</label>
                            {!! Form::text('name', $shipTo->name , ['id' => 'SONumber','class'=>'form-control add-top-margin', 'placeholder'=>'Name', 'readonly'=>'readonly' ] ) !!}
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-xs-12">
                            <label>Phone</label>
                            {!! Form::text('phone', $shipTo->phone , ['id' => 'phone','class'=>'form-control add-top-margin', 'placeholder'=>'phone', 'readonly'=>'readonly' ] ) !!}
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-xs-12">
                            <label>Address</label>
                            {!! Form::text('address', $shipTo->address , ['id' => 'address','class'=>'form-control add-top-margin', 'placeholder'=>'address', 'readonly'=>'readonly' ] ) !!}
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-xs-12">
                            <label>District</label>
                            {!! Form::text('district', $shipTo->district , ['id' => 'district','class'=>'form-control add-top-margin', 'placeholder'=>'district', 'readonly'=>'readonly' ] ) !!}
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-xs-12">
                            <label>District</label>
                            {!! Form::text('city', $shipTo->city , ['id' => 'city','class'=>'form-control add-top-margin', 'placeholder'=>'city', 'readonly'=>'readonly' ] ) !!}
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-xs-12">
                            <label>Province</label>
                            {!! Form::text('province', $shipTo->province , ['id' => 'province','class'=>'form-control add-top-margin', 'placeholder'=>'province', 'readonly'=>'readonly' ] ) !!}
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-xs-12">
                            <label>Country</label>
                            {!! Form::text('country', $shipTo->country , ['id' => 'country','class'=>'form-control add-top-margin', 'placeholder'=>'country', 'readonly'=>'readonly' ] ) !!}
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-xs-12">
                            <label>Zip Code</label>
                            {!! Form::text('zipcode', $shipTo->zipcode , ['id' => 'zipcode','class'=>'form-control add-top-margin', 'placeholder'=>'zipcode', 'readonly'=>'readonly' ] ) !!}
                        </div>
                    </div>
                    <hr>
                    <br><br>
                    <label>Item Purchase</label>
                    <br><br>
                    
                    
                    {{--*/ $n = 1; /*--}}
                    @foreach($SODetail->items as $itemDetail)
                    <label>Item {{$n}}</label>
                    <br>
                    
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-xs-12">
                            <label>SKU</label>
                            {!! Form::text('productSKU', $itemDetail->product_sku , ['id' => 'productSKU','class'=>'form-control add-top-margin', 'placeholder'=>'product SKU', 'readonly'=>'readonly' ] ) !!}
                        </div>
                        <div class="col-md-12 col-lg-12 col-xs-12">
                            <label>Variant SKU</label>
                            {!! Form::text('variantSKU', $itemDetail->variant_sku , ['id' => 'variantSKU','class'=>'form-control add-top-margin', 'placeholder'=>'variant SKU', 'readonly'=>'readonly' ] ) !!}
                        </div>                        
                        <div class="col-md-12 col-lg-12 col-xs-12">
                            <label>Store SKU</label>
                            {!! Form::text('storeSKU', $itemDetail->store_sku , ['id' => 'storeSKU','class'=>'form-control add-top-margin', 'placeholder'=>'store SKU', 'readonly'=>'readonly' ] ) !!}
                        </div>
                        
                        <div class="col-md-12 col-lg-12 col-xs-12">
                            <label>Product Name</label>
                            {!! Form::text('productName', $itemDetail->product_name , ['id' => 'productName','class'=>'form-control add-top-margin', 'placeholder'=>'productName SKU', 'readonly'=>'readonly' ] ) !!}
                        </div>
                        
                        <div class="col-md-12 col-lg-12 col-xs-12">
                            <label>Qty</label>
                            {!! Form::text('quantity', $itemDetail->quantity , ['id' => 'quantity','class'=>'form-control add-top-margin', 'placeholder'=>'quantity SKU', 'readonly'=>'readonly' ] ) !!}
                        </div>
                        
                        <div class="col-md-12 col-lg-12 col-xs-12">
                            <label>Price</label>
                            {!! Form::text('price', number_format($itemDetail->price,'0',',','.') , ['id' => 'price','class'=>'form-control add-top-margin', 'placeholder'=>'price', 'readonly'=>'readonly' ] ) !!}
                        </div>
                        
                    </div>
                    
                    {{--*/ $n++; /*--}}
                    @endforeach
                    
                    @endif
                    
                    <div class='row'>
                        <div class='col-md-12 col-lg-12 col-xs-12'>
                            <label>Status</label>
                            <select class="form-control" id="updateStatus" name='updateStatus'>                                
                                @if ($statusInvoice =='Pending Shipment')
                                <option value="shipped">shipped</option>
                                @else
                                <option value="ready for collection by 3pl">ready for collection by 3pl</option>
                                <option value="ready for collection">ready for collection</option>
                                @endif
                                <option value="canceled">canceled</option>
                            </select>
                        </div>
                        
                        
                        
                        <div class='col-md-12 col-lg-12 col-xs-12'>
                            <label>Shipping Provider</label>
                            <select class="form-control" id="deliveryProvider" name='deliveryProvider'>
                                <option value="jne">Jne</option>
                                <option value="sd">sd</option>
                                <option value="tiki">tiki</option>
                                <option value="pandu">pandu</option>
                                <option value="rex">rex</option>
                                <option value="rpx">rpx</option>
                                <option value="sicepat">sicepat</option>
                                <option value="wahana">wahana</option>
                                <option value="firstlogistics">firstlogistics</option>
                                <option value="specify for other shipping providers">specify for other shipping providers</option>
                            </select>
                        </div>
                        
                        <div class='col-md-12 col-lg-12 col-xs-12'>
                            <label>Tracking Number</label>
                            {!! Form::text('trackingNumber', $trackingNumber , ['id' => 'trackingNumber','class'=>'form-control add-top-margin', 'placeholder'=>'tracking Number' ] ) !!}
                        </div>
                        
                        <div class='col-md-12 col-lg-12 col-xs-12' id="cancelReasonDiv" style="display: none">
                            <label>Cancel Reason</label>
                            <select class="form-control" id="cancelReason" name='cancelReason'>
                                <option value="">-- Reason --</option>
                                <option value="oos">oos</option>
                                <option value="discontinued">discontinued</option>
                                <option value="wrongprice">wrongprice</option>
                                <option value="other">other</option>
                            </select>
                            
                        </div>
                        <div class='col-md-12 col-lg-12 col-xs-12' id="otherReasonDiv" style="display: none">
                            <label>Other Reason</label>
                            {!! Form::text('otherReason', '' , ['id' => 'otherReason','class'=>'form-control add-top-margin', 'placeholder'=>'other Reason' ] ) !!}
                        </div>
                        
                    </div>
                    
                    <div class="box-footer">
                        <button type="button" id="updateBtn" class="btn btn-primary">Update</button>
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
        $("#list").DataTable();
    })
    
    $("#updateStatus").on("change",function(){
        if($("#updateStatus").val() == 4){
            $("#cancelReasonDiv").show();
        }else{
            $("#cancelReasonDiv").hide();
        }
    });
    
    $("#cancelReason").on("change",function(){
        if($("#cancelReason").val() === 'other'){
            $("#otherReasonDiv").show();
        }else{
            $("#otherReason").hide();
        }
    });
    
        var urlAPI = "{{route('oms.updatestatus')}}";
        var requestData = {
            'soStoreNumber': $("#storeNumber").val(),
            'updateStatus': $("#updateStatus").val(),
            'cancelReason': $("#cancelReason").val(),
            'deliveryProvider': $("#deliveryProvider").val(),
            'trackingNumber': $("#trackingNumber").val(),
            'marketPlace' : $("#marketPlace").val(),
            'otherReason' :$("#otherReason").val(),
        };
        
    $("#updateBtn").on("click",function(){
        console.log('masuk');
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: requestData,
            url: urlAPI,
            type: 'post',
            beforeSend: function () {
                //beginTransition();
            },
            complete: function () {
                //endLoadingMapTransition();
            },
            success: function (data) {
                var result = JSON.parse(data);
                if(result.status === "NOK"){
                    alert(result.msg);
                }else{
                window.opener.location.reload();
                window.close();
                }
            }
        })
    });

</script>    
@stop