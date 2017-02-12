@extends('frontend.layouts.master')
@section('title')
    <title>9 Tins</title>
@stop

   
@section('content')
    <!--/#header-->
    <section id="page-breadcrumb">
        <div class="vertical-center sun">
             <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1 class="title">About Us</h1>
                            <p>Why our Clients love to work with us.</p>
                        </div>
                     </div>
                </div>
            </div>
        </div>
   </section>
    <!--/#page-breadcrumb-->

    <section id="company-information" class="padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms">
        <div class="container">
            @foreach($getabout as $key)
            <div class="row">
                <div class="col-sm-6">
                @if($key->url_tentang != null)
                    <?php $photo575 = explode(".", $key->url_tentang); ?>
                    <img src="{{url('images')}}/{{$photo575[0]}}_495x298.{{$photo575[1]}}" class="img-responsive" alt="">
                @else
                    <img src="{{ asset('theme/images/aboutus/.png')}}" class="img-responsive" alt="">
                @endif
                </div>
                @if($key != null)
                    <p><?php echo $key->keterangan_tentang ?></p>
                @endif
            </div>
            @endforeach
        </div>
    </section>

    <section id="services">
        <div class="container">
            <div class="row">
                @foreach($getskill as $key)
                <div class="col-sm-4 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms">
                    <div class="single-service">
                        <div class="wow scaleIn" data-wow-duration="500ms" data-wow-delay="300ms">
                           <div class="wow scaleIn" data-wow-duration="500ms" data-wow-delay="300ms">
                            <?php $photo80 = explode(".", $key->url_keahlian); ?>
                            <img src="{{url('images')}}/{{$photo80[0]}}_80x85.{{$photo80[1]}}" alt="">
                        </div>
                        <h2>{{$key->nama_keahlian}}</h2>
                        <p>{{$key->keterangan_keahlian}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    <!--/#services-->

    <section id="action" class="responsive">
        <div class="vertical-center">
             <div class="container">
                <div class="row">
                    <div class="action take-tour">
                        <div class="col-sm-7 wow fadeInLeft" data-wow-duration="500ms" data-wow-delay="300ms">
                            <h2 class="title">Professional in The Creation of Website and Mobile</h2>
                            <p>9 Technology Information and Solution</p>
                        </div>
                        <div class="col-sm-5 text-center wow fadeInRight" data-wow-duration="500ms" data-wow-delay="300ms">
                            <div class="tour-button">
                                
                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/#action-->

    <section id="team">
        <div class="container">
            <div class="row">
                <h1 class="title text-center wow fadeInDown" data-wow-duration="500ms" data-wow-delay="300ms">Meet the Team</h1>
                <p class="text-center wow fadeInDown" data-wow-duration="400ms" data-wow-delay="400ms">Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. <br>
                Ut enim ad minim veniam, quis nostrud </p>
                <div id="team-carousel" class="carousel slide wow fadeIn" data-ride="carousel" data-wow-duration="400ms" data-wow-delay="400ms">
                    <!-- Indicators -->
                    <ol class="carousel-indicators visible-xs">
                        <li data-target="#team-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#team-carousel" data-slide-to="1"></li>
                    </ol>
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            @foreach($getuser as $key)
                            <div class="col-sm-3 col-xs-6">
                                <div class="team-single-wrapper">
                                    <div class="team-single">
                                        <div class="person-thumb">
                                        @if($key->url_foto == null)
                                            <img src="{{ asset('theme/images/aboutus/1.jpg')}}" class="img-responsive" alt="">
                                        @else
                                            <?php $photo480 = explode(".", $key->url_foto); ?>
                                            <img src="{{url('images')}}/{{$photo480[0]}}_480x495.{{$photo480[1]}}" class="img-responsive" alt="">
                                        @endif
                                        </div>
                                        <div class="social-profile">
                                            <ul class="nav nav-pills">
                                                <li><a href="facebook.com" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                                <li><a href="twitter.com" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                                <li><a href="gmail.com" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="person-info">
                                        <h2 style="text-align: center;">{{$key->name}}</h2>
                                        <p style="text-align: center;">{{$key->master_jabatan->nama_jabatan}}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Controls -->
                    <a class="left team-carousel-control hidden-xs" href="#team-carousel" data-slide="prev">left</a>
                    <a class="right team-carousel-control hidden-xs" href="#team-carousel" data-slide="next">right</a>
                </div>
            </div>
        </div>
    </section>
    <!--/#team-->

    @stop