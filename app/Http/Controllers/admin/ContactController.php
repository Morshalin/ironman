<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contact;

class ContactController extends Controller
{
    public function index(){
        $models = Contact::all();
        return view('admin.contact.index',compact('models'));
    }

    public function delete($id){
       $model =  Contact::findOrFail($id);
       $model->delete();
       return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Messsage Delete Successfuly'), 'goto' => route('admin.contact.index')]);
    }

    public function status(Request $request){
        $model =  Contact::findOrFail($request->id);
        //dd($model->status);
        if($model->status == 0 ){
             $model->status = 1;
             $model->save();
             return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Messsage Seen Successfuly'), 'goto' => route('admin.contact.index')]);
        }elseif($model->status == 1 ){
             $model->status = 0;
             $model->save();
             return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Messsage UnSeen Successfuly'), 'goto' => route('admin.contact.index')]);
        }
        
    }

    public function show(Request $request){
        $id = $request->id;
        $model = Contact::findOrFail($id);
        if($model->status == 0 ){
            $model->status = 1;
            $model->save();
        }
        return view('admin.contact.show', compact('model'));

    }


}
