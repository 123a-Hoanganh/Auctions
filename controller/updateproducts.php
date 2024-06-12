<?php
class updateproductsController extends Controller{
    private $res,$updateproductsModel;
    private $result;
    public function __construct(){
        parent::__construct();
        if(!Session::get('admin')){
            redirect('dashboard');
        }
        $this->updateproductsModel= $this->loadModel('updateproducts');
    }
    public function getResult(){
        return $this->result;
    }
    public function getRes(){
        return $this->res;
    }
    public function index(){
        if(isset($this->input()['get']['cate_id'])){
            $cate_id=$this->input()['get']['cate_id'];
            $this->result=$this->updateproductsModel->shop($cate_id);
            $this->view('admin_products/products');
            return;
        }
        if(isset($this->input()['get']['products'])){
            $id= $this->input()['get']['products'];
            $id= intval($id);
            $this->res=$this->updateproductsModel->getproducts($id);
            if($this->res){
                if($this->isPost()){
                    $name=$this->input()['post']['name'];
                    $price=intval($this->input()['post']['price']);
                    $description=$this->input()['post']['description'];
                    $time=$this->input()['post']['time'];
                    dd($time);
                    $time = new DateTime($time);
                    $time = $time->format('Y-m-d H:i:s');
                    $cate_id=intval($this->input()['post']['cate_id']);
                    $file=$this->input()['file']['image'];
                    $file_name= $file['name'];
                    $file_tmp= $file['tmp_name'];
                    $file_error= $file['error'];
                    if($file_error==0){
                        move_uploaded_file($file_tmp,'uploads/'. $file_name);
                    }
                    $image=$file_name;
                    $Ketqua=$this->updateproductsModel->updateproducts($id,$price,$name,$image,$description,$time,$cate_id);
                    if($Ketqua){
                        $this->res=$this->updateproductsModel->getproducts($id);
                        $this->view('update_form/update_form');
                        return;
                    }
                }
                $this->view('update_form/update_form');
                return;
            }
        }

    }

}
?>