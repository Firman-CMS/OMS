@extends('oms::layouts.listlayout')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Attributes
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Attributes</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Attributes</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    {{--*/ $attributSelected = []; /*--}}
                    
                    @if(isset($attributesValue) && $attributesValue !== "")
                    
                        {{--*/ $attributesValueArray = json_decode($attributesValue) /*--}}
                        
                        @foreach ($attributesValueArray as $attributesValueArrayDetail)
                            {{--*/ $attributSelected[$attributesValueArrayDetail->id] = $attributesValueArrayDetail->value /*--}}
                        @endforeach
                    @endif

                    @if(count($attributesArray)>0)
                    {{--*/ $n = 1; /*--}}
                    @foreach ($attributesArray as $attributesArrayDetail)
                    <div class="form-group">              
                        <label>{{$attributesArrayDetail->Attribute}}</label>
                        {!! Form::text('attributes', isset($attributSelected[$attributesArrayDetail->Id])?$attributSelected[$attributesArrayDetail->Id]:"" , ['id' =>'' ,'class'=>'form-control add-top-margin', 'placeholder'=>'', 'data-id'=>$attributesArrayDetail->Id ] ) !!}                        
                    </div>
                    {{--*/ $n += 1; /*--}}
                    @endforeach


                    <button class="btn btn-mini" onclick="pick();">Add</button>
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
    function pick()
    {
        var newArray = [];

        $("input:text[name=attributes]").each(function(){
          arr = {
            'id': $(this).data('id').toString(),
            'value' : $(this).val(),
          }

          newArray.push(arr);
        });
        
        
                            window.opener.document.form.attributesValue.value = JSON.stringify(newArray);
                            window.close();
    }
</script>    
@stop