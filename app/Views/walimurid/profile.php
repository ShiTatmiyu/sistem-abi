<?= $this->extend('layout/template_admin'); ?>
<?= $this->section('content'); ?>

<link rel="stylesheet" href="/css/profile.css">

    <div class="card">
        <div class="card-body">
            <img src="/img/<?= $walimurid->foto_profile ?>" alt="Image" class="card-img">
            <div class="card-text">
                <h1 class="card-title"><?= $walimurid->username_walimurid ?></h1>
                <p class="card-description">Nama : <?= $walimurid->nama_walimurid ?></p>
                <p class="card-description">Email : <?= $walimurid->email_walimurid ?></p>
                <p class="card-description">Nama Murid : <?= $walimurid->nama_murid ?></p>
                <p class="card-description">Jenis Kelamin : <?= $walimurid->jenis_kelamin ?></p>
                <a class="btn" href="/editprofwm/<?= $walimurid->id_walimurid ?>">Edit</a>        
            </div>
        </div>
    </div>

<?= $this->endSection(); ?>