@extends('oms::layouts.dashboardlayout')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Privilege
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Privilege</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Privilege</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <a href="{{route('oms.editprivilege')}}"><span class="icon24 glyphicon glyphicon-plus"></span></a>
              <table id="configuration" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="30%">Privilege</th>
                  <th width="50%">Privilege Code</th>
                  <th width="20%">Action</th>
                </tr>
                </thead>
                <tbody>
               @foreach($allPrivilege as $allPrivilegeDetail)
                <tr>
                  <td>{{$allPrivilegeDetail->privilege_name}}</td>
                  <td>{{$allPrivilegeDetail->privilege_code}}</td>
                  <td>
                      <a href="{{route('oms.editprivilege').'/'.$allPrivilegeDetail->privilege_id}}" title="edit"><span class="glyphicon glyphicon-edit"></span></a>
                  </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th width="30%">Privilege</th>
                  <th width="50%">Privilege Code</th>
                  <th width="20%">Action</th>
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