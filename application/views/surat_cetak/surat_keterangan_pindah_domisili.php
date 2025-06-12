<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="UTF-8">
	<title><?= htmlspecialchars($title ?? 'Surat Keterangan Pindah Domisili') ?></title>
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
	<h3>SURAT KETERANGAN PINDAH DOMISILI</h3>
	<div class="nomor">Nomor: 123/SKD-PD/VI/2025</div>

	<p class="no-indent">Lurah Kelurahan Procot Kecamatan Slawi menerangkan bahwa:</p>

	<table>
		<tr><td>Nama Lengkap</td><td>: BUDI SANTOSO</td></tr>
		<tr><td>NIK</td><td>: 3374101234567890</td></tr>
		<tr><td>Nomor KK</td><td>: 3374109876543210</td></tr>
		<tr><td>Tempat / Tanggal Lahir</td><td>: Tegal, 15 Maret 1985</td></tr>
		<tr><td>Alamat Lama</td><td>: Jl. Kenanga No.12, RT 02 RW 03, Kelurahan Procot, Kec. Slawi</td></tr>
		<tr><td>Alamat Baru</td><td>: Jl. Anggrek No.5, RT 04 RW 01, Kelurahan Kraton, Kec. Tegal Barat</td></tr>
		<tr><td>Jumlah Anggota Pindah</td><td>: 3 Orang</td></tr>
		<tr><td>Alasan Pindah</td><td>: Mengikuti tempat kerja</td></tr>
	</table>

	<p>Yang bersangkutan benar berdomisili di alamat sebagaimana tersebut di atas dan bermaksud pindah domisili beserta anggota keluarga.</p>

	<p>Berikut adalah daftar anggota keluarga yang ikut pindah:</p>
	<table style="margin-left:40px;">
		<tr><td>1.</td><td>RINA WULANDARI - 3374101234567891</td></tr>
		<tr><td>2.</td><td>ANDI PRATAMA - 3374101234567892</td></tr>
	</table>

	<p>Surat keterangan ini dibuat sebagai persyaratan administrasi pindah domisili dan berlaku sesuai dengan ketentuan yang berlaku.</p>

	<p class="no-indent">Demikian surat keterangan ini dibuat dengan sebenarnya, agar dapat digunakan sebagaimana mestinya.</p>

	<div class="signature">
		<p>Tegal, 10 Juni 2025</p>
		<p>LURAH PROCOT</p><br><br><br><br>
		<p><strong><u>UKA SUKARYA, S.Ap., M.Si</u></strong><br>NIP: 23456789 300502 1 002</p>
	</div>
	<div class="clear"></div>
</div>

</body>
</html>
