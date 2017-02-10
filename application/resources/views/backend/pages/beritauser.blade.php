@extends('backend.layouts.master')

@section('title')
  <title>Dashboard</title>
  <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap.css')}}">
  <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
@stop

@section('breadcrumb')
  <h1>
    Manajemen 
    <small>Data Profile</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{url('backend/dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Manajemen Profile</li>
  </ol>
@stop

@section('content')

  <div class="row">
    <div class="col-md-12">

    <div class="col-md-3">
      <!-- Profile Image -->
      <div class="box box-danger">
        <div class="box-body box-profile">
          <p class="text-muted text-center bg-green">{{$getuser->master_jabatan->nama_jabatan}}</p>
          @if($getuser->url_foto=="")
            <img class="profile-user-img img-responsive img-circle" src="{{ asset('/images/userdefault.png') }}" alt="User profile picture">
          @else
            <img class="profile-user-img img-responsive img-circle" src="{{url('images')}}/{{$getuser->url_foto}}" alt="User profile picture">
          @endif
          @if($getuser->name=="")
            <h3 class="profile-username text-center">No Name</h3>
          @else
            <h3 class="profile-username text-center">{{$getuser->name}}</h3>
          @endif

          @if($getuser->level=="1")
            <p class="text-muted text-center">Administrator</p>
          @else
            <p class="text-muted text-center">Guest</p>
          @endif

          <ul class="list-group list-group-unbordered"><!-- 
            <li class="list-group-item">
              <i class="ion ion-speakerphone"></i><b>  Jumlah Berita</b> <a class="badge bg-green pull-right">{{$countberita}}</a>
            </li> -->
            <li class="list-group-item">
              <i class="fa fa-heartbeat"></i><b>    Berita Belum Publish</b> <a class="badge bg-green pull-right">{{$countberitabelumpublish}}</a>
            </li>
            <li class="list-group-item">
              <i class="fa fa-heart"></i><b>    Berita Sudah Publish</b> <a class="badge bg-green pull-right">{{$countberitasudahpublish}}</a>
            </li>
          </ul>

          <strong><i class="fa fa-envelope margin-r-5"></i>  Email</strong>
          <p class="text-muted">
            {{$getuser->email}}
          </p>
          <hr>
          <strong><i class="fa fa-calendar margin-r-5"></i> Tanggal Terdaftar</strong>
          <p class="text-muted">{{ \Carbon\Carbon::parse($getuser->created_at)->format('d-M-y')}}</p>
          <hr>

          {{-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> --}}
        </div><!-- /.box-body -->
      </div><!-- /.box -->

    </div><!-- /.col -->

    <div class="col-md-9">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#activity" data-toggle="tab">Berita yang telah dibuat</a></li>
        </ul>
        <div class="tab-content">
          <div class="active tab-pane" >
              @foreach ($getberita as $key)
                <div class="post">
                <div class="user-block">
                  <span class='username' style="margin-left:0px;">
                    <b></b>
                  </span>
                  <span class='description' style="margin-left:0px;">
                    Judul Berita : {{$key->judul_berita}} &nbsp;&nbsp;||&nbsp;&nbsp; Kategori Berita :  {{$key->nama_kategori}}&nbsp;&nbsp;|| {{ \Carbon\Carbon::parse($key->created_at)->format('d-M-y H:i:s')}} &nbsp;&nbsp; 
                  </span>
                  <span class='description' style="margin-left:0px; padding-top:3px;">
                    @if ($key->flag_publish == 1)
                      <span class="label bg-blue">&nbsp;Sudah Publish</span>
                    @else
                      <span class="label bg-red">&nbsp;Belum Publish</span>
                    @endif
                  </span>
                </div><!-- /.user-block -->
                <p>
                  <?php echo $key->isi_berita; ?>
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
                          <?php echo $key->isi_dumel; ?>
                      </div><!-- /.comment-text -->
                    </div><!-- /.box-comment -->
                  </div><!-- /.box-footer -->
              </div>
              @endforeach
            <div class="box-footer">
              <div class="pagination pagination-sm no-margin pull-right">
                {{ $getberita->links() }}
              </div>
            </div>
          </div><!-- /.tab-pane -->
        </div><!-- /.tab-content -->
      </div><!-- /.nav-tabs-custom -->
    </div><!-- /.col -->

  </div>
  <!-- END FORM -->

  <!-- jQuery 2.1.4 -->
  <script src="{{asset('plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
  <!-- Bootstrap 3.3.5 -->
  <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
  <!-- DataTables -->
  <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
  <!-- SlimScroll -->
  <script src="{{asset('plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
  <!-- FastClick -->
  <script src="{{asset('plugins/fastclick/fastclick.min.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('dist/js/app.min.js')}}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{asset('dist/js/demo.js')}}"></script>

@stop
