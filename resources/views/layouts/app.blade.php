<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <!-- JQuery -->
    <script
            src="https://code.jquery.com/jquery-3.1.1.min.js"
    			  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
    			  crossorigin="anonymous"></script>
    <script
            src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
            integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
            crossorigin="anonymous"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <!-- <li><a href="{{ url('/login') }}">Login</a></li> -->
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <!-- <li><a href="{{ url('/register') }}">Register New Admin</a></li> -->
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="post" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="row">
              <div class="col-md-2">
                <div class="panel panel-default">
                  <!-- Default panel contents -->
                  <div class="panel-heading">Statistic</div>
                  <!-- <div class="panel-body">
                  </div> -->

                  <!-- List group -->
                  <div class="list-group">
                      <a href={{url('/users')}} class="list-group-item {{isset($currentPage)&&$currentPage === 'all'?'active':''}}">
                          <span class="badge">{{count($yogaUsers)}}</span>
                          All Users
                      </a>
                      <a href={{url('/users/unblocked')}} class="list-group-item {{isset($currentPage)&&$currentPage === 'unblocked'?'active':''}}">
                          <span class="badge">
                            {{
                              count($yogaUsers->filter(function ($val) {
                                return $val->is_blocked === 0;
                              })->all())
                            }}
                          </span>
                          Unblocked
                      </a>
                      <a href={{url('/users/blocked')}} class="list-group-item {{isset($currentPage)&&$currentPage === 'blocked'?'active':''}}">
                          <span class="badge">
                            {{
                              count($yogaUsers->filter(function ($val) {
                                return $val->is_blocked === 1;
                              })->all())
                            }}
                          </span>
                          Blocked
                      </a>
                  </div>
                </div>
              </div>
                <div class="col-md-8">
                    <!-- <div class="panel panel-default">
                        <div class="panel-heading">Dashboard</div>

                        <div class="panel-body">
                          @yield('content')
                        </div>
                    </div> -->
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @yield('content')
                </div>
                <div class="col-md-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">Menu</div>

                        <!-- <div class="panel-body">
                          Find & Accept
                        </div> -->
                        <!-- List group -->
                        <div class="list-group">
                            <a href={{url('/find')}}  class="list-group-item {{isset($currentPage)&&$currentPage === 'find'?'active':''}}">
                                Find User
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <!-- <script src="/js/app.js"></script> -->
    <!-- Latest compiled and minified JavaScript -->
    <script
            src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
</body>
</html>
