<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Free and simple app for build your resume.">
        <meta name="author" content="Milan Brčkalo">
        <title>CVator</title>
    
        {!! Html::style('css/bootstrap.css') !!}
        {!! Html::style('css/style.css') !!}  
    </head>
    <body id="app-layout">
        <nav class="navbar navbar-inverse navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="{{ url('/') }}"><img class="navbar-brand" src="{{ url('img/logo.png') }}" alt="Logo"></a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left -->
                    <ul class="nav navbar-nav">
                        @if (Auth::guest())
                        
                        @else
                            <li><a href="{{ url('/dashboard') }}"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
                        @endif
                    </ul>
                    <!-- Right -->
                    <ul class="nav navbar-nav navbar-right">
                        @if (Auth::guest())

                        @else
                            <li><a href="{{ url('/dashboard') }}">{{ Auth::user()->full_name }} </a></li>
                            <li><a href="{{ url('/logout') }}"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')

        {!! Html::script('js/jquery.js') !!}
        {!! Html::script('js/bootstrap.js') !!}
    </body>
</html>
