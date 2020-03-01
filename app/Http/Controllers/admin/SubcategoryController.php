<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use App\Subcategory;
use Carbon\Carbon;
use App\Category;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $models = Subcategory::all();
        return view('admin.subcategory.index',compact('models'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $models = Category::all();
        return view('admin.subcategory.create',compact('models'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_id'=>'required',
            'subcat_name'=>'required|unique:subcategories|max:255',
            'subcat_slug_name'=>'required|max:255',
            'meta_keyword'=>'max:400',
            'meta_description'=>'max:400',
            'status'=>'',
        ]);

        if ($request->status) {
            $validatedData['status'] = 1;
        }else{
              $validatedData['status'] = 0;
        }
         $validatedData['subcat_slug_name'] = make_slug($validatedData['subcat_slug_name']);

        $banner_image =$request->file('banner_image');
        $slug = str_slug($request->cat_name);
        if (isset($banner_image)) {
         $curentdatetime = Carbon::now()->toDateString();
         $validatedData['banner_image'] = $slug.'_'.$curentdatetime.'_'.uniqid().'.'.$banner_image->getClientOriginalExtension();
          if(!file_exists('uploads')){
               mkdir('uploads',0777,true);
          }
          $banner_image->move('uploads',$validatedData['banner_image']);
       }else{
           $validatedData['banner_image'] ='photo.jpg';
       }


        $model = new Subcategory();
        $model->create($validatedData);
      return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Sub-Category Added Successfuly'), 'goto' => route('admin.subcategory.index')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $models = Category::all();
        $model = Subcategory::findOrFail($id);
        return view('admin.subcategory.edit', compact('models','model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $model = Subcategory::findOrFail($id);
        $validatedData = $request->validate([
            'category_id'=>'required',
            'subcat_name'=> ['required', 'string', Rule::unique('subcategories', 'subcat_name')->ignore($model->id)],
            'subcat_slug_name'=>'required|max:255',
            'meta_keyword'=>'max:400',
            'meta_description'=>'max:400',
            'status'=>'',
        ]);

        if ($request->status) {
            $validatedData['status'] = 1;
        }else{
              $validatedData['status'] = 0;
        }

        $banner_image =$request->file('banner_image');
        $slug = str_slug($request->cat_name);
        if (isset($banner_image)) {
            if ($model->banner_image) {
               if (file_exists('uploads/'.$model->banner_image)) {
                unlink('uploads/'.$model->banner_image);
                }
            }
         $curentdatetime = Carbon::now()->toDateString();
         $validatedData['banner_image'] = $slug.'_'.$curentdatetime.'_'.uniqid().'.'.$banner_image->getClientOriginalExtension();
          if(!file_exists('uploads')){
               mkdir('uploads',0777,true);
          }
          $banner_image->move('uploads',$validatedData['banner_image']);
       }else{
           $validatedData['banner_image'] =$model->banner_image;
       }

         $validatedData['subcat_slug_name'] = make_slug($validatedData['subcat_slug_name']);

        $model->update($validatedData);
      return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('sub-Category Update Successfuly'), 'goto' => route('admin.subcategory.index')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $model = Subcategory::findOrFail($id);
        if ($model->banner_image) {
            if (file_exists('uploads/'.$model->banner_image)) {
            unlink('uploads/'.$model->banner_image);
            }
        }
        $model->delete();
        return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Category Delete Successfuly'), 'goto' => route('admin.subcategory.index')]);
    }
}