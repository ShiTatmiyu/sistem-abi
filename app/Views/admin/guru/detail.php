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
                <div style="display: flex;">
                    <a class="btn" href="/editgr/<?= $guru["id_guru"] ?>">Edit</a>
                    <form action="/deletegr/<?= $guru["id_guru"] ?>" method="post" class="d-inline">
                        <?= csrf_field() ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn" onclick="return confirm('apakah ada ingin menghapus dengan Username = <?= $guru['username_guru'] ?>')">Hapus</button>
                    </form>          
                </div>
                <a href="/guru2" class="btn">balik ke list</a>
            </div>
        </div>
    </div>

<?= $this->endSection(); ?>