<?php
class logoutController extends Controller{
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        $result=Session::check('admin');
        if($result != null){
            Session::destroy();
            redirect('login'); 
        }
        $result=Session::check('customer');
        if($result != null){
            Session::destroy();
            redirect('login'); 
        }
        redirect('dashboard');
    }
}
?>