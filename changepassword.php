<?php include('header.php');?>
<?php
	$result ="";
	if(isset($_GET['msg']))
	{
		$result=$_GET['msg'];
	}
?>

<ol class="breadcrumb" style="margin: 10px 0px ! important;">
    <li class="breadcrumb-item"><a href="Home.php">Accueil</a><i class="fa fa-angle-right"></i>Changer mot de passe</li>
</ol>
<form method="POST" action="controller/login.php">
<div class="container-fluid" style="margin-bottom: 30px;margin-top: 10px; background: white;">
    <div class="row">
    <h2 style="color: #1abc9c;">Changer mot de passe</h2><hr>
        <div class="col-md-5 control-label">
              <label class="control-label">Ancien mot de passe</label>
              <div class="input-group">
                  <span class="input-group-addon">
              <i class="fa fa-pencil" aria-hidden="true"></i>
              </span>
              <input type="password" name="oldpass" title="Old Password" placeholder="ancien mot de passe" class="form-control">
              </div>
            </div>
        <div class="clearfix"> </div>
    </div>
    <div class="row">
        <div class="col-md-5 control-label">
              <label class="control-label">Nouveau mot de passe</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-pencil" aria-hidden="true"></i>
              </span>
              <input type="password" title="New Password" name="npassword" placeholder="Nouveau mot de passe" class="form-control">
              </div>
            </div>
        <div class="clearfix"> </div>
    </div>

    <div class="row">
        <div class="col-md-5 control-label">
            <label class="control-label">Confirmer mot de passe </label>
            <div class="input-group">             
                <span class="input-group-addon">
        	    	<i class="fa fa-pencil" aria-hidden="true"></i>
            	</span>
              	<input type="password" name="cpassword" title="Confirm Password" placeholder="Confirmer mot de passe" class="form-control" >
            </div>
        </div>
        <div class="clearfix"> </div>
    </div>
    <h4 style="color: #F1C40F;"><?php echo $result ?></h4>
    <div class="row">
    	<div class="col-md-3 form-group">
        	<button type="submit" name="save" title="Save" class="btn btn-primary">Ajouter</button>
            <button type="reset" class="btn btn-default" title="Reset">Annuler</button>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>

</form>

<?php include('footer.php'); ?>
