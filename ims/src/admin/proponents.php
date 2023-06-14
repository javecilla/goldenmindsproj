<?php
session_start();
require_once __DIR__ . '/config/db.connection.php';
require_once __DIR__ . '/app/check_user.php';
ini_set('display_errors',  1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <title>GMCIS | Proponents</title>
    <link rel="icon" type="image/png" href="resources/images/system-photo/gmc.favicon.png" sizes="16x16" />

    <?php require_once __DIR__ . '/components/css.file-links.inc.php';?>
    <style type="text/css">
      .card {
        margin: 0 auto;
        border: none;
      }
      .card .carousel-item {
        min-height: 190px;
      }
      .card .carousel-caption {
        padding: 0;
        right: 15px;
        left: 15px;
        top: 15px;
        color: #3d3d3d;
        border: 1px solid #ccc;
        min-height:175px;
        padding: 15px;
      }
      .card .carousel-caption .col-sm-3 {
        display: flex;
        align-items: center;
      }
      .card .carousel-caption .col-sm-9 {
        text-align: left;
      }
      .card .carousel-control-prev, .card .carousel-control-next {
        color: #EB984E !important;
        opacity: 1 !important;
      }
      .carousel-control-prev-icon, .carousel-control-next-icon {
        background-image: none;
        color: #fff;
        font-size: 14px;
        background-color: #EB984E;
        height: 32px;
        line-height: 32px;
        width: 32px;
      }
      .carousel-control-prev-icon:hover, .carousel-control-next-icon:hover {
        opacity: 0.85;
      }
      .carousel-control-prev {
        left: 40%;
        top: 110%;
      }
      .carousel-control-next {
        right: 40%;
        top: 110%;
      }
      .midline {
        width: 60px;
        border-top: 1px solid #d43025;
      }
      .carousel-caption h2 {
        font-size: 14px;
      }
      .carousel-caption h2 span {
        color: #E67E22
      }
       @media (min-width: 320px) and (max-width: 575px) {
        .carousel-caption {
          position: relative;
        }
        .card .carousel-caption {
          left: 0;
          top: 0;
          margin-bottom: 15px;
        }
        .card .carousel-caption img {
          margin: 0 auto;
        }
        .carousel-control-prev {
          left: 35%;
          top: 105%;
        }
        .carousel-control-next {
          right: 35%;
          top: 105%;
        }
        .card .carousel-caption h3 {
          margin-top: 0;
          font-size: 16px;
          font-weight: 700;
        }
      }
      @media (min-width: 576px) and (max-width: 767px) {
        .carousel-caption {
          position: relative;
        }
        .card .carousel-caption {
          left: 0;
          top: 0;
          margin-bottom: 15px;
        }
        .card .carousel-caption img {
          margin: 0 auto;
        }
        .card .carousel-caption h3, .card .carousel-caption small {
          text-align: center;
        }
        .carousel-control-prev {
          left: 35%;
          top: 105%;
        }
        .carousel-control-next {
          right: 35%;
          top: 105%;
        }
      }
      @media (min-width: 767px) and (max-width: 991px) {
        .card .carousel-caption h3 {
          margin-top: 0;
          font-size: 16px;
          font-weight: 700;
        }
      }
    </style>
  </head>
  <body style="background: url('resources/images/system-photo/gmc-bg.png');">
   <?php require_once __DIR__ . '/components/ui.side-nav.php';?>
    <?php require_once __DIR__ . '/components/ui.top-nav.php';?>

    <div class="content-wrap">
      <div class="main">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-8 p-r-0 title-margin-right">
              <div class="page-header">
                <div class="page-title">
                  <h6 class="clock m-t-30"><?php echo date("M-d-Y")?> / <?php echo date(" h: i A");?></h6>
                </div> 
              </div> 
            </div>

            <div class="col-lg-4 p-l-0 title-margin-left">
              <div class="page-header">
                <div class="page-title">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item" style="margin-left: -100px;">
                      <a href="proponents" class="active"> Proponents Profile </a>
                    </li>
                    <li class="breadcrumb-item">Dashboard</li>
                  </ol>
                </div>
              </div>
            </div>     
          </div> <!--end row-->

          <!-- start main content -->
          <section class="pb-5" id="main-content">
            <div class="container">
              <h2 class="text-center">Research Team</h2>
              <hr class="midline">
              <h5 class="text-center mb-5">Researcher from GMC Sta.Maria-Branch</h5>
              <div class="card col-md-12 mt-2" >
                <div id="researchTeam" class="carousel slide" data-ride="carousel" data-interval="100000">
                  <div class="w-100 carousel-inner mb-5" role="listbox" >
                    <!-- 1st carousel -->
                    <div class="carousel-item active">
                      <div class="bg" ></div>
                      <div class="row">
                        <!-- JEROME AVECILLA -->
                        <div class="col-md-6">
                          <div class="carousel-caption">
                            <div class="row">
                              <div class="col-sm-3 col-4 align-items-start">
                                <img src="resources/images/system-photo/proponents/jerome.jpg" width="100" 
                                class="img-responsive  img-fluid" />
                              </div>
                              <div class="col-sm-9 col-8">
                                <h2>Jerome Avecilla - <span>Leader & Programmer</span></h2>
                                <small>
                                  As the research leader, my responsibilities include guiding the team towards achieving project goals, ensuring collaborative and efficient teamwork, and providing clear communication and direction. Additionally, as a programmer, I am responsible for writing a code and developing the website's inventory system.
                                </small>
                                <small class="smallest mute"></small>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- CEDRIC RESSURRECION -->
                        <div class="col-md-6">
                          <div class="carousel-caption">
                            <div class="row">
                              <div class="col-sm-3 col-4 align-items-start">
                                <img src="resources/images/system-photo/proponents/cedric.jpg" width="100" 
                                class="img-responsive  img-fluid" />
                              </div>
                              <div class="col-sm-9 col-8">
                                <h2>Cedric Resurreccion - <span>System Analyst #1</span></h2>
                                <small>
                                  System analyst in our research group, i am responsible for analyzing user requirements, identifying potential issues, testing and validation, and continuously improving the system. 
                                </small>
                                <small class="smallest mute"></small>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div> 
                    </div>

                    <!-- 2nd carousel -->
                    <div class="carousel-item">
                      <div class="bg"></div>
                      <div class="row">
                        <!-- PRINCE KEN LUMUNGSOD -->
                        <div class="col-md-6 col-12">
                          <div class="carousel-caption">
                            <div class="row">
                              <div class="col-sm-3 col-4 align-items-start">
                                <img src="resources/images/system-photo/proponents/prince_ken.jpg" width="100" 
                                class="img-responsive  img-fluid" />
                              </div>
                              <div class="col-sm-9 col-8">
                                <h2>Prince Lumungsod - <span>System Analyst #2</span></h2>
                                <small>
                                  I am responsible for designing system architecture, identifying documenting system specifications, testing and validation, We are work together with Cedric closely with stakeholders and the development team to ensure that the system meets user requirements and functions correctly.
                                </small>
                                <small class="smallest mute"></small>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- JAY CAMBI -->
                        <div class="col-md-6 col-12">
                          <div class="carousel-caption">
                            <div class="row">
                              <div class="col-sm-3 col-4 align-items-start">
                                <img src="resources/images/system-photo/proponents/jay-cambi.jpg" width="100" 
                                class="img-responsive  img-fluid" />
                              </div>
                              <div class="col-sm-9 col-8">
                                <h2>Jay Cambi - <span>Research Coordinator</span></h2>
                                <small>
                                  As the research coordinator for my group, i am plays a crucial role in ensuring the success of the research project. Provide valuable input regarding study design and methods, working closely with the team to ensure that the research is conducted in an efficient and effective manner.
                                </small>
                                <small class="smallest mute"></small>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- 3rd carousel -->
                    <div class="carousel-item">
                      <div class="bg"></div>
                      <div class="row">
                        <!-- ERWIN DAGOC -->
                        <div class="col-md-6 col-12">
                          <div class="carousel-caption">
                            <div class="row">
                              <div class="col-sm-3 col-4 align-items-start">
                                <img src="resources/images/system-photo/proponents/erwin.jpg" width="100" 
                                class="img-responsive  img-fluid" />
                              </div>
                              <div class="col-sm-9 col-8">
                                <h2>Erwin Dagoc - <span>Research Documentation</span></h2>
                                <small>
                                  As research documentation in my research group, i am responsible for creating and maintaining accurate, detailed, and up-to-date documentation related to the research project, including research protocols, informed consent forms, study manuals, data collection forms, and standard operating procedures.
                                </small>
                                <small class="smallest mute"></small>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- MAUREEN MAHOR -->
                        <div class="col-md-6 col-12">
                          <div class="carousel-caption">
                            <div class="row">
                              <div class="col-sm-3 col-4 align-items-start">
                                <img src="resources/images/system-photo/proponents/mahor.jpg" width="100" 
                                class="img-responsive  img-fluid" />
                              </div>
                              <div class="col-sm-9 col-8">
                                <h2>Maureen Mahor - <span>Research Assistant</span></h2>
                                <small>
                                  As a research assistant in the group, a im participate in the development of data analysis, including the creation of system documentation and writing transcripts. i also is responsible for accurately recording and organizing research data, and for conducting preliminary analysis to help identify patterns of data.
                                </small>
                                <small class="smallest mute"></small>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- 4th carousel -->
                    <div class="carousel-item">
                      <div class="bg"></div>
                      <div class="row">
                        <!-- RIAH JANE BASANTA -->
                        <div class="col-md-6 col-12">
                          <div class="carousel-caption">
                            <div class="row">
                              <div class="col-sm-3 col-4 align-items-start">
                                <img src="resources/images/system-photo/proponents/basanta.jpg" width="100" 
                                class="img-responsive  img-fluid" />
                              </div>
                              <div class="col-sm-9 col-8">
                                <h2>Riah Jane Basanta - <span>Contributor</span></h2>
                                <small>
                                  As Contributor in our research group i provides input and support to the project without assuming a formal leadership role.I have specialized knowledge or expertise relevant to the project or simply have a general interest in making a contribution. Participate in various aspects of the project.
                                </small>
                                <small class="smallest mute"></small>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- JASMIN RAYTANA -->
                        <div class="col-md-6 col-12">
                          <div class="carousel-caption">
                            <div class="row">
                              <div class="col-sm-3 col-4 align-items-start">
                                <img src="resources/images/system-photo/proponents/raytana.jpg" width="100" 
                                class="img-responsive  img-fluid" />
                              </div>
                              <div class="col-sm-9 col-8">
                                <h2>Jasmin Raytana - <span>Contributor</span></h2>
                                <small>
                                  As Contributor in our research group i provides input and support to the project without assuming a formal leadership role.I have specialized knowledge or expertise relevant to the project or simply have a general interest in making a contribution. Participate in various aspects of the project.
                                </small>
                                <small class="smallest mute"></small>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- 5th carousel-->
                    <div class="carousel-item">
                      <div class="bg"></div>
                      <div class="row">
                        <!--JAY CASTRO-->
                        <div class="col-md-6 col-12">
                          <div class="carousel-caption">
                            <div class="row">
                              <div class="col-sm-3 col-4 align-items-start">
                                <img src="resources/images/system-photo/proponents/castro.jpg" width="100" 
                                class="img-responsive  img-fluid" />
                              </div>
                              <div class="col-sm-9 col-8">
                                <h2>Jay Castro - <span>Contributor</span></h2>
                                <small>
                                  As Contributor in our research group i provides input and support to the project without assuming a formal leadership role.I have specialized knowledge or expertise relevant to the project or simply have a general interest in making a contribution. Participate in various aspects of the project.
                                </small>
                                <small class="smallest mute"></small>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- JED LANGUIDO -->
                        <div class="col-md-6 col-12">
                          <div class="carousel-caption">
                            <div class="row">
                              <div class="col-sm-3 col-4 align-items-start">
                                <img src="resources/images/system-photo/proponents/jed.jpg" width="100" 
                                class="img-responsive  img-fluid" />
                              </div>
                              <div class="col-sm-9 col-8">
                                <h2>Jed Languido - <span>Contributor</span></h2>
                                <small>
                                  As Contributor in our research group i provides input and support to the project without assuming a formal leadership role.I have specialized knowledge or expertise relevant to the project or simply have a general interest in making a contribution. Participate in various aspects of the project.
                                </small>
                                <small class="smallest mute"></small>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- 6th carousel -->
                    <div class="carousel-item">
                      <div class="bg"></div>
                      <div class="row">
                        <!--CARLO RESURRECCION-->
                        <div class="col-md-6 col-12">
                          <div class="carousel-caption">
                            <div class="row">
                              <div class="col-sm-3 col-4 align-items-start">
                                <img src="resources/images/system-photo/proponents/default.jpg" width="100" 
                                class="img-responsive  img-fluid" />
                              </div>
                              <div class="col-sm-9 col-8">
                                <h2>Carlo Resurreccion - <span>Contributor</span></h2>
                                <small>
                                  As Contributor in our research group i provides input and support to the project without assuming a formal leadership role.I have specialized knowledge or expertise relevant to the project or simply have a general interest in making a contribution. Participate in various aspects of the project.
                                </small>
                                <small class="smallest mute"></small>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- JAN PAUL RESURRECCION -->
                        <div class="col-md-6 col-12">
                          <div class="carousel-caption">
                            <div class="row">
                              <div class="col-sm-3 col-4 align-items-start">
                                <img src="resources/images/system-photo/proponents/default.jpg" width="100" 
                                class="img-responsive  img-fluid" />
                              </div>
                              <div class="col-sm-9 col-8">
                                <h2>Jan Paul Resurreccion - <span>Contributor</span></h2>
                                <small>
                                  As Contributor in our research group i provides input and support to the project without assuming a formal leadership role.I have specialized knowledge or expertise relevant to the project or simply have a general interest in making a contribution. Participate in various aspects of the project.
                                </small>
                                <small class="smallest mute"></small>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- 7th carousel -->
                    <div class="carousel-item">
                      <div class="bg"></div>
                      <div class="row">
                        <!--JUSTINE IBANEZ-->
                        <div class="col-md-6 col-12">
                          <div class="carousel-caption">
                            <div class="row">
                              <div class="col-sm-3 col-4 align-items-start">
                                <img src="resources/images/system-photo/proponents/default.jpg" width="100" 
                                class="img-responsive  img-fluid" />
                              </div>
                              <div class="col-sm-9 col-8">
                                <h2>Justine Ibanez - <span>Contributor</span></h2>
                                <small>
                                  As Contributor in our research group i provides input and support to the project without assuming a formal leadership role.I have specialized knowledge or expertise relevant to the project or simply have a general interest in making a contribution. Participate in various aspects of the project.
                                </small>
                                <small class="smallest mute"></small>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- PRINCE SARTO -->
                        <div class="col-md-6 col-12">
                          <div class="carousel-caption">
                            <div class="row">
                              <div class="col-sm-3 col-4 align-items-start">
                                <img src="resources/images/system-photo/proponents/default.jpg" width="100" 
                                class="img-responsive  img-fluid" />
                              </div>
                              <div class="col-sm-9 col-8">
                                <h2>Prince Sarto - <span>TINANGGAL SA GRUPO</span></h2>
                                <small>
                                  --------
                                </small>
                                <small class="smallest mute"></small>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div><!--end carousel inner-->

                  <!-- prev button -->
                  <a class="carousel-control-prev" href="#researchTeam" 
                    role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true">
                      <i class="fas fa-chevron-left"></i>
                    </span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <!-- next button -->
                  <a class="carousel-control-next" href="#researchTeam" 
                    role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true">
                      <i class="fas fa-chevron-right"></i>
                    </span>
                    <span class="sr-only">Next</span>
                  </a>
                </div><!--carousel slide-->
              </div><!--card-->
            </div><!--second container-->
          </section>
                  
        </div><!--container-->
      </div><!--main-->
    </div><!--content-wrapper-->

    <?php require_once __DIR__ . '/components/js.file-links.inc.php';?>
    <script type="text/javascript">
      //PREVENT USER TO LOGIN SAME ACCOUNT IN DIFFERENT DEVICE OR LOCATION
      function check_sesssion_id() {
        var session_id = "<?php echo $_SESSION['session_id']; ?>";
        fetch('app/check_login.php').then(function(response){
          return response.json();
        }).then(function(responseData){
        if(responseData.output == 'logout'){
          window.location.href = '../auth/logout.php';
          }
        });
      }
      setInterval(function(){
        check_sesssion_id();
      }, 10000);
    </script>
  </body>
</html>