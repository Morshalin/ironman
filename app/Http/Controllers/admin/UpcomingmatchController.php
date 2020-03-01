<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Event;
use App\Upcomingmatch;
use App\Subcategory;
use Carbon\Carbon;

class UpcomingmatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $mydate = Carbon::now();
        $today = explode(" ",$mydate);
        $todayDate = $today[0];
        $all_event = Event::where('event_start_date','<=',$todayDate)->get();
        //dd($all_event);
        return view('admin.upcomingmatch.index',compact('all_event'));
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
        //dd($request->all());
        $validatedData = $request->validate([
            'category_id'=>'required',
            'subcategory_id'=>'max:255',
            'event_id'=>'required',
            'status'=>'',
        ]);

        if ($request->status) {
            $validatedData['status'] = 1;
        }else{
              $validatedData['status'] = 0;
        }
    
        $model = new Upcomingmatch();
        $model->create($validatedData);
        return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Event Set Successfuly'), 'goto' => route('admin.upcomingmatch.index')]);
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
    public function destroy($id)
    {
        //
    }

    public function subcategory(Request $request){
        $id = $request->cat_id;
        if($id == 0 ){
            $home_event ="<option value=''>Select One</option>";
            $home_allevent = Event::all();
            foreach ($home_allevent as $home_allevent_value) {
               $home_event .= "<option value='$home_allevent_value->id'>".$home_allevent_value->clubone->club_name." VS ".$home_allevent_value->clubtwo->club_name.", ".$home_allevent_value->match_start_date."</option>";
            }
            return $home_event;
        }
        $sub_model = Subcategory::where('category_id', $id)->get();
        $sub_category ="<option value=''>Select SubCategory</option>";
        $sub_event = "<option value=''>Select One</option>";
        $suball_event ="<option value=''>Select One</option>";
        if($sub_model){
            foreach ($sub_model as $value) {
                $sub_category .= "<option value='$value->id'>".$value->subcat_name."</option>";
            }
            $event = Event::where('category_id', $id)->get();
            foreach ($event as $event_value) {
               $sub_event .= "<option value='$event_value->id'>".$event_value->clubone->club_name." VS ".$event_value->clubtwo->club_name.", ".$event_value->match_start_date."</option>";
            }
            return response()->json(['sub_category'=>$sub_category, 'sub_event'=>$sub_event]);
        }else{
            $allevent = Event::where('category_id', $id)->get();
            foreach ($allevent as $allevent_value) {
               $suball_event .= "<option value='$allevent_value->id'>".$allevent_value->clubone->club_name." VS ".$allevent_value->clubtwo->club_name.", ".$allevent_value->match_start_date."</option>";
            }
            return response()->json(['suball_event'=>$suball_event]);
        }
    }

    public function eventacordingsubcat(Request $request){
        $id = $request->subcat_id;
        $sub_model = Event::where('subcategory_id', $id)->get();
        $subcatevent = "<option value=''>Select SubCategory</option>";
        foreach ($sub_model as $subevent_item) {
            $subcatevent .= "<option value='$subevent_item->id'>".$subevent_item->clubone->club_name." VS ".$subevent_item->clubtwo->club_name.", ".$subevent_item->match_start_date."</option>";
        }

        return $subcatevent;
    }
}
