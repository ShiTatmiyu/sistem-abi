<?= $this->extend('layout/template_guru'); ?>
<?= $this->section('content'); ?>

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
            <td><?= $ab['nama_ibadah'] ?></td>
            <td><?= $ab['status_ibadah'] ?></td>
            <td><?= $ab['waktu_isi'] ?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>

<?= $this->endSection(); ?>