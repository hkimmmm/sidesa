<!DOCTYPE html>
<html lang="id">

<head>
	<meta charset="utf-8" />
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<title><?= htmlspecialchars($title ?? 'Surat Keterangan Domisili') ?></title>
	<style>
		@page {
			size: A4;
			margin: 2cm;
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
			padding-bottom: 6px;
			border-collapse: collapse;
		}

		.data-table td {
			vertical-align: top;
			padding: 3px 5px;
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

		.camat-signature {
			clear: both;
			text-align: center;
			margin-top: 60px;
			width: 100%;
		}

		.nip-text {
			font-size: 11pt;
			margin-top: 2px;
		}
	</style>
</head>

<body>
	<div class="header">
		<img src="https://storage.googleapis.com/a1aa/image/8074d2eb-fb7f-4e88-404c-b21401a2c755.jpg" class="logo"
			alt="Logo Kabupaten Tegal">
		<div class="header-content">
			<strong>PEMERINTAH KABUPATEN TEGAL<br>KECAMATAN SLAWI<br>KELURAHAN PROCOT</strong><br>
			<small>Alamat: Jl. Nangka No. 10 Telp. (0283) 492246 Procot-Slawi 52412</small>
		</div>
	</div>

	<hr>

	<p class="nomor-surat">No. Kode Kelurahan : 33.28.100.007</p>

	<h3 class="judul-surat">SURAT KETERANGAN DOMISILI</h3>

	<p class="nomor-surat">Nomor : <?= $pengajuan['no_pengajuan'] ?? '...' ?></p>

	<p class="no-indent">
		Yang bertanda tangan di bawah ini Lurah Procot Kecamatan Slawi Kabupaten Tegal menerangkan bahwa:
	</p>

	<table class="data-table">
		<tr>
			<td>Nama</td>
			<td>: <?= $pengajuan['nama_lengkap'] ?? '...' ?></td>
		</tr>
		<tr>
			<td>Tempat/Tanggal Lahir</td>
			<td>: <?= $pengajuan['tempat_tanggal_lahir'] ?? '...' ?></td>
		</tr>
		<tr>
			<td>Kewarganegaraan</td>
			<td>: <?= $pengajuan['kewarganegaraan'] ?? '...' ?></td>
		</tr>
		<tr>
			<td>Agama</td>
			<td>: <?= $pengajuan['agama'] ?? '...' ?></td>
		</tr>
		<tr>
			<td>Jenis Kelamin</td>
			<td>: <?= $pengajuan['jenis_kelamin'] ?? '...' ?></td>
		</tr>
		<tr>
			<td>Status</td>
			<td>: <?= $pengajuan['status_perkawinan'] ?? '...' ?></td>
		</tr>
		<tr>
			<td>Pekerjaan</td>
			<td>: <?= $pengajuan['pekerjaan'] ?? '...' ?></td>
		</tr>
		<tr>
			<td>Alamat KTP</td>
			<td>: <?= $pengajuan['alamat_ktp'] ?? '...' ?></td>
		</tr>
		<tr>
			<td>Alamat Domisili</td>
			<td>: <?= $pengajuan['alamat_domisili'] ?? '...' ?></td>
		</tr>
		<tr>
			<td>Surat Bukti Diri</td>
			<td>: No.KTP : <?= $pengajuan['nik'] ?? '...' ?></td>
		</tr>
		<tr>
			<td>Keperluan</td>
			<td>: Surat Keterangan Domisili</td>
		</tr>
	</table>

	<p>
		Yang bersangkutan benar-benar warga <?= $pengajuan['alamat_ktp'] ?? '...' ?> yang saat ini berdomisili di
		<?= $pengajuan['alamat_domisili'] ?? '...' ?>.
	</p>

	<p>
		Demikian surat keterangan ini kami buat untuk dapat dipergunakan sebagaimana mestinya.
	</p>

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

	<table class="signature-table" style="width: 100%; margin-top: 40px;">
		<tr>
			<td style="width: 100%; text-align: right;">
				<p>&nbsp;</p>
				<p>Procot, <?= tanggalIndo(date('Y-m-d')) ?></p>
				<p>LURAH PROCOT</p>

				<p><strong><u><?= htmlspecialchars($pengajuan['nama_pejabat'] ?? 'AGUS NUGROHO AP., S.STP') ?></u></strong>
				</p>
				<p class="nip-text">NIP: <?= htmlspecialchars($pengajuan['nip_pejabat'] ?? '19830805 201010 1 001') ?>
				</p>
			</td>
		</tr>
	</table>
</body>

</html>
