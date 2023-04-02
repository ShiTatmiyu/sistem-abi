<?= $this->extend('layout/template_guru'); ?>
<?= $this->section('content'); ?>
<link rel="stylesheet" href="/css/home_guru.css">

<h1 class="judul"><b>Dashboard</b></h1>
<div class="content">
    <a class="t-black account" href="/admin-profil/<?= session('user_id') ?>">
        <img class="photo" src="/img/<?= session('user_photo') ?>">
        <h1><?= session('user_name') ?></h1>
    </a>
    <a class="t-black data" href="/ibadahgr2">
        <i class="col-icon fa-solid fa-mosque"></i>
        <h1>Ibadah</h1>
    </a>
    <a class="t-black absen" href="/laporangr2">
        <i class="col-icon fa-solid fa-sticky-note"></i>
        <h1>Laporan</h1>
    </a>
</div>
<?= $this->endSection(); ?>