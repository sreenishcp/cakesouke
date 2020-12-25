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
								{{ Form::open(['route' => 'map.submit','files'=>true]) }}
								<input type="hidden" value="{{$merchant_id}}" name="merchant_id">
								<input type="hidden" name="latitude" id="latitude" placeholder="Latitude" value="" ><br>
								<input type="hidden" name="longitude" id="longitude" placeholder="Longitude" value="" ><br>
								<!-- <input type="hidden" name="place_id" id="location_id" placeholder="Location Ids" value="" ><br>	 -->
							<div class="form-group row">
								   {!! Form::label('name', 'Select Location',['class' => 'col-sm-2 col-form-label']) !!}
								<div class="col-sm-4">
									<input
							        name="address" onFocus="initializeAutocomplete()" id="locality"
							        placeholder="Enter your address"
							        onFocus="geolocate()"
							        type="text" class="form-control">
								</div>
							</div>
							<div class="form-group row">
								{!! Form::label('', '',['class' => 'col-sm-2 col-form-label']) !!}   
								<div class="col-sm-4">
						           <a href="{{URL::to('category/')}}"><button type="button" class="btn btn-warning" >Cancel</button></a>
								   <button type="submit" class="btn btn-info btn-success">Submit</button>
								  <!-- {!! Form::text('submit', 'Submit', ['class' => 'btn-success','style="margin-left: 42%;text-align:center"']) !!} -->
								</div>
							</div>
							 <div class="col-md-12"><div id="webkulMap" style="width: 100%; height: 400px;"></div></div>
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

<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAATLVjBD3GenK9FusTZNpr1zj1HIQ2QcM&callback=initAutocomplete&libraries=places&v=weekly"
      defer
    ></script>
    <script type="text/javascript">
  function initializeAutocomplete(){
    var input = document.getElementById('locality');
    var options = {}

    var autocomplete = new google.maps.places.Autocomplete(input, options);

    google.maps.event.addListener(autocomplete, 'place_changed', function() {
      var place = autocomplete.getPlace();
      var lat = place.geometry.location.lat();
      var lng = place.geometry.location.lng();
      var placeId = place.place_id;
      // to set city name, using the locality param
      var componentForm = {
        locality: 'short_name',
      };
      for (var i = 0; i < place.address_components.length; i++) {
        var addressType = place.address_components[i].types[0];
        if (componentForm[addressType]) {
          var val = place.address_components[i][componentForm[addressType]];
          
        }
      }
      document.getElementById("latitude").value	   = lat;
      document.getElementById("longitude").value   = lng;
      
    });
  }
</script>
@endsection
