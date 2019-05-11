<?php
include './config.php';
  $aadharcard=$_REQUEST['saadharno'];
 include('iconfig.php'); 
 error_reporting(0);  
 if(isset($_FILES['images']['name'])): define ("MAX_SIZE","2000"); 
 for($i=0; $i<count($_FILES['images']['name']); $i++) { $size=filesize($_FILES['images']['tmp_name'][$i]);  
 if($size < (MAX_SIZE*1024)):  $path = "uploads/"; $name = $_FILES['images']['name'][$i]; $size = $_FILES['images']['size'][$i]; 
 list($txt, $ext) = explode(".", $name); date_default_timezone_set ("Asia/Calcutta");  
 $currentdate=date("d M Y");  $file= time().substr(str_replace(" ", "_", $txt), 0); 
 $info = pathinfo($file); $filename = $file.".".$ext; 
 if(move_uploaded_file($_FILES['images']['tmp_name'][$i], $path.$filename)) : $fetch=$db->query("INSERT INTO `gallery` (`id`, `image`) VALUES ('$aadharcard','$filename')"); 
 if($fetch): header(''); else : $error ='Data not inserting'; endif; else : $error = 'File moving unsuccessful'; 
 endif; else: $error = 'You have exceeded the size limit!'; 
 endif;  } else: $error = 'File not found!'; endif;  
 echo @$error ;

// Check connection
$firstname=$_REQUEST['sfname'];
$lastname=$_REQUEST['slname'];
$birthplace=$_REQUEST['sbplace'];

$phoneno=$_REQUEST['sphoneno'];
$emailid=$_REQUEST['semailid'];
$password=$_REQUEST['spasswd'];
$sql = "INSERT INTO `userinfo` (`firstname`, `lastname`, `birthplace`, `aadharno`, `phoneno`, `emailid`, `paswd`) VALUES ('$firstname', '$lastname', '$birthplace', '$aadharcard', '$phoneno', '$emailid', '$password');"; 

// Check for error conditions
   $retval = mysqli_query($conn,$sql);       
   //To check whether the data is entered or not
   if(! $retval ) {
       echo "<script type=text/javascript>alert('Try Again :( <br> Could not enter data');</script>";
      //die('Could not enter data: ' . mysqli_error($conn));
   }
   else
   {
      //echo "<script type=text/javascript>alert('Dear $firstname ,Login with your new credentials');</script>";
        echo " <script> $('#myModal').modal('show');</script>"; 
        session_start();
        $_SESSION['signedupuser']=$firstname;
        header('Location:login.php');
        mysqli_close($conn);
       }
   
 
   
?> 

