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
                    <!--<a href="{{route('oms.editProductES')}}"><span class="icon24 glyphicon glyphicon-plus"></span></a>-->

                    @if(isset($productArray))
                    {{--*/ $product = json_decode($productArray); /*--}}
                    {{--*/ $productTotal = $product->total; /*--}}
                    {{--*/ $productPage = $product->page; /*--}}
                    {{--*/ $productResult = $product->results; /*--}}

                    @if(session()->get('message') !== '' && session()->get('message') !== null)
                    <div class="alert alert-info">
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
                    
                    <div class="row">
                        <div class="col-xs-12 col-md-12 pull-right">
                            <form method="post" action='{{route('oms.searchProductES')}}'>
                                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                                <input type="text" name="searchParam" class="pull-right"> 
                            </form>
                        </div>                    
                    </div>

                    <table id="configuration" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="20%">SKU</th>
                                <th width="70%">Product Name</th>
                                <th width="10%">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($productResult as $productResultDetail)
                            <tr>
                                <td>{{$productResultDetail->sku}}</td>
                                <td>{{$productResultDetail->product_name}}</td>
                                <td>
                                    <a href="{!! route('oms.editProductES').'/'.$productResultDetail->product_id !!}" title="edit"><span class="glyphicon glyphicon-edit"></span></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th width="20%">SKU</th>
                                <th width="70%">Product Name</th>
                                <th width="10%">Action</th>
                            </tr>

                        </tfoot>
                    </table>

                    <div class="row">
                        <div class="col-xs-12 col-md-12 pull-right">
                            Page :  
                            @if($productPage>1)
                            <a href="{{route('oms.productES').'/'.($productPage-1)}}"><button class="btn-default" id="previous"> << </button></a>
                            @endif
                            <button class="btn-default" disabled="disabled"> {{$productPage}} </button>

                            @if($productTotal>$productPage)
                            <a href="{{route('oms.productES').'/'.($productPage+1)}}"><button class="btn-default" id="next"> >> </button></a>
                            @endif
                            of {{ $productTotal }}                    
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

</script>    
@stop