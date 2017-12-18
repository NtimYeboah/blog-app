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
      <ul class="nav navbar-nav  navbar-right hidden-xs">
        @auth
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              {{ Auth::user()->getFullName() }} <b class="caret"></b>
            </a>
            <ul class="dropdown-menu animated fadeInRight">
              @if (! Route::is('drafts.index'))  
              <li>
                <a href="{{ route('drafts.index') }}">
                  <span class="hidden-nav-xs">All drafts</span>
                </a>
              </li>
              @endif
              @if (! Route::is('drafts.create'))
              <li>
                <a href="{{ route('drafts.create') }}">
                  <span class="hidden-nav-xs">Create drafts</span>
                </a>
              </li>
              @endif
              <li class="divider"></li>         
              <li>
                <span class="arrow top"></span>
                <a href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
                </form>
              </li>                          
            </ul>
          </li>
          @endauth
      </ul>
      <ul class="nav navbar-nav  navbar-right hidden-xs" style="margin-right:{{ Auth::user() ? '0' : '10%'}}">
        <li>
          <a href="{{route('posts.index')}}">
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
    </header>
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
@endsection