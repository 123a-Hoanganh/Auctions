<?php
class dashboardModel extends Model{
    public function __construct(){
        parent::__construct();
        $this->table="products";
        $this->columns=["price","name","image","description","cate_id"];
    }

    public function shop($cate_id){
        $this->primaryKey="cate_id";
        $result=$this->all($cate_id);
        return $result;
    }
}
?>