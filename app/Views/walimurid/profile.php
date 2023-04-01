<?= $this->extend('layout/template_admin'); ?>
<?= $this->section('content'); ?>

    <div class="content">
        <img class="photo" src="/img/<?= $walimurid["foto_profile"] ?>">
        <div>
            <p>Username : <?= $walimurid["username_walimurid"] ?></p>
            <p>Nama : <?= $walimurid["nama_walimurid"] ?></p>
            <p>Email : <?= $walimurid["email_walimurid"] ?></p>
            <p>Jenis Kelamin : <?= $walimurid["jenis_kelamin"] ?></p>
        </div>
        <div>
            <a class="edit-btn" href="/editprofwm/<?= $walimurid["id_walimurid"] ?>">Edit</a>
        </div>
    </div>

<?= $this->endSection(); ?>