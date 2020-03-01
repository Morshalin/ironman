@extends('layouts.app', ['title' => _lang('Events'), 'modal' => 'lg'])
@section('page.header')
  <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> {{_lang('Events')}}</h1>
          <p>A free and open source Bootstrap 4 admin template</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">{{_lang('Events')}}</a></li>
        </ul>
    </div>
@stop
@section('content')
<!-- Basic initialization -->
      <div class="container">
        <form action="{{route('admin.event.update', $model->id)}}" method="post" id="newform">
          @csrf
          @method('PUT')
    <div class="form-control my-4">
        <div class="row">
            <div class="col-sm-12 text-center my-3"><span class="text-info h3 border border-success p-2">Upcoming
                        Match</span></div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="subcategory_id">Sub Category</label>
                    <select data-placeholder="Select One" name="subcategory_id" id="subcategory_id"
                        class="form-control select selectpicker" data-live-search="true" data-show-subtext="true">
                        <option value="">Select One</option>
                        @foreach ($sub_category as $sub_cat_item)
                            <option {{$model->subcategory_id == $sub_cat_item->id?'selected':''}} value="{{$sub_cat_item->id}}">{{$sub_cat_item->subcat_name}}</option>
                        @endforeach

                    </select>
                </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="studium_id">Stadium Name</label>
                 <select data-placeholder="Select One" name="studium_id" id="studium_id" class="form-control select selectpicker" data-live-search="true" data-show-subtext="true">
                     <option value="">Select One</option>
                     @foreach ($studium as $studium_item)
                        <option {{$model->studium_id==$studium_item->id?"Selected":""}} value="{{$studium_item->id}}">{{$studium_item->studium_name}}</option>
                     @endforeach
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
                  <input type="text" readonly class="form-control" name="title_slug" id="title_slug" value="{{$model->title_slug}}" >
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                  <label for="cover_image">Cover cover_image</label>
                  <input type="file" class="form-control" name="cover_image" id="image">
              </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label for="cover_image_tag">Cover Image Alt</label>
                    <input type="text" class="form-control" value="{{$model->cover_image_tag}}" name="cover_image_tag" id="cover_image_tag">
                </div>
            </div>

            <div class="col-sm-3">
              <div class="form-group">
                  <label for="thumbnail_image">Thumbnail Image</label>
                  <input type="file" class="form-control" name="thumbnail_image" id="thumbnail_image">
              </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label for="thumbnail_image_tag">Thumbnail Image Alt</label>
                    <input type="text" class="form-control" value="{{$model->thumbnail_image_tag}}" name="thumbnail_image_tag" id="thumbnail_image_tag">
                </div>
            </div>

            <div class="col-sm-6">
              <div class="form-group">
                <label for="event_start_date">Event Start Date</label>
                  <input type="text" readonly="" autocomplete="off" class="form-control date" name="event_start_date" id="event_start_date" value="{{$model->event_start_date}}">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                  <label for="event_end_date">Event End Date</label>
                  <input type="text" readonly="" autocomplete="off" class="form-control date" name="event_end_date" id="event_end_date" value="{{$model->event_end_date}}">
              </div>
            </div>

            <div class="col-sm-6">
              <div class="form-group">
                <label for="match_start_date">Match Start Date</label>
                  <input type="text" readonly="" autocomplete="off" class="form-control date" name="match_start_date" id="match_start_date" value="{{$model->match_start_date}}">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                  <label for="match_end_date">Match End Date</label>
                  <input type="text" readonly="" autocomplete="off" class="form-control date" name="match_end_date" id="match_end_date" value="{{$model->match_end_date}}">
              </div>
            </div>
            
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="video_link">Live Stream Title</label>
                    <input type="text" class="form-control" name="video_link" value="{{$model->video_link}}" id="video_link">
                </div>
            </div>

            <div class="col-sm-12">
              <div class="form-group">
                  <label for="detalis_link">Detalis Link</label>
                  <input type="text" class="form-control" name="detalis_link" id="detalis_link" value="{{$model->detalis_link}}">
              </div>
            </div>

            <div class="col-sm-12">
              <div class="form-group">
              <textarea class="form-control" name="description" id="description" rows="2">{{$model->description}}</textarea>
              </div>
            </div>

             <div class="col-sm-12">
                    <div class="form-group">
                        <label for="schema">Schema Org</label>
                        <textarea class="form-control" name="schema" id="schema" rows="4" placeholder="Schema Code For SEO">{{$model->schema}}</textarea>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="seo_title">SEO Title</label>
                        <input type="text" class="form-control" value="{{ $model->seo_title}}" name="seo_title" id="seo_title">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="event_type">Event Type</label>
                        <input type="text" class="form-control" value="{{$model->event_type}}" name="event_type" id="event_type">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="city_name">City Name</label>
                        <input type="text" class="form-control" value="{{$model->city_name}}" name="city_name" id="city_name">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="country_name">Country Name</label>
                        <input type="text" class="form-control" value="{{$model->country_name}}" name="country_name" id="country_name">
                    </div>
                </div>
            
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="meta_keyword">Meta Keyword</label>
                    <input class="form-control" data-role="tagsinput" id="meta_keyword" name="meta_keyword" type="text" value="{{$model->meta_keyword}}">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="meta_description">Meta Description</label>
                    <textarea class="form-control" name="meta_description" id="meta_description" rows="2" placeholder="Meta Description">{{$model->meta_description}}</textarea>
                </div>
            </div>
        </div>
    </div>    
    <div class="row">
        <div class=" col-sm-6 toggle lg">
            <label>
                <input type="checkbox" checked name="status" id="status"><span class="button-indecator"></span>
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
<!-- /basic initialization -->
@stop
@push('scripts')
<script type="text/javascript" src="{{asset('backend/js/plugins/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/js/plugins/dataTables.bootstrap.min.js')}}"></script>
<script src="{{ asset('js/pages/common.js') }}"></script>

