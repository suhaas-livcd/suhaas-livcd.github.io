<?php
include './config.php';
session_start();
$email=$_REQUEST['lemail'];
$password=$_REQUEST['lpasswd'];

$sql = "select * from `userinfo` where `emailid` = '$email' && `paswd` = '$password'"; 
$sql2="SELECT * from `gallery` where `id` = (SELECT `aadharno` from `userinfo` where `emailid`='$email')";
// Check for error conditions
   $result = mysqli_query($conn,$sql); 
   $result2 = mysqli_query($conn,$sql2);
   //To check whether the data is entered or not
   $checkedval=mysqli_num_rows($result);
   if(!$checkedval) {
       echo "<script type=text/javascript>alert('Try Again :( <br> Invalid Credentials');</script>";
        header('Location:login.php');
      //die('Could not enter data: ' . mysqli_error($conn));
   }
   else
   {
    if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    $firstname=$row['firstname'];
    $lastname=$row['lastname'];
    $_SESSION['emailid']=$row['emailid'];
    $_SESSION['phoneno']=$row['phoneno'];
    $sessionname=$firstname.' '.$lastname[0];
    $_SESSION['loginuser']=$sessionname;
    }
    }
    
    if (mysqli_num_rows($result2) > 0) {
    // output data of each row
    while($row2 = mysqli_fetch_assoc($result2)) {
    $imagepath=$row2['image'];
    $_SESSION['userimage']=$imagepath;
    }
    }
    
        echo "<script type=text/javascript>alert('Dear $firstname, Welcome to KFN');</script>";
       //echo " <script> $('#myModal').modal('show');</script>"; 
        header('Refresh: 0; URL=index.php');
        mysqli_close($conn);
   }

?>

