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
                            <h1 class="title">Portfolio</h1>
                            <p>Be Creative</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </section>
    <!--/#action-->

    <section id="portfolio">
        <div class="container">
            <div class="row">
                <br/> <br/>
                <!-- <ul class="portfolio-filter text-center">
                    <li><a class="btn btn-default active" href="#" data-filter="*">All</a></li>
                    <li><a class="btn btn-default" href="#" data-filter=".branded">Branded</a></li>
                    <li><a class="btn btn-default" href="#" data-filter=".design">Design</a></li>
                    <li><a class="btn btn-default" href="#" data-filter=".folio">Folio</a></li>
                    <li><a class="btn btn-default" href="#" data-filter=".logos">Logos</a></li>
                    <li><a class="btn btn-default" href="#" data-filter=".mobile">Mobile</a></li>
                    <li><a class="btn btn-default" href="#" data-filter=".mockup">Mockup</a></li>
                </ul> --><!--/#portfolio-filter-->
                    
                <div class="portfolio-items">
                    @foreach($getproject as $key)
                    <div class="col-xs-6 col-sm-4 col-md-3 portfolio-item branded logos">
                        <div class="portfolio-wrapper">
                            <div class="portfolio-single">
                                <div class="portfolio-thumb">
                                    @if($key->logo_project != null)
                                    <?php $photo261 = explode(".", $key->logo_project); ?>
                                        <img src="{{url('images')}}/{{$photo261[0]}}_261x269.{{$photo261[1]}}" class="img-responsive" alt="">
                                    @else
                                        <img src="{{ asset('theme/images/portfolio/1.jpg')}}" class="img-responsive" alt="">
                                    @endif
                                </div>
                                <div class="portfolio-view">
                                    <ul class="nav nav-pills">
                                        <li><a href="{{route('detail.portofolio.front.index', $key->id)}}"><i class="fa fa-link"></i></a></li>
                                        @if($key->logo_project != null)
                                        <?php $photo261 = explode(".", $key->logo_project); ?>
                                            <li><a href="{{url('images')}}/{{$photo261[0]}}_261x269.{{$photo261[1]}}" data-lightbox="example-set"><i class="fa fa-eye"></i></a></li>
                                        @else
                                            <li><a href="{{ asset('theme/images/portfolio/1.jpg')}}" data-lightbox="example-set"><i class="fa fa-eye"></i></a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            <div class="portfolio-info ">
                                <h2 style="text-align: center">{{$key->nama_project}}</h2>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!--/#portfolio-->


    @stop  
