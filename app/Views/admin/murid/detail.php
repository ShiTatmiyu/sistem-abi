<?= $this->extend('layout/template_admin'); ?>
<?= $this->section('content'); ?>
<link rel="stylesheet" href="/css/detail_admin.css">

    <div class="content">
        <img class="photo" src="/img/<?= $murid["foto_profile"] ?>">
        <div>
            <p>Username : <?= $murid["username_murid"] ?></p>
            <p>Nama : <?= $murid["nama_murid"] ?></p>
            <p>Email : <?= $murid["email_murid"] ?></p>
            <p>Jenis Kelamin : <?= $murid["jenis_kelamin"] ?></p>
        </div>
        <div>
            <a class="edit-btn" href="/editmr/<?= $murid["nisn"] ?>">Edit</a>
            <form action="/deletemr/<?= $murid["nisn"] ?>" method="post" class="d-inline">
            <?= csrf_field() ?>
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="delete-btn" onclick="return confirm('apakah ada ingin menghapus dengan Username = <?= $murid["username_murid"] ?>')">Hapus</a>
            </form>
        </div>
        <a class="back-btn" href="/murid2">Balik ke list</a>
    </div>

<?= $this->endSection(); ?>