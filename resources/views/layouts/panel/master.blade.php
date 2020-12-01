<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Oficina 2.0</title>

    <!-- reponsive Core CSS -->
    <link href="{{URL::asset('css/responsive.css')}}" rel="stylesheet">

    <!-- MyStyle Core CSS -->
    <link href="{{URL::asset('css/style.css')}}" rel="stylesheet">

    <!-- Style Global Core CSS -->
    <link href="{{URL::asset('css/styleGlobal.css') }}" rel="stylesheet">

    <!-- Bootstrap Core CSS -->
    <link href="{{URL::asset('site/bootstrap.css') }}" rel="stylesheet">
    
    <!-- icons google -->
    <link href="{{URL::asset('https://fonts.googleapis.com/icon?family=Material+Icons')}}"
      rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="content">
         <!-- Navigation -->
        <nav class="nav bg-primary">
            <span class="navbar mb-0 h1 text-white">Oficina 2.0</span>
        </nav>
        <!--é colocado os códigos selecionados pelo @section de cada página-->
        @yield('content')
    </div>

    <!-- jQuery -->
    <script src="{{URL::asset('js/jquery.min.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{URL::asset('js/bootstrap.min.js')}}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{URL::asset('js/metisMenu.min.js')}}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{URL::asset('js/startmin.js')}}"></script>

</body>

</html>