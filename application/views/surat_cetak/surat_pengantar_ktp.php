<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title><?= htmlspecialchars($title ?? 'Surat Pengantar KTP') ?></title>
  <style>
    @page { size: A4; margin: 1.5cm; }
    body {
      font-family: 'Times New Roman', Times, serif;
      font-size: 11.5pt;
      line-height: 1.6;
      margin: 0;
    }
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
      text-align: center;
      text-decoration: underline;
      font-weight: bold;
      font-size: 12pt;
      margin: 14px 0 8px;
    }
    .nomor {
      text-align: center;
      margin-bottom: 15px;
      font-weight: bold;
    }
    table {
      margin-left: 40px; width: auto;
      border-collapse: collapse;
    }
    td {
      vertical-align: top;
      padding: 2px 5px;
    }
    td:first-child {
      white-space: nowrap;
    }
    p {
      text-indent: 40px;
      text-align: justify;
      margin: 8px 0;
    }
    .signature {
      float: right;
      text-align: center;
      width: 45%;
      margin-top: 40px;
    }
    .clear {
      clear: both;
    }
  </style>
</head>
<body>

<div class="header">
  <img src="<?= base_url('assets/images/logo/kabupaten_tegal.png') ?>" class="logo" alt="Logo">
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
  <h3>SURAT PENGANTAR PEMBUATAN KTP</h3>
  <div class="nomor">Nomor: 789/KTP/VI/2025</div>

  <p>Yang bertanda tangan di bawah ini, Lurah Procot Kecamatan Slawi Kabupaten Tegal, menerangkan bahwa:</p>

  <table>
    <tr><td>Nama Lengkap</td><td>: AMIR HIDAYAT</td></tr>
    <tr><td>NIK</td><td>: 3374101234567890</td></tr>
    <tr><td>Tempat/Tgl Lahir</td><td>: Tegal, 14 Februari 1990</td></tr>
    <tr><td>Alamat</td><td>: Jl. Kamboja No.12, Kelurahan Procot</td></tr>
    <tr><td>Status Pernikahan</td><td>: Menikah</td></tr>
    <tr><td>Nomor KTP Lama</td><td>: 3374101234560001</td></tr>
    <tr><td>Alasan Pengajuan</td><td>: KTP rusak karena terkena air</td></tr>
  </table>

  <p>Benar yang bersangkutan adalah warga Kelurahan Procot, dan surat pengantar ini dibuat untuk keperluan pengajuan KTP baru.</p>

  <p>Demikian surat pengantar ini dibuat untuk dapat dipergunakan sebagaimana mestinya.</p>

  <div class="signature">
    <p>Tegal, 10 Juni 2025</p>
    <p>Lurah Procot</p><br><br><br><br>
    <p><strong><u>SUGENG PRIYONO, S.Sos</u></strong><br>NIP. 19780415 200604 1 001</p>
  </div>

  <div class="clear"></div>
</div>

</body>
</html>
