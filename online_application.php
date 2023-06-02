<!DOCTYPE html>
<html lang="en">
<head>
  <title>Online Application - Golden Minds Bulacan</title>
  <?php require_once __DIR__ . '/components/links.php'; ?>
  <style>
    #center {
      display: flex;
      justify-content: center;
      align-items: center;
    }
  </style>
</head>
<body>
  <main id="main_content">
    <?php require_once __DIR__ . '/components/header.php';?>
		<?php require_once __DIR__ . '/components/navbar.php'; ?>

    <center id="center">
      <div class="card bg-light mt-4" style="width: 100%;">
        <div class="conatiner-fluid content-inner  py-0">
          <div>
            <div class="row">
              <div class="col-lg-6 col-md-9">
                <div class="container">
                  <center>
                    <img src="resources/images/general/gmc/gmc_test2.jpg" class="img-thumbnail img-responsive" alt="" width="400"/>
                  </center>
                </div>
              </div>
              <div class="col-lg-3 col-md-6">
                <a href="online_application?at=pre_kinder">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex align-items-center justify-content-between mt-1">
                        <div>
                          <h3 class="counter">Pre-Kinder</h3>
                          <button type="button" class="btn btn-danger btn-sm mt-3">Enroll Now</button>
                        </div>
                        <div class="border  bg-soft-danger rounded p-3">
                          <i class="fa-solid fa-users"></i>
                        </div>
                      </div>
                      <div class="mt-4">
                        <div class="progress bg-soft-danger shadow-none w-100" style="height: 6px">
                          <div class="progress-bar bg-danger" data-toggle="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </a>

                <a href="online_application?at=jhs">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex align-items-center justify-content-between mt-1">
                        <div>
                          <h4 class="counter">Junior High School</h4>
                          <button type="button" class="btn btn-warning btn-sm mt-3"
                          style="margin-left: -70px">Enroll Now</button>
                        </div>
                        <div class="border  bg-soft-warning rounded p-3">
                          <i class="fa-solid fa-users"></i>
                        </div>
                      </div>
                      <div class="mt-4">
                        <div class="progress bg-soft-warning shadow-none w-100" style="height: 6px">
                          <div class="progress-bar bg-warning" data-toggle="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
              <div class="col-lg-3 col-md-6">
                <a href="online_application?at=elementary">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex align-items-center justify-content-between mt-1">
                        <div>
                          <h3 class="counter">Elementary</h3>
                          <button type="button" class="btn btn-success btn-sm mt-3">Enroll Now</button>
                        </div>
                        <div class="border  bg-soft-success rounded p-3">
                          <i class="fa-solid fa-users"></i>
                        </div>
                      </div>
                      <div class="mt-4">
                        <div class="progress bg-soft-success shadow-none w-100" style="height: 6px">
                          <div class="progress-bar bg-success" data-toggle="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </a>

                <a href="online_application?at=shs">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex align-items-center justify-content-between mt-1">
                        <div>
                          <h4 class="counter">Senior High School</h4>
                          <button type="button" class="btn btn-primary btn-sm mt-3" 
                          style="margin-left: -70px">Enroll Now</button>
                        </div>
                          <div class="border  bg-soft-primary rounded p-3">
                          <i class="fa-solid fa-users"></i>
                        </div>
                      </div>
                      <div class="mt-4">
                        <div class="progress bg-soft-primary shadow-none w-100" style="height: 6px">
                          <div class="progress-bar bg-primary" data-toggle="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
             
            </div>
          </div>
        </div>
      </div>
    </center>

    <?php require_once __DIR__ . '/components/footer.php'; ?>
  </main>
</body>
</html>