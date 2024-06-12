<?php
class admin_productsModel extends Model{
    public function __construct(){
        parent::__construct();
        $this->table="products";
        $this->columns=["price","name","image","description","cate_id"];
    }
    public function buy($products){
        $this->primaryKey="id";
        $result=$this->find($products);
        return $result;
    }
}
?>