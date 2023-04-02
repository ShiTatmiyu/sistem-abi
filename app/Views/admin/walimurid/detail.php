<?= $this->extend('layout/template_admin'); ?>
<?= $this->section('content'); ?>

<link rel="stylesheet" href="/css/profile.css">

    <div class="card">
        <div class="card-body">
            <img src="/img/<?= $walimurid->foto_profile ?>" alt="Image" class="card-img">
            <div class="card-text">
                <h1 class="card-title"><?= $walimurid->username_walimurid ?></h1>
                <p class="card-description">Nama Walimurid : <?= $walimurid->nama_walimurid ?></p>
                <p class="card-description">Nama Murid : <?= $walimurid->nama_murid ?></p>
                <p class="card-description">Email : <?= $walimurid->email_walimurid ?></p>
                <p class="card-description">Jenis Kelamin : <?= $walimurid->jenis_kelamin ?></p>
                <div style="display: flex;">
                    <a class="btn" href="/editwm/<?= $walimurid->id_walimurid ?>">Edit</a>
                    <form action="/deletewm/<?= $walimurid->id_walimurid ?>" method="post" class="d-inline">
                        <?= csrf_field() ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn" onclick="return confirm('apakah ada ingin menghapus dengan Username = <?= $walimurid->username_walimurid ?>')">Hapus</button>
                    </form>          
                </div>
                <a href="/walimurid2" class="btn">balik ke list</a>
            </div>
        </div>
    </div>


<?= $this->endSection(); ?>