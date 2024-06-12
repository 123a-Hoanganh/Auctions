<?php
class admin_productsController extends Controller{
    private $productsModel=null;
    private $result;
    public function __construct(){
        parent::__construct();
        if(!Session::get('admin')){
            redirect('dashboard');
        }
        $this->productsModel=$this->loadModel("admin_products");
    }
    public function getResult(){
        return $this->result;
    }
    public function index(){
        $products=$this->input()['get']['products'];
        if(isset($_GET['products'])){
            $this->result=$this->productsModel->buy($products);
            $this->view('products/index');
            return;
        }
    }
}
?>