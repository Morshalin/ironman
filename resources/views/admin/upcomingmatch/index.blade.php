@extends('layouts.app', ['title' => _lang('Score'), 'modal' => 'lg'])
@section('page.header')
  <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> {{_lang('Score')}}</h1>
          <p>A free and open source Bootstrap 4 admin template</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">{{_lang('Score')}}</a></li>
        </ul>
      </div>
@stop
@section('content')
 {{-- <div class="tile">
  <div class="tile-body">
    <div class="row">
        <div class="col-sm-8 offset-2 form-control">
            <form action="{{route('admin.upcomingmatch.store')}}" method="post" id="content_form">
            @csrf
            <div class="row">
              <div class="col-sm-6">
                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select data-placeholder="Select One" name="category_id" id="category_id" class="form-control select">
                            <option value="">Select One</option>
                            @foreach ($category as $cat_item)
                                <option value="{{$cat_item->id}}">{{$cat_item->cat_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="subcategory_id">Sub Category</label>
                        <select data-placeholder="Select One" name="subcategory_id" id="subcategory_id" class="form-control select" >
                            <option value="">Select One</option>
                            
                        </select>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="event_id">All Event</label>
                        <select data-placeholder="Select One" name="event_id" id="event_id" class="form-control select">
                            <option value="">Select One</option>
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="row">
              <div class=" col-sm-6 toggle lg">
                <label>
                  <input type="checkbox" name="status" id="status" checked><span class="button-indecator"></span>
                </label>
              </div>
              <div class="col-sm-6 toggle lg">
                <label class="float-right">
                  <button class="btn btn-primary" type="submit">Submit</button>
                </label>
              </div>
            </div>
          </form>
        </div>
      </div>
  </div>
</div> --}}
<!-- Basic initialization -->
  <div class="row">
        <div class="col-md-12">
          <div class="tile">
            
            <div class="tile-body">
             <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>{{_lang('So.')}}</th>
                    <th>{{_lang('Category Name')}}</th>
                    <th>{{_lang('Event Start')}}</th>
                    <th>{{_lang('Event End')}}</th>
                    <th>{{_lang('Club One')}}</th>
                    <th>{{_lang('Club Two')}}</th>
                    <th>{{_lang('Status')}}</th>
                  </tr>
                </thead>
                @foreach ($all_event as $key => $match_item)
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$match_item->category->cat_name}}</td>
                    <td>{{$match_item->event_start_date}}</td>
                    <td>{{$match_item->event_end_date}}</td>

                   <td>{{$match_item->clubone->club_name}} <span><img src="{{asset('uploads')}}/{{$match_item->clubone->logo_image}}" width="80" height="50" alt=""></span> <span class="text-danger font-weight-bold">( {{$match_item->score_one}} )</span></td>

                    <td>{{$match_item->clubtwo->club_name}}<span><img src="{{asset('uploads')}}/{{$match_item->clubtwo->logo_image}}" width="80" height="50" alt=""></span> <span class="text-danger font-weight-bold">( {{$match_item->score_two}} )</span></td>

                    <td>
                      @if ($match_item->status == 1)
                         <span class="badge badge-success" >Active</Span> 
                      @else
                        <span class="badge badge-danger">Inactive</span> 
                      @endif
                 </tr>
              @endforeach
            
               </table>
             </div>
          </div>
      </div>
  </div>
<!-- /basic initialization -->
@stop
@push('scripts')
<script type="text/javascript" src="{{asset('backend/js/plugins/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/js/plugins/dataTables.bootstrap.min.js')}}"></script>
<script src="{{ asset('js/pages/common.js') }}"></script>
<script>
$(document).ready(function(){

    $(document).on('change',"#category_id",function(){
        var cat_id = $(this).val();
        if( cat_id == 0){
          $.ajax({ 
            url:"{{route('admin.eventallsubcategory')}}",
            method:"get",
            dataType:"html",
            data:{cat_id:cat_id},
            success:function(data){
              $("#event_id").html(data);
               $("#event_id").trigger('change');
               $("#subcategory_id").trigger('change');
            }
        });
        }else{ 
        $.ajax({ 
            url:"{{route('admin.eventallsubcategory')}}",
            method:"get",
            dataType:"json",
            data:{cat_id:cat_id},
            success:function(data){
              if (data.sub_category != "") {
                  $("#subcategory_id").html(data.sub_category);
                  $("#subcategory_id").trigger('change');
              }else{
                $("#subcategory_id").html('<option value="" selected >Sub Category Not Found</option>');
                $("#subcategory_id").trigger('change');
               
              }

              if(data.sub_event != ""){
                  $("#event_id").html(data.sub_event);
                  //$("#event_id").trigger('change');
              }else{
                $("#event_id").html('<option value="" selected >Event Not Found</option>');
                //$("#event_id").trigger('change');
              }            
            }
        });
        }
    });

    $(document).on('change',"#subcategory_id",function(){
        var subcat_id = $(this).val();
        if (subcat_id) {
           $.ajax({ 
            url:"{{route('admin.eventacordingsubcat')}}",
            method:"get",
            dataType:"html",
            data:{subcat_id:subcat_id},
            success:function(data){
              $("#event_id").html(data);
            }
        });
        }
       
    });
    

});
</script>
@endpush
