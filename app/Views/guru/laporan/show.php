<?= $this->extend('layout/template_guru'); ?>
<?= $this->section('content'); ?>

<link rel="stylesheet" href="/css/data_admin.css">

<h1 class="page-title">Data Laporan</h1>
<div class="container"> <!--provides a wrapper for testing the scroll-->
  <div class="tWrap">
    <div class="tWrap__head">
      <table>
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Ibadah</th>
            <th>Status Ibadah</th>
            <th>Waktu Isi</th>
          </tr>
        </thead>
      </table>
    </div> <!--/.tWrap__head-->
    <div class="tWrap__body">
      <table>
        <tbody>
        <?php $no = 1; ?>
        <?php foreach($absen as $ab) { ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $ab['nama_ibadah'] ?></td>
            <td><?= $ab['status_ibadah'] ?></td>
            <td><?= $ab['waktu_isi'] ?></td>
        </tr>
        <?php } ?>
        </tr>
    </tbody>
</table>

<?= $this->endSection(); ?>