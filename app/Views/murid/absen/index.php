<?= $this->extend('layout/template_murid'); ?>
<?= $this->section('content'); ?>

<a class="btn-create" href="/absen/fill">Tambah data</a> 
<div class="search-box">
    <form action="/murid/index_absen" method="post">
        <button class="btn-search" name="submit"><i class="fas fa-search"></i></button>
        <input type="text" class="input-search" name="keyword" placeholder="Type to Search...">
    </form>
</div>

<table border='1'>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Ibadah</th>
            <th>Status Ibadah</th>
            <th>Waktu Isi</th>
        </tr>
    </thead>
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
    </tbody>
</table>

<?= $this->endSection(); ?>