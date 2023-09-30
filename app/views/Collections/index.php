    <main>
        <div class="search">
            <form method="post">
                <input type="text" name="InputSearch">
                <button type="submit" name="search">Cari</button>
            </form>
        </div>
        <div class="books">
            <?php foreach ($data["content"] as $book) : ?>
                <div class="book">
                    <a href="<?= BASEURL ?>/Collections/unduh/<?= $book["id"] ?>" target="_blank">
                        <img src="<?= BASEURL ?>/assets/cover/<?= $book["cover"] ?>" alt="<?= $book["title"] ?>" width="200px">
                        <div class="title">
                            <?=
                            strlen($book["title"]) < 15 ? $book["title"] : substr($book["title"], 0, 15) . "...";
                            ?>
                        </div>
                        <span>
                            <?=
                            strlen($book["author"]) < 20 ? $book["author"] : substr($book["author"], 0, 20) . "...";
                            ?>
                        </span>
                    </a>
                </div>
            <?php endforeach; ?>

        </div>

    </main>