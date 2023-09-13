<main>
    <aside>
        <div class="first-text">
            <span>Temukan</span> buku favoritmu
            <br>disini
        </div>
        <div class="second-text">
            <span>pucuk pena</span>
            menyediakan berbagai macam buku yang bisa kamu download dengan gratis.
        </div>
        <div class="buttonToPage">
            <a href="<?= BASEURL ?>/Collections">
                <div class="btn-collection">
                    AYO AMBIL
                </div>
            </a>
            <?php if (isset($_SESSION["email"]) && isset($_SESSION["id_user"])) : ?>
                <a href="<?= BASEURL ?>/Contribute">
                    <div class="btn-collection">
                        DONASIKAN BUKUMU!
                    </div>
                </a>
            <?php endif; ?>
        </div>
    </aside>
    <div class="hero"><img src="<?= BASEURL ?>/assets/img/image-home.png" alt="gambar"></div>
</main>