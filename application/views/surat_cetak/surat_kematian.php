<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="UTF-8">
	<title><?= htmlspecialchars($title ?? 'Surat Keterangan Kematian') ?></title>
	<style>
		@page {
			size: A4;
			margin: 1.5cm;
		}
		body {
			font-family: 'Times New Roman', Times, serif;
			font-size: 11.5pt;
			line-height: 1.4;
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
			margin: 5px 0 10px 40px;
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
	<h3>SURAT KETERANGAN KEMATIAN</h3>
	<div class="nomor">Nomor: 456/SKD-KMT/VI/2025</div>

	<p class="no-indent">Yang bertanda tangan di bawah ini, Lurah Procot Kecamatan Slawi, menerangkan bahwa:</p>

	<table>
		<tr><td>Nama Pelapor</td><td>: SUHARTO</td></tr>
		<tr><td>NIK Pelapor</td><td>: 3374109998887777</td></tr>
		<tr><td>Hubungan dengan Almarhum</td><td>: Anak</td></tr>
		<tr><td>Alamat Pelapor</td><td>: Jl. Melati No.7, Kelurahan Procot, Kec. Slawi</td></tr>
	</table>

	<p>Telah melaporkan bahwa telah meninggal dunia seorang warga dengan identitas sebagai berikut:</p>

	<table>
		<tr><td>Nama Lengkap</td><td>: SUKIRMAN</td></tr>
		<tr><td>NIK</td><td>: 3374101234432100</td></tr>
		<tr><td>Nomor KK</td><td>: 3374108765432101</td></tr>
		<tr><td>Tempat / Tanggal Lahir</td><td>: Tegal, 12 Desember 1950</td></tr>
		<tr><td>Jenis Kelamin</td><td>: Laki-laki</td></tr>
		<tr><td>Agama</td><td>: Islam</td></tr>
		<tr><td>Pekerjaan</td><td>: Pensiunan</td></tr>
		<tr><td>Alamat</td><td>: Jl. Melati No.7, Kelurahan Procot, Kec. Slawi</td></tr>
	</table>

	<table>
		<tr><td>Tanggal Kematian</td><td>: 05 Juni 2025</td></tr>
		<tr><td>Waktu Kematian</td><td>: 23:45 WIB</td></tr>
		<tr><td>Sebab Kematian</td><td>: Sakit</td></tr>
		<tr><td>Tempat Kematian</td><td>: Rumah Pribadi</td></tr>
	</table>

	<p>Demikian surat keterangan ini dibuat dengan sebenarnya berdasarkan keterangan pelapor dan diketahui oleh RT/RW setempat, untuk dipergunakan sebagaimana mestinya.</p>

	<div class="signature">
		<p>Tegal, 10 Juni 2025</p>
		<p>LURAH PROCOT</p><br><br><br><br>
		<p><strong><u>UKA SUKARYA, S.Ap., M.Si</u></strong><br>NIP: 23456789 300502 1 002</p>
	</div>
	<div class="clear"></div>
</div>

</body>
</html>
