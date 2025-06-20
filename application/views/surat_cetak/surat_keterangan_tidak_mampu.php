<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($title ?? 'Surat Keterangan Tidak Mampu') ?></title>
    <style>
        @page {
            size: A4;
            margin: 1cm 1.5cm;
        }

        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 10pt;
            line-height: 1.3;
            margin: 0;
            padding: 0;
        }

        /* Header Styles */
        .header {
            display: flex;
            align-items: center;
            margin-bottom: 5px;
        }

        .logo {
            width: 60px;
            height: 60px;
            margin-right: 8px;
            object-fit: contain;
        }

        .header-text {
            flex-grow: 1;
            text-align: center;
            line-height: 1.1;
            font-size: 11pt;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        /* Content Styles */
        .content {
            margin: 0 auto;
            max-width: 100%;
        }

        hr {
            border: none;
            border-top: 1.5px solid #000;
            margin: 3px 0 8px;
        }

        h3 {
            text-align: center;
            text-decoration: underline;
            margin: 8px 0;
            font-size: 12pt;
        }

        .nomor {
            text-align: center;
            font-weight: bold;
            margin-bottom: 10px;
            font-size: 10.5pt;
        }

        p {
            text-align: justify;
            margin: 6px 0;
        }

        .indent {
            text-indent: 30px;
        }

        /* Table Styles */
        .data-table {
            margin: 8px 0 8px 30px;
            border-collapse: collapse;
            width: calc(100% - 30px);
            font-size: 10pt;
        }

        .data-table td {
            padding: 1px 3px;
            vertical-align: top;
        }

        .data-table td:first-child {
            width: 150px;
        }

        /* Signature Section */
        .signature-section {
            margin-top: 20px;
        }

        .signature-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .signature-col {
            width: 48%;
        }

        .signature-col.left {
            text-align: left;
        }

        .signature-col.right {
            text-align: right;
        }

        .signature-camat {
            text-align: center;
            margin-top: 15px;
            width: 100%;
        }

        .signature-space {
            height: 50px;
            margin: 3px 0;
        }

        .signature-name {
            font-weight: bold;
            text-decoration: underline;
            margin-top: 3px;
            font-size: 10pt;
        }

        .nip {
            font-size: 9pt;
            margin-top: 0;
        }

        .date {
            float: right;
            margin: 15px 40px 0 0;
            font-size: 10pt;
        }

        .clear {
            clear: both;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="content">
        <!-- Header -->
        <div class="header">
            <img src="<?= base_url('assets/images/logo/kabupaten_tegal.png') ?>" class="logo"
                alt="Logo Kabupaten Tegal">
            <div class="header-text">
                <strong>PEMERINTAH KABUPATEN TEGAL<br>KECAMATAN SLAWI<br>KELURAHAN PROCOT</strong><br>
                <small>Alamat: Jl. Nangka, No. 10 Telp. (0283) 492 246 Tegal 52412</small>
            </div>
        </div>

        <hr>

        <!-- Title -->
        <h3>SURAT KETERANGAN TIDAK MAMPU</h3>
        <div class="nomor">Nomor: <?= htmlspecialchars($pengajuan['no_pengajuan'] ?? '-') ?></div>

        <!-- Content -->
        <p class="indent">Yang bertanda tangan di bawah ini Lurah Procot Kecamatan Slawi Kabupaten Tegal, dengan ini
            menerangkan dengan sesungguhnya bahwa:</p>

        <table class="data-table">
            <tr>
                <td>Nama Orang Tua/Wali</td>
                <td>: <?= htmlspecialchars($pengajuan['nama_ortu'] ?? '') ?></td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>: <?= htmlspecialchars($pengajuan['nik_ortu'] ?? '') ?></td>
            </tr>
            <tr>
                <td>Tempat / Tanggal Lahir</td>
                <td>: <?= htmlspecialchars($pengajuan['ttl_ortu'] ?? '') ?></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>: <?= htmlspecialchars($pengajuan['jenis_kelamin_ortu'] ?? '') ?></td>
            </tr>
            <tr>
                <td>Pekerjaan</td>
                <td>: <?= htmlspecialchars($pengajuan['pekerjaan_ortu'] ?? '') ?></td>
            </tr>
            <tr>
                <td>Agama</td>
                <td>: <?= htmlspecialchars($pengajuan['agama_ortu'] ?? '') ?></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>: <?= nl2br(htmlspecialchars($pengajuan['alamat_ortu'] ?? '')) ?></td>
            </tr>
        </table>

        <p class="indent">Berdasarkan surat pengantar dari RT <?= htmlspecialchars($pengajuan['rt'] ?? '') ?> RW
            <?= htmlspecialchars($pengajuan['rw'] ?? '') ?> Nomor
            <?= htmlspecialchars($pengajuan['nomor_pengantar'] ?? '') ?> tanggal
            <?= isset($pengajuan['tanggal_pengantar']) ? date('d-m-Y', strtotime($pengajuan['tanggal_pengantar'])) : '' ?>,
            bahwa yang bersangkutan berasal dari <u>Keluarga Tidak Mampu</u> dengan penghasilan rata-rata Rp
            <?= isset($pengajuan['penghasilan_perbulan']) ? number_format($pengajuan['penghasilan_perbulan'], 0, ',', '.') : '' ?>
            dan tanggungan <?= htmlspecialchars($pengajuan['jumlah_tanggungan'] ?? '') ?> orang.</p>

        <p class="indent">Surat ini dibuat sebagai persyaratan
            <b><?= htmlspecialchars($pengajuan['keperluan'] ?? 'beasiswa KIP Kuliah') ?></b> atas nama:</p>

        <table class="data-table">
            <tr>
                <td>Nama</td>
                <td>: <?= htmlspecialchars($pengajuan['nama_anak'] ?? '') ?></td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>: <?= htmlspecialchars($pengajuan['nik_anak'] ?? '') ?></td>
            </tr>
            <tr>
                <td>Tempat / Tanggal Lahir</td>
                <td>: <?= htmlspecialchars($pengajuan['ttl_anak'] ?? '') ?></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>: <?= htmlspecialchars($pengajuan['jenis_kelamin_anak'] ?? '') ?></td>
            </tr>
            <tr>
                <td>Agama</td>
                <td>: <?= htmlspecialchars($pengajuan['agama_anak'] ?? '') ?></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>: <?= nl2br(htmlspecialchars($pengajuan['alamat_anak'] ?? '')) ?></td>
            </tr>
        </table>

        <p>Demikian surat ini dibuat untuk digunakan seperlunya.</p>

        <div class="date">
            Procot, <?= date('d F Y') ?>
        </div>

        <div class="clear"></div>

        <!-- Signature Section -->
        <div class="signature-section">
            <!-- Puskesos and Lurah -->
            <div class="signature-row">
                <div class="signature-col left">
                    <p class="text-center">Puskesos Kec. Slawi</p>
                    <div class="signature-space"></div>
                    <p class="signature-name text-center">
                        <?= htmlspecialchars($pengajuan['nama_puskesos'] ?? '........................') ?></p>
                    <p class="nip text-center">NIP: <?= htmlspecialchars($pengajuan['nip_puskesos'] ?? '-') ?></p>
                </div>

                <div class="signature-col right">
                    <p class="text-center">Lurah Procot</p>
                    <div class="signature-space"></div>
                    <p class="signature-name text-center">
                        <?= htmlspecialchars($pengajuan['nama_pejabat'] ?? 'AGUS NUGROHO AP., S.STP') ?></p>
                    <p class="nip text-center">NIP:
                        <?= htmlspecialchars($pengajuan['nip_pejabat'] ?? '19830805 201010 1 001') ?></p>
                </div>
            </div>

            <!-- Camat -->
            <div class="signature-camat">
                <p>Mengetahui,</p>
                <p>Camat Slawi</p>
                <div class="signature-space"></div>
                <p class="signature-name"><?= htmlspecialchars($pengajuan['nama_camat'] ?? '..................') ?></p>
                <p class="nip">NIP: <?= htmlspecialchars($pengajuan['nip_camat'] ?? '-') ?></p>
            </div>
        </div>
    </div>
</body>

</html>
