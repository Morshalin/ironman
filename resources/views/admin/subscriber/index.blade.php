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
        <div class="col-md-8 offset-2">
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th>{{_lang('So.')}}</th>
                                <th>{{_lang('Subscriber Email')}}</th>
                                <th>{{_lang('action')}}</th>
                            </tr>
                        </thead>
                        @foreach ($models as $key=> $item) 
                        <tr>
                            <td>{{$key+1 }}</td>
                            <td>{{$item->email}}</td>
                            <td>
                                <span data-id="{{$item->id}} " data-url="{{route('admin.subscriber.destroy',$item->id)}} " id="delete_item"><a href="" class="btn btn-danger btn-sm">Delete</a></span>
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