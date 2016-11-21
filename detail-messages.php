<?php
session_start();
include "Class/Database.php";
include "Class/User.php";
include "Class/Messages.php";

$database = new Database();
$db = $database->getConnection();
$user = new User($db);
$msg = new Messages($db);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detail Messages from <? echo $_GET['sender'] ?>  </title>
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
                    <li><a href="inbox.php"><i class="fa fa-envelope"></i> </a>
                    </li>
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
                    $msg->sender = $_GET['sender'];
                    $msg->recipient = $_SESSION['username'];
                    //echo $msg->sender;
                    $stmt = $msg->getMessagesBySender();
                    $stmt->bind_result($id, $recipient, $sender, $messages);
                    while ($stmt->fetch()) {
                        ?>
                        <div class="col-md-12 bg-cloud margin-bottom">
                            <h6><a href="#" class="text-info"><? echo $_GET['sender'] ?></a> > <a href="#" class="text-info"><? echo $_SESSION['username'] ?></a></h6>
                            <p><? echo $messages ?></p>
                        </div>
                        <?
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-3 padding-20">
            <h2>Trends <a href="#"><i class="fa fa-globe"></i></a></h2>
            <ul>
                <li>PPAP</li>
                <li>US Election</li>
                <li>Octoberfest</li>
                <li>Hello October</li>
            </ul>
        </div>


    </div>
</div>


<script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/flat-ui.min.js" type="text/javascript"></script>
</body>
</html>