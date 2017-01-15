@extends('oms::layouts.dashboardlayout')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Color
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Color</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Color</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                                
                @if(isset($colorArray))
                {{--*/ $color = json_decode($colorArray); /*--}}
                {{--*/ $colorTotal = $color->total; /*--}}
                {{--*/ $colorPage = $color->page; /*--}}
                {{--*/ $colorResult = $color->results; /*--}}
                
                <div class="row">
                    <div class="col-xs-12 col-md-12 pull-right">
                        <form method="post" action='{{route('oms.searchColorES')}}'>
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                            <input type="text" name="searchParam" class="pull-right"> 
                        </form>
                    </div>                    
                </div>
                
                <table id="configuration" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="80%">Color</th>
                  <th width="20%">Action</th>
                </tr>
                </thead>

                <tbody>
               @foreach($colorResult as $colorResultDetail)
                <tr>
                  <td>{{$colorResultDetail}}</td>
                  <td>
                      <a href="{!! route('oms.editColorES').'/'.$colorResultDetail !!}" title="edit"><span class="glyphicon glyphicon-edit"></span></a>
                  </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th width="80%">Color</th>
                  <th width="20%">Action</th>
                </tr>
                
                </tfoot>
              </table>
                <div class="row">
                    <div class="col-xs-12 col-md-12 pull-right">
                        Page :  
                        @if($colorPage>1)
                        <a href="{{route('oms.colorES').'/'.($colorPage-1)}}"><button class="btn-default" id="previous"> << </button></a>
                        @endif
                        <button class="btn-default" disabled="disabled"> {{$colorPage}} </button>
                          
                        @if($colorTotal>$colorPage)
                        <a href="{{route('oms.colorES').'/'.($colorPage+1)}}"><button class="btn-default" id="next"> >> </button></a>
                        @endif
                        of {{ $colorTotal }}                    
                    </div>
                </div>
            
                
                <div class="row">
                    <div class="col-xs-12 col-md-12 pull-right">
                        <form method="post" action='{{route('oms.searchColorES')}}'>
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                            <input type="text" name="searchParam" class="pull-right"> 
                        </form>
                    </div>                    
                </div>
                
                
                
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

</script>    
@stop