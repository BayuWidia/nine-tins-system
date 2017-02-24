@extends('backend.layouts.master')

@section('title')
  <title>Dashboard</title>
  <link rel="stylesheet" href="{{asset('plugins/iCheck/all.css')}}">
  <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
  <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap-tagsinput.css')}}">
  <script src="{{asset('plugins/ckeditor/ckeditor.js')}}"></script>
  <script src="{{asset('plugins/ckfinder/ckfinder.js')}}"></script>
  <link rel="stylesheet" href="{{asset('plugins/select2/select2.min.css')}}">
@stop

@section('breadcrumb')
  <h1>
    Management Bagi Pengetahuan
    <small>Tambah Berita Baru</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{url('backend/dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Tambah Berita Baru</li>
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
    <div class="col-md-12">
      <form class="form-horizontal"
        @if(isset($editberita))
          action="{{route('pengetahuan.update')}}"
        @else
          action="{{route('pengetahuan.store')}}"
        @endif
      method="post" style="margin-top:10px;" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="box box-primary">
          <div class="box-header">
            @if(isset($editberita))
              <h3 class="box-title">Form Edit Berita</h3>
            @else
              <h3 class="box-title">Form Tambah Berita Baru</h3>
            @endif
          </div><!-- /.box-header -->
          <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Judul Konten</label>
                <div class="col-sm-5">
                  @if(isset($editberita))
                    <input type="hidden" name="id" value="{{$editberita->id}}">
                  @endif
                  <input type="text" class="form-control" name="judul_berita"
                    @if(isset($editberita))
                      value="{{$editberita->judul_berita}}"
                    @endif
                  >
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Kategori</label>
                <div class="col-sm-5">
                  <select class="form-control select2" name="id_kategori">
                    <option>-- Pilih --</option>
                      @if(!$getkategori->isEmpty())
                        @if(isset($editberita))
                          @foreach($getkategori as $key)
                            @if($editberita->id_kategori==$key->id)
                              <option value="{{$key->id}}" selected="true">{{$key->nama_kategori}}</option>
                            @else
                              <option value="{{$key->id}}">{{$key->nama_kategori}}</option>
                            @endif
                          @endforeach
                        @else
                          @foreach($getkategori as $key)
                            <option value="{{$key->id}}">{{$key->nama_kategori}}</option>
                          @endforeach
                        @endif
                      @endif
                  </select>
                  @if($getkategori->isEmpty())
                    <span style="color:red;">* Anda belum memiliki kategori</span>
                  @endif
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Tanggal Posting</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control" name="tanggal_posting"
                    @if(isset($editberita))
                      value="{{ \Carbon\Carbon::parse($editberita->created_at)->format('d-M-y')}}" readonly>
                    @else
                      value="<?php echo date('d-M-y'); ?>" readonly>
                    @endif
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Foto Header</label>
                <div class="col-sm-3">
                  <input type="file" class="form-control" name="url_foto">
                  @if(isset($editberita))
                    <span style="color:red;">* Biarkan kosong jika tidak ingin diganti.</span>
                  @else 
                    <span class="text-muted"><i>* Rekomendasi ukuran terbaik: 850px X 400px.</i></span>
                  @endif
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Tags</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" name="tags" data-role="tagsinput" id="tagsinput"
                    @if(isset($editberita))
                      value="{{$editberita->tags}}"
                    @endif
                  >
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Headline</label>
                <div class="col-sm-4">
                  <input type="checkbox" class="flat-red"
                    @if(isset($editberita))
                      @if($editberita->flag_headline=="1")
                        checked
                      @endif
                    @endif
                   name="flag_headline" value="1">
                  <span class="text-muted">&nbsp;&nbsp;* Ya, tampilkan berita ini sebagai Headline</span>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Isi Konten</label>
                <div class="col-sm-9">
                  <textarea name="isi_berita" id="editor1" required="true">
                    @if(isset($editberita))
                      {{$editberita->isi_berita}}
                    @endif
                  </textarea>
                </div>
              </div>
          </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-primary pull-right btn-flat">Simpan</button>
            <button type="reset" class="btn btn-danger pull-right btn-flat" style="margin-right:5px;">Reset Form</button>
          </div>
        </div><!-- /.box -->
      </form>
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
  <script src="{{asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"'></script>
  <script src="{{asset('plugins/select2/select2.full.min.js')}}"></script>

  <script type="text/javascript">
  $(".select2").select2();
  </script>
  <script>
    window.setTimeout(function() {
      $(".alert-success").fadeTo(500, 0).slideUp(500, function(){
          $(this).remove();
      });
    }, 2000);
  </script>

  <script type="text/javascript">
    $(function(){
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });

        $('#tagsinput').tagsinput();
    })
  </script>

  <script language="javascript">
    CKEDITOR.replace('editor1');
    CKFinder.setupCKEditor( null, { basePath : '{{url('/')}}/plugins/ckfinder/'} );
    $(".textarea").wysihtml5();
  </script>

@stop
