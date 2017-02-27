@extends('frontend.layouts.master')
@section('title')
    <title>9 Tins</title>
@stop

   
@section('content')
<script>
window.setTimeout(function() {
  $(".alert-info").fadeTo(1500, 0).slideUp(1500, function(){
      $(this).remove();
  });
}, 2000);

window.setTimeout(function() {
  $(".alert-warning").fadeTo(1500, 0).slideUp(1500, function(){
      $(this).remove();
  });
}, 5000);
</script>
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
    <br/><br/>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
              @if(Session::has('message'))
                <div class="alert alert-info">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
                  <p>{{ Session::get('message') }}</p>
                </div>
              @endif

              @if(Session::has('messagefail'))
                <div class="alert alert-warning">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-ban"></i> Oops, terjadi kesalahan!</h4>
                  <p>{{ Session::get('messagefail') }}</p>
                </div>
              @endif
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="contact-form bottom">
                    <h2>Send a message</h2>
                    <form name="contact-form" method="post" action="{{route('pesan.store')}}">
                        {{csrf_field()}}

                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}" 
                            placeholder="@if($errors->has('name')) 
                            {{ $errors->first('name')}}@endif Name ">
                        </div>
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}" 
                            placeholder="@if($errors->has('email')) {{ $errors->first('email')}}@endif Email ">
                        </div>
                        <div class="form-group {{ $errors->has('subject') ? 'has-error' : '' }}">
                            <input type="text" name="subject" class="form-control" value="{{ old('subject') }}" 
                            placeholder="@if($errors->has('subject')) {{ $errors->first('subject')}}@endif Subject ">
                        </div>
                        <div class="form-group {{ $errors->has('message') ? 'has-error' : '' }}">
                            <textarea name="message" class="form-control" rows="8" 
                            placeholder="@if($errors->has('message')){{ $errors->first('message')}}@endif Keterangan ">{{ old('message') }}</textarea>
                        </div>                        
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-submit" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
            <div class="contact-info col-md-6 col-sm-6">
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
            <div class="col-sm-12">
                <div class="copyright-text text-center">
                    
                </div>
            </div>
        </div>
    </div>      
  
    @stop  
