@push('additional_styles')
<link rel="stylesheet" href="{{asset('js/summernote/dist/summernote.css')}}" type="text/css"/>
@endpush
@extends('layouts.app')
@section('title', 'Write draft')
@section('content')
<section class="scrollable padder">
    <div class="row m-t-md m-b-md hidden-print">
        @auth
        <div class="col-xs-10 col-md-10 col-xs-offset-1 col-md-offset-1">
            <div class="col-sm-6">
                <h3 class="m-b-xs text-black">Write Draft</h3>
                <small>Welcome back, {{ Auth::user()->getFullname() }}</small>
            </div>
        </div>
        @endauth

        <div class="col-xs-10 col-xs-offset-1 col-md-10 col-md-offset-1" style="margin-top:2%">
            <section class="panel panel-default">
                <div class="panel-body">
                    <form class="form-horizontal">
                            {{ csrf_field() }}
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Title</label>
                                <input class="form-control m-b" type="text" placeholder="Draft title" id="title">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label>Body</label>
                                <div id="summernote"></div>
                            </div>
                        </div>
                        
                        <div class="line line-dashed b-b line-lg pull-in"></div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="button" class="btn btn-primary btn-rounded pull-right" id="save-draft-btn">
                                    <i class="fa fa-save"></i>  Save draft
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
    (function($) {
        var selectors = {
            titleInput: '#title',
            summernote: '#summernote',
            saveDraftBtn: '#save-draft-btn'
        }

        var saveDraft = function() {
            var payload = {
                title: $(selectors.titleInput).val(),
                body: $(selectors.summernote).summernote('code')
            }
            
            $.ajax({
                url: '/drafts/store',
                data: payload,
                type: 'POST',
                headers: {
                    'X-CSRF-Token': $('input[name="_token"]').val()
                },
            })
            .success(function(data) {
                if (data.status === 201) {
                    location.href = '/posts';
                }
            })
            .fail(function(error) {
                // Display error message
            }); 
        }

        var eventListeners = function() {
            $(document.body).on('click', selectors.saveDraftBtn, saveDraft);
        }

        $(document).ready(function() {
            $(selectors.summernote).summernote();
            eventListeners();
        })

    }(window.jQuery));
</script>
@endpush