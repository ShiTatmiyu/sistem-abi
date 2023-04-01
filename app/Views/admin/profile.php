<?= $this->extend('layout/template_admin'); ?>
<?= $this->section('content'); ?>

    <div class="content">
        <img class="photo" src="/img/<?= $admin["foto_profile"] ?>">
        <div>
            <p>Username : <?= $admin["username_admin"] ?></p>
            <p>Nama : <?= $admin["nama_admin"] ?></p>
            <p>Email : <?= $admin["email_admin"] ?></p>
            <p>Jenis Kelamin : <?= $admin["jenis_kelamin"] ?></p>
        </div>
        <div>
            <a class="edit-btn" href="/editprofadm/<?= $admin["id_admin"] ?>">Edit</a>
        </div>
    </div>

<?= $this->endSection(); ?>