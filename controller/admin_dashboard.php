<?php
class admin_dashboardController extends Controller{
    public function __construct(){
        parent::__construct();
        if(!Session::get('admin')){
            redirect('login');
        }
    }
    public function index(){
        $this->view('admin_dashboard/index');
    }
}
?>