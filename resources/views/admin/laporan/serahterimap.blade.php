<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>
    <table border=0 width="100%">
        <tr>
            <td width="15%" style="text-align: right">
                <img src="/logo/kandangan.png" width="60%">
            </td>
            <td style="text-align: center">
                <b>PENGAJUAN BANTUAN BIBIT PERKEBUNAN PADA DINAS PERTANIAN<br/>
                    KABUPATEN HULU SUNGAI SELATAN<br/>
                KALIMANTAN SELATAN<br/></b>
                Alamat: Jl. Singakarsa No.38, Kandangan Bar., Kec. Kandangan, Kabupaten Hulu Sungai Selatan, Kalimantan Selatan 71213
                

            </td>
            <td width="15%" style="text-align: right">
                
            </td>
        </tr>
        <tr>
            <td colspan=3 style="text-align:center"><br/><strong><u>LAPORAN SERAH TERIMA</u></strong></td>
        </tr>
        <tr>
            <td colspan=3 style="text-align:center">Periode {{\Carbon\Carbon::parse($from)->translatedFormat('d F Y')}} s/d {{\Carbon\Carbon::parse($to)->translatedFormat('d F Y')}}</td>
        </tr>
    </table>
    <br/>
    <table border=1 cellspacing="0" cellpadding="3" width="100%">
        <tr>
            <th class="text-center">No</th>
            <th>Tanggal Pengajuan</th>
            <th>Nama Kelompok Tani</th>
            <th>Nama Akun</th>
            <th>ALamat</th>
            <th>Email</th>
            <th>Bibit Yang Diserahkan</th>
            <th>Tanggal Diserahkan</th>
            <th>Pengirim dan Penerima</th>
            
          </tr>
        @php
            $no =1;
        @endphp
         @foreach ($data as $key => $item)
         <tr>
            <td class="text-center">{{$no++}}</td>
            <td>{{\Carbon\Carbon::parse($item->tanggal)->format('d-m-Y')}}</td>
            <td>{{$item->nama_kelompok}}</td>
            <td>{{$item->nama}}</td>
            <td>{{$item->alamat}}</td>
            <td>{{$item->email}}</td>
            <td>
              
              @foreach ($item->detail as $item2)
                  <li>{{$item2->bibit == null ? "": $item2->bibit->nama}}, jumlah : {{$item2->jumlah}}</li>
              @endforeach
              @if ($item->status == null)
              <a href="#" class="btn btn-xs btn-success tambah-bibit" data-id="{{$item->id}}"><i class="fa fa-plus-circle"></i></a>
              @endif
            </td>
            <td>
              @if ($item->tgl_serah_terima == null)
                  
                <a href="#" class="btn btn-xs btn-success serahterima" data-id="{{$item->id}}"><i class="fa fa-calendar"></i></a>
              @else
                  
                {{\Carbon\Carbon::parse($item->tgl_serah_terima)->format('d-m-Y')}} 
                <a href="#" class="btn btn-xs btn-success serahterima" data-id="{{$item->id}}"><i class="fa fa-calendar"></i></a>
              @endif
            </td>
            <td>
                Pengirim : {{$item->pengirim}}<br/>
                Penerima : {{$item->penerima}}
            </td>
             
             
         </tr>
         @endforeach
    </table>
    <br/>
    <table width="100%">
        <tr>
            <td width="60%"></td>
            <td>
                Kandangan, {{\Carbon\Carbon::today()->translatedFormat('d F Y')}}, <br/>
                Dinas Pertanian<br/>
                Kepala,
                <br/><br/><br/><br/><br/>


                <b><u>Riyadi Bayu</u></b><br/>
                NIP. 19278979274981273

            </td>
        </tr>
    </table>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>

$(document).ready(function(){
    window.print();
});
</script>
</html>