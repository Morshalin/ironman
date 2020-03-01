<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\About;

class AboutController extends Controller{

    public function index(){
        $model = About::first();
        return view('admin.about.index',compact('model'));
    }

    public function store(Request $request){
        $model = new About();
        $validatedData = $request->validate([
            'title'=>'required',
            'image'=>'',
            'description'=>'required',
        ]);

        if ($request->status) {
            $validatedData['status'] = 1;
        }else{
              $validatedData['status'] = 0;
        }

        $image =$request->file('image');
        $slug = str_slug($request->title);
        if (isset($image)) {
            if ($model->image) {
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
       }

       if($request->model_id){
           $models = About::findOrFail($request->model_id);
           $validatedData['image'] =$models->image;
            $models->update($validatedData);
            return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Infromation Update Successfuly'), 'goto' => route('admin.about.index')]);
       }else{
            $model->create($validatedData);
            return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Infromation Added Successfuly'), 'goto' => route('admin.about.index')]);
       }
    }
    
}
