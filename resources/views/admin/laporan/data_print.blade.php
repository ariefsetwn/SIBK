<!DOCTYPE html>
<html>
<head>
	<title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

	<div class="container">
    <center style="line-height: 5px">
      <h3>LAPORAN DATA PELANGGARAN SISWA</h3>
      <h4>SMPN 1 RAJEG</h4>
      <p>Jalan Raya Rajeg, Sukamanah, Rajeg, Kec. Rajeg, Kab. Tangerang, Banten 15540</p>
    </center>
		{{-- <hr class="border-info"> --}}
      <table class="static" border="1px" align="center" id="dataTable" width="100%" cellpadding="5" cellspacing="0">
        <thead>
          <tr>
            <td>No</td>
            <th>NIS</th>
            <th>Nama Siswa</th>
            <th>Tanggal Pelanggaran</th>
            <th>Kategori Pelanggaran</th>
            <th>Poin</th>
          </tr>
        </thead>
        <tbody>
        @php $i = 1 @endphp
        @foreach ($pelanggaran_siswa as $p)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{ $p->nis }}</td>
            <td>{{ $p->siswa->nama }}</td>
            <td>{{ $p->tanggal }}</td>
            <td>{{ $p->kategori->nama }}</td>
            <td align="center" >{{ $p->kategori->poin}}</td>
          </tr>
         @endforeach
        </tbody>
      </table>

	</div>

</body>
</html>
