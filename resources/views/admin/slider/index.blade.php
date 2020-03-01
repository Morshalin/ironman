@extends('layouts.app', ['title' => _lang('Slider'), 'modal' => 'lg'])
@section('page.header')
  <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> {{_lang('Slider')}}</h1>
          <p>A free and open source Bootstrap 4 admin template</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">{{_lang('Slider')}}</a></li>
        </ul>
      </div>
@stop
@section('content')
<!-- Basic initialization -->
  <div class="row">
    <div class="col-sm-6 offset-3 form-control mb-2">
      @if ($models)
        <form action="{{route('admin.slider.update', $models->id)}}" method="post" id="content_form">
          @method('PUT')
          @else
          <form action="{{route('admin.slider.store')}}" method="post" id="content_form">
      @endif
              <div class="form-group">
                  <label for="">Slider Video</label>
                  <input type="text" class="form-control" name="image_one" id="image_one">
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
  <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">
              {{-- <a href="{{ route('admin.slider.create') }}" class="btn btn-info"><i class="icon-stack-plus mr-2"></i>{{_lang('create')}}</a> --}}
            </h3>
            <div class="tile-body">
             <div id="rs-slider" class="rs-slider home-slider slider-navigation">
                <video autoplay="" playsinline="" loop="" muted="" width="100%">
                    <source src="{{$models?$models->image_one:''}}" type="video/mp4">

                    Sorry, your browser doesn't support embedded videos.
                </video>
            </div>
            </div>
          </div>
      </div>
  </div>
<!-- /basic initialization -->
@stop
@push('scripts')
<script type="text/javascript" src="{{asset('backend/js/plugins/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/js/plugins/dataTables.bootstrap.min.js')}}"></script>
<script src="{{ asset('js/pages/setting.js') }}"></script>
@endpush

