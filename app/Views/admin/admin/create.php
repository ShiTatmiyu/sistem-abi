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
                    <p>Password: <br></p>
                    <input class="form-input" type="text" name="password_admin" autofocus value="<?= old('password_admin'); ?>">
                </div>
                <div class="form-row">
                    <p>Email: <br></p>
                    <input class="form-input" type="email_admin" name="email_admin" autofocus value="<?= old('email_admin'); ?>">
                </div>
                <div class="form-row">
                    <p>Nama: <br></p>
                    <input class="form-input" type="text" name="nama_admin" autofocus value="<?= old('nama_admin'); ?>">
                </div>
                <div class="form-row">
                    <p>jenis kelamin: <br></p>
                    <input class="form-input" type="text" name="jenis_kelamin" autofocus value="<?= old('jenis_kelamin'); ?>">
                </div>
                <div class="form-row">
                    <p>foto profil: <br></p>
                    <input class="file-input" type="file" name="foto_profil">
                </div>
            <button class="btn-submit" type="submit">Register</button>
        </form>
        
<?= $this->endSection(); ?>
