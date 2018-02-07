@extends('layouts.app')
@section('title', 'Write draft')
@section('content')
<section class="scrollable padder">
    <div class="row m-t-md m-b-md hidden-print">
        @auth
        <div class="col-xs-10 col-md-10 col-xs-offset-1 col-md-offset-1">
            <div class="col-sm-6">
                <h3 class="m-b-xs text-black">Add Slide</h3>
                <small>Welcome back, {{ Auth::user()->getFullname() }}</small>
            </div>
        </div>
        @endauth

        <div class="col-xs-10 col-xs-offset-1 col-md-10 col-md-offset-1" style="margin-top:2%">
            <section class="panel panel-default">
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('slides.store') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Slide URL</label>
                                <input class="form-control m-b" type="url" name="url" placeholder="Slide URL" id="slide-url-input"
                                value="{{ old('url', $slide->url) }}" autofocus>
                            </div>
                        </div>    
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Description</label>
                                <textarea class="form-control m-b" name="description" placeholder="Description" id="slide-description-textarea">{{ old('description', $slide->description) }}</textarea>
                            </div>
                        </div>
                        
                        <div class="line line-dashed b-b line-lg pull-in"></div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary btn-rounded pull-right" id="save-slide-btn">
                                    <i class="fa fa-save"></i>  Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
</section>
@endsection
