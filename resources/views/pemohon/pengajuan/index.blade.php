@extends('layouts.app')
@push('css')
    
@endpush
@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
          <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title"><i class="fa fa-clipboard"></i> Data Pengajuan Bibit</h3>
    
              <div class="box-tools">
                <a href="/pemohon/pengajuan/create" class="btn btn-sm btn-success "><i class="fa fa-plus-circle"></i> Tambah</a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody>
                <tr>
                  <th class="text-center">No</th>
                  <th>Tanggal</th>
                  <th>Nama Kelompok Tani</th>
                  <th>ALamat</th>
                  <th>Email</th>
                  <th>Bibit Yang Diajukan</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                @foreach ($pengajuan as $key => $item)
                <tr>
                    <td class="text-center">{{$pengajuan->firstItem() + $key}}</td>
                    <td>{{$item->tanggal}}</td>
                    <td>{{$item->nama_kelompok}}</td>
                    <td>{{$item->alamat}}</td>
                    <td>{{$item->email}}</td>
                    <td>
                      
                      @foreach ($item->detail as $item2)
                          <li>{{$item2->bibit->nama}}, jumlah : {{$item2->jumlah}}</li>
                      @endforeach
                      @if ($item->status == null)
                      <a href="#" class="btn btn-xs btn-success tambah-bibit" data-id="{{$item->id}}"><i class="fa fa-plus-circle"></i></a>
                      @endif
                    </td>
                    <td>
                      @if ($item->status == 1)
                          <span class="label label-primary">Menunggu Validasi</span>
                      @endif

                      @if ($item->status == 2)
                          <span class="label label-success">di setujui</span>
                      @endif
                    </td>
                    
                    <td>
                      @if ($item->status == null)
                        <a href="/pemohon/pengajuan/edit/{{$item->id}}" class="btn btn-xs btn-flat  btn-success"><i class="fa fa-edit"></i></a>
                        <a href="/pemohon/pengajuan/delete/{{$item->id}}"
                            onclick="return confirm('Yakin ingin di hapus');"
                            class="btn btn-xs btn-flat  btn-danger"><i class="fa fa-trash"></i></a>
                        <a href="/pemohon/pengajuan/ajukan/{{$item->id}}"
                              onclick="return confirm('Ketika sudah di ajukan, tidak bisa di hapus/edit, yakin?');"
                              class="btn btn-xs btn-flat  btn-danger"><i class="fa fa-send"></i>Ajukan</a>
                      @endif
                    </td>
                </tr>
                @endforeach
                
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          {{$pengajuan->links()}}
        </div>
    </div>
</section>

<!-- /.modal -->
<div class="modal fade" id="modal-tambah">
  <div class="modal-dialog">
      <div class="modal-content">
          <form method="post" action="/pemohon/pengajuan/bibit" enctype="multipart/form-data">
              @csrf
              
              <div class="modal-header bg-success">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Pilih Bibit</h4>
              </div>

              <div class="modal-body">
                  <div class="form-group">
                      <label>Bibit</label>
                      <select class="form-control" name="bibit_id"> 
                        @foreach ($bibit as $item)
                            <option value="{{$item->id}}">{{$item->nama}}, Stok : {{$item->stok}}</option>
                        @endforeach
                      </select>
                  </div>
                  <div class="form-group">
                      <label>Jumlah</label>
                      <input type="text" class="form-control" name="jumlah" required onkeypress="return hanyaAngka(event)"/>
                  </div>
                  <div class="form-group">
                      <label>Pengajuan ID</label>
                      <input type="text" class="form-control" id="pengajuan_id" name="pengajuan_id" readonly>
                  </div>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary"><i class="fa fa-send"></i>
                      Kirim</button>
              </div>
          </form>
      </div>
  </div>
</div>
@endsection
@push('js')

<script>
  $(document).on('click', '.tambah-bibit', function() {
    $('#pengajuan_id').val($(this).data('id'));
     $("#modal-tambah").modal();
  });
  </script>
  <script>
		function hanyaAngka(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))
 
		    return false;
		  return true;
		}
	</script>
  
@endpush

