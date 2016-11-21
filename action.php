<?php
include "Class/Database.php";
include "Class/User.php";
include "Class/Messages.php";
$database = new Database();
$db = $database->getConnection();
$user = new User($db);
$msg = new Messages($db);
$action = $_GET['act'];
switch ($action){
    case "login":
        $user->username = $_POST['username'];
        $password = $_POST['password'];
        $stmt = $user->login();
        $stmt->bind_result($username,$pass,$email,$nama);
        $stmt->store_result();
        $stmt->fetch();
        if (password_verify($password,$pass)){
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['email']=$email;
            $_SESSION['nama']=$nama;
            header("location: friend-list.php");
        }else{
            header("location: index.php");
        }
        break;
    case  "register":
        $user->username = $_POST['username'];
        $user->password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $user->email = $_POST['email'];
        $user->nama = $_POST['nama'];
        $user->register();
        header("location: index.php");
        break;
    case  "send-messages":
        $msg->sender = $_GET['sender'];
        $msg->recipient = $_GET['recipient'];
        $msg->messages = $_POST['messages'];
        $msg->sendMessage();
        header("location: new-message.php?recipient=".$_GET['recipient']."");
        break;
    case "logout":
        session_start();
        session_destroy();
        header("location: index.php");
        break;

}