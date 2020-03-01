<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Newslatest;
use App\Category;
use App\Subcategory;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Auth;
class NewslatestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $models = Newslatest::all();
        return view('admin.latestnews.index',compact('models'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $models = Category::all();
        return view('admin.latestnews.create',compact('models'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $user_id = Auth::user()->id;
        $validatedData = $request->validate([
            'category_id'=>'required|max:255',
            'subcategory_id'=>'max:255',
            'user_id'=>'',
            'title_slug'=>'required',
            'title'=>'required|unique:newslatests|max:255',
            'image'=>'',
            'image_alt'=>'',
            'description'=>'required',
            'seo_title'=>'',
            'date'=>'required',
            'meta_keyword'=>'max:400',
            'meta_description'=>'max:400',
            'status'=>'',
        ]);

         $validatedData['user_id'] =$user_id;
        if ($request->status) {
            $validatedData['status'] = 1;
        }else{
              $validatedData['status'] = 0;
        }
        
         $a = strip_tags($validatedData['title']);
            $a = str_limit($a, 50);
            $a = strtolower($a);
            $res = str_replace("", "", $a);
            $res = str_replace(".", "", $res);
            $res = str_replace("?", "", $res);
            $res = trim($res);
            $validatedData['title_slug'] = make_slug($res);

        $image =$request->file('image');
        $slug = str_slug($request->title);
        if (isset($image)) {
         $curentdatetime = Carbon::now()->toDateString();
         $validatedData['image'] = $slug.'_'.$curentdatetime.'_'.uniqid().'.'.$image->getClientOriginalExtension();
          if(!file_exists('uploads')){
               mkdir('uploads',0777,true);
          }
          $image->move('uploads',$validatedData['image']);
       }else{
           $validatedData['image'] ='Photo.jpg';
       }


        $model = new Newslatest();
        $model->create($validatedData);
      return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Latest News Added Successfuly'), 'goto' => route('admin.news.index')]); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $model = Newslatest::findOrFail($id);
        return view('admin.latestnews.show',compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $model = Newslatest::findOrFail($id);
        $models = Category::all();
        return view('admin.latestnews.edit',compact('model','models'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = Newslatest::findOrFail($id);
        $user_id = Auth::user()->id;
        $validatedData = $request->validate([
            'category_id'=>'required|max:255',
            'subcategory_id'=>'max:255',
            'user_id'=>'',
            'title_slug'=>'required',
            'title'=>['required', 'string', Rule::unique('newslatests', 'title')->ignore($model->id)],
            'image'=>'',
            'image_alt'=>'',
            'description'=>'required',
            'seo_title'=>'',
            'date'=>'required',
            'meta_keyword'=>'max:400',
            'meta_description'=>'max:400',
            'status'=>'',
        ]);

         $validatedData['user_id'] =$user_id;
        if ($request->status) {
            $validatedData['status'] = 1;
        }else{
              $validatedData['status'] = 0;
        }
        
        $a = strip_tags($validatedData['title']);
            $a = str_limit($a, 50);
            $a = strtolower($a);
            $res = str_replace("", "", $a);
            $res = str_replace(".", "", $res);
            $res = str_replace("?", "", $res);
            $res = trim($res);
            $validatedData['title_slug'] = make_slug($res);



        $image =$request->file('image');
        $slug = str_slug($request->title);
        if (isset($image)) {
            if ($request->image) {
                if (file_exists('uploads/'.$model->image)) {
                    unlink('uploads/'.$model->image);
                }
            }
         $curentdatetime = Carbon::now()->toDateString();
         $validatedData['image'] = $slug.'_'.$curentdatetime.'_'.uniqid().'.'.$image->getClientOriginalExtension();
          if(!file_exists('uploads')){
               mkdir('uploads',0777,true);
          }
          $image->move('uploads',$validatedData['image']);
       }else{
           $validatedData['image'] =$model->image;
       }

        $model->update($validatedData);
      return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Latest News Update Successfuly'), 'goto' => route('admin.news.index')]); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $model = Newslatest::findOrFail($id);
        if ($model->image) {
            if (file_exists('uploads/'.$model->image)) {
            unlink('uploads/'.$model->image);
            }
        }
        $model->delete();
        return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Letaest News Delete Successfuly'), 'goto' => route('admin.news.index')]);
    }

    public function subcategory(Request $request){
        $id = $request->cat_id;
        $sub_model = Subcategory::where('category_id', $id)->get();
        $data = "";
        foreach ($sub_model as $value) {
           $data .= "<option value='$value->id'>".$value->subcat_name."</option>";
        }
        return  $data;
    }
}
