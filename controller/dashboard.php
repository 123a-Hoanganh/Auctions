<?php
class dashboardController extends Controller{
    private $dashboardModel = null;
    private $result;
    public function __construct(){
        parent::__construct();
        $this->dashboardModel = $this->loadModel('dashboard');
    }

    public function getResult(){
        return $this->result;
    }
    public function index(){
        if(isset($this->input()['get']['cate_id'])){
            $cate_id=$this->input()['get']['cate_id']; 
            $this->result=$this->dashboardModel->shop($cate_id);
            $this->view('dashboard/shop-cate_id');
            return;
        }
        $this->view('dashboard/menu');
    }
}