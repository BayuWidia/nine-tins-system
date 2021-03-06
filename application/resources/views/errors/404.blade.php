<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>404 Error </title>
    <link href="{{ asset ('theme/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset ('theme/css/font-awesome.min.css')}}" rel="stylesheet"> 
    <link href="{{ asset ('theme/css/main.css')}}" rel="stylesheet">
    <link href="{{ asset ('theme/css/responsive.css')}}" rel="stylesheet">

    <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset ('theme/images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset ('theme/images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset ('theme/images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset ('theme/images/ico/apple-touch-icon-57-precomposed.png')}}">
</head><!--/head-->

<body>
    <section id="error-page">
        <div class="error-page-inner">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="text-center">
                            <div class="bg-404">
                                <div class="error-image">                                
                                    <img class="img-responsive" src="{{ asset ('theme/images/404.png')}}" alt="">  
                                </div>
                            </div>
                            <h3><i class="fa fa-warning text-yellow"></i> Maaf Terjadi Kesalahan</h3>
                            <p>Halaman yang anda tuju tidak ditemukan kemungkinan sudah dihapus atau alamatnya sudah digantikan.</p>
                            <a href="{{url('/')}}" class="btn btn-error">KEMBALI KE HOME</a>
                            <div class="social-link">
                                <span><a href="#"><i class="fa fa-facebook"></i></a></span>
                                <span><a href="#"><i class="fa fa-twitter"></i></a></span>
                                <span><a href="#"><i class="fa fa-google-plus"></i></a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    

    <script type="text/javascript" src="{{ asset ('theme/js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{ asset ('theme/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset ('theme/js/wow.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset ('theme/js/main.js')}}"></script>
</body>
</html>
