<?= $this->extend('layout/template_admin'); ?>
<?= $this->section('content'); ?>

    <div class="content">
        <img class="photo" src="/img/<?= $murid["foto_profile"] ?>">
        <div>
            <p>Username : <?= $murid["username_murid"] ?></p>
            <p>Nama : <?= $murid["nama_murid"] ?></p>
            <p>Email : <?= $murid["email_murid"] ?></p>
            <p>Jenis Kelamin : <?= $murid["jenis_kelamin"] ?></p>
        </div>
        <div>
            <a class="edit-btn" href="/editprofmr/<?= $murid["nisn"] ?>">Edit</a>
        </div>
    </div>

<?= $this->endSection(); ?>