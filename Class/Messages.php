<?php
class Messages{

    private $conn;

    public $sender;
    public $recipient;
    public $messages;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    function sendMessage(){
        $query = "INSERT INTO `messages` VALUES ('',?,?,?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sss",$this->recipient,$this->sender,$this->messages);
        if ($stmt->execute()){
            return true;
        }else{
            return false;
        }

    }

    function getMessagesBySender(){
        $query = "SELECT * FROM `messages` WHERE `userid_recipient` =? AND `userid_sender`=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ss",$this->recipient,$this->sender);
        $stmt->execute();
        return $stmt;
    }

    function getMessagesGroupBySender(){
        $query = "SELECT * FROM `messages` WHERE `userid_recipient`=? GROUP BY `userid_sender`";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s",$this->recipient);
        $stmt->execute();
        return $stmt;
    }
    function getDetailMessagesBySender(){
        $query = "SELECT * FROM `messages` WHERE `userid_recipient` =? AND `userid_sender`=? ";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ss",$this->recipient,$this->sender);
        $stmt->execute();
        return $stmt;
    }

}