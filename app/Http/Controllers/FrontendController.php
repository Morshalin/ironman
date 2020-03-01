<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Subcategory;
use App\Slider;
use App\Gallery;
use App\About;
use App\Subsicber;
use App\Contact;
use App\Newslatest;
use Carbon\Carbon;
use App\Event;
use App\Upcomingmatch;

class FrontendController extends Controller{

    public function index(){
    /* =================Start header section  ====================*/
        $all_category = Category::with('sub_category')->get();
    /* =====================End header section  ===================*/
        $slider_video = Slider::first();
        $gallery_image = Gallery::orderBy('id','desc')->take(6)->get();
        $about_us = About::first();
        $news_latest = Newslatest::where('status',0)->orderBy('id','desc')->get();

        $mydate = Carbon::now();
        $today = explode(" ",$mydate);
        $todayDate = $today[0];
        $upcoming_match = Event::where('status',1)->where('match_start_date', '>=', $todayDate)->orderBy('match_start_date','asc')->paginate(20);
        $alternrt_match = Event::where('status',1)->orderBy('id','desc')->take(15)->get();

        return view('ironMan.index',compact('gallery_image','news_latest','all_category','slider_video','about_us','upcoming_match','alternrt_match'));
    }
    

    public function accrodingCategory($slug){

    /* =================Start header section  ====================*/
        $all_category = Category::with('sub_category')->get();
    /* =====================End header section  ===================*/
        $banner_image = Category::where('cat_slug_name',$slug)->first();
      
        
        $news_latest = Newslatest::where('status',1)->where('status',0)->where('category_id',$banner_image->id)->orderBy('id','desc')->take(2)->get();
        $random_latest = Newslatest::where('status',1)->where('category_id',$banner_image->id)->get();
        $banner_news = Newslatest::where('status',1)->where('category_id',$banner_image->id)->orderBy('id','desc')->first();
        $event = Event::where('status',1)->where('category_id',$banner_image->id)->orderBy('id','desc')->take(10)->get();

        $mydate = Carbon::now();
        $today = explode(" ",$mydate);
        $todayDate = $today[0];
        $upcoming_match = Event::where('status',1)->where('category_id',$banner_image->id)->where('event_start_date', '<=', $todayDate)->where('event_end_date', '>=', $todayDate)->orderBy('id','desc')->take(1)->first();
        //dd($upcoming_match);
        return view('ironMan.category',compact('all_category','banner_image','news_latest','banner_news','event','upcoming_match','random_latest'));
    }

    public function accrodingSubategory($slug){

    /* =================Start header section  ====================*/
        $all_category = Category::with('sub_category')->get();
    /* =====================End header section  ===================*/
        $banner_image = Subcategory::where('subcat_slug_name',$slug)->first();
        $news_latest = Newslatest::where('status',1)->where('subcategory_id',$banner_image->id)->orderBy('id','desc')->get();
        
        $mydate = Carbon::now();
        $today = explode(" ",$mydate);
        $todayDate = $today[0];
        $upcoming_match = Event::where('status',1)->where('match_start_date', '>=', $todayDate)->where('subcategory_id',$banner_image->id)->orderBy('match_start_date','asc')->paginate(6);
        $alternrt_match = Event::orderBy('id','desc')->paginate(6);

        $video_section = Event::where('status',1)->where('subcategory_id', $banner_image->id)->where('event_start_date','>=', $todayDate)->orderBy('event_start_date','asc')->take(1)->first();
        
        $video_section_alt = Event::where('status',1)->inRandomOrder()->take(1)->first();
        $our_event = Event::where('status',1)->where('subcategory_id', $banner_image->id)->where('event_start_date','>=', $todayDate)->orderBy('match_start_date','asc')->paginate(9);
        //dd($video_section_alt);
        return view('ironMan.subcategory',compact('all_category','banner_image','news_latest','upcoming_match','alternrt_match','video_section','our_event','video_section_alt'));
    }

    public function subscribe(Request $request){
        
        $data = $request->validate([
            'email'=>'required|max:255',
        ]);
        $check_email = "";
        $validation = Subsicber::where('email',$request->email)->get();
        foreach ($validation as  $value) {
             $check_email .= $value->email;
        }
        //dd($check_email);
        if($check_email == $request->email){
             return response()->json(['success' => false, 'status' => 'danger', 'message' => _lang('Email Address already Exits.')]);
        }else{
            $models = new Subsicber();
            $models->create($data);
            return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('subscribe Successfuly'), 'goto' => url('/')]);
        }
        
    }

    public function newsdetails($slug){
        /* =================Start header section  ====================*/
        $all_category = Category::with('sub_category')->get();
    /* =====================End header section  ===================*/
        $news_detalis = Newslatest::where('title_slug',$slug)->first();
        return view('ironMan.news_detalis', compact('all_category','news_detalis'));
    }

    public function dmca(){
         /* =================Start header section  ====================*/
        $all_category = Category::with('sub_category')->get();
    /* =====================End header section  ===================*/

        return view('ironMan.dmca',compact('all_category'));
    }

    public function contact(){
    /* =================Start header section  ====================*/
        $all_category = Category::with('sub_category')->get();
    /* =====================End header section  ===================*/
        return view('ironMan.contact',compact('all_category'));
    }

    public function contactus(Request $request){
        $data = $request->validate([
            'name'=>'required',
            'email'=>'required',
            'number'=>'required',
            'subject'=>'required',
            'message'=>'required|max:400',
        ]);
        $data['status']=0;
        $model = new Contact();
        $model->create($data);
        return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Message Send Successfuly'), 'goto' => route('contact')]);
    }

    public function eventdetalis($slug){
        /* =================Start header section  ====================*/
        $all_category = Category::with('sub_category')->get();
    /* =====================End header section  ===================*/
        $eventdetalis = Event::where('title_slug',$slug)->first();
        return view('ironMan.eventdetalis', compact('all_category','eventdetalis'));
    }


    public function live($id){
        $live_stream = Event::findOrFail($id);
        return view('ironMan.live_stream',compact('live_stream'));
    }
}
