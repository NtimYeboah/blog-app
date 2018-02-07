@push('additional_styles')
<link rel="stylesheet" href="{{asset('js/summernote/dist/summernote.css')}}" type="text/css"/>
@endpush
@extends('layouts.app')
@section('title', 'Add About')
@section('content')
<section class="scrollable padder">
    <div class="row m-t-md m-b-md hidden-print">
        @auth
        <div class="col-xs-10 col-md-10 col-xs-offset-1 col-md-offset-1">
            <div class="col-sm-6">
                <h3 class="m-b-xs text-black">Add About</h3>
                <small>Welcome back, {{ Auth::user()->getFullname() }}</small>
            </div>
        </div>
        @endauth

        <div class="col-xs-10 col-xs-offset-1 col-md-10 col-md-offset-1" style="margin-top:2%">
            <section class="panel panel-default">
                <div class="panel-body">
                    <form method="POST" action="{{route('about.store')}}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <div class="col-md-6">
                                <label>Full Name</label>
                                <input class="form-control m-b" type="text" name="name" 
                                value="{{old('name', $about->name)}}" placeholder="Full name" id="name">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6">
                                <label>Statement</label>
                                <textarea class="form-control m-b" name="statement">{{old('statement', $about->statement)}}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6">
                                <label>Facebook</label>
                                <input class="form-control m-b" type="url" name="facebook_url" 
                                value="{{old('facebook_url', $about->facebook_url)}}"
                                placeholder="Facebook profile url" id="facebook-url">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6">
                                <label>Twitter</label>
                                <input class="form-control m-b" type="url" name="twitter_url" 
                                value="{{old('twitter_url', $about->twitter_url)}}"
                                placeholder="Twitter profile url" id="twitter-url">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6">
                                <label>LinkedIn</label>
                                <input class="form-control m-b" type="url" name="linkedin_url" 
                                value="{{old('linkedin_url', $about->linkedin_url)}}"
                                placeholder="Linkedin profile url" id="linkedin-url">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6">
                                <label>Medium</label>
                                <input class="form-control m-b" type="url" name="medium_url" 
                                value="{{old('medium_url', $about->medium_url)}}"
                                placeholder="Medium profile url" id="medium-url">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6">
                                <label>CV</label>
                                <input class="form-control m-b" type="url" name="cv_url" 
                                value="{{old('cv_url', $about->cv_url)}}"
                                placeholder="Cv url" id="cv-url">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary btn-rounded pull-right" id="save-draft-btn">
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
@push('additional_scripts')
<script src="{{asset('js/summernote/dist/summernote.min.js')}}"></script>
<script type="text/javascript">
    
</script>
@endpush