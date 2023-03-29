<?= $this->extend('layout/template_admin'); ?>
<?= $this->section('content'); ?>
<link rel="stylesheet" href="/css/detail_admin.css">

    <div class="content">
        <img class="photo" src="/img/<?= $admin["foto_profile"] ?>">
        <div>
            <p>Username : <?= $admin["username_admin"] ?></p>
            <p>Nama : <?= $admin["nama_admin"] ?></p>
            <p>Email : <?= $admin["email_admin"] ?></p>
            <p>Jenis Kelamin : <?= $admin["jenis_kelamin"] ?></p>
        </div>
        <div>
            <a class="edit-btn" href="/editadm/<?= $admin["id_admin"] ?>">Edit</a>
            <form action="/deleteadm/<?= $admin["id_admin"] ?>" method="post" class="d-inline">
            <?= csrf_field() ?>
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="delete-btn" onclick="return confirm('apakah ada ingin menghapus dengan Username = <?= $admin["username_admin"] ?>')">Hapus</a>
            </form>
        </div>
        <a class="back-btn" href="/admin2">Balik ke list</a>
    </div>

<?= $this->endSection(); ?>