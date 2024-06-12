<?php
class updateproductsModel extends Model{
    public function __construct(){
        parent::__construct();
        $this->table="products";
        $this->columns=["price","name","image","description","time","cate_id"];
    }

    public function shop($cate_id){
        $this->primaryKey="cate_id";
        $result=$this->all($cate_id);
        return $result;
    }
    public function getproducts($id){
        $this->primaryKey="id";
        $result=$this->find($id);
        return $result;
    }
    public function updateproducts($id,$price,$name,$image,$description,$time,$cate_id){
        $this->primaryKey="id";
        $data=[$price,$name,$image,$description,$time,$cate_id];
        $result=$this->update($id,$data);
        return $result;
    }
}
?>