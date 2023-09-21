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
        if (isset($_POST["update"])) {
            $cover = ($_FILES["change_cover"]["name"]);
            $title = htmlspecialchars($data["change_title"]);
            $author = htmlspecialchars($data["change_author"]);
            $sinopsis = htmlspecialchars($data["change_sinop"]);

            if (!$this->checkImg($cover)) {
                $message = "Sampul hanya dapat berformat PNG, JPEG, JPG, atau GIF";
                return $this->message("failed", $message);
            }

            $max_size_img = 2000000;
            if (filesize($_FILES["change"]["tmp_name"]) > $max_size_img) {
                $message = "Max 2MB";
                return $this->message("failed", $message);
                exit;
            }

            // move to directory
            $target_dir = "../app/assets/cover/" . $cover;

            $result = (move_uploaded_file($_FILES["change_cover"]["tmp_name"], $target_dir));

            if (!$result) {
                $message = "cover tidak bisa diunggah, Coba Lagi!";
                return $this->message("failed", $message);
                exit;
            }

            // get the name of file img in the database to delete from directory
            $this->db->query("SELECT cover FROM $this->table_name WHERE id=:id ");
            $this->db->bind("id", $id);
            $old_cover = $this->db->single()["cover"];
            if ($this->db->rowCount() < 1) {
                $message = "Kesalahan System, Mohon Coba lagi!";
                return $this->message("failed", $message);
                exit;
            }
            unlink("../public/assets/cover/" . $old_cover);


            // get the name of file sinops in the database to delete from directory





            // update database
            $this->db->query("UPDATE $this->table_name SET cover=:cover, author=:author, title=:title, sinopsis=:sinopsis");
        }
        return $this->message("", "");
        exit;
    }
}
