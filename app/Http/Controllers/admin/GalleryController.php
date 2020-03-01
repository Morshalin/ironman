<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Gallery;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $models = Gallery::all();
        return view('admin.gallery.index',compact('models'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $validatedData = $request->validate([
            'gallery_image'=>'required',
        ]);

        if ($request->status) {
            $validatedData['status'] = 1;
        }else{
              $validatedData['status'] = 0;
        }
        
        $gallery_image =$request->file('gallery_image');
        if (isset($gallery_image)) {
         $curentdatetime = Carbon::now()->toDateString();
         $validatedData['gallery_image'] = $curentdatetime.'_'.uniqid().'.'.$gallery_image->getClientOriginalExtension();
          if(!file_exists('uploads')){
               mkdir('uploads',0777,true);
          }
          $gallery_image->move('uploads',$validatedData['gallery_image']);
       }else{
           $validatedData['gallery_image'] ='photo.jpg';
       }


        $model = new Gallery();
        $model->create($validatedData);
      return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Gallery Image Added Successfuly'), 'goto' => route('admin.gallery.index')]);
        
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
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $model = Gallery::findOrFail($id);
        if ($model->gallery_image) {
            if (file_exists('uploads/'.$model->gallery_image)) {
            unlink('uploads/'.$model->gallery_image);
            }
        }
        $model->delete();
        return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Image Delete Successfuly'), 'goto' => route('admin.gallery.index')]);
    }
}
