@extends('backend.layouts.master')

@section('title')
  <title>Dashboard</title>
  <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap.css')}}">
  <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
@stop

@section('breadcrumb')
  <h1>
    About
    <small>Kelola About</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{url('backend/dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Kelola About</li>
  </ol>
@stop

@section('content')
  <script>
    window.setTimeout(function() {
      $(".alert-info").fadeTo(500, 0).slideUp(500, function(){
          $(this).remove();
      });
    }, 2000);

    window.setTimeout(function() {
      $(".alert-warning").fadeTo(500, 0).slideUp(500, function(){
          $(this).remove();
      });
    }, 5000);
  </script>

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
    @if($getabout == null)
    <form class="form-horizontal" method="post" action="{{route('about.store')}}">
      {{ csrf_field() }}
        <div class="col-md-12">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Form Deskripsi 9 Tins</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="col-md-14">
                <label class="control-label">Nama About</label>
                <input type="text" name="nama_tentang" class="form-control">
              </div>
              <div class="col-md-14 {{ $errors->has('keterangan_tentang') ? 'has-error' : '' }}">
                <label class="control-label" style="margin-bottom:10px;">Isikan About 9 Tins :</label>
                <textarea class="textarea" rows="5" name="keterangan_tentang" placeholder="isi dengan deskripsi singkat dari website 9 Tins" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ old('keterangan_tentang')}}</textarea>
              </div>
              <div class="col-md-14">
                <label class="control-label">Status</label>
                <select class="form-control" name="flag_tentang">
                  <option value="1" id="flag_aktif">Aktif</option>
                  <option value="0" id="flag_nonaktif">Tidak Aktif</option>
                </select>
              </div>
            </div>
            <div class="box-footer">
              <button type="submit" class="btn btn-primary pull-right btn-sm btn-flat">Simpan</button>
            </div>
          </div>
        </div>
    </form>
    @endif


    @if($getabout != null)
    <div class="col-md-12">
      <div class="box box-solid">
        <div class="box-header with-border">
          <h3 class="box-title">&nbsp;&nbsp;&nbsp;About 9 Tins</h3>
        </div>
        <div class="box-body">
          <div class="col-md-14">
            <label class="control-label">Nama About</label>
            <input type="text" readonly="true" name="nama_tentang" class="form-control" value="{!! $getabout->nama_tentang !!}">
          </div>
        </div>
        <div class="box-body">
          <div class="col-md-14">
            <label class="control-label">Status About</label>
            @if($getabout->flag_tentang==1)
              <input type="text" readonly="true" name="nama_tentang" class="form-control" value="Aktif">
            @else
              <input type="text" readonly="true" name="nama_tentang" class="form-control" value="Tidak Aktif">
            @endif
          </div>
        </div>
        <div class="box-body clearfix">
          <blockquote class="pull-left">
            {!! $getabout->keterangan_tentang !!}
          </blockquote>
        </div>
        <div class="box box-footer">
          <span data-toggle="tooltip" title="Edit">
            <a href="" class="btn btn-warning btn-flat btn-xs edit" data-toggle="modal" data-target="#myModalEdit" data-value="{{ $getabout->id }}"><i class="fa fa-edit"></i> Ubah About 9 Tins</a>
          </span>
        </div>
      </div>
    </div>
    @endif

    @if($getabout != null)
      <div class="modal fade" id="myModalEdit" role="dialog">
        <div class="modal-dialog" style="width:700px;">
          <form class="form-horizontal" action="{{route('about.edit')}}" method="post">
            {!! csrf_field() !!}
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Ubah About 9 Tins</h4>
              </div>
              <div class="modal-body">
                  <div class="col-md-14">
                  <label class="control-label">Nama About</label>
                  <input type="text" name="nama_tentang" class="form-control">
                </div>
                <div class="col-md-14 {{ $errors->has('keterangan_tentang') ? 'has-error' : '' }}">
                  <label class="control-label" style="margin-bottom:10px;">Isikan About 9 Tins :</label>
                  <textarea class="textarea" rows="5" name="keterangan_tentang" placeholder="isi dengan deskripsi singkat dari website 9 Tins" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ old('keterangan_tentang')}}</textarea>
                  <input type="hidden" name="id" value="{{ $getabout->id}}">
                </div>
                <div class="col-md-14">
                  <label class="control-label">Status</label>
                  <select class="form-control" name="flag_tentang">
                    <option value="1" id="flag_aktif">Aktif</option>
                    <option value="0" id="flag_nonaktif">Tidak Aktif</option>
                  </select>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-flat">Simpan</button>
              </div>
            </div>
        </form>
        </div>
      </div>
      @endif
  </div>

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

  <script src="{{asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<script>
  $(function () {
    $(".textarea").wysihtml5({
      toolbar: {
        "font-styles": true, //Font styling, e.g. h1, h2, etc.
        "emphasis": true, //Italics, bold, etc.
        "lists": true, //(Un)ordered lists, e.g. Bullets, Numbers.
        "html": false, //Button which allows you to edit the generated HTML.
        "link": false, //Button to insert a link.
        "image": false, //Button to insert an image.
        "color": false, //Button to change color of font
        "blockquote" : false
     }
    });
  });
</script>

@stop
