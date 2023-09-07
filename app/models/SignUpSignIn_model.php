<?php

class SignUpSignIn_model
{
    private $db;
    private $table = "users";
    public function __construct()
    {
        $this->db = new Database;
    }


    public function message($status, $message)
    {
        return array(
            "status" => $status,
            "message" => $message
        );
    }


    public function AddUser($data)
    {

        if (isset($data["sign-in"])) {

            $nickName = htmlspecialchars($data["nickname"]);
            $email = htmlspecialchars($data["email"]);
            $password = htmlentities($data["password"]);
            $confirm_pass = htmlspecialchars($data["confirm-pass"]);

            // check if data is exist 
            $isset = empty($nickName) && empty($email) && empty($password) && empty($confirm_pass);
            if ($isset) {
                return $this->message("failed", "Mohon lengkapi data!");
                exit;
            }
            // check nickname if it meets requiretments
            $mustNumber = preg_match('/[0-9]+/', $nickName);
            $mustPattern = preg_match('/[^_$#@!&^-]+/', $nickName);
            if (!($mustNumber || $mustPattern)) {
                return $this->message("failed", "Nama perlu karakter khusus atau angka");
                exit;
            }

            // check email
            if (!preg_match("/^[a-zA-Z0-9.-_%+]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,}$/", $email)) {
                return $this->message("failed", "Bukan format email yang benar");
                exit;
            }

            // check email if exist or no
            $this->db->query("SELECT email FROM $this->table");
            $All_email = $this->db->resultSet();
            if (in_array($email, $All_email)) {
                return $this->message("failed", "Email sudah terdaftar");
                exit;
            }
            // check password
            if (!strlen($password) >= 8) {
                return $this->message("failed", "Password minimal 8 karakter");
                exit;
            }
            if (!preg_match("/[0-9]|[-*_&%$#@]/", $password)) {
                return $this->message("failed", "Password perlu karakter khusus atau angka");
                exit;
            }
            if ($password !== $confirm_pass) {
                return $this->message("failed", "Kata sandi tidak cocok!");
                exit;
            }

            // enskripsi password
            $salt = random_bytes(16);
            $combine_pass = $password . $salt;
            $hashPassword = password_hash($combine_pass, PASSWORD_BCRYPT);

            $this->db->query('INSERT INTO ' . $this->table . ' VALUES ("", :name, :email, :password, :salt)');
            $this->db->bind('name', $nickName);
            $this->db->bind('email', $email);
            $this->db->bind('password', $hashPassword);
            $this->db->bind('salt', $salt);

            $this->db->execute();
            $success_condition = $this->message("success", "Akun berhasil dibuat");
            $failed_condition = $this->message("failed", "Ada kesalahan coba lagi");
            return ($this->db->rowCount() > 0) ? $success_condition : $failed_condition;
            exit;
        }
        return $this->message("", "");
        exit;
    }
}
