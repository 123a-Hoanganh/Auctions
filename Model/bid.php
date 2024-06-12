<?php
class bidModel extends Model{
    public function __construct(){
        parent::__construct();
    }
    public function infoProduct($product_id){
        $this->table="products";
        $this->columns=["price","name","image","description","cate_id"];
        $this->primaryKey="id";
        $result=$this->find($product_id);
        return $result;
    }
    
    public function bidding($bid,$username,$fullname,$id){
        $this->table = "bid";
        $this->columns = ["bid","username","fullname","products_id"];
        $data=[$bid,$username,$fullname,$id];
        return $this->create($data);
    }
    public function getall($id){
        $this->table="bid";
        return $this->getalldesc($id);
    }
    public function cart($products_id,$image,$price,$username,$name){
        $this->table="cart";
        $this->columns=["price","image","username","name","products_id"];
        $data=[$price,$image,$username,$name,$products_id];
        $result = $this->create($data);
        return $result;
    }
}
?>