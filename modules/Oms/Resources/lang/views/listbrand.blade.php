@extends('oms::layouts.listlayout')

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

                    @if(count($brandArray)>0)
                    {{--*/ $brand = json_decode($brandArray)->results; /*--}}


                    <table id="list" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="80%">Brand</th>
                                <th width="20%">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($brand as $brandResultDetail)
                            {{--*/ $brandID = $brandResultDetail->Id; /*--}}
                            {{--*/ $brandName = $brandResultDetail->Brand; /*--}}
                            <tr>
                                <td>{{$brandName}}</td>
                                <td>
                                    <button class="btn btn-mini" onclick="pick('{{$brandID}}','{{$brandName}}');">Pick</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th width="80%">Brand</th>
                                <th width="20%">Action</th>
                            </tr>

                        </tfoot>
                    </table>

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
        $("#list").DataTable();
    })
            function pick(value1, value2)
                    {
                            window.opener.document.form.brandMarketplaceID.value = value1;
                            window.opener.document.form.brandMarketplace.value = value2;
                            window.close();
                            }
</script>    
@stop