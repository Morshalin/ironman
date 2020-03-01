@extends('layouts.app', ['title' => _lang('Event Manage'), 'modal' => 'lg'])
@section('page.header')
  <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> {{_lang('Event Manage')}}</h1>
          <p>A free and open source Bootstrap 4 admin template</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">{{_lang('Event Manage')}}</a></li>
        </ul>
      </div>
@stop
@section('content')
<!-- Basic initialization -->
  <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">
              <a href="{{ route('admin.event.create') }}" class="btn btn-info"><i class="icon-stack-plus mr-2"></i>{{_lang('create')}}</a>
            </h3>
            <div class="tile-body">
             <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr class="text-center">
                    <th>{{_lang('So.')}}</th>
                    <th>{{_lang('Event Name')}}</th>
                    <th>{{_lang('Category Name')}}</th>
                    <th>{{_lang('Studium Name')}}</th>
                    <th>{{_lang('Status')}}</th>
                    <th>{{_lang('action')}}</th>
                  </tr>
                </thead>
                @foreach ($models as $key=> $item) 
                  <tr class="text-center">
                    <td>{{$key+1 }}</td>
                    <td>{{$item->title}}</td>
                    <td>{{$item->subcategory->subcat_name}}</td>
                    <td>{{$item->studium->studium_name}}</td>

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
                        <a class="dropdown-item" href="{{route('admin.event.edit', $item->id)}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</a>
                        <a class="dropdown-item" href="{{route('admin.event.show', $item->id)}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Show</a>
                          @if ($item->match_condition == 2)    
                          <a class="dropdown-item" href="{{route('admin.score.add', $item->id)}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Add Score</a>
                          @endif

                        <span data-id="{{$item->id}} " data-url="{{route('admin.event.destroy',$item->id)}} " id="delete_item"><a href="" class="dropdown-item"><i class="fa fa-trash" aria-hidden="true"></i>Delete</a></span>
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