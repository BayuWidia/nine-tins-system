@extends('backend.layouts.master')

@section('title')
  <title>Dashboard</title>
  <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
@stop

@section('breadcrumb')
  <h1>
    Management Pesan 
    <small>Preview Pesan</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Lihat Pesan</li>
  </ol>
@stop

@section('content')
  <div class="row">
     <form class="form-horizontal" action="{{route('pesan.update')}}" method="post">
        {{csrf_field()}}
    <div class="col-md-12">
      <div class="box box-widget">
        <div class="box-header with-border">
          <div class="user-block">
            <img class="img-circle" src="{{ asset('/images/userdefault.png') }}" alt="user image">
            <span class="username"><a>{{$getpesan->nama}}</a></span>
            <span class="description">
              <b>Email</b> : {{$getpesan->email}} || <b>Subject</b> : {{$getpesan->subject}}
            </span>
          </div><!-- /.user-block -->
          <div class="box-tools">
            <span class="label label-info">{{ \Carbon\Carbon::parse($getpesan->created_at)->format('d-M-y')}}</span>
          </div><!-- /.box-tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
          <!-- post text -->
          <b>Pesan</b> : {{$getpesan->pesan}}
          <hr/>
            @if($getpesan->flag_pesan == '1')
            <textarea name="tanggapan" class="form-control" rows="5" cols="40" readonly="true" 
            style="border:1px solid #DD4B39;margin-top:5px;"><?php echo $getpesan->tanggapan ?></textarea>
            @else
            <label class="{{ $errors->has('tanggapan') ? 'has-error' : '' }}">
              Tanggapan:
            </label>
            <textarea name="tanggapan" class="form-control" rows="5" cols="40" placeholder="Tulis tanggapan anda di sini.."
            >{{ old('tanggapan') }}</textarea>
            @if($errors->has('tanggapan'))
              <span class="help-block">
                <strong>{{ $errors->first('tanggapan')}}
                </strong>
              </span>
            @endif
             <input type="hidden" name="id" value="{{$getpesan->id}}">
            @endif
        </div><!-- /.box-body -->

        <div class="box-footer">
           @if($getpesan->flag_pesan == '0')
            <span data-toggle="tooltip">
              <button type="submit" class="btn btn-warning btn-flat pull-right">Tanggap</button>
            </span>
          @endif
          <span data-toggle="tooltip">
            <a class="btn btn-info btn-flat pull-left" href="{{ URL::previous() }}">Kembali Kehalaman Sebelumnya</a>
          </span>
        </div><!-- /.box-footer -->

      </div>
    </div>
    </form>
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

@stop
