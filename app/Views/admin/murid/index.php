<?= $this->extend('layout/template_admin'); ?>
<?= $this->section('content'); ?>
<link rel="stylesheet" href="/css/data_admin.css">


<h1 class="page-title">Data Murid</h1>
<div class="d-flex">
  <a class="btn-create" href="/murid/create">Tambah data</a> 
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
            <th>No</th>
            <th>Foto</th>
            <th>Username</th>
            <th>Action</th>
          </tr>
        </thead>
      </table>
    </div> <!--/.tWrap__head-->
    <div class="tWrap__body">
      <table>
        <tbody>
            <?php $no = 1 ?>
        <?php foreach($murid as $ad) { ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><img src="/img/<?= $ad['foto_profile'] ?>" class="foto"></td>
            <td><?= $ad['username_murid'] ?></td>
            <td>
                <a class="btn-detail" href="/murid/detail/<?= $ad['nisn'] ?>"><i class="fa-sharp fa-solid fa-magnifying-glass"></i></a>
            </td>
            <?php } ?>
        </tr>
    </tbody>
</table>

<?= $this->endSection(); ?>