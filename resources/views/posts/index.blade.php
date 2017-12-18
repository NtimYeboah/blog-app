@extends('layouts.app')
@section('title', 'All Posts')
@section('content')
<section class="scrollable padder">
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
        <!-- <div class="col-xs-10 col-xs-offset-1 col-md-10 col-md-offset-1" style="margin-top:2%">
            <section class="panel panel-default">
                <div class="panel-body">
                    <div>
                        <h3>
                            How to setup Laravel application on Digital oceans virtual machines
                        </h3>
                    </div> 

                    <div>
                        HTML5 WYSIWYG (What You See Is What You Get) editors are always high in demand. But there are now so many of them around that it's hard to find the best ones. In this post I'm going to present 10 of the very best jQuery and HTML5 WYSIWYG plugins, saving you time finding the plugin that fits your ...
                    </div>                      
                </div>
                <div class="panel-footer">
                <article class="chat-item" id="chat-form">
                <span class="text-muted m-l-sm">
                  <i class="fa fa-clock-o"></i>
                  Just now
              </span>
              
                  <div class="pull-right">
                  <a href="#" class="btn btn-primary btn-rounded"><i class="fa fa-pencil"></i></a>
                  <a href="#" class="btn btn-success btn-rounded"><i class="fa fa-save"></i></a>
                  </div>
                  
                </article>
                    
                </div>
            </section>
        </div> -->
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
</section>
@endsection