<!-- script-for sticky-nav -->
		<script>
		$(document).ready(function() {
			 var navoffeset=$(".header-main").offset().top;
			 $(window).scroll(function(){
				var scrollpos=$(window).scrollTop(); 
				if(scrollpos >=navoffeset){
					$(".header-main").addClass("fixed");
				}else{
					$(".header-main").removeClass("fixed");
				}
			 });
			 
		});
		</script>
		<!-- /script-for sticky-nav -->
<!--inner block start here-->

<!--inner block end here-->
<!--copy rights start here-->
<div style="margin-top: -20px;" class="copyrights">
	 <p>© 2019 . Tous droits reservés | Developpé par  <a href="http://sdsi.dj/">SDSI</a> </p>
</div>	
<!--COPY rights end here-->
</div>
</div>
  <!--//content-inner-->
			<!--/sidebar-menu-->
				<div class="sidebar-menu">
					<header class="logo1">
						<a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a>
					</header>
						<div style="border-top:1px ridge rgba(255, 255, 255, 0.15)"></div>
                           <div class="menu">
									<ul id="menu" >
										<li><a href="home.php"><i class="fa fa-tachometer"></i> <span>Tableau de bord</span><div class="clearfix"></div></a></li>

										<li><a href="#"><i class="fa fa-user"></i><span>Contribuable</span><span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
											<ul>
												<li><a href="employeeadd.php">Nouveau contribuable</a></li>
												<li><a href="employeeview.php">Detail contribuable</a></li>
												
											</ul>
										</li>
										<li><a href="#"><i class="fa fa-pagelines"></i><span>Vignettes</span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
										  	<ul>
										  		<li><a href="leaverequest.php">Liste vignettes</a></li>
												<!-- <li><a href="addleave.php">Apply Leave</a></li> -->
												<li><a href="vignetteadd.php">Nouvelle vignette</a></li>
											</ul>
										</li>
										<li><a href="#"><i class="fa fa-pagelines"></i><span>Patentes</span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
										  	<ul>
										  		<li><a href="leaverequest.php">Liste patentes</a></li>
												<!-- <li><a href="addleave.php">Apply Leave</a></li> -->
												<li><a href="workingdayadd.php">Nouveau patente</a></li>
											</ul>
										</li>


										
							        

										<!-- <li><a href="#"><i class="fa fa-check-square-o nav_icon"></i><span>Forms</span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
										  	<ul>
												<li><a href="employeeadd.php">All Employee</a></li>
											</ul>
										</li> -->

										<li><a href="#"><i class="fa fa-table"></i><span>Parametrage</span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
										  	<ul>
												<li><a href="city.php">Adresse</a></li>
												<li><a href="state.php">Ville</a></li>
												<li><a href="country.php">Pays</a></li>
												<li><a href="position.php">Profession</a></li>
												<li><a href="typatente.php">Type patente</a></li>
												<li><a href="Newuser.php">Utilisateur</a></li>
											</ul>
										</li>
											<li id="menu-academico" ><a href="changepassword.php"><i class="fa fa-cogs"></i><span>Changer mot de passe</span></a> <!-- <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div>
										 <ul id="menu-academico-sub">
											<li id="menu-academico-avaliacoes" ><a href="changepassword.php">Change Password</a></li>
											

										  </ul> -->
									 	</li>
										
								  </ul>
								</div>
							  </div>
							  <div class="clearfix"></div>		
							</div>
							<script>
							var toggle = true;
										
							$(".sidebar-icon").click(function() {                
							  if (toggle)
							  {
								$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
								$("#menu span").css({"position":"absolute"});
							  }
							  else
							  {
								$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
								setTimeout(function() {
								  $("#menu span").css({"position":"relative"});
								}, 400);
							  }
											
											toggle = !toggle;
										});
							</script>
<!--js -->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
   <!-- /Bootstrap Core JavaScript -->	   

</body>
</html>