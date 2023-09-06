<main>
    <div class="container">
        <div class="firsttext">
            <h1>Daftar</h1>
            <h4>Ayoo berkontribusi dalam perpustakaan ini</h4>
        </div>

        <form method="post">
            <input type="text" placeholder="Nama User">
            <input type="Email" placeholder="Email">
            <input type="pass" placeholder="Kata sandi">
            <input type="pass" placeholder="Konfirmasi Kata sandi">
            <input type="checkbox" name="check" id="check">
            <div class="daftar">
                Sudah punya akun?
                <a href="<?= BASEURL ?>/SignIn"> Masuk</a>
            </div>
            <button type="submit" name="sign-in">Daftar</button>

        </form>

    </div>
</main>