@extends('backend.layouts.master')

@section('title')
  <title>Dashboard</title>
  <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
@stop

@section('breadcrumb')
  <h1>
    Management Preview
    <small>Lihat Berita</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Lihat Berita</li>
  </ol>
@stop

@section('content')

  <div class="row">
    <div class="col-md-12">

      <div class="box box-widget">
        <div class="box-body">
          <!-- post text -->
          <div class="post">
            <div class="user-block">
              <span class='username' style="margin-left:0px;padding-bottom:1%">
                 @if($getberita->url_foto == null)
                  <img class="img-circle" src="{{ asset('/images/userdefault.png') }}" alt="User Avatar">
                @else
                  <img class="img-circle" src="{{ asset('/images/'.$getberita->url_foto) }}" alt="{{$getberita->name}}">
                @endif
                &nbsp;&nbsp;
                <b>{{$getberita->name}}</b>
                <br>
                  <span class='description' style="margin-left:5%;">{{$getberita->email}}</span>
              </span>
              <span class='description' style="margin-left:0px;">
                Judul Berita : {{$getberita->judul_berita}} &nbsp;&nbsp;||&nbsp;&nbsp; Kategori Berita :  {{$getberita->nama_kategori}}&nbsp;&nbsp;|| {{ \Carbon\Carbon::parse($getberita->created_at)->format('d-M-y H:i:s')}} &nbsp;&nbsp; 
              </span>
              <span class='description' style="margin-left:0px; padding-top:3px;">
                @if ($getberita->flag_publish == 1)
                  <span class="label bg-blue">&nbsp;Sudah Publish</span>
                @else
                  <span class="label bg-red">&nbsp;Belum Publish</span>
                @endif
              </span>
            </div><!-- /.user-block -->
            <p>
              <?php echo $getberita->isi_berita; ?>
            </p>
  
            <div class='box-footer box-comments' style="border:1px solid #F39C12;">
              <div style="padding-bottom:5px;">
                <b>Isi Dumelan</b>
              </div>
              <div class='box-comment'>
                <!-- User image -->
                <div class='comment-text'>
                  <span class="username">
                    <span class='text-muted pull-right'></span>
                  </span><!-- /.username -->
                    <?php echo $getberita->isi_dumel; ?>
                </div><!-- /.comment-text -->
              </div><!-- /.box-comment -->
            </div><!-- /.box-footer -->
          </div>
        </div><!-- /.box-body -->

        <div class="box-footer">
          <a href="javascript:history.back()" class="btn bg-yellow btn-flat margin pull-right">
            <i class=""></i>
            Go Back
          </a>
        </div><!-- /.box-footer -->
      </div>
    </div>
  </div>

  <!-- jQuery 2.1.4 -->
  <script src="{{asset('plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
  <!-- Bootstrap 3.3.5 -->
  <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
  <!-- Tags Input -->
  <script src="{{asset('bootstrap/js/bootstrap-tagsinput.js')}}"></script>
  <!-- SlimScroll -->
  <script src="{{asset('plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
  <!-- FastClick -->
  <script src="{{asset('plugins/fastclick/fastclick.min.js')}}"></script>
  <!-- iCheck 1.0.1 -->
  <script src="{{asset('plugins/iCheck/icheck.min.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('dist/js/app.min.js')}}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{asset('dist/js/demo.js')}}"></script>

  <script type="text/javascript">
    $(function(){
        $("a.flagpublish").click(function(){
          var a = $(this).data('value');
          $('#setflagpublish').attr('href', '{{url('admin/publish-berita/')}}/'+a);
        });
    })
  </script>


@stop
