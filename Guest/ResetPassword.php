<?php
session_start();
include("../Asset/Connection/Connection.php");


if(isset($_POST['btn_submit'])){
    $pass=$_POST['txt_pass'];
    $cpass=$_POST['txt_cpass'];
    if($pass==$cpass){
        if(isset($_SESSION['fid'])){ //User
            $updQry="update tbl_freelan set freelan_password='".$pass."' where freelan_id=".$_SESSION['fid'];
            if($con->query($updQry)){
                ?>
                <script>
                    alert("Password Updated")
                    window.location="LogOut.php"
                    </script>
                <?php
            }
        }
        else if(isset($_SESSION['cid'])){ //Seller
            $updQry="update tbl_client set client_password='".$pass."' where client_id=".$_SESSION['cid'];
            if($con->query($updQry)){
                ?>
                <script>
                    alert("Password Updated")
                    window.location="LogOut.php"
                    </script>
                <?php
            }
        }
        
        else{
            ?>
            <script>
                alert('Something went wrong')
                    window.location="LogOut.php"
                </script>
            <?php
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <table border='1'>
            <tr>
                <td>New Password</td>
                <td><input type="password" name="txt_pass" id=""></td>
            </tr>
            <tr>
                <td>Confirm Password</td>
                <td><input type="password" name="txt_cpass" id=""></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="btn_submit" value="Change Password"></td>
                
            </tr>
        </table>
    </form>
</body>
</html>