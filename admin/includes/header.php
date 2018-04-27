<link rel="stylesheet" href="../css/admincss.css">
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
		<div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
			<a class="navbar-brand" href="index.php">Salon namještaja</a>
			<div class="dropdown">
	    <button class="dropbtn">Dropdown
	      	<i class="fa fa-caret-down"></i>
	    </button>
	    <div class="dropdown-content">
	      	<div class="row">
		        <div class="column">
			        <h3>Category 1</h3>
			        <a href="#">Link 1</a>
			        <a href="#">Link 2</a>
			        <a href="#">Link 3</a>
		        </div>
		        <div class="column">
		          	<h3>Category 2</h3>
		          	<a href="#">Link 1</a>
		          	<a href="#">Link 2</a>
		          	<a href="#">Link 3</a>
		        </div>
		        <div class="column">
		          	<h3>Category 3</h3>
		          	<a href="#">Link 1</a>
		          	<a href="#">Link 2</a>
		          	<a href="#">Link 3</a>
		        </div>
	      	</div>
	    </div>
  	</div>
        </div>
		<div id="navbar" class="navbar-collapse collapse pull-right">
			<ul class="nav navbar-nav">      
	            <li><a href="profile.php">Zdravo, <b><?php echo $ime;?></b></a></li>
	            <li><a href="../accounts/logout.php">Odjavi se</a></li>
	        </ul>
	    </div>
    </div>
</nav>
