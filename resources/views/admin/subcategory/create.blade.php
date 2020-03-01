@extends('layouts.app', ['title' => _lang('Category Create'), 'modal' => 'lg'])
@section('page.header')
  <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> {{_lang('Category Create')}}</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">{{_lang('Category Create')}}</a></li>
        </ul>
      </div>
@stop
@section('content')
 <div class="tile">
  <div class="tile-body">
  <form action="{{route('admin.subcategory.store')}}" method="post" id="content_form">
    @csrf
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="cat_name">Category Name</label>
            <select name="category_id" id="category_id" data-placeholder="Select One" class="form-control select">
              <option value="">Select One</option>
              @foreach ($models as $item)   
                <option value="{{$item->id}}">{{$item->cat_name}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="subcat_name">Sub Category Name</label>
            <input class="form-control" id="subcat_name" name="subcat_name" type="text" placeholder="Sub-Category Name">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4">
          <div class="form-group">
            <label for="subcat_slug_name">Sub-Category Slug</label>
            <input class="form-control" readonly id="subcat_slug_name" name="subcat_slug_name" type="text">
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label for="banner_image">Banner Image</label>
            <input class="form-control" readonly id="banner_image" name="banner_image" type="file">
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label for="meta_keyword">Meta Keyword</label>
            <input class="form-control" data-role="tagsinput" id="meta_keyword" name="meta_keyword" type="text">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <div class="form-group">
            <label for="meta_description">Meta Description</label>
            <textarea class="form-control" name="meta_description" id="meta_description" rows="2" placeholder="Meta Description"></textarea>
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
<script>
  $(document).ready(function(){
    $(document).on('keyup','#subcat_name',function(){
      var cat_slug = $(this).val();
      $('#subcat_slug_name').val(cat_slug);
    });
  });
</script>
@endpush

