<?= $this->extend('layout/template_admin'); ?>
<?= $this->section('content'); ?>
<link rel="stylesheet" href="/css/create.css">
        
        <h1 class="title-page">Tambah Guru</h1>
        <form method="post" action="/guru/store" enctype="multipart/form-data">
        <?= csrf_field(); ?>
            <div class="form-list">
                <div class="form-row">
                    <label for="username">Username : </label><br>
                    <input class="form-input <?= (isset($errors['username_guru'])) ? 'is-invalid' : ''; ?>" type="text" id="username" name="username_guru" autofocus value="<?= old('username_guru'); ?>">
                    <br>
                    <?php if(isset($errors['username_guru'])) : ?>
                        <span style="color: red;"><?php echo $errors['username_guru'] ?></span>
                    <?php endif; ?>
                </div>
                <div class="form-row">
                    <label for="password">Password : </label><br>
                    <input class="form-input <?= (isset($errors['password_guru'])) ? 'is-invalid' : ''; ?>" type="text" id="password" name="password_guru" autofocus value="<?= old('password_guru'); ?>">
                    <br>
                    <?php if(isset($errors['password_guru'])) : ?>
                        <span style="color: red;"><?php echo $errors['password_guru'] ?></span>
                    <?php endif; ?>
                </div>
                <div class="form-row">
                    <label for="email">Email : </label><br>
                    <input class="form-input <?= (isset($errors['email_guru'])) ? 'is-invalid' : ''; ?>" type="email_guru" id="email" name="email_guru" autofocus value="<?= old('email_guru'); ?>">
                    <br>
                    <?php if(isset($errors['email_guru'])) : ?>
                        <span style="color: red;"><?php echo $errors['email_guru'] ?></span>
                    <?php endif; ?>
                </div>
                <div class="form-row">
                    <label for="nama">Nama : </label><br>
                    <input class="form-input <?= (isset($errors['nama_guru'])) ? 'is-invalid' : ''; ?>" type="text" id="nama" name="nama_guru" autofocus value="<?= old('nama_guru'); ?>">
                    <br>
                    <?php if(isset($errors['nama_guru'])) : ?>
                        <span style="color: red;"><?php echo $errors['nama_guru'] ?></span>
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
