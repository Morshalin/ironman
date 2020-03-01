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
<!-- Basic initialization -->
  <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">
              <a href="{{ route('admin.news.create') }}" class="btn btn-info"><i class="icon-stack-plus mr-2"></i>{{_lang('create')}}</a>
            </h3>
            <div class="tile-body">
             <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>{{_lang('So.')}}</th>
                    <th>{{_lang('Titale')}}</th>
                    <th>{{_lang('News Category')}}</th>
                    <th>{{_lang('Description')}}</th>
                    <th>{{_lang('Image')}}</th>
                    <th>{{_lang('Status')}}</th>
                    <th>{{_lang('action')}}</th>
                  </tr>
                </thead>
                @foreach ($models as $key=> $item) 
                  <tr>
                    <td>{{$key+1 }}</td>
                    <td>{{$item->title}}</td>
                    <td>
                      {{$item->category->cat_name}} 
                      @if ($item->subcategory_id)   
                        <span class="badge badge-success">{{$item->sub_category->subcat_name}}</span>
                        @else
                        <span class="badge badge-info">No Subcategory</span>
                      @endif
                    </td>
                    <td>{!!textshorten($item->description,150)!!}</td>
                    <td><img src="{{asset('uploads')}}/{{$item->image}}" alt="" width="150" height="80" ></td>
                    <td>
                      @if ($item->status == 1)
                          <span class="badge badge-info">Active</span>
                          @else
                          <span class="badge badge-success">Inactive</span>
                      @endif
                    </td>
                    <td>
                      <div class="dropdown">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                         <i class="fa fa-list" aria-hidden="true"></i>
                        </button>
                        <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{route('admin.news.edit', $item->id)}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</a>
                        <a class="dropdown-item" href="{{route('admin.news.show', $item->id)}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Show</a>
                        <span data-id="{{$item->id}} " data-url="{{route('admin.news.destroy',$item->id)}} " id="delete_item"><a href="" class="dropdown-item"><i class="fa fa-trash" aria-hidden="true"></i>Delete</a></span>
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

