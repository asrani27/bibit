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
                <img src="/logo/kejari.png" width="60%">
            </td>
            <td style="text-align: center">
                <b>KEJAKSAAN NEGERI HULU SUNGAI UTARA<br/>
                KALIMANTAN SELATAN<br/></b>
                

            </td>
            <td width="15%" style="text-align: right">
                
            </td>
        </tr>
        <tr>
            <td colspan=3 style="text-align:center"><br/><strong><u>LAPORAN TINDAK KEKERASAN PADA ANAK</u></strong></td>
        </tr>
    </table>
    <br/>
    <table border=1 cellspacing="0" cellpadding="3" width="100%">
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Tersangka</th>
            <th>Korban</th>
            <th>Penyidik</th>
            <th>Kejadian</th>
            <th>Pasal</th>
            <th>Estimasi Penahanan</th>
            <th>JPU 1</th>
            <th>JPU 2</th>
        </tr>
        @php
            $no =1;
        @endphp
        @foreach ($data as $key => $item)
            <tr>
                <td style="text-align: center">{{$no++}}</td>
                <td style="text-align: center">{{\Carbon\Carbon::parse($item->tanggal)->format('d M Y')}}</td>
                <td style="text-align: center">{{$item->tersangka == null ? '' : $item->tersangka->nama}}</td>
                <td style="text-align: center">{{$item->korban == null ? '' : $item->korban->nama}}</td>
                <td style="text-align: center">{{$item->penyidik == null ? '' : $item->penyidik->nama}}</td>
                <td style="text-align: center">{{$item->kejadian}}</td>
                <td style="text-align: center">{{$item->pasal}}</td>
                <td style="text-align: center">{{$item->penahanan}}</td>
                <td style="text-align: center">{{$item->nama_jpu1}}</td>
                <td style="text-align: center">{{$item->nama_jpu2}}</td>
                
            </tr>
        @endforeach
    </table>
    <br/>
    <table width="100%">
        <tr>
            <td width="60%"></td>
            <td>
                Amuntai, {{\Carbon\Carbon::today()->translatedFormat('d F Y')}}, <br/>
                Kejaksaan Negeri Hulu Sungai Utara<br/>
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