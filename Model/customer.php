<?php
class customerModel extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = "customer";
        $this->columns = ["username", "fullname", "password", "email" ,"birthday"];
    }

    public function auth($username, $password){
        $username = $this->conn->real_escape_string($username);
        $password = $this->conn->real_escape_string($password);
        $password = sha1($password);
        $sql = "SELECT * FROM $this->table WHERE username = ? AND password = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        }
        return false;
    }
} 
?>