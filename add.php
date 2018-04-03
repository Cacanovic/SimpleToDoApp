<?php
	include('db.php');

if (isset($_POST['send'])) {
	$ime=htmlspecialchars($_POST['ime']);
	$sql="insert into zadaci (ime) values ('$ime')";
	$val=$db->query($sql);

	if ($val) {
		header('Location: index.php');
	}
}





?>