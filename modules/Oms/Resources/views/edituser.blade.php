@extends('oms::layouts.dashboardlayout')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Member
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('oms.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Edit User</li>
    </ol>
</section>
@if(count($userArray)>0)
{{--*/ $userID = $userArray->user_id /*--}}
{{--*/ $name = $userArray->name /*--}}
{{--*/ $address = $userArray->address /*--}}
{{--*/ $hp = $userArray->hp /*--}}
{{--*/ $phone = $userArray->phone /*--}}
{{--*/ $email = $userArray->email /*--}}
{{--*/ $password = $userArray->password /*--}}'
{{--*/ $name = $userArray->name /*--}}
{{--*/ $birthday = ($userArray->birthday!==null)?substr($userArray->birthday,'8','2').'/'.substr($userArray->birthday,'5','2').'/'.substr($userArray->birthday,'0','4'):"" /*--}}
{{--*/ $privilege = $userArray->category_code /*--}}
{{--*/ $note = $userArray->note /*--}}
@else
{{--*/ $userID = "" /*--}}
{{--*/ $name = "" /*--}}
{{--*/ $address = "" /*--}}
{{--*/ $hp = "" /*--}}
{{--*/ $email = "" /*--}}
{{--*/ $password = "" /*--}}
{{--*/ $phone = "" /*--}}
{{--*/ $name = "" /*--}}
{{--*/ $birthday = "" /*--}}
{{--*/ $privilege = "" /*--}}
{{--*/ $disabled = "" /*--}}
{{--*/ $note = "" /*--}}
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
            <form action="{{route('oms.saveUser')}}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
            <input type="hidden" name="userID" value="{{ $userID }}" />
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">              
                        <label>Email</label>
                        @if($userID === '')
                        {!! Form::text('email', $email , ['id' => 'email','class'=>'form-control add-top-margin', 'placeholder'=>'Email' ] ) !!}
                        @else
                        {!! Form::text('email', $email , ['id' => 'email','class'=>'form-control add-top-margin', 'placeholder'=>'Email', 'readonly' => 'readonly' ] ) !!}
                        @endif
                        
                    </div>
                    @if($userID === '')
                    <div class="form-group">              
                        <label>Password</label>
                        {!! Form::password('password' , ['id' => 'password','class'=>'form-control add-top-margin', 'placeholder'=>'Password' ] ) !!}
                        
                    </div>
                    <div class="form-group">              
                        <label>Confirm Password</label>
                        {!! Form::password('confirmPassword' , ['id' => 'confirmPassword','class'=>'form-control add-top-margin', 'placeholder'=>'Confirm Password' ] ) !!}
                        
                    </div>
                    @endif
                    
                    {!! Form::hidden('privilege', $privilege , ['id' => 'privilege','class'=>'form-control add-top-margin'] ) !!}
                    @if($session['category'] == "S")
                    <div class="form-group">              
                        <label>Privilege</label>
                        {{dd($allPrivilege)}}
                        <select class="form-control" id="privilege" name="newPrivilege">
                            
                            @foreach($allPrivilege as $allPrivilegeDetail)
                            <option value="{{$allPrivilegeDetail->privilege_code}}" @if($privilege == "A") {{'selected'}} @endif >{{$allPrivilegeDetail->privilege_name}}</option>
                            @endforeach
<!--                            <option value="A" @if($privilege == "A") {{'selected'}} @endif >{{'Admin'}}</option>
                            <option value="S" @if($privilege == "S") {{'selected'}} @endif >{{'Owner'}}</option>
                            <option value="C" @if($privilege == "C") {{'selected'}} @endif >{{'Akunting'}}</option>
                            <option value="M" @if($privilege == "M") {{'selected'}} @endif >{{'Marketing'}}</option>-->
                        </select>                     
                    </div>
                    @endif
                    
                    <div class="form-group">              
                        <label>Nama</label>
                        {!! Form::text('name', $name , ['id' => 'name','class'=>'form-control add-top-margin', 'placeholder'=>'Nama' ] ) !!}
                        
                    </div>
                    
                    <div class="form-group">              
                        <label>Telepon</label>
                        {!! Form::text('phone', $phone , ['id' => 'phone','class'=>'form-control add-top-margin', 'placeholder'=>'Telepon' ] ) !!}
                        
                    </div>
                    
                    <div class="form-group">              
                        <label>HP</label>
                        {!! Form::text('hp', $hp , ['id' => 'hp','class'=>'form-control add-top-margin', 'placeholder'=>'hp' ] ) !!}
                        
                    </div>
                    
                    <div class="form-group">        
                        <label>Alamat</label>
                        {!! Form::textarea('address', $address , ['id' => 'address','class'=>'form-control add-top-margin', 'placeholder'=>'Alamat', 'rows'=>'2' ] ) !!}
                        
                    </div>
                    
                    <div class="form-group">              
                        <label>Tanggal Lahir</label>
                        {!! Form::text('birthdate', $birthday , ['id' => 'datepicker','class'=>'form-control add-top-margin', 'placeholder'=>'Tanggal Lahir' ] ) !!}                        
                    </div>
                                        
                </div>
                <div class="col-md-6">
                    <div class="box-body pad">
                        <textarea name="note" class="textarea" placeholder="note" 
                                  style="width: 100%; height: 200px; font-size: 14px; 
                                          line-height: 18px; border: 1px solid #dddddd; 
                                          padding: 10px;">{{$note}}</textarea>
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
        $('#datepicker').datepicker({
        autoclose: true,
        format: 'dd/mm/yyyy' 
      });
    })    
</script>
@stop
