@extends('oms::layouts.dashboardlayout')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Product
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Product</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Product</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                
                <div class="row">
                    <div class = 'col-md-6'>
                        <div class='row'>
                            <div class='col-md-1 col-xs-1'>
                                <label>From</label>
                            </div>
                            <div class='col-md-4 col-xs-4'>
                                <input type="text" id="startdate" value="{{date('Y-m-01')}}">
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-md-1 col-xs-1'>
                                <label>To</label>
                            </div>
                            <div class='col-md-4 col-xs-4'>
                                <input type="text" id="enddate" value="{{date('Y-m-d')}}">
                            </div>
                        </div>
                    </div>
                    
                                        
                    <div class='col-md-6 col-xs-12'>
                        <div class='col-md-3 col-xs-3'>
                            <label>Market Place</label>
                        </div>
                        <div class='col-md-4 col-xs-4'>
                            <select class="form-control" id="marketPlace" name='marketPlace'>
                                @foreach($marketPlaceArray as $marketPlaceArrayDetail)                        
                                <option value="{{$marketPlaceArrayDetail->marketplace_id}}">{{$marketPlaceArrayDetail->marketplace_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    
                </div>
                <br>
                <br>
                
                <div class='clear'>
                    
                </div>
                
                <div id="tableContent">
                    
                </div>
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
    $(document).on('ready',function(){
        $('#startdate').datepicker({
        autoclose: true,
                format: 'yyyy-mm-dd'
        });
                $('#enddate').datepicker({
        autoclose: true,
                format: 'yyyy-mm-dd'
        });
        
        getRequest();
    });
    
    $("#startdate").on('change',function(){
        getRequest();
    });
    
    $("#enddate").on('change',function(){
        getRequest();
    });
    
    $("#marketPlace").on('change',function(){
        getRequest();
    });
    
    function getRequest() {
        var urlAPI = "{{route('oms.getOrderList')}}";
        var editUrl = "{{route('oms.editOrderList')}}";
        var requestData = {
            'startDate': $("#startdate").val(),
            'endDate': $("#enddate").val(),
            'marketPlace': $("#marketPlace").val(),
        };

        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: requestData,
            url: urlAPI,
            type: 'post',
            beforeSend: function () {
                //beginTransition();
            },
            complete: function () {
                //endLoadingMapTransition();
            },
            success: function (data) {
                var content = "";
                var dataResult = JSON.parse(data);
                var result = dataResult.results;
                console.log(result);
                content += '<table  class="table table-bordered table-striped" id="invoice">' +
                                '<thead>' +
                                    '<tr>' +                  
                                        '<th width="15%">So Number</th>' +
                                        '<th width="15%">Status</th>' +
                                        '<th width="20%">Order Date</th>' +
                                        '<th width="20%">Customer</th>' +
                                        '<th width="20%">Total Price</th>' +
                                        '<th width="10%">Action</th>' +
                                    '</tr>' +
                                '</thead>' +
                                '<tbody id="tableContent">';
                        if(result.length !== 0){                            
                            for( var x in result){
                                var data = JSON.stringify(result[x]);
                                console.log(data);
                                var dateTime = result[x]['order_date'].replace('T', ' ' );
                                content += '<tr>' +
                                '<td>' + result[x]['so_number'] + '</td>' +
                                '<td>' + result[x]['status'] + '</td>' +
                                '<td>' + dateTime.split('+')[0]  + '</td>' +
                                '<td>' + result[x]['customer'] + '</td>' +
                                '<td>' + result[x]['total_price'].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + '</td>' +     
//                                '<td>' + 'xx' + '</td>'
                                "<td><a href='#' onclick='return false;'><span class='glyphicon glyphicon-edit openPopUp' data-so='"+ data +"'></span></a></td>" +
                                '</tr>';
                            }
                        }

                content  += '</tbody>' +
                                '<tfoot>' +
                                    '<tr>' +                  
                                        '<th width="15%">So Number</th>' +
                                        '<th width="15%">Status</th>' +
                                        '<th width="20%">Order Date</th>' +
                                        '<th width="20%">Customer</th>' +
                                        '<th width="20%">Total Price</th>' +
                                        '<th width="10%">Action</th>' +
                                    '</tr>' +
                                '</tfoot>' +
                            '</table>'+
                    '<br>';

                $("#tableContent").html(content);
                $("#invoice").DataTable();

                $(".openPopUp").on("click",function(){
                    var editUrl = "{{route('oms.editOrderList')}}";
                    callPopUp(editUrl,$(this).data("so"));
                });
            }
        });

    }
    ;

    function callPopUp(menu, SO){
        var marketPlace = $("#marketPlace").val();
        var menuPage = menu + '/' + marketPlace + '/' + JSON.stringify(SO);
        showPopup(menuPage, '850', '700');
        return false;
    }
    
    
</script>    
@stop