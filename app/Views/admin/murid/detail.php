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
                <div style="display: flex;">
                    <a class="btn" href="/editmr/<?= $murid["nisn"] ?>">Edit</a>
                    <form action="/deletemr/<?= $murid["nisn"] ?>" method="post" class="d-inline">
                        <?= csrf_field() ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn" onclick="return confirm('apakah ada ingin menghapus dengan Username = <?= $murid['username_murid'] ?>')">Hapus</button>
                    </form>          
                </div>
                <a href="/murid2" class="btn">balik ke list</a>
            </div>
        </div>
    </div>

<?= $this->endSection(); ?>