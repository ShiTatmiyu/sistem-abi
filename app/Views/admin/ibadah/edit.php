<?= $this->extend('layout/template_admin'); ?>
<?= $this->section('content'); ?>
<link rel="stylesheet" href="/css/create_admin.css">
        
        <h1 class="title-page">Edit Admin</h1>
        <form method="post" action="/updateib/<?= $ibadah['id_ibadah'] ?>" enctype="multipart/form-data">
        <?= csrf_field(); ?>
            <div class="form-list">
                <div class="form-row">
                    <label for="nama">Nama Ibadah : </label><br>
                    <input class="form-input <?= (isset($errors['nama_ibadah'])) ? 'is-invalid' : ''; ?>" type="text" id="nama" name="nama_ibadah" autofocus value="<?= $ibadah['nama_ibadah'] ?>">
                    <br>
                    <?php if(isset($errors['nama_ibadah'])) : ?>
                        <span style="color: red;"><?php echo $errors['nama_ibadah'] ?></span>
                    <?php endif; ?>
                </div>
                <div class="form-row">
                    <label for="hukum">Hukum Ibadah : </label><br>
                    <input class="form-input <?= (isset($errors['hukum_ibadah'])) ? 'is-invalid' : ''; ?>" type="text" id="hukum" name="hukum_ibadah" autofocus value="<?= $ibadah['hukum_ibadah'] ?>">
                    <br>
                    <?php if(isset($errors['hukum_ibadah'])) : ?>
                        <span style="color: red;"><?php echo $errors['hukum_ibadah'] ?></span>
                    <?php endif; ?>
                </div>
                <div class="form-row">
                    <label for="jadwal">Jadwal Ibadah : </label><br>
                    <input class="form-input <?= (isset($errors['jadwal_ibadah'])) ? 'is-invalid' : ''; ?>" type="text" id="jadwal" name="jadwal_ibadah" autofocus value="<?= $ibadah['jadwal_ibadah'] ?>">
                    <br>
                    <?php if(isset($errors['jadwal_ibadah'])) : ?>
                        <span style="color: red;"><?php echo $errors['jadwal_ibadah'] ?></span>
                    <?php endif; ?>
                </div>
                <button class="btn-submit" type="submit">Tambah Data</button>
            </div>
        </form>
        
<?= $this->endSection(); ?>
