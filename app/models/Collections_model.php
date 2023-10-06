<?php

class Collections_model
{

    private $table_book = "books";
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }


    // Get single item
    public function GetSingleItem($id)
    {
        $query = "SELECT * FROM " . $this->table_book . " WHERE id=:id";
        $this->db->query($query);
        $this->db->bind("id", $id);
        $sinop_file_name = $this->db->single()["sinopsis"];
        $dir = "../app/assets/desc/";
        $file = fopen($dir . $sinop_file_name, "r") or die("Unable to open file!!");
        $sinopsis = fread($file, filesize($dir . $sinop_file_name));
        return array(
            "id" => $this->db->single()["id"],
            "title" => $this->db->single()["title"],
            "author" => $this->db->single()["author"],
            "cover" => $this->db->single()["cover"],
            "sinopsis" => $sinopsis,
            "id_user" => $this->db->single()["codeName"]
        );
    }


    // Get All Data
    public function GetAllItem()
    {
        $this->db->query("SELECT * FROM " . $this->table_book);
        return $this->db->resultSet();
    }


    public function SearchItem($data)
    {
        $this->db->query("SELECT * FROM " . $this->table_book . " WHERE book LIKE '%" . $data . "%'");
        return $this->db->resultSet();
    }
    // --------------------------------------------------------------- ///


}
