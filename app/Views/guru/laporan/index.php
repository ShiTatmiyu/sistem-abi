<?= $this->extend('layout/template_guru'); ?>
<?= $this->section('content'); ?>

<table border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Nisn</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1 ?>
        <?php foreach($murid as $ad) { ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $ad['nisn'] ?></td>
            <td><?= $ad['nama_murid'] ?></td>
            <td><?= $ad['kelas'] ?></td>
            <td>
                <a href="/show/<?= $ad['nisn'] ?>">List</a>
            </td>
            <?php } ?>
        </tr>
    </tbody>
</table>

<?= $this->endSection(); ?>