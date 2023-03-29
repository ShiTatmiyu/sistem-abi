<?= $this->extend('layout/template_murid'); ?>
<?= $this->section('content'); ?>

<h1>Isi Absen</h1>
<form action="/absen/store" method="post">
    <?php foreach($absen as $ab) { ?>
        <div class="input-row">
            <td><?= $ab['nama_ibadah'] ?></td>
            <td><input type="checkbox" name="absen[<?= $ab['id_ibadah'] ?>][present]" value="1"></td>
        </div>
    <?php } ?>
    <button type="submit">Kirim</button>
</form>

<?= $this->endSection(); ?>