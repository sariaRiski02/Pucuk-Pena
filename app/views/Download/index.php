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
            <form action="<?= BASEURL ?>/Collections/start_download">
                <button name="unduh" type="submit">Unduh</button>
            </form>
        </div>
    </div>
</main>