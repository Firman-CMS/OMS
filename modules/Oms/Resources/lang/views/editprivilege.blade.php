@extends('oms::layouts.dashboardlayout')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Privilege
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('oms.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Edit Privilege</li>
    </ol>
</section>
@if(count($privilege)>0)
{{--*/ $privilegeID = $privilege->privilege_id /*--}}
{{--*/ $privilegeName = $privilege->privilege_name /*--}}
{{--*/ $privilegeCode = $privilege->privilege_code /*--}}
@else
{{--*/ $privilegeID = '' /*--}}
{{--*/ $privilegeName = '' /*--}}
{{--*/ $privilegeCode = '' /*--}}
@endif

<!-- Main content -->
<section class="content">
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">{{$privilegeName}}</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            
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
            
            <form action="{{route('oms.savePrivilege')}}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
            <input type="hidden" name="privilegeID" value="{{ $privilegeID }}" />
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">              
                        <label>Privilege Name</label>
                        {!! Form::text('privilegeName', $privilegeName , ['id' => 'privilegeName','class'=>'form-control add-top-margin', 'placeholder'=>'Privilege Name' ] ) !!}
                        
                    </div>
                    
                    
                    <div class="form-group">              
                        <label>Privilege Code</label>
                        @if($privilegeID === '')
                        {!! Form::text('privilegeCode', $privilegeCode , ['id' => 'privilegeCode','class'=>'form-control add-top-margin', 'placeholder'=>'Privilege Code' ] ) !!}
                        @else
                        {!! Form::text('privilegeCode', $privilegeCode , ['id' => 'privilegeCode','class'=>'form-control add-top-margin', 'placeholder'=>'Privilege Code' ,'readonly' => 'readonly'] ) !!}
                        @endif
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

<script>
    $(document).on('ready', function(){

    })    
</script>
@stop
