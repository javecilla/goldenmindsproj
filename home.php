<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Home - Golden Minds Bulacan</title>
    <?php require_once __DIR__ . '/components/links.php'; ?>
    <style>
      .btt_btn {
        padding: 10px!important;
        border-radius: 50%; 
        background-color: #996515; 
        color: #fff;
        opacity: .6;
      }
      .btt_btn:hover {
        color: #fff;
        opacity: .7;
      }
    </style>
  </head>
  <body>
    <main class="main-content">
      <?php require_once __DIR__ . '/components/header.php'; ?>
      <?php require_once __DIR__ . '/components/navbar.php'; ?>

      <!-- Section carousel -->
      <section id="carousel_section">
        <div class="bd-example">
          <div id="slider_carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#slider_carousel" data-bs-slide-to="0" class="active" ></button>
              <button type="button" data-bs-target="#slider_carousel" data-bs-slide-to="1"  class="" aria-current="true"></button>
              <button type="button" data-bs-target="#slider_carousel" data-bs-slide-to="2"  class="" aria-current="true"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="background hidden-xs" style="background-image: url(resources/images/general/test3.jpg);">
                </div>
                <a href="">
                  <div class="wrapper">
                    <img src="resources/images/general/test3.jpg" class="slider-img img-responsive center-block" width="600" />
                  </div>
                </a>
              </div>

              <div class="carousel-item">
                <div class="background hidden-xs" style="background-image: url(resources/images/general/test8.jpg);">
                </div>
                <a href="">
                  <div class="wrapper">
                    <img src="resources/images/general/test8.jpg" class="slider-img img-responsive center-block" width="600" />
                  </div>
                </a>
              </div>

              <div class="carousel-item">
                <div class="background hidden-xs" style="background-image: url(resources/images/general/test5.jpg);">
                </div>
                <a href="">
                  <div class="wrapper">
                    <img src="resources/images/general/test5.jpg" class="slider-img img-responsive center-block" width="600" />
                  </div>
                </a>
              </div>

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#slider_carousel" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#slider_carousel" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </section> 
      <!-- End section carousel -->
     
      <!-- Start section program offer -->
      <section id="program_offer" class="p-3" style="margin-top: -30px">     
        <div class="row iq-star-inserted row-cols-1 row-cols-md-2 row-cols-lg-3 mb-5 mt-5 text-center">
          <div class="col iq-star-inserted-1">
            <div class="card my-5 shadow-sm" style="border-bottom: 3px solid #996515;">
              <img src="resources/images/general/gmc/elem2.png" class="img-responsive card-img-top" />
              <div class="card-body">
                
                <h3 class="card-title pricing-card-title mb-0 mt-2">Elementary</small></h3>
                <p class="card-text">Golden Minds Offer Elementary program</p>
                <button type="button" class="btn rounded-pill " style="background: #996515; color: #ffffff; font-size: 16px;">Read More</button>
              </div>
            </div>
          </div>

          <div class="col iq-star-inserted-2">
            <div class="card mb-0 shadow-lg" style="border-bottom: 3px solid #996515">
              <img src="resources/images/slider/gmc_test2.jpg" class="img-responsive card-img-top"/>
              <div class="card-body">
                <!-- <h2><span class="badge rounded-pill mb-4 p-2" style="background: #996515;"><small class="text-uppercase px-3">Enroll Now</small></span></h2> -->
                <h3 class="card-title pricing-card-title mb-0 mt-2">Senior High School</small></h3>
                <p class="card-text">Golden Minds Offer Senior High School program</p>
                <button type="button" class="btn rounded-pill" style="background: #996515; color: #ffffff; font-size: 16px;">Enroll Now</button>
              </div>
            </div>
          </div>

          <div class="col iq-star-inserted-3">
            <div class="card my-5 shadow-sm" style="border-bottom: 3px solid #996515;">
              <img src="resources/images/general/test003.jpg" class="img-responsive card-img-top" />
              <div class="card-body">
                <h3 class="card-title pricing-card-title mb-0 mt-2">Junior High School</small></h3>
                <p class="card-text">Golden Minds Offer Junior High School program</p>
                <button type="button" class="btn rounded-pill w-100" style="background: #996515; color: #ffffff; font-size: 16px;">Read More</button>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- End section program -->

      <!-- Start section for announcement and new -->
      <section id="news_and_annoucements">
        <div class="container">
          <div class="row">
            <div class="col-md-8">
              <!--========================-->
              <!--NEWS-->
              <h3 class="text-red">GoldenMinds NEWS</h3><hr />
              <div class="row">    
                <div class="col-xs-12 col-sm-6 col-md-6 ">
                  <div class="news wow fadeInUp">
                    <a href="#">
                      <div class="news_thumbnail card" style="border-bottom: 3px solid #996515;">
                        <img src="resources/images/general/test5.jpg" class="img-responsive news_image bd-placeholder-img card-img-top" width="100" />
                        <div class="card-body news_content">
                          <!-- <span class="date">May 24, 2023</span> -->
                          <span class="badge mb-2" style="background-color: #996515; font-size: 14px; color: #fff; ">May 24, 2023</span>
                          <h5 class="news_title mb-1" style="color: #996515">
                            Athlet News: Aldion A. Flores Winning a Gold Medalist.
                          </h5>
                          <p class="news_description text-dark">Congratulations for winning Gold Medalist for Athletic Secondary Boy's Jump Event Category. Bulacan Provincial Meet</p>
                        </div>
                      </div>
                    </a>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 ">
                  <div class="news wow fadeInUp">
                    <a href="#">
                      <div class="news_thumbnail card" style="border-bottom: 3px solid #996515;">
                        <img src="resources/images/general/test002.jpg" class="img-responsive news_image bd-placeholder-img card-img-top" width="100" />
                        <div class="card-body news_content">
                          <!-- <span class="date">May 24, 2023</span> -->
                          <span class="badge mb-2" style="background-color: #996515; font-size: 14px; color: #fff; ">March 27, 2023</span>
                          <h5 class="news_title mb-1" style="color: #996515">
                            JUST IN: Alexa Nicole Adonis wins 9th place in Tula.
                          </h5>
                        </div>
                      </div>
                    </a>
                  </div>
                </div>
              </div><!--end row-->
              <!--MORE NEWS-->
              <div class="read_more">
                <div class="row">
                  <div class="col-md-12">
                    <a href="#" class="btn float-end" style="background-color: #996515; color: #fff">View More <i class="fa fa-chevron-right fa-fw"></i></a>
                  </div>
                </div>
              </div><br/>
              <!--END OF NEWS-->
              <!--=========================-->
            </div> <!--COL-->

            <div class="col-md-4">
              <!--========================-->
              <!--ANNOUNCEMENTS-->
              <h3 class="text-red">ANNOUNCEMENTS</h3><hr />
              <div class="row">
                <div class="col-md-12 col-sm-6 col-xs-12">
                  <div class="announcement card p-4 wow fadeInUp"
                  style="border-bottom: 3px solid #996515;">
                    <a href="#">
                      <span class="announcement_date badge mb-2" style="background-color: #996515; font-size: 14px; color: #fff; ">May 29, 2023</span>
                      <h5 class="announcement_title">Parent Assembly: GMC - Sta.Maria Bulacan</h5>
                    </a>
                  </div>
                </div>
                <div class="col-md-12 col-sm-6 col-xs-12">
                  <div class="announcement card p-4 wow fadeInUp"
                  style="border-bottom: 3px solid #996515;">
                    <a href="#">
                      <span class="announcement_date badge mb-2" style="background-color: #996515; font-size: 14px; color: #fff; ">May 22, 2023</span>
                      <h5 class="announcement_title">Graduation Pictorial: All Golden Minds Campuses</h5>
                    </a>
                  </div>
                </div>
              </div>
              <!--MORE ANNOUNCEMENTS-->
              <div class="read_more">
                <div class="row">
                  <div class="col-md-12">
                    <a href="#" class="btn float-end" style="background-color: #996515; color: #fff">View More <i class="fa fa-chevron-right fa-fw"></i></a>
                  </div>
                </div>
              </div>
              <!--END OF ANNOUNCEMENTS-->
              <!--========================-->
            </div>
          </div>
        </div> <!--CONTAINER-->
      </section>
      <hr/>

      <div id ="back-to-top" style="display: none;">
        <a class="p-0 btn btn-xs position-fixed top btt_btn" id="top" href="#top">
          <i class="fa-solid fa-chevron-up" style="font-size: 20px"></i>
        </a>
      </div>

      <?php require_once __DIR__ . '/components/footer.php'; ?>
    </main>

  
    <script defer type="text/javascript">
      // To show more details for specific news
      const newsThumbnail = document.querySelector(".news_thumbnail");
      const newsDescription = document.querySelector(".news_description");

      newsThumbnail.addEventListener("mouseover", () => {
        newsDescription.style.display = "block";
      });

      newsThumbnail.addEventListener("mouseout", () => {
        newsDescription.style.display = "none";
      });
    </script>
  </body>
</html>