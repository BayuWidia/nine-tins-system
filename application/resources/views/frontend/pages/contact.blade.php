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
                            <h1 class="title">Contact US</h1>
                            <p>Stay close</p>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
   </section>
    <!--/#action-->

    <section id="map-section">
        <div class="container">
            <div id="gmap"></div>
            <div class="contact-info">
                <h2>Contacts</h2>
                <address>
                E-mail: hello@9tins.com</a> <br> 
                Phone: 0856-9137-9577 <br>
                </address>

                <h2>Address</h2>
                <address>
                Perumahan Neo Bintaro Blok i-2, Jl. Raya Japos, <br> 
                Pondok Belimbing RT. 03/04, <br> 
                Kelurahan Jurang Mangu Barat, <br> 
                Kecamatan Pondok Aren Tanggerang Selatan 15223 <br> 
                </address>
            </div>
        </div>
    </section> <!--/#map-section-->  

    <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="contact-form bottom">
                        <h2>Send a message</h2>
                        <form id="main-contact-form" name="contact-form" method="post" action="sendemail.php">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" required="required" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" required="required" placeholder="Email ">
                            </div>
                            <div class="form-group">
                                <input type="text" name="subject" class="form-control" required="required" placeholder="Subject">
                            </div>
                            <div class="form-group">
                                <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Message"></textarea>
                            </div>                        
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-submit" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="copyright-text text-center">
                        
                    </div>
                </div>
            </div>
        </div>      
  
    @stop  
