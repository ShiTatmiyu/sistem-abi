<?= $this->extend('layout/template_admin'); ?>
<?= $this->section('content'); ?>
<link rel="stylesheet" href="/css/detail_admin.css">

    <div class="content">
        <img class="photo" src="/img/<?= $guru["foto_profile"] ?>">
        <div>
            <p>Username : <?= $guru["username_guru"] ?></p>
            <p>Nama : <?= $guru["nama_guru"] ?></p>
            <p>Email : <?= $guru["email_guru"] ?></p>
            <p>Jenis Kelamin : <?= $guru["jenis_kelamin"] ?></p>
        </div>
        <div>
            <a class="edit-btn" href="/editgr/<?= $guru["id_guru"] ?>">Edit</a>
            <form action="/deletegr/<?= $guru["id_guru"] ?>" method="post" class="d-inline">
            <?= csrf_field() ?>
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="delete-btn" onclick="return confirm('apakah ada ingin menghapus dengan Username = <?= $guru["username_guru"] ?>')">Hapus</a>
            </form>
        </div>
        <a class="back-btn" href="/guru2">Balik ke list</a>
    </div>

<?= $this->endSection(); ?>