<main>
    <div class="preview">
        <div class="cover">
            <img src="<?= BASEURL; ?>/assets/cover/<?= $data["item"]["cover"] ?>" width="150px" alt="cover" id="photoPreview">
        </div>
        <form method="post" enctype="multipart/form-data">
            <div class="input-cover">
                <input type="file" accept="image/*" name="change_cover" id="change_cover" style="display: none;">

                <label for="change_cover" class="label-cover" id="labelCover">Masukan Sampul</label>
            </div>
            <div class="title-author">
                <input type="text" name="change_title" require placeholder="Judul : <?= $data["item"]["title"] ?>">
                <input type="text" name="change_author" require placeholder="Penulis : <?= $data["item"]["author"] ?>">
            </div>
            <textarea name="change_sinop" cols="30" rows="10" placeholder="Sinopsis" id="textarea"><?= $data["item"]["sinopsis"] ?></textarea>
            <div class="<?= $data["warning"]["class"] ?>"><?= $data["warning"]["message"] ?></div>
            <button type="submit" name="update">Ubah</button>
        </form>
    </div>
</main>