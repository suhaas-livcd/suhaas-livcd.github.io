 <?php
   $dbhost = 'localhost';
   $dbuser = 'id1615021_root';
   $dbpass = 'chinnu@95';
   $dbname='id1615021_kfndb';
   $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
   
   if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>
