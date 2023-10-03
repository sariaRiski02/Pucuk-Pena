<?php


class Delete_model
{

    private $db;
    private $table_name = "books";

    public function __construct()
    {
        $this->db = new Database();
    }


    public function DeleteBook($id)
    {

        $this->db->query("SELECT cover, book, sinopsis FROM $this->table_name WHERE id=:id");
        $this->db->bind("id", $id);
        $cover = $this->db->single()["cover"];
        $book = $this->db->single()["book"];
        $sinopsis = $this->db->single()["sinopsis"];

        unlink("../public/assets/cover/" . $cover);
        unlink("../app/assets/books/" . $book);
        unlink("../app/assets/desc/" . $sinopsis);


        $this->db->query("DELETE FROM $this->table_name WHERE id=:id");
        $this->db->bind("id", $id);
        $this->db->execute();
        return ($this->db->rowCount() < 1) ? false : true;
        exit;
    }
}
