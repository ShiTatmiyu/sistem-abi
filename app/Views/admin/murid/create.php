<?= $this->extend('layout/template_admin'); ?>
<?= $this->section('content'); ?>
        <?php 
            $session = session();
            $error = $session->getFlashdata('error');
        ?>
        
        <?php if($error){ ?>
            <p style="color:red">Terjadi Kesalahan:
                <ul>
                    <?php foreach($error as $e){ ?>
                    <li><?php echo $e ?></li>
                    <?php } ?>
                </ul>
            </p>
        <?php } ?>
        
        <h5>Register Murid</h5>
        <form method="post" action="/admin/save_murid">
            Nisn: <br>
            <input type="text" name="nisnmurid" required><br>
            Username: <br>
            <input type="text" name="username" required><br>
            Password: <br>
            <input type="password" name="password" required><br>
            Email: <br>
            <input type="email" name="email" required><br>
            Nama: <br>
            <input type="text" name="nama_murid" required><br>
            Jenis Kelamin: <br>
            <input type="text" name="jenis_kelamin" required><br>
            Foto Profil: <br>
            <input type="text" name="fotoprofil" required><br>
            <button type="submit">Register</button>
        </form>
        <?= $this->endSection(); ?>