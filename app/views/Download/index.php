<main>
    <div class="preview">
        <div class="cover">
            <img src="<?= BASEURL ?>/assets/cover/<?= $data["item"]["cover"] ?>" width="150px" alt="cover arah langkah">
        </div>
        <div class="sinopsis">
            <h2>Judul: <span><?= $data["item"]["title"] ?></span></h2>
            <br>
            <h2>Penulis: <Span><?= $data["item"]["author"] ?></Span></h2>
            <br>
            <h2>Sinopsis: </h2>
            <p>
                <br>
                <?= $data["item"]["sinopsis"] ?>
            </p>
            <hr>
            <div class="button-action">
                <form action="<?= BASEURL ?>/Collections/start_download/<?= $data["item"]["id"] ?>">
                    <button name="unduh" type="submit">Unduh</button>
                </form>
                <?php if (isset($_SESSION["email"]) && isset($_SESSION["id_user"])) : ?>
                    <form action="<?= BASEURL ?>/Contribute/UpdateBook/<?= $data["item"]["id"] ?>">
                        <button id="Update" name="update" type="submit">Edit</button>
                    </form>
                    <form action="<?= BASEURL ?>/Contribute/Delete/<?= $data["item"]["id"] ?>" method="post">
                        <button id="delete" name="hapus" type="submit">Hapus</button>
                    </form>
                <?php endif; ?>

            </div>

        </div>
    </div>
</main>