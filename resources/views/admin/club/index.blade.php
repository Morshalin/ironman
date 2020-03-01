@extends('layouts.app', ['title' => _lang('Club'), 'modal' => 'lg'])
@section('page.header')
  <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> {{_lang('Club')}}</h1>
          <p>A free and open source Bootstrap 4 admin template</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">{{_lang('Club')}}</a></li>
        </ul>
      </div>
@stop
@section('content')
 <div class="tile">
  <div class="tile-body">
    <div class="row">
        <div class="col-sm-6 offset-3 form-control">
          @if (isset($model))
               <form action="{{route('admin.club.update',$model->id)}}" method="post" id="content_form">
                @method('PUT')
              @else
                <form action="{{route('admin.club.store')}}" method="post" id="content_form">
          @endif
          @csrf
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="club_name">Club Name</label>
                  <input class="form-control" id="club_name" name="club_name" value="{{isset($model)?$model->club_name:""}}" type="text" placeholder="Club Name">
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="logo_image">Club Logo</label>
                  <input class="form-control" id="logo_image" name="logo_image" type="file" placeholder="Club Name">
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
  <div class="row">
        <div class="col-md-12">
          <div class="tile">
            
            <div class="tile-body">
             <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>{{_lang('So.')}}</th>
                    <th>{{_lang('Club Name')}}</th>
                    <th>{{_lang('Club Logo')}}</th>
                    <th>{{_lang('Status')}}</th>
                    <th>{{_lang('action')}}</th>
                  </tr>
                </thead>
                @foreach ($models as $key=> $item) 
                  <tr>
                    <td>{{$key+1 }}</td>
                    <td>{{$item->club_name}}</td>
                    <td><img src="{{asset('uploads')}}/{{$item->logo_image}}" alt="" width="100" height="70"></td>
                    <td>
                      @if ($item->status == 1)
                          <span class="badge badge-success">Active</span>
                          @else
                          <span class="badge badge-danger">Inactive</span>
                      @endif
                    </td>
                    <td>
                      <div class="dropdown">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                         <i class="fa fa-list" aria-hidden="true"></i>
                        </button>
                        <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{route('admin.club.edit', $item->id)}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</a>
                        <span data-id="{{$item->id}} " data-url="{{route('admin.club.destroy',$item->id)}} " id="delete_item"><a href="" class="dropdown-item"><i class="fa fa-trash" aria-hidden="true"></i>Delete</a></span>
                        </div>
                      </div>
                    </td>
                 </tr>
                @endforeach
                <tbody>

                </tbody>
             
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

