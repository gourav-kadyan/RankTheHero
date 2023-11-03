<?php
    session_start();
    if(!isset($_SESSION['userdata'])){
        header("location : ../");
    }
    $userdata = $_SESSION['userdata']; 
    $groupdata = $_SESSION['groupsdata'];

    if($_SESSION['userdata']['status'] == 0){
        $status = '<b style="color:red" >Not Voted</b>';
    }
    else{
        $status = '<b style="color:green" >Voted</b>';
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Online Voting System - Dashboard</title>
</head>
<body>

    <style>
        #backbtn{
            float:left;
            margin:10px;
        }

        #logoutbtn{
            float:right;
            margin:10px;
        }

        #Profile{
            background-color:white;
            width:30%;
            padding:20px;
            float:left;
        }

        #group{
            background-color:white;
            width:60%;
            padding : 20px;
            float:right;
        }

        #main{
            padding:10px;
        }

        .mainpanel{
            padding:10px;
        }

        #voted{
            background-color:green;
        }

    </style>



   <div class="main">
        <div class="headerSection" id="header">
            <a href="../"><button class="button" id="backbtn">Back</button></a>
            <a href="logout.php"><button class="button" id="logoutbtn">LogOut</button> </a>
            <center><h1>Online Voting System</h1></center>
        </div>
        <br><br>
        <hr>
        <br><br>
        <div class="mainpanel">
        <div id="Profile">
            <img src="../assets/<?php echo $userdata['photo'] ?>" alt="Profile Name" height="200" width="200"><br>
            <strong>Name:</strong><?php echo $userdata['name'] ?><br><br>
            <strong>Mobile:</strong><?php echo $userdata['mobile'] ?><br><br>
            <strong>Address:</strong><?php echo $userdata['address'] ?><br><br>
            <strong>Status:</strong><?php echo $status ?><br><br>
        </div>
        <div id="group">
            <?php
                if($_SESSION['groupsdata']){
                    for($i=0;$i<count($groupdata);$i++){
                        ?>
                            <div>
                                <img style="float:right" src="../assets/<?php echo $groupdata[$i]['photo'] ?>" alt="Group Image" height="100" width="100">
                                <b>Group Name:</b><?php echo $groupdata[$i]['name'] ?><br><br>
                                <b>Votes:</b><?php echo $groupdata[$i]['votes'] ?><br><br>
                                <form action="../api/vote.php" method="POST">
                                    <input type="hidden" name="gvotes" value="<?php echo $groupdata[$i]['votes'] ?>">
                                    <input type="hidden" name="gid" value="<?php echo $groupdata[$i]['id'] ?>">
                                    <?php 
                                        if($_SESSION['userdata']['status'] == 0){
                                            ?>
                                             <button class="button" type="submit" name="votebtn" value="Vote" id="votebtn">VOTE</button>
                                            <?php
                                        }
                                        else{
                                            ?>
                                             <button disabled class="button" type="submit" name="votebtn" value="Vote" id="voted">VOTED</button>
                                            <?php
                                        }
                                    ?>
                                </form><br>
                            </div>
                        <?php
                    }
                }
                else{

                }
            ?>
        </div>
        </div>
   </div>
</body>
</html>