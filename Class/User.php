<?php
class User{

    private $conn;

    public $username;
    public $password;
    public $email;
    public $nama;

    public function __construct($db)
    {
        $this->conn = $db;
    }
    function register(){
        $query = "INSERT INTO `user` VALUES (?,?,?,?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssss",$this->username,$this->password,$this->email,$this->nama);
        if($stmt->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    function login(){
        $query = "SELECT * FROM `user` WHERE `username` = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s",$this->username);
        $stmt->execute();
        return $stmt;
    }
    function getAllUser(){
        $query = "SELECT * FROM `user` WHERE `username` != ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s",$this->username);
        $stmt->execute();
        return $stmt;
    }
}