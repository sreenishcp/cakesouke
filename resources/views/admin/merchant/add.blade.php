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
						@if(isset($merchant))
						    {{ Form::model($merchant, ['route' => ['update_merchant', $merchant->id], 'method' => 'post','files'=>true]) }}
						     {!! Form::hidden('image_old',$merchant->image, ['class' => 'form-control']) !!}
						     {!! Form::hidden('cover_photo_old',$merchant->cover_photo, ['class' => 'form-control']) !!}					
								@else
								    {{ Form::open(['route' => 'merchant.submit','files'=>true]) }}
								@endif
							<div class="form-group row">
								   {!! Form::label('name', 'Merchant Name',['class' => 'col-sm-2 col-form-label']) !!}
   
								<div class="col-sm-4">
									{!! Form::text('m_name',null, ['class' => 'form-control']) !!}
								</div>
							</div>
							<div class="form-group row">
								   {!! Form::label('name', 'DOB',['class' => 'col-sm-2 col-form-label']) !!}
   
								<div class="col-sm-4">
									{!! Form::text('dob',@$merchant['user']['dob'], ['class' => 'form-control date']) !!}
								</div>
							</div> 
							<div class="form-group row">
								   {!! Form::label('name', 'Outlet name',['class' => 'col-sm-2 col-form-label']) !!}
   
								<div class="col-sm-4">
									{!! Form::text('oulet_name',null, ['class' => 'form-control']) !!}
								</div>
							</div>
							<div class="form-group row">
								   {!! Form::label('name', 'Address',['class' => 'col-sm-2 col-form-label']) !!}
   
								<div class="col-sm-4">
									{!! Form::textarea('address',null, ['class' => 'form-control','style'=>'height: 60px;']) !!}
								</div>
							</div>    
							<div class="form-group row">
								   {!! Form::label('name', 'Email',['class' => 'col-sm-2 col-form-label']) !!}
								<div class="col-sm-4">
									{!! Form::email('email',@$merchant['user']['email'], ['class' => 'form-control']) !!}
								</div>
							</div> 	 	 
							<div class="form-group row">
								{!! Form::label('phone', 'Phone',['class' => 'col-sm-2 col-form-label']) !!}
								<div class="col-sm-4">
									{!! Form::number('m_phone',null, ['class' => 'form-control']) !!}
								</div>
							</div>
							<div class="form-group row">
								{!! Form::label('password',null,['class' => 'col-sm-2 col-form-label']) !!}
								<div class="col-sm-4">
									{!! Form::text('password', '', ['class'=>'form-control']) !!}
								</div>
							</div>
							<div class="form-group row">		         
								 {!! Form::label('Confirm Password', 'Confirm Password',['class' => 'col-sm-2 col-form-label']) !!}
								<div class="col-sm-4">
									{!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
								</div>
							</div>
							<div class="form-group row">
								   {!! Form::label('name', 'Logo',['class' => 'col-sm-2 col-form-label']) !!}
								<div class="col-sm-2">
                                    {!! Form::file('image', array('class' => 'form-control')) !!} 
                                    
									@if(isset($merchant))
									  @if($merchant->image!='')
									  <img class="card-img-top" src="{{asset('images/'.$merchant->image)}}" alt="{{$merchant->image}}" style="margin-top: 20px;
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
								   {!! Form::label('name', 'Cover Photo',['class' => 'col-sm-2 col-form-label']) !!}
								<div class="col-sm-2">
                                    {!! Form::file('cover_photo', array('class' => 'form-control')) !!} 
                                    
									@if(isset($merchant))
									  @if($merchant->cover_photo!='')
									   <img class="card-img-top" src="{{asset('cover_photos/'.$merchant->cover_photo)}}" alt="{{$merchant->cover_photo}}" style="margin-top: 20px;
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
								   {!! Form::label('name', 'start date',['class' => 'col-sm-2 col-form-label']) !!}
   								<?php
   								$start_date = '';
   								if(isset($merchant->m_period_start_date))
   									$start_date = date("m/d/Y",strtotime($merchant->m_period_start_date));
   								?>
								<div class="col-sm-4">
									{!! Form::text('m_period_start_date',$start_date, ['class' => 'form-control date']) !!}
								</div>
							</div> 
							<div class="form-group row">
								   {!! Form::label('name', 'End date',['class' => 'col-sm-2 col-form-label']) !!}  
								<?php
   								$end_date = '';
   								if(isset($merchant->m_period_end_date))
   									$end_date = date("m/d/Y",strtotime($merchant->m_period_end_date));
   								?> 
								<div class="col-sm-4">
									{!! Form::text('m_period_end_date',$end_date, ['class' => 'form-control date']) !!}
								</div>
							</div> 
							<div class="form-group row">
								{!! Form::label('', '',['class' => 'col-sm-2 col-form-label']) !!}   
								<div class="col-sm-4">
						           <a href="{{URL::to('merchant/')}}"><button type="button" class="btn btn-warning" >Cancel</button></a>
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
