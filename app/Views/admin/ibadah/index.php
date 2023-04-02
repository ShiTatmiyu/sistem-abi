<?= $this->extend('layout/template_admin'); ?>
<?= $this->section('content'); ?>

<link rel="stylesheet" href="/css/data_admin.css">


<h1 class="page-title">Data ibadah</h1>
<div class="d-flex">
  <a class="btn-create" href="/create-ibadah">Tambah data</a> 
  <div class="search-box">
      <form action="/admin/index_ibadah" method="post">
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
            <th>Nama Ibadah</th>
            <th>Hukum Ibadah</th>
            <th>Jadwal Ibadah</th>
            <th>Action</th>
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
            <td>
                <a class="edit-btn" href="/editib/<?= $ib['id_ibadah'] ?>">Edit</a>
                <form action="/deleteib/<?= $ib["id_ibadah"] ?>" method="post">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="delete-btn" onclick="return confirm('apakah ada ingin menghapus dengan Username = <?= $ib['nama_ibadah'] ?>')">Delete</button>
                </form>
            </td>
        </tr>
    <?php } ?>
        </tr>
    </tbody>
</table>

<?= $this->endSection(); ?>