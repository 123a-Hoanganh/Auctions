<?php
class productsController extends Controller{
    private $productsModel=null;
    private $result;
    public function __construct(){
        parent::__construct();
        $this->productsModel=$this->loadModel("products");
        if(Session::check('customer')==null && Session::check('admin')==null){
            redirect('login');
        }

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