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
	<div class="page-body" style="margin-top: 80px;">
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-header">
					</div>
					@if ($message = Session::get('success'))
					<div class="alert alert-success alert-block" style="width: 32%;
                         ">
						<button type="button" class="close" data-dismiss="alert">×</button>	
					        <strong>{{ $message }}</strong>
					</div>
					@endif
					<div class="card-block">
						  <h4 class="sub-title"></h4>
						@if(isset($item))
						    {{ Form::model($item, ['route' => ['update_item', $item->id], 'method' => 'post','files'=>true]) }}
						     {!! Form::hidden('image_old',$item->image, ['class' => 'form-control']) !!}
						  
								@else
								    {{ Form::open(['route' => 'item.submit','files'=>true]) }}
								@endif
								{!! Form::hidden('merchant_id',$merchant_id)!!}
							<div class="form-group row">
								   {!! Form::label('name', 'Item Name',['class' => 'col-sm-2 col-form-label']) !!}
   
								<div class="col-sm-4">
									{!! Form::text('name',null, ['class' => 'form-control']) !!}
								</div>
							</div>
							<div class="form-group row">
								   {!! Form::label('name', 'Description',['class' => 'col-sm-2 col-form-label']) !!}
   
								<div class="col-sm-4">
									{!! Form::textarea('description',@$item->description, ['class' => 'form-control date','style'=>'height: 60px;']) !!}
								</div>
							</div> 
							<div class="form-group row">
								   {!! Form::label('name', 'Price type',['class' => 'col-sm-2 col-form-label']) !!}
				                <div class="col-sm-4" style="text-align: left;">
									  <input type="radio" name="weight_status" value="0" checked>Per Kg
									  <input type="radio" name="weight_status" value="1" {{(@$item->weight_status==1)?"checked":""}}>Per item
				                </div>
							</div>
							<div class="form-group row">
								   {!! Form::label('name', 'Price',['class' => 'col-sm-2 col-form-label']) !!}
   
								<div class="col-sm-4">
									{!! Form::text('price',null, ['class' => 'form-control']) !!}
								</div>
							</div>
							<div class="form-group row">
								   {!! Form::label('name', 'Offer Price',['class' => 'col-sm-2 col-form-label']) !!}
   
								<div class="col-sm-4">
									{!! Form::text('offer_price',null, ['class' => 'form-control']) !!}
								</div>
							</div>     

							<div class="form-group row">
								   {!! Form::label('name', 'Image',['class' => 'col-sm-2 col-form-label']) !!}
								<div class="col-sm-2">
                                    {!! Form::file('image', array('class' => 'form-control')) !!} 
                                    
									@if(isset($merchant))
									  @if($merchant->image!='')
									  <img class="card-img-top" src="{{asset('items/'.$merchant->image)}}" alt="{{$merchant->image}}" style="margin-top: 20px;
									    width: 79px;
									    height: 65px;">
									  
									  @else
									  {!! Html::image('public/images/noimage.jpg', 'Existing image', array('class' => 'category_image')) !!}
									  @endif 
									 @endif   
								</div>
								<div class="col-sm-2 image">
									(750 x 450,less than 2 mb)
								</div>
							</div>

							<div class="form-group row">
								{!! Form::label('', '',['class' => 'col-sm-2 col-form-label']) !!}   
								<div class="col-sm-4">
						           <a href="{{URL::to('outlet/item-list/'.$merchant_id)}}"><button type="button" class="btn btn-warning" >Cancel</button></a>
								   <button type="submit" class="btn btn-info btn-success">Submit</button>
								  <!-- {!! Form::text('submit', 'Submit', ['class' => 'btn-success','style="margin-left: 42%;text-align:center"']) !!} -->
								</div>
							</div>
						{!! Form::close() !!}
					</div>
			    </div>
		    </div>
		</div>
	</div>
</div>

<style type="text/css">
	.category_image
	{
	    margin-top: 20px;
	    margin-right: 100%;
	    width: 70px;
	}

@media 
only screen and (max-width: 760px),
(min-device-width: 768px) and (max-device-width: 1024px)  
{
	.btn-success
	{
	  width: 96%;
	  margin-top: 0px;
	  margin-right :0%;
	}
	.btn-warning
	{
        width: 94%;
        margin: 10px
	}
}   
</style>

<script type="text/javascript">
$(document).ready(function(){
  setTimeout(function(){ $('.alert-success').fadeOut() }, 2000);
});

jQuery(function() {
  var datepicker = $('input.date');
     datepicker.datepicker({
      setDate: new Date(),
      todayHighlight: true,
    });
});
</script>

@endsection
