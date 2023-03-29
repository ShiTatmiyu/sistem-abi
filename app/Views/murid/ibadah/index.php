<?= $this->extend('layout/template_murid'); ?>
<?= $this->section('content'); ?>

<div class="search-box">
    <form action="/murid/index_ibadah" method="post">
        <button class="btn-search" name="submit"><i class="fas fa-search"></i></button>
        <input type="text" class="input-search" name="keyword" placeholder="Type to Search...">
    </form>
</div>

<table border='1'>
    <thead>
        <tr>
            <th>nama</th>
            <th>Nama Ibadah</th>
            <th>Hukum Ibadah</th>
            <th>Jadwal Ibadah</th>
        </tr>
    </thead>
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
    </tbody>
</table>

<?= $this->endSection(); ?>