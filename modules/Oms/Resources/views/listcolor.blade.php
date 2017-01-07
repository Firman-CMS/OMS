@extends('oms::layouts.listlayout')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Color
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Color</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Color</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">

                    @if(isset($colorArray))
                    {{--*/ $color = json_decode($colorArray)->results; /*--}}


                    <table id="list" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="80%">Color</th>
                                <th width="20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($color as $colorResultDetail)
                            {{--*/ $colorID = $colorResultDetail->Id; /*--}}
                            {{--*/ $colorName = $colorResultDetail->Color; /*--}}
                            <tr>
                                <td>{{$colorName}}</td>
                                <td>
                                    <button class="btn btn-mini" onclick="pick('{{$colorID}}','{{$colorName}}');">Pick</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th width="80%">Color</th>
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
                            window.opener.document.form.colorMarketplaceID.value = value1;
                            window.opener.document.form.colorMarketplace.value = value2;
                            window.close();
                            }
</script>    
@stop