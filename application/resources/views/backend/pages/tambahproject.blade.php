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
    Management Project
    <small>Tambah Project</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{url('backend/dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Tambah Project</li>
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
        @if(isset($editproject))
          action="{{route('project.update')}}"
        @else
          action="{{route('project.store')}}"
        @endif
      method="post" style="margin-top:10px;" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="box box-danger">
          <div class="box-header">
            @if(isset($editproject))
              <h3 class="box-title">Form Edit project</h3>
            @else
              <h3 class="box-title">Form Tambah project</h3>
            @endif
          </div><!-- /.box-header -->
          <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Client</label>
                <div class="col-sm-5">
                  <select class="form-control select2" name="id_client">
                    <option>-- Pilih --</option>
                      @if(!$getclient->isEmpty())
                        @if(isset($editproject))
                          @foreach($getclient as $key)
                            @if($editproject->id_client==$key->id)
                              <option value="{{$key->id}}" selected="true">{{$key->nama_client}}</option>
                            @else
                              <option value="{{$key->id}}">{{$key->nama_client}}</option>
                            @endif
                          @endforeach
                        @else
                          @foreach($getclient as $key)
                            <option value="{{$key->id}}">{{$key->nama_client}}</option>
                          @endforeach
                        @endif
                      @endif
                  </select>
                  @if($getclient->isEmpty())
                    <span style="color:red;">* Anda belum memiliki client</span>
                  @endif
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Kategori Project</label>
                <div class="col-sm-5">
                  <select class="form-control select2" name="id_kategori_project">
                    <option>-- Pilih --</option>
                      @if(!$getkategoriproject->isEmpty())
                        @if(isset($editproject))
                          @foreach($getkategoriproject as $key)
                            @if($editproject->id_kategori_project==$key->id)
                              <option value="{{$key->id}}" selected="true">{{$key->nama_kategori_project}}</option>
                            @else
                              <option value="{{$key->id}}">{{$key->nama_kategori_project}}</option>
                            @endif
                          @endforeach
                        @else
                          @foreach($getkategoriproject as $key)
                            <option value="{{$key->id}}">{{$key->nama_kategori_project}}</option>
                          @endforeach
                        @endif
                      @endif
                  </select>
                  @if($getkategoriproject->isEmpty())
                    <span style="color:red;">* Anda belum memiliki kategori</span>
                  @endif
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Lokasi</label>
                <div class="col-sm-5">
                  <select class="form-control select2" name="id_lokasi">
                    <option>-- Pilih --</option>
                      @if(!$getlokasi->isEmpty())
                        @if(isset($editproject))
                          @foreach($getlokasi as $key)
                            @if($editproject->id_lokasi==$key->id)
                              <option value="{{$key->id}}" selected="true">{{$key->nama_lokasi}}</option>
                            @else
                              <option value="{{$key->id}}">{{$key->nama_lokasi}}</option>
                            @endif
                          @endforeach
                        @else
                          @foreach($getlokasi as $key)
                            <option value="{{$key->id}}">{{$key->nama_lokasi}}</option>
                          @endforeach
                        @endif
                      @endif
                  </select>
                  @if($getlokasi->isEmpty())
                    <span style="color:red;">* Anda belum memiliki lokasi</span>
                  @endif
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Nama project</label>
                <div class="col-sm-5">
                  @if(isset($editproject))
                    <input type="hidden" name="id" value="{{$editproject->id}}">
                  @endif
                  <input type="text" class="form-control" name="nama_project"
                    @if(isset($editproject))
                      value="{{$editproject->nama_project}}"
                    @endif
                  >
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Keterangan project</label>
                <div class="col-sm-5">
                  <textarea name="keterangan_project" rows="4" cols="40" class="form-control"> @if(isset($editproject))
                      {{$editproject->keterangan_project}}
                    @endif</textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Waktu Project</label>
                <div class="col-sm-5">
                  <select class="form-control select2" name="waktu_project">
                    <option>-- Pilih --</option>
                        @if(isset($editproject))
                            @if($editproject->waktu_project=='3 Bulan')
                              <option value="3 Bulan" selected="true">1-3 Bulan</option>
                              <option value="6 Bulan">3-6 Bulan</option>
                              <option value="9 Bulan">6-9 Bulan</option>
                              <option value="12 Bulan">9-12 Bulan</option>
                            @elseif($editproject->waktu_project=='6 Bulan')
                              <option value="3 Bulan">1-3 Bulan</option>
                              <option value="6 Bulan" selected="true">3-6 Bulan</option>
                              <option value="9 Bulan">6-9 Bulan</option>
                              <option value="12 Bulan">9-12 Bulan</option>
                            @elseif($editproject->waktu_project=='9 Bulan')
                              <option value="3 Bulan">1-3 Bulan</option>
                              <option value="6 Bulan">3-6 Bulan</option>
                              <option value="9 Bulan" selected="true">6-9 Bulan</option>
                              <option value="12 Bulan">9-12 Bulan</option>
                            @elseif($editproject->waktu_project=='12 Bulan')
                              <option value="12 Bulan" selected="true">9-12 Bulan</option>
                              <option value="3 Bulan">1-3 Bulan</option>
                              <option value="6 Bulan">3-6 Bulan</option>
                              <option value="9 Bulan">6-9 Bulan</option>
                            @endif
                        @else
                            <option value="3 Bulan">1-3 Bulan</option>
                            <option value="6 Bulan">3-6 Bulan</option>
                            <option value="9 Bulan">6-9 Bulan</option>
                            <option value="12 Bulan">9-12 Bulan</option>
                        @endif
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Status Project</label>
                <div class="col-sm-5">
                  <select class="form-control select2" name="status_project">
                    <option>-- Pilih --</option>
                        @if(isset($editproject))
                            @if($editproject->status_project=='0')
                              <option value="0" selected="true">Start</option>
                              <option value="1">Progress</option>
                              <option value="2">Done</option>
                              <option value="3">Terminate</option>
                            @elseif($editproject->status_project=='1')
                              <option value="0">Start</option>
                              <option value="1" selected="true">Progress</option>
                              <option value="2">Done</option>
                              <option value="3">Terminate</option>
                            @elseif($editproject->status_project=='2')
                              <option value="0">Start</option>
                              <option value="1">Progress</option>
                              <option value="2" selected="true">Done</option>
                              <option value="3">Terminate</option>
                            @elseif($editproject->status_project=='3')
                              <option value="0">Start</option>
                              <option value="1">Progress</option>
                              <option value="2">Done</option>
                              <option value="3" selected="true">Terminate</option>
                            @endif
                        @else
                            <option value="0">Start</option>
                            <option value="1">Progress</option>
                            <option value="2">Done</option>
                            <option value="3">Terminate</option>
                        @endif
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Logo Project</label>
                <div class="col-sm-3">
                  <input type="file" class="form-control" name="logo_project">
                  @if(isset($editproject))
                    <span style="color:red;">* Biarkan kosong jika tidak ingin diganti.</span>
                  @endif
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Teknologi</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" name="tags" data-role="tagsinput" id="tagsinput"
                    @if(isset($editproject))
                      value="{{$editproject->tags}}"
                    @endif
                  >
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Harga Project</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="harga_project"
                    @if(isset($editproject))
                      value="{{$editproject->harga_project}}"
                    @endif
                  >
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
