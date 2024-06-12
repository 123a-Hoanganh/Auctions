<?php
class loginController extends Controller
{
    private $res,$customerModel = null;
    public function __construct(){
        parent::__construct();
        $this->customerModel = $this->loadModel('customer');
    }

    public function getres(){
        return $this->res;
    }
    public function index()
    {   
        if($this->isPost()){
            $username = $this->input()['post']['username'];
            $password = $this->input()['post']['password'];
            $this->res = $this->customerModel->auth($username, $password);
            if($this->res){
                if($username=='VuHoangAnh'){
                    unset($this->res['password']);
                    Session::set('admin', $this->res);
                    redirect('admin_dashboard');
                }else{
                    unset($this->res['password']);
                    Session::set('customer', $this->res);
                    redirect('dashboard');
                }

            }
        }

        $this->view('login/index');
    }


}
