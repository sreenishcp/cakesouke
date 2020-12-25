@extends('layouts.template')
@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div align="center">
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block" style="width: 32%;
             margin-left: -34%;">
<button type="button" class="close" data-dismiss="alert">×</button> 
      <strong>{{ $message }}</strong>
</div>
@endif
	<div class="page-body" style="margin-top: 80px;">
		<div class="row">
			<div class="col-xs-12">
       <div class="box">
            <div class="box-header">
              <h3 class="box-title">Log details</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
              	<div class="row">
                  {{ Form::open(['route' => 'list-device','method'=>'get','id'=>'search_form']) }}
    	              	<div class="col-sm-8">
                        <div class="col-sm-4">
      		              	<div id="example1_filter" class="dataTables_filter">
      		              		{!! Form::text('search_key', $key, ['class' => 'form-control search_key']) !!}
      		              	</div>
                        </div>
                        <div class="col-sm-4">    		
                         <button type="submit" class="search_btn search btn btn-info pull-right">Search</button>
                          @if($key!='')
                           <button type="button" onclick="window.location.href='{{url("list-device")}}'" class="btn btn-default" style="margin-top: -58px;"> Cancel</button>
                        </div>
                        @endif
  		              	</div>
                      {!! Form::close() !!}
  	              </div>
                  
               <div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 283px;">SlNo.</th>
                	<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 283px;">user name</th>
                  <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 283px;">Device</th>
                	<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 345px;">Model</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 345px;">Version</th>
                   <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 345px;">Datetime</th>
                </thead>
                <tbody>
                  @if(count($log)>0)
                  	@foreach($log as $logs)
  	                <tr role="row" class="odd">
  	                <td><span>{{ (($log->currentPage() - 1 ) * $log->perPage() ) + $loop->iteration }}</span></td>

                      <td class="sorting_1"><span>{{$logs->alog_user_id}}</span></td>
  	                  <td class="sorting_1"><span>{{$logs->alog_device}}</span></td>
                      <td class="sorting_1"><span>{{$logs->alog_model}}</span></td>
  	                  <td><span>{{$logs->alog_os_version }}</span></td>
                       <td><span>{{$logs->alog_updated_time }}</span></td>
  	                </tr>
  	                @endforeach
                    @else
                    <tr>
                        <td class="sorting_1" colspan="7"><span>No result found.</span></td>
                    </tr>
                        @endif
                </tbody>
<!--                 <tfoot>
                <tr><th rowspan="1" colspan="1">Rendering engine</th><th rowspan="1" colspan="1">Browser</th><th rowspan="1" colspan="1">Platform(s)</th><th rowspan="1" colspan="1">Engine version</th><th rowspan="1" colspan="1">CSS grade</th></tr>
                </tfoot> -->
              </table></div></div>{{ $log->links() }}</div>
            </div>
            <!-- /.box-body -->
          </div>
		          <!-- /.box -->
		        </div>
		</div>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">User delete</h4>
        </div>
        <div class="modal-body">
          <p>Do you want delete this user..?</p>
        </div>
        <div class="modal-footer">
          {{ Form::open(['route' => 'delete_app_users','method'=>'post']) }}
          {!! Form::hidden('user_id','', ['class' => 'form-control user_id']) !!}
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-default">Confirm</button>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
<!--END MODAL-->



	</div>
</div>
<style type="text/css">
	.category_image
	{
	    margin-top: 20px;
	    margin-right: 100%;
	    width: 70px;
	}

  a.button {
    -webkit-appearance: button;
    -moz-appearance: button;
    appearance: button;

    text-decoration: none;
    color: initial;
    width: 54px;
    background-color: #e49b26;
    height: 23px;
}
</style>

<script type="text/javascript">
  
  $(".search").click(function(event)
  {
    event.preventDefault();
    var serach_key = $(".search_key").val();
    if(serach_key!='')
    {
      $("#search_form").submit();
    }
  });

 $(".delete").click(function()
{ 
  $("#myModal").modal('show');
  var id = $(this).data('id');
  $(".user_id").val(id);
}); 

setTimeout(function() {

       $('.alert-success').fadeOut();}, 2000);



</script>

<style type="text/css">

  .search_key 
  {

    margin-right: -54%;
    margin-bottom: 21px;
  }

    .search_btn
  {
    margin-right: 67%;
  }




@media 
only screen and (max-width: 760px),
(min-device-width: 768px) and (max-device-width: 1024px)  {

  /* Force table to not be like tables anymore */
  table, thead, tbody, th, td, tr { 
    display: block; 
  }
  thead tr { 
    position: absolute;
    top: -9999px;
    left: -9999px;
  }
  
  tr { border: 1px solid #ccc; }
  
  td { 
    /* Behave  like a "row" */
    border: none;
    border-bottom: 1px solid #eee; 
    position: relative;
    padding-left: 50%; 
    padding-top: 50%;
    padding-bottom: 50%;  
  }
  
   td a 
   { 
      float: right;
    }

    td span 
    { 
      float: right;
    }
  td:before 
  { 
    left: 6px;
    width: 45%; 
    padding-right: 10px; 
    white-space: nowrap;
  }
  
  /*
  Label the data
  */
  td:nth-of-type(1):before { content: "Slno."; }
  td:nth-of-type(2):before { content: "Name"; }
  td:nth-of-type(3):before { content: "Email"; }
  td:nth-of-type(4):before { content: "Phone"; }
  td:nth-of-type(5):before { content: "Password"; }
  td:nth-of-type(6):before { content: "Edit"; }
  td:nth-of-type(7):before { content: "Delete"; }
  .search_key 
  {
     margin-right: 0%;
    width: 100%;
    margin-bottom: 56px;
  }
  .search_btn
  {
    margin-right: 0%;
    width: 100%;
    margin-top:  -44px;
  }
}

</style>

@endsection 

