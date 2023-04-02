<?= $this->extend('layout/template_murid'); ?>
<?= $this->section('content'); ?>

<link rel="stylesheet" href="/css/data_admin.css">

<h1 class="page-title">Data ibadah</h1>

<div class="d-flex">
  <a class="btn-create" href="/absen/fill">Tambah data</a> 
  <div class="search-box">
    <form action="/murid/index_absen" method="post">
        <button class="btn-search" name="submit"><i class="fas fa-search"></i></button>
        <input type="text" class="input-search" name="keyword" placeholder="Type to Search...">
    </form>
  </div>
</div>
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
            <td><?= $ab['absenhold_ibadah'] ?></td>
            <td><?= $ab['status_ibadah'] ?></td>
            <td><?= $ab['waktu_isi'] ?></td>
        </tr>
        <?php } ?>
        </tr>
    </tbody>
</table>

<?= $this->endSection(); ?>