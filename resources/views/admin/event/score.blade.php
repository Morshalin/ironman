{{-- {{dd($club->clubone_id)}} --}}
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
 <div class="tile">
  <div class="tile-body">
    <div class="row">
        <div class="col-sm-6 offset-3 form-control">
            <form action="{{route('admin.scoreupdate',$club->id)}}" method="post" id="content_form">
            @csrf
            <div class="row">
              <input type="hidden" value="{{$club->id}}" id="row_id">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="club_name">Club Name</label>
                  <select data-placeholder="Select One" class="form-control select" name="club_name" id="club_name">
                    <option value="">Select One</option>
                    <option value="{{$club->clubone->id}}">{{$club->clubone->club_name}}</option>
                    <option value="{{$club->clubtwo->id}}">{{$club->clubtwo->club_name}}</option>
                  </select>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="score">Score</label>
                  <input class="form-control" id="score" name="score" type="text" placeholder="Score" value="">
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
</div>
<!-- Basic initialization -->
 
<!-- /basic initialization -->
@stop
@push('scripts')
<script type="text/javascript" src="{{asset('backend/js/plugins/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/js/plugins/dataTables.bootstrap.min.js')}}"></script>
<script src="{{ asset('js/pages/common.js') }}"></script>
<script>
    $(document).ready(function(){
        $(document).on("change","#club_name",function(){
            var club_id = $(this).val();
            var row_id = $("#row_id").val();
            console.log(club_id);
            $.ajax({
                url:"{{route('admin.totalscore')}}",
                method:'get',
                data:{id:club_id,row_id:row_id},
                dataType:'text',
                success:function(data){
                    $("#score").val(data);
                }
            });
        })
    });
</script>
@endpush

