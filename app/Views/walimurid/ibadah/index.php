<?= $this->extend('layout/template_walimurid'); ?>
<?= $this->section('content'); ?>

<link rel="stylesheet" href="/css/data_admin.css">


<h1 class="page-title">Data ibadah</h1>
    <div class="search-box">
        <form action="/admin/index_ibadah" method="post">
            <button class="btn-search" name="submit"><i class="fas fa-search"></i></button>
            <input type="text" class="input-search" name="keyword" placeholder="Type to Search...">
        </form>
    </div>
<div class="container"> <!--provides a wrapper for testing the scroll-->
  <div class="tWrap">
    <div class="tWrap__head">
      <table>
        <thead>
          <tr>
            <th>no</th>
            <th>Nama Ibadah</th>
            <th>Hukum ibadah</th>
            <th>Jadwal ibadah</th>
          </tr>
        </thead>
      </table>
    </div> <!--/.tWrap__head-->
    <div class="tWrap__body">
      <table>
        <tbody>
        <?php $no = 1; ?>
        <?php foreach($ibadah as $ib) { ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $ib['nama_ibadah'] ?></td>
            <td><?= $ib['hukum_ibadah'] ?></td>
            <td><?= $ib['jadwal_ibadah'] ?></td>
        </tr>
    <?php } ?>
        </tr>
    </tbody>
</table>

<?= $this->endSection(); ?>