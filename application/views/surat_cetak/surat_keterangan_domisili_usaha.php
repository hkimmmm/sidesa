<!DOCTYPE html>
<html lang="id">

<head>
	<meta charset="utf-8" />
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<title>Surat Keterangan Domisili Usaha</title>
	<style>
		@page {
			size: A4;
			margin: 2cm;
		}

		body {
			font-family: 'Times New Roman', Times, serif;
			font-size: 12pt;
			line-height: 1.5;
			margin: 0;
			padding: 0;
		}

		.header {
			text-align: center;
			position: relative;
			margin-bottom: 10px;
		}

		.logo {
			position: absolute;
			left: 0;
			top: 0;
			width: 70px;
			height: 70px;
		}

		.header-content {
			margin-left: 70px;
		}

		hr {
			border: none;
			border-top: 2px solid #000;
			margin: 10px 0;
		}

		.judul-surat {
			text-align: center;
			text-decoration: underline;
			margin: 12px 0 6px 0;
			padding-top: 10px;
			font-size: 12pt;
			font-weight: bold;
		}

		.nomor-surat {
			text-align: center;
			margin: 5px 0 15px 0;
			font-weight: bold;
		}

		p {
			text-align: justify;
			text-indent: 40px;
			margin: 8px 0;
			line-height: 1;
		}

		p.no-indent {
			text-indent: 0;
			margin: 8px 0;
			padding-top: 6px;
			line-height: 1;
		}

		.data-table {
			margin-left: 40px;
			margin-bottom: 10px;
			border-collapse: collapse;
		}

		.data-table td {
			vertical-align: top;
			padding: 3px 5px;
			line-height: 1;
		}

		.data-table td:first-child {
			width: 180px;
		}

		.signature-table {
			width: 100%;
			margin-top: 40px;
			border-collapse: collapse;
			text-align: center;
		}

		.signature-table td {
			vertical-align: top;
		}

		.nip-text {
			font-size: 11pt;
			margin-top: 2px;
		}
	</style>
</head>

<body>
	<div class="header">
		<img src="https://storage.googleapis.com/a1aa/image/0b1c74fc-9b54-4761-c332-83470aef745f.jpg" class="logo"
			alt="Logo Kabupaten Tegal">
		<div class="header-content">
			<strong>PEMERINTAH KABUPATEN TEGAL<br>KECAMATAN SLAWI<br>KELURAHAN PROCOT</strong><br>
			<small>Alamat: Jl. Nangka No. 10 Telp. (0283) 492246 Procot-Slawi 52412</small>
		</div>
	</div>

	<hr>

	<p class="nomor-surat">No. Kode Kelurahan : 33.28.100.007</p>

	<h3 class="judul-surat">SURAT KETERANGAN DOMISILI USAHA</h3>

	<p class="nomor-surat">Nomor : <?= $pengajuan['no_pengajuan'] ?? '...' ?></p>

	<p class="no-indent">
		Yang bertanda tangan di bawah ini Lurah Procot Kecamatan Slawi Kabupaten Tegal menerangkan bahwa:
	</p>

	<table class="data-table">
		<tr>
			<td>Nama Pemilik Usaha</td>
			<td>: <?= $pengajuan['nama_lengkap'] ?? '...' ?></td>
		</tr>
		<tr>
			<td>NIK</td>
			<td>: <?= $pengajuan['nik'] ?? '...' ?></td>
		</tr>
		<tr>
			<td>Nama Usaha</td>
			<td>: <?= $pengajuan['nama_usaha'] ?? '...' ?></td>
		</tr>
		<tr>
			<td>Jenis Usaha</td>
			<td>: <?= $pengajuan['jenis_usaha'] ?? '...' ?></td>
		</tr>
		<tr>
			<td>Alamat Usaha</td>
			<td>: <?= $pengajuan['alamat_usaha'] ?? '...' ?></td>
		</tr>
		<tr>
			<td>Lama Usaha</td>
			<td>: <?= $pengajuan['lama_usaha'] ?? '...' ?></td>
		</tr>
		<tr>
			<td>Status Tempat Usaha</td>
			<td>: <?= $pengajuan['status_tempat_usaha'] ?? '...' ?></td>
		</tr>
		<tr>
			<td>Keterangan</td>
			<td>: <?= $pengajuan['keterangan'] ?? '...' ?></td>
		</tr>
	</table>

	<p>
		Dengan ini menerangkan bahwa usaha tersebut benar-benar berdomisili di
		<?= $pengajuan['alamat_usaha'] ?? '...' ?>.
	</p>

	<p>
		Demikian surat keterangan domisili usaha ini dibuat untuk dapat dipergunakan sebagaimana mestinya.
	</p>

	<table class="signature-table">
		<tr>
			<td style="width: 50%; text-align: center;">
				<p>Mengetahui</p>
				<p>Camat Slawi</p>
				<p style="margin-top: 60px;">..............................................</p>
			</td>

			<?php
			function tanggalIndo($tanggal)
			{
				$bulan = [
					1 => 'Januari',
					'Februari',
					'Maret',
					'April',
					'Mei',
					'Juni',
					'Juli',
					'Agustus',
					'September',
					'Oktober',
					'November',
					'Desember'
				];
				$tgl = date('j', strtotime($tanggal));
				$bln = date('n', strtotime($tanggal));
				$thn = date('Y', strtotime($tanggal));
				return $tgl . ' ' . $bulan[$bln] . ' ' . $thn;
			}
			?>
			<td style="width: 50%; text-align: center;">
				<p>Procot, <?= tanggalIndo(date('Y-m-d')) ?></p>
				<p>LURAH PROCOT</p>
				<p style="margin-top: 40px;"><strong><u>AGUS NUGROHO AP., S.STP</u></strong></p>
				<p class="nip-text">NIP. 19830805 201010 1 001</p>
			</td>
		</tr>
	</table>
</body>

</html>
