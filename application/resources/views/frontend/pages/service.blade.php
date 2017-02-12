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
                            <h1 class="title">Services</h1>
                            <p>Designed to suit you.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </section>
    <!--/#page-breadcrumb-->

    <section id="company-information" class="choose">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="0ms">
                    <img src="{{ asset('theme/images/services/4.png')}}" class="img-responsive" alt="">
                </div>
                <div class="col-sm-6 padding-top wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="0ms">
                    <h2>Why Choose Us?</h2>
                    <p>Nisi commodo bresaola, leberkas venison eiusmod bacon occaecat labore<br /> tail corned beef Capicola nisi flank sed.</p>
                    <ul class="elements">
                        <li class="wow fadeInUp" data-wow-duration="900ms" data-wow-delay="100ms"><i class="fa fa-angle-right"></i> when an unknown printer took a galley of type</li>
                        <li class="wow fadeInUp" data-wow-duration="800ms" data-wow-delay="200ms"><i class="fa fa-angle-right"></i> scrambled it to make a type specimen book.</li>
                        <li class="wow fadeInUp" data-wow-duration="700ms" data-wow-delay="300ms"><i class="fa fa-angle-right"></i> scrambled it to make a type specimen book.</li>
                        <li class="wow fadeInUp" data-wow-duration="600ms" data-wow-delay="400ms"><i class="fa fa-angle-right"></i> scrambled it to make a type specimen book.</li>
                        <li class="wow fadeInUp" data-wow-duration="500ms" data-wow-delay="500ms"><i class="fa fa-angle-right"></i> but also the leap into electronic typesetting.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--/#company-information-->

    <section id="services">
        <div class="container">
            <div class="row">
                @foreach($getservice as $key)
                <div class="col-sm-4 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms">
                    <div class="single-service">
                        <div class="wow scaleIn" data-wow-duration="500ms" data-wow-delay="300ms">
                           <?php $photo80 = explode(".", $key->url_service); ?>
                            <img src="{{url('images')}}/{{$photo80[0]}}_80x85.{{$photo80[1]}}" alt="">
                        </div>
                        <h2>{{$key->nama_service}}</h2>
                        <p>{{$key->keterangan_service}}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--/#services-->

    <section id="action" class="responsive">
        <div class="vertical-center">
             <div class="container">
                <div class="row">
                    <div class="action take-tour">
                        <div class="col-sm-7 wow fadeInLeft" data-wow-duration="500ms" data-wow-delay="300ms">
                            <h1 class="title">Triangle Corporate Template</h1>
                            <p>A responsive, retina-ready &amp; wide multipurpose template.</p>
                        </div>
                        <div class="col-sm-5 text-center wow fadeInRight" data-wow-duration="500ms" data-wow-delay="300ms">
                            <div class="tour-button">
                                <a href="#" class="btn btn-common">TAKE THE TOUR</a>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/#action-->

    <section id="recent-projects" class="recent-projects">
        <div class="container">
            <div class="row">
                <h1 class="title text-center wow fadeInDown" data-wow-duration="500ms" data-wow-delay="300ms">Recent Projects</h1>
                <p class="text-center padding-bottom wow fadeInDown" data-wow-duration="400ms" data-wow-delay="400ms">Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. <br>
                Ut enim ad minim veniam, quis nostrud </p>
                @foreach($getproject as $key)
                <div class="col-sm-3 col-xs-6 wow fadeIn" data-wow-duration="1000ms" data-wow-delay="1000ms">
                    <div class="portfolio-wrapper">   
                        <div class="portfolio-single">
                            <div class="portfolio-thumb">
                                @if($key->logo_project == null)
                                    <img src="{{ asset('theme/images/portfolio/8.jpg')}}" class="img-responsive" alt=""> 
                                @else
                                    <?php $photo261 = explode(".", $key->logo_project); ?>
                                    <img src="{{url('images')}}/{{$photo261[0]}}_261x269.{{$photo261[1]}}" class="img-responsive" alt="">
                                @endif
                            </div>
                            <div class="portfolio-view">
                                <ul class="nav nav-pills">
                                    @if($key->logo_project == null)
                                        <li><a href="{{ asset('theme/images/portfolio/8.jpg')}}" data-lightbox="example-set"><i class="fa fa-eye"></i></a></li>
                                    @else
                                        <?php $photo261 = explode(".", $key->logo_project); ?>
                                        <li><a href="{{url('images')}}/{{$photo261[0]}}_261x269.{{$photo261[1]}}" data-lightbox="example-set"><i class="fa fa-eye"></i></a></li>
                                    @endif
                                    
                                </ul>
                            </div>
                        </div>
                        <div class="portfolio-info">
                            <h2 style="text-align: center">{{$key->nama_project}}</h2>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--/#recent-projects-->

    <section id="clients">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="clients text-center wow fadeInUp" data-wow-duration="500ms" data-wow-delay="300ms">
                        <p><img src="{{ asset('theme/images/home/clients.png')}}" class="img-responsive" alt=""></p>
                        <h1 class="title">Happy Clients</h1>
                        <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. <br> Ut enim ad minim veniam, quis nostrud </p>
                    </div>
                    <div class="clients-logo wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms">
                         @foreach($getclient as $key)
                        <div class="col-xs-3 col-sm-2">
                            @if($key->logo_client == null)
                                <a href="#"><img src="{{ asset('theme/images/home/client1.png')}}" class="img-responsive" alt=""></a> 
                            @else
                                <?php $photo130_2 = explode(".", $key->logo_client); ?>
                                <img src="{{url('images')}}/{{$photo130_2[0]}}_130x50.{{$photo130_2[1]}}" class="img-responsive" alt="">
                            @endif
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
     </section>
    <!--/#clients-->

@stop  
