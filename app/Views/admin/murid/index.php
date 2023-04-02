<?= $this->extend('layout/template_admin'); ?>
<?= $this->section('content'); ?>

<link rel="stylesheet" href="/css/data_admin.css">

<h1 class="page-title">Data Murid</h1>
<div class="d-flex">
  <a class="btn-create" href="/create-murid">Tambah data</a> 
  <div class="search-box">
      <form action="/murid/index_murid" method="post">
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
            <th>Nisn</th>
            <th>Username</th>
            <th>Nama Murid</th>
            <th>Kelas</th>
            <th>Action</th>
          </tr>
        </thead>
      </table>
    </div> <!--/.tWrap__head-->
    <div class="tWrap__body">
      <table>
        <tbody>
        <?php foreach($murid as $ad) { ?>
        <tr>
            <td><?= $ad['nisn'] ?></td>
            <td><?= $ad['username_murid'] ?></td>
            <td><?= $ad['nama_murid'] ?></td>
            <td><?= $ad['kelas'] ?></td>
            <td>
                <a class="btn-detail" href="/murid/detail/<?= $ad['nisn'] ?>"><i class="fa-sharp fa-solid fa-magnifying-glass"></i></a>
            </td>
            <?php } ?>
        </tr>
    </tbody>
</table>

<?= $this->endSection(); ?>