@extends('backend.layouts.master')

@section('title')
  <title>Dashboard</title>
  <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
@stop

@section('breadcrumb')
  <h1>
    Dashboard
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{url('backend/dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
@stop

@section('content')
  <div class="row">
    <div class="col-lg-3 col-md-3 col-xs-12">
      <!-- small box -->
      <div class="small-box bg-primary">
        <div class="inner">
          <h3>
            {{$countproject}}
            <sup style="font-size: 20px"></sup></h3>
          <p>Jumlah Project</p>
        </div>
        <div class="icon">
          <i class="fa fa-briefcase"></i>
        </div>
        <a href="{{url('admin/lihat-project')}}"
         class="small-box-footer">Lihat Data Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div><!-- ./col -->

    <div class="col-lg-3 col-md-3 col-xs-12">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3>
            {{$countberita}}
            <sup style="font-size: 20px"></sup></h3>
          <p>Jumlah Berita</p>
        </div>
        <div class="icon">
          <i class="fa fa-microphone"></i>
        </div>
        <a class="small-box-footer">
          <i>
            {{$countberita}}
            data berita yang telah terbuat</i>
        </a>
      </div>
    </div><!-- ./col -->

    <div class="col-lg-3 col-md-3 col-xs-12">
      <!-- small box -->
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3>
            {{$countsudahterdaftar}}
            <sup style="font-size: 20px"></sup></h3>
          <p>Jumlah User</p>
        </div>
        <div class="icon">
          <i class="fa fa-users"></i>
        </div>
        <a class="small-box-footer">
          <i>
            {{$countsudahterdaftar}}
            data user yang telah terdaftar</i>
        </a>
      </div>
    </div><!-- ./col -->

    <div class="col-lg-3 col-md-3 col-xs-12">
      <!-- small box -->
      <div class="small-box bg-maroon">
        <div class="inner">
          <h3>
            {{$countclient}}
            <sup style="font-size: 20px"></sup></h3>
          <p>Jumlah Client</p>
        </div>
        <div class="icon">
          <i class="fa fa-building-o"></i>
        </div>
        <a class="small-box-footer">
          <a href="{{url('admin/lihat-client')}}"
         class="small-box-footer">Lihat Data Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
        </a>
      </div>
    </div><!-- ./col -->

  </div>

  <div class="row">
    <div class="col-md-8">
      <div class="box box-danger">
            <div class="box-header">
              <i class="ion ion-speakerphone"></i>

              <h3 class="box-title">Berita Terbaru</h3>
            </div>
            <div class="box-body chat" id="chat-box">
              <!-- chat item -->
              @if($beritaterbaru != null)
                @foreach ($beritaterbaru as $key)
                <div class="item">
                  @if($key->url_foto == null)
                  <img class="img-bordered-sm img-responsive img-circle" src="{{ asset('/images/userdefault.png') }}" alt="User Avatar">
                @else
                  <img class="img-bordered-sm img-responsive img-circle" src="{{ asset('/images/'.$key->url_foto) }}" alt="{{$key->name}}">
                @endif

                  <p class="message">
                    <a href="{{route('berita.user', $key->id_user)}}" class="name">
                      <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> {{ \Carbon\Carbon::parse($key->created_at)->format('H:i:s')}}</small>
                      <small class="text-muted pull-right"><i class="fa fa-calendar margin-r-5"></i> {{ \Carbon\Carbon::parse($key->created_at)->format('d-M-y')}}&nbsp;&nbsp;</small>
                      {{$key->name}}
                    </a>
                    <?php echo substr(strip_tags($key->isi_berita), 0,300); ?>...
                  </p>
                  <div class="attachment" style="border:1px solid #F39C12;">
                    <h4>Isi Dumelan:</h4>

                    <p class="filename">
                      <?php echo substr(strip_tags($key->isi_dumel), 0,300) ; ?>...
                    </p>
                    <div class="pull-right">
                      @if($key->flag_publish == 0)
                        <span class="label label-danger">Belum Dipublish</span>
                      @else
                        <span class="label label-info">Sudah Dipublish</span>
                      @endif
                    </div>
                  </div>
                </div>
                @endforeach
              @else
                  <h5 class="text-muted" colspan="5" style="text-align:center;">
                    Data Berita terbaru tidak tersedia.
                  </h5>
              @endif
              <!-- /.item -->
            </div>
          </div>
    </div>
    <div class="col-md-4">
      <div class="box box-danger">
          <div class="box-header with-border">
            <h3 class="box-title">Latest Members</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body no-padding">
            <ul class="users-list clearfix">
              @foreach ($users as $key)
                <li>
                  @if($key->url_foto == null)
                    <img class="img-bordered-sm img-responsive img-circle" src="{{ asset('/images/userdefault.png') }}" alt="User Avatar">
                  @else
                    <img class="img-bordered-sm img-responsive img-circle" src="{{ asset('/images/'.$key->url_foto) }}" alt="{{$key->name}}">
                  @endif
                  <a class="users-list-name" href="{{route('berita.user', $key->id)}}">{{ $key->name}}</a>
                </li>
              @endforeach
            </ul>
            <!-- /.users-list -->
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <div class="pagination pagination-sm no-margin pull-right">
              {{ $users->links() }}
            </div>
        </div>
          <!-- /.box-footer -->
        </div>
    </div>
  </div>

  <div class="row">
    <section class="col-md-12">

    </section>
  </div><!-- /.row (main row) -->

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
