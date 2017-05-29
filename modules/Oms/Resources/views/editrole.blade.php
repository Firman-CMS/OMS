@extends('oms::layouts.dashboardlayout')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Role
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('oms.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Edit Role</li>
    </ol>
</section>
@if(count($data)>0)
{{--*/ $id = $data->id /*--}}
{{--*/ $name = $data->name /*--}}
{{--*/ $description = $data->description /*--}}
@else
{{--*/ $id = '' /*--}}
{{--*/ $name = '' /*--}}
{{--*/ $description = '' /*--}}
@endif

<!-- Main content -->
<section class="content">
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">{{$name}}</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            @if($errors->count() > 0)
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
            
            <form action="{{route('oms.saveRole')}}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
            <input type="hidden" name="id" value="{{ $id }}" />
            <div class="row">
                <div class="form-group col-md-6">              
                    <label>Role Name</label>
                    {!! Form::text('name', $name , ['id' => 'name','class'=>'form-control add-top-margin', 'placeholder'=>'Role Name' ] ) !!}

                </div>
                <div class="form-group col-md-6">              
                    <label>Description</label>
                    {!! Form::text('description', $description , ['id' => 'description','class'=>'form-control add-top-margin', 'placeholder'=>'Role Description' ] ) !!}

                </div>
                <div class="col-md-12">        
                    <fieldset>
                    <legend>Permissions</legend>
                        <input type="hidden" id="permissions" name='permissions' />
                        <table id="tabledata" style="width:100%" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <!--<th></th>-->
                                    <th>Namespace</th>
                                    <th>Controller</th>
                                    <th>Method</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($permissions as $k => $permission)
                                    @if(in_array($permission['value'], $selected))
                                    <tr class="selected">
                                    @else
                                    <tr>
                                    @endif
                                        <td>{{ $permission['namespace'] }}</td>
                                        <td>{{ $permission['controller'] }}</td>
                                        <td>{{ $permission['method'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </fieldset>
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
<link href="https://cdn.datatables.net/select/1.2.1/css/select.dataTables.min.css" rel="stylesheet" />
<style>
    #tabledata tr {
        cursor: pointer;
    }
</style>
<script src="//code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/select/1.2.1/js/dataTables.select.min.js"></script>
<script>
    $(function () {
        var table = $("#tabledata").DataTable({
            select: {
                style: 'multi'
            }
        });
        
        table.row('.selected', { page: 'current' }).select();
        
        table.on('select.dt', function() {
            var permissions = [];
            table.rows('.selected').every(function(rowIdx) {
                var permission = table.row(rowIdx).data();
                permissions.push(permission[0] + "\\" + permission[1] + "@" + permission[2]);
            });   
            
            $("#permissions").val(permissions.join(","));
        });
        
        table.on('deselect.dt', function() {
            var permissions = [];
            table.rows('.selected').every(function(rowIdx) {
                var permission = table.row(rowIdx).data();
                permissions.push(permission[0] + "\\" + permission[1] + "@" + permission[2]);
            });
            
            $("#permissions").val(permissions.join(","));
        });
    });
</script>
@stop
