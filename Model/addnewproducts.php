<?php
class addnewproductsModel extends Model{
    public function __construct(){
        parent::__construct();
        $this->table="products";
        $this->columns= ["price","name","image","description","time","cate_id"];


    }
    public function add($price,$name,$image,$description,$time,$cate_id){
        $data=[$price,$name,$image,$description,$time,$cate_id];
        $result=$this->create($data);
        if($result){
            return true;
        }else{
            return false;
        }
    }
}
?>