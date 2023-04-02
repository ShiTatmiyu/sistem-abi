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
                <div style="display: flex;">
                    <a class="btn" href="/editadm/<?= $admin["id_admin"] ?>">Edit</a>
                    <form action="/deleteadm/<?= $admin["id_admin"] ?>" method="post" class="d-inline">
                        <?= csrf_field() ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn" onclick="return confirm('apakah ada ingin menghapus dengan Username = <?= $admin['username_admin'] ?>')">Hapus</button>
                    </form>          
                </div>
                <a href="/admin2" class="btn">balik ke list</a>
            </div>
        </div>
    </div>
    
<?= $this->endSection(); ?>