<?= $this->extend('layout/template_murid'); ?>
<?= $this->section('content'); ?>
<link rel="stylesheet" href="/css/home_murid.css">

<h1 class="judul"><b>Dashboard</b></h1>
<div class="content">
    <a class="t-black account" href="/murid-profil/<?= session('user_id') ?>">
        <img class="photo" src="/img/<?= session('user_photo') ?>">
        <h1><?= session('user_name') ?></h1>
    </a>
    <a class="t-black data" href="/ibadah2">
        <i class="col-icon fa-solid fa-mosque"></i>
        <h1>Ibadah</h1>
    </a>
    <a class="t-black absen" href="/absen2">
        <i class="col-icon fa-solid fa-pencil-alt"></i>
        <h1>Absen</h1>
    </a>
</div>
<?= $this->endSection(); ?>