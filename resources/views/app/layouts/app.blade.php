<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{env('APP_NAME')}} | @yield('title')</title>
    <!-- Font Awesome -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.7/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    </head>
    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}">
<body class="white-skin">
        <div class="se-pre-con" style="background: url(https://inspektorat.jatengprov.go.id/17/po-content/themes/chingsy3/images/Preloader_8.gif?v=1558885417) center no-repeat #fff;"></div>
    <nav class="navbar navbar-expand-lg white fixed-top">
        <a class="navbar-brand" href="#">{{env('APP_NAME')}}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link waves-effect waves-light" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="perhitunganDropdown" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Perhitungan</a>
                    <div class="dropdown-menu dropdown-primary" aria-labelledby="perhitunganDropdown">
                        <a class="dropdown-item" href="{{route('perhitungan.buat')}}"><i class="fa fa-pencil"></i> Buat</a>
                        <a class="dropdown-item" href="{{route('perhitungan.saved')}}"><i class="fa fa-save"></i> Saved</a>
                    </div>
                    </li>
            </ul>
            <form class="form-inline" action="{{route('perhitungan.saved')}}">
                <div class="md-form my-0">
                    <input class="form-control mr-sm-2" type="text" name="s" placeholder="Cari Perhitungan" aria-label="Search" value="@yield("search_term")">
                </div>
            </form>
        </div>
    </nav>

    @yield('content')
    
    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.7/js/mdb.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    @stack('script-bawah')
    <script>
    $(window).on('load',function() {
        // Animate loader off screen
        console.log('load');
		$(".se-pre-con").fadeOut("slow");;
    });
    </script>
    
</body>
</html>