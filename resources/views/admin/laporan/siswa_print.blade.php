<!DOCTYPE html>
<html>
<head>
	<title>Siswa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="container">

	<center><font size="5"><b>LAPORAN DATA PELANGGARAN SISWA</b><br/><b>SMPN 1 RAJEG</b><br/></font>Jalan Raya Rajeg, Sukamanah, Rajeg, Kec. Rajeg, Kab. Tangerang, Banten 15540 </center>
		{{-- <h3 class="text-center font-weight-bold">LAPORAN DATA PELANGGARAN SISWA
			<br/>SMPN 1 RAJEG<br/>
		</h3>Jalan Raya Rajeg, Sukamanah, Rajeg, Kec. Rajeg, Kab. Tangerang, Banten 15540 --}}
	<br/><br/>
	<b>DATA PROFIL SISWA<b/>
	<table width="100%">
		<tr>
			<td width="3%">1.</td>
			<td width="20%">NIS</td>
			<td width="3%">:</td>
			<td width="74%">{{$siswa->nis}}</td>
		</tr>
		<tr>
			<td>2.</td>
			<td>Nama</td>
			<td>:</td>
			<td>{{ $siswa->nama }}</td>
		</tr>
		<tr>
			<td>3.</td>
			<td>Jenis Kelamin</td>
			<td>:</td>
			<td>{{ $siswa->jenis_kelamin }}</td>
		</tr>
		<tr>
			<td>4.</td>
			<td>Kelas</td>
			<td>:</td>
			<td>{{ $siswa->kelas->nama }}</td>
		</tr>
		<tr>
			<td>5.</td>
			<td>Tahun Ajaran</td>
			<td>:</td>
			<td>{{ $siswa->tahun_ajaran->nama }}</td>
		</tr>

	</table>
	<br>
	<table class="static mt-4" border="1px" align="center" id="dataTable" width="100%" cellpadding="5" cellspacing="0">
		<thead>
			<tr>
				<th>No</th>
				<th>Tanggal Pelanggaran</th>
				<th>Kategori Pelanggaran</th>
				<th>Poin</th>
			</tr>
		</thead>
		@foreach ($pelanggaran_siswa as $p)
		<tbody>
			<tr>
				<td>{{ $loop->iteration }}</td>
				<td>{{ date("d-m-Y", strtotime($p->tanggal)) }}</td>
				<td>{{ $p->kategori->nama }}</td>
				<td>{{ $p->kategori->poin }}</td>
			</tr>
		</tbody>
		@endforeach
		<tfoot>
			<tr>
				<th colspan="3">Jumlah</th>
				<td>{{ $jumlah }}</td>
			</tr>
		</tfoot>
	</table>
	<br />
	<font align="justify"><center>Mengetahui</center>
	<br/><br/><br/>
	</font>
	<table width="100%">
		<tr>
			<td width="50%"></td>
			<td width="50%"><center></center></td>
		</tr>
		<tr>
			<td>
				<center>Guru BK</center>
			</td>
			<td>
				<center>Orang Tua Siswa/Wali Siswa</center>
			</td>
		</tr>
		<tr>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td><center><b>___________________</b></center></td>
			<td><center><b>___________________</b></center></td>
		</tr>
	</table>

</div>
</body>
</html>
