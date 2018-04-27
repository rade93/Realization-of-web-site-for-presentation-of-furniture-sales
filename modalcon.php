<?php include 'includes/db.php'; ?>
<link rel="stylesheet" type="text/css" href="css/moj.css">

<!-- ADMIN PANEL -->
<div class="modal fade" id="myModal" role="dialog">
<div class="modal-dialog">
<div class="col-lg-12 col-md-12">
  <div class="panel" >
    <form class="panel-group form-horizontal" role="form" action="accounts/login.php" method="post">
      <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title"><i class="glyphicon glyphicon-log-in"></i> Prijavi se</h4>
          </div>
      <div class="panel-body">
        <div class="form-group">				
          <div class="col-sm-12">
          <label for="username">E-mail</label>
            <input type="text" id="username" placeholder="gojkovic007@gmail.com" name="user_name" class="form-control">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
          <label for="password">Šifra</label>
            <input type="password" id="password" class="form-control" name="password" placeholder="456">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <input type="submit" class="btn btn-success btn-block" name="submit_login" value="Pošalji">
          </div>
        </div>
      </div>
    </form>
    
  </div>
</div><!--- col-md-2 -->
</div>
</div>