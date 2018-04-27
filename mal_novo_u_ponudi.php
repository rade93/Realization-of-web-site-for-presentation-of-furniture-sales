<?php session_start();
	include'includes/db.php';
	$per_page = 8;
	if(isset($_GET['page'])){
		$page = $_GET['page'];
	}else{
		$page = 1;
	}
	$start_from = ($page-1) * $per_page;
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Novo u ponudi</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/sminka.css">
       	<script src="js/jquery.js"></script>
		<script src="js/bootstrap.js"></script>
		
</head>

<body>
<!-- header -->
<?php include 'includes/navbar.php'; ?>
	<div id="artikli"></div>
	<div>
		<div class="container">	
			<?php
				$sel_sql = "SELECT * FROM mal_novo_u_ponudi LIMIT $start_from,$per_page";
				$run_sql = mysqli_query($conn,$sel_sql);
				while($rows = mysqli_fetch_assoc($run_sql)){
					echo '
						<div class="col-md-3" style="align-content: center;">
				<div class="panel panel-warning">
					<div class="panel-heading">
						<div class="row">
							<h4 align="center">'.$rows['naslov_m_novo_u_ponudi'].'</h4>
						</div><!-- row -->
						
					</div><!-- panel-heading -->	
					<div class="panel-body">
							<img class="modal-content" src="'.$rows['slika_m_novo_u_ponudi'].'" style="width: 220px; height: 170px;" alt="Dječija spavaća soba" style="border: solid 1px black; margin-left: 20px; ">
							<div class="row">
								<p style="text-align: center; margin-top: 10px;"><b>Cijena '.$rows['cijena_m_novo_u_ponudi'].'</b></p>
							</div>
					</div><!-- panel-body -->
					<div class="panel-footer">
						<div class="row">
							<a href="#"><button id="kupi" class="btn btn-primary"><i class="glyphicon glyphicon-shopping-cart"></i> Kupi</button></a>
						</div>							
					</div><!-- panel-footer -->						
				</div><!-- panel-primary -->
			</div><!-- col-md-3 -->
					';
				}
			?>
		</div><!-- col-md-3 -->
	</div>
</div>
<!-- PAGINATION -->
<nav aria-label="Page navigation" style="text-align: center; margin-bottom: 50px;">
  <ul class="pagination">
<?php
	$pagination_sql = "SELECT * FROM mal_novo_u_ponudi";
	$run_pagination = mysqli_query($conn,$pagination_sql);
	$count = mysqli_num_rows($run_pagination);
	$total_pages = ceil($count/$per_page);
	for($i=1;$i<=$total_pages;$i++){
		echo'<li><a href="mal_novo_u_ponudi.php?page='.$i.'">'.$i.'</a></li>';
	}
?>
  </ul>
</nav>
<!-- FOOTER ------------------------------------------------------------------------>
<?php include 'includes/footer.php'; ?>
</body>
</html>
