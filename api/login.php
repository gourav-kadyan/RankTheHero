<?php
    include("connect.php");

    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $chk = mysqli_query($connect, "SELECT * FROM user WHERE mobile='$mobile' AND password='$password' AND role='$role'");
    if(mysqli_num_rows($chk) > 0){
        $userdata = mysqli_fetch_array($chk);
        $groups = mysqli_query($connect, "SELECT * FROM user WHERE role=2");
        $groupsdata = mysqli_fetch_all($groups, MYSQLI_ASSOC);

        $_SESSION['userdata'] = $userdata;
        $_SESSION['groupsdata'] = $groupsdata;

        echo '<script>
                window.location = "../pages/dashboard.php"
        </script>'
    }
    else{
        echo '
            <script>
                alert("Invalid Credentials");
                window.location = "../";
            </script>
        ';
    }
?>