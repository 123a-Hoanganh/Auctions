<?php
class createDatabase{
    private $conn;
    private $host="localhost";
    private $username="root";
    private $password="";
    public function __construct(){
        $this->conn= new mysqli($this->host,$this->username,$this->password);
        if($this->conn->connect_error){
            echo "Connection failed".$this->conn->connect_error;
            return 0;
        }
    }
    public function createDb(){
        $sql="CREATE DATABASE IF NOT EXISTS Auctions";
        $res=$this->conn->query($sql);
        if(!$res){
            echo "Create database failed".$this->conn->error;
            return 0;
        }
        $this->conn->select_db('Auctions');
    }

    public function createTableProducts(){
        $sql="CREATE TABLE IF NOT EXISTS products(
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            price INT NOT NULL,
            name VARCHAR (40) NOT NULL,
            image VARCHAR (100) NOT NULL,
            description TEXT,
            time DATETIME,
            cate_id INT UNSIGNED
        )";
        $res= $this->conn->query($sql);
        if(!$res){
            echo "Create table products failed".$this->conn->error;
        }
    }
    public function createTableCategory(){
        $sql="CREATE TABLE IF NOT EXISTS category(
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR (40) NOT NULL,
            description TEXT
        )";
        $res=$this->conn->query($sql);
        if(!$res){
            echo "Create table category failed".$this->conn->error;
        }
    }
    public function createTableCart(){
        $sql="CREATE TABLE IF NOT EXISTS cart(
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            price INT NOT NULL,
            image VARCHAR (100) NOT NULL,
            username VARCHAR(40) NOT NULL,
            name VARCHAR (40) NOT NULL,
            products_id INT UNSIGNED
        )";
        $res= $this->conn->query($sql);
        if(!$res){
            echo "Create table cart failed".$this->conn->error;
        }
    }
    public function createTableBid(){
        $sql="CREATE TABLE IF NOT EXISTS bid(
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            bid INT  NOT NULL,
            username VARCHAR (40) NOT NULL,
            time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            fullname VARCHAR (40) NOT NULL,
            products_id INT UNSIGNED
        )";
        $res=$this->conn->query($sql);
        if(!$res){
            echo "Create table bid failed".$this->conn->error;
        }
    }

    public function createTableUsersCustomer(){
        $sql="CREATE TABLE IF NOT EXISTS customer(
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR (40) NOT NULL,
            fullname VARCHAR(40) NOT NULL,
            password VARCHAR (40) NOT NULL,
            email VARCHAR (50) NOT NULL,
            birthday DATE
        )";
        $res=$this->conn->query($sql);
        if(!$res){
            echo "Create table customer failed".$this->conn->error;
        }
    }
    public function foreignKey(){
        $sql = "ALTER TABLE products
        ADD FOREIGN KEY (cate_id) REFERENCES category(id)";
        $res=$this->conn->query($sql);
        if(!$res){
            echo "Alter table products failed".$this->conn->error;
        }
        $sql="ALTER TABLE bid 
        ADD FOREIGN KEY (products_id) REFERENCES products(id)";
        $res=$this->conn->query($sql);
        if(!$res){
            echo "Alter table bid failed".$this->conn->error;
        }
        $sql="ALTER TABLE cart
        ADD FOREIGN KEY (products_id) REFERENCES products(id)";
        $res=$this->conn->query($sql);
        if(!$res){
            echo "Alter table bid failed".$this->conn->error;
        }

    }
}
$database=new createDatabase();
$database->createDb();
$database->createTableProducts();
$database->createTableCategory();
$database->createTableBid();
$database->createTableCart();
$database->createTableUsersCustomer();
$database->foreignKey();
?>
