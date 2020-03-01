<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Subsicber;

class SubscriberlistController extends Controller
{
    public function index(){
        $models = Subsicber::all();
        return view('admin.subscriber.index',compact('models'));
    }

    public function destroy($id){
        $model = Subsicber::findOrFail($id);
        $model->delete();
        return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Subscriber Delete Successfuly'), 'goto' => route('admin.subscriber.index')]);
    }
}
