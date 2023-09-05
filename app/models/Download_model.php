<?php

class Download_model
{
    private $file_path = "../app/assets/books/";
    private $table_name = "books";
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function download($id)
    {

        $this->db->query("SELECT book FROM " . $this->table_name . " WHERE id=:id");
        $this->db->bind("id", $id);
        $data = $this->db->single()["book"];

        if (file_exists($this->file_path . $data)) {
            header("Content-Type: application/pdf");
            header('Content-Disposition: attachment;' . "filename =" . $data);
            readfile($this->file_path . $data);
        } else {

            header("HTTP/1.0 404 Not Found");
            echo "file tidak ditemukan";
        }
    }
}
