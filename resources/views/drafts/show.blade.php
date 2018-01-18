@extends('layouts.app')
@section('title', 'Draft')
@section('content')
<section class="scrollable padder">
    <div class="row m-t-md m-b-md hidden-print">
        @auth
        <div class="col-xs-10 col-md-10 col-xs-offset-1 col-md-offset-1">
            <div class="col-sm-6">
                <h3 class="m-b-xs text-black">View Draft</h3>
                <small>Welcome back, {{ Auth::user()->getFullname() }}</small>
            </div>
        </div>
        @endauth
        
        @if ($draft)
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
                            <a href="#" class="btn btn-success btn-rounded"><i class="fa fa-save"></i> Publish</a>
                        </div>
                    </article>
                </div>
            </section>
        </div>
        @endif
    </div>
</section>
@endsection