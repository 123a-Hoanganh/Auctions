<?php
class deleteproductsController extends Controller{
    private $deleteproducts;
    public function __construct(){
        parent ::__construct();
        $this->deleteproducts = $this->loadModel('deleteproducts');
        if(!Session::get('admin')){
            redirect('dashboard');
        }
    }
    public function index(){
        if(isset($this->input()['get']['products'])){
            $id=$this->input()['get']['products'];
            $result=$this->deleteproducts->deleteproducts($id);
            if($result){
                redirect('admin_dashboard');
                return;
            }
        }
    }
}
?>