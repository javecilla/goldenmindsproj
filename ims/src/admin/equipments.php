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

    <title>GMCIS | Equipment Management</title>
    <link rel="icon" type="image/png" href="resources/images/system-photo/gmc.favicon.png" sizes="16x16" />
    <?php require_once __DIR__ . '/components/css.file-links.inc.php';?>

    <style type="text/css" defer>
      /*costumizing tooltip*/
      .tooltip-inner {
        background-color: #E5E7E9 !important;
        color: #424949;
      }
      .equipname {
        text-indent: 8px!important;
      }
      .nodrop {
        cursor: no-drop!important;
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
                      <a href="equipments" class="active"> Equipment Management</a>
                    </li>
                    <li class="breadcrumb-item">Dashboard</li>
                  </ol>
                </div>
              </div>
            </div>     
          </div> <!--end row-->

          <section id="main-content">
            <div class="card">
              <div class="card-title pr">
                <button type="button"  data-target="#ADDequipmentMODAL" data-toggle="modal" class="btn btn-light text-capitalize">
                <i class="far fa-solid fa-circle-plus text-success"></i> Add Equipment
              </button><hr/>
              </div> 
              <!-- selection input for equipment location rack -->
              <form action="" method="GET">
                <input type="text" name="locationRack" id="locationRack"
                  value="<?php if(isset($_GET['locationRack'])){ echo $_GET['locationRack']; } ?>" 
                  class="locationRack form-control" placeholder="-- FILTER BY LOCATION RACK OF EQUIPMENT --" list="list" 
                />
                <datalist id="list">
                  <?php
                    $query = "SELECT DISTINCT e.location_id, lb.*
                      FROM equipment e
                      INNER JOIN location_branch lb ON e.location_id = lb.id";
                    $stmt = mysqli_prepare($connection, $query);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    if(mysqli_num_rows($result) > 0) { //check data from result
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
              </form><br/>  
              <!--start data table for equipments-->                 
              <table id="tbl_equipment" class="table table-bordered" >    
                <thead>
                  <tr class="tbl-heading">
                    <th style="width: 3%!important;">EID</th>
                    <th style="width: 20%!important;">&nbsp;&nbsp;Equipment Name</th>
                    <th style="width: 10%!important;">&nbsp;&nbsp;Category</th>
                    <th style="width: 5%!important;">Stock</th>
                    <th style="width: 6%!important;">Inuse</th>
                    <th style="width: 6%!important;">Quantity</th>
                    <th style="width: 8%!important;"> Condtion</th>
                    <th style="width: 10%!important;"> Status</th>
                    <th class="text-center" style="width: 13%;">Action</th>
                  </tr>
                </thead>
                <tbody id="tbody_equipment">   
                  <?php #FETCH ALL DATA FROM DATABASE
                    if(isset($_GET['locationRack'])) {
                      $filterByLocationRack = $_GET['locationRack'];
                      $query = "SELECT e.*, c.category_name, t.equip_type, l.location, u.unit_type
                        FROM equipment e 
                        INNER JOIN categories c ON e.category_id = c.category_id 
                        INNER JOIN equipment_type t ON e.type_id = t.equip_id
                        INNER JOIN location_branch l ON e.location_id = l.id
                        INNER JOIN equipment_unit u ON e.unit_id = u.id
                        WHERE l.location = ?
                        ORDER BY e.date_added DESC";
                      $stmt = mysqli_prepare($connection, $query);
                      if(!$stmt){
                        throw new Exception("Failed to prepare statement" . mysqli_error($connection));
                      }
                      mysqli_stmt_bind_param($stmt, "s",  $filterByLocationRack);
                      mysqli_stmt_execute($stmt);
                      $result = mysqli_stmt_get_result($stmt);
                      if(mysqli_num_rows($result) > 0){ //check data from result
                        while($data = mysqli_fetch_assoc($result)) {
                          ?>
                            <tr>
                              <td class="equipment_id"><?=$data['id'];?></td>
                              <td>
                                <?=$data['equipment_name'];?>
                                <!-- hidden price of equipment -->
                                <input type="hidden" id="equipmentPriceTbl<?=$data['id'];?>"
                                  value="<?=$data['price'];?>"/>
                                <!-- hidden total amount of equipment -->
                                <input type="hidden" id="equipmentTotalAmtTbl<?=$data['id'];?>"
                                  value="<?=$data['amount'];?>"/>
                              </td>
                              <td>&nbsp;&nbsp;<?=$data['category_name'];?></td>
                              <td>&nbsp;&nbsp;<?=$data['stock'];?></td>
                              <td>&nbsp;&nbsp;<?=$data['in_use'];?></td>
                              <td class="td-quantiy">&nbsp;&nbsp;<?=$data['quantity'];?></td>
                              <td>
                                <?php
                                /*check if available quantity in db is mababa sa 10, then
                                set the conditon into [critical] otherwise if not [good]*/
                                if($data['quantity'] < $data['conditions']) {
                                  echo '<span class="badge badge-danger">Critical</span>';
                                } else {
                                  echo '<span class="badge badge-primary">Good</span>';
                                }
                                ?>
                                <!-- hidden condition of equipment -->
                                <input type="hidden" value="<?=$data['conditions']?>" 
                                id="equipmentCondition<?=$data['id']?>"/>
                              </td>
                              <td class="td-quantiy">
                                <?php
                                  if($data['status'] == 1) { //active
                                    echo '<span class="badge badge-success">
                                      <a href="app/actions.controller.php?equipment_id='.$data['id'].'&equipment_status='.($data['status'] == 1 ? 0 : 1).'" class="text-white">Available
                                      </a>
                                    </span>';
                                  } else { //inactive
                                    echo '<span class="badge badge-danger">
                                      <a href="app/actions.controller.php?equipment_id='.$data['id'].'&equipment_status='.($data['status'] == 1 ? 0 : 1).'" class="text-white">NOT
                                      </a>
                                    </span>';
                                  }
                                ?> 
                              </td>
                              <td class="td-action">
                                <form action="app/actions.controller.php" method="POST">
                                  <!--view button-->
                                  <button type="button" class="view-btn btn btn-primary btn-sm"
                                    data-id="<?=$data['id'];?>">
                                    <i class='ti-eye view-icon'>&#xE872;</i>
                                  </button>
                                  <!--edit button-->
                                  <button type="button" class="edit-btn btn btn-warning btn-sm"
                                    id="<?=$data['id'];?>" onclick="getHiddenData(<?=$data['id'];?>)">
                                    <i class='ti-pencil-alt edit-icon'>&#xE872;</i>
                                  </button>

                                  <!--delete button-->
                                  <input type="hidden" class="valEquipmentId" 
                                    value="<?= $data['id'];?>" />
                                  <button class="delEquipmentId btn btn-danger btn-sm m-r-10" 
                                    type="button">
                                    <i class='ti-trash delete-icon'>&#xE872;</i>
                                  </button>
                                </form>
                              </td>
                            </tr>
                          <?php
                        }
                      } 
                      else {
                        $query = "SELECT e.*, c.category_name, t.equip_type, l.location, u.unit_type
                          FROM equipment e 
                          INNER JOIN categories c ON e.category_id = c.category_id 
                          INNER JOIN equipment_type t ON e.type_id = t.equip_id
                          INNER JOIN location_branch l ON e.location_id = l.id
                          INNER JOIN equipment_unit u ON e.unit_id = u.id
                          ORDER BY e.date_added DESC";
                        $stmt = mysqli_prepare($connection, $query);
                        if(!$stmt) {
                          throw new Exception("Failed to prepare statement" . mysqli_error($connection));
                        }
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);                          
                        if(mysqli_num_rows($result) > 0) {
                          while($data = mysqli_fetch_assoc($result)) { 
                            ?> 
                              <tr>
                                <td class="equipment_id"><?=$data['id'];?></td>
                                <td>
                                 <?=$data['equipment_name'];?>
                                <!-- hidden price of equipment -->
                                <input type="hidden" id="equipmentPriceTbl<?=$data['id'];?>"
                                  value="<?=$data['price'];?>"/>
                                <!-- hidden total amount of equipment -->
                                <input type="hidden" id="equipmentTotalAmtTbl<?=$data['id'];?>"
                                  value="<?=$data['amount'];?>"/>
                                </td>
                                <td>&nbsp;&nbsp;<?=$data['category_name'];?></td>
                                <td>&nbsp;&nbsp;<?=$data['stock'];?></td>
                                <td>&nbsp;&nbsp;<?=$data['in_use'];?></td>
                                <td class="td-quantiy">&nbsp;&nbsp;<?=$data['quantity'];?></td>
                                <td>
                                  <?php
                                  /*check if available quantity in db is mababa sa 10, then
                                  set the conditon into [critical] otherwise if not [good]*/
                                  if($data['quantity'] < $data['conditions']) {
                                    echo '<span class="badge badge-danger">Critical</span>';
                                  } else {
                                    echo '<span class="badge badge-primary">Good</span>';
                                  }
                                  ?>
                                  <!-- hidden condition of equipment -->
                                 <input type="hidden" value="<?=$data['conditions']?>" 
                                  id="equipmentCondition<?=$data['id']?>"/>
                                </td>
                                <td class="td-quantiy">
                                  <?php
                                    if($data['status'] == 1) { //active
                                      echo '<span class="badge badge-success">
                                        <a href="app/actions.controller.php?equipment_id='.$data['id'].'&equipment_status='.($data['status'] == 1 ? 0 : 1).'" class="text-white">Available
                                        </a>
                                      </span>';
                                    } else { //inactive
                                      echo '<span class="badge badge-danger">
                                        <a href="app/actions.controller.php?equipment_id='.$data['id'].'&equipment_status='.($data['status'] == 1 ? 0 : 1).'" class="text-white">NOT
                                        </a>
                                      </span>';
                                    }
                                  ?> 
                                </td>
                                <td class="td-action">
                                  <form action="app/actions.controller.php" method="POST">
                                    <!--view button-->
                                    <button type="button" class="view-btn btn btn-primary btn-sm"
                                      data-id="<?=$data['id'];?>">
                                      <i class='ti-eye view-icon'>&#xE872;</i>
                                    </button>
                                    <!--edit button-->
                                    <button type="button" class="edit-btn btn btn-warning btn-sm"
                                      id="<?=$data['id'];?>" onclick="getHiddenData(<?=$data['id'];?>)">
                                      <i class='ti-pencil-alt edit-icon'>&#xE872;</i>
                                    </button>
                                    <!--delete button-->
                                    <input type="hidden" class="valEquipmentId" value="<?= $data['id'];?>" />
                                    <button class="delEquipmentId btn btn-danger btn-sm m-r-10" 
                                      type="button">
                                      <i class='ti-trash delete-icon'>&#xE872;</i>
                                    </button>
                                  </form>
                                </td>
                              </tr>
                            <?php
                          }
                        } 
                        else { 
                          ?>
                            <tr><td colspan="13">No Record Found</td></tr>
                          <?php
                        }
                      } 
                    } //end if
                    else {
                      $query = "SELECT e.*, c.category_name, t.equip_type, l.location, u.unit_type
                        FROM equipment e 
                        INNER JOIN categories c ON e.category_id = c.category_id 
                        INNER JOIN equipment_type t ON e.type_id = t.equip_id
                        INNER JOIN location_branch l ON e.location_id = l.id
                        INNER JOIN equipment_unit u ON e.unit_id = u.id
                        ORDER BY e.date_added DESC";
                      $stmt = mysqli_prepare($connection, $query);
                      if(!$stmt) {
                        throw new Exception("Failed to prepare statement" . mysqli_error($connection));
                      }
                      mysqli_stmt_execute($stmt);
                      $result = mysqli_stmt_get_result($stmt);                          
                      if(mysqli_num_rows($result) > 0) {
                        while($data = mysqli_fetch_assoc($result)) { 
                          ?> 
                            <tr>
                              <td class="equipment_id"><?=$data['id'];?></td>
                              <td data-toggle="tooltip" data-placement="left" title="<?=$data['location']?>" >
                                <?=$data['equipment_name'];?>
                                <!-- hidden price of equipment -->
                                <input type="hidden" id="equipmentPriceTbl<?=$data['id'];?>"
                                  value="<?=$data['price'];?>"/>
                                <!-- hidden total amount of equipment -->
                                <input type="hidden" id="equipmentTotalAmtTbl<?=$data['id'];?>"
                                  value="<?=$data['amount'];?>"/>
                              </td>
                              <td>&nbsp;&nbsp;<?=$data['category_name'];?></td>
                              <td>&nbsp;&nbsp;<?=$data['stock'];?></td>
                              <td>&nbsp;&nbsp;<?=$data['in_use'];?></td>
                              <td class="td-quantiy">&nbsp;&nbsp;<?=$data['quantity'];?></td>
                              <td>
                                <?php
                                /*check if available quantity in db is mababa sa conditions, ex: 10then
                                set the conditon into [critical] otherwise if not [good]
                                5 < 10 
                                */

                                if($data['quantity'] < $data['conditions']) {
                                  echo '<span class="badge badge-danger">Critical</span>';
                                } else {
                                  echo '<span class="badge badge-primary">Good</span>';
                                }
                                ?>
                                <!-- hidden condition of equipment -->
                                <input type="hidden" value="<?=$data['conditions']?>" 
                                id="equipmentCondition<?=$data['id']?>"/>
                              </td>
                              <td class="td-quantiy">
                                <?php
                                    if($data['status'] == 1) { //active
                                      echo '<span class="badge badge-success">
                                        <a href="app/actions.controller.php?equipment_id='.$data['id'].'&equipment_status='.($data['status'] == 1 ? 0 : 1).'" class="text-white">Available
                                        </a>
                                      </span>';
                                    } else { //inactive
                                      echo '<span class="badge badge-danger">
                                        <a href="app/actions.controller.php?equipment_id='.$data['id'].'&equipment_status='.($data['status'] == 1 ? 0 : 1).'" class="text-white">NOT
                                        </a>
                                      </span>';
                                    }
                                  ?> 
                              </td>
                              <td class="td-action">
                                <form action="app/actions.controller.php" method="POST">
                                  <!--view button-->
                                  <button type="button" class="view-btn btn btn-primary btn-sm"
                                    data-id="<?=$data['id'];?>">
                                    <i class='ti-eye view-icon'>&#xE872;</i>
                                  </button>
                                  <!--edit button-->
                                  <button type="button" class="edit-btn btn btn-warning btn-sm"
                                    id="edit-btn<?=$data['id'];?>" onclick="getHiddenData(<?=$data['id'];?>)">
                                    <i class='ti-pencil-alt edit-icon'>&#xE872;</i>
                                  </button>

                                  <!--delete button-->
                                  <input type="hidden" class="valEquipmentId" 
                                    value="<?= $data['id'];?>" />
                                  <button type="button" class="delEquipmentId btn btn-danger btn-sm m-r-10">
                                    <i class='ti-trash delete-icon'>&#xE872;</i>
                                  </button>
                                </form>
                              </td>
                            </tr>
                          <?php
                        }
                      } else {  //if so no data found, show this message
                        ?>
                          <tr><td colspan="13">No Record Found</td></tr>
                        <?php
                      }
                    }
                  ?>
                </tbody>
              </table>
            </div><!--card body-->
          </section><!--end section main content-->

          <div class="modal-handler">
            <!--ADD EQUIPMENT MODAL FORM--->
            <div class="modal fade" id="ADDequipmentMODAL" tabindex="-1" role="add"  aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content"><br/><br/><br/>
                  <div class="modal-header">
                    <h5 class="modal-title">ADD NEW EQUIPMENT</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <i class="ti-close">&#xE5CD;</i>
                    </button>
                  </div>
                  <form action="app/actions.controller.php" method="POST" 
                    enctype="multipart/form-data" autocomplete="off">
                    <div class="modal-body">
                      <!--image interface-->
                      <div class="img-container d-flex justify-content-center align-items-center">  
                        <img src="resources/images/system-photo/upload.jpg" id="pImage" style="width: 200px; height: 130px;" />
                      </div> 
                      <!--input equipment image-->
                      <small>Upload Equipment Image</small><br/>
                      <input type="file" accept="images/png, jpg, jpeg" 
                        name="equipment_img" id="input_equipment_img" 
                        class="form-control m-b-5 image" 
                      /> 
                      <!--equipment name-->
                      <input type="text" name="equipmentName" class="form-control m-b-5" 
                        placeholder="Enter Equipment Name" autocomplete="off" required 
                      />
                      <!--equipment type selection-->
                      <small>Select type of equipment</small><br/>
                      <select name="equipmentType_id" class="form-select form-control m-b-5">
                        <option selected>-- SELECT --</option>
                        <?php
                          $query = "SELECT * FROM equipment_type  WHERE equip_status = 1";
                          $stmt = mysqli_prepare($connection, $query);
                          mysqli_stmt_execute($stmt);
                          $result = mysqli_stmt_get_result($stmt);
                          if(mysqli_num_rows($result) > 0) {
                            foreach($result as $equipment_type) {
                              ?>
                                <option value="<?= $equipment_type['equip_id']; ?>">
                                  <?= $equipment_type['equip_type']; ?>
                                </option>
                              <?php
                            }
                          } else { echo "No data found."; }
                        ?>
                      </select>
                      <!--category selection-->
                      <small>Select category of equipment</small><br/>
                      <select name="category_id" class="form-select form-control m-b-5">
                        <option selected>-- SELECT --</option>
                        <?php
                          $query = "SELECT * FROM categories WHERE category_status = 1";
                          $stmt = mysqli_prepare($connection, $query);
                          mysqli_stmt_execute($stmt);
                          $result = mysqli_stmt_get_result($stmt);
                          if(mysqli_num_rows($result) > 0) {
                            foreach ($result as $category) {
                              ?>
                                <option value="<?= $category['category_id']; ?>">
                                  <?= $category['category_name']; ?>
                                </option>
                              <?php
                            }
                          } else { echo "No data found."; }
                        ?>
                      </select>  
                      <!--location rack selection-->
                      <small>Select location rack of equipment</small><br/>
                      <select name="equipmentLocation_id" class="form-select form-control m-b-5">
                        <option selected>-- SELECT --</option>
                        <?php
                          $query = "SELECT * FROM location_branch WHERE location_status = 1";
                          $stmt = mysqli_prepare($connection, $query);
                          mysqli_stmt_execute($stmt);
                          $result = mysqli_stmt_get_result($stmt);
                          if(mysqli_num_rows($result) > 0) {
                            foreach ($result as $location_rack) {
                              ?>
                                <option value="<?= $location_rack['id']; ?>">
                                  <?= $location_rack['location']; ?>
                                </option>
                              <?php
                            }
                          } else { echo "No data found."; }
                        ?>
                      </select>
                      <!--unit types selection-->
                      <small>Select unit type of equipment</small><br/>
                      <select name="equipmentUnit_id" class="form-select form-control m-b-5">
                        <option selected>-- SELECT --</option>
                        <?php
                          $query = "SELECT * FROM equipment_unit WHERE unit_status = 1";
                          $stmt = mysqli_prepare($connection, $query);
                          mysqli_stmt_execute($stmt);
                          $result = mysqli_stmt_get_result($stmt);
                          if(mysqli_num_rows($result) > 0) {
                            foreach ($result as $unit_type) {
                              ?>
                                <option value="<?= $unit_type['id']; ?>">
                                  <?= $unit_type['unit_type']; ?>
                                </option>
                              <?php
                            }
                          } else { echo "No data found."; }
                        ?>
                      </select>
                      <div class="row">
                        <!--equipment price-->
                        <div class="col-4">
                          <small>Price of Equipment</small><br/>
                          <input type="number" name="equipmentPrice" 
                            id="price" onkeyup ='calc()' onclick ='calc()'
                            placeholder="0" class="form-control" autocomplete="off"  required 
                          />
                        </div>
                         <!--number of stock-->
                        <div class="col-4">
                          <small>Number of Stock</small><br/>
                          <input type="number" name="numStock" 
                            id="stock" onkeyup ='calc()' onclick ='calc()'
                            placeholder="Stock" class="form-control" 
                            autocomplete="off"  required 
                          />
                        </div>
                        <div class="col-4">
                          <small>Set Condition</small><br/>
                          <input type="number" name="condition" 
                            id="condition" class="form-control" 
                            placeholder="Condition" autocomplete="off" required 
                          />
                        </div>
                      </div>

                      <div class="row">
                        <!--available quantity-->
                        <div class="col-6">
                          <small>Available Quantity</small><br/>
                          <input type="number" name="availQuantity" id="availQuantity"
                            placeholder="0" class="form-control" readonly 
                            
                          /> 
                        </div>
                        <!--total ammount-->
                        <div class="col-6">
                          <small>Total Amount</small><br/>
                          <input type="number" name="totalAmount" id="totalAmount"
                            placeholder="0" class="form-control" readonly 
                          />
                        </div>
                      </div>
                    </div><!--close modal body-->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                      <button type="submit" name="addBTN" class="btn btn-success">Submit</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>                           

            <!-- EDIT EQUIPMENT IN MODAL -->
            <div class="modal fade" id="EDITequipmentMODAL" tabindex="-1" role="edit"  aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Update Equipment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <i class="ti-close">&#xE5CD;</i>
                    </button>
                  </div>

                  <form action="app/actions.controller.php" method="POST">
                    <!-- hidden input -->
                    <input type="hidden" name="url" value="<?php if(isset($_GET['locationRack'])) { echo $_GET['locationRack']; } ?>">
                    <input type="hidden" name="users_id" value="<?=$_SESSION['user_id']?>">
                    <input type="hidden" name="equipmentId" id="equipmentID"/>
                    <!-- <input type="hidden" name="equipmentPrice" id="equipmentPrice"/> -->
                    
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-8">
                          <small>Equipment name:</small>
                          <input type="text" name="equipmentName" id="equipmentName"  
                          class="form-control equipname" autocomplete="off" />
                        </div>
                        <div class="col-4">
                          <small>Update Condition:</small>
                          <input type="text" class="form-control" autocomplete="off" 
                          name="conditions" id="conditions"/>
                        </div>
                      </div><br/>

                      <div class="row">
                        <div class="col-6">
                          <small>Add Stocks:</small>
                          <input type="text" class="form-control" id="addStock" onkeyup="calcUpdated()"
                          autocomplete="off" placeholder="0" />
                        </div>
                        <div class="col-6">
                          <small>Stocks:</small>
                          <input type="text" class="form-control nodrop" autocomplete="off" 
                          name="equipmentStock" id="equipmentStock" onkeyup="calcUpdated()" readonly />
                          <input type="hidden" class="form-control" autocomplete="off" 
                          name="prevStock" id="prevStock"/>
                        </div>
                      </div><br/>
                        <!-- hidden to be add -->
                        <!-- <input type="text" id="toBeAddInAqty" onkeyup="calcUpdated()" 
                          name="equipmentInuse" id="equipmentInuse" class="form-control" required /> -->
                      <div class="row">
                        <div class="col-3">
                          <small>Price:</small>
                          <input type="text" name="equipmentPrice" id="equipmentPrice" class="form-control nodrop" readonly />
                        </div>
                        <div class="col-3">
                          <small>Inuse:</small>
                          <input type="text" name="equipmentInuse" id="equipmentInuse" class="form-control nodrop" readonly />
                        </div>
                        <div class="col-3">
                          <small>Available qty:</small>
                          <input type="text" name="equipmentAquantity" class="form-control nodrop" 
                            id="equipmentAquantity" onkeyup="calcUpdated()" readonly />
                          <input type="hidden" id="prevAvailQty"/>
                        </div>
                        <div class="col-3">
                          <small>Total Amount:</small>
                          <input type="text" name="equipmentTotalAmtDisplay" class="form-control nodrop"
                            id="equipmentTotalAmtDisplay" onkeyup="calcUpdated()" readonly />
                          <input type="hidden"  id="prevTotalAmt"/>
                        </div>
                      </div>
                    </div><!--modal body-->
                    <div class="modal-footer">
                      <!-- hidden input -->
                      
                      <input type="hidden" id="prevStockForCalc" name="prevStockForCalc" />
                      <!-- button actions -->
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" name="editBTN" class="btn btn-success">Update</button>
                    </div>
                  </form>
                  <script>  
                    window.onload = function() {
                      //add event listener to edit button
                      let editBtn = document.getElementById('edit-btn');
                      if (editBtn) {
                        editBtn.addEventListener('click', function() {
                          //get equipment ID from button ID
                          let equipmentId = this.getAttribute('data-equipment-id');
                          //call getHiddenData() function and pass equipment ID
                          getHiddenData(equipmentId);
                        });
                      }
                    }

                    function getHiddenData(equipmentId) {
                       //get the hidden input field and the modal input field
                      let inputPriceModal = document.getElementById('equipmentPriceTbl' + equipmentId).value;
                      let inputTotalAmtModal = document.getElementById('equipmentTotalAmtTbl' + equipmentId).value;
                      let inputCondition = document.getElementById('equipmentCondition' + equipmentId).value;

                      //fetch data
                      document.getElementById('equipmentPrice').value = inputPriceModal;
                      document.getElementById('prevTotalAmt').value = inputTotalAmtModal;
                      document.getElementById('equipmentTotalAmtDisplay').value = inputTotalAmtModal;
                      document.getElementById('conditions').value = inputCondition;
                    }

                    function isEmpty(field) {
                      return field === '';
                    }

                    function calcUpdated() {
                      //initialize data
                      let addStock = parseInt(document.getElementById('addStock').value);
                      let currentStock = parseInt(document.getElementById('equipmentStock').value);
                      let currentAvailQty = parseInt(document.getElementById('equipmentAquantity').value);
                      let currentTotalAmt = parseInt(document.getElementById('equipmentTotalAmtDisplay').value);

                      const prevStock = parseInt(document.getElementById('prevStock').value);
                      const prevAvailQty = parseInt(document.getElementById('prevAvailQty').value);
                      const prevTotalAmt = parseInt(document.getElementById('prevTotalAmt').value);

                      const price = parseInt(document.getElementById('equipmentPrice').value);
                      //check if equipmentstock input is not a number or empty
                      if(isEmpty(addStock) || isNaN(addStock)) {
                        //back to the previous value of the ff:
                        document.getElementById('equipmentStock').value = prevStock;
                        document.getElementById('equipmentAquantity').value = prevAvailQty;
                        document.getElementById('equipmentTotalAmtDisplay').value = prevTotalAmt;
                      } else {
                        //calculate
                        let updateStock = addStock + prevStock;
                        let updateAvailQty = addStock + prevAvailQty;
                        let updateTotalAmt = updateStock * price;
                        //display the value
                        document.getElementById('equipmentStock').value = updateStock;
                        document.getElementById('equipmentAquantity').value = updateAvailQty;
                        document.getElementById('equipmentTotalAmtDisplay').value = updateTotalAmt;
                      }
                    }
                  </script>
                </div>
              </div>
            </div>

            <!--VIEW GENERAL EQUIPMENT MODAL FORM -->
            <div class="modal fade" id="VIEWequipmentMODAL" tabindex="-1" role="view" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
                  <br/><br/><br/><br/><br/><br/>
                  <div class="modal-header">
                    <h5 class="modal-title" id="view">VIEW EQUIPMENT</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <i class="ti-close" aria-hidden="true"> </i>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="equipmentVIEW_data">
                      <!--data come from server ajax request-->
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                      Close
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div> <!--end modal handler-->
          
        </div><!--container fluid-->
      </div> <!--div main-->
    </div> <!--content wrap-->   
   </body>
</html>
<script defer>
  //onchange equipment image
  var selector = document.querySelector("#input_equipment_img");
  var equipment_img = document.querySelector(".img-container img");

  selector.addEventListener("change", function() {
    const file = this.files[0];
      if(file) { //check file if inseretd
      //if it is successfully inserted, execute this statements
      let reader = new FileReader(); //get user file
      reader.addEventListener("load", function() {
        //the default image replace by the uploaded image
        equipment_img.setAttribute("src", this.result);
      })
      //show file url in input box [e.g. filename.png/jpg/jpg]
      reader.readAsDataURL(file)  
    } else{
      //console.log('failed');
    }
  });

  //calculate available qty and total amt
  function calc() {
    const enteredPrice = document.getElementById('price').value;
    const enteredStock = document.getElementById('stock').value;

    //let entered stock must be equal to available quantity
    let AvailableQuantity = enteredStock;
    document.getElementById('availQuantity').value = AvailableQuantity;

    let TotalAmount = enteredPrice * enteredStock;    //multiply entered price in to entered stock 
    document.getElementById('totalAmount').value = TotalAmount;  //let the result is equal onto total ammount
  }

  //PREVENT USER TO LOGIN SAME ACCOUNT IN DIFFERENT DEVICE OR LOCATION
  function check_sesssion_id() {
    var session_id = "<?php echo $_SESSION['session_id']; ?>";
    fetch('app/check_login.php').then(function(response){
      return response.json(); //send data in json format
    }).then(function(responseData){
      if(responseData.output == 'logout'){
        window.location.href = '../auth/logout.php';
      }
    });
  }
  setInterval(function(){
    check_sesssion_id();
  }, 10000);
   
  //start jquery
  $(document).ready(function() {
    //equipment data table
    $('#tbl_equipment').dataTable({ 
      ordering: false,
      bJQueryUI: true,
      sPaginationType: "full_numbers"
    });

    //tool tip
    $(function () {
      $('[data-toggle="tooltip"]').tooltip();
    });

    //to view equipment data on modal
    $('#tbody_equipment').on("click", ".view-btn", function(viewEvent) {
      viewEvent.preventDefault();
      //alert('test');

      $('#VIEWequipmentMODAL').modal('show'); //show modal
      var equipment_id = $(this).closest('tr').find('.equipment_id').text();
      //console.log(equipment_id);

      //send ajax request to the server
      $.ajax({
        url: "app/actions.controller.php", //file to be send request
        method: "POST", //send data via post method
        data: { //data to be retrieve $_POST[]
          executeVIEWBtn: true,
          equipment_id: equipment_id,
        },
        success: function(response) { //if success
          // console.log(response);
          $('.equipmentVIEW_data').html(response); 
        }
      });
    });

    //to edit equipment in modal
    $('#tbody_equipment').on("click", ".edit-btn", function(editEvent) {
      editEvent.preventDefault();
      //alert("test");
      $('#EDITequipmentMODAL').modal('show');

      $tr = $(this).closest('tr')
      var dataEditEquipment = $tr.children("td").map(function() {
         return $(this).text();
      }).get();
      // console.log(dataEditEquipment);

      //fetch data in input field availQuantityForCalc

      $('#equipmentID').val(dataEditEquipment[0]); 
      $('#equipmentName').val(dataEditEquipment[1].replace(/\s+/g, '')); 
      $('#equipmentStock').val(dataEditEquipment[3]);
      $('#prevStock').val(dataEditEquipment[3]);
      $('#prevStockForCalc').val(dataEditEquipment[3]);
      $('#equipmentInuse').val(dataEditEquipment[4]);
      $('#equipmentAquantity').val(dataEditEquipment[5]);
      $('#prevAvailQty').val(dataEditEquipment[5]);
    });

    //to confirm delete equipment
    $('#tbody_equipment').on("click", ".delEquipmentId", function(deleteEvent) {
      deleteEvent.preventDefault();
      // alert("test");
      var deleteEquipmentId = $(this).closest("tr").find('.valEquipmentId').val();
      //console.log(deleteEquipmentId);
      swal({ //pop up confirmation
        title: "Are you sure to delete?",
        text: "Once deleted, you will not be able to recover this record",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it",
        cancelButtonText: "No, cancel it",
        closeOnConfirm: false,
        closeOnCancel: false
      },
        function(willDeleteThatEquipment) {
          if(willDeleteThatEquipment) {
            //send ajax request to server
            $.ajax({
              url: "app/actions.controller.php", //file to be send request
              method: "POST", //send via post method
              data: { //data to be retrieve $_POST[]
                deleteBtnSetEquipment: true,
                deleteEquipmentId: deleteEquipmentId
              },
              success:function(data){ //if success
                //console.log(data);
                swal({
                  title: "Deleted!",
                  text: "Equipment record deleted successfully",
                  type: "success"
                }, function() {
                  window.location = "equipments";
                });
              }
            });
          } else {
            swal("Cancelled!", "Equipment record is safe!", "error");
          }
        }
      );
    });
  }); //end document ready()
</script>   