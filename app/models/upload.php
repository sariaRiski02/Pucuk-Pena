
<?php

class upload
{

    private $table_book = "books";
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }


    // feuture Add book
    public function checkPdf($target_file)
    {
        $typefile = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        return $typefile == "pdf" ? true : false;
    }

    public function checkImg($target_file)
    {
        $typeImg = array("jpeg", "jpg", "png", "gif");
        $typefile = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        return (in_array($typefile, $typeImg)) ? true : false;
    }

    public function move($key, $target_file)
    {
        return (move_uploaded_file($_FILES[$key]["tmp_name"], $target_file));
    }

    public function message($status, $message)
    {
        return array(
            "class" => $status,
            "message" => $message
        );
    }


    // Get All Data
    public function GetAll()
    {
        $this->db->query("SELECT * FROM " . $this->table_book);
        return $this->db->resultSet();
    }





    // Add Data
    public function Add($data)
    {
        $uploadOk = "";

        if (isset($_POST["submit"])) {
            $target_dir = "../app/assets/";
            $target_file_book = $target_dir . "books/" . basename($_FILES["book"]["name"]);
            $target_file_cover = "C:/xampp/htdocs/Pucuk-Pena/public/assets/cover/" . basename($_FILES["cover"]["name"]);
            $target_file_sinop = $target_dir . "desc/" . $_FILES["book"]["name"] . time() . ".txt";

            // check pdf books
            if ($this->checkPdf($target_file_book)) {
                $max_size_pdf =  100000000;
                if (filesize($_FILES["book"]["tmp_name"]) < $max_size_pdf) {
                    $uploadOk = "success";
                } else {
                    $message = "Ukuran Buku yang diizinkan < 100Mb";
                    return $this->message("failed", $message);
                };
            } else {
                $message = "Harus format .pdf";
                return $this->message("failed", $message);
            }

            // check img cover
            if ($this->checkImg($target_file_cover)) {
                $max_size_img = 2000000;
                if (filesize($_FILES["cover"]["tmp_name"]) < $max_size_img) {
                    $uploadOk = "success";
                } else {
                    $message = "Ukuran Sampul yang diizinkan < 2Mb";
                    return  $this->message("failed", $message);
                }
            } else {
                $message = "Sampul yang Diizinkan hanya tipe png, jpeg, jpg, gif";
                return  $this->message("failed", $message);
            }

            // check size sinopsis
            $max_char_sinop = 1000;
            if (strlen($data["DescBooks"]) < $max_char_sinop) {
                $data["DescBooks"] = (ctype_space($data["DescBooks"])) ? "tidak ada sinopsis" : $data["DescBooks"];
                $uploadOk = "success";
            } else {
                $message = "sinopsi yang di izinkan hanya 950 karakter";
                return  $this->message("failed", $message);
            }
            // write sinopsis to file
            $sinop = fopen($target_file_sinop, "w");
            if ($sinop == true) {
                fwrite($sinop, $data["DescBooks"]);
                fclose($sinop);
                $uploadOk = "success";
            } else {
                $message = "sinopsis gagal dimuat";
                return  $this->message("failed", $message);
            }
            $result = false;
            if ($uploadOk == "success") {
                if ($this->move("book", $target_file_book) && $this->move("cover", $target_file_cover)) {
                    $result = "success";
                } else {
                    $this->message("failed", "Terjadi kesalahan, Ulangi lagi");
                }
            } else {
                return "Mohon Muat ulang";
            }
            if ($result) {
                $query = "INSERT INTO books VALUES
                ('', :title, :author, :sinopsis, :book, :cover)";

                $this->db->query($query);
                $this->db->bind("title", $data["title"]);
                $this->db->bind("author", $data["author"]);
                $this->db->bind("sinopsis", basename($_FILES["book"]["name"]) . time());
                $this->db->bind("book", $_FILES["book"]["name"]);
                $this->db->bind("cover", $_FILES["cover"]["name"]);

                $this->db->execute();
                $success =  $this->message("success", "Berhasil diunggah");
                $failed =  $this->message("success", "Gagal diunggah");
                return ($this->db->rowCount() > 0) ? $success : $failed;
            }
            return "Mohon Muat ulang";
        }
        return $this->message("", "");
    }
}
