<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $models = Category::all();
        return view('admin.category.index',compact('models'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        
        $validatedData = $request->validate([
            'cat_name'=>'required|unique:categories|max:255',
            'cat_slug_name'=>'required|max:255',
            'banner_image'=>'required',
            'meta_keyword'=>'max:400',
            'meta_description'=>'max:400',
            'status'=>'',
        ]);

        if ($request->status) {
            $validatedData['status'] = 1;
        }else{
              $validatedData['status'] = 0;
        }
         $validatedData['cat_slug_name'] = make_slug($validatedData['cat_slug_name']);

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


        $model = new Category();
        $model->create($validatedData);
      return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Category Added Successfuly'), 'goto' => route('admin.category.index')]);
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
        $model = Category::findOrFail($id);
        return view('admin.category.edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        
        $model = Category::findOrFail($id);
        $validatedData = $request->validate([
            'cat_name'=> ['required', 'string', Rule::unique('categories', 'cat_name')->ignore($model->id)],
            'cat_slug_name'=>'required|max:255',
            'banner_image'=>'',
            'meta_keyword'=>'max:400',
            'meta_description'=>'max:400',
            'status'=>'',
        ]);

        if ($request->status) {
            $validatedData['status'] = 1;
        }else{
              $validatedData['status'] = 0;
        }
         $validatedData['cat_slug_name'] = make_slug($validatedData['cat_slug_name']);

        
        $banner_image =$request->file('banner_image');
        $slug = str_slug($request->cat_name);
        if (isset($banner_image)) {
            if ($request->banner_image) {
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

        $model->update($validatedData);
      return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Category Update Successfuly'), 'goto' => route('admin.category.index')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        
        $model = Category::findOrFail($id);
        if ($model->banner_image) {
            if (file_exists('uploads/'.$model->banner_image)) {
            unlink('uploads/'.$model->banner_image);
            }
        }
        $model->delete();
        return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Category Delete Successfuly'), 'goto' => route('admin.category.index')]);
    }
}