<script>
    $(document).ready(function(){
        $(document).on("change", "#match_condition", function(){
            var condition = $(this).val();
           if(condition == 1){
               $("#single_match").show(1000);
               $("#double_match").hide(1000);
           }else if(condition == 2){
                $("#single_match").hide(1000);
               $("#double_match").show(1000);
           }
        });
    });
</script>

<script>
    var editor = CKEDITOR.replace('description');
    var _formValidation = function () {
        if ($('#newform').length > 0) {
            $('#newform').parsley().on('field:validated', function () {
                var ok = $('.parsley-error').length === 0;
                $('.bs-callout-info').toggleClass('hidden', !ok);
                $('.bs-callout-warning').toggleClass('hidden', ok);
            });
        }

        $('#newform').on('submit', function (e) {
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
                success: function (data) {
                    if (data.status == 'danger') {
                        toastr.error(data.message);

                    } else {
                        toastr.success(data.message);
                        $('#submit').show();
                        $('#submiting').hide();
                        $('#newform')[0].reset();
                        if (data.goto) {
                            setTimeout(function () {

                                window.location.href = data.goto;
                            }, 2500);
                        }

                        if (data.window) {
                            $('#newform')[0].reset();
                            window.open(data.window, "_blank",
                                "toolbar=yes,scrollbars=yes,resizable=yes,top=auto,left=auto,width=700,height=400"
                                );
                            setTimeout(function () {
                                window.location.href = '';
                            }, 1000);
                        }

                        if (data.load) {
                            setTimeout(function () {

                                window.location.href = "";
                            }, 2500);
                        }
                    }
                },
                error: function (data) {
                    var jsonValue = $.parseJSON(data.responseText);
                    const errors = jsonValue.errors;
                    if (errors) {
                        var i = 0;
                        $.each(errors, function (key, value) {
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

    $(document).ready(function () {

        $(document).on('change', "#category_id", function () {
            var cat_id = $(this).val();
            $.ajax({
                url: "{{route('admin.allsubcategory')}}",
                method: "get",
                dataType: "html",
                data: {
                    cat_id: cat_id
                },
                success: function (data) {
                    $("#subcategory_id").html(data);
                    $("#subcategory_id").trigger("change");
                }
            });
        });

        $(document).on('keyup change', "#title", function () {
            var cat_id = $(this).val();
            $('#title_slug').val(cat_id);
        });

    });

</script>
@endpush