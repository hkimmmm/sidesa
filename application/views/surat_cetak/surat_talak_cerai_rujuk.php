<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="UTF-8">
	<title><?= htmlspecialchars($title ?? 'Surat Pernyataan Talak/Cerai/Rujuk') ?></title>
	<style>
		@page { size: A4; margin: 1.5cm; }
		body { font-family: 'Times New Roman', Times, serif; font-size: 11.5pt; line-height: 1.5; margin: 0; padding: 0; }
		.header {
			position: relative; margin-bottom: 10px;
		}
		.logo {
			position: absolute; left: 0; top: 0; width: 70px; height: 70px;
		}
		.header-content {
			margin-left: 80px; text-align: center;
		}
		.title {
			font-size: 11pt; margin: 0; line-height: 1.3;
		}
		hr {
			border: 1px solid #000; margin: 10px 0;
		}
		.content {
			font-size: 11.5pt;
		}
		h3 {
			text-align: center; text-decoration: underline; margin: 12px 0 6px 0;
			font-size: 12pt; font-weight: bold;
		}
		.nomor {
			text-align: center; margin: 5px 0 15px 0;
			font-weight: bold;
		}
		table {
			margin: 10px 0 10px 40px; border-collapse: collapse; width: auto;
		}
		table tr td {
			padding: 2px 0; vertical-align: top;
		}
		table tr td:first-child {
			padding-right: 12px; white-space: nowrap;
		}
		p {
			margin: 8px 0; text-align: justify; text-indent: 40px;
		}
		.signature {
			float: right; text-align: center; margin-top: 30px; width: 45%;
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
	<h3>SURAT PERNYATAAN TALAK/CERAI/RUJUK</h3>
	<div class="nomor">Nomor: 456/PCR/VI/2025</div>

	<p class="no-indent">Yang bertanda tangan di bawah ini, kami menyatakan bahwa:</p>

	<table>
		<tr><td>Nama Suami</td><td>: BUDI SANTOSO</td></tr>
		<tr><td>NIK Suami</td><td>: 3374101122334455</td></tr>
		<tr><td>Alamat Suami</td><td>: Jl. Merpati No.7, Kelurahan Procot</td></tr>
		<tr><td>Nama Istri</td><td>: SITI RAHMAH</td></tr>
		<tr><td>NIK Istri</td><td>: 3374109988776655</td></tr>
		<tr><td>Alamat Istri</td><td>: Jl. Melati No.10, Kelurahan Procot</td></tr>
		<tr><td>Tanggal Nikah</td><td>: 12 Maret 2012</td></tr>
		<tr><td>No. Akta Nikah</td><td>: 1234/2012/AKTA-NK</td></tr>
	</table>

	<p>Dengan ini kami menyatakan bahwa telah terjadi <strong><u>TALAK/CERAI/RUJUK</u></strong> berdasarkan kesepakatan bersama dengan alasan:</p>

	<p style="text-indent: 0;"><em>"Tidak adanya kecocokan dalam rumah tangga sehingga menyebabkan perselisihan berkepanjangan."</em></p>

	<p>Adapun dari pernikahan tersebut telah dikaruniai anak:</p>
	<table>
		<tr><td>Nama Anak</td><td>: ANDI SAPUTRA</td></tr>
		<tr><td>Umur Anak</td><td>: 10 Tahun</td></tr>
	</table>

	<p>Surat pernyataan ini dibuat dengan sebenar-benarnya tanpa ada tekanan atau paksaan dari pihak manapun, dan disaksikan oleh:</p>

	<table>
		<tr><td>Nama Saksi</td><td>: MUKLIS</td></tr>
		<tr><td>NIK Saksi</td><td>: 3374102233445566</td></tr>
	</table>

	<p>Demikian surat pernyataan ini kami buat untuk dapat dipergunakan sebagaimana mestinya.</p>

	<div class="signature">
		<p>Tegal, 10 Juni 2025</p>
		<p>Pihak Suami</p><br><br><br><br>
		<p><strong><u>BUDI SANTOSO</u></strong></p>
	</div>

	<div class="signature" style="float: left; text-align: center;">
		<p>&nbsp;</p>
		<p>Pihak Istri</p><br><br><br><br>
		<p><strong><u>SITI RAHMAH</u></strong></p>
	</div>

	<div class="clear"></div>

	<div class="signature">
		<p>Saksi</p><br><br><br><br>
		<p><strong><u>MUKLIS</u></strong></p>
	</div>

	<div class="clear"></div>
</div>

</body>
</html>
