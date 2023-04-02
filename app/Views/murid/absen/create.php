<?= $this->extend('layout/template_murid'); ?>
<?= $this->section('content'); ?>
<link rel="stylesheet" href="/css/create.css">

<h1 style="margin-bottom: 30px;">Isi Absen</h1>
<form action="/absen/store" method="post">
    <?php foreach($absen as $ab) { ?>
        <div class="input-row">
            <td><p class="text-box"><?= $ab['nama_ibadah'] ?></p></td>
            <td><input class="check-box" type="checkbox" name="absen[<?= $ab['id_ibadah'] ?>][present]" value="1"></td>
        </div>
    <?php } ?>
    <button class="ok-btn" type="submit">Kirim</button>
</form>

<?= $this->endSection(); ?>