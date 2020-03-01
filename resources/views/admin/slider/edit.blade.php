@extends('layouts.app', ['title' => _lang('Slider Edit'), 'modal' => 'lg'])
@section('page.header')
  <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> {{_lang('Slider Edit')}}</h1>
          <p>A free and open source Bootstrap 4 admin template</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">{{_lang('Slider Edit')}}</a></li>
        </ul>
      </div>
@stop
@section('content')
 <div class="tile">
  <div class="tile-body">
    <form action="{{route('admin.slider.update',$model->id)}}" method="post" id="content_form">
      @csrf
      @method('PUT')
        <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="position">Slider Position</label>
            <select name="position" id="position" data-placeholder="Select One" class="form-control select">
              @if ($model->position == 1)
                <option value="">Select One</option>
                <option selected='Selected' value="1">Slider Left</option>
                <option value="2">Slider Right</option>\
              @else
                <option value="">Select One</option>
                <option value="1">Slider Left</option>
                <option selected='Selected' value="2">Slider Right</option>
              @endif
              
            </select>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="title">Slider Title</label>
           <input class="form-control" id="title" name="title" value="{{$model->title}}" type="text" placeholder="Slider Title">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4">
          <div class="form-group">
            <label for="sub_title">Slider Sub-Title</label>
            <input class="form-control" id="sub_title" value="{{$model->sub_title}}" name="sub_title" type="text">
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label for="image_one">Image One</label>
            <input class="form-control"  id="image_one" name="image_one" type="file">
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label for="image_two">Image Two</label>
            <input class="form-control" id="image_two" name="image_two" type="file">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="description" rows="2" placeholder="Description">{{$model->description}}</textarea>
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
<!-- /basic initialization -->
@stop
@push('scripts')
<script src="{{ asset('js/pages/user.js') }}"></script>
@endpush

