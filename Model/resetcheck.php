<?php
class resetcheckModel extends Model{
    public function __construct(){
        parent :: __construct();
        $this->table = "customer";
        $this->columns = ["username", "fullname", "password", "email", "birthday"];
    }
    public function reset($email){
        $email=$this->conn->real_escape_string($email);
        $this->primaryKey="email";
        $res=$this->find($email);
        if($res){
            $to = $email;
            $subject="Your new pasword";
            $body = newpassword();
            $headers = 'From: <hoanganhvu02012005@gmail.com>' . "\r\n";

            $result = mail($to,$subject,$body,$headers);
            if($result){
                $html_success = '<div class="alert alert-success">
                                    <strong>Success!</strong> Email has been sent.
                                </div>';
            }else{
                var_dump($result);
            }
        }else{
            echo "Email does not exist";
        }
    }
}
?>