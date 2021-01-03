<?php 
$mysqli = new mysqli("localhost","root","","istock") or die(mysql_error());
$result = $mysqli->query("SELECT pc.CategoryName as ParentCategoryName,sub.CategoryName,pc.ImagePath ParentCategoryImage,sub.ImagePath,articles.Title,articles.Description FROM informationcategory sub inner join informationcategory pc on sub.ParentCategory = pc.Id
inner join articles on sub.Id = articles.CategoryId");
$data = array();
while ($row = mysqli_fetch_array($result))
{
    $data[] = $row;
}
?>
<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <script>document.getElementsByTagName("html")[0].className += " js";</script>
      <title>WPoets</title>
      <!-- Favicon -->
      <link rel="shortcut icon" href="../images/favicon.ico" />
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="../css/bootstrap.min.css">
      <!-- Typography CSS -->
      <link rel="stylesheet" href="../css/typography.css">
      <!-- Style CSS -->
      <link rel="stylesheet" href="../css/style.css" />
      <!-- Responsive CSS -->
      <link rel="stylesheet" href="../css/responsive.css">
   </head>
   <body>
      <!-- loading -->
      <div id="loading">
         <div id="loading-center">
            <div class="load-img">
               <img src="../images/loader.gif" alt="loader">
            </div>
         </div>
      </div>
      <!-- loading End -->
      <!-- Main Content Start -->
      <div class="main-content">
         <!-- Section Start -->
         <section class=" position-relative main-bg h-100">
            <div class="container">
               <div class="row ">
                  <div class="col-lg-12 col-md-12 ">
                     <div class="text-center title-box">
                        <h2 class="title brand-white  position-relative">DelphianLogic in Action</h2>
                        <p class="sub-title gray-lighter"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean commodo  </p>
                     </div>
                  </div>
               </div>

               <div class="row  position-relative no-gutters row-eq-height vertical-tab d-none d-lg-flex">
                  <div class="col-lg-3 col-md-12 gray-white-bg ">
                      <!-- Nav tabs -->
                      <ul class="nav nav-tabs pad-3" role="tablist">

					<?php
					$parentCategories = array();
					$i = 0;
					foreach ($data as $row){
						if(!in_array($row["ParentCategoryName"], $parentCategories)){
							$i++;
					?>
						<li role="presentation" ><a href="#<?php echo $row["ParentCategoryName"]; ?>" class="<?php if($i==1) { echo "active show";} ?>" aria-controls="home" role="tab" data-toggle="tab"><img alt="#" src="<?php echo $row["ParentCategoryImage"]; ?>" class="mr-2"><?php echo $row["ParentCategoryName"]; ?></a></li>
					<?php
						array_push($parentCategories, $row["ParentCategoryName"]); 
					}
					}
					?>

                      </ul>
                      <!-- Nav tabs End-->                   
                  </div>
                  <div class="col-lg-9 col-md-12">
                       <!-- Tab panes -->
                        <div class="tab-content tabs">
                        	<?php
							$categories = array();
							$j = 0;
							foreach ($data as $row){
								if(!in_array($row["CategoryName"], $categories)){
									$j++;
							?>
                             <div role="tabpanel" class="tab-pane fade in <?php if($j==1) { echo "active show";} ?>" id="<?php echo $row["ParentCategoryName"]; ?>">
                                <div class="row no-gutters row-eq-height ">
                                   <div class="col-lg-6 brand-fourth-bg">
                                       <div class="owl-carousel" data-autoplay="true" data-loop="true" data-nav="false" data-dots="true" data-items="1" data-items-laptop="1" data-items-tab="1" data-items-mobile="1" data-items-mobile-sm="1" data-margin="30">
                                          <?php
											foreach ($data as $row1){
													if($row1["CategoryName"] == $row["CategoryName"]) {
										?>
                                          <div class="item">
                                             <div class="info-box">
                                                <span class="badge badge-info mb-2 text-uppercase"><?php echo $row1["Title"]; ?></span>
                                                <h4 class="brand-white mb-4"><?php echo $row1["Description"]; ?></h4>
                                                <a  class="brand-white" href="#">Learn More <i class="ml-2 ion ion-ios-arrow-right"></i></a>
                                             </div>
                                          </div>


										<?php
										}
										}
										?>

                                       </div>
                                   </div>
                                   <div class="col-lg-6">
                                       <img class="img-fluid bg-img" src="<?php echo $row["ImagePath"]; ?>" alt="#">
                                       <h2 class="brand-white info-title"><?php echo $row["CategoryName"]; ?></h2>
                                   </div>
                                </div>
                             </div>

                            <?php
						array_push($categories, $row["CategoryName"]); 
						}
						}
						?>

                        </div>
                  </div>                  
               </div>

               <div class="row d-lg-none">
                  <div class="col-sm-12">
                     <div class="accordion" id="mytab">

                     	<?php
							$categories = array();
							$j = 0;
							foreach ($data as $row){
								if(!in_array($row["CategoryName"], $categories)){
									$j++;
							?>


                       <div class="card">
                        <div class="card-header" id="headingOne">
                           <a class="" type="button" data-toggle="collapse" data-target="#mb-<?php echo $row["ParentCategoryName"]; ?>" aria-expanded="<?php if($j==1) { echo " true";}else {echo "false";} ?>" aria-controls="mb-learning">
                               <img alt="#" src="<?php echo $row["ParentCategoryImage"]; ?>" class="mr-2"><?php echo $row["ParentCategoryName"]; ?>
                               <img alt="#" src="../images/plus-01.svg" class="arrow plus">
                               <img alt="#" src="../images/minus-01.svg" class="arrow minus">
                           </a>
                        </div>

                         <div id="mb-<?php echo $row["ParentCategoryName"]; ?>" class="collapse <?php if($j==1) { echo " show";} ?>" aria-labelledby="headingOne" data-parent="#mytab">
                           <div class="card-body">
                                 <div class="row   no-gutters row-eq-height ">
                                   <div class="col-md-12 ">
                                       <div class="owl-carousel" data-autoplay="true" data-loop="true" data-nav="false" data-dots="true" data-items="1" data-items-laptop="1" data-items-tab="1" data-items-mobile="1" data-items-mobile-sm="1" data-margin="30">
                                        <?php
											foreach ($data as $row1) {
													if($row1["CategoryName"] == $row["CategoryName"]) {
										?>
                                          <div class="item">
                                             <div class="info-box">
                                                <span class="badge badge-info mb-2 text-uppercase"><?php echo $row1["Title"]; ?></span>
                                                <h4 class="brand-white mb-4"><?php echo $row1["Description"]; ?></h4>
                                                <a  class="brand-white" href="#">Learn More <i class="ml-2 ion ion-ios-arrow-right"></i></a>
                                             </div>
                                          </div>


										<?php
										}
										}
										?>
                                       </div>
                                      <img class="img-fluid bg-img" src="<?php echo $row["ImagePath"]; ?>" alt="#">
                                       <h2 class="brand-white info-title"><?php echo $row["CategoryName"]; ?></h2>
                                   </div>
                                   
                                </div>
                           </div>
                         </div>
                       </div>


                            <?php
						array_push($categories, $row["CategoryName"]); 
						}
						}
						?>
                    
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- Section End -->      
         </div>
         <!-- Main Content End -->         
       
         <!-- jQuery first, then Popper.js, then Bootstrap JS -->
         <script src="../js/jquery-3.4.1.js"></script>
         <!-- jQuery  for scroll me js -->
         <script src="../js/jquery-min.js"></script>
         <!--  bootstrap -->
         <script src="../js/bootstrap.min.js"></script>
         <!-- Owl.carousel JavaScript -->
         <script src="../js/owl.carousel.min.js"></script>
         <!--  Custom JavaScript -->
         <script src="../js/custom.js"></script>        
      </body>
   </html>
