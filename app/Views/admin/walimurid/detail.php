<?= $this->extend('layout/template_admin'); ?>
<?= $this->section('content'); ?>
<link rel="stylesheet" href="/css/detail_admin.css">

    <div class="content">
        <img class="photo" src="/img/<?= $walimurid->foto_profile ?>">
        <div>
            <p>Username Walimurid : <?= $walimurid->username_walimurid ?></p>
            <p>Nama Walimurid : <?= $walimurid->nama_walimurid ?></p>
            <p>Email : <?= $walimurid->email_walimurid ?></p>
            <p>Username Murid : <?= $walimurid->username_murid ?></p>
            <p>Nama Murid : <?= $walimurid->nama_murid ?></p>
            <p>Jenis Kelamin : <?= $walimurid->jenis_kelamin ?></p>
        </div>
        <div>
            <a class="edit-btn" href="/editwm/<?= $walimurid->id_walimurid ?>">Edit</a>
            <form action="/deletewm/<?= $walimurid->id_walimurid ?>" method="post" class="d-inline">
            <?= csrf_field() ?>
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="delete-btn" onclick="return confirm('apakah ada ingin menghapus dengan Username = <?= $walimurid->username_walimurid ?>')">Hapus</a>
            </form>
        </div>
        <a class="back-btn" href="/walimurid2">Balik ke list</a>
    </div>

<?= $this->endSection(); ?>