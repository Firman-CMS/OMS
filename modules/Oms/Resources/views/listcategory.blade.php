@extends('oms::layouts.listlayout')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Category
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Category</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Category</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">

                    @if(count($categoryArray)>0)
                    {{--*/ $category = json_decode($categoryArray)->results; /*--}}


                    <table id="list" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="20%">Code</th>
                                <th width="40%">Category</th>
                                <th width="20%">Commision</th>
                                <th width="10%">Level</th>
                                <th width="10%">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($category as $categoryResultDetail)
                            {{--*/ $categoryID = $categoryResultDetail->id; /*--}}
                            {{--*/ $categoryName = $categoryResultDetail->category; /*--}}
                            {{--*/ $commision = $categoryResultDetail->commision; /*--}}
                            {{--*/ $code = $categoryResultDetail->code; /*--}}
                            {{--*/ $level = $categoryResultDetail->level; /*--}}
                            
                            <tr>
                                <td>{{$code}}</td>
                                <td>{{$categoryName}}</td>
                                <td>{{$commision}}</td>
                                <td>{{$level}}</td>
                                <td>
                                    <button class="btn btn-mini" onclick="pick('{{$categoryID}}','{{$categoryName}}');">Pick</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th width="20%">Code</th>
                                <th width="40%">Category</th>
                                <th width="20%">Commision</th>
                                <th width="10%">Level</th>
                                <th width="10%">Action</th>
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
                            window.opener.document.form.categoryMarketplaceID.value = value1;
                            window.opener.document.form.categoryMarketplace.value = value2;
                            window.close();
                            }
</script>    
@stop