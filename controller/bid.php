<?php
class bidController extends Controller{
    private $bidModel,$res,$answer;
    public function __construct(){
        parent::__construct();
        if(Session::check('customer')==null && Session::check('admin')==null){
            redirect('login');
        }
        $this->bidModel=$this->loadModel('bid');
    }
    public function getres(){
        return $this->res;
    }
    public function getanswer(){
        return $this->answer;
    }
    public function index(){
        if(isset($this->input()['get']['products'])){
            $id= $this->input()['get']['products'];
            $id= intval($id);
            $this->res= $this->bidModel->infoProduct($id);
        }
        if(Session::check('admin')){
            $username= Session::get('admin')['username'];
            $fullname= Session::get('admin')['fullname'];
        }
        if(Session::check('customer')){
            $username= Session::get('customer')['username'];
            $fullname= Session::get('customer')['fullname'];
        }
        if($this->isPost()){
            $bid= intval($this->input()['post']['bid']);
            if(Session::get('bid') == NULL){
                if($bid>intval($this->res['price'])){
                    Session::set('bid',$bid);
                    $result= $this->bidModel->bidding($bid,$username,$fullname,$id);
                }
            }
        }        
        $current_time = time();
        $set_time = strtotime($this->res['time']);
        $time =$current_time - $set_time;
        if($time<0){
            Session::set('time',0);
        }
        if(Session::check('time')){
            if(Session::check('result')== false){
                $username=Session::check('customer') ? Session::get('customer')['username'] : Session::get('admin')['username'];
                $result = $this->bidModel->cart($this->res['id'], $this->res['image'],$this->res['price'],$username, $this->res['name']);
                Session::set('result',0);
            }

        }
        $this->answer= $this->bidModel->getall($id);
        $this->view('bid/index');

    }
} 
?>