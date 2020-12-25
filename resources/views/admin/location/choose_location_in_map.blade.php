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
						 {{ Form::open(['route' => 'category.submit','files'=>true]) }}
						 <input type="hidden" name="latitude" value="<?=$latitude;?>" placeholder="latitude" id="latitude"/>
						<input type="hidden" name="longitude" value="<?=$longitude;?>" placeholder="longitude" id="longitude"/>
						<div class="form-group row">
							<div id="webkulMap" style="width: 50%; height: 400px;"></div>
						</div>
						

					<div class="form-group row">
						{!! Form::label('', '',['class' => 'col-sm-2 col-form-label']) !!}   
						<div class="col-sm-4">
				           <a href="{{URL::to('outlet/location/'.$merchant_id)}}"><button type="button" class="btn btn-warning" >Cancel</button></a>
						   <button type="submit" class="btn btn-info btn-success">Submit</button>
						  <!-- {!! Form::text('submit', 'Submit', ['class' => 'btn-success','style="margin-left: 42%;text-align:center"']) !!} -->
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

<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAxs2qa3cALVSu4Zz_CyIcaC7P2PtRiww8&callback=initMap"></script>
<script type="text/javascript">
    var map;
    var markers = [];
     var uniqueId = 1;
     myLatlng = new google.maps.LatLng(<?= $latitude;?>, <?= $longitude;?>);
    geocoder = new google.maps.Geocoder();
     infowindow = new google.maps.InfoWindow();
    function initialize() {
        mapOptions = {
        zoom: 15,
        center: myLatlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        
        map = new google.maps.Map(document.getElementById("webkulMap"), mapOptions);


    var infowindow = new google.maps.InfoWindow();
    var marker, i;
            marker = new google.maps.Marker({
            map: map,
            position: myLatlng,
            draggable: true
        });

        google.maps.event.addListener(marker, 'dragend', function() {
          $(".submit_map_button").show();
            geocoder.geocode({'latLng': marker.getPosition()}, function(results,status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                         var address_components = results[0].address_components;
                         var components={};
                        jQuery.each(address_components, function(k,v1) {jQuery.each(v1.types,function(k2,v2){components[v2]=v1.long_name});});


                        $('#latitude').val(marker.getPosition().lat());
                        $('#longitude').val(marker.getPosition().lng());
                        infowindow.setContent(results[0].formatted_address);
                        infowindow.open(map, marker);
                    }
                }
            });
        });
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>
@endsection
