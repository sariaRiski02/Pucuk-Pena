
<?php

class Contribute_model
{

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }
    // ======================================================================//

    // check pdf type
    public function checkPdf($target_file)
    {
        $typefile = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        return $typefile == "pdf" ? true : false;
    }

    // check img type
    public function checkImg($target_file)
    {
        $typeImg = array("jpeg", "jpg", "png", "gif");
        $typefile = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        return (in_array($typefile, $typeImg)) ? true : false;
    }

    // upload to directory
    public function move($key, $target_file)
    {
        return (move_uploaded_file($_FILES[$key]["tmp_name"], $target_file));
    }

    // information output
    public function message($status, $message)
    {
        return array(
            "class" => $status,
            "message" => $message
        );
    }

    // Add Data
    public function Add($data)
    {
        $uploadOk = "";

        if (isset($data["submit"])) {
            $title = htmlspecialchars($data["title"]);
            $author = htmlspecialchars($data["author"]);
            $sinopsis = htmlspecialchars($data["DescBooks"]);

            if (!(isset($title) && isset($author) && isset($sinopsis))) {
                return $this->message("failed", "Mohon Lengkapi data");
                exit();
            }
            $target_dir = "../app/assets/";
            $target_file_book = $target_dir . "books/" . basename($_FILES["book"]["name"]);
            $target_file_cover = "C:/xampp/htdocs/Pucuk-Pena/public/assets/cover/" . basename($_FILES["cover"]["name"]);
            $name_file = $title . time();
            $target_file_sinop = $target_dir . "desc/" . $name_file . ".txt";

            // check pdf books
            if ($this->checkPdf($target_file_book)) {
                $max_size_pdf =  100000000;
                if (filesize($_FILES["book"]["tmp_name"]) < $max_size_pdf) {
                    $uploadOk = "success";
                } else {
                    $message = "Ukuran Buku yang diizinkan < 100Mb";
                    return $this->message("failed", $message);
                    exit();
                };
            } else {
                $message = "Harus format .pdf";
                return $this->message("failed", $message);
                exit();
            }

            // check img cover
            if ($this->checkImg($target_file_cover)) {
                $max_size_img = 2000000;
                if (filesize($_FILES["cover"]["tmp_name"]) < $max_size_img) {
                    $uploadOk = "success";
                } else {
                    $message = "Ukuran Sampul yang diizinkan < 2Mb";
                    return  $this->message("failed", $message);
                    exit();
                }
            } else {
                $message = "Sampul yang Diizinkan hanya tipe png, jpeg, jpg, gif";
                return  $this->message("failed", $message);
                exit();
            }

            // check size sinopsis

            $max_char_sinop = 1000;
            if (strlen($sinopsis) < $max_char_sinop) {
                $sinopsis = (ctype_space($sinopsis)) ? "tidak ada sinopsis" : $sinopsis;
                $uploadOk = "success";
            } else {
                $message = "sinopsi yang di izinkan hanya 1000 karakter";
                return  $this->message("failed", $message);
                exit();
            }
            // write sinopsis to file

            $sinop = fopen($target_file_sinop, "w");
            if ($sinop == true) {
                fwrite($sinop, $sinopsis);
                fclose($sinop);
                $uploadOk = "success";
            } else {
                $message = "sinopsis gagal dimuat";
                return  $this->message("failed", $message);
                exit();
            }
            $result = false;
            if ($uploadOk == "success") {
                if ($this->move("book", $target_file_book) && $this->move("cover", $target_file_cover)) {
                    $result = "success";
                } else {
                    return $this->message("failed", "Terjadi kesalahan, Ulangi lagi");
                    exit();
                }
            } else {
                return "Mohon Muat ulang";
            }
            if ($result) {
                $query = "INSERT INTO books VALUES
                ('', :title, :author, :sinopsis, :book, :cover)";

                $this->db->query($query);
                $this->db->bind("title", ucwords($title));
                $this->db->bind("author", ucwords($author));
                $this->db->bind("sinopsis", basename($target_file_sinop));
                $this->db->bind("book", $_FILES["book"]["name"]);
                $this->db->bind("cover", $_FILES["cover"]["name"]);

                $this->db->execute();
                $success =  $this->message("success", "Berhasil diunggah");
                $failed =  $this->message("success", "Gagal diunggah");
                return ($this->db->rowCount() > 0) ? $success : $failed;
                exit();
            }
            return "Mohon Muat ulang";
            exit();
        }
        return $this->message("", "");
        exit();
    }
}
