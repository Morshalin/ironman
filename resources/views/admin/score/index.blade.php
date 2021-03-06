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
                    <th>{{_lang('Score')}}</th>
                    <th>{{_lang('Score')}}</th>
                    <th>{{_lang('Status')}}</th>
                    <th>{{_lang('action')}}</th>
                  </tr>
                </thead>
                @foreach ($models as $key=> $item) 
                  <tr>
                    <td>{{$key+1 }}</td>
                    <td>{{$item->club->club_name}}</td>
                    <td><img src="{{asset('uploads')}}/{{$item->club->logo_image}}" alt="" width="100" height="70"></td>
                    <td>{{$item->score}}</td>
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
                        <a class="dropdown-item" href="{{route('admin.score.edit', $item->id)}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</a>
                        <span data-id="{{$item->id}} " data-url="{{route('admin.score.destroy',$item->id)}} " id="delete_item"><a href="" class="dropdown-item"><i class="fa fa-trash" aria-hidden="true"></i>Delete</a></span>
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

