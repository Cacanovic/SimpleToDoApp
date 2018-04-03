<?php
include('db.php');

$id=(int)$_GET['id'];
$sql="delete from zadaci where id='$id'";

if($db->query($sql)){
	header("Location: index.php");	
}



?>