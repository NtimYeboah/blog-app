@extends('layouts.master')

@section('content_wrapper')
<section class="vbox">
    <header class="bg-white-only navbar-fixed-top header header-md navbar navbar-fixed-top-xs box-shadow">
      <div class="navbar-header">
        <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html">
          <i class="fa fa-bars"></i>
        </a>
        <a href="/" class="navbar-brand">
          <span class="hidden-nav-xs">NTIM YEBOAH</span>
        </a>
        <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".user">
          <i class="fa fa-cog"></i>
        </a>
      </div>
      <ul class="nav navbar-nav  navbar-right hidden-xs" style="margin-right: 20%">
        <li>
          <a href="#">
            <span class="hidden-nav-xs nav-item-text">Posts</span>
          </a>
        </li>
        <li>
          <a href="#">
            <span class="hidden-nav-xs nav-item-text">Slides</span>
          </a>
        </li>
        <li>
          <a href="#">
            <span class="hidden-nav-xs nav-item-text">About</span>
          </a>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right m-n hidden-xs nav-user user">
      </ul>      
    </header>
   <section class="vbox">
        <section>
            <section class="hbox stretch">
                <section id="content">
                    <section class="hbox stretch">
                        <section class="vbox">
                            @yield('content')
                        </section>
                    </section>
                    <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open"
                       data-target="#nav,html"></a>
                </section>
            </section>
        </section>

    </section> 
@endsection