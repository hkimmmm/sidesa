<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="UTF-8">
	<title><?= htmlspecialchars($title ?? 'Slip Gaji') ?></title>
	<style>
		@page {
			size: A4;
			margin: 1.5cm;
		}
		body {
			font-family: 'Times New Roman', Times, serif;
			font-size: 11.5pt;
			line-height: 1.5;
			margin: 0;
			padding: 0;
		}
		.header {
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
			margin-left: 80px;
			text-align: center;
		}
		.title {
			font-size: 11pt;
			margin: 0;
			line-height: 1.3;
		}
		hr {
			border: 1px solid #000;
			margin: 10px 0;
		}
		.content {
			font-size: 11.5pt;
		}
		h3 {
			text-align: center;
			text-decoration: underline;
			margin: 12px 0 6px 0;
			font-size: 12pt;
			font-weight: bold;
		}
		.nomor {
			text-align: center;
			margin: 5px 0 15px 0;
			font-weight: bold;
		}
		table {
			margin: 10px 0 10px 40px;
			border-collapse: collapse;
			width: auto;
		}
		table tr td {
			padding: 2px 0;
			vertical-align: top;
		}
		table tr td:first-child {
			padding-right: 12px;
			white-space: nowrap;
		}
		p {
			margin: 8px 0;
			text-align: justify;
			text-indent: 40px;
		}
		.signature {
			float: right;
			text-align: center;
			margin-top: 30px;
			width: 45%;
		}
		.clear {
			clear: both;
		}
	</style>
</head>

<body>

<div class="header">
	<img src="<?= base_url('assets/images/logo/kabupaten_tegal.png') ?>" class="logo" alt="Logo Kabupaten Tegal">
	<div class="header-content">
		<div class="title">
			<strong>PEMERINTAH KABUPATEN TEGAL<br>
			KECAMATAN SLAWI<br>
			KELURAHAN PROCOT</strong><br>
			Alamat: Jl. Nangka No.10 Telp. (0283) 492246 Tegal 52412
		</div>
	</div>
</div>

<hr>

<div class="content">
	<h3>SLIP KETERANGAN PENGHASILAN</h3>
	<div class="nomor">Nomor: 789/SKP/VI/2025</div>

	<p class="no-indent">Yang bertanda tangan di bawah ini, Lurah Procot Kecamatan Slawi Kabupaten Tegal, dengan ini menerangkan bahwa:</p>

	<table>
		<tr><td>Nama Lengkap</td><td>: SUMARNO</td></tr>
		<tr><td>NIK</td><td>: 3374101234567890</td></tr>
		<tr><td>No. KK</td><td>: 3374109876543210</td></tr>
		<tr><td>Tempat / Tanggal Lahir</td><td>: Tegal, 01 Januari 1980</td></tr>
		<tr><td>Alamat</td><td>: Jl. Anggrek No.8, Kelurahan Procot, Kec. Slawi</td></tr>
		<tr><td>Pekerjaan</td><td>: Buruh Harian Lepas</td></tr>
	</table>

	<p>Yang bersangkutan benar merupakan warga Kelurahan Procot dan berdasarkan pengamatan kami memiliki penghasilan rata-rata sebesar:</p>

	<table>
		<tr><td>Penghasilan Per Bulan</td><td>: Rp 1.250.000,-</td></tr>
		<tr><td>Jumlah Tanggungan</td><td>: 3 Orang</td></tr>
		<tr><td>Nama Anak</td><td>: RAHMAT HIDAYAT, SITI AMINAH, NURUL JANNAH</td></tr>
	</table>

	<p>Surat keterangan ini dibuat untuk digunakan sebagaimana mestinya, dan dapat dipergunakan sebagai bukti keterbatasan penghasilan.</p>

	<div class="signature">
		<p>Tegal, 10 Juni 2025</p>
		<p>LURAH PROCOT</p><br><br><br><br>
		<p><strong><u>UKA SUKARYA, S.Ap., M.Si</u></strong><br>NIP: 23456789 300502 1 002</p>
	</div>
	<div class="clear"></div>
</div>

</body>
</html>
