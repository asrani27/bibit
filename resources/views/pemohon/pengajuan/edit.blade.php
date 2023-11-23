@extends('layouts.app')
@push('css')

@endpush
@section('content')
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-clipboard"></i> Edit Data</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal" action="/pemohon/pengajuan/edit/{{$data->id}}" method="post">
          @csrf
          <div class="box-body">
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Nama Kelompok Tani</label>
              <div class="col-sm-10">
                <input type="text" name="nama" class="form-control" readonly value="{{$data->nama}}">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Alamat Kelompok Tani</label>
              <div class="col-sm-10">
                <input type="text" name="alamat" class="form-control" required value="{{$data->alamat}}">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
              <div class="col-sm-10">
                <input type="text" name="email" class="form-control"  value="{{$data->email}}" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label"></label>
              <div class="col-sm-10">
                <button type="submit" class="btn btn-success btn-block"><i class="fa fa-save"></i> Simpan</button>
                <a href="/pemohon/pengajuan" class="btn bg-gray btn-block"><i class="fa fa-arrow-left"></i> Kembali</a>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

</section>


@endsection
@push('js')

@endpush