@extends('frontend.layouts.master')
@section('title')
    <title>9 Tins</title>
@stop

   
@section('content')
    <section id="home-slider">
        <div class="container">
            <div class="row">
                <div class="main-slider">
                    <div class="slide-text">
                        <h1>We Are 9 Tins</h1>
                        <h2>Technology Information and Solutions</h2>
                        @if($getabout != null)
                            <p><?php echo substr($getabout->keterangan_tentang, 0, 300) ?>...</p>
                        @endif
                        <a href="{{route('about.front.index')}}" class="btn btn-common">View More...</a>
                    </div>
                    <img src="{{ asset('theme/images/home/slider/hill.png')}}" class="slider-hill" alt="slider image">
                    <img src="{{ asset('theme/images/home/slider/house.png')}}" class="slider-house" alt="slider image">
                    <img src="{{ asset('theme/images/home/slider/sun.png')}}" class="slider-sun" alt="slider image">
                    <img src="{{ asset('theme/images/home/slider/birds1.png')}}" class="slider-birds1" alt="slider image">
                    <img src="{{ asset('theme/images/home/slider/birds2.png')}}" class="slider-birds2" alt="slider image">
                </div>
            </div>
        </div>
        <div class="preloader"><i class="fa fa-sun-o fa-spin"></i></div>
    </section>
    <!--/#home-slider-->

    <section id="services">
        <div class="container">
            <div class="row">
                @foreach($getskill as $key)
                <div class="col-sm-4 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms">
                    <div class="single-service">
                        <div class="wow scaleIn" data-wow-duration="500ms" data-wow-delay="300ms">
                            <?php $photo80 = explode(".", $key->url_keahlian); ?>
                            <img src="{{url('images')}}/{{$photo80[0]}}_80x85.{{$photo80[1]}}" alt="">
                        </div>
                        <h2>{{$key->nama_keahlian}}</h2>
                        <p>{{$key->keterangan_keahlian}}</p>
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

    <section id="features">
        <div class="container">
            <div class="row">
                <div class="single-features">
                    <div class="col-sm-5 wow fadeInLeft" data-wow-duration="500ms" data-wow-delay="300ms">
                    @if($getfeature[0]->url_fitur!=null)
                        <?php $photo400 = explode(".", $getfeature[0]->url_fitur); ?>
                        <img src="{{url('images')}}/{{$photo400[0]}}_400x184.{{$photo400[1]}}" class="img-responsive" alt="">
                    @else
                        <img src="{{ asset('theme/images/home/image1.png')}}" class="img-responsive" alt=""> 
                    @endif
                    </div>
                    <div class="col-sm-6 wow fadeInRight" data-wow-duration="500ms" data-wow-delay="300ms">
                        <h2>{{$getfeature[0]->nama_fitur}}</h2>
                        <P>{{$getfeature[0]->keterangan_fitur}}</P>
                    </div>
                </div>
                <div class="single-features">
                    <div class="col-sm-6 col-sm-offset-1 align-right wow fadeInLeft" data-wow-duration="500ms" data-wow-delay="300ms">
                        <h2>{{$getfeature[1]->nama_fitur}}</h2>
                        <P>{{$getfeature[1]->keterangan_fitur}}</P>
                    </div>
                    <div class="col-sm-5 wow fadeInRight" data-wow-duration="500ms" data-wow-delay="300ms">
                        @if($getfeature[1]->url_fitur!=null)
                            <?php $photo427 = explode(".", $getfeature[1]->url_fitur); ?>
                            <img src="{{url('images')}}/{{$photo427[0]}}_427x140.{{$photo427[1]}}" class="img-responsive" alt="">
                        @else
                            <img src="{{ asset('theme/images/home/image2.png')}}" class="img-responsive" alt=""> 
                        @endif
                    </div>
                </div>
                <div class="single-features">
                    <div class="col-sm-5 wow fadeInLeft" data-wow-duration="500ms" data-wow-delay="300ms">
                        @if($getfeature[2]->url_fitur!=null)
                            <?php $photo400 = explode(".", $getfeature[2]->url_fitur); ?>
                            <img src="{{url('images')}}/{{$photo400[0]}}_400x184.{{$photo400[1]}}" class="img-responsive" alt="">
                        @else
                            <img src="{{ asset('theme/images/home/image1.png')}}" class="img-responsive" alt=""> 
                        @endif
                    </div>
                    <div class="col-sm-6 wow fadeInRight" data-wow-duration="500ms" data-wow-delay="300ms">
                        <h2>{{$getfeature[2]->nama_fitur}}</h2>
                        <P>{{$getfeature[2]->keterangan_fitur}}</P>
                    </div>
                </div>
                 <div class="single-features">
                    <div class="col-sm-6 col-sm-offset-1 align-right wow fadeInLeft" data-wow-duration="500ms" data-wow-delay="300ms">
                        <h2>{{$getfeature[3]->nama_fitur}}</h2>
                        <P>{{$getfeature[3]->keterangan_fitur}}</P>
                    </div>
                    <div class="col-sm-5 wow fadeInRight" data-wow-duration="500ms" data-wow-delay="300ms">
                        @if($getfeature[3]->url_fitur!=null)
                            <?php $photo427 = explode(".", $getfeature[3]->url_fitur); ?>
                            <img src="{{url('images')}}/{{$photo427[0]}}_427x140.{{$photo427[1]}}" class="img-responsive" alt="">
                        @else
                            <img src="{{ asset('theme/images/home/image2.png')}}" class="img-responsive" alt=""> 
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
     <!--/#features-->

    <section id="clients">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="clients text-center wow fadeInUp" data-wow-duration="500ms" data-wow-delay="300ms">
                        <p><img src="{{ asset('theme/images/home/clients3.png')}}" class="img-responsive" alt=""></p>
                        <h1 class="title">Our Clients</h1>
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