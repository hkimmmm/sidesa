<!DOCTYPE html>
<html lang="id">

<head>
	<meta charset="utf-8" />
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<title>Surat Keterangan</title>
	<style>
		@page {
			size: A4;
			margin: 1.5cm;
		}

		body {
			font-family: 'Times New Roman', Times, serif;
			font-size: 12pt;
			line-height: 1;
			margin: 0;
			padding: 0;
		}

		.header {
			text-align: center;
			position: relative;
			margin-bottom: 5px;
		}

		.logo {
			position: absolute;
			left: 0;
			top: 0;
			width: 60px;
			height: 60px;
		}

		.header-content {
			margin-left: 65px;
			font-size: 11pt;
		}

		.header-content small {
			font-size: 10pt;
		}

		hr {
			border: none;
			border-top: 2px solid #000;
			margin: 5px 0;
		}

		.judul-surat {
			text-align: center;
			text-decoration: underline;
			margin: 8px 0 4px 0;
			padding-top: 5px;
			font-size: 12pt;
			font-weight: bold;
		}

		.nomor-surat {
			text-align: center;
			margin: 3px 0 10px 0;
			font-weight: bold;
			font-size: 11pt;
		}

		p {
			text-align: justify;
			text-indent: 30px;
			margin: 2px 0;
			line-height: 1;
		}

		p.no-indent {
			text-indent: 0;
			margin: 2px 0;
			padding-top: 3px;
			line-height: 1;
		}

		.data-table {
			margin-left: 30px;
			margin-bottom: 5px;
			border-collapse: collapse;
		}

		.data-table td {
			vertical-align: top;
			padding: 2px 4px;
			line-height: 1;
		}

		.data-table td:first-child {
			width: 160px;
		}

		.signature-table {
			width: 100%;
			margin-top: 20px;
			border-collapse: collapse;
			text-align: center;
		}

		.signature-table td {
			vertical-align: top;
		}

		.nip-text {
			font-size: 10pt;
			margin-top: 1px;
		}
	</style>
</head>

<body>
	<div class="header">
		<img src="https://storage.googleapis.com/a1aa/image/4aae76fe-5cbe-4b40-2f38-4a4995f6e51f.jpg" class="logo"
			alt="Logo Kabupaten Tegal">
		<div class="header-content">
			<strong>PEMERINTAH KABUPATEN TEGAL<br>KECAMATAN SLAWI<br>KELURAHAN PROCOT</strong><br>
			<small>Alamat: Jl. Nangka No. 10 Telp. (0283) 492246 Procot-Slawi 52412</small>
		</div>
	</div>

	<hr>
	<h3 class="judul-surat">SURAT KETERANGAN</h3>
	<p class="nomor-surat">Nomor : <?= $pengajuan['no_pengajuan'] ?? '...' ?></p>

	<p class="no-indent">
		Yang bertanda tangan di bawah ini:
	</p>
	<table class="data-table">
		<tr>
			<td>Nama</td>
			<td>: AGUS NUGROHO AP</td>
		</tr>
		<tr>
			<td>NIP</td>
			<td>: 19880805 201010 1 001</td>
		</tr>
		<tr>
			<td>Jabatan</td>
			<td>: Lurah</td>
		</tr>
	</table>

	<p class="no-indent">
		Menerangkan dengan sebenar-benarnya bahwa:
	</p>
	<table class="data-table">
		<tr>
			<td>Nama</td>
			<td>: <?= $pengajuan['nama_lengkap'] ?? '...' ?></td>
		</tr>
		<tr>
			<td>Tempat/Tanggal Lahir</td>
			<td>: <?= $pengajuan['ttl'] ?? '...' ?></td>
		</tr>
		<tr>
			<td>Jenis Kelamin</td>
			<td>: <?= $pengajuan['jenis_kelamin'] ?? '...' ?></td>
		</tr>
		<tr>
			<td>NIK</td>
			<td>: <?= $pengajuan['pekerjaan'] ?? '...' ?></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td>: <?= $pengajuan['alamat'] ?? '...' ?></td>
		</tr>
	</table>

	<p>
		Bahwa nama tersebut di atas benar-benar tidak bekerja di kantor/Perusahaan (Ibu rumah tangga) hingga sekarang
		tidak menerima tunjangan Istri/Suami.
	</p>
	<p>
		Demikian surat keterangan ini dibuat dengan sebenar-benarnya dan data yang diisikan sesuai kondisi yang
		sesungguhnya.
	</p>
	<p>
		Apabila di kemudian hari ditemukan perbedaan data, maka saya sanggup bertanggung jawab.
	</p>

	<table class="signature-table">
		<tr>
			<td style="width: 50%; text-align: center;">
			</td>
			<td style="width: 50%; text-align: center;">
				<p>Procot, 19 Juni 2025</p>
				<p>LURAH PROCOT</p>
				<p style="margin-top: 20px;"><strong><u>AGUS NUGROHO AP., S.STP</u></strong></p>
				<p class="nip-text">NIP. 19880805 201010 1 001</p>
			</td>
		</tr>
	</table>
</body>

</html>
