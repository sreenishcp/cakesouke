<?php

namespace App\Http\Controllers;

use App\Merchant;
use Illuminate\Http\Request;
use App\Http\Requests\MerchantAddRequests;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
class MerchantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['key']        = '';
        $data['breadcrump'] = array('app_user'=>'add users');
        $data['main_menu']  = 'merchant';
        $data['sub_menu']   = 'list';
        if($request->has('search_key'))
        {
            $data['key']        = $request->search_key;
            $search_key         = $request->search_key;
            $data['merchants']  = Merchant::orderBy('id','desc')->where('m_name','like','%{$search_key}%')->orwhere('oulet_name', 'like', "%{$search_key}%")->orwhere('m_phone', 'like', "%{$search_key}%")->paginate(15);
        }
        else
            $data['merchants']  = Merchant::orderBy('id','desc')->paginate(15);
        return view('admin.merchant.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['breadcrump'] = array('app_user'=>'add users');
        $data['main_menu']  = 'merchant';
        $data['sub_menu']   = 'add';
        return view('admin.merchant.add',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MerchantAddRequests $request)
    {
        $merchant                  = new Merchant;
        $merchant->m_name          = $request->m_name;
        $merchant->address         = $request->address;
        $merchant->oulet_name      = $request->oulet_name;
        $merchant->m_phone         = $request->m_phone;
        $merchant->whatsapp_number = $request->whatsapp_number;
        $merchant->instagram_link  = $request->instagram_link;
        $merchant->m_period_start_date   = date("Y-m-d",strtotime($request->m_period_start_date));
        $merchant->m_period_end_date     = date("Y-m-d",strtotime($request->m_period_end_date));
        if($request->whatsapp_number==''&&$request->instagram_link=='')
            return redirect()->back()->with('error','Whatsapp number or insrtagram link required');
            if($request->hasFile('image')) 
           {
             $file       = $request->file('image');
             $image_name  = time().'.'.$request->image->getClientOriginalExtension();  
             $request->image->move(public_path('images'), $image_name);
            }
            if($request->hasFile('cover_photo')) 
           {
             $file       = $request->file('cover_photo');
             $cover_photo_name  = time().'.'.$request->cover_photo->getClientOriginalExtension();  
             $request->cover_photo->move(public_path('cover_photos'), $cover_photo_name);
            }
        $merchant->image        = $image_name;
        $merchant->cover_photo  = $cover_photo_name;
        $merchant->save();
        $m_id = $merchant->id;

        $user                 = new User;
        $user->remember_token = str_random(10);
        $user->email          = $request->email;
        $user->password       = Hash::make($request->password);
        $user->merchant_id    = $m_id;
        $user->name           = $merchant->m_name;
        $user->dob            =  date("Y-m-d",strtotime($request->dob));
        $user->save();  
       return redirect()->route('merchant')->withSuccess(['Merchant Created successfully!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Merchant  $merchant
     * @return \Illuminate\Http\Response
     */
    public function show(Merchant $merchant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Merchant  $merchant
     * @return \Illuminate\Http\Response
     */
    public function edit(Merchant $merchant,$id)
    {
        $data['merchant'] = Merchant::with(['user']
       )->where('id', $id)->findOrFail($id);
        $data['breadcrump'] = array('app_user'=>'add users');
        $data['main_menu']  = 'merchant';
        $data['sub_menu']   = 'add';
        return view('admin.merchant.add',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Merchant  $merchant
     * @return \Illuminate\Http\Response
     */
    public function update(MerchantAddRequests $request, Merchant $merchant,$id)
    {
        if ($request->password != '')
          $validatedData = $request->validate([
            'password'  => 'required|confirmed|min:6',
          ]);
        $merchant                    = Merchant::findOrFail($id);
        $merchant['m_name']          = $request->m_name;
        $merchant['address']         = $request->address;
        $merchant['oulet_name']      = $request->oulet_name;
        $merchant['m_phone']         = $request->m_phone;
        $merchant['whatsapp_number'] = $request->whatsapp_number;
        $merchant['instagram_link']  = $request->instagram_link;
        $merchant['m_period_start_date']   = date("Y-m-d",strtotime($request->m_period_start_date));
        $merchant['m_period_end_date']     = date("Y-m-d",strtotime($request->m_period_end_date));
        $image_name  = $request->image_old;
        $cover_photo_name = $request->cover_photo_old;
            if($request->hasFile('image')) 
           {
                $validatedData = $request->validate([
                'image'   => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
              ]);
             $file       = $request->file('image');
             $image_name  = time().'.'.$request->image->getClientOriginalExtension();  
             $request->image->move(public_path('images'), $image_name);
            }
            if($request->hasFile('cover_photo')) 
           {
            $validatedData = $request->validate([
                'cover_photo'   => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
              ]);
             $file       = $request->file('cover_photo');
             $cover_photo_name  = time().'.'.$request->cover_photo->getClientOriginalExtension();  
             $request->cover_photo->move(public_path('cover_photos'), $cover_photo_name);
            }
        $merchant['image']        = $image_name;
        $merchant['cover_photo']  = $cover_photo_name;
        $merchant->save();
 
       $user['email'] = $request->email;
        if ($request->password != '')
            $user['email'] = Hash::make($request->password);
        User::where('merchant_id', $id)->update($user);
       return redirect()->route('merchant')->withSuccess(['Merchant Updated successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Merchant  $merchant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Merchant $merchant)
    {
        //
    }
    public function change_user_status(Request $request)
    { 
       $user_id = $request->user_id;
       $status  = $request->cur_status;
       Merchant::where('id',$user_id)->update(['m_status'=>$status]);
    }
}
