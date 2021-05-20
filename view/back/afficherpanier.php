
<?php
include 'model/panier.php';
include 'controller/pan.php';

$panierC=new panierC();

$listepanier=$panierC->afficherPanier(); 
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
 <!-- Favicon -->
 <link rel="icon" type="image/png" href="images/favicon.png">
 <!-- Web Font -->
 <link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
 
 <!-- StyleSheet -->
 
 <!-- Bootstrap -->
 <link rel="stylesheet" href="css/bootstrap.css">
 <!-- Magnific Popup -->
 <link rel="stylesheet" href="css/magnific-popup.min.css">
 <!-- Font Awesome -->
 <link rel="stylesheet" href="css/font-awesome.css">
 <!-- Fancybox -->
 <link rel="stylesheet" href="css/jquery.fancybox.min.css">
 <!-- Themify Icons -->
 <link rel="stylesheet" href="css/themify-icons.css">
 <!-- Nice Select CSS -->
 <link rel="stylesheet" href="css/niceselect.css">
 <!-- Animate CSS -->
 <link rel="stylesheet" href="css/animate.css">
 <!-- Flex Slider CSS -->
 <link rel="stylesheet" href="css/flex-slider.min.css">
 <!-- Owl Carousel -->
 <link rel="stylesheet" href="css/owl-carousel.css">
 <!-- Slicknav -->
 <link rel="stylesheet" href="css/slicknav.min.css">
 
 <!-- Eshop StyleSheet -->
 <link rel="stylesheet" href="b.css">
 <link rel="stylesheet" href="css/reset.css">
 <link rel="stylesheet" href="style.css">
 <link rel="stylesheet" href="css/responsive.css">
 <link rel="stylesheet" href="dtailsprod.css">


</head>
<body>
   <header class="header shop">
      <!-- Topbar -->
      <div class="topbar">
         <div class="container">
            <div class="row">
               <div class="col-lg-5 col-md-12 col-12">
                  <!-- Top Left -->
                  <div class="top-left">
                     <ul class="list-main">
                        <li><i class="ti-headphone-alt"></i> +216 58406858</li>
                        <li><i class="ti-email"></i> pets@gmail.com</li>
                     </ul>
                  </div>
                  <!--/ End Top Left -->
               </div>
               <div class="col-lg-7 col-md-12 col-12">
                  <!-- Top Right -->
                  <div class="right-content">
                     <ul class="list-main">
                        <li><i class="ti-location-pin"></i> Store location</li>
                        
                        <li><i class="ti-user"></i> <a href="#">My account</a></li>
                        <li><i class="ti-power-off"></i><a href="login.html#">Login</a></li>
                     </ul>
                  </div>
                  <!-- End Top Right -->
               </div>
            </div>
         </div>
      </div>
      <!-- End Topbar -->
      <div class="middle-inner">
         <div class="container">
            <div class="row">
               <div class="col-lg-2 col-md-2 col-12">
                  <!-- Logo -->
                  <div class="logo">
                     <a href="index.html"><img src="C:\Users\thebejaoui\Desktop\Image\logoamine.png" alt="logo"></a>
                  </div>
                  <!--/ End Logo -->
                  <!-- Search Form -->
                  <div class="search-top">
                     <div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
                     <!-- Search Form -->
                     <div class="search-top">
                        <form class="search-form">
                           <input type="text" placeholder="Search here..." name="search">
                           <button value="search" type="submit"><i class="ti-search"></i></button>
                        </form>
                     </div>
                     <!--/ End Search Form -->
                  </div>
                  <!--/ End Search Form -->
                  <div class="mobile-nav"></div>
               </div>
               <div class="col-lg-8 col-md-7 col-12">
                  
               </div>
               <div class="col-lg-2 col-md-3 col-12">
                  
               </div>
            </div>
         </div>
      </div>
      <!-- Header Inner -->
      <div class="header-inner">
         <div class="container">
            <div class="cat-nav-head">
               <div class="row">
                  <div class="col-12">
                     <div class="menu-area">
                        <!-- Main Menu -->
                        <nav class="navbar navbar-expand-lg">
                           <div class="navbar-collapse">	
                              <div class="nav-inner">	
                                 <ul class="nav main-menu menu navbar-nav">
                                    <li class="affichercommande.html"><a href="affichercommande.php">afficher tous les commandes</a></li>
                                    <li><a href="afficherpanier.php">afficher tous les paniers</a></li>												
                                    
                                 </ul>
                              </div>
                           </div>
                        </nav>
                        <!--/ End Main Menu -->	
                     </div>

                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--/ End Header Inner -->
   </header>
   <table class="table shopping-summery">
						<thead>
							<tr class="main-hading">
								<th>ID</th>
								<th>NOM</th>
								<th class="text-center"> PRIX</th>
								<th class="text-center">QUANTITY</th>
								<th class="text-center">ID_ARTICLE</th> 
								<th class="text-center"><i class="ti-trash remove-icon"></i></th>
							</tr>
						</thead>
						<tbody>

						<?php
						$s=0;
						$ss=0;
						$sss=1;
						$a=1;
						 foreach($listepanier as $row) { ?>
							<tr>
								<td >  <?php echo $row['id_panier'] ?> </td>
								<td >  <?php echo $row['nom'] ?> </td>
								<td >  <?php echo $row['prix']  ?> </td>
								<?php   $s=$s+$row['prix']  ?>
								<td class="qty" data-title="Qty"><!-- Input Order -->
									<div class="input-group">
										<div class="button minus">
											<button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
												<i class="ti-minus"></i>
											</button>
										</div>
										<input type="text" name="<?php $row['id_panier'] ?>" class="input-number"  data-min="1" data-max="100" value="1+<?php $row['id_panier'] ;?>">
										<div class="button plus">
											<button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="<?php $row['id_panier'] ?>">
												<i class="ti-plus"></i>
											</button>
											<?php $sss=$sss+1; ?>
										</div>
									</div>
									<!--/ End Input Order -->
								</td>
								<td >  <?php echo $row['id_article'] ?> </td>
								<td class="action" data-title="Remove"><a href="supprimerpanier.php?id=<?php echo $row['id_panier'];?>"><i class="ti-trash remove-icon"></i></a></td>
							</tr>
							
							<?php } ?>
						</tbody>
					</table>




    
    
   
   
     
  



 
	<!-- Jquery -->
    <script src="j.js"></script>

    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<!-- Popper JS -->
	<script src="js/popper.min.js"></script>
	<!-- Bootstrap JS -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Color JS -->
	<script src="js/colors.js"></script>
	<!-- Slicknav JS -->
	<script src="js/slicknav.min.js"></script>
	<!-- Owl Carousel JS -->
	<script src="js/owl-carousel.js"></script>
	<!-- Magnific Popup JS -->
	<script src="js/magnific-popup.js"></script>
	<!-- Waypoints JS -->
	<script src="js/waypoints.min.js"></script>
	<!-- Countdown JS -->
	<script src="js/finalcountdown.min.js"></script>
	<!-- Nice Select JS -->
	<script src="js/nicesellect.js"></script>
	<!-- Flex Slider JS -->
	<script src="js/flex-slider.js"></script>
	<!-- ScrollUp JS -->
	<script src="js/scrollup.js"></script>
	<!-- Onepage Nav JS -->
	<script src="js/onepage-nav.min.js"></script>
	<!-- Easing JS -->
	<script src="js/easing.js"></script>
	<!-- Active JS -->
	<script src="js/active.js"></script>
   
</body>
</html>