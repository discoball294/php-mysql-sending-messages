<?php
session_start();
include "Class/Database.php";
include "Class/User.php";

$database = new Database();
$db = $database->getConnection();
$user = new User($db);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Friend List</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/flat-ui.min.css" rel="stylesheet" type="text/css">
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/custom.css" rel="stylesheet" type="text/css">
</head>
<body>

<div class="container">
    <header class="margin-bottom">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-01">
                    <span class="sr-only">Toggle navigation</span>
                </button>
                <a class="navbar-brand" href="#">php<b style="color: #1abc9c; font-weight: 700;">Messaging</b></a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse-01">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="friend-list.php"><i class="fa fa-group"></i> Friend List</a></li>
                    <li ><a href="inbox.php"><i class="fa fa-envelope"></i> </a></li>
                    <li ><a href="action.php?act=logout"><i class="fa fa-sign-out"></i> </a></li>
                </ul>
                <form class="navbar-form navbar-right" action="#" role="search">
                    <div class="form-group">
                        <div class="input-group">
                            <input class="form-control" id="navbarInput-01" type="search" placeholder="Search">
                            <span class="input-group-btn">
            <button type="submit" class="btn"><span class="fui-search"></span></button>
          </span>
                        </div>
                    </div>
                </form>
            </div><!-- /.navbar-collapse -->
        </nav><!-- /navbar -->
    </header>
    <div class="row">
        <div class="col-md-3 padding-20">
            <h3><? echo $_SESSION['nama']; ?></h3>
            <p>
                <? echo $_SESSION['email'] ?>
            </p>
            <span><i class="fa fa-map-marker"></i> <a href="#">New York</a>  </span>
        </div>
        <div class="col-md-6 padding-20">
            <div class="row">
                <div class="col-md-12 padding-10">
                    <?
                    $user->username = $_SESSION['username'];
                    $stmt = $user->getAllUser();

                    $stmt->bind_result($username,$password,$email,$nama);
                    while ($stmt->fetch()){
                    ?>
                    <div class="col-md-12 bg-cloud margin-bottom">
                        <h6><a href="#" class="text-info"><? echo $nama ?></a></h6>
                        <p><? echo $email ?></p>
                        <a href="new-message.php?recipient=<? echo $username ?>" class="btn btn-primary pull-right"><i class="fa fa-envelope"></i>  Send Message</a>
                    </div>
                    <?
                    }
                    ?>
                </div>
            </div>
        </div>



    </div>
</div>


<script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/flat-ui.min.js" type="text/javascript"></script>
</body>
</html>