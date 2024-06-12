<?php
class cartController extends Controller{
    private $cartModel,$result;
    public function getResult(){
        return $this->result;
    }
    public function __construct(){
        parent::__construct();
        if(Session::check('customer')==null && Session::check('admin')==null){
            redirect('login');
        }
        $this->cartModel=$this->loadModel('cart');
    }
    public function index(){
        $username=Session::check('customer') ? Session::get('customer')['username'] : Session::get('admin')['username'];
        $this->result=$this->cartModel->select($username);

        if(isset($this->input()['get']['products'])){
            $products=$this->input()['get']['products'];
            $result=$this->cartModel->buy($products);
            if(Session::check('cart')==false){
                $res= $this->cartModel->cart($result['price'],$result['image'],$username,$result['name'],$products);
                Session::set('cart',0);
            }
            Session::remove('cart');
            redirect('cart');
            return;
        }

        if(isset($this->input()['get']['cart'])){
            $cart= $this->input()['get']['cart'];
            $result=$this->cartModel->delete_cart($cart);
            redirect('cart');
            return;
        }
        $this->view('cart/cart');
    }
}
?>