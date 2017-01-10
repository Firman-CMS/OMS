@extends('oms::layouts.dashboardlayout')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Role
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Role</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Role</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                @if(policy($cms_model)->write_role())
                    <a href="{{route('oms.editrole')}}"><span class="icon24 glyphicon glyphicon-plus"></span></a>
                @endif
              <table id="configuration" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="70%">Role Name</th>
                  <th width="30%">Action</th>
                </tr>
                </thead>
                <tbody>
               @foreach($allRole as $allRoleDetail)
                <tr>
                  <td>{{$allRoleDetail->name}}</td>
                  <td>
                    @if(policy($cms_model)->write_role())
                            <a href="{{route('oms.editrole').'/'.$allRoleDetail->id}}" title="edit"><span class="glyphicon glyphicon-edit"></span></a>
                    @endif
                    @if(policy($cms_model)->delete_role())
                      <a onclick="return window.confirm('Are you sure you want to remove this data?')" href="{{route('oms.deleterole', $allRoleDetail->id)}}" title="edit"><span class="glyphicon glyphicon-trash"></span></a>
                    @endif
                  </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th width="70%">Role Name</th>
                  <th width="30%">Action</th>
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