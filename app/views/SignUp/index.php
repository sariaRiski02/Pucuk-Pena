<main>
    <div class="container">
        <div class="firsttext">
            <h1>Daftar</h1>
            <h4>Ayoo berkontribusi dalam perpustakaan ini</h4>
        </div>

        <form method="post">
            <input type="text" placeholder="Nama" name="nickname" required>
            <input type="Email" placeholder="Email" name="email" required>
            <input type="password" placeholder="Kata sandi" name="password" id="password" required>
            <input type="password" placeholder="Konfirmasi Kata sandi" name="confirm-pass" id="confirm-pass" required>

            <div class="check">
                <input type="checkbox" id="check">
                lihat kata sandi
            </div>

            <div class="<?= $data["data"]["status"] ?>">
                <?= $data["data"]["message"] ?>
            </div>

            <button type="submit" name="sign-in">Daftar</button>
            <div class="daftar">
                Sudah punya akun?
                <a href="<?= BASEURL ?>/SignIn"> Masuk</a>
            </div>

        </form>

    </div>
</main>