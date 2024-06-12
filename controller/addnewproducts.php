<?php
class addnewproductsController extends Controller{
    private $addnewproducts,$res=0;
    public function __construct(){
        parent ::__construct();
        $this->addnewproducts = $this->loadModel('addnewproducts');
        if(!Session::get('admin')){
            redirect('admin_dashboard');
        }
    }
    public function getres(){
        return $this->res;
    }
    public function index(){
        if($this->isPost()){
            $name=$this->input()['post']['name'];
            $price=$this->input()['post']['price'];
            $file=$this->input()['file']['image'];
            $file_name= $file['name'];
            $file_tmp= $file['tmp_name'];
            $file_error= $file['error'];
            if($file_error>0){
                echo "jsajks";
            }else{
                move_uploaded_file($file_tmp,'uploads/'. $file_name);
            }
            $image=$file_name;
            $description=$this->input()['post']['description'];
            $time=$this->input()['post']['time'];
            if(isset($this->input()['get'])){
                $cate_id=$this->input()['get']['cate_id'];
            }
            if(is_string($price)){
                $price= intval($price);
            }
            if(is_string($cate_id)){
                $cate_id = intval($cate_id);
            }
            $products=$this->addnewproducts->add($price,$name,$image,$description,$time,$cate_id);
            if($products){
                $this->res=1;
                $this->view('admin_products/add');
            }else{
                $this->view('admin_products/add');
            }
            return;
        }
        $this->view('admin_products/add');
    }
}
?>