    <header id="header">  
        <div class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand" href="#" style="margin-top: -4%">
                        <img src="{{ asset('theme/images/logo2.png')}}" alt="logo">
                    </a>
                    
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li><a href="{{route('about.front.index')}}">About</a></li>
                        <li><a href="{{route('service.front.index')}}">Service</a></li>
                        <li><a href="{{route('portofolio.front.index')}}">Portofolio</a></li>
                        <li><a href="{{route('contact.front.index')}}">Contact</a></li>
                        <!-- <li class="dropdown"><a href="blog.html">Bagi Pengetahuan <i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                                <li><a href="{{route('bagi.pengetahuan.front.index')}}">TEST 1</a></li>
                            </ul>
                        </li>
                         <li><a href="{{route('foto.front.index')}}">Foto</a></li> -->                 
                    </ul>
                </div>
            </div>
        </div>
    <hr/>
    </header>
    
    <!--/#header-->