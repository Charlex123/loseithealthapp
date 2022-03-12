<?php
session_start();
include 'class/Rating.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <!-- <base href="/" /> -->
  <title>Loseit - Health Check</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <script src="js/rating.js"></script>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <script type="text/javascript">
    function googleTranslateElementInit() {
      new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
    }
    </script>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.html"><img src="assets/img/logo.png" width="120px"></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="../#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="../#about">About</a></li>
          <li><a class="nav-link scrollto" href="../#services">Services</a></li>
          <li><a class="nav-link scrollto" href="../#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <a href="account/index.php" class="login-btn scrollto">Login</a>
      <div class="ml-4 p-1" id="google_translate_element"></div>
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container">
      <h1>Welcome To Loseit Health App</h1>
      <h2>Share It, Learn It & Live It</h2>
      <a href="#about" class="btn-get-started scrollto">Get Started</a>
    </div>
  </section><!-- End Hero -->

  <div id="">
        <div style="clear:both"></div>
        
        <!-- ====== chatbot section=====-->
        <div class="chatbot-conta">
        <div class="chatbotimg"><a class="" href="chatbot/"><img src="assets/img/loseitbot.png" class="botchatimg"></a></div>
        </div>
        <!-- ====== chatbot section ends =====-->

        <!-- ======= Why Us Section ======= -->
        <section id="why-us" class="why-us">
        <div class="container">

            <div class="row">
            <div class="col-lg-12 d-flex align-items-stretch">
                <div class="content">
                <h3>Why Choose Loseit?</h3>
                <h4 class="">
                    Loseit is an AI powered health and diagnostic web application focusing on reviving teenagers and young adults from psychological and emotional health issues.
                    We know teenagers and young adults of this social media and jet age pass through a lot of peer influence and pressure and may be dying in silence without sharing their ordeal with anyone. Loseit Artificial Intelligence will be of great help in this instance because they will easily communicate with our AI Bot than they would with acquiantances and medical personnels.
                </h4>
                </div>
            </div>
            
            </div>

        </div>
        </section><!-- End Why Us Section -->
        
        <section id="gallery" class="services">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mb-4 hover:bg-primary-75" style="font-size: 18px;">
                        <?php
                            $rating = new Rating();
                            $con = new PDO("mysql:host=localhost;dbname=phpzag_demos;" , 'root', "");
                            $get = $con->prepare("SELECT * FROM item WHERE itemId = ? ");
                            $get -> bindParam(1, $_GET['itemId']);
                            $get -> execute();
                            $itemDetails = $get -> fetch(PDO::FETCH_ASSOC);
                            
                            $average = $rating->getRatingAverage($itemDetails["itemId"]);
                            
                            ?>
                            <h1 class="mx-auto text-center font-weight-bolder text-primary p-2"><?php echo ucwords($itemDetails["title"]); ?></h1>
                            <div class="card">
                                <img src="<?php echo $itemDetails["image"]; ?>" alt="" class="card-img-top">
                                <div class="card-header">
                                    <h2 class="text-primary"><?php echo @$itemDetails["category"]; ?></h2>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-body text-lg font-weight-bold"><?php echo @$itemDetails["content"]; ?></h5>
                                </div>
                            </div>
                                
                            <?php	
                            $itemRating = $rating->getItemRating($_GET['itemId']);	
                            $ratingNumber = 0;
                            $count = 0;
                            $fiveStarRating = 0;
                            $fourStarRating = 0;
                            $threeStarRating = 0;
                            $twoStarRating = 0;
                            $oneStarRating = 0;	
                            foreach($itemRating as $rate){
                                $ratingNumber+= $rate['ratingNumber'];
                                $count += 1;
                                if($rate['ratingNumber'] == 5) {
                                    $fiveStarRating +=1;
                                } else if($rate['ratingNumber'] == 4) {
                                    $fourStarRating +=1;
                                } else if($rate['ratingNumber'] == 3) {
                                    $threeStarRating +=1;
                                } else if($rate['ratingNumber'] == 2) {
                                    $twoStarRating +=1;
                                } else if($rate['ratingNumber'] == 1) {
                                    $oneStarRating +=1;
                                }
                            }
                            $average = 0;
                            if($ratingNumber && $count) {
                                $average = $ratingNumber/$count;
                            }	
                            ?>		
                            <br>		
                            <div id="ratingDetails"> 		
                                <div class="row">			
                                    <div class="col-sm-3">				
                                        <h4>Rating and Reviews</h4>
                                        <h2 class="bold padding-bottom-7"><?php printf('%.1f', $average); ?> <small>/ 5</small></h2>				
                                        <?php
                                        $averageRating = round($average, 0);
                                        for ($i = 1; $i <= 5; $i++) {
                                            $ratingClass = "btn-default btn-grey";
                                            if($i <= $averageRating) {
                                                $ratingClass = "btn-warning";
                                            }
                                        ?>
                                        <button type="button" class="btn btn-sm <?php echo $ratingClass; ?>" aria-label="Left Align">
                                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                        </button>	
                                        <?php } ?>				
                                    </div>
                                    <div class="col-sm-3">
                                        <?php
                                        $fiveStarRatingPercent = round(($fiveStarRating/5)*100);
                                        $fiveStarRatingPercent = !empty($fiveStarRatingPercent)?$fiveStarRatingPercent.'%':'0%';	
                                        
                                        $fourStarRatingPercent = round(($fourStarRating/5)*100);
                                        $fourStarRatingPercent = !empty($fourStarRatingPercent)?$fourStarRatingPercent.'%':'0%';
                                        
                                        $threeStarRatingPercent = round(($threeStarRating/5)*100);
                                        $threeStarRatingPercent = !empty($threeStarRatingPercent)?$threeStarRatingPercent.'%':'0%';
                                        
                                        $twoStarRatingPercent = round(($twoStarRating/5)*100);
                                        $twoStarRatingPercent = !empty($twoStarRatingPercent)?$twoStarRatingPercent.'%':'0%';
                                        
                                        $oneStarRatingPercent = round(($oneStarRating/5)*100);
                                        $oneStarRatingPercent = !empty($oneStarRatingPercent)?$oneStarRatingPercent.'%':'0%';
                                        
                                        ?>
                                        <div class="pull-left">
                                            <div class="pull-left" style="width:35px; line-height:1;">
                                                <div style="height:9px; margin:5px 0;">5 <span class="glyphicon glyphicon-star"></span></div>
                                            </div>
                                            <div class="pull-left" style="width:180px;">
                                                <div class="progress" style="height:9px; margin:8px 0;">
                                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $fiveStarRatingPercent; ?>">
                                                    <span class="sr-only"><?php echo $fiveStarRatingPercent; ?></span>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="pull-right" style="margin-left:10px;"><?php echo $fiveStarRating; ?></div>
                                        </div>
                                        
                                        <div class="pull-left">
                                            <div class="pull-left" style="width:35px; line-height:1;">
                                                <div style="height:9px; margin:5px 0;">4 <span class="glyphicon glyphicon-star"></span></div>
                                            </div>
                                            <div class="pull-left" style="width:180px;">
                                                <div class="progress" style="height:9px; margin:8px 0;">
                                                <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="4" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $fourStarRatingPercent; ?>">
                                                    <span class="sr-only"><?php echo $fourStarRatingPercent; ?></span>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="pull-right" style="margin-left:10px;"><?php echo $fourStarRating; ?></div>
                                        </div>
                                        <div class="pull-left">
                                            <div class="pull-left" style="width:35px; line-height:1;">
                                                <div style="height:9px; margin:5px 0;">3 <span class="glyphicon glyphicon-star"></span></div>
                                            </div>
                                            <div class="pull-left" style="width:180px;">
                                                <div class="progress" style="height:9px; margin:8px 0;">
                                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $threeStarRatingPercent; ?>">
                                                    <span class="sr-only"><?php echo $threeStarRatingPercent; ?></span>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="pull-right" style="margin-left:10px;"><?php echo $threeStarRating; ?></div>
                                        </div>
                                        <div class="pull-left">
                                            <div class="pull-left" style="width:35px; line-height:1;">
                                                <div style="height:9px; margin:5px 0;">2 <span class="glyphicon glyphicon-star"></span></div>
                                            </div>
                                            <div class="pull-left" style="width:180px;">
                                                <div class="progress" style="height:9px; margin:8px 0;">
                                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $twoStarRatingPercent; ?>">
                                                    <span class="sr-only"><?php echo $twoStarRatingPercent; ?></span>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="pull-right" style="margin-left:10px;"><?php echo $twoStarRating; ?></div>
                                        </div>
                                        <div class="pull-left">
                                            <div class="pull-left" style="width:35px; line-height:1;">
                                                <div style="height:9px; margin:5px 0;">1 <span class="glyphicon glyphicon-star"></span></div>
                                            </div>
                                            <div class="pull-left" style="width:180px;">
                                                <div class="progress" style="height:9px; margin:8px 0;">
                                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $oneStarRatingPercent; ?>">
                                                    <span class="sr-only"><?php echo $oneStarRatingPercent; ?></span>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="pull-right" style="margin-left:10px;"><?php echo $oneStarRating; ?></div>
                                        </div>
                                    </div>		
                                    <div class="col-sm-3">
                                        <button type="button" id="rateProduct" class="btn btn-info <?php if(!empty($_SESSION['userid']) && $_SESSION['userid']){ echo 'login';} ?>">Rate this product</button>
                                    </div>		
                                </div>
                                <div class="row">
                                    <div class="col-sm-7">
                                        <hr/>
                                        <div class="review-block">		
                                        <?php
                                        $itemRating = $rating->getItemRating($_GET['itemId']);
                                        foreach($itemRating as $rating){				
                                            $date=date_create($rating['created']);
                                            $reviewDate = date_format($date,"M d, Y");						
                                            $profilePic = "profile.png";	
                                            if($rating['avatar']) {
                                                $profilePic = $rating['avatar'];	
                                            }
                                        ?>				
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <img src="image/userpics/<?php echo $profilePic; ?>" class="img-rounded user-pic">
                                                    <div class="review-block-name">By <a href="#"><?php echo $rating['username']; ?></a></div>
                                                    <div class="review-block-date"><?php echo $reviewDate; ?></div>
                                                </div>
                                                <div class="col-sm-9">
                                                    <div class="review-block-rate">
                                                        <?php
                                                        for ($i = 1; $i <= 5; $i++) {
                                                            $ratingClass = "btn-default btn-grey";
                                                            if($i <= $rating['ratingNumber']) {
                                                                $ratingClass = "btn-warning";
                                                            }
                                                        ?>
                                                        <button type="button" class="btn btn-xs <?php echo $ratingClass; ?>" aria-label="Left Align">
                                                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                        </button>								
                                                        <?php } ?>
                                                    </div>
                                                    <div class="review-block-title"><?php echo $rating['title']; ?></div>
                                                    <div class="review-block-description"><?php echo $rating['comments']; ?></div>
                                                </div>
                                            </div>
                                            <hr/>					
                                        <?php } ?>
                                        </div>
                                    </div>
                                </div>	
                            </div>
                            <div id="ratingSection" style="display:none;">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <form id="ratingForm" method="POST">					
                                            <div class="form-group">
                                                <h4>Rate this product</h4>
                                                <button type="button" class="btn btn-warning btn-sm rateButton" aria-label="Left Align">
                                                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                </button>
                                                <button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
                                                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                </button>
                                                <button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
                                                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                </button>
                                                <button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
                                                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                </button>
                                                <button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
                                                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                </button>
                                                <input type="hidden" class="form-control" id="rating" name="rating" value="1">
                                                <input type="hidden" class="form-control" id="itemId" name="itemId" value="<?php echo $_GET['itemId']; ?>">
                                                <input type="hidden" name="action" value="saveRating">
                                            </div>		
                                            <div class="form-group">
                                                <label for="usr">Title*</label>
                                                <input type="text" class="form-control" id="title" name="title" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="comment">Comment*</label>
                                                <textarea class="form-control" rows="5" id="comment" name="comment" required></textarea>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-info" id="saveReview">Save Review</button> <button type="button" class="btn btn-info" id="cancelReview">Cancel</button>
                                            </div>			
                                        </form>
                                    </div>
                                </div>		
                            </div>
                            <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="loginmodal-container">
                                        <h1>Login to rate this product</h1><br>
                                        <div style="display:none;" id="loginError" class="alert alert-danger">Invalid username/Password</div>
                                        <form method="post" id="loginForm" name="loginForm">
                                            <input type="text" name="user" placeholder="Username" required>
                                            <input type="password" name="pass" placeholder="Password" required>
                                            <input type="hidden" name="action" value="userLogin">
                                            <input type="submit" name="login" class="login loginmodal-submit" value="Login">					 
                                        </form>
                                        <div class="login-help">					
                                            <p><b>User</b> : adam, rose, smith, merry <b>Password</b>: 123</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="col-lg-4 mb-4 hover:bg-primary-75">
                        <h2 class="mx-auto p-4 pt-0 text-primary" style="margin-left: 1rem;">Others Health Solutions</h2>
                        <?php
                            $listitem = new Rating();
                            $itemList = $listitem->getItemList();
                            foreach($itemList as $item){
                                $itemDesc = substr($item['content'], 0, 40).'...';
                                $itemId = $item['itemId'];
                            ?>	
                            
                                <div class="col-lg-12 mb-4 hover:bg-primary-75">
                                    <div class="card">
                                        <img src="<?php echo $item["image"]; ?>" alt="" class="card-img-top">
                                        <div class="card-body">
                                            <h5 class="card-title text-primary"><?php echo $item["category"]; ?></h5>
                                            <p class="card-text font-thin"><?php echo $itemDesc; ?></p>
                                            <a href="<?php echo 'solution.php?category='.$item["category"].'&itemId='.$itemId; ?>" class="btn btn-outline-primary btn-sm">Get Solution</a>
                                            <a class="btn btn-outline-danger btn-sm"><i class="far fa-heart"></i></a>
                                        </div>
                                    </div>
                                </div>
                            
                        <?php } ?>	
                    </div>
                </div>
            </div>
        </section>
    </div><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>Loseit</span></strong>. All Rights Reserved
        </div>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>