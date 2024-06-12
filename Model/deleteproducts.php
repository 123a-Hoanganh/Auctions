<?php
class deleteproductsModel extends Model{
    public function __construct(){
        parent::__construct();
    }
    public function deleteproducts($id){
        $this->table="bid";
        $this->primaryKey="products_id";
        $result=$this->delete($id);
        $this->table="products";
        $this->primaryKey="id";
        $res=$this->delete($id);
        return $result;
    }
}
?>