<?= $this->extend('layout/template_admin'); ?>
<?= $this->section('content'); ?>

<link rel="stylesheet" href="/css/profile.css">

    <div class="card">
        <div class="card-body">
            <img src="/img/<?= $murid["foto_profile"] ?>" alt="Image" class="card-img">
            <div class="card-text">
                <h1 class="card-title"><?= $murid["username_murid"] ?></h1>
                <p class="card-description">Nisn : <?= $murid["nisn"] ?></p>
                <p class="card-description">Nama : <?= $murid["nama_murid"] ?></p>
                <p class="card-description">Email : <?= $murid["email_murid"] ?></p>
                <p class="card-description">Jenis Kelamin : <?= $murid["jenis_kelamin"] ?></p>
                <a class="btn" href="/editprofmr/<?= $murid["nisn"] ?>">Edit</a>        
            </div>
        </div>
    </div>

<?= $this->endSection(); ?>