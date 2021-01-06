<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryAddRequest;
use Illuminate\Support\Facades\File;
class CategoryController extends Controller
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
        $data['main_menu']  = 'category';
        $data['sub_menu']   = 'list';
        if($request->has('search_key'))
        {
            $data['key']        = $request->search_key;
            $search_key         = $request->search_key;
            $data['merchants']  = Category::orderBy('id','desc')->where('m_name','like','%{$search_key}%')->orwhere('oulet_name', 'like', "%{$search_key}%")->orwhere('m_phone', 'like', "%{$search_key}%")->paginate(15);
        }
        else
            $data['categories']  = Category::orderBy('id','desc')->paginate(15);
        return view('admin.category.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['breadcrump'] = array('app_user'=>'add users');
        $data['main_menu']  = 'category';
        $data['sub_menu']   = 'add';
        return view('admin.category.add',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryAddRequest $request)
    {
        $category           = new Category;
        $category->name     = $request->name;
        if($request->hasFile('image')) 
        {
         $file       = $request->file('image');
         $image_name  = time().'.'.$request->image->getClientOriginalExtension();  
         $request->image->move(public_path('categories'), $image_name);
        }
        $category->image     = $image_name;
        $category->save();
        return redirect('category')->withSuccess(['Category Created successfully!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category,$id)
    {
        $data['category']   = Category::findOrFail($id);
        $data['breadcrump'] = array('app_user'=>'add users');
        $data['main_menu']  = 'category';
        $data['sub_menu']   = 'add';
        return view('admin.category.add',$data);
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
        $category         = Category::findOrFail($id);
        $category['name'] = $request->name;
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
        return redirect('category')->withSuccess(['Category Updated successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category,Request $request)
    {
        $category   = Category::findOrFail($request->category_id);
        Category::where('id',$request->category_id)->delete();
        $image_path = public_path('categories/').$category->image;
        File::delete($image_path);
        return redirect('category')->withSuccess(['Category Deleted successfully!']);

    }
    public function change_category_status(Request $request)
    { 
       $category_id = $request->category_id;
       $status      = $request->cur_status;
       Category::where('id',$category_id)->update(['status'=>$status]);
    }
}
