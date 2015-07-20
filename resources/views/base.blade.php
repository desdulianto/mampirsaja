<!doctype html>
<html>
    <head>
        <title>@section('title')
                mampirsaja.com
               @endsection</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ URL::asset('assets/bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{ URL::asset('assets/bootstrap/css/bootstrap-theme.min.css')}}">
        <link rel="stylesheet" href="{{ URL::asset('assets/css/sticky-footer.css')}}">
    </head>
    <body>
        <nav class="navbar">
          <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu-kategori" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">mampirsaja.com</a>
            </div>

              <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
              </form>
              <ul class="nav navbar-nav navbar-right">
              @if (!Auth::check())
                <li><a href="/auth/register">Registrasi</a></li>
                <li><a href="/auth/login">Login</a></li>
              @else
                <li><a href="{{route('account')}}">{{Auth::user()->nama_depan}} {{Auth::user()->nama_belakang}}</a></li>
                <li><a href="/auth/logout">Logout</a></li>
              @endif
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
        <nav class="navbar navbar-default">
          <div class="container-fluid">
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="menu-kategori">
              <ul class="nav navbar-nav">
                @foreach ($kategoris as $kategori)
                @if(Request::url() === route('kategori', ['kategori'=>$kategori->name]))
                    <li class="active"><a href="#">{{$kategori->label}}</a></li>
                @else
                <li><a href="{{route('kategori', ['kategori'=>$kategori->name])}}">{{$kategori->label}}</a></li>
                @endif
                @endforeach
              </ul>
          </div>
        </nav>
        <div class="container-fluid">
        @if (count($errors) > 0)
        <div class="row">
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        </div>
        @endif
        @yield('body')
        </div>
        <footer class="footer">
          <div class="container">
                <p class="text-muted text-center">Hak Cipta &copy; 2013-2014 mampirsaja.com</p>
          </div>
        </footer>
        <script src="{{ URL::asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ URL::asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
        @section('js')
        @show
    </body>
</html>