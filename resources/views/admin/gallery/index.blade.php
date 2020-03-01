@extends('layouts.app', ['title' => _lang('Gallery'), 'modal' => 'lg'])
@section('page.header')
  <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> {{_lang('Gallery')}}</h1>
          <p>A free and open source Bootstrap 4 admin template</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">{{_lang('Gallery')}}</a></li>
        </ul>
      </div>
@stop
@section('content')
<!-- Basic initialization -->
    <div class="row">
      <div class="col-sm-6 offset-3 form-control mb-2">
        <form action="{{route('admin.gallery.store')}}" method="post" id="content_form">
              <div class="form-group">
                  <label for="">Gallery Image</label>
                  <input type="file" class="form-control" name="gallery_image" id="gallery_image">
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
    <div class="col-md-12">
        <div class="tile">
        <div class="tile-body">
            <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                    <tr>
                    <th>{{_lang('So.')}}</th>
                    <th>{{_lang('Gallery Image')}}</th>
                    <th>{{_lang('Status')}}</th>
                    <th>{{_lang('action')}}</th>
                    </tr>
                </thead>
                @foreach ($models as $key=> $item) 
                <tr>
                    <td>{{$key+1 }}</td>
                    <td><img src="{{asset('uploads')}}/{{$item->gallery_image}}" alt="" height="80" width="200"></td>
                    <td>
                        @if ($item->status == 1)
                            <span class="badge badge-success">Active</span>
                            @else
                            <span class="badge badge-danger">Inactive</span>
                        @endif
                    </td>
                    <td>
                        <span data-id="{{$item->id}} " data-url="{{route('admin.gallery.destroy',$item->id)}} " id="delete_item"><a href="" class="btn btn-danger">Delete</a></span>
                    </td>
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
<script src="{{ asset('js/pages/setting.js') }}"></script>
@endpush