@extends('layouts.template_merchant')
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
@if (session()->has('success'))
    <div class="alert alert-success">
        @if(is_array(session()->get('success')))
        <ul>
            @foreach (session()->get('success') as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
        @else
            {{ session()->get('success') }}
        @endif
    </div>
@endif
	<div class="page-body" style="">
		<div class="row">
			<div class="col-xs-12">
       <div class="box">
            <div class="box-header">
              <h3 class="box-title">Item List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
              	<div class="row">
                  {{ Form::open(['route' => ['item-list',$merchant_id],'method'=>'get','id'=>'search_form']) }}
    	              	<div class="col-sm-8">
                        <div class="col-sm-4">
      		              	<div id="example1_filter" class="dataTables_filter">
      		              		{!! Form::text('search_key', @$key, ['class' => 'form-control search_key']) !!}
      		              	</div>
                        </div>
                        <div class="col-sm-4">    		
                         <button type="submit" class="search_btn search btn btn-info pull-right">Search</button>
                          @if(@$key!='')
                           <button type="button" onclick="window.location.href='{{url("outlet/item-list/".$merchant_id)}}'" class="btn btn-default" style="margin-top: -58px;"> Cancel</button>
                        </div>
                        @endif
  		              	</div>
                      {!! Form::close() !!}
  	              </div>
                  
               <div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 100px;">SlNo.</th>
                	<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="">Name</th>
                  
                	<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="">Description</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="">Price</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="">offer_price</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="">image</th>
                	<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 200px;">Status</th>
                	<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="">Edit</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="">Delete</th>
                </tr>
                </thead>
                <tbody>
                  @if(count($items)>0)
                  	@foreach($items as $item)
  	                <tr role="row" class="odd">
  	                <td><span>{{ (($items->currentPage() - 1 ) * $items->perPage() ) + $loop->iteration }}</span></td>
  	                  <td class="sorting_1"><span>{{$item->name}}</span></td>
                      <td class="sorting_1"><span>{{$item->description}}</span></td>
                      <td class="sorting_1"><span>{{$item->price}}</span></td>
                      <td class="sorting_1"><span>{{($item->offer_price!=0)?$item->offer_price:"-"}}</span></td>
                      <td class="sorting_1"><span><img src="{{asset('items/'.$item->image)}}" style="width: 50px;height: 50px"></span></td>
                      @php ($checked = '')
                      @if($item->status==0)
                      @php ($checked = 'checked')
                      @endif
                      <td><input type="checkbox" {{$checked}} value="{{$item->id}}" class="status" data-toggle="toggle" data-on="Active" data-off="Inactive">
                      </td>
  	                  <td><a href="{{ url('outlet/edit-item/'.$item->id) }}"><i style="font-size:24px;margin-left: 20px;" class="fa">&#xf044;</i></a></td>
  	                  <td><a href="#" data-id="{{$item->id}}" class="delete"><span><i class="fa fa-trash" aria-hidden="true" style="font-size:24px;margin-left: 30px;"></i></span></a></td>
  	                </tr>
  	                @endforeach
                    @else
                    <tr>
                        <td class="sorting_1" colspan="9"><span>No result found.</span></td>
                    </tr>
                        @endif
                </tbody>
              </table></div></div>{{ $items->links() }}</div>
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
          <h4 class="modal-title">Item delete</h4>
        </div>
        <div class="modal-body">
          <p>Do you want delete this item..?</p>
        </div>
        <div class="modal-footer">
          {{ Form::open(['route' => 'delete.item','method'=>'post']) }}
          {!! Form::hidden('item_id','', ['class' => 'form-control item_id']) !!}
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
  $(".item_id").val(id);
}); 

setTimeout(function() {
  $('.alert-success').fadeOut();}, 2000);

$('.status').on('change', function(e)
{
   var item_id = $(this).val();
   if($(this).prop("checked") == true)
   {
       var cur_status = 0;
    }
    else
    {
      var cur_status = 1;
    }
    e.preventDefault();
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
     $.ajax({
      url:"{{ route('change-item-status') }}",
      method:"POST",
      data : {item_id:item_id,cur_status:cur_status},
      success:function(data)
      {
        $(".msg").text('Category status updated successfully.')
        $('.alert-success').show();
          setTimeout(function() {
         $('.alert-success').fadeOut('fast');
    },   1000);
      }
    });
});
</script>
<style type="text/css">

  .search_key 
  {

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

<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

@endsection 

