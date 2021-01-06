<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ItemAddRequest;
class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$id)
    {
        $data['key']        = '';
        $data['breadcrump'] = array('app_user'=>'add users');
        $data['main_menu']  = 'item';
        $data['sub_menu']   = 'list';
        $data['merchant_id']= $id;
        if($request->has('search_key'))
        {
            $data['key']        = $request->search_key;
            $search_key         = $request->search_key;
            $data['items']      = Item::where('name','like',"%{$search_key}%")->orwhere('description', 'like', "%{$search_key}%")->orderBy('id','desc')->paginate(15);
        }
        else
            $data['items']  = Item::orderBy('id','desc')->paginate(15);
        //print_r($data['items']);exit();
        return view('admin.item.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($merchant_id)
    {
        $data['breadcrump'] = array('app_user'=>'add users');
        $data['main_menu']  = 'item';
        $data['sub_menu']   = 'add';
        $data['merchant_id']= $merchant_id;
        return view('admin.item.add',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemAddRequest $request)
    {
        $item                = new Item;
        $item->name          = $request->name;
        $item->description   = $request->description;
        $item->weight_status = $request->weight_status;
        $item->price         = $request->price;
        $item->merchant_id   = $request->merchant_id;
        $item->offer_price   = $request->offer_price;
        if($request->offer_price==''||$request->offer_price==0)
        $item->offer_price   = 0;
        if($request->hasFile('image')) 
        {
         $file       = $request->file('image');
         $image_name  = time().'.'.$request->image->getClientOriginalExtension();  
         $request->image->move(public_path('items'), $image_name);
        }
        $item->image     = $image_name;
        $item->save();
        return redirect('outlet/item-list/'.$item->merchant_id)->withSuccess(['Item Created successfully!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item,$id)
    {
        $data['item'] = Item::findOrFail($id);
        $data['breadcrump'] = array('app_user'=>'add users');
        $data['main_menu']  = 'item';
        $data['sub_menu']   = 'list';
        $data['merchant_id']= $id;
        return view('admin.item.add',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(ItemAddRequest $request, Item $item,$id)
    {
        $item                  = Item::findOrFail($id);
        $item['name']          = $request->name;
        $item['description']   = $request->description;
        $item['weight_status'] = $request->weight_status;
        $item['price']         = $request->price;
        $item['merchant_id']   = $request->merchant_id;
        $item['offer_price']   = $request->offer_price;
        $image_name            = $request->image_old;
        if($request->hasFile('image')) 
        {
            $validatedData = $request->validate([
                'image'   => 'required|max:2048',
              ]);
         $file       = $request->file('image');
         $image_name  = time().'.'.$request->image->getClientOriginalExtension();  
         $request->image->move(public_path('items'), $image_name);
        }
        $item['image']   = $image_name;
        $item->save();
        return redirect('outlet/item-list/'.$item->merchant_id)->withSuccess(['Item Updated successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item,Request $request)
    {
       $item_id = $request->item_id;
       $item    = Item::findOrFail($item_id);
       $image_path =public_path('items/').$item->image;
        File::delete($image_path);
        Item::where('id',$item_id)->delete();
        return redirect('outlet/item-list/'.$item->merchant_id)->withSuccess(['Item deleted successfully!']);   
    }
    public function change_status(Request $request)
    {
       $item_id = $request->item_id;
       $status  = $request->cur_status;
       user_id::where('id',$item_id)->update(['m_status'=>$status]);
    }
}
