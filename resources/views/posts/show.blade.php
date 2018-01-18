@extends('layouts.app')
@section('title', 'Post')
@section('content')
<section class="scrollable padder">
    <div class="row m-t-md m-b-md hidden-print">
        <div class="col-xs-10 col-xs-offset-1 col-md-10 col-md-offset-1" style="margin-top:2%">
            <section class="panel panel-default">
                <div class="panel-body">
                    <div>
                        <h3>
                            {{ $post->title }}</a>
                        </h3>
                    </div> 

                    <div>
                        {{ $post->body }}
                    </div>                      
                </div>
            </section>
        </div>
    </div>
</section>
@endsection