<?php
class resetModel extends Model{
    public function __construct(){
        parent :: __construct();
        $this->table = "customer";
        $this->columns = ["username", "fullname", "password", "email", "birthday"];

    }
    public function reset($username){
        $username=$this->conn->real_escape_string($username);
        $this->primaryKey="username";
        if($this->find($username)){
            return true;
        }else{
            return false;
        }
    }
}
?>