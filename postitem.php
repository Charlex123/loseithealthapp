<?php
session_start();
include 'class/Rating.php';
$con = mysqli_connect("localhost","root","","phpzag_demos");
if (mysqli_connect_errno()) {
echo "Unable to connect to MySQL! ". mysqli_connect_error();
}
if (isset($_POST['category']) && isset($_POST['title']) && isset($_POST['content'])) {
$target_dir = "Uploads/";
$target_file = $target_dir . date("dmYhis") . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
 
if($imageFileType != "jpg" || $imageFileType != "png" || $imageFileType != "jpeg" || $imageFileType != "gif" ) {
if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
$files = date("dmYhis") . basename($_FILES["file"]["name"]);
}else{
echo "Error Uploading File";
exit;
}
}else{
echo "File Not Supported";
exit;
}
$filename = $_FILES["file"]["name"];
$title = $_POST['title'];
$category = $_POST['category'];
$content = $_POST['content'];
$itemId = rand(0000000000,9999999999);
$location = "Uploads/" . $files;
$sqli = "INSERT INTO `item` (`itemId`, `title`, `category`, `content`, `image`) VALUES ('{$itemId}','{$title}','{$category}','{$content}','{$location}')";
$result = mysqli_query($con,$sqli);
if ($result) {
echo "File has been uploaded";
};
}
?>
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
  <script src="https://cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>

</head>

<body>
  <script type="text/javascript">
    function googleTranslateElementInit() {
      new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
    }
    </script>
  
  

  <div id="">
        <div style="clear:both"></div>
        
        
        </section><!-- End Why Us Section -->
        
        <section id="gallery" class="services">
            <div class="container">
                <h3 class="jumbotron mx-auto text-center m-4 p-2">Post Symptom To Database</h3>
                <div class="form-body">
                    <div class="row">
                        <div class="form-holder">
                            <div class="form-content">
                                <div class="form-items">
                                    <form class="requires-validation" method="POST" novalidate enctype='multipart/form-data'>

                                        <div class="col-md-12 mt-3 m-4 p-4">
                                            <input class="form-control" type="text" name="title" value="<?php echo @$_POST['title'];?>" placeholder="Title" required>
                                            
                                        </div>

                                        <div class="col-md-12 mt-3 m-4 p-4">
                                            <input class="form-control" type="text" name="category" value="<?php echo @$_POST['category'];?>" placeholder="Category" required>
                                        </div>

                                        <div class="col-md-12 mt-3 m-4 p-4">
                                            <label class="mb-3 mr-1" for="gender">Content </label>
                                            <textarea class="form-control" name="content" id="content"></textarea>
                                        </div>

                                        <div class="col-md-12 mt-3 m-4 p-4">
                                            <label class="mb-3 mr-1" for="gender">Upload Image</label><br/>
                                            <input type="file" id="image" name="file">
                                        </div>

                                        <div class="form-button mt-3 m-4 p-4">
                                            <button id="submit" type="submit" class="btn btn-primary btn-lg">Post</button>
                                        </div>
                                    </form>
                                </div>
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
    <script>
        CKEDITOR.replace( 'content' );
    </script>
</body>

</html>