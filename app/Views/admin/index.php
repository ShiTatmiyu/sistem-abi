<?= $this->extend('layout/template_admin'); ?>
<?= $this->section('content'); ?>
<link rel="stylesheet" href="/css/home_admin.css">

<h1 class="judul"><b>Dashboard</b></h1>
<div class="content">
    <a href="/admin2" class="col col-admin">
        <div class="col-content">
            <i class="col-icon fa-solid fa-user-gear"></i>
            <div>
                <p class="col-title">Admin</p>
                <p class="col-count"><?= $count_admin ?></p>
            </div>
        </div>
    </a>
    <a href="/guru2" class="col col-guru">
        <div class="col-content">
            <i class="col-icon fas fa-chalkboard-teacher"></i>
            <div>
                <p class="col-title">Guru</p>
                <p class="col-count"><?= $count_guru ?></p>
            </div>
        </div>
    </a>
    <a href="/murid2" class="col col-murid">
        <div class="col-content">
            <i class="col-icon fa-solid fa-user-graduate"></i>
            <div>
                <p class="col-title">Murid</p>
                <p class="col-count"><?= $count_murid ?></p>
            </div>
        </div>
    </a>
    <a href="/walimurid2" class="col col-walimurid">
        <div class="col-content">
            <i class="col-icon fa-solid fa-user"></i>
            <div>
                <p class="col-title">Walimurid</p>
                <p class="col-count"><?= $count_walimurid ?></p>
            </div>
        </div>
    </a>
    <a href="/data2" class="col col-data">
        <div class="col-content">
            <i class="col-icon fa-solid fa-mosque"></i>
            <div>
                <p class="col-title">Data</p>
                <p class="col-count"><?= $count_ibadah ?></p>
            </div>
        </div>
    </a>
    
</div>
<?= $this->endSection(); ?>