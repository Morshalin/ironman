@extends('layouts.app', ['title' => _lang('Latest News'), 'modal' => 'lg'])
@section('page.header')
  <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> {{_lang('Latest News')}}</h1>
          <p>A free and open source Bootstrap 4 admin template</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">{{_lang('Latest News')}}</a></li>
        </ul>
      </div>
@stop
@section('content')
 <div class="tile">
  <div class="tile-body">
    <form action="{{route('admin.news.update',$model->id)}}" method="post" id="newform">
          @csrf
          @method('PUT')
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="category_id">Category</label>
                 <select data-placeholder="Select One" name="category_id" id="category_id" class="form-control select">
                     <option value="">Select One</option>
                     <option value="0">Change Option</option>
                     @foreach ($models as $cat_item)
                        <option {{$model->category_id == $cat_item->id?"Selected":""}} value="{{$cat_item->id}}">{{$cat_item->cat_name}}</option>
                     @endforeach
                 </select>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="subcategory_id">Sub Category</label>
                 <select data-placeholder="Select One" name="subcategory_id" id="subcategory_id" class="form-control select">
                     <option value="">Select One</option>
                     <option selected value="{{isset($model->id)?$model->id:''}}">{{isset($model->id)?$model->sub_category->subcat_name:''}}</option>
                     
                 </select>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="title">Title</label>
                  <input type="text" class="form-control" name="title" id="title" value="{{$model->title}}">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="title_slug">Title Slug</label>
                  <input type="text" class="form-control" name="title_slug" id="title_slug" value="{{$model->title_slug}}">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                  <label for="image">Image</label>
                  <input type="file" class="form-control" name="image" id="image">
              </div>
            </div>

            <div class="col-sm-6">
              <div class="form-group">
                  <label for="image_alt">Image Alt</label>
                  <input type="text" value="{{$model->image_alt}}" class="form-control" name="image_alt" id="image_alt">
              </div>
            </div> 
            
            <div class="col-sm-12">
              <div class="form-group">
                <textarea class="form-control" name="description" id="description" rows="2">{{$model->description}}</textarea>
              </div>
            </div>

            <div class="col-sm-12">
              <div class="form-group">
                  <label for="seo_title">SEO Title</label>
                  <input type="text" value="{{$model->seo_title}}" class="form-control" name="seo_title" id="seo_title">
              </div>
            </div>

            <div class="col-sm-6">
              <div class="form-group">
                  <label for="date">News Date</label>
                  <input type="text" readonly="" autocomplete="off" class="form-control date" name="date" id="date" value="{{$model->date}}">
              </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="meta_keyword">Meta Keyword</label>
                    <input class="form-control" data-role="tagsinput" id="meta_keyword" value="{{$model->meta_keyword}}" name="meta_keyword" type="text">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="meta_description">Meta Description</label>
                    <textarea class="form-control" name="meta_description" id="meta_description" rows="2" placeholder="Meta Description">{{$model->meta_description}}</textarea>
                </div>
            </div>
            </div>
            <div class="row">
                <div class=" col-sm-6 toggle lg">
                    <label>
                        <input type="checkbox" name="status" id="status"><span class="button-indecator"></span>
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
var editor = CKEDITOR.replace( 'description' );
var _formValidation = function() {
    if ($('#newform').length > 0) {
        $('#newform').parsley().on('field:validated', function() {
            var ok = $('.parsley-error').length === 0;
            $('.bs-callout-info').toggleClass('hidden', !ok);
            $('.bs-callout-warning').toggleClass('hidden', ok);
        });
    }

    $('#newform').on('submit', function(e) {
        e.preventDefault();
        $('#submit').hide();
        $('#submiting').show();
        $(".ajax_error").remove();
        var submit_url = $('#newform').attr('action');
        //Start Ajax
        var formData = new FormData($("#newform")[0]);
        formData.append('description', editor.getData());
        $.ajax({
            url: submit_url,
            type: 'POST',
            data: formData,
            contentType: false, // The content type used when sending data to the server.
            cache: false, // To unable request pages to be cached
            processData: false,
            dataType: 'JSON',
            success: function(data) {
                if (data.status == 'danger') {
                    toastr.error(data.message);

                } else {
                    toastr.success(data.message);
                    $('#submit').show();
                    $('#submiting').hide();
                    $('#newform')[0].reset();
                    if (data.goto) {
                        setTimeout(function() {

                            window.location.href = data.goto;
                        }, 2500);
                    }

                    if (data.window) {
                        $('#newform')[0].reset();
                        window.open(data.window, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=auto,left=auto,width=700,height=400");
                        setTimeout(function() {
                            window.location.href = '';
                        }, 1000);
                    }

                    if (data.load) {
                        setTimeout(function() {

                            window.location.href = "";
                        }, 2500);
                    }
                }
            },
            error: function(data) {
                var jsonValue = $.parseJSON(data.responseText);
                const errors = jsonValue.errors;
                if (errors) {
                    var i = 0;
                    $.each(errors, function(key, value) {
                        const first_item = Object.keys(errors)[i]
                        const message = errors[first_item][0];
                        if ($('#' + first_item).length > 0) {
                            $('#' + first_item).parsley().removeError('required', {
                                updateClass: true
                            });
                            $('#' + first_item).parsley().addError('required', {
                                message: value,
                                updateClass: true
                            });
                        }
                        // $('#' + first_item).after('<div class="ajax_error" style="color:red">' + value + '</div');
                        toastr.error(value);
                        i++;
                    });
                } else {
                    toastr.warning(jsonValue.message);

                }
                _componentSelect2Normal();
                $('#submit').show();
                $('#submiting').hide();
            }
        });
    });
};

$(document).ready(function(){

    $(document).on('change click',"#category_id",function(){
        var cat_id = $(this).val();
        $.ajax({ 
            url:"{{route('admin.allsubcategory')}}",
            method:"get",
            dataType:"html",
            data:{cat_id:cat_id},
            success:function(data){
                $("#subcategory_id").html(data);
                $("#subcategory_id").trigger('change');
            }
        });
    });
    
    $(document).on('keyup change',"#title",function(){
        var cat_id = $(this).val();
        $('#title_slug').val(cat_id);
    });

});
</script>
@endpush

