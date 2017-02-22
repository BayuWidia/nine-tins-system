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

    <section id="portfolio-information" class="padding-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    @if($getproject->logo_project != null)
                    <?php $photo552 = explode(".", $getproject->logo_project); ?>
                        <img src="{{url('images')}}/{{$photo552[0]}}_552x577.{{$photo552[1]}}" class="img-responsive" alt="">
                    @else
                        <img src="{{ asset('theme/images/portfolio-details/1.jpg')}}" class="img-responsive" alt="">
                    @endif
                </div>
                <div class="col-sm-6">
                    <div class="project-name overflow">
                        <h2 class="bold">{{$getproject->nama_project}} </h2>
                        <ul class="nav navbar-nav navbar-default">
                            <li><a href="#"><i class="fa fa-clock-o"></i>{{ \Carbon\Carbon::parse($getproject->created_at)->format('d-M-y')}}</a></li>
                            <li><a href="#">
                                 @if($getproject->status_project=="0")
                                    <span class="badge bg-default">Start</span>
                                  @elseif($getproject->status_project=="1")
                                    <span class="badge bg-yellow">Progress</span>
                                  @elseif($getproject->status_project=="2")
                                    <span class="badge bg-blue">Done</span>
                                  @elseif($getproject->status_project=="3")
                                    <span class="badge bg-red">Terminate</span>
                                  @endif
                            </a></li>
                        </ul>
                    </div>
                    <div class="project-info overflow">
                        <h3>Detail</h3>
                        <p>{{$getproject->keterangan_project}}</p>
                    </div>
                    <div class="skills overflow">
                        <h3>Kategori Project:</h3>
                        <p>{{$getproject->master_kategori_project->nama_kategori_project}}</p>
                    </div>
                    <div class="skills overflow">
                        <h3>Skills:</h3>
                        <ul class="nav navbar-nav navbar-default">
                           {{$getproject->tags}}
                        </ul>
                    </div>
                    <div class="client overflow">
                        <h3>Location:</h3>
                        <ul class="nav navbar-nav navbar-default">
                            <li><a href="#"><i class="fa fa-bookmark-o"></i>{{$getproject->master_lokasi->nama_lokasi}}</a></li>
                        </ul>
                    </div>
                    <div class="client overflow">
                        <h3>Client:</h3>
                        <ul class="nav navbar-nav navbar-default">
                            <li><a href="#"><i class="fa fa-institution"></i>{{$getproject->master_client->nama_client}}</a></li>
                        </ul>
                    </div>
                    <div class="live-preview">
                        <a href="{{$getproject->master_client->url_client}}" class="btn btn-common uppercase">Live preview</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
     <!--/#portfolio-information-->

    <section id="related-work" class="padding-top padding-bottom">
        <div class="container">
            <div class="row">
                <h1 class="title text-center">Last Project</h1>
                @foreach($getprojectall as $key)
                <div class="col-sm-3">
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
    </section>
    <!--/#related-work-->


    @stop
