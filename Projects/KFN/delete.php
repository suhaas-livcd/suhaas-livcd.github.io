<?php
include './iconfig.php';
$pid=$_REQUEST['id'];
$sql = $db->query("delete from products where pid='$pid'");
?>