<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Slider;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $models = Slider::first();
        return view('admin.slider.index',compact('models'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $validatedData = $request->validate([
            'position'=>'',
            'title'=>'',
            'sub_title'=>'',
            'description'=>'',
            'image_one'=>'required',
            'image_two'=>'',
            'status'=>'',
        ]);

        if ($request->status) {
            $validatedData['status'] = 1;
        }else{
              $validatedData['status'] = 0;
        }
        $model = new Slider();
        $model->create($validatedData);
        return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Slider Added Successfuly'), 'goto' => route('admin.slider.index')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
   
        $model = Slider::findOrFail($id);
        $validatedData = $request->validate([
            'position'=>'',
            'title'=>'',
            'sub_title'=>'',
            'description'=>'',
            'image_one'=>'required',
            'image_two'=>'',
            'status'=>'',
        ]);

        if ($request->status) {
            $validatedData['status'] = 1;
        }else{
              $validatedData['status'] = 0;
        }
        $model->update($validatedData);
        return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Slider Update Successfuly'), 'goto' => route('admin.slider.index')]);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $model = Slider::findOrFail($id);
        if ($model->image_one) {
            if (file_exists('uploads/'.$model->image_one)) {
            unlink('uploads/'.$model->image_one);
            }
        }
        if ($model->image_two) {
            if (file_exists('uploads/'.$model->image_two)) {
            unlink('uploads/'.$model->image_two);
            }
        }
        $$model->delete();
        return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Slider Delete Successfuly'), 'goto' => route('admin.slider.index')]);
    }
}
