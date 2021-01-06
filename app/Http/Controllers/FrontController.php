<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class FrontController extends Controller
{
    public function index(Request $request)
    {
    	//DB::enableQueryLog();
	    $location_details_qry = DB::table("merchants")
	      ->select(
	        'm_name',
	        'oulet_name',
	        'cover_photo',
	        'm_phone',
	        'id',
	        'image',
	        'latitude',
	        'longitude',
	        'address',
	        'kilometer',
	        DB::raw("6371 * acos(cos(radians('" . $request->latitude . "'))
	       * cos(radians(merchants.latitude))
	       * cos(radians(merchants.longitude) - radians('" . $request->longitude . "'))
	       + sin(radians('" . $request->latitude . "'))
	       * sin(radians(merchants.latitude))) AS distance")
	      );
	        $location_details_qry = $location_details_qry->where('merchants.m_status', '0')
	      ->havingRaw('distance <= 50')
	      ->orderBy('distance', 'asc');
	      //dd(DB::getQueryLog());
	       $data['location_details'] = $location_details_qry->get()->toArray();
	      return view('front/index',$data);
    }
    public function create()
    {
    	return view('front/nearbysearch');
    }
}
