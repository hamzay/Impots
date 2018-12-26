<?php include('header.php'); ?>
<?php 
	include_once('controller/connect.php');
	
	$dbs = new database();
	$db=$dbs->connection();
  $libelle="";
  $classe="";
  $montant="";

	if(isset($_GET['typepatenteedit']))
  {
    $patentid = $_GET['typepatenteedit'];

    $edit = mysqli_query($db,"select * from typepatente where id='$patentid'");
    $row = mysqli_fetch_assoc($edit);
    $libelle = $row['libelle'];
      $montant= $row['montant'];
    $cl= $row['nomcl'];
  

  }

  $page = "";
  $pagelimit = 5;
  $positionid = mysqli_query($db,"select count(id) total from typepatente");
  $positionn = mysqli_fetch_assoc($positionid);
  $number_of_row = ceil($positionn['total'] /5);

  if(isset($_GET['bn']) && intval($_GET['bn']) <= $number_of_row && intval($_GET['bn']) != 0)
  {
    $Skip = (intval($_GET['bn']) * $pagelimit) - $pagelimit;
    print_r($Skip);
    $sql = mysqli_query($db,"select * from typepatente LIMIT $Skip,$pagelimit");
  }
  else
  {
    $sql = mysqli_query($db,"select * from typepatente LIMIT $pagelimit");
  }

  for($i=0;$i<$number_of_row;$i++)
  {
    $d = $i+1;
    $page .= "<a href='typatente.php?bn=$d'>$d</a>&nbsp &nbsp &nbsp";
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
    <li class="breadcrumb-item"><a href="Home.php">Accueil</a><i class="fa fa-angle-right"></i>Parametrage<i class="fa fa-angle-right"></i>Type patente</li>
</ol>

<div class="validation-system" style="margin-top: 0;">
 		
 		<div class="validation-form" style="overflow: auto; margin-right:20px; height: 450px; width: 49%; float: left;">
 	<!---->
        <form method="POST" action="controller/ccity.php?typepatenteedit=<?php echo $row['id']; ?>">
        <div class="vali-form-group" >
        <h2>Ajouter type patente</h2>
          	<div class="col-md-3 control-label">
            	<label class="control-label">type patente</label>
              	<div class="input-group">             
                  	<span class="input-group-addon">
              			<i class="fa fa-language" aria-hidden="true"></i>
              		</span>
              	<input type="text" name="lib" required="" value="<?php echo $libelle; ?>"  placeholder="type patente" class="form-control" style="width: 250px; height: 35px; float: right;">
              	</div>
            </div>
            	<div class="clearfix"> </div>

                      <div class="col-md-3 control-label">
              <label class="control-label">Montant</label>
                <div class="input-group">             
                    <span class="input-group-addon">
                    <i class="fa fa-language" aria-hidden="true"></i>
                  </span>
                <input type="text" name="price" required="" value="<?php echo $montant; ?>"  placeholder="Montant" class="form-control" style="width: 250px; height: 35px; float: right;">
                </div>
            </div>
              <div class="clearfix"> </div>
                <div class="col-md-3 control-label">
              <label class="control-label">Classe</label>
                <div class="input-group">             
                    <span class="input-group-addon">
                    <i class="fa fa-language" aria-hidden="true"></i>
                  </span>
                <input type="text" name="cl" required="" value="<?php echo $classe; ?>"  placeholder="Classe" class="form-control" style="width: 250px; height: 35px; float: right;">
                </div>
            </div>

                  <div class="clearfix"> </div>

  <div class="clearfix"> </div>
        </div>
            <div class="col-md-12 form-group">
              <button type="submit" name="typaten" class="btn btn-primary">Ajouter</button>
              <button type="reset" class="btn btn-default">Annuler</button>
              
            </div>
          <div class="clearfix"> </div>
        </form>
 	<!---->
 </div>
 <div class="validation-form" style="width: 49%; overflow: auto;">
 		<div style="height: 396px;">
					<div class="w3l-table-info">
					  <h2>type patente</h2>
					  
					    <table id="table">
						<thead>
						  <tr>
						  	<th>Id</th>
							<th style="width: 7000px;">Nom</th>
                <th style="width: 5000px;">Montant</th>
                <th style="width: 5000px;">classe</th>
                
							<th style="text-align: center; width: 450px;">Action</th>
						  </tr>
						</thead>
						<tbody>
						<?php $i=1; while($row = mysqli_fetch_assoc($sql)) { ?> 

						<tr>
							<td><?php if(isset($_GET['bn'])==0){ echo $i; } else{ echo ($_GET['bn']-1)*5+$i; } $i++;?></td>
							<td><?php echo ucfirst($row['libelle']); ?></td>
                <td><?php echo ucfirst($row['montant']); ?></td>
                  <td><?php echo ucfirst($row['nomcl']); ?></td>
							<td><a href="?typepatenteedit=<?php echo $row['id']; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="controller/ccity.php?typepatentedelete=<?php echo $row['id']; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
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