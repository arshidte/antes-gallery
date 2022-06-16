<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Antes | Gallery</title>
    <!--Animation-->
    <link rel="stylesheet" href="assets/css/base.css">
    <!--Animation-->
    <link rel="stylesheet" href="assets/css/gallery.css">
    <link rel="stylesheet" href="assets/css/style.css">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400&display=swap" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" /> -->
    <link href="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css" rel="stylesheet" />
    <script type="text/javascript" src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js" defer data-deferred="1"></script>
    <!-- <link href="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css" rel="stylesheet" /> -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" rel="stylesheet"> -->
    
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- Country phone codes -->
    <link rel="stylesheet" href="assets/css/intlTelInput.css">

    <!--Animation-->
    <script>
        document.documentElement.className = "js";
        var supportsCssVars = function() {
            var e, t = document.createElement("style");
            return t.innerHTML = "root: { --tmp-var: bold; }", document.head.appendChild(t), e = !!(window.CSS && window.CSS.supports && window.CSS.supports("font-weight", "var(--tmp-var)")), t.parentNode.removeChild(t), e
        };
        supportsCssVars() || alert("Please view this demo in a modern browser that supports CSS Variables.");
    </script>
    <!--Animation-->

</head>

<body>
    <!-- header section starts here -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="assets/images/logo.svg" alt="logo" class="logo" /></a>

            <span class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon bg-transparent"></span>
            </span>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <ul class="navbar-nav mr-auto w-100 justify-content-end nav-pills">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="products.php">Products </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="gallery.php">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link bg-light" href="contact.php">Contact us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    
    <!--about banner section starts here-->
    <section class="about-banner">
        <div class="about-sec">
            <div>
                <h1 class="about-title">
                    Gallery
                </h1>
            </div>
            <div class="">
                <img src="assets/images/about-bear-image.png" class="about-bear-image" alt="">
            </div>
        </div>
    </section>
    <!--Banner section ends here-->

     <?php 
     include_once './Includes/dbh.inc.php';

            $sql = "SELECT * FROM gallery GROUP BY UID HAVING COUNT(UID)>1";
            
            $result = $conn->query($sql);
        
                 while ($row = mysqli_fetch_assoc($result)) {
                     $date = date('d-m-Y',strtotime($row['date']));
                     $UID = $row['UID'];
                     echo "<div class='container'>
                     <div class='galleryItem border px-3 my-3 py-2' style='box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;'>
                         <h4>".$row['title']."</h4>
                         <p>".$row['description']."</p>
                         <div class='d-flex'>
                             <span>".$date." | </span>
                             <span>&nbsp;".$row['location']."</span>
                         </div>
                         <hr>";
                         
                        //  Primary details ends here
                         
                             $query = "SELECT imgName FROM gallery WHERE UID='$UID'";
                         
                             $query_run = mysqli_query($conn, $query);

                             $imgArr = array();
                             while($row = mysqli_fetch_array($query_run)){
                                 $imgArr[] = $row['imgName'];
                                }
                                    echo "<div class='galleryImagesBig'>
                                    <a href='#' class='text-decoration-none' data-toggle='modal' data-target='#modalId' data-gallery='".$UID."'>
                                    <div class='galleryImg1Div'>
                                    <img class='galleryImg1' src='gallery/".$imgArr[2]."' alt='' srcset=''>
                                    </div>
                                   </a>
                                   <a href='#' class='text-decoration-none' data-toggle='modal' data-target='#modalId'>
                                        <div class='galleryImg2Div'>
                                        <img class='galleryImg1' src='gallery/".$imgArr[1]."' alt='' srcset=''>
                                        </div>
                                    </a>
                                    <a href='#' class='text-decoration-none' data-toggle='modal' data-target='#modalId'>
                                    <div class='galleryImg3Div'>
                                    <img class='galleryImg1' src='gallery/".$imgArr[0]."' alt='' srcset=''>
                                    </div>
                                    </a>
                                    <a href='#' class='text-decoration-none' data-toggle='modal' data-target='#modalId'>
                                    <div class='galleryImg2Div'>
                                        <img class='galleryImg1' src='gallery/".$imgArr[3]."' alt='' srcset=''>
                                    </div>
                                    </a>
                                    <a href='#' class='text-decoration-none' data-toggle='modal' data-target='#modalId'>
                                    <div class='galleryImg1Div'>
                                    <img class='galleryImg1' src='gallery/".$imgArr[4]."' alt='' srcset=''>
                                    </div>
                                    </a>
                                    </div>

                                    <a href='#' class='text-decoration-none' data-toggle='modal' data-target='#modalId'>
                                    <div class='galleryImageSmall'>
                                    <img class='gallerySmall img-fluid' src='gallery/".$imgArr[0]."' alt='' srcset=''>
                                    <div class='bg-dark text-white'>Click to see more images</div>
                                    </div>
                                    </a>
                                    </div>
                                </div>";
                            
                                echo "<!-- Modal starts here -->
        
                                <div class='modal fade' id=modalId tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                        <div class='modal-dialog'>
                                            <div class='modal-content'>
                                                <div class='modal-header'>
                                                    <button type='button' class='close closeButton' data-dismiss='modal' aria-label='Close'>
                                                        <span aria-hidden='true'>&times;</span>
                                                    </button>
                                                </div>
                                                <div class='modal-body'>
                                                <input type='hidden' name='UID' value=''>
                                                   <div id='carouselExampleControls' class='carousel slide' data-bs-ride='carousel'>
                                                        <div class='carousel-inner'>
                                                            <div class='carousel-item active'>
                                                                <img src='gallery/".$imgArr[0]."' class='d-block item1' style='width: 100%;' alt='' />
                                                            </div>
                                                            <div class='carousel-item'>
                                                                <img src='gallery/".$imgArr[1]."' class='d-block item2' style='width: 100%;' alt='' />
                                                            </div>
                                                            <div class='carousel-item'>
                                                                <img src='gallery/".$imgArr[2]."' class='d-block item3' style='width: 100%;' alt='' />
                                                            </div>
                                                            <div class='carousel-item'>
                                                                <img src='gallery/".$imgArr[3]."' class='d-block item4' style='width: 100%;' alt='' />
                                                            </div>
                                                            <div class='carousel-item'>
                                                                <img src='gallery/".$imgArr[4]."' class='d-block item5' style='width: 100%;' alt='' />
                                                            </div>
                                                       </div>
                      
                                                <button class='carousel-control-prev' type='button' data-bs-target='#carouselExampleControls' data-bs-slide='prev'>
                                                    <span class='carousel-control-prev-icon' aria-hidden='true'></span>
                                                    <span class='visually-hidden'>Previous</span>
                                                </button>
                      
                                                <button class='carousel-control-next' type='button' data-bs-target='#carouselExampleControls' data-bs-slide='next'>
                                                    <span class='carousel-control-next-icon' aria-hidden='true'></span>
                                                    <span class='visually-hidden'>Next</span>
                                                </button>
                      
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              
                            </div>
                      
                            </div>";
                            
                        }
                        
                          ?>

                          <script>
                            $('#modalId').on('show.bs.modal', function(e) {
                            var UID = $(e.relatedTarget).data('gallery');
                            $(e.currentTarget).find('input[name="UID"]').val(UID);
                                });
                          </script>

    <!-- footer section stylings starts here -->
    <div class="footer">
        <div class="footer-section row align-items-center">
            <div class="footer-section-one  col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4">
                <div class="footer-logo">
                    <img src="assets/images/footer-logo.svg" alt="">
                </div>
            </div>
            <div class="footer-section-one  col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4">
                <div class="footer-icons">
                    <ul class="footer-icon-list">
                        <li>Follow Us</li>
                        <li>
                            <a href=""><img src="assets/images/facebook.svg" alt=""></a>
                        </li>
                        <li>
                            <a href=""><img src="assets/images/youtube.svg" alt=""></a>
                        </li>
                        <li>
                            <a href=""><img src="assets/images/linkden.svg" alt=""></a>
                        </li>
                        <li>
                            <a href=""><img src="assets/images/insta.svg" alt=""></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-section row">

            <div class="footer-section-two col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4">
                <!-- <div class=""> -->
                <!-- <div class="form-one" data-aos-duration="1200" data-aos="slide-up"> -->
                    <div class="countryCards">
                    <div class="card">
                        <div class="card-body">
                            <span> <img style="width: 20px;" src="assets/images/ind-logo.svg" alt="">  <span class="india m-3 text-white">India</span></span>
                            <hr class="text-white">
                          <div class="row justify-content-around ">
                              <span> <img style="width: 20px;" src="assets/images/location.svg" alt="">  <span class="address m-3 text-white ">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt  ut labore et</span></span>
                          </div>
                          <div class="mb-3 mt-3">
                            <span> <img style="width: 20px;" src="assets/images/call-icon.png" alt="">  <span class="call m-3 text-white">info@antes.com</span></span>
                        </div>
                        <div>
                            <span> <img style="width: 20px;" src="assets/images/mail-icon.png" alt="">  <span class="mail m-3 text-white">+91 9876 543 210</span></span>
                        </div>
                        </div>
                      </div>
                    </div>
            </div>

            <div class="footer-section-two col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4">
                <!-- <div class=""> -->
                <!-- <div class="form-one" data-aos-duration="1200" data-aos="slide-up"> -->
                    <div class="countryCards">
                    <div class="card">
                        <div class="card-body">
                            <span> <img style="width: 20px;" src="assets/images/country-2.png" alt="">  <span class="india m-3 text-white">Doha</span></span>
                            <hr class="text-white">
                          <div class="row justify-content-around ">
                              <span> <img style="width: 20px;" src="assets/images/location.svg" alt="">  <span class="address m-3 text-white ">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt  ut labore et</span></span>
                          </div>
                          <div class="mb-3 mt-3">
                            <span> <img style="width: 20px;" src="assets/images/call-icon.png" alt="">  <span class="call m-3 text-white">info@antes.com</span></span>
                        </div>
                        <div>
                            <span> <img style="width: 20px;" src="assets/images/mail-icon.png" alt="">  <span class="mail m-3 text-white">+91 9876 543 210</span></span>
                        </div>
                        </div>
                      </div>
                    </div>
            </div>

            <div class="footer-section-two col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4">
                <!-- <div class=""> -->
                <!-- <div class="form-one" data-aos-duration="1200" data-aos="slide-up"> -->
                    <div class="countryCards">
                    <div class="card">
                        <div class="card-body">
                            <span> <img style="width: 20px;" src="assets/images/country-3.png" alt="">  <span class="india m-3 text-white">Singapore</span></span>
                            <hr class="text-white">
                          <div class="row justify-content-around ">
                              <span> <img style="width: 20px;" src="assets/images/location.svg" alt="">  <span class="address m-3 text-white ">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt  ut labore et</span></span>
                          </div>
                          <div class="mb-3 mt-3">
                            <span> <img style="width: 20px;" src="assets/images/call-icon.png" alt="">  <span class="call m-3 text-white">info@antes.com</span></span>
                        </div>
                        <div>
                            <span> <img style="width: 20px;" src="assets/images/mail-icon.png" alt="">  <span class="mail m-3 text-white">+91 9876 543 210</span></span>
                        </div>
                        </div>
                      </div>
                    </div>
            </div>
        </div>

        <div class="footer-section mt-5 row">
            <div class="footer-section-three three col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                <form action="Includes/contact-mail.php" method="post">
                <?php
                  $url = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
                  echo "<input hidden type='text' value='$url' class='form-control' name='url'/>"; 
                ?>
                <div class="mb-4">
                    <input type="text" class="form-control contactForm w-100" id="firstname" name="firstname" placeholder="First Name" />
                </div>
                <div class="mb-4">
                    <input type="text" class="form-control contactForm w-100" id="lastname" name="lastname" placeholder="Last Name" />
                </div>
                <div class="mb-4">
                        <input type="tel" class="form-control contactForm w-100" id="phone" name="phone" placeholder="Phone" />
                </div>
                <div class="mb-4">
                    <input type="email" class="form-control contactForm w-100" id="email" name="email" placeholder="Email" />
                </div>
                <div class="mb-4">
                </div>
            </div>
            <div class="footer-section-three three col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">

                <div class="mb-4 col-12 col-sm-12 col-md-12">
                    <input type="text" class="form-control contactForm w-100" id="exampleFormControlInput1" name="middlename" placeholder="Middle Name" />
                </div>
                <div class="mb-3">
                    <textarea class="form-control contactForm w-100 form-input" id="exampleFormControlTextarea1" rows="3" name="message" placeholder="Comment Or Message"></textarea>
                </div>
            </div>
        </div>

        <?php 
        if(isset($_GET["status"])) {
            if($_GET["status"] == "emptyfield") {
                echo "<h6 class='text-danger mt-3'>Fill in all the fields!</h6>";
            }
            else if($_GET["status"] == "success_sent") {
                echo "<h6 class='text-success mt-3'>Successfully sent</h6>";
            }
            else if($_GET["status"] == "error") {
                echo "<h6 class='text-danger mt-3'>Some error occured! Try again.</h6>";
            }
        }
         ?>
        <div class="footer-section row">

            <ul class="footer-menu d-flex justify-content-center">
                <li><a href="#banner">About</a></li>
                <li><a href="#products">Products</a></li>
                <li><a href="#why-us">why us</a></li>
                <li><a href="#clients">Clients</a></li>
                <li><a href="#footer">Contact</a></li>
                <button class="submit" name="submit">Submit Now</button>
    </form>
            </ul>
        </div>

        <div class="copywrite d-flex justify-content-center ">
            <h3 class="copy-text">© 2022 Antes . All rights reserved.</h3>
            <a href="https://inbounderz.com" target="_blank " class=" design text-decoration-none text-white"> Designed By Inbounderz</a>
        </div>
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <a href="https://api.whatsapp.com/send/?phone=919876543210&text&app_absent=0" class="float" target="_blank">
            <i class="fa fa-whatsapp my-float"></i>
            <p class="ttoltip">For Your Orders</p>
            <div class="ttoltip-pop"></div>
        </a> -->

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


        <script src="assets/js/index.js"></script>


        <script src=" https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js " integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p " crossorigin="anonymous "></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js " integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF " crossorigin="anonymous "></script>


        <!--Animation scripts-->
        <script src="assets/js/imagesloaded.pkgd.min.js"></script>
        <script src="assets/js/charming.min.js"></script>
        <script src="assets/js/TweenMax.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
        <script src="assets/js/demo.js"></script>
        <!--Animation scripts-->

        <!-- Country phone codes -->
        <script src="assets/js/intlTelInput.js"></script>
        <script>
    // Vanilla Javascript
    var input = document.querySelector("#phone");
    window.intlTelInput(input,({
      // options here
    }));

    $(document).ready(function() {
        $('.iti__flag-container').click(function() { 
          var countryCode = $('.iti__selected-flag').attr('title');
          var countryCode = countryCode.replace(/[^0-9]/g,'')
          $('#phone').val("");
          $('#phone').val("+"+countryCode+" "+ $('#phone').val());
       });
    });
  </script>
</body>

</html>