<?= $this->extend('layout/template_admin'); ?>
<?= $this->section('content'); ?>

<link rel="stylesheet" href="/css/profile.css">

    <div class="card">
        <div class="card-body">
            <img src="/img/<?= $admin["foto_profile"] ?>" alt="Image" class="card-img">
            <div class="card-text">
                <h1 class="card-title"><?= $admin["username_admin"] ?></h1>
                <p class="card-description">Nama : <?= $admin["nama_admin"] ?></p>
                <p class="card-description">Email : <?= $admin["email_admin"] ?></p>
                <p class="card-description">Jenis Kelamin : <?= $admin["jenis_kelamin"] ?></p>
                <a class="btn" href="/editprofadm/<?= $admin["id_admin"] ?>">Edit</a>        
            </div>
        </div>
    </div>

<?= $this->endSection(); ?>