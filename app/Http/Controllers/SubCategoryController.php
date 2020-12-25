<?php

namespace App\Http\Controllers;

use App\SubCategory;
use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests\SubCategoryAddRequest;
class SubCategoryController extends Controller
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
        $data['main_menu']  = 'subcategory';
        $data['sub_menu']   = 'list';
        if($request->has('search_key'))
        {
            $data['key']        = $request->search_key;
            $search_key         = $request->search_key;
            $data['merchants']  = SubCategory::orderBy('id','desc')->where('m_name','like','%{$search_key}%')->orwhere('oulet_name', 'like', "%{$search_key}%")->orwhere('m_phone', 'like', "%{$search_key}%")->paginate(15);
        }
        else
            $data['subcategories']  = SubCategory::with('category')->orderBy('id','desc')->paginate(15);
        return view('admin.subcategory.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['breadcrump'] = array('app_user'=>'add users');
        $data['main_menu']  = 'subcategory';
        $data['sub_menu']   = 'add';
        $data['category']   = Category::pluck('name','id')->prepend('Select','');
        return view('admin.subcategory.add',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubCategoryAddRequest $request)
    {
        $subcategory              = new SubCategory;
        $subcategory->name        = $request->name;
        $subcategory->category_id = $request->category_id;
        if($request->hasFile('image')) 
        {
         $file       = $request->file('image');
         $image_name  = time().'.'.$request->image->getClientOriginalExtension();  
         $request->image->move(public_path('categories'), $image_name);
        }
        $subcategory->image     = $image_name;
        $subcategory->save();
        return redirect('subcategory')->withSuccess(['Sub Category Created Successfully!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $category,$id)
    {
        $data['subcategory']= SubCategory::findOrFail($id);
        $data['breadcrump'] = array('app_user'=>'add users');
        $data['main_menu']  = 'subcategory';
        $data['sub_menu']   = 'add';
        $data['category']   = Category::pluck('name','id');
        return view('admin.subcategory.add',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category,$id)
    {
        $category         = SubCategory::findOrFail($id);
        $category['name'] = $request->name;
        $category['category_id'] = $request->category_id;
        $image_name       = $request->image_old;
        if($request->hasFile('image')) 
        {
            $validatedData = $request->validate([
            'image'   => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          ]);
         $file       = $request->file('image');
         $image_name  = time().'.'.$request->image->getClientOriginalExtension();  
         $request->image->move(public_path('categories'), $image_name);
        }
        $category['image'] = $image_name;
        $category->save();
        return redirect('subcategory')->withSuccess(['Sub Category Updated successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $category,Request $request)
    {
        SubCategory::where('id',$request->category_id)->delete();
        return redirect('subcategory')->withSuccess(['Sub Category Deleted successfully!']);

    }
    public function change_category_status(Request $request)
    { 
       $category_id = $request->category_id;
       $status      = $request->cur_status;
       SubCategory::where('id',$category_id)->update(['status'=>$status]);
    }
}
