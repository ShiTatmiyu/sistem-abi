<?= $this->extend('layout/template_admin'); ?>
<?= $this->section('content'); ?>

    <div class="content">
        <img class="photo" src="/img/<?= $guru["foto_profile"] ?>">
        <div>
            <p>Username : <?= $guru["username_guru"] ?></p>
            <p>Nama : <?= $guru["nama_guru"] ?></p>
            <p>Email : <?= $guru["email_guru"] ?></p>
            <p>Jenis Kelamin : <?= $guru["jenis_kelamin"] ?></p>
        </div>
        <div>
            <a class="edit-btn" href="/editprofgr/<?= $guru["id_guru"] ?>">Edit</a>
        </div>
    </div>

<?= $this->endSection(); ?>