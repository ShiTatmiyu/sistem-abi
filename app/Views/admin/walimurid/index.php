<?= $this->extend('layout/template_admin'); ?>
<?= $this->section('content'); ?>
<link rel="stylesheet" href="/css/data_admin.css">


<h1 class="page-title">Data Walimurid</h1>
<div class="d-flex">
  <a class="btn-create" href="/create-walimurid">Tambah data</a> 
  <div class="search-box">
      <form action="/admin/index_walimurid" method="post">
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
            <th>no</th>
            <th>Username</th>
            <th>Nama Walimurid</th>
            <th>Nama Murid</th>
            <th>Action</th>
          </tr>
        </thead>
      </table>
    </div> <!--/.tWrap__head-->
    <div class="tWrap__body">
      <table>
        <tbody>
            <?php $no = 1; ?>
        <?php foreach($walimurid as $ad) { ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $ad->username_walimurid ?></td>
            <td><?= $ad->nama_walimurid ?></td>
            <td><?= $ad->nama_murid ?></td>
            <td>
                <a class="btn-detail" href="/walimurid/detail/<?= $ad->id_walimurid ?>"><i class="fa-sharp fa-solid fa-magnifying-glass"></i></a>
            </td>
            <?php } ?>
        </tr>
    </tbody>
</table>

<?= $this->endSection(); ?>