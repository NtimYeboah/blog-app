@extends('layouts.app')
@section('title', 'All Posts')
@section('content')
    <div class="row m-t-md m-b-md hidden-print">
        @auth
        <div class="col-xs-10 col-md-10 col-xs-offset-1 col-md-offset-1">
            <div class="col-sm-6">
                <h3 class="m-b-xs text-black">All Posts</h3>
                <small>Welcome back, {{ Auth::user()->getFullname() }}</small>
            </div>
        </div>
        @endauth
        @if (count($posts))
        @foreach($posts as $post)
        <div class="col-xs-10 col-xs-offset-1 col-md-10 col-md-offset-1" style="margin-top:2%">
            <section class="panel panel-default">
                <div class="panel-body">
                    <div>
                        <h3>
                        <a href="{{ route('posts.show', ['post' => $post]) }}">{{ $post->title}}</a>
                        </h3>
                    </div> 

                    <div>
                        {{ $post->body }}
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
                        <br/>You haven't no post yet.<br/>
                        <a href="{{route('drafts.create')}}"
                            class="m-t-sm btn btn-primary btn-rounded">
                            Start by writing a draft
                        </a>
                    </p>
                </div>
            </section>
        </div>
        @endif
    </div>
@endsection