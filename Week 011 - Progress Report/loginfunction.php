<?php

session_start();

if(isset($_REQUEST['submit']))
{
    $a = $_REQUEST['username'];
    $b = $_REQUEST['password'];

    $con = mysqli_connect('localhost', 'root', '','birdcage');

    $res = mysqli_query($con,"select * from users where username='$a'");
    $result=mysqli_fetch_array($res);

    if($result)
    {
        if(password_verify($b, $result['password']))
        {
            $_SESSION["login"]="1";
            header("location:index.php");
        }
        else
        {
            header("location:login.php?err=1");
        }
    }
    else
    {
        header("location:login.php?err=1");
    }
}

?>