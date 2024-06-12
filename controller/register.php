<?php
class registerController extends Controller{
    public $arr=0;
    public function index(){
        $conn = $this->getConn();
        if ($this->isPost()) {
            $username = $conn->real_escape_string($this->input()['post']['username']);
            $password =  $conn->real_escape_string($this->input()['post']['password']);
            $email = $conn->real_escape_string($this->input()['post']['email']);
            $confirm_password = $conn->real_escape_string($this->input()['post']['confirm_password']);
            $fullname =  $conn->real_escape_string($this->input()['post']['fullname']);
            $birthday=  $conn->real_escape_string($this->input()['post']['birthday']);
            if ($password != $confirm_password) {
                $this->view("register/index");
                return;
            }
            $sql="SELECT * FROM customer WHERE username=?";
            $stmt=$conn->prepare($sql);
            $stmt->bind_param('s',$username);
            $stmt->execute();
            $res=$stmt->get_result();
            if($res->num_rows>0){
                $this->arr=1;
                $this->view("register/index");
                return;
            }else{
                $password = sha1($password);
                $sql = "INSERT INTO customer (username,fullname, password,email,birthday) VALUES (?,?,?,?,?)";
                $stmt= $conn->prepare($sql);
                $stmt->bind_param('sssss',$username,$fullname,$password,$email,$birthday);
                if ($stmt->execute()) {
                    redirect("login");
                    return;
                } else {
                    $this->view("register/index");
                    return;
                }
            }
            return;
        }       
        $this->view('register/index');
    }
}
