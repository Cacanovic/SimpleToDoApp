<!DOCTYPE html>
<?php 
	include('db.php');
	$page=(isset($_GET['page']) ? (int)$_GET['page'] : 1);
	$perPage=(isset($_GET['per-page'])&&(int)($_GET['per-page']) <=50 ? (int)$_GET['per-page'] : 5);
	$start=($page > 1) ? ($page*$perPage) - $perPage : 0;

	$sql="select * from zadaci limit ".$start.",".$perPage." ";

	$total=$db->query("select * from zadaci")->num_rows;

	$pages=ceil($total/$perPage);

	$rows=$db->query($sql);
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
		<center><h1>TO DO LIST</h1></center>
		<div class="col-md-10 col-md-offset-1">

		<button type="button" class="btn btn-success" data-target="#myModal" data-toggle="modal">Dodaj</button>
		<button type="button" class="btn btn-default pull-right " onclick="print()">Print</button>
		<hr><br>

	
		<!-- Modal -->
		<div id="myModal" class="modal fade" role="dialog">
		  <div class="modal-dialog">

		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Dodaj Zadatak</h4>
		      </div>
		      <div class="modal-body">
		      	<form method="post" action="add.php">
		      		<div class="form-group">
		      			<label>Naziv Zadatka</label>
		      			<input type="text" name="ime" required class="form-control">
		      		</div>
		      		<input type="submit" name="send" value="Dodaj" class="btn btn-success"> 
		      	</form>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      </div>
		    </div>

		  </div>
		</div>


			<table class="table table-hover">
			  <thead>
			    <tr>
			      <th scope="col">ID.</th>
			      <th scope="col">Zadatak</th>
			    </tr>
			  </thead>
			  <tbody>
			    
			    <?php while($row=$rows->fetch_assoc()):?>

				    <tr>
				      <th><?=$row['id']?></th>
				      <td class="col-md-10"><?=$row['ime']?></td>
				      <td><a href="update.php?id=<?=$row['id']?>" class="btn btn-success">Edit</a></td>
				      <td><a href="delete.php?id=<?=$row['id']?>" class="btn btn-danger">Delete</a></td>
				    </tr>
			     <?php endwhile; ?>
			  </tbody>
			</table>
			<center>
<!--PAGINACIJA-->
				<?php if($pages <=7):?>
					<!--pokazuje sve jer ih ima ukupno 7-->
				<nav aria-label="Page navigation example">
				  <ul class="pagination">
				    <li <?php echo ($page==1) ? 'style="display: none ;"': '' ?>  class="page-item"><a class="page-link" href="?page=<?=$page-1;?>&per-page=<?=$perPage?>">Prev</a></li>
				    <?php for($i=1;$i<=$pages;$i++):?>
				    	 <li class="page-item <?php echo ($page==$i) ? 'active' : ''  ?> "><a class="page-link" href="?page=<?=$i;?>&per-page=<?=$perPage?>""><?=$i?></a></li>
				    <?php endfor; ?>
				    <li <?php echo ($page==$pages) ? 'style="display: none ;"': '' ?> class="page-item"><a class="page-link" href="?page=<?=$page+1;?>&per-page=<?=$perPage?>">Next</a></li>
				  </ul>
				</nav>

				<?php elseif( $page-1 < 4  ) : ?>
				<!--prvih 5 pokazuje-->
				<ul class="pagination">
				  <li <?php echo ($page==1) ? 'style="display: none ;"': '' ?>  class="page-item"><a class="page-link" href="?page=<?=$page-1;?>&per-page=<?=$perPage?>">Prev</a></li>

				  <?php for($i=1;$i<=5;$i++):?>
				  	 <li class="page-item <?php echo ($page==$i) ? 'active' : ''  ?> "><a class="page-link" href="?page=<?=$i;?>&per-page=<?=$perPage?>""><?=$i?></a></li>
				  <?php endfor; ?>

				   <li class="page-item "><a class="page-link" href="">...</a></li>
				   <li class="page-item"><a class="page-link" href="?page=<?=$pages-1;?>&per-page=<?=$perPage?>"><?=$pages-1?></a></li>
				    <li class="page-item"><a class="page-link" href="?page=<?=$pages;?>&per-page=<?=$perPage?>"><?=$pages?></a></li>

				  <li <?php echo ($page==$pages) ? 'style="display: none ;"': '' ?> class="page-item"><a class="page-link" href="?page=<?=$page+1;?>&per-page=<?=$perPage?>">Next</a></li>
				</ul>	
				<?php elseif( $pages-$page < 4) : ?>
				<!--zadnjih 5 pokazuje-->
				<ul class="pagination">
				  <li <?php echo ($page==1) ? 'style="display: none ;"': '' ?>  class="page-item"><a class="page-link" href="?page=<?=$page-1;?>&per-page=<?=$perPage?>">Prev</a></li>

				   <li class="page-item"><a class="page-link" href="?page=<?=1;?>&per-page=<?=$perPage?>">1</a></li>
				   <li class="page-item"><a class="page-link" href="?page=<?=2;?>&per-page=<?=$perPage?>">2</a></li>
				   <li class="page-item "><a class="page-link" href="">...</a></li>

				  <?php for($i=$pages-4;$i<=$pages;$i++):?>
				  	 <li class="page-item <?php echo ($page==$i) ? 'active' : ''  ?> "><a class="page-link" href="?page=<?=$i;?>&per-page=<?=$perPage?>""><?=$i?></a></li>
				  <?php endfor; ?>


				  <li <?php echo ($page==$pages) ? 'style="display: none ;"': '' ?> class="page-item"><a class="page-link" href="?page=<?=$page+1;?>&per-page=<?=$perPage?>">Next</a></li>
				</ul>
				<?php elseif($page-1>=4 && $pages-$page>=4 ) : ?>
					<!--ovdje je najveci samo u sredini 3 prikazuje-->
					<nav aria-label="Page navigation example">
					  <ul class="pagination">
					   	<li <?php echo ($page==1) ? 'style="display: none ;"': '' ?>  class="page-item"><a class="page-link" href="?page=<?=$page-1;?>&per-page=<?=$perPage?>">Prev</a></li>
						<li class="page-item"><a class="page-link" href="?page=<?=1;?>&per-page=<?=$perPage?>">1</a></li>
						<li class="page-item"><a class="page-link" href="?page=<?=2;?>&per-page=<?=$perPage?>">2</a></li>
						<li class="page-item "><a class="page-link" href="">...</a></li>

						<?php for($i=$page-1;$i<=$page+1;$i++):?>
							 <li class="page-item <?php echo ($page==$i) ? 'active' : ''  ?> "><a class="page-link" href="?page=<?=$i;?>&per-page=<?=$perPage?>""><?=$i?></a></li>
						<?php endfor; ?>


						<li class="page-item "><a class="page-link" href="">...</a></li>
						<li class="page-item"><a class="page-link" href="?page=<?=$pages-1;?>&per-page=<?=$perPage?>"><?=$pages-1?></a></li>
						 <li class="page-item"><a class="page-link" href="?page=<?=$pages;?>&per-page=<?=$perPage?>"><?=$pages?></a></li>
						  <li <?php echo ($page==$pages) ? 'style="display: none ;"': '' ?> class="page-item"><a class="page-link" href="?page=<?=$page+1;?>&per-page=<?=$perPage?>">Next</a></li>
					  </ul>
					</nav>
				<?php endif; ?>
				<nav aria-label="Page navigation example">
				  <ul class="pagination">
				   
				  </ul>
				</nav>
<!--KRAJ PAGINACIJE-->

			</center>
		</div>
	</div>
</div>





</body>
</html>