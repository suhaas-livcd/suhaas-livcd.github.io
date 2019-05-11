<?php

include './config.php';
session_start();
error_reporting(0);
$pmailid=$_SESSION['emailid'];$pphoneno=$_SESSION['phoneno'];$pname=$_REQUEST['pname'];$pcategory=$_REQUEST['pcat'];
$pcp=$_REQUEST['pcp'];$psp=$_REQUEST['psp'];$pdesc=$_REQUEST['pdesc'];$ppurdate=$_REQUEST['pdate'];$ppurdate = date('Y-m-d', strtotime($ppurdate));
$pdate2=date("Y-m-d",time());
$date1 = new DateTime($ppurdate);$date2 = new DateTime($pdate2);
$interval = $date1->diff($date2);
$puseddays=$interval->y . "Y/" . $interval->m."M/".$interval->d."D"; 
$pstatus='In stock';
if($pcp>$psp)
{$discount= floor(abs((($pcp-$psp)/$pcp)*100));}
else{$discount=0;}
$sqlcount = "SELECT COUNT(*) FROM products WHERE pcategory = '$pcategory'"; //to use unique product id so count + 1
$result = mysqli_query($conn,$sqlcount); 
$row = $result->fetch_row();
$pid=$pcategory[0].(++$row[0]);
$sqlinsertpro="INSERT INTO `products` (`pid`, `pname`, `pcategory`, `pcp`, `psp`, `pdp`, `ppurdate`, `puseddays`, `pmailid`, `pstatus`, `pphoneno`, `pdesc`) VALUES ('$pid', '$pname', '$pcategory', '$pcp', '$psp', '$discount', '$ppurdate', '$puseddays', '$pmailid', '$pstatus', '$pphoneno', '$pdesc')";
 $retvalpro = mysqli_query($conn,$sqlinsertpro);       
   //To check whether the data is entered or not
 
 include('iconfig.php'); 
 error_reporting(0);  
 if(isset($_FILES['images']['name'])): define ("MAX_SIZE","2000"); 
 for($i=0; $i<count($_FILES['images']['name']); $i++) { $size=filesize($_FILES['images']['tmp_name'][$i]);  
 if($size < (MAX_SIZE*1024)):  $path = "products/$pcategory/"; $name = $_FILES['images']['name'][$i]; $size = $_FILES['images']['size'][$i]; 
 list($txt, $ext) = explode(".", $name); date_default_timezone_set ("Asia/Calcutta");  
 $currentdate=date("d M Y");  $file= $pid.'-'.$i; 
 $info = pathinfo($file); $filename = $file.".".$ext; 
 if(move_uploaded_file($_FILES['images']['tmp_name'][$i], $path.$filename)) : $fetch=$db->query("INSERT INTO `productgallery` (`pid`, `image`, `pmailid`, `pphoneno`) VALUES ('$pid','$filename','$pmailid','$pphoneno')"); 
 if($fetch): header(''); else : $error ='Data not inserting'; endif; else : $error = 'File moving unsuccessful'; 
 endif; else: $error = 'You have exceeded the size limit!'; 
 endif;  } else: $error = 'File not found!'; endif;  
 echo @$error ;
 
 
 
 
 
 
   if(! $retvalpro ) {
       echo "<script type=text/javascript>alert('Try Again :( <br> Could not enter data');</script>";
       header('Refresh: 0; URL=seller.php');
   }
   else
   {
        $firstname1= $_SESSION['loginuser'];
        echo "<script type=text/javascript>alert('Dear $firstname1 , the product id is $pid');</script>";
        header('Refresh: 0; URL=seller.php');
        mysqli_close($conn);
       }
       
       
// shows the total amount of days (not divided into years, months and days like above)
//echo "difference " . $interval->days . " days ";
?>