<?php
class resetcheckController extends Controller{
    private $retype=null;
    public function __construct(){
        parent::__construct();
        if(!Session::get('reset')){
            redirect('reset');
        }
        $this->retype=$this->loadModel('resetcheck');
    }
    public function index(){
        $conn=$this->getConn();
        if($this->isPost()){
            $email=$this->input()['post']['email'];
            $this->retype->reset($email);
        }
        $this->view('reset-check/resetcheck/index');
    }
}
?>