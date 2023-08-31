    <main>
        <div class="search">
            <form method="post">
                <input type="text">
                <button type="button">Cari</button>
            </form>
        </div>
        <div class="books">
            <?php foreach ($data["content"] as $book) : ?>
                <div class="book">
                    <a href="<?= BASEURL ?>/Download/<?= $book["id"] ?>">
                        <img src="<?= BASEURL ?>/assets/cover/<?= $book["cover"] ?>" alt="cover arah langkah" width="200px">
                        <div class="title"><?= $book["title"] ?></div>
                        <span><?= $book["author"] ?></span>
                    </a>
                </div>
            <?php endforeach; ?>

        </div>

    </main>