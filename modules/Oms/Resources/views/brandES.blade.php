@extends('oms::layouts.dashboardlayout')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Brand
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Brand</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Brand</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <a href="{{route('oms.editBrandES')}}"><span class="icon24 glyphicon glyphicon-plus"></span></a>
                
                @if(count($brandArray)>0)
                {{--*/ $brand = json_decode($brandArray); /*--}}
                {{--*/ $brandTotal = $brand->total; /*--}}
                {{--*/ $brandPage = $brand->page; /*--}}
                {{--*/ $brandResult = $brand->results; /*--}}
                
                <div class="row">
                    <div class="col-xs-12 col-md-12 pull-right">
                        <form method="post" action='{{route('oms.searchBrandES')}}'>
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                            <input type="text" name="searchParam" class="pull-right"> 
                        </form>
                    </div>                    
                </div>
                
                <table id="configuration" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="80%">Brand</th>
                  <th width="20%">Action</th>
                </tr>
                </thead>

                <tbody>
               @foreach($brandResult as $brandResultDetail)
                <tr>
                  <td>{{$brandResultDetail}}</td>
                  <td>
                      <a href="{!! route('oms.editBrandES').'/'.$brandResultDetail !!}" title="edit"><span class="glyphicon glyphicon-edit"></span></a>
                  </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th width="80%">Brand</th>
                  <th width="20%">Action</th>
                </tr>
                
                </tfoot>
              </table>
                <div class="row">
                    <div class="col-xs-12 col-md-12 pull-right">
                        Page :  
                        @if($brandPage>1)
                        <a href="{{route('oms.brandES').'/'.($brandPage-1)}}"><button class="btn-default" id="previous"> << </button></a>
                        @endif
                        <button class="btn-default" disabled="disabled"> {{$brandPage}} </button>
                          
                        @if($brandTotal>$brandPage)
                        <a href="{{route('oms.brandES').'/'.($brandPage+1)}}"><button class="btn-default" id="next"> >> </button></a>
                        @endif
                        of {{ $brandTotal }}                    
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