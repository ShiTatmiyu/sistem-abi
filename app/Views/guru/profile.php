<?= $this->extend('layout/template_admin'); ?>
<?= $this->section('content'); ?>

<link rel="stylesheet" href="/css/profile.css">

    <div class="card">
        <div class="card-body">
            <img src="/img/<?= $guru["foto_profile"] ?>" alt="Image" class="card-img">
            <div class="card-text">
                <h1 class="card-title"><?= $guru["username_guru"] ?></h1>
                <p class="card-description">Nama : <?= $guru["nama_guru"] ?></p>
                <p class="card-description">Email : <?= $guru["email_guru"] ?></p>
                <p class="card-description">Jenis Kelamin : <?= $guru["jenis_kelamin"] ?></p>
                <a class="btn" href="/editprofgr/<?= $guru["id_guru"] ?>">Edit</a>        
            </div>
        </div>
    </div>

<?= $this->endSection(); ?>