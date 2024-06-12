<?php
class productsModel extends Model{
    public function __construct(){
        parent::__construct();
        $this->table="products";
    }
    public function buy($products){
        $this->primaryKey="id";
        $result=$this->find($products);
        return $result;
    }
}
?>