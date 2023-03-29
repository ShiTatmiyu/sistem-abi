<?= $this->extend('layout/template_admin'); ?>
<?= $this->section('content'); ?>
<link rel="stylesheet" href="/css/create_admin.css">
        
        <h1 class="title-page">Tambah Admin</h1>
        <form method="post" action="/admin/store" enctype="multipart/form-data">
        <?= csrf_field(); ?>
            <div class="form-list">
                <div class="form-row">
                    <label for="username">Username : </label><br>
                    <input class="form-input <?= (isset($errors['username_admin'])) ? 'is-invalid' : ''; ?>" type="text" id="username" name="username_admin" autofocus value="<?= old('username_admin'); ?>">
                    <br>
                    <?php if(isset($errors['username_admin'])) : ?>
                        <span style="color: red;"><?php echo $errors['username_admin'] ?></span>
                    <?php endif; ?>
                </div>
                <div class="form-row">
                    <label for="password">Password : </label><br>
                    <input class="form-input <?= (isset($errors['password_admin'])) ? 'is-invalid' : ''; ?>" type="text" id="password" name="password_admin" autofocus value="<?= old('password_admin'); ?>">
                    <br>
                    <?php if(isset($errors['password_admin'])) : ?>
                        <span style="color: red;"><?php echo $errors['password_admin'] ?></span>
                    <?php endif; ?>
                </div>
                <div class="form-row">
                    <label for="email">Email : </label><br>
                    <input class="form-input <?= (isset($errors['email_admin'])) ? 'is-invalid' : ''; ?>" type="email_admin" id="email" name="email_admin" autofocus value="<?= old('email_admin'); ?>">
                    <br>
                    <?php if(isset($errors['email_admin'])) : ?>
                        <span style="color: red;"><?php echo $errors['email_admin'] ?></span>
                    <?php endif; ?>
                </div>
                <div class="form-row">
                    <label for="nama">Nama : </label><br>
                    <input class="form-input <?= (isset($errors['nama_admin'])) ? 'is-invalid' : ''; ?>" type="text" id="nama" name="nama_admin" autofocus value="<?= old('nama_admin'); ?>">
                    <br>
                    <?php if(isset($errors['nama_admin'])) : ?>
                        <span style="color: red;"><?php echo $errors['nama_admin'] ?></span>
                    <?php endif; ?>
                </div>
                <div class="form-row">
                    <label for="jenis_kelamin">Jenis Kelamin : </label><br>
                    <input class="form-input <?= (isset($errors['jenis_kelamin'])) ? 'is-invalid' : ''; ?>" type="text" id="jenis_kelamin" name="jenis_kelamin" autofocus value="<?= old('jenis_kelamin'); ?>">
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
