<?php include('header.php'); ?>
<?php 
	include_once('controller/connect.php');
	
	$dbs = new database();
	$db=$dbs->connection();
  $name="";
  $log="";
  $pass="";
   $role="";
   $usertype = mysqli_query($db,"select * from typeuser  ORDER BY libelle");
	if(isset($_GET['useredit']))
  {
    $userid = $_GET['useredit'];

    $edit = mysqli_query($db,"select * from user where id='$userid'");
    $row = mysqli_fetch_assoc($edit);
    $name = $row['nom'];
    $log= $row['login'];
    $pass= $row['password'];
    $role= $row['roleid'];
  

  }

  $page = "";
  $pagelimit = 5;
  $positionid = mysqli_query($db,"select count(id) total from user");
  $positionn = mysqli_fetch_assoc($positionid);
  $number_of_row = ceil($positionn['total'] /5);

  if(isset($_GET['bn']) && intval($_GET['bn']) <= $number_of_row && intval($_GET['bn']) != 0)
  {
    $Skip = (intval($_GET['bn']) * $pagelimit) - $pagelimit;
    print_r($Skip);
    $sql = mysqli_query($db,"select * from user LIMIT $Skip,$pagelimit");
  }
  else
  {
    $sql = mysqli_query($db,"select * from user LIMIT $pagelimit");
  }

  for($i=0;$i<$number_of_row;$i++)
  {
    $d = $i+1;
    $page .= "<a href='adduser.php?bn=$d'>$d</a>&nbsp &nbsp &nbsp";
  }
?>
<link rel="stylesheet" type="text/css" href="css/table-style.css" />
<!-- <link rel="stylesheet" type="text/css" href="css/basictable.css" /> -->
<script type="text/javascript" src="js/jquery.basictable.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
      $('#table').basictable();

      $('#table-breakpoint').basictable({
        breakpoint: 768
      });

      $('#table-swap-axis').basictable({
        swapAxis: true
      });

      $('#table-force-off').basictable({
        forceResponsive: false
      });

      $('#table-no-resize').basictable({
        noResize: true
      });

      $('#table-two-axis').basictable();

      $('#table-max-height').basictable({
        tableWrapper: true
      });
    });
</script>
<ol class="breadcrumb" style="margin: 10px 0px ! important;">
    <li class="breadcrumb-item"><a href="Home.php">Accueil</a><i class="fa fa-angle-right"></i>Parametrage<i class="fa fa-angle-right"></i>Utilisateur</li>
</ol>

<div class="validation-system" style="margin-top: 0;">
 		
 		<div class="validation-form" style="overflow: auto; margin-right:20px; height: 450px; width: 49%; float: left;">
 	<!---->
        <form method="POST" action="controller/ccity.php?useredit=<?php echo $row['id']; ?>">
        <div class="vali-form-group" >
        <h2>Ajouter Nouveau utilisateur</h2>
          	<div class="col-md-3 control-label">
            	<label class="control-label">Nom</label>
              	<div class="input-group">             
                  	<span class="input-group-addon">
              			<i class="fa fa-language" aria-hidden="true"></i>
              		</span>
              	<input type="text" name="name" required="" value="<?php echo $name; ?>"  placeholder="Nom utilisateur" class="form-control" style="width: 250px; height: 35px; float: right;">
              	</div>
            </div>
            	<div class="clearfix"> </div>

                      <div class="col-md-3 control-label">
              <label class="control-label">Pseudo</label>
                <div class="input-group">             
                    <span class="input-group-addon">
                    <i class="fa fa-language" aria-hidden="true"></i>
                  </span>
                <input type="text" name="log" required="" value="<?php echo $log; ?>"  placeholder="Pseudo" class="form-control" style="width: 250px; height: 35px; float: right;">
                </div>
            </div>
              <div class="clearfix"> </div>
                <div class="col-md-3 control-label">
              <label class="control-label">Mot de passe </label>
                <div class="input-group">             
                    <span class="input-group-addon">
                    <i class="fa fa-language" aria-hidden="true"></i>
                  </span>
                <input type="text" name="pass" required="" value="<?php echo $pass; ?>"  placeholder="Mot de passe" class="form-control" style="width: 250px; height: 35px; float: right;">
                </div>
            </div>

                  <div class="clearfix"> </div>
                  <div class="col-md-3 control-label">
              <label class="control-label">Role</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-map-marker" aria-hidden="true"></i>
              </span>
              <select name="role" style="text-transform: capitalize; width: 250px;" required>
                <option value="">-- Choisir un role --</option>
                <?php while($rw = mysqli_fetch_assoc($usertype)){ ?> 
                  <option value="<?php echo $rw["id"]; ?>" <?php if($role==$rw["id"]){ echo "Selected"; }?>> <?php echo $rw["libelle"]; ?> </option>
                <?php } ?>
              </select>
              </div>
            </div>

  <div class="clearfix"> </div>
        </div>
            <div class="col-md-12 form-group">
              <button type="submit" name="useradd" class="btn btn-primary">Ajouter</button>
              <button type="reset" class="btn btn-default">Annuler</button>
              
            </div>
          <div class="clearfix"> </div>
        </form>
 	<!---->
 </div>
 <div class="validation-form" style="width: 49%; overflow: auto;">
 		<div style="height: 396px;">
					<div class="w3l-table-info">
					  <h2>Utilisateur</h2>
					  
					    <table id="table">
						<thead>
						  <tr>
						  	<th>Id</th>
							<th style="width: 5000px;">Nom</th>
                <th style="width: 3000px;">Pseudo</th>
                <th style="width: 3000px;">Mot de passe</th>
                <th style="width: 3000px;">Role</th>
							<th style="text-align: center; width: 450px;">Action</th>
						  </tr>
						</thead>
						<tbody>
						<?php $i=1; while($row = mysqli_fetch_assoc($sql)) { ?> 

						<tr>
							<td><?php if(isset($_GET['bn'])==0){ echo $i; } else{ echo ($_GET['bn']-1)*5+$i; } $i++;?></td>
							<td><?php echo ucfirst($row['nom']); ?></td>
                <td><?php echo ucfirst($row['login']); ?></td>
                  <td><?php echo ucfirst($row['password']); ?></td>
                    <td><?php echo ucfirst($row['roleid']); ?></td>
							<td><a href="?useredit=<?php echo $row['id']; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="controller/ccity.php?userdelete=<?php echo $row['id']; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
						 </tr>	

						<?php } ?>
						</tbody>
					  </table>
            <div><?php echo $page;?></div>
					</div>
				  
		</div>
 </div>
</div>
<?php include('footer.php'); ?>