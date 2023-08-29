
<?php

class upload
{

    public function checkType($target_file)
    {
        $typefile = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        return $typefile;
    }

    public function checkImg($target_file)
    {
        $typeImg = array("jpeg", "jpg", "png", "gif");
        return (in_array($this->checkType($target_file), $typeImg)) ? true : false;
    }

    public function move($key, $target_file)
    {
        if (move_uploaded_file($_FILES[$key]["tmp_name"], $target_file)) {
            return true;
        }
        return false;
    }


    public function Add()
    {
        if (isset($_POST["submit"])) {
            $target_dir = "../app/assets/";
            $target_file_book = $target_dir . "books/" . basename($_FILES["book"]["name"]);
            $target_file_cover = "C:/xampp/htdocs/Pucuk-Pena/public/assets/cover/" . basename($_FILES["cover"]["name"]);

            // check pdf
            if ($this->checkType($target_file_book) === "pdf" && $this->checkImg($target_file_cover)) {
                if ($this->move("book", $target_file_book) && $this->move("cover", $target_file_cover)) {
                    return "berhasil diupload";
                }
                return $target_file_cover;
            }
        }
    }
}
