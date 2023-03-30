<?= $this->extend('layout/template_admin'); ?>
<?= $this->section('content'); ?>

<a href="/create-ibadah">Tambah data</a>
<div class="search-box">
    <form action="/admin/index_ibadah" method="post">
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
            <th>Aksi</th>
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
            <td>
                <a href="/editib/<?= $ib['id_ibadah'] ?>">Edit</a>
                <form action="/deleteib/<?= $ib["id_ibadah"] ?>" method="post" class="d-inline">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="delete-btn" onclick="return confirm('apakah ada ingin menghapus dengan Username = <?= $ib["nama_ibadah"] ?>')">Hapus</a>
                </form>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>

<?= $this->endSection(); ?>