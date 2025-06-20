<!DOCTYPE html>
<html lang="id">

<head>
	<meta charset="utf-8" />
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<title>Surat Keterangan Penghasilan Orang Tua/Wali</title>
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

		.income-table {
			width: 100%;
			border: 1px solid black;
			border-collapse: collapse;
			margin-bottom: 5px;
		}

		.income-table th,
		.income-table td {
			border: 1px solid black;
			padding: 2px 4px;
			text-align: left;
			vertical-align: top;
			font-size: 11pt;
		}

		.income-table tr {
			height: 20px;
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
		<img src="https://storage.googleapis.com/a1aa/image/ad52f9ae-7cfd-4b99-83fc-cdbc4d912fed.jpg" class="logo"
			alt="Logo Kabupaten Tegal">
		<div class="header-content">
			<strong>PEMERINTAH KABUPATEN TEGAL<br>KECAMATAN SLAWI<br>KELURAHAN PROCOT</strong><br>
			<small>Alamat: Jl. Nangka No. 10 Telp. (0283) 492246 Procot-Slawi 52412</small>
		</div>
	</div>

	<hr>
	<h3 class="judul-surat">SURAT KETERANGAN PENGHASILAN ORANG TUA/WALI</h3>
	<p class="nomor-surat">Nomor : <?= $pengajuan['no_pengajuan'] ?? '...' ?></p>

	<p class="no-indent">
		Yang bertanda tangan di bawah ini, Lurah Procot Kecamatan Slawi Kabupaten Tegal menerangkan dengan sebenarnya
		bahwa:
	</p>

	<p class="no-indent">Ayah:</p>
	<table class="data-table">
		<tr>
			<td>Nama Ayah</td>
			<td>: <?= $pengajuan['nama_ayah'] ?? '...' ?></td>
		</tr>
		<tr>
			<td>NIK</td>
			<td>: <?= $pengajuan['nik_ayah'] ?? '...' ?></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td>: <?= $pengajuan['alamat_ayah'] ?? '...' ?></td>
		</tr>
		<tr>
			<td>Pekerjaan Utama</td>
			<td>: <?= $pengajuan['pekerjaan_ayah'] ?? '...' ?> dengan penghasilan sebesar Rp.
				<?= $pengajuan['penghasilan_utama_ayah'] ?? '...' ?> /bulan</td>
		</tr>
	</table>
	<p class="no-indent">
		Selain penghasilan tersebut, juga terdapat penghasilan tambahan sebesar Rp.
		<?= $pengajuan['penghasilan_tambahan_ayah'] ?? '...' ?> /bulan, dengan rincian sebagai berikut:
	</p>
	<table class="income-table">
		<thead>
			<tr>
				<th>No.</th>
				<th>Jenis Pekerjaan</th>
				<th>Nominal (Rp)</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>1</td>
				<td><?= $pengajuan['rincian_tambahan_ayah'] ?? '...' ?></td>
				<td><?= $pengajuan['penghasilan_tambahan_ayah'] ?? '...' ?></td>
			</tr>
		</tbody>
	</table>

	<p class="no-indent">Ibu:</p>
	<table class="data-table">
		<tr>
			<td>Nama Ibu</td>
			<td>: <?= $pengajuan['nama_ibu'] ?? '...' ?></td>
		</tr>
		<tr>
			<td>NIK</td>
			<td>: <?= $pengajuan['nik_ibu'] ?? '...' ?></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td>: <?= $pengajuan['alamat_ibu'] ?? '...' ?></td>
		</tr>
		<tr>
			<td>Pekerjaan Utama</td>
			<td>: <?= $pengajuan['pekerjaan_ibu'] ?? '...' ?> dengan penghasilan sebesar Rp.
				<?= $pengajuan['penghasilan_utama_ibu'] ?? '...' ?> /bulan</td>
		</tr>
	</table>
	<p class="no-indent">
		Selain penghasilan tersebut, juga terdapat penghasilan tambahan sebesar Rp.
		<?= $pengajuan['penghasilan_tambahan_ibu'] ?? '...' ?> /bulan, dengan rincian sebagai berikut:
	</p>
	<table class="income-table">
		<thead>
			<tr>
				<th>No.</th>
				<th>Jenis Pekerjaan</th>
				<th>Nominal (Rp)</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>1</td>
				<td><?= $pengajuan['rincian_tambahan_ibu'] ?? '...' ?></td>
				<td><?= $pengajuan['penghasilan_tambahan_ibu'] ?? '...' ?></td>
			</tr>
		</tbody>
	</table>

	<p class="no-indent">
		Adalah orang tua/wali dari:
	</p>
	<table class="data-table">
		<tr>
			<td>Nama</td>
			<td>: <?= $pengajuan['nama_anak'] ?? '...' ?></td>
		</tr>
		<tr>
			<td>Tempat/Tanggal Lahir</td>
			<td>: <?= $pengajuan['ttl_anak'] ?? '...' ?></td>
		</tr>
		<tr>
			<td>NIK</td>
			<td>: <?= $pengajuan['nik_anak'] ?? '...' ?></td>
		</tr>
		<tr>
			<td>Pekerjaan</td>
			<td>: <?= $pengajuan['pekerjaan_anak'] ?? '...' ?></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td>: <?= $pengajuan['alamat_anak'] ?? '...' ?></td>
		</tr>
	</table>

	<p>
		Demikian surat ini dibuat dengan sebenarnya untuk dapat dipakai sebagai pertimbangan dalam penentuan besaran
		biaya uang kuliah (UKT) di perguruan tinggi.
	</p>

	<table class="signature-table">
		<tr>
			<td style="width: 50%; text-align: center;">
			</td>
			<td style="width: 50%; text-align: center;">
				<p>Procot, 19 Juni 2025</p>
				<p>LURAH PROCOT</p>
				<p style="margin-top: 20px;"><strong><u>AGUS NUGROHO AP., S.STP</u></strong></p>
				<p class="nip-text">NIP. 198808052010101001</p>
			</td>
		</tr>
	</table>
</body>

</html>
