@extends('layouts.app')
@section('title', 'All drafts')
@section('content')
<section class="scrollable padder">
    <div class="row m-t-md m-b-md hidden-print">
        @auth
        <div class="col-xs-10 col-md-10 col-xs-offset-1 col-md-offset-1">
            <div class="col-sm-6">
                <h3 class="m-b-xs text-black">All Drafts</h3>
                <small>Welcome back, {{ Auth::user()->getFullname() }}</small>
            </div>
        </div>
        @endauth
        @if (count($drafts))
        @foreach($drafts as $draft)
        <div class="col-xs-10 col-xs-offset-1 col-md-10 col-md-offset-1" style="margin-top:2%">
            <section class="panel panel-default">
                <div class="panel-body">
                    <div>
                        <h3>
                            <a href="{{ route('drafts.show', ['draft' => $draft]) }}">{{ $draft->title }}</a>
                        </h3>
                    </div> 

                    <div>
                        {{ $draft->body }}
                    </div>                      
                </div>
                <div class="panel-footer">
                    <article class="chat-item" id="chat-form">
                        <span class="text-muted m-l-sm">
                        <i class="fa fa-clock-o"></i>
                        Just now
                        </span>
                
                        <div class="pull-right">
                            <a href="#" class="btn btn-primary btn-rounded"><i class="fa fa-pencil"></i> Edit</a>
                            <button class="btn btn-success btn-rounded"
                                onclick="event.preventDefault();
                                document.getElementById('publish-form').submit();">
                                <i class="fa fa-save"></i> Publish
                            </button>
                            <form id="publish-form" action="{{ route('posts.store', ['draft' => $draft]) }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                            </form>
                        </div>
                    
                    </article>
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
                        <br/>You haven't written any draft yet.<br/>
                        <a href="{{route('drafts.create')}}"
                            class="m-t-sm btn btn-primary btn-rounded">
                            Start writing a draft
                        </a>
                    </p>
                </div>
            </section>
        </div>
        @endif
    </div>
</section>
@endsection