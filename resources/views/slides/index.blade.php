@extends('layouts.app')
@section('title', 'All Slides')
@section('content')
    <div class="row m-t-md m-b-md hidden-print">
        @auth
        <div class="col-xs-10 col-md-10 col-xs-offset-1 col-md-offset-1">
            <div class="col-sm-6">
                <h3 class="m-b-xs text-black">All Slides</h3>
                <small>Welcome back, {{ Auth::user()->getFullname() }}</small>
            </div>
        </div>
        @endauth
        @if (count($slides))
        @foreach($slides as $slide)
        <div class="col-xs-10 col-xs-offset-1 col-md-10 col-md-offset-1" style="margin-top:2%">
            <section class="panel panel-default">
                <div class="panel-body">
                    <div>
                        <h3>
                        <a href="{{ $slide->url }}" target="_blank" style="text-decoration:underline">{{ $slide->url}}</a>
                        </h3>
                    </div> 
                    <div>
                        {{ $slide->description }}
                    </div>                       
                </div>
            </section>
        </div>
        @endforeach
        @else
        <div class="col-xs-10 col-xs-offset-1 col-md-10 col-md-offset-1" style="margin-top:2%">
            <section class="panel panel-default hidden-print">
                <div class="row wrapper">
                    <p class="m-t-md text-center" style="font-size:18px">
                        <i class="m-b-sm i i-pencil icon fa-4x"></i>
                        <br/>Here is empty at the moment<br/>
                    </p>
                </div>
            </section>
        </div>
        @endif
    </div>
@endsection