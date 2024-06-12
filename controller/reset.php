<?php
class resetController extends Controller{
    private $retype=null;
    public function __construct(){
        parent::__construct();
        $this->retype=$this->loadModel('reset');
    }
    public function index(){
        $conn=$this->getConn();
        if($this->isPost()){
            $username=$this->input()['post']['username'];
            $res=$this->retype->reset($username);
            if($res){
                Session::set('reset',$res);
                redirect('resetcheck');
            }else{
                echo "Username không tồn tại";
            }
        }
        $this->view('reset-check/reset/index');
    }
}
?>