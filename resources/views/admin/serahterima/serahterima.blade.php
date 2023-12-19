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
            <td colspan=3 style="text-align:center"><br/><strong><u>SURAT SERAH TERIMA BIBIT</u></strong></td>
        </tr>
    </table>
    <br/>
    Kami yang bertanda tangan di bahwa ini <br/>
Nama 			  :{{$data->pengirim}} <br/>

Selanjutnya di sebut <strong>Pihak Pertama / Yang menyerahkan</strong> <br/> <br/>
Nama 			   : {{$data->penerima}} <br/>
Kelompok Tani 	   : {{$data->nama_kelompok}}<br/>  
Alamat             : {{$data->alamat}}<br/>
Selanjutnya di sebut <strong>Pihak Kedua / penerima</strong><br/><br/>


    Tanggal Pengajuan : {{\Carbon\Carbon::parse($data->tanggal)->translatedFormat('d F Y')}}<br/>
  
    PIHAK PERTAMA menyerahkan bibit kepada PIHAK KEDUA dan PIHAK KEDUA menyatakan telah menerima bibit dari PIHAK pertama berupa :
    <table border=1 cellspacing="0" cellpadding="3" width="100%">
        <tr>
            <th class="text-center">No</th>
            <th>Bibit Yang Diserahkan</th>
            <th>Jumlah</th>
          </tr>
        @php
            $no =1;
        @endphp
         @foreach ($data->detail as $key => $item)
         <tr>
            <td style="text-align: center">{{$no++}}</td>
            <td>{{$item->bibit == null ? "": $item->bibit->nama}}</td>
            <td style="text-align: center">{{$item->jumlah}}</td>
             
         </tr>
         @endforeach
    </table>
    <br/>
    <table width="100%">
        <tr>
            <td width="50%" style="text-align: center"><br/>Yang Menyerahkan,

                <br/><br/><br/><br/><br/>


                <b><u>{{$data->pengirim}}</u></b><br/>
                
            </td>
            <td style="text-align: center" width="50%">
                Kandangan, {{\Carbon\Carbon::today()->translatedFormat('d F Y')}}, <br/>
                Yang Menerima,
                <br/><br/><br/><br/><br/>


                <b><u>{{$data->penerima}}</u></b><br/>

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