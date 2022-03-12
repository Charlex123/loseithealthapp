<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Loseit - Health Check</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

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
                <h3 class="jumbotron mx-auto text-center m-4 p-2">Let's Help You Get Better</h3>
                <div class="row">
                    <?php
                        // include 'inc/menu.php';
                        include 'class/Rating.php';
                        $listitem = new Rating();
                        $itemList = $listitem->getItemList();
                        foreach($itemList as $item){
                            $itemDesc = substr($item['content'], 0, 40).'...';
                            $itemId = $item['itemId'];
                        ?>	
                        
                            <div class="col-lg-4 mb-4 hover:bg-primary-75">
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
                <div class="row">
                    <div class="col-lg-4 mb-4 hover:bg-primary-75">
                        <div class="card">
                            <img src="assets/img/depression.jpg" alt="" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title text-primary">Depression</h5>
                                <p class="card-text">Depression is a fatal health ...</p>
                                <a href="solution.php/depression" class="btn btn-outline-primary btn-sm">Get Solution</a>
                                <a class="btn btn-outline-danger btn-sm"><i class="far fa-heart"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4 hover:bg-primary-75">
                        <div class="card">
                            <img src="assets/img/stress.jpg" alt="" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title text-primary">Stress</h5>
                                <p class="card-text">Stress is a state of been ...</p>
                                <a href="solution.php/stress" class="btn btn-outline-primary btn-sm">Get Solution</a>
                                <a class="btn btn-outline-danger btn-sm"><i class="far fa-heart"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4 hover:bg-primary-75">
                        <div class="card">
                            <img src="assets/img/anxiety.jpg" alt="" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title text-primary">Anxiety</h5>
                                <p class="card-text">A feeling of pressure and ...</p>
                                <a href="solution.php/anxiety" class="btn btn-outline-primary btn-sm">Get Solution</a>
                                <a class="btn btn-outline-danger btn-sm"><i class="far fa-heart"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4 hover:bg-primary-75">
                        <div class="card">
                            <img src="assets/img/self-esteem.jpg" alt="" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title text-primary">Self Esteem</h5>
                                <p class="card-text">A very important trait in ...</p>
                                <a href="solution.php/self-esteem" class="btn btn-outline-primary btn-sm">Get Solution</a>
                                <a  class="btn btn-outline-danger btn-sm"><i class="far fa-heart"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4 hover:bg-primary-75">
                        <div class="card">
                            <img src="assets/img/anger.jpg" alt="" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title text-primary">Anger</h5>
                                <p class="card-text">Anger kills and hurts it's ...</p>
                                <a href="solution.php/anger" class="btn btn-outline-primary btn-sm">Get Solution</a>
                                <a class="btn btn-outline-danger btn-sm"><i class="far fa-heart"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4 hover:bg-primary-75">
                        <div class="card">
                            <img src="assets/img/relationship.jpg" alt="" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title text-primary">Relationships</h5>
                                <p class="card-text">Is a good thing to fall in ...</p>
                                <a href="solution.php/relationships" class="btn btn-outline-primary btn-sm">Get Solution</a>
                                <a class="btn btn-outline-danger btn-sm"><i class="far fa-heart"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4 hover:bg-primary-75">
                        <div class="card">
                            <img src="assets/img/grief.jpg" alt="" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title text-primary">Grief</h5>
                                <p class="card-text">Is normal to but dut don't ...</p>
                                <a href="solution.php/grief" class="btn btn-outline-primary btn-sm">Get Solution</a>
                                <a class="btn btn-outline-danger btn-sm"><i class="far fa-heart"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4 hover:bg-primary-75">
                        <div class="card">
                            <img src="assets/img/eatingds.jpg" alt="" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title text-primary">Eating Disorder</h5>
                                <p class="card-text">Hahaha, everybody loves food ...</p>
                                <a href="solution.php/eatingds" class="btn btn-outline-primary btn-sm">Get Solution</a>
                                <a class="btn btn-outline-danger btn-sm"><i class="far fa-heart"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4 hover:bg-primary-75">
                        <div class="card">
                            <img src="assets/img/borderline-ds.jpg" alt="" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title text-primary">Borderline Personality</h5>
                                <p class="card-text">Personality changes and ...</p>
                                <a href="solution.php/borderline-ds" class="btn btn-outline-primary btn-sm">Get Solution</a>
                                <a class="btn btn-outline-danger btn-sm"><i class="far fa-heart"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4 hover:bg-primary-75">
                        <div class="card">
                            <img src="assets/img/mental-health.jpg" alt="" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title text-primary">Mental Health</h5>
                                <p class="card-text">Mental health and stability is ...</p>
                                <a href="solution.php/mental-health" class="btn btn-outline-primary btn-sm">Get Solution</a>
                                <a class="btn btn-outline-danger btn-sm"><i class="far fa-heart"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4 hover:bg-primary-75">
                        <div class="card">
                            <img src="assets/img/others.jpg" alt="" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title text-primary">Others</h5>
                                <a href="" class="btn btn-outline-primary btn-sm">See More</a>
                            </div>
                        </div>
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