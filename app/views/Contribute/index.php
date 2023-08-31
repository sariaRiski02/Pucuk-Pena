    <main>
        <h1>Unggah Bukumu</h1>
        <form method="post" action="<?= BASEURL; ?>/Contribute" enctype="multipart/form-data">
            <div class="InputBook">
                <div class="book">
                    <input type="file" id="bookFileInput" style="display: none;" accept=".pdf" name="book" required>
                    <label for="bookFileInput" class="fileInputLabel">Masukkan Buku</label>
                </div>
                <div class="book">
                    <input type="file" id="coverFileInput" style="display: none;" accept="image/*" name="cover" required>
                    <label for="coverFileInput" class="fileInputLabel">Masukkan Sampul</label>
                </div>
            </div>

            <div class="InputDesc">
                <input type="text" placeholder="Judul" name="title" required>
                <input type="text" placeholder="Penulis" name="author" required>
            </div>
            <div class="desc">
                <textarea name="DescBooks" id="" cols="30" rows="10" required></textarea>
            </div>
            <div class="<?= $data["data"]["class"] ?>"><?= $data["data"]["message"] ?></div>
            <button type="submit" name="submit" value="hallo">Unggah</button>
        </form>
    </main>