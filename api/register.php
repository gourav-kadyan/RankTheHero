<?php
    include("connect.php");
    //by default variable to get data
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $address = $_POST['address'];
    //for image we use $_files
    $image = $_FILES['photo']['name'];
    $tmp_name = $_FILES['photo']['tmp_name'];

    $role = $_POST['role'];

    if($password == $cpassword){
        move_uploaded_file($tmp_name, "../assets/$image");
        $insert = mysqli_query($connect, "INSERT INTO user (name, mobile, password, address, photo, role, status, votes) VALUES ('$name', '$mobile', '$password', '
        $address', '$image', '$role', 0, 0)");
        if($insert){
            echo '
            <script>
            alert("Registration Successful");
            window.location = "../";
            </script>
        ';
        }
        else{
            echo '
            <script>
            alert("Error Occurs while Registration Please fill again");
            window.location = "../pages/register.html";
            </script>
        ';
        }
    }
    else{
        //if pass and cpass doesnot match then we firstly do 
        //alert using js function and again go to register page thats it
        echo '
            <script>
            alert("Password and Confirm Password are not match");
            window.location = "../pages/register.html";
            </script>
        ';
    }
?>