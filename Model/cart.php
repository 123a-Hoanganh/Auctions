<?php
class cartModel extends Model{
    public function __construct(){
        parent::__construct();
    }
    public function select($username){
        $this->primaryKey="username";
        $this->table="cart";
        $result=$this->all($username);
        return $result;
    }
    public function cart($price,$image,$username,$name,$products){
        $this->table="cart";
        $this->columns=["price","image","username","name","products_id"];
        $data=[$price,$image,$username,$name,$products];
        return $this->create($data);
    }
    public function buy($products){
        $this->primaryKey="id";
        $this->table="products";
        $result=$this->find($products);
        return $result;
    }
    public function delete_cart($id){
        $this->primaryKey="products_id";
        $this->table="cart";
        dd($id);
        return $this->delete($id);
    }
}
?>