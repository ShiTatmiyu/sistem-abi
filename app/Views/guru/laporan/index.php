<?= $this->extend('layout/template_guru'); ?>
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
            <th>No</th>
            <th>Nisn</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Action</th>
          </tr>
        </thead>
      </table>
    </div> <!--/.tWrap__head-->
    <div class="tWrap__body">
      <table>
        <tbody>
        <?php $no = 1; ?>
        <?php foreach($murid as $ad) { ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $ad['nisn'] ?></td>
            <td><?= $ad['nama_murid'] ?></td>
            <td><?= $ad['kelas'] ?></td>
            <td>
                <a class="edit-btn" href="/show/<?= $ad['nisn'] ?>">List</a>
            </td>
            <?php } ?>
        </tr>
    </tbody>
</table>

<?= $this->endSection(); ?>