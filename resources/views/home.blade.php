@extends('layouts.app', ['title' => 'Dahsboard', 'modal' => false])
@section('page.header')
  <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
          <p>A free and open source Bootstrap 4 admin template</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
        </ul>
      </div>
@stop
@section('content')
<!-- Basic initialization -->
  <div class="row">
    <div class="col-sm-6">
      <div class="widget-small primary coloured-icon"><i class="icon fa fa-calendar-o" aria-hidden="true"></i>
        <div class="info">
          <h4>All Event</h4>
          <p><b>{{$all_event}}</b></p>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="widget-small info coloured-icon"><i class="icon fa fa-users fa-3x"></i>
        <div class="info">
          <h4>Subscriber</h4>
          <p><b>{{$all_sub}}</b></p>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-6">
      <div class="widget-small danger coloured-icon"><i class="icon fa fa-newspaper-o" aria-hidden="true"></i>
        <div class="info">
          <h4>Total Latest News</h4>
          <p><b>{{$all_news}}</b></p>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="widget-small warning coloured-icon"><i class="icon fa fa-keyboard-o" aria-hidden="true"></i>
        <div class="info">
          <h4>Total Category</h4>
          <p><b>{{$all_cat}}</b></p>
        </div>
      </div>
    </div>
  </div>
<!-- /basic initialization -->
@stop

