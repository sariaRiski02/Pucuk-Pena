<main>
    <div class="container">
        <div class="firsttext">
            <h1>Masuk</h1>
            <h4>Ayoo berkontribusi dalam perpustakaan ini</h4>
        </div>

        <form method="post">
            <input type="Email" placeholder="Email atau Nama" name="email-login">
            <input type="password" placeholder="Kata sandi" name="pass-login" id="pass">
            <div class="check">
                <input type="checkbox" id="check">
                <label for="check">Lihat kata sandi</label>
            </div>
            <div class="<?= $data["data"]["status"] ?>">
                <?= $data["data"]["message"] ?>
            </div>
            <button type="submit" name="login">Masuk</button>
            <div class="masuk">
                Belum punya akun?
                <a href="<?= BASEURL ?>/SignUp"> Daftar</a>
            </div>

        </form>

    </div>
</main>