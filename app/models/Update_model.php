<?php

class Update_model
{
    private $table_name = "books";
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function message($status, $message)
    {
        return array(
            "class" => $status,
            "message" => $message
        );
    }

    public function checkImg($target_file)
    {
        $typeImg = array("jpeg", "jpg", "png", "gif");
        $typefile = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        return (in_array($typefile, $typeImg)) ? true : false;
    }


    // upload to directory
    public function Update($id, $data)
    {

        if (isset($data["update"])) {
            $cover = $_FILES["change_cover"]["name"];
            $title = htmlspecialchars($data["change_title"]);
            $author = htmlspecialchars($data["change_author"]);
            $sinopsis = htmlspecialchars($data["change_sinop"]);

            $exist = isset($cover) && isset($title) && isset($author) && isset($sinopsis);
            if (!$exist) {
                return $this->message("failed", "Lengkapi data");
                exit;
            }

            // CHANGE COVER
            if (!$this->checkImg($cover)) {
                $message = "Sampul hanya dapat berformat PNG, JPEG, JPG, atau GIF";
                return $this->message("failed", $message);
            }

            $max_size_img = 2000000;
            if (filesize($_FILES["change_cover"]["tmp_name"]) > $max_size_img) {
                $message = "Max 2MB";
                return $this->message("failed", $message);
                exit;
            }


            $this->db->query("UPDATE " . $this->table_name . " SET cover=:cover" . " WHERE id=:id");
            $this->db->bind("id", $id);
            $this->db->bind("cover", $cover);
            $this->db->execute();
            if ($this->db->rowCount() < 1) {
                $message = "Kesalahan System, Mohon Coba lagi! 1";
                return $this->message("failed", $message);
                exit;
            }

            // move to directory
            $target_dir = "../public/assets/cover/" . $cover;
            $result = (move_uploaded_file($_FILES["change_cover"]["tmp_name"], $target_dir));
            if (!$result) {
                $message = "cover tidak bisa diunggah, Coba Lagi!";
                return $this->message("failed", $message);
                exit;
            }
            // get the name of file img in the database to delete from directory
            $this->db->query("SELECT cover FROM $this->table_name WHERE id=:id");
            $this->db->bind("id", $id);
            $old_cover = $this->db->single()["cover"];
            if ($this->db->rowCount() < 1) {
                $message = "Kesalahan System, Mohon Coba lagi!";
                return $this->message("failed", $message);
                exit;
            }
            unlink("../public/assets/cover/" . $old_cover);

            // CHANGE TITLE & 


            // update database
            $this->db->query("UPDATE $this->table_name SET author=:author, title=:title WHERE id=:id");
            $this->db->bind("author", $author);
            $this->db->bind("title", $title);
            $this->db->bind("id", $id);
            $this->db->execute();
            if ($this->db->rowCount() < 1) {
                $this->message("failed", "perubahan gagal dilakukan");
            }

            // get the name of file sinops in the database to delete from directory
            $this->db->query("SELECT sinopsis FROM " . $this->table_name . " WHERE id=:id");
            $this->db->bind("id", $id);
            $file_name_sinop = $this->db->single()["sinopsis"];
            $myfile = fopen("../app/assets/desc/" . $file_name_sinop, "w") or die("tidak bisa mengubah sinopsis");
            fwrite($myfile, $sinopsis);
            fclose($myfile);
            return $this->message("success", "berhasil diubah");
        }
        return $this->message("", "");
        exit;
    }
}
