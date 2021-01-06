<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Merchant;
class MerchantDashboard extends Controller
{   
 	public function index(Request $request,$id)
    {
        $data['key']        = '';
        $data['breadcrump'] = array('app_user'=>'add users');
        $data['main_menu']  = 'merchant';
        $data['sub_menu']   = 'list';
        $data['merchant_id']= $id;
        return view('home-merchant',$data);
    }
    public function location($id)
    {
    	$data['key']        = '';
        $data['breadcrump'] = array('app_user'=>'add users');
        $data['main_menu']  = 'location';
        $data['sub_menu']   = 'add';
        $data['merchant_id']= $id;
        return view('admin.location.choose_location',$data);
    }
    public function submit_location(Request $request)
    {
        $data['key']        = '';
        $data['breadcrump'] = array('app_user'=>'add users');
        $data['main_menu']  = 'merchant';
        $data['sub_menu']   = 'list';
        $data['latitude']   = $request->latitude;
        $data['longitude']  = $request->longitude;
        $m_id               = $request->merchant_id;
        $data['merchant_id']= $m_id;
        Merchant::where('id',$m_id)->update(array('latitude'=>$request->latitude,'longitude'=>$request->longitude));
        return view('admin.location.choose_location_in_map',$data);
    }
    public function update_location(Request $request)
    {
        $data['key']        = '';
        $data['breadcrump'] = array('app_user'=>'add users');
        $data['main_menu']  = 'merchant';
        $data['sub_menu']   = 'list';
        $data['latitude']   = $request->latitude;
        $data['longitude']  = $request->longitude;
        $m_id               = $request->merchant_id;
        $data['merchant_id']= $m_id;
        Merchant::where('id',$m_id)->update(array('latitude'=>$request->latitude,'longitude'=>$request->longitude));
        return view('admin.location.choose_location_in_map',$data);
    }
}
