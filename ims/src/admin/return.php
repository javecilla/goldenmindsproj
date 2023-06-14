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

    <title>GMCIS | Return Equipment</title>
    <link rel="icon" type="image/png" href="resources/images/system-photo/gmc.favicon.png" sizes="16x16" />
    <?php require_once __DIR__ . '/components/css.file-links.inc.php';?>
    <style>
      input.schoolBranch {
        padding-left: 20px;
      }
      .clock {
        margin-top: 40px;
      }
      .card {
        margin-top: -10px;
      }
      .instruction2 {
        height: 75px!important; 
        padding: 15px; 
        font-size: 15px; 
        background: #F0FBFA!important;
      }
      th {
        font-size: 15px;

      }
      input.address {
        width: 180px!important; 
        overflow: hidden!important;
        word-wrap: break-word; 
        border: none; 
        pointer-events: none;
        color: #868E96;
        background: none;
      }
      /*switch toggle*/
      .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 25px;
      }

      .switch input { 
        opacity: 0;
        width: 0;
        height: 0;
      }

      .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
      }

      .slider:before {
        position: absolute;
        content: "";
        height: 19px;
        width: 19px;
        left: 6px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
      }

      input:checked + .slider {
        background-color: #2196F3;
      }

      input:focus + .slider {
        box-shadow: 0 0 1px #2196F3;
      }

      input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
      }

      /* Rounded sliders */
      .slider.round {
        border-radius: 34px;
      }

      .slider.round:before {
        border-radius: 50%;
      }
    </style>
  </head>

  <body style="background: url('resources/images/system-photo/gmc-bg.png');">
    <?php require_once __DIR__ . '/components/ui.side-nav.php';?>
    <?php require_once __DIR__ . '/components/ui.top-nav.php';?>
    <?php require_once __DIR__ . '/components/js.file-links.inc.php';?>
    <?php require_once __DIR__ . '/components/msgalert.contr.inc.php';?>

    <!--FOR HEADER CONTENT-->
    <div class="content-wrap">
      <div class="main">
        <div class="container-fluid">

          <div class="row">
            <div class="col-lg-8 p-r-0 title-margin-right">
              <div class="page-header">
                <div class="page-title">
                  <h6 class="clock"><?php echo date("M-d-Y")?> / <?php echo date(" h: i A");?></h6>
                </div> 
              </div> 
            </div>

            <div class="col-lg-4 p-l-0 title-margin-left">
              <div class="page-header">
                <div class="page-title">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item" style="margin-left: -100px;">
                      <a href="admin-return" class="active"> Return </a>
                    </li>
                    <li class="breadcrumb-item">Barrow</li>
                    <li class="breadcrumb-item">Transaction</li>
                    <li class="breadcrumb-item">Dashboard</li>
                  </ol>
                </div>
              </div>
            </div>     
          </div> <!--end row-->
               
          <section id="main-content">
            <!-- start card table -->
            <div class="card">
              <div class="card-title pr">
                <form action="" method="GET">
                  <input type="text" name="schoolBranch" id="schoolBranch" onchange="selectSchoolBranch()"
                    value="<?php if(isset($_GET['schoolBranch'])){ echo $_GET['schoolBranch']; } ?>" 
                    class="schoolBranch form-control" placeholder="--SELECT SCHOOL BRANCH--" list="listOne" 
                  />
                  <datalist id="listOne">
                    <?php
                      $query = "SELECT DISTINCT c.school_id, lb.*
                        FROM costumers c
                        INNER JOIN location_branch lb ON c.school_id = lb.id";
                      $stmt = mysqli_prepare($connection, $query);
                      mysqli_stmt_execute($stmt);
                      $result = mysqli_stmt_get_result($stmt);
                      if(mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                          ?>
                          <option value="<?= $row['location']; ?>">
                            <?= $row['location']; ?>
                          </option>
                          <?php
                        }
                      } else {
                        echo "No data found :(";
                      }
                      mysqli_stmt_close($stmt);                     
                    ?>
                  </datalist>
                </form>        
              </div><br/> <!--end card title-->   
              <!--start table-->
              <table id="barrowerList" class="table table-bordered">
                <thead >
                  <tr>
                    <th style="width: 5%;">CID</th>
                    <th>Name</th>
                    <th style="width: 25%;">Email</th>             
                    <th style="width: 10%;">Role</th>
                    <th style="width: 8%;">Status</th>
                    <th style="width: 10%;" class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody id="transacRecord">
                  <?php
                    if(isset($_GET['schoolBranch'])) {
                      $filterBySelectedSchool = $_GET['schoolBranch'];
                      $query3 = "SELECT c.*, lb.* 
                        FROM costumers c
                        INNER JOIN location_branch lb ON c.school_id = lb.id
                        WHERE lb.location = ?
                        ORDER BY c.costumer_id DESC";
                      $stmt = mysqli_prepare($connection, $query3);
                      mysqli_stmt_bind_param($stmt, "s", $filterBySelectedSchool);
                      mysqli_stmt_execute($stmt);
                      $result = mysqli_stmt_get_result($stmt);
                      //check data from result
                      if(mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                          ?>
                            <tr>
                              <td><?=$row['costumer_id']?></td>
                              <td><?=$row['name']?></td>
                              <td><?=$row['email']?></td>
                              <td>
                                <?php
                                  if($row['role_position'] == "Faculty") {
                                      echo '<span class="badge badge-success">Faculty</span>';
                                    } else if($row['role_position'] == "Staff") {
                                      echo '<span class="badge badge-danger">Staff</span>';
                                    } else if($row['role_position'] == "Student"){
                                      echo '<span class="badge badge-primary ">Student</span>';
                                    } else {
                                      echo "Amogus!";
                                    }
                                ?>
                              </td>
                              <td>
                                <?php
                                  if ($row['costumer_status'] == 1) { // allowed
                                    echo '
                                      <label class="switch">
                                        <input type="checkbox" onclick="window.location.href=\'app/actions.controller.php?id='.$row['costumer_id'].'&status='.($row['costumer_status'] == 1 ? 0 : 1).'\'" checked />
                                        <span class="slider round"></span>
                                      </label>
                                    ';
                                  } else { // block
                                    echo '
                                      <label class="switch">
                                        <input type="checkbox" onclick="window.location.href=\'app/actions.controller.php?id='.$row['costumer_id'].'&status='.($row['costumer_status'] == 1 ? 0 : 1).'\'" />
                                        <span class="slider round"></span>
                                      </label>
                                    ';
                                  }
                                ?>
                              </td>
                              <td>
                                <form action="" method="POST">
                                  <button type="button" class="btn-primary btn btn-sm"
                                  onclick="window.location.href='app/costumer.record?id=<?=$row['costumer_id'];?>';">
                                    <i class='ti-eye view-icon'>&#xE872;</i>
                                  </button>

                                  <input type="hidden" class="valCostumerId" value="<?=$row['costumer_id']?>" />
                                  <button type="button" name="" class="delCostumerId btn-danger btn btn-sm m-r-10">
                                    <i class='ti-trash' >&#xE872;</i>
                                  </button>
                                </form>
                              </td>
                            </tr>
                          <?php //end divider
                        } //while
                      } //if num rows
                      else {
                        $query4 = "SELECT c.*, lb.*
                          FROM costumers c
                          INNER JOIN location_branch lb ON c.school_id = lb.id
                          ORDER BY c.costumer_id DESC";
                        $stmt = mysqli_prepare($connection, $query4);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        //check data from result
                        if(mysqli_num_rows($result) > 0) {
                          while($row = mysqli_fetch_assoc($result)) {
                            ?>
                              <tr>
                                <td><?=$row['costumer_id']?></td>
                                <td><?=$row['name']?></td>
                                <td><?=$row['email']?></td>
                                <td>
                                  <?php
                                    if($row['role_position'] == "Faculty") {
                                        echo '<span class="badge badge-success">Faculty</span>';
                                      } else if($row['role_position'] == "Staff") {
                                        echo '<span class="badge badge-danger">Staff</span>';
                                      } else if($row['role_position'] == "Student"){
                                        echo '<span class="badge badge-primary ">Student</span>';
                                      } else {
                                        echo "Amogus!";
                                      }
                                  ?>
                                </td>
                                <td>
                                  <?php
                                    if ($row['costumer_status'] == 1) { // allowed
                                      echo '
                                        <label class="switch">
                                          <input type="checkbox" onclick="window.location.href=\'app/actions.controller.php?id='.$row['costumer_id'].'&status='.($row['costumer_status'] == 1 ? 0 : 1).'\'" checked />
                                          <span class="slider round"></span>
                                        </label>
                                      ';
                                    } else { // block
                                      echo '
                                        <label class="switch">
                                          <input type="checkbox" onclick="window.location.href=\'app/actions.controller.php?id='.$row['costumer_id'].'&status='.($row['costumer_status'] == 1 ? 0 : 1).'\'" />
                                          <span class="slider round"></span>
                                        </label>
                                      ';
                                    }
                                  ?>
                                </td>
                                <td>
                                  <form action="" method="POST">
                                    <button type="button" class="btn-primary btn btn-sm"
                                    onclick="window.location.href='app/costumer.record?id=<?=$row['costumer_id'];?>';">
                                      <i class='ti-eye view-icon'>&#xE872;</i>
                                    </button>

                                    <input type="hidden" class="valCostumerId" value="<?=$row['costumer_id']?>" />
                                    <button type="button" name="" class="delCostumerId btn-danger btn btn-sm m-r-10">
                                        <i class='ti-trash' >&#xE872;</i>
                                    </button>
                                  </form>
                                </td>
                              </tr>
                            <?php //end divider
                          } //while
                        } else {
                          echo "No data found :(";
                        }
                      } //end else 
                    } //end if isset
                    else {
                      $query1 = "SELECT c.*, lb.*
                        FROM costumers c
                        INNER JOIN location_branch lb ON c.school_id = lb.id
                        ORDER BY c.costumer_id DESC";
                      $stmt = mysqli_prepare($connection, $query1);
                      mysqli_stmt_execute($stmt);
                      $result = mysqli_stmt_get_result($stmt);
                      //check data from result
                      if(mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                          ?>
                          <tr>
                            <td><?=$row['costumer_id']?></td>
                            <td><?=$row['name']?></td>
                            <td><?=$row['email']?></td>
                            <td>
                              <?php
                                if($row['role_position'] == "Faculty") {
                                    echo '<span class="badge badge-success">Faculty</span>';
                                  } else if($row['role_position'] == "Staff") {
                                    echo '<span class="badge badge-danger">Staff</span>';
                                  } else if($row['role_position'] == "Student"){
                                    echo '<span class="badge badge-primary ">Student</span>';
                                  } else {
                                    echo "Amogus!";
                                  }
                              ?>
                            </td>
                            <td>
                              <?php
                                if ($row['costumer_status'] == 1) { // allowed
                                    echo '
                                      <label class="switch">
                                        <input type="checkbox" onclick="window.location.href=\'app/actions.controller.php?id='.$row['costumer_id'].'&status='.($row['costumer_status'] == 1 ? 0 : 1).'\'" checked />
                                        <span class="slider round"></span>
                                      </label>
                                    ';
                                  } else { // block
                                    echo '
                                      <label class="switch">
                                        <input type="checkbox" onclick="window.location.href=\'app/actions.controller.php?id='.$row['costumer_id'].'&status='.($row['costumer_status'] == 1 ? 0 : 1).'\'" />
                                        <span class="slider round"></span>
                                      </label>
                                    ';
                                  }
                              ?>
                            </td>
                            <td>
                              <form action="" method="POST">
                                <button type="button" class="btn-primary btn btn-sm"
                                onclick="window.location.href='app/costumer.record?id=<?=$row['costumer_id'];?>';">
                                  <i class='ti-eye view-icon'>&#xE872;</i>
                                </button>

                                <input type="hidden" class="valCostumerId" value="<?=$row['costumer_id']?>" />
                                <button type="button" name="" class="delCostumerId btn-danger btn btn-sm m-r-10">
                                    <i class='ti-trash' >&#xE872;</i>
                                </button>
                              </form>
                            </td>
                          </tr>
                          <?php
                        }
                      } else {
                        echo "No data found :(";
                      }
                    }
                  ?>
                </tbody> 
              </table>                 
            </div> <!--end card-->
          </section>          
        </div> <!--end container fluid-->
      </div> <!--end div main-->
    </div> <!--end content-wrap-->

    <script type="text/javascript">
      $(document).ready(function() {
        //delete costumer|barrower confirmation 
        $('#transacRecord').on("click", ".delCostumerId", function(e) {
          e.preventDefault();
          // alert("test");
          var deleteCostumerId = $(this).closest("tr").find('.valCostumerId').val();
          // alert(deleteCostumerId);
          swal({
            title: "Are you sure to delete?",
            text: "Once deleted, you will not be able to recover this record",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it",
            cancelButtonText: "No, cancel it",
            closeOnConfirm: false,
            closeOnCancel: false,
          },
            function(willDelete) {
              if(willDelete) {
                $.ajax({
                  url: "app/actions.controller.php",
                  method: "POST",
                  data: {
                    deleteBtnSet: 1,
                    deleteCostumerId: deleteCostumerId,
                  },
                  success:function(data) { 
                    swal({
                        title: "Deleted!",
                        text: "Barrower data deleted successfully",
                        type: "success"
                     }, function() {
                        window.location = "return";
                     });
                  }
                });
              } else {
                swal("Cancelled!", "Barrower record is safe", "error");
              }
            }
          );
        });

        //data table
        $('#barrowerList').dataTable( {
          ordering: false,
          bJQueryUI: true,
          sPaginationType: "full_numbers"
        }); 

      }); //end ready func
      

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
