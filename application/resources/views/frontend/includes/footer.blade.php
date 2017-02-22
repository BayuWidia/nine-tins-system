    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center bottom-separator">
                    <img src="{{ asset('theme/images/home/under.png')}}" class="img-responsive inline" alt="">
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="testimonial bottom">
                        <h2>Testimonial</h2>
                        <div class="media">
                            @foreach($gettestimonial as $key)
                            <div class="pull-left">
                                <a href="#">
                                    @if($key->url_testimonial != null)
                                    <?php $photo81 = explode(".", $key->url_testimonial); ?>
                                        <img src="{{url('images')}}/{{$photo81[0]}}_80x81.{{$photo81[1]}}" class="img-responsive" alt="">
                                    @else
                                        <img src="{{ asset('theme/images/home/profile1.png')}}" alt=""></a>
                                    @endif
                            </div>
                            <div class="media-body">
                                <blockquote>{{$key->keterangan_testimonial}}</blockquote>
                                <h3><a href="#">- {{$key->nama_testimonial}}</a></h3>
                            </div>
                             @endforeach
                         </div> 
                    </div> 
                </div>
                <div class="col-md-8 col-sm-6">
                    <div class="contact-info bottom">
                        <h2 class="page-header">Blockquote</h2>
                        @foreach($getblockquote as $key)
                        <blockquote>
                            <p>{{$key->keterangan_blockquote}}</p>
                            <footer>Someone famous in <cite title="Source Title">{{$key->nama_blockquote}}</cite></footer>
                        </blockquote>
                        @endforeach
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="copyright-text text-center">
                        <p>&copy; 9 TINS Labs and Project 2017. All Rights Reserved.</p>
                        <p>Crafted by <a target="_blank" href="http://9tins.com/">9 Tins</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>