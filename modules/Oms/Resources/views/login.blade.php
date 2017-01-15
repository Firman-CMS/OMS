@extends('oms::layouts.loginheader')

@section('content')
	
	<div class="login-box">
  <div class="login-logo">
    <b>OMS</b>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">

@if (count($errors) > 0 || session()->get('message'))
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

    <form action="{{route('login.oms.submit')}}" method="post">
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
      <div class="form-group has-feedback">
        <input name="email" type="email" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input name="password" type="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
        <div class="form-group has-feedback">
        Can't read the image? Click it to get a new one.
        <img class="captcha" src="{{ $captcha_src }}" />
        {!! Form::text('captcha', '' , ['id' => 'captcha','class'=>'form-control add-top-margin', 'placeholder'=>'Captcha' ] ) !!}
        </div>
        
        <div id="error-message" style=""></div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <!-- /.social-auth-links -->
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
    <script>
        var config = {
            routes: {
                refreshCaptcha: "{{ route('login.oms.refreshCaptcha') }}"
            }
        };
    </script>
    <!-- jQuery 2.2.0 -->
    {!! Html::script('/js/jQuery/jQuery-2.2.0.min.js') !!}
    {!! Html::script('/js/cms/login.js') !!}
@stop