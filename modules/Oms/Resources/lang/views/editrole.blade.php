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
                <div class="col-md-6">
                    <div class="form-group">              
                        <label>Role Name</label>
                        {!! Form::text('name', $name , ['id' => 'name','class'=>'form-control add-top-margin', 'placeholder'=>'Role Name' ] ) !!}
                        
                    </div>
                    <div class="form-group">              
                        <label>Description</label>
                        {!! Form::text('description', $description , ['id' => 'description','class'=>'form-control add-top-margin', 'placeholder'=>'Role Description' ] ) !!}
                        
                    </div>
                    <div class="form-group">              
                        <label>Permissions</label>
                        <div>
                        @foreach($permissions as $permission)
                            @if(in_array($permission->id, $selected))
                                <input checked="checked" type="checkbox" name="permissions[]" value="{!! $permission->id !!}" /> {!! $permission->description !!}<br/>
                            @else
                                <input type="checkbox" name="permissions[]" value="{!! $permission->id !!}" /> {!! $permission->description !!}<br/>
                            @endif
                        @endforeach
                        </div>
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
@stop
