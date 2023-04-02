<?= $this->extend('layout/template_walimurid'); ?>
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
            <th>Keterangan tambahan</th>
            <th>Aksi</th>
          </tr>
        </thead>
      </table>
    </div> <!--/.tWrap__head-->
    <div class="tWrap__body">
      <table>
        <tbody>
          <?php $no = 1; ?>
        <?php foreach($laporan as $lp) { ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $lp['absenhold_ibadah'] ?></td>
            <td><?= $lp['status_ibadah'] ?></td>
            <td><?= $lp['waktu_isi'] ?></td>
            <form action="/confirmed" method="post">
                <td><input class="input-ket" type="text" name="keterangan" placeholder="Keterangan walimurid(optional)"></td>
                <td>
                    <button class="edit-btn" type="submit">Confirm</button>
                </td>
            </form>
        </tr>
        <?php } ?>
    </tbody>
</table>

<?= $this->endSection(); ?>