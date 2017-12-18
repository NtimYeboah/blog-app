<!DOCTYPE html>
<html lang="en" class=" ">
<head>  
    <meta charset="utf-8" />
    <title>Ntim Yeboah | Login</title>
    <meta name="description" content="ntim, yeboah, php, laravel, framework, blog, tutorials" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{asset('css/font.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{asset('css/icon.css')}}" type="text/css"/>
    <!--[if lt IE 9]>
    <script src="js/ie/html5shiv.js"></script>
    <script src="js/ie/respond.min.js"></script>
    <script src="js/ie/excanvas.js"></script>
  <![endif]-->
</head>
<body>
    <section id="content" class="m-t-lg wrapper-md animated fadeInUp">    
        <div class="container aside-xl">
            <a class="navbar-brand block">NTIM YEBOAH</a>
            <section class="m-b-lg">
                <form method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                    <div class="list-group">
                        <div class="list-group-item">
                            <input type="email" placeholder="Email" class="form-control no-border" 
                            name="email" value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="list-group-item">
                            <input type="password" placeholder="Password" class="form-control no-border" 
                            name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <button type="submit" class="btn btn-lg btn-primary btn-block">Log in</button>
                </form>
            </section>
        </div>
    </section>
    <!-- footer -->
    <footer id="footer">
        <div class="text-center padder">
            <p>
                <small>Ntim Yeboah blog<br>&copy; {{ date('Y') }}</small>
            </p>
        </div>
    </footer>
</body>
</html>