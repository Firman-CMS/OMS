@extends('oms::layouts.dashboardlayout')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        User
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('oms.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">User</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">User</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-xs-4">
                            <p><a href="{{route('oms.editUser')}}"><span class="icon24 glyphicon glyphicon-plus"></span></a></p>                            
                        </div>
                    </div>
                    <table id="configuration" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="25%">Name</th>
                                <th width="25%">Email</th>
                                <th width="10%">Status</th>
                                <th width="20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($allUser as $allUserDetail)
                            <tr>
                                <td>{{$allUserDetail->name}}</td>
                                <td>{{$allUserDetail->email}}</td>
                                <td>
                                    @if($allUserDetail->active=="1")
                                    {{'Active'}}
                                    @else
                                    {{'Non active'}}
                                    @endif
                                </td>

                                <td>
                                        @if($allUserDetail->active=="1")
                                        <a href="#" title="deactive" onclick="deactive('{{$allUserDetail->user_id}}', '{{"user_id"}}', '{{"oms_user"}}','{{route('oms.deactiveitem')}}'); return false;"><span class="glyphicon glyphicon-remove"></span></a>
                                        @else
                                        <a href="#" title="active" onclick="active('{{$allUserDetail->user_id}}', '{{"id"}}', '{{"oms_user"}}','{{route("oms.deactiveitem")}}'); return false;"><span class="glyphicon glyphicon-ok"></span></a>
                                        @endif
                                        @if($session['category'] === "S")
                                        <a href="{{route('oms.editUser').'/'.$allUserDetail->user_id}}" title="edit"><span class="glyphicon glyphicon-edit"></span></a>
                                        <a href="{{route('oms.changepassword').'/'.$allUserDetail->user_id.'/member'}}"><i class="fa fa-key"></i></a>
                                        <a href="#" title="delete" onclick="deleteData('{{$allUserDetail->user_id}}', '{{"id"}}', '{{"oms_user"}}','{{route("oms.deleteitem")}}'); return false;"><span class="glyphicon glyphicon-trash"></span></a>
                                        @endif
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>

                        </tfoot>
                    </table>
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
                            $("#configuration").DataTable();
                            })
</script>
@stop
