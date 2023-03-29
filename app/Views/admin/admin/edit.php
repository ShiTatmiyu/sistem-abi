<?= $this->extend('layout/template_admin'); ?>
<?= $this->section('content'); ?>
<link rel="stylesheet" href="/css/editadm.css">

    <form method="post" action="/updateadm/<?= $admin['id_admin'] ?>" enctype="multipart/form-data">
    <?= csrf_field(); ?>
            <div class="form-list">
                <p>Username: <br></p>
                <input class="form-input" type="text" name="username" autofocus value="<?= $admin['username_admin']; ?>">
                <li><?= $validation->getError('username'); ?></li>
                <p>password: <br></p>
                <input class="form-input" type="text" name="password" autofocus value="<?= old('password'); ?>">
                <li><?= $validation->getError('password'); ?></li>
                <p>email: <br></p>
                <input class="form-input" type="text" name="email" autofocus value="<?= $admin['email_admin']; ?>">
                <li><?= $validation->getError('email'); ?></li>
                <p>nama: <br></p>
                <input class="form-input" type="text" name="nama" autofocus value="<?= $admin['nama_admin']; ?>">
                <li><?= $validation->getError('nama'); ?></li>
                <p>jenis kelamin: <br></p>
                <input class="form-input" type="text" name="jenis_kelamin" autofocus value="<?= $admin['jenis_kelamin']; ?>">
                <p>foto profil: <br></p>
                <input class="file-input" type="file" name="foto_profil"><br>
            </div>
            <button class="btn-submit" type="submit">Register</button>
    </form>

<?= $this->endSection(); ?>