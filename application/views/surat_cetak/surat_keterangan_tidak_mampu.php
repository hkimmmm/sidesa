<!DOCTYPE html>
<html lang="id">

<head>
	<meta charset="UTF-8">
	<title><?= htmlspecialchars($title ?? 'Surat Keterangan Tidak Mampu') ?></title>
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

		p.no-indent {
			text-indent: 0;
		}

		.nip {
			margin-top: 5px;
			line-height: 1.2;
		}

		.nip-text {
			font-size: 11pt;
			margin-top: 2px;
		}


		.signature {
			float: right;
			text-align: center;
			margin-top: 30px;
			width: 45%;
		}

		.signature img,
		.ttd-img {
			display: block;
			margin: 0 auto 5px auto;
			height: 70px;
		}

		.text-center {
			text-align: center;
		}

		.clear {
			clear: both;
		}

		.bold {
			font-weight: bold;
		}

		.italic {
			font-style: italic;
		}

		.signature p strong {
			display: block;
			margin-top: 5px;
		}
	</style>

</head>

<body>

	<div class="header">
		<img src="<?php echo base_url('assets/images/logo/kabupaten_tegal.png'); ?>" class="logo"
			alt="Logo Kabupaten Tegal">
		<div class="header-content">
			<div class="title">
				<strong>PEMERINTAH KABUPATEN TEGAL<br>
					KECAMATAN SLAWI<br>
					KELURAHAN PROCOT</strong><br>
				Alamat: Jl. Nangka, No. 10 Telp. (0283) 492 246 Tegal 52412
			</div>
		</div>
	</div>

	<hr>

	<div class="content">
		<h3>SURAT KETERANGAN TIDAK MAMPU</h3>
		<div class="nomor">Nomor : <?= htmlspecialchars($item['no_pengajuan'] ?? '-') ?></div>

		<p class="no-indent">Lurah Procot Kecamatan Slawi Atas dengan ini menerangkan bahwa:</p>

		<table>
			<tr>
				<td>Nama</td>
				<td>: <?= htmlspecialchars($item['nama'] ?? '') ?></td>
			</tr>
			<tr>
				<td>NIK</td>
				<td>: <?= htmlspecialchars($item['nik'] ?? '') ?></td>
			</tr>
			<tr>
				<td>Tempat / Tanggal Lahir</td>
				<td>: <?= htmlspecialchars($item['ttl'] ?? '') ?></td>
			</tr>
			<tr>
				<td>Pekerjaan</td>
				<td>: <?= htmlspecialchars($item['pekerjaan'] ?? '') ?></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>: <?= nl2br(htmlspecialchars($item['alamat'] ?? '')) ?></td>
			</tr>
		</table>

		<p>Berdasarkan surat pengantar dari RT <?= htmlspecialchars($rt_rw ?? '') ?> Reg. no :
			<?= htmlspecialchars($reg_no ?? '') ?> Tanggal <?= htmlspecialchars($tgl_pengantar ?? '') ?>, bahwa benar
			Yang Bersangkutan Keluarga Tidak Mampu.
		</p>

		<p>Surat Keterangan ini untuk persyaratan <?= htmlspecialchars($keperluan ?? '') ?> atas nama :</p>

		<table>
			<tr>
				<td>Nama</td>
				<td>: <?= htmlspecialchars($item['nama'] ?? '') ?></td>
			</tr>
			<tr>
				<td>Tempat / Tanggal Lahir</td>
				<td>: <?= htmlspecialchars($item['ttl'] ?? '') ?></td>
			</tr>
		</table>

		<p>Surat Keterangan dinyatakan tidak berlaku apabila terjadi pelanggaran, peraturan Perundang-undangan dan Perda
			Kabupaten Tegal serta apabila terdapat kekeliruan/kesalahan dalam pembuatannya, pemohon/pemegang bersedia
			mempertanggung jawabkan secara hukum tanpa melibatkan pihak manapun.</p>

		<p class="italic bold">Surat keterangan ini berlaku untuk satu kali keperluan.</p>

		<p class="no-indent">Demikian surat keterangan ini kami buat, untuk dipergunakan sebagaimana mestinya.</p>

		<div class="signature">
			<p class="text-center"><?= htmlspecialchars($tempat_tanggal ?? 'Tegal, 11 November 2019') ?></p>
			<p class="text-center">Lurah Mawar Mekar</p>

			<?php if ($status === 'disetujui' || $status === 'selesai'): ?>
				<div class="text-center">
					<img src="<?= base_url('assets/images/ttd.png') ?>" alt="Tanda Tangan" class="ttd-img">
				</div>
			<?php endif; ?>

			<div class="text-center nip">
				<strong><u><?= htmlspecialchars($nama_pejabat ?? 'UKA SUKARYA, S.Ap., M.Si') ?></u></strong>
				<div class="nip-text">NIP: <?= htmlspecialchars($nip_pejabat ?? '23456789 300502 1 002') ?></div>
			</div>
		</div>
		<div class="clear"></div>
	</div>

</body>

</html>