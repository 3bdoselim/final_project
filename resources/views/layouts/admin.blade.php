<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        label{
            margin-bottom: 0em;
        }
        .form-group {
            margin-bottom: 0em;
        }
      a{
        color: white;
      }

      body {
          font-family: "Lato", sans-serif;
      }

      .sidenav {
          height: 100%;
          width: 0;
          position: fixed;
          z-index: 100;
          top: 0;
          left: 0;
          background-color: #111;
          overflow-x: hidden;
          transition: 0.5s;
          padding-top: 60px;
          opacity: 90%;
      }

      .sidenav a {
          padding: 8px 8px 8px 32px;
          text-decoration: none;
          font-size: 25px;
          color: #818181;
          display: block;
          transition: 0.3s;
      }

      .sidenav a:hover {
          color: #f1f1f1;
      }

      .sidenav .closebtn {
          position: absolute;
          top: 0;
          right: 25px;
          font-size: 36px;
          margin-left: 50px;
      }
      #spn{
        position: absolute;
        left: 1em;
      }
      @media screen and (max-height: 450px) {
          .sidenav {
              padding-top: 15px;
          }

          .sidenav a {
              font-size: 18px;
          }
      }

  </style>
</head>
<body>
    <div id="app">
        <nav  class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
            <div id="spn" class="m-auto"><span class="text-light" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span></div>

                <a class="navbar-brand" href="{{ url('/dashboard') }}">
                    {{ config('app.name', 'Laravel') }} Dashboard
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                      
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            {{-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif --}}
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    


  <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <a class="nav-link" href="/dashboard">Main Dashborad</a>

      <div id="accordion">
        <div class="card bg-dark">
          <div class="card-header" id="headingOne">
            <h5 class="mb-0">
              <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                <h3>Data Entry</h3>
              </button>
            </h5>
          </div>
          <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
                <a class="nav-link" href="/categories">Categories</a>
                <a class="nav-link" href="/sections">Sections</a>
                <a class="nav-link" href="/sizes">Sizes</a>
                <a class="nav-link" href="/colors">Colors</a>
                <a class="nav-link" href="/jobs">Jobs</a>
            </div>
          </div>
        </div>
      </div>

      <div id="accordion">
        <div class="card bg-dark">
          <div class="card-header" id="headingTwo">
            <h5 class="mb-0">
              <button class="btn btn-link" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseOne">
                <h3>Users</h3>
              </button>
            </h5>
          </div>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
            <div class="card-body">
                <a class="nav-link" href="/users">Show Users</a>
                <a class="nav-link" href="/users/create">Register User</a>
            </div>
          </div>
        </div>
      </div>
      <a class="nav-link" href="/products">Products</a>
      <a class="nav-link" href="/customers">Customers</a>
      <a class="nav-link" href="/branches">Branches</a>
      <a class="nav-link" href="/employees">Employees</a>

  </div>

  

  <script>
      function openNav() {
          document.getElementById("mySidenav").style.width = "250px";
      }

      function closeNav() {
          document.getElementById("mySidenav").style.width = "0";
      }

  </script>


  </div>
  <div class="col mt-4">
    @yield('content')
  </div>
</div>
</body>
</html>
