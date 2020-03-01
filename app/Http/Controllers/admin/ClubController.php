<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use App\Club;

class ClubController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $models = Club::all();
        return view('admin.club.index',compact('models'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('admin.club.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $validatedData = $request->validate([
            'club_name'=>'required|unique:clubs|max:255',
            'logo_image'=>'required',
            'satatus'=>''
        ]);

        if ($request->status) {
            $validatedData['status'] = 1;
        }else{
              $validatedData['status'] = 0;
        }

        $logo_image =$request->file('logo_image');
        $slug = str_slug($request->club_name);
        if (isset($logo_image)) {
         $curentdatetime = Carbon::now()->toDateString();
         $validatedData['logo_image'] = $slug.'_'.$curentdatetime.'_'.uniqid().'.'.$logo_image->getClientOriginalExtension();
          if(!file_exists('uploads')){
               mkdir('uploads',0777,true);
          }
          $logo_image->move('uploads',$validatedData['logo_image']);
       }else{
           $validatedData['logo_image'] ='photo.jpg';
       }

        $model = new Club();
        $model->create($validatedData);
        return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Club Added Successfuly'), 'goto' => route('admin.club.index')]);
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
        $model = Club::findOrFail($id);
         $models = Club::all();
        return view('admin.club.index',compact('model','models'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
         $model = Club::findOrFail($id);
        $validatedData = $request->validate([
            'club_name'=> ['required', 'string', Rule::unique('clubs', 'club_name')->ignore($model->id)],
            'logo_image'=>'',
            'satatus'=>''
        ]);

        if ($request->status) {
            $validatedData['status'] = 1;
        }else{
              $validatedData['status'] = 0;
        }

        $logo_image =$request->file('logo_image');
        $slug = str_slug($request->club_name);
        if (isset($logo_image)) {
            if ($request->logo_image) {
               if (file_exists('uploads/'.$model->logo_image)) {
                unlink('uploads/'.$model->logo_image);
                }
            }
         $curentdatetime = Carbon::now()->toDateString();
         $validatedData['logo_image'] = $slug.'_'.$curentdatetime.'_'.uniqid().'.'.$logo_image->getClientOriginalExtension();
          if(!file_exists('uploads')){
               mkdir('uploads',0777,true);
          }
          $logo_image->move('uploads',$validatedData['logo_image']);
       }else{
           $validatedData['logo_image'] =$model->logo_image;
       }

        $model->update($validatedData);
        return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Club Update Successfuly'), 'goto' => route('admin.club.index')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $model = Club::findOrFail($id);
        if ($model->logo_image) {
               if (file_exists('uploads/'.$model->logo_image)) {
                unlink('uploads/'.$model->logo_image);
                }
            }
        $model->delete();
        return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Club Delete Successfuly'), 'goto' => route('admin.club.index')]);
    }
}
