<?= $this->extend('layout/template_walimurid'); ?>
<?= $this->section('content'); ?>

<div class="search-box">
    <form action="/walimurid/index_laporan" method="post">
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
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php $no = 1; ?>
    <?php foreach($laporan as $lp) { ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $lp['absenhold_ibadah'] ?></td>
            <td><?= $lp['status_ibadah'] ?></td>
            <td><?= $lp['waktu_isi'] ?></td>
            <td>
                <form action="/confirmed" method="post">
                    <button type="submit">Confirm</button>
                </form>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>

<?= $this->endSection(); ?>