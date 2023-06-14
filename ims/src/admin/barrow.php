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

    <title>GMCIS | Borrow Equipment</title>
    <link rel="icon" type="image/png" href="resources/images/system-photo/gmc.favicon.png" sizes="16x16" />
    <?php require_once __DIR__ . '/components/css.file-links.inc.php';?>
    <style>
      /*user guide*/
      .equipment-img {
        width: 120px;
      }
      /*costumizing tooltip*/
      .tooltip-inner {
        background-color: #E5E7E9 !important;
        color: #424949;
      }
      .qty {
        width: 80px; 
        height: 45px;
      }
      .bquantity {
        width: 60px;
        height: 55px;
      }
      button.remove_that_equipment {
        width: 100px;
      }
      small {
        font-size: 13px;
      }
      button.clear {
        width: 100px;
      }
      .schoolBranch {
        /*cursor: no-drop;*/
        user-select: none;
        pointer-events: none;
      }
      select.costumer_name {
        height: 42px!important;
      }
      input.readonly {
        pointer-events: none;
      }
      .subTotal, .totalAmount {
        border: none;
        pointer-events: none;
        background: transparent;
      }
      .btn-modal {
        margin-top: -60px;
      }
    </style>
  </head>

  <body style="background: url('resources/images/system-photo/gmc-bg.png');">
    <?php require_once __DIR__ . '/components/ui.side-nav.php';?>
    <?php require_once __DIR__ . '/components/ui.top-nav.php';?>
    <?php require_once __DIR__ . '/components/js.file-links.inc.php';?>
    <?php require_once __DIR__ . '/components/msgalert.contr.inc.php';?>
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
                    <li class="breadcrumb-item">
                      <a href="barrow" class="active"> Barrow </a>
                    </li>
                    <li class="breadcrumb-item">Transaction</li>
                    <li class="breadcrumb-item">Dashboard</li>
                  </ol>
                </div>
              </div>
            </div>     
          </div> <!--end row-->
          
          <section id="main-content"> 
            <div class="card"> 
              <div class="card-body p-b-0"> 

                <div class="customtab2"> 
                  <ul class="nav nav-tabs " role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" data-toggle="tab" href="#equipmentList" role="tab">
                        <span class="hidden-down">Equipment List</span> 
                      </a> 
                    </li>    
                    <li class="nav-item"> 
                      <a class="nav-link" data-toggle="tab" href="#barrowList" role="tab">
                        <span class="hidden-down">Barrow List
                          <span class="badge badge-secondary">
                            <?php if(isset($_SESSION["equipment_cart"])) { echo count($_SESSION["equipment_cart"]); } else { echo '0'; }?>
                          </span>
                        </span>
                      </a> 
                    </li>
                  </ul>
                </div> <!-- end customtab2 -->

                <div class="tab-content"> 
                  <!-- first tab -->
                  <div class="tab-pane active" id="equipmentList" role="tabpanel">
                    <div class="p-10">
                      <div class="equipment-card">
                        <div class="card-title pr">
                          <!-- LOCATION RACK FILTERING -->
                          <form action="" method="GET" autocomplete="off">
                            <input type="text" name="location_rack" class="form-control"
                            value="<?php if(isset($_GET['location_rack'])){echo $_GET['location_rack'];} ?>"placeholder="--SELECT LOCATION RACK--" list="list" />
                            <datalist id="list">
                              <?php
                                $query = "SELECT DISTINCT e.location_id, lb.location
                                  FROM equipment e
                                  INNER JOIN location_branch lb ON e.location_id = lb.id";
                                $stmt = mysqli_prepare($connection, $query);
                                mysqli_stmt_execute($stmt);
                                $result = mysqli_stmt_get_result($stmt);
                                if(mysqli_num_rows($result) > 0) {
                                  while($row = mysqli_fetch_array($result)) {
                                    ?>
                                    <option value="<?= $row['location']; ?>">
                                      <?= $row['location']; ?>
                                    </option>
                                    <?php
                                  }
                                } else { 
                                  echo "<h4>NO DATA FOUND!</h4>";
                                }
                                mysqli_stmt_close($stmt);
                              ?>
                            </datalist>
                          </form>
                        </div><br/><!--end card title--> 
                        <!-- start data list table -->
                        <table id="allEquipmentTbl" class="table table-bordered"> 
                          <thead>
                            <tr>
                                <th style="width: 50px;">Image</th>
                                <th style="width: 80px;">Equipment Name</th>
                                <th style="width: 80px;">Category</th>
                                <th style="width: 80px;">Equipment Type</th>
                                <th style="width: 40px;">Quantity</th>
                                <th style="width: 60px;" class="text-center">Action</th>
                            </tr>
                          </thead>
                          <tbody id="equipmentData">
                            <?php
                              if(isset($_GET['location_rack'])) {
                                $filterByLocation = $_GET['location_rack'];
                                $query = "SELECT e.*, c.category_name, et.equip_type, lb.location
                                  FROM equipment e
                                  INNER JOIN categories c ON e.category_id = c.category_id
                                  INNER JOIN equipment_type et ON e.type_id = et.equip_id
                                  INNER JOIN location_branch lb ON e.location_id = lb.id
                                  WHERE lb.location = ?";
                                $stmt = mysqli_prepare($connection, $query);
                                mysqli_stmt_bind_param($stmt, "s", $filterByLocation);
                                mysqli_stmt_execute($stmt);
                                $result = mysqli_stmt_get_result($stmt);
                                if(mysqli_num_rows($result) > 0) {
                                  while ($data = mysqli_fetch_array($result)) {
                                    ?>
                                    <tr>
                                      <form action="" method="POST">
                                        <td>
                                          <!--hidden equipment name-->
                                          <input type="hidden" name="hidden_equipment_name" 
                                          id="equipment_name<?= $data['id']; ?>" 
                                          value="<?= $data['equipment_name']; ?>" />
                                          <!--hidden equipment price-->
                                          <input type="hidden" name="hidden_equipment_price" 
                                          id="equipment_price<?= $data['id']; ?>" 
                                          value="<?= $data['price']; ?>" />
                                          <!--hidden available equipment-->
                                          <input type="hidden" value="<?= $data['quantity']?>" 
                                          id="aquantity<?= $data['id'] ?>" />
                                          <!--hidden update available equipment-->
                                          <input type="hidden" id="updateAquantity<?=$data['id']?>" 
                                          onkeyup="checkStock('<?= $data['id'] ?>')" />
                                          <!-- hidden updated avail qty -->
                                          <input type="hidden" id="hidden_updateAquantity<?=$data['id']?>" name="hidden_updateAquantity<?=$data['id']?>"/>
                                          <!--hidden equipment name-->
                                          <input type="hidden" value="<?= $data['equipment_name']?>" 
                                          id="equipname<?= $data['id'] ?>" />

                                          <img data-toggle="tooltip" data-placement="top" 
                                          title="Available Quantity: <?=$data['quantity'];?>" 
                                          src="resources/images/equipment-photo-upload/<?= $data['equipment_img'] . '.' . $data['img_extension']; ?>" 
                                          class="img-responsive img-thumbnail equipment-img" />
                                        </td>
                                        <td><?= $data['equipment_name']; ?></td>
                                        <td><?= $data['category_name']; ?></td>
                                        <td><?= $data['equip_type']; ?></td>
                                        <td>
                                          <input type="text" name="Bquantity" class="form-control qty" 
                                          id="Bquantity<?= $data['id'] ?>" 
                                          onkeyup="checkStock('<?= $data['id'] ?>')"
                                          autocomplete="off" required />
                                        </td>
                                        <td>
                                          <button name="add_to_list" id="<?= $data['id']; ?>" type="submit"
                                            class="add_to_list btn btn-success btn-addon btn-flat">
                                            <i class='ti-plus'></i>Add Barrow
                                          </button> &nbsp;&nbsp;&nbsp;       
                                        </td>
                                      </form>
                                      <script>
                                        function checkStock(rowId) { 
                                          let equipment = document.getElementById("equipname" + rowId).value;
                                          let aquantity = document.getElementById("aquantity" + rowId).value;
                                          let bquantity = document.getElementById("Bquantity" + rowId).value;
                                          let updateAquantity = aquantity - bquantity;
                                          //check if entered barrow quantity input is delete
                                          if(bquantity === "") {
                                            //turn updatAquantity to 0
                                          } else {
                                            document.getElementById("updateAquantity" + rowId).value = updateAquantity;
                                            document.getElementById("hidden_updateAquantity" + rowId).value = updateAquantity;
                                          }
                                          //check if entered barrow quantity is greater than available quantity
                                          if(parseInt(bquantity) > parseInt(aquantity)) {
                                            // alert("Failed to borrow");
                                            swal({
                                              title: "Opps!",
                                              text:"<b>Failed to barrow equipment:</b> It seems you are trying to barrow " + "<u><b>" + bquantity + "</b></u>" + " " + equipment + " where there are only " + "<u><b>" + aquantity + "</u></b>" + " available quantity on " + equipment,
                                              type: "info",
                                              html: true,
                                            });
                                            //clear input after triggered alert
                                            document.getElementById("Bquantity" + rowId).value = "";
                                            //set updateAquantity input into 0 after triggered alert
                                            document.getElementById("updateAquantity" + rowId).value = 0;
                                            document.getElementById("hidden_updateAquantity" + rowId).value = 0; 
                                          }
                                        }
                                      </script>
                                    </tr>
                                    <?php
                                  }
                                } 
                                else {
                                  $query = "SELECT e.*, c.category_name, et.equip_type, lb.location
                                    FROM equipment e
                                    INNER JOIN categories c ON e.category_id = c.category_id
                                    INNER JOIN equipment_type et ON e.type_id = et.equip_id
                                    INNER JOIN location_branch lb ON e.location_id = lb.id
                                    ORDER BY e.date_added DESC";
                                  $stmt = mysqli_prepare($connection, $query);
                                  mysqli_stmt_execute($stmt);
                                  $result = mysqli_stmt_get_result($stmt);
                                  if(mysqli_num_rows($result) > 0) {
                                    while ($data = mysqli_fetch_array($result)) {
                                      $_SESSION['equipmentStock'] = $data['stock'];
                                      $_SESSION['equipmentName'] = $data['equipment_name'];
                                      ?>
                                      <tr>
                                        <form action="" method="POST">
                                          <td>
                                            <!--hidden equipment name-->
                                            <input type="hidden" name="hidden_equipment_name" 
                                            id="equipment_name<?= $data['id']; ?>" 
                                            value="<?= $data['equipment_name']; ?>" />
                                            <!--hidden equipment price-->
                                            <input type="hidden" name="hidden_equipment_price" 
                                            id="equipment_price<?= $data['id']; ?>" 
                                            value="<?= $data['price']; ?>" />
                                            <!--hidden equipment stock-->
                                            <input type="hidden" value="<?= $data['stock']?>" 
                                            id="stock<?= $data['id'] ?>" />

                                            <img data-toggle="tooltip" data-placement="top" 
                                            title="<?=$data['location'];?>" 
                                            src="resources/images/equipment-photo-upload/<?= $data['equipment_img'] . '.' . $data['img_extension']; ?>" 
                                            class="img-responsive img-thumbnail equipment-img"/>
                                          </td>
                                          <td><?= $data['equipment_name']; ?></td>
                                          <td><?= $data['category_name']; ?></td>
                                          <td><?= $data['equip_type']; ?></td>
                                          <td>
                                            <input type="number" name="Bquantity" class="form-control qty" 
                                            id="Bquantity<?= $data['id'] ?>" 
                                            onkeyup="checkStock(<?= $data['id'] ?>)" readonly />
                                          </td>
                                          <td>
                                            <button name="add_to_list" id="<?= $data['id']; ?>" 
                                            class="add_to_list btn btn-success btn-addon btn-flat" 
                                            type="submit" disabled>
                                              <i class='ti-plus'></i>Add Barrow
                                            </button> &nbsp;&nbsp;&nbsp;       
                                          </td>
                                        </form>
                                      </tr>
                                      <?php
                                    }
                                  } 
                                  else {
                                    ?>
                                    <tr>
                                      <td colspan="6" class="text-center">
                                        <h6>NO DATA HAS BEEN FOUND :(</h6>
                                      </td>
                                    </tr>
                                    <?php
                                  }
                                }
                              }
                              else {
                                $query = "SELECT e.*, c.category_name, et.equip_type, lb.location
                                  FROM equipment e
                                  INNER JOIN categories c ON e.category_id = c.category_id
                                  INNER JOIN equipment_type et ON e.type_id = et.equip_id
                                  INNER JOIN location_branch lb ON e.location_id = lb.id
                                  ORDER BY e.date_added DESC";
                                $stmt = mysqli_prepare($connection, $query);
                                mysqli_stmt_execute($stmt);
                                $result = mysqli_stmt_get_result($stmt);
                                if(mysqli_num_rows($result) > 0) {
                                  while ($data = mysqli_fetch_array($result)) {
                                    $_SESSION['equipmentStock'] = $data['stock'];
                                    $_SESSION['equipmentName'] = $data['equipment_name'];
                                    ?>
                                    <tr>
                                      <form action="" method="POST">
                                        <td>
                                          <!--hidden equipment name-->
                                          <input type="hidden" name="hidden_equipment_name" 
                                          id="equipment_name<?= $data['id']; ?>" 
                                          value="<?= $data['equipment_name']; ?>" />
                                          <!--hidden equipment price-->
                                          <input type="hidden" name="hidden_equipment_price" 
                                          id="equipment_price<?= $data['id']; ?>" 
                                          value="<?= $data['price']; ?>" />
                                          <!--hidden equipment stock-->
                                          <input type="hidden" value="<?= $data['stock']?>" 
                                          id="stock<?= $data['id'] ?>" />

                                          <img data-toggle="tooltip" data-placement="top" 
                                          title="<?=$data['location'];?>" 
                                          src="resources/images/equipment-photo-upload/<?= $data['equipment_img'] . '.' . $data['img_extension']; ?>" 
                                          class="img-responsive img-thumbnail equipment-img"/>
                                        </td>
                                        <td><?= $data['equipment_name']; ?></td>
                                        <td><?= $data['category_name']; ?></td>
                                        <td><?= $data['equip_type']; ?></td>
                                        <td>
                                          <input type="number" name="Bquantity" class="form-control qty" 
                                          id="Bquantity<?= $data['id'] ?>" 
                                          onkeyup="checkStock(<?= $data['id'] ?>)" readonly/>
                                        </td>
                                        <td>
                                          <button name="add_to_list" id="<?= $data['id']; ?>" 
                                          class="add_to_list btn btn-success btn-addon btn-flat"
                                          type="submit" disabled>
                                            <i class='ti-plus'></i>Add Barrow
                                          </button> &nbsp;&nbsp;&nbsp;       
                                        </td>
                                      </form>
                                    </tr>
                                    <?php
                                  }
                                } 
                                else {
                                  ?>
                                  <tr>
                                    <td colspan="6" class="text-center">
                                      <h6>NO DATA HAS BEEN FOUND :(</h6>
                                    </td>
                                  </tr>
                                  <?php
                                }
                              }
                              ?> 
                            </tbody> <!--end table body-->
                          </table> <!-- end data list table -->
                        </div>  <!-- equipment-card -->
                    </div> <!--p-20-->
                  </div> 

                  <!-- start second tab -->
                  <div class="tab-pane fade" id="barrowList" role="tabpanel">
                    <div class="p-10">
                      <div class="barrow-list-card">
                        <div id="barrow_table" class="table-responsive">
                          <form method="POST" action="">
                            <table class="table barrow-data-table  table-bordered">
                              <thead>
                                <tr>
                                  <th style="width: 150px;">Equipment Name</th>
                                  <th>Date Barrow</th>
                                  <th style="width: 60px;">Quantity</th>
                                  <th style="width: 70px;">Price</th>
                                  <th style="width: 70px;">Sub Total</th>
                                  <th class="text-center">Action</th>
                                </tr>
                              </thead>
                              <!-- start fetching data in cart table -->
                              <?php
                                if(!empty($_SESSION['equipment_cart'])) {
                                  $total = 0;
                                  foreach ($_SESSION['equipment_cart'] as $keys => $values) {
                                    ?>
                                    <tbody id="equipmentCart">
                                      <tr>
                                        <td data-toggle="tooltip" data-placement="left" 
                                          title="Available Quantity: <?= $values["availableQuantity"]; ?>">
                                          <!--hidden equipment id-->
                                          <input type="hidden" 
                                          id="barrowEquipmentId<?= $values["equipment_id"]; ?>" 
                                          value="<?= $values["equipment_id"]; ?>"/>
                                          <!--hidden equipment available quantity-->
                                          <input type="hidden" 
                                          id="availableQty<?= $values["equipment_id"]; ?>" 
                                          value="<?= $values["availableQuantity"]; ?>" class="form-control"/>
                                          <!-- hidden equipment name -->
                                          <input type="hidden" id="equipmentName<?= $values["equipment_id"]; ?>" value="<?= $values["equipment_name"]; ?>"/>
                                          <!--data that is display in table-->
                                          <?= $values["equipment_name"]; ?>      
                                        </td>
                                        <td><?= date("M-d-Y / h: i A")?> </td>
                                        <td>
                                          <input type="text" name="barrowquantity[]" 
                                          id="bquantity<?= $values["equipment_id"]; ?>" 
                                          value="<?= $values["equipment_bquantity"]; ?>"
                                          data-equipment_id="<?= $values["equipment_id"]; ?>" 
                                          onkeyup="makeChanges('<?= $values['equipment_id'] ?>')"
                                          class="form-control bquantity editquantity" 
                                          autocomplete="off"/>
                                        </td>
                                        <td>
                                          <input type="hidden" value="<?= $values["equipment_price"]; ?>" 
                                          id="equipmentPrice<?= $values["equipment_id"];?>"/>
                                          <!--data that is display in table-->
                                          <?= $values["equipment_price"]; ?>
                                        </td>
                                        <td>
                                          <!--data that is display in table-->       
                                          <input type="text" class="subTotal"
                                          value="<?= $values["equipment_bquantity"] * $values["equipment_price"]; ?>" 
                                          id="updatedSubtotalDisplay<?=$values["equipment_id"];?>"/>
                                          <!--hidden update sub total equipment-->
                                          <input type="hidden" class="form-control"
                                          value="<?= $values["equipment_bquantity"] * $values["equipment_price"]; ?>" 
                                          id="subtotalForCalc<?=$values['equipment_id']?>" 
                                          onkeyup="makeChanges('<?= $values['equipment_id'] ?>')"/>
                                        </td>
                                        <td>
                                          <button type="button" name="delete" 
                                          id="<?= $values["equipment_id"]; ?>"  
                                          class="remove_that_equipment btn-danger btn btn-sm m-r-20" >
                                            Remove
                                          </button>  
                                        </td>
                                      </tr> 
                                    </tbody>
                                    <?php //end divider
                                      $total = $total + ($values["equipment_bquantity"] * $values["equipment_price"]);
                                    ?>
                                  <?php
                                  } //end for each loop
                                  ?>
                                  <tfoot>
                                    <tr>
                                      <th colspan="4" class="text-right">Total Amount</th>
                                      <th>
                                        <input type="text" class="totalAmount" id="UpdatetotalAmountDisplay"
                                        value="<?=$total; ?>" />
                                        <input type="hidden" class="form-control" id="totalAmountForCalc"
                                        value="<?=$total; ?>"/>
                                      </th>
                                    </tr>
                                    <tr>
                                      <th colspan="6" class="text-center">
                                        <!--hidden id for users or admin-->
                                        <input type="hidden" id="usersId" value="<?=$_SESSION['user_id']?>"/>
                                        <!--hidden id for costumer-->
                                        <input type="hidden" name="costumerId" id="costumerId" 
                                        class="form-control costumerId" />
                                        <button type="submit" name="place_order" 
                                        class="btn btn-success btn-flat" id="place_order" disabled>
                                          Place to Barrow now!
                                        </button>
                                      </th>
                                    </tr>
                                  </tfoot> 
                                  <script>
                                    //initialize total with the total from PHP
                                    var total = <?= $total ?>;

                                    function makeChanges(equipmentId) {
                                      const equipmentName = document.getElementById("equipmentName" + equipmentId).value;
                                      const availableQty = document.getElementById("availableQty" + equipmentId).value;
                                      const barrowQty = document.getElementById("bquantity" + equipmentId).value;
                                      const price = document.getElementById("equipmentPrice" + equipmentId).value;
                                      const subtotalForCalc = document.getElementById("subtotalForCalc" + equipmentId).value;
                                      const totalAmountForCalc = document.getElementById("totalAmountForCalc").value;

                                      let displaySubtotal =  document.getElementById("updatedSubtotalDisplay" + equipmentId);
                                      let displayTotalAmount = document.getElementById("UpdatetotalAmountDisplay");

                                      var UpdateSubTotal = 0;
                                      if (parseInt(barrowQty) > parseInt(availableQty)) {
                                        UpdateSubTotal = 0;
                                        //alert("Return quantity cannot exceed borrowed quantity.");
                                        swal({
                                          title: "Opps!",
                                          text: "There are only " + availableQty + " available quantity left for " + equipmentName + ". Barrow quantity cannot exceed available quantity.",
                                          type: "info",
                                          button: "OK",
                                        });
                                        document.getElementById("bquantity" + equipmentId).value = availableQty;
                                      } else {
                                        UpdateSubTotal = barrowQty * price;
                                        displaySubtotal.value = UpdateSubTotal;
                                      }
                                      // update the total variable
                                      var newTotal = 0;
                                      var subtotals = document.getElementsByClassName("subTotal");
                                      for(var i = 0; i < subtotals.length; i++) {
                                        newTotal += parseFloat(subtotals[i].value);
                                      }
                                      total = newTotal;
                                      displayTotalAmount.value = total;
                                    }
                                  </script>        
                                  <?php
                                } //end if
                              ?>
                              <!-- COSTUMER FORM -->
                              <div class="card">
                                <div class="costumer-card-form"> 
                                  <div class="row">
                                    <div class="col-2">
                                      <button type="button" id="addBarrow" class="addBarrow btn btn-secondary" >
                                        Add barrower
                                      </button>  
                                    </div> <!--end first col-4-->
                                    <div class="col-5">
                                      <input type="text" name="schoolBranch" id="schoolBranch" 
                                      class="schoolBranch form-control"
                                      value="<?php if(isset($_GET['location_rack'])) { echo $_GET['location_rack']; }?>"/>      
                                    </div> <!--end second col-4-->
                                    <div class="col-5">
                                      <select name="costumerName" id="costumerName" 
                                        onchange="showCostumerData()" class="costumer_name form-control">
                                        <option selected>-- SELECT BARROWER  NAME--</option>
                                        <?php
                                          $school = $_GET['location_rack'];
                                          $stmt = mysqli_prepare($connection, "SELECT DISTINCT c.*, lb.*
                                            FROM costumers c
                                            INNER JOIN location_branch lb ON c.school_id = lb.id
                                            WHERE lb.location = ? AND c.costumer_status = 1");
                                          if(!$stmt) { echo "query error : " . mysqli_error($connection); }
                                          mysqli_stmt_bind_param($stmt, "s", $school);
                                          mysqli_stmt_execute($stmt);
                                          $result = mysqli_stmt_get_result($stmt);
                                          //check data from result
                                          if(mysqli_num_rows($result) > 0) {
                                            while($row = mysqli_fetch_assoc($result)){
                                              ?>
                                              <option value="<?= $row['name']; ?>">
                                                <?= $row['name']; ?>
                                              </option>
                                              <?php
                                            }
                                          } else {
                                            echo "<h4>NO DATA FOUND!</h4>";
                                          }
                                          mysqli_stmt_close($stmt);
                                        ?>  
                                      </select>
                                    </div> <!--end third col-5-->
                                  </div><br/><hr/> <!--end row-->
                                  <form id="costumerForm">
                                    <div class="row"> 
                                      <!--barrower name-->
                                      <div class="col-4"> 
                                        <small>Full Name<span class="text-danger">*</span></small><br/>
                                        <input id="fullname" class="readonly form-control"/>
                                      </div>
                                      <!--barrower email-->
                                      <div class="col-4"> 
                                        <small>Email<span class="text-danger">*</span></small><br/>
                                        <input id="email" class="readonly form-control"/>
                                      </div>
                                      <!--barrower Contact no-->
                                      <div class="col-4">
                                        <small>Contact No.<span class="text-danger">*</span></small><br/>
                                        <input id="phone_number" class="readonly form-control"/>
                                      </div>
                                    </div><br/> <!--end first row-->
                                    <div class="row">
                                      <!--barrower Address-->
                                      <div class="col-4">
                                        <small>Complete Address<span class="text-danger">*</span></small>
                                        <input id="address" class="readonly form-control"/>
                                      </div>
                                      <!--barrower School-->
                                      <div class="col-4">
                                        <small>School Branch<span class="text-danger">*</span></small>
                                        <input id="schoolTo" class="readonly form-control"/>
                                      </div>
                                      <!--barrower Role-->
                                      <div class="col-4">
                                        <small>Role / Position <span class="text-danger">*</span></small>
                                        <input id="roleTo" class="readonly form-control"/>
                                      </div>
                                    </div><br/> <!--end second row -->
                                  </form>
                                </div> <!--end costumer card form-->
                              </div><br/> <!--card-->
                            </table> <!--end table-->
                          </form>
                        </div> <!--end barrow_table-->
                                      
                          <!--start modal form for add barrower-->
                          <div class="modal fade btn-modal" id="addBarrowerModal" tabindex="-1" role="document" >
                            <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                <form action="actions/actions.controller.php" method="POST">
                                  <input type="hidden" name="url" value="<?=$_GET['location_rack'];?>" />
                                  <input type="hidden" name="usersId" value="<?=$_SESSION['user_id']?>"/>
                                  <div class="modal-header">
                                    <h5 class="modal-title">Add New Barrower</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <i class="ti-close" aria-hidden="true"> </i>
                                    </button>
                                  </div> <!--end modal header-->

                                  <div class="modal-body">
                                    <small>Full Name<span class="text-danger">*</span></small><br/>
                                    <input type="text" name="fullname" class="fullname form-control" autocomplete="off" required />

                                    <small>Email<span class="text-danger">*</span></small><br/>
                                    <input type="email" name="email"class="email form-control" autocomplete="off" required />

                                    <small>Contact No.<span class="text-danger">*</span></small><br/>
                                    <input type="text" name="phone_number" class="phone_number form-control" autocomplete="off" required />

                                    <small>Complete Address<span class="text-danger">*</span></small>
                                    <input type="text" name="address" class="address form-control" autocomplete="off" required/>

                                    <small>School Branch<span class="text-danger">*</span></small>
                                    <select id="idSchool" name="school" class="school form-control" autocomplete="off" required>
                                      <option selected>-- SELECT --</option>
                                      <?php
                                        $stmt = mysqli_prepare($connection, 
                                          "SELECT * FROM location_branch 
                                          ORDER BY id ASC");
                                        if(!$stmt) { 
                                          echo "query error : " . mysqli_error($connection); }
                                        mysqli_stmt_execute($stmt);
                                        $result = mysqli_stmt_get_result($stmt);
                                        if(mysqli_num_rows($result) > 0) {
                                          while($row = mysqli_fetch_assoc($result)){
                                            ?>
                                              <option value="<?= $row['id']; ?>">
                                                <?= $row['location']; ?>
                                              </option>
                                            <?php
                                          }
                                        } else {
                                          echo "<h4>NO DATA FOUND!</h4>";
                                        }
                                        mysqli_stmt_close($stmt);
                                      ?> 
                                    </select>

                                    <small>Role / Position<span class="text-danger">*</span></small>
                                    <input list="role" name="role" class="role form-control" placeholder="-- SELECT --"  required/> 
                                    <datalist id="role">
                                      <option value="Faculty">Faculty</option> 
                                      <option value="Staff">Staff</option>
                                      <option value="Student">Student</option>   
                                    </datalist>   
                                  </div> <!--end modal body-->

                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" name="add_new_barrower" class="btn btn-success">Add</button>
                                  </div><!--end modal footer-->
                                </form>

                              </div> <!--modal-content-->
                            </div> <!--modal-dialog-->
                          </div> 
                          <!--end modal form for add barrower-->

                        </div> <!--end barrow-list-card-->
                   
                    </div> <!--p-20-->
                  </div>  

                </div> <!-- end tab content -->
              </div>  <!-- end card body-->
            </div> <!-- end main card -->

          </section> <!--#end section main content-->
        </div> <!--end container-fluid-->
      </div> <!--end main-->
    </div>  <!--end content-wrap-->
    
    <script defer>
      //FETCH COSTUMER DATA / INFORMATION WHEN ITS SELECTED
      function showCostumerData() {
        // alert("test");
        var costumerName = document.getElementById("costumerName").value;
        //alert(costumerName);
        $.ajax({
          method:"POST",
          url:"app/actions.controller.php",
          dataType:"JSON",
          data: {
            costumerName:costumerName
          },
          success:function(data){
            //console.log(data);
            //fetch all data from the result costumerId
            let id = document.getElementById("costumerId").value = (data.costumer_id);
            let name = document.getElementById("fullname").value = (data.costumer_name);
            let email = document.getElementById("email").value = (data.costumer_email);
            let phoneNumber = document.getElementById("phone_number").value = (data.costumer_phone_number);
            let address = document.getElementById("address").value = (data.costumer_address);
            let school = document.getElementById("schoolTo").value = (data.costumer_school_branch);
            let role = document.getElementById("roleTo").value = (data.costumer_role_position);

            const placeBarrowBtn = document.getElementById("place_order");
            //code to check if all fields is empty, then clearbtn will be disabled otherwise its not
            if(name === "" && email === "" && phoneNumber === ""  && address === ""  && school === ""  && role === "") {
              placeBarrowBtn.disabled = true;
            } else {
              placeBarrowBtn.disabled = false;
            }
          }
        });
      }

      $(document).ready(function() {
        // function for place barrow
        $('#place_order').on("click", function(event) {
          event.preventDefault();
          //alert("test");

          //retrive barrower id
          let costumer_id = $(this).closest('tr').find('.costumerId').val();
          let UserAdminId = $(this).closest('tr').find('#usersId').val();
          //alert(UserAdminId);

          //retrieve all data equipment in cart and store in array
          let barrowData = [];
          let hasError = false;

          $('#equipmentCart tr').each(function() {
            let equipmentId = $(this).find('[id^=barrowEquipmentId]').val();
            let availableQty = $(this).find('[id^=availableQty]').val();
            let barrowQuantity = $(this).find('[id^=bquantity]').val();
            let subtotal = $(this).find('[id^=updatedSubtotalDisplay]').val();
            const equipment = { 
              id: equipmentId, 
              quantity: barrowQuantity,
              availableQty: availableQty, 
              subtotal: subtotal
            };
            barrowData.push(equipment);
          });
          // alert(JSON.stringify(barrowData)); 
          for (let i = 0; i < barrowData.length; i++) {
            //check every equipment in table if barrow qty is grather than available qty
            if (parseInt(barrowData[i].quantity) > parseInt(barrowData[i].availableQty)) {
              hasError = true; //set error true
              break;
            }
          }
          //check if error has true or false
          if(hasError) {
            swal({
              title: "Oppss!",
              text: "<b>Failed to barrow:</b> Please ensure that the barrow quantity of each equipment cannot exceed its available quantity. To check the available quantity of a particular equipment, hover your mouse over its name and the available quantity will be displayed.",
              type: "info",
              html: true
            });
          } else {
            //alert("pede");
            // //send ajax request to se  nd data into server 
            $.ajax({
              url: "app/actions.controller.php",
              method: "POST",
              data: {
                placeBarrowBtn: true,
                costumer_id:costumer_id,
                barrowData:barrowData,
                barrowStatus: 1,
                UserAdminId:UserAdminId
              },
              success:function(response) {
                // console.log(response);
                setTimeout(function() {
                  window.location = "barrow";
                }, 3000); 
              }, error: function(xhr, status, error) {
                console.log(xhr.responseText);
              }
            });
          }
        });

        //function to add barrower list to cart list
        $('#equipmentData').on("click", ".add_to_list", function() {
          //initialized data
          let equipment_id = $(this).attr("id");
          let equipment_name = $('#equipment_name'+equipment_id).val();
          let equipment_price = $('#equipment_price'+equipment_id).val();

          let availableQuantity = $('#aquantity'+equipment_id).val();
          //qty ng hiniram
          let equipment_bquantity = $('#Bquantity'+equipment_id).val();
          let updatedAvailableQty = $('#hidden_updateAquantity'+equipment_id).val();
          //let updatedAvailableQty = $('#updateAquantity'+equipment_id).val(); 
          let action = "add";
          //alert(updatedAvailableQty);

          //send qjax request
          $.ajax({
            url:"app/actions.controller.php", //file to be send request
            method:"POST",  //send via post method
            dataType:"JSON",  //send data in json format
            data:{  //convert data in post method
              equipment_id:equipment_id,
              equipment_name:equipment_name,
              equipment_price:equipment_price,
              availableQuantity:availableQuantity,
              equipment_bquantity:equipment_bquantity,
              updatedAvailableQty:updatedAvailableQty,
              action:action
            },
            success:function(data){ //if success
              //display barrow equipment in cart list table
              $('#barrow_table').html(data.barrow_table); 
              $('.badge').text(data.cart_item); //update badge in cart
            }
          });

        });

        //function to remove barrow equipment in cart lsit
        $(document).on('click', '.remove_that_equipment', function(e){
          e.preventDefault();
          // /let equipment_id = $(this).attr("id");
          // let equipment_id = $(this).closest('tr').find('#barrowEquipmentId').val();
          let equipment_id = $(this).closest('tr').find('[id^=barrowEquipmentId]').val();
          let barrowQtyInCart = $('#bquantity'+equipment_id).val();
          let action = "remove";
          const url = "<?= $_GET['location_rack']; ?>";
          // alert(url);

          //popup confirmation
          if(confirm("Are you sure you want to remove this equipment?")) {
            //window.location = "admin-barrow?location_rack=" + url;
            $.ajax({
              url:"app/actions.controller.php",
              method:"POST",
              dataType:"JSON",
              data:{ 
                equipment_id:equipment_id,
                barrowQtyInCart:barrowQtyInCart,
                action:action
              },
              success:function(data) {
                $("#barrow_table").html(data.barrow_table);
                $('.badge').text(data.cart_item);
                window.location = "barrow?location_rack=" + url;
              }
             });
          } else {
            return false; //no action will be perform
          }

        });

        //tool tip
        $(function () {
          $('[data-toggle="tooltip"]').tooltip();
        });

        //data table
        $("#allEquipmentTbl").dataTable({
          ordering: false,
          bJQueryUI: true,
          sPaginationType: "full_numbers"
        });

        //function to add barrower
        $('#addBarrow').on("click", function() {
          //alert("test");   
          $('#addBarrowerModal').modal('show');
        });

      }); //end document ready
               
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