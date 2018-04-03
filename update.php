<!DOCTYPE html>
<?php 
	include('db.php');
	$id=(int)$_GET['id'];
	$sql="select * from zadaci where id='$id'";
	$rows=$db->query($sql);
	$row=$rows->fetch_assoc();
   if(isset($_POST['izmjeni'])){
   		$ime=htmlspecialchars($_POST['ime']);
		$sql ="update zadaci set ime='$ime' where id='$id'";
		$db->query($sql);
		header("Location: index.php");
	}
 ?>
<html>
<head>
	<title>To DO APP</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
	<div class="row" style="margin-top: 70px;">
		<center><h1>UPDATE TO DO LIST</h1></center>
		<div class="col-md-10 col-md-offset-1">


		      	<form method="post" >
		      		<div class="form-group">
		      			<label>Naziv Zadatka</label>
		      			<input type="text" name="ime" required class="form-control" value="<?=$row['ime']?>">
		      		</div>
		      		<input type="submit" name="izmjeni" value="Izmjeni" class="btn btn-success"> 
		      		<a href="index.php" class="btn btn-warning">Idi nazad</a>
		      	</form>

		</div>
	</div>
</div>





</body>
</html>