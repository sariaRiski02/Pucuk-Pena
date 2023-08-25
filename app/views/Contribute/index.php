    <main>
        <h1>Unggah Bukumu</h1>
        <form method="post">
            <div class="InputBook">
                <div class="book">
                    <input type="file" id="fileInput" style="display: none;" accept="pdf/*" name="book">
                    <label for="fileInput" id="fileInputLabel">Masukan Buku</label>
                </div>
                <div class="book">
                    <input type="file" id="fileInput" style="display: none;" accept="image/*" name="cover">
                    <label for="fileInput" id="fileInputLabel">Masukan Sampul</label>
                </div>
            </div>
            <div class="InputDesc">
                <input type="text" placeholder="Judul" name="tittle">
                <input type="text" placeholder="Penulis" name="author">
            </div>
            <div class="desc">
                <textarea name="DescBooks" id="" cols="30" rows="10"></textarea>
            </div>
            <button type="submit">Unggah</button>
        </form>
    </main>