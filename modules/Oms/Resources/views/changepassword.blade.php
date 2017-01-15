@extends('oms::layouts.dashboardlayout')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Ubah Password
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('oms.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Ubah Password</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Ubah Password</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>
        @if($userID === "")
            {{--*/ $userID = $session['userID'] /*--}}
        @else
            {{--*/ $userID = $userID /*--}}
        @endif
        
            {{--*/ $url = route('oms.savepassword') /*--}} 
        
        <!-- /.box-header -->
        <div class="box-body">
            <form action="{{$url}}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                <input type="hidden" name="userID" id="userID" value="{{ $userID }}" />
                <div class="row">
                    <div class="col-md-6">

                        @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                        @endif
                        
                        <div class="form-group">              
                            <label>Password</label>
                            {!! Form::password('password' , ['id' => 'password','class'=>'form-control add-top-margin', 'placeholder'=>'Password' ] ) !!}

                        </div>
                        <div class="form-group">              
                            <label>Confirm Password</label>
                            {!! Form::password('confirmPassword' , ['id' => 'confirmPassword','class'=>'form-control add-top-margin', 'placeholder'=>'Confirm Password' ] ) !!}

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
