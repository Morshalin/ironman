<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use App\club;
use App\Score;

class ScoreController extends Controller{
 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $club_models = Club::all();
        $models = Score::all();
        return view('admin.score.index',compact('models','club_models'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('admin.score.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $validatedData = $request->validate([
            'club_id'=>'required|max:255',
            'score'=>'required',
            'satatus'=>''
        ]);

        if ($request->status) {
            $validatedData['status'] = 1;
        }else{
              $validatedData['status'] = 0;
        }

        $model = new Score();
        $model->create($validatedData);
        return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Score Added Successfuly'), 'goto' => route('admin.score.index')]);
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
        $model = Score::findOrFail($id);
        $models = Score::all();
        $club_models = Club::all();
        return view('admin.score.index',compact('model','club_models','models'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
         $model = Score::findOrFail($id);
        $validatedData = $request->validate([
            'club_id'=> ['required', 'string', Rule::unique('scores', 'club_id')->ignore($model->id)],
            'score'=>'',
            'satatus'=>''
        ]);

        if ($request->status) {
            $validatedData['status'] = 1;
        }else{
              $validatedData['status'] = 0;
        }

        $model->update($validatedData);
        return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Score Update Successfuly'), 'goto' => route('admin.score.index')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $model = Score::findOrFail($id);
        $model->delete();
        return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Score Delete Successfuly'), 'goto' => route('admin.score.index')]);
    }
}
