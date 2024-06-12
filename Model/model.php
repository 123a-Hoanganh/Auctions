<?php
class Model{
    protected $conn = null;
    protected $table = null;
    protected $columns = [];
    protected $primaryKey = "id";
    protected $variable= null;

    public function __construct(){
        $this->conn = (new Connection)->getConn();
    }
    public function create($data){
        $columns = implode(", ", $this->columns);
        $values=[];
        for($i=0;$i<count($data);$i++){
            if(is_int($data[$i])){
                $values[$i]=$data[$i];
            }else if(is_string($data[$i])){
                $values[$i]="'".$data[$i]."'";
            }
        }
        $values=implode(",",$values);
        $sql = "INSERT INTO $this->table ($columns) VALUES ($values)";
        if ($result=$this->conn->query($sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function where($var){
        $types="";
        if(is_int($var)){
            $types="i";
        }else if(is_string($var)){
            $types="s";
        }

        $sql = "SELECT * FROM $this->table WHERE $this->variable=?";
        $stmt=$this->conn->prepare($sql);
        $stmt->bind_param($types,$var);
        $stmt->execute();
        $result=$stmt->get_result();
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        }
        return false;
    }

    public function conditional($id,$base){
        $sql="SELECT * FROM $this->table WHERE ? > $base";
        $stmt=$this->conn->prepare($sql);
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $result=$stmt->get_result();
    }

    public function all($id){
        $sql = "SELECT * FROM $this->table WHERE $this->primaryKey=?";
        $types="";
        if(is_int($id)){
            $types="i";
        }else if(is_string($id)){
            $types="s";
        }
        $stmt=$this->conn->prepare($sql);
        $stmt->bind_param($types,$id);
        $stmt->execute();
        $result=$stmt->get_result();
        $data = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
        return $data;
    }

    public function find($id){
        $types="";
        if(is_int($id)){
            $types="i";
        }else if(is_string($id)){
            $types="s";
        }
        $sql = "SELECT * FROM $this->table WHERE $this->primaryKey = ?";
        $stmt=$this->conn->prepare($sql);
        $stmt->bind_param($types,$id);
        $stmt->execute();
        $result=$stmt->get_result();
        $data = [];
        if ($result->num_rows>0) {
            return $result->fetch_assoc();
        }else{
            return ;
        }
    }

    public function update($id, $data){
        $set = [];
        $columns=$this->columns;
        for($i=0;$i<count($data);$i++){
            if(is_int($data[$i])){
                $set[$i]="$columns[$i]= $data[$i]";

            }else if(is_string($data[$i])){
                $set[$i] ="$columns[$i]='$data[$i]'";
            }

        }
        $set = implode(", ",$set);  
        $sql = "UPDATE $this->table SET $set WHERE $this->primaryKey = $id";
        if ($this->conn->query($sql) == TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($id){
        $sql = "DELETE FROM $this->table WHERE $this->primaryKey = $id";
        if ($this->conn->query($sql) == TRUE) {
            return true;
        } else {
            return false;
        }
        
    }

    public function getalldesc($id){
        $sql = "SELECT * FROM $this->table WHERE products_id = $id ORDER BY bid DESC";
        $data=[];
        if($result=$this->conn->query($sql)){
            while($row=$result->fetch_assoc()){
                $data[]=$row;
            }
            return $data;
        }
        return false;
    }
    public function getConnection(){
        return $this->conn;
    }
}
?>