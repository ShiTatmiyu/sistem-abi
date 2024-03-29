<?= $this->extend('layout/template_admin'); ?>
<?= $this->section('content'); ?>
<link rel="stylesheet" href="/css/create.css">
        
        <h1 class="title-page">Tambah Admin</h1>
        <form method="post" action="/updateprofmr/<?= $murid['nisn'] ?>" enctype="multipart/form-data">
        <?= csrf_field(); ?>
            <div class="form-list">
                <div class="form-row">
                    <label for="username">Username : </label><br>
                    <input class="form-input <?= (isset($errors['username_murid'])) ? 'is-invalid' : ''; ?>" type="text" id="username" name="username_murid" autofocus value="<?= $murid['username_murid'] ?>">
                    <br>
                    <?php if(isset($errors['username_murid'])) : ?>
                        <span style="color: red;"><?php echo $errors['username_murid'] ?></span>
                    <?php endif; ?>
                </div>
                <div class="form-row">
                    <label for="password">Password : </label><br>
                    <input class="form-input <?= (isset($errors['password_murid'])) ? 'is-invalid' : ''; ?>" type="password" id="password" name="password_murid" autofocus>
                    <br>
                    <?php if(isset($errors['password_murid'])) : ?>
                        <span style="color: red;"><?php echo $errors['password_murid'] ?></span>
                    <?php endif; ?>
                </div>
                <div class="form-row">
                    <label for="email">Email : </label><br>
                    <input class="form-input <?= (isset($errors['email_murid'])) ? 'is-invalid' : ''; ?>" type="email" id="email" name="email_murid" autofocus value="<?= $murid['email_murid'] ?>">
                    <br>
                    <?php if(isset($errors['email_murid'])) : ?>
                        <span style="color: red;"><?php echo $errors['email_murid'] ?></span>
                    <?php endif; ?>
                </div>
                <div class="form-row">
                    <label for="nama">Nama : </label><br>
                    <input class="form-input <?= (isset($errors['nama_murid'])) ? 'is-invalid' : ''; ?>" type="text" id="nama" name="nama_murid" autofocus value="<?= $murid['nama_murid'] ?>">
                    <br>
                    <?php if(isset($errors['nama_murid'])) : ?>
                        <span style="color: red;"><?php echo $errors['nama_murid'] ?></span>
                    <?php endif; ?>
                </div>
                <div class="form-row">
                    <label for="jenis_kelamin">Jenis Kelamin : </label><br>
                    <input class="form-input <?= (isset($errors['jenis_kelamin'])) ? 'is-invalid' : ''; ?>" type="text" id="jenis_kelamin" name="jenis_kelamin" autofocus value="<?= $murid['jenis_kelamin'] ?>">
                    <br>
                    <?php if(isset($errors['jenis_kelamin'])) : ?>
                        <span style="color: red;"><?php echo $errors['jenis_kelamin'] ?></span>
                    <?php endif; ?>
                </div>
                <div class="form-row">
                    <label for="foto_profile">Foto Profil : </label><br>
                    <input class="file-input <?= (isset($errors['foto_profile'])) ? 'is-invalid' : ''; ?>" type="file" id="foto_profile" name="foto_profil">
                    <br>
                    <?php if(isset($errors['foto_profile'])) : ?>
                        <span style="color: red;"><?php echo $errors['foto_profile'] ?></span>
                    <?php endif; ?>
                </div>
            <button class="btn-submit" type="submit">Tambah Data</button>
        </form>
        
<?= $this->endSection(); ?>
