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

    <title>GMCIS | Categories</title>
    <link rel="icon" type="image/png" href="resources/images/system-photo/gmc.favicon.png" sizes="16x16" />
    <?php require_once __DIR__ . '/components/css.file-links.inc.php';?>
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
           <!--testsadasd-->
            <div class="col-lg-4 p-l-0 title-margin-left">
              <div class="page-header">
                <div class="page-title">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item" style="margin-left: -50px;">
                      <a href="categories" class="active"> Categories</a>
                    </li>
                    <li class="breadcrumb-item">Dashboard</li>
                  </ol>
                </div>
              </div>
            </div>     
          </div> <!--end row-->

          <!--FOR MAIN BODY CONTENT-->
          <div class="card">
            <div class="card-body p-b-0">
              <!-- Nav tabs -->
              <div class="customtab2">                  
                <ul class="nav nav-tabs " role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#category" role="tab">
                      <span class="hidden-down">Category Type</span> 
                    </a> 
                  </li>      
                  <li class="nav-item"> 
                    <a class="nav-link" data-toggle="tab" href="#equipmentTYPE" role="tab">
                      <span class="hidden-down">Equipment Type</span>
                    </a> 
                  </li>
                  <li class="nav-item"> 
                    <a class="nav-link" data-toggle="tab" href="#location" role="tab">
                      <span class="hidden-down">Location Rack</span>
                    </a> 
                  </li>
                  <li class="nav-item"> 
                    <a class="nav-link" data-toggle="tab" href="#unitTYPE" role="tab">
                      <span class="hidden-down">Unit Type</span>
                    </a> 
                  </li>
                </ul>
                <!--start tab content-->                   
                <div class="tab-content">
                  <!--start category tab-->
                  <div class="tab-pane active" id="category" role="tabpanel">
                    <div class="p-10">
                      <div class="category-card"><br/>
                        <div class="card-title pr">
                          <button type="button"  data-toggle="modal" data-target="#addCategory" class="btn btn-light text-capitalize">
                          <i class="far fa-solid fa-circle-plus text-success"></i> Category
                        </button> 
                        </div><br/> 
                        <!--start category data table-->                                           
                        <table id="tbl_category" class="table categories-data-table table-bordered"> 
                          <thead>
                            <tr>
                              <th style="width: 3%!important;" scope="col">CID</th>
                              <th scope="col">Category</th>
                              <th style="width: 11%!important;" scope="col">Status</th>
                              <th scope="col">Date & Time Added</th>
                              <th style="width: 12%!important;" scope="col">Added by</th>
                              <th style="width: 10%!important;" scope="col" class="text-center">Action</th>
                            </tr>
                          </thead>
                          <tbody id="tbody_categories" >
                          <!--FETCH ALL DATA FROM DATABASE-->
                          <?php
                            $query = "SELECT c.*, a.acct_name
                              FROM categories c
                              INNER JOIN users a ON c.user_id = a.id
                              ORDER BY c.date_added DESC";
                            $stmt = mysqli_prepare($connection, $query);
                            mysqli_stmt_execute($stmt);
                            $result = mysqli_stmt_get_result($stmt);
                            if(mysqli_num_rows($result) > 0) { //check data from result                     
                              while($data = mysqli_fetch_assoc($result)) { //fetch all data found
                                $date_added = date("M-d-Y / H:i A", strtotime($data['date_added'])); 
                                ?>
                                  <tr>
                                    <td><?= $data['category_id']; ?></td>
                                    <td><?= $data['category_name']; ?></td>
                                    <td>
                                      <?php
                                        if($data['category_status'] == 1) {
                                          echo '<span class="badge badge-success"><a href="app/actions.controller.php?category_id='.$data['category_id'].'&category_status=0" class="text-white" style="font-size: 12px;">AVAILABLE</a></span>';
                                        } else {
                                          echo '<span class="badge badge-danger"><a href="app/actions.controller.php?category_id='.$data['category_id'].'&category_status=1" class="text-white">NOT</a></span>';
                                        }
                                      ?> 
                                    </td>
                                    <td><?= $date_added; ?></td>
                                    <td><?= $data['acct_name']; ?></td>
                                    <td>
                                      <form action="app/actions.controller.php" method="POST">
                                        <button type="button" class="edit_btn btn-warning btn btn-sm"
                                          id="<?= $data['category_id'];?>">
                                          <i class='ti-pencil-alt' >&#xE872;</i>
                                        </button>

                                        <input type="hidden" class="valCategoryId" 
                                          value="<?=$data['category_id']?>" />
                                        <button type="button" class="delCategoryId btn-danger btn btn-sm">
                                          <i class='ti-trash' >&#xE872;</i>
                                        </button>
                                      </form>
                                    </td> 
                                  </tr>
                                <?php
                              }
                            } else {
                              ?>
                                <tr><td colspan="5">No Record Found</td></tr>
                              <?php
                            }
                          ?>
                          </tbody>
                        </table> 
                      </div> <!--end category card-->
                    </div><!--p-10-->
                  </div><!--end tabpane for category-->

                  <!--start equipment type tab-->
                  <div class="tab-pane" id="equipmentTYPE" role="tabpanel">
                    <div class="p-10">
                      <div class="equipment-type-card"><br/>
                        <div class="card-title pr">

                          <button type="button"  data-toggle="modal" data-target="#addEquipType" class="btn btn-light text-capitalize">
                      <i class="far fa-solid fa-circle-plus text-success"></i> Equipment Type
                     </button> 
                        </div><br/> 
                        <!--start data table for equipment type-->                          
                        <table id="tbl_equipType" class="table equipment-type-data-table  table-bordered"> 
                          <thead>
                            <tr>
                              <th style="width: 10%!important;" scope="col">ETID</th>
                              <th scope="col">Equipment Type</th>
                              <th style="width: 50%!important;" scope="col">Status</th>
                              <th style="width: 80%!important;" scope="col">Date & Time Added</th>
                              <th style="width: 80%!important;" scope="col">Added by</th>
                              <th style="width: 45%!important;" scope="col" class="text-center">Action</th>
                            </tr>
                          </thead>
                          <tbody id="tbody_equipType" >
                            <?php
                              $query = "SELECT et.*, a.acct_name
                                FROM equipment_type et
                                INNER JOIN users a ON et.user_id = a.id 
                                ORDER BY et.date_added DESC";
                              $stmt = mysqli_prepare($connection, $query);
                              mysqli_stmt_execute($stmt);
                              $result = mysqli_stmt_get_result($stmt);
                              if (mysqli_num_rows($result) > 0) {
                                while($data = mysqli_fetch_assoc($result)) {
                                  $date_added = date("M-d-Y / H:i A", strtotime($data['date_added'])); 
                                  ?>
                                    <tr>
                                      <td><?= $data['equip_id']; ?></td>
                                      <td><?= $data['equip_type']; ?></td>
                                      <td>
                                        <?php
                                          if ($data['equip_status'] == 1) {
                                            echo '<span class="badge badge-success"><a href="app/actions.controller.php?equipType_id='.$data['equip_id'].'&equip_status=0" class="text-white" style="font-size: 12px;">AVAILABLE</a></span>';
                                          } else {
                                            echo '<span class="badge badge-danger"><a href="app/actions.controller.php?equipType_id='.$data['equip_id'].'&equip_status=1" class="text-white">NOT</a></span>';
                                          }
                                        ?> 
                                      </td>
                                      <td><?= $date_added ?></td>
                                      <td><?= $data['acct_name']; ?></td>
                                      <td>
                                        <form action="app/actions.controller.php" method="POST">
                                          <button type="button" class="edit_equip btn-warning btn btn-sm"
                                            id="<?= $data['equip_id'];?>">
                                            <i class='ti-pencil-alt' >&#xE872;</i>
                                          </button>

                                          <input type="hidden" class="valEquipTypeId" 
                                            value="<?=$data['equip_id']?>" />
                                          <button type="button" class="delEquipTypeId btn-danger btn btn-sm">
                                            <i class='ti-trash' >&#xE872;</i>
                                          </button>
                                        </form>
                                      </td> 
                                    </tr>
                                  <?php
                                }
                              } else { //if so, no data exist or found
                                ?>
                                  <tr><td colspan="6">No Record Found</td></tr>
                                <?php
                              }
                            ?>
                          </tbody>
                        </table>
                      </div> <!--equipment type card-->
                    </div><!--p-10-->
                  </div><!--end tabpane for equipment type-->

                  <!--start location rack tab-->
                  <div class="tab-pane" id="location" role="tabpanel">
                    <div class="p-10">
                      <div class="location-rack-card"><br/> 
                        <div class="card-title pr">
                          <button type="button"  data-toggle="modal" data-target="#addLocationRack" class="btn btn-light text-capitalize">
                            <i class="far fa-solid fa-circle-plus text-success"></i> Location Rack
                          </button> 
                        </div><br/>                               
                        <table id="tbl_location" class="table equipment-type-data-table  table-bordered"> 
                          <thead>
                            <tr>
                              <th style="width: 10%!important;" scope="col">LRID</th>
                              <th scope="col">Location Rack</th>
                              <th style="width: 45%!important;" scope="col">Status</th>
                              <th style="width: 80%!important;" scope="col">Date & Time Added</th>
                              <th style="width: 60%!important;" scope="col">Added by</th>
                              <th style="width: 50%!important;" scope="col" class="text-center">Action</th>
                            </tr>
                          </thead>
                          <tbody id="tbody_location" >
                            <?php
                              $query = "SELECT lb.*, a.acct_name
                                FROM location_branch lb
                                INNER JOIN users a ON lb.user_id = a.id 
                                ORDER BY lb.date_added DESC";
                              $stmt = mysqli_prepare($connection, $query);
                              mysqli_stmt_execute($stmt);
                              $result = mysqli_stmt_get_result($stmt);
                              if(mysqli_num_rows($result) > 0){
                                while($data = mysqli_fetch_assoc($result)) { 
                                  $date_added = date("M-d-Y / H:i A", strtotime($data['date_added'])); 
                                  ?>
                                    <tr>
                                      <td><?= $data['id']; ?></td>
                                      <td><?= $data['location']; ?></td>
                                      <td>
                                        <?php
                                          if ($data['location_status'] == 1) {
                                            echo '<span class="badge badge-success"><a href="app/actions.controller.php?locationRack_id='.$data['id'].'&location_status=0" class="text-white" style="font-size: 12px;">AVAILABLE</a></span>';
                                          } else {
                                            echo '<span class="badge badge-danger"><a href="app/actions.controller.php?locationRack_id='.$data['id'].'&location_status=1" class="text-white">NOT</a></span>';
                                          }
                                        ?> 
                                      </td>
                                      <td><?= $date_added; ?></td>
                                      <td><?= $data['acct_name']; ?></td>
                                      <td>
                                        <form action="app/actions.controller.php" method="POST">
                                          <button type="button" class="edit_locrack btn-warning btn btn-sm"
                                            id="<?= $data['id'];?>">
                                            <i class='ti-pencil-alt' >&#xE872;</i>
                                          </button>

                                          <input type="hidden" class="valLocatonRackId" 
                                            value="<?=$data['id']?>" />
                                          <button type="button" class="delLocationRackId btn-danger btn btn-sm">
                                            <i class='ti-trash' >&#xE872;</i>
                                          </button>
                                        </form>
                                      </td> 
                                    </tr>
                                  <?php
                                }
                              } else {
                                ?>
                                  <tr><td colspan="5">No Record Found</td></tr>
                                <?php
                              }
                            ?>
                          </tbody>
                        </table>
                      </div> <!-- location rack card-->
                    </div><!--p-10-->
                  </div><!--end tabpane for location-->

                  <!--start unit type tab-->
                  <div class="tab-pane" id="unitTYPE" role="tabpanel">
                    <div class="p-10">
                      <div class="equipment-type-card"><br/>
                        <div class="card-title pr">
                          <button type="button"  data-toggle="modal" data-target="#addUnitType" class="btn btn-light text-capitalize">
                            <i class="far fa-solid fa-circle-plus text-success"></i> Unit Type 
                          </button>   
                        </div><br/>                                            
                        <table id="tbl_unitType" class="table equipment-type-data-table table-bordered"> 
                          <thead>
                            <tr>
                              <th style="width: 25%!important;" scope="col">UTID</th>
                              <th scope="col">Location Rack</th>
                              <th style="width: 40%!important;" scope="col">Status</th>
                              <th style="width: 80%!important;" scope="col">Date & Time Added</th>
                              <th style="width: 70%!important;" scope="col">Added by</th>
                              <th style="width: 40%!important;" scope="col" class="text-center">Action</th>
                            </tr>
                          </thead>
                          <tbody id="tbody_unitType">
                            <?php
                              $query = "SELECT ut.*, a.acct_name
                                FROM equipment_unit ut
                                INNER JOIN users a ON ut.user_id = a.id 
                                ORDER BY ut.date_added DESC";
                              $stmt = mysqli_prepare($connection, $query);
                              mysqli_stmt_execute($stmt);
                              $result = mysqli_stmt_get_result($stmt);
                              if(mysqli_num_rows($result) > 0) {
                                while($data = mysqli_fetch_assoc($result)) { 
                                  $date_added = date("M-d-Y / H:i A", strtotime($data['date_added'])); 
                                  ?>
                                    <tr>
                                      <td><?= $data['id']; ?></td>
                                      <td><?= $data['unit_type']; ?></td>
                                      <td>
                                        <?php
                                          if($data['unit_status'] == 1) {
                                            echo '<span class="badge badge-success"><a href="app/actions.controller.php?unitType_Id='.$data['id'].'&unit_status=0" class="text-white" style="font-size: 12px;">AVAILABLE</a></span>';
                                          } else {
                                            echo '<span class="badge badge-danger"><a href="app/actions.controller.php?unitType_Id='.$data['id'].'&unit_status=1" class="text-white">NOT</a></span>';
                                          }
                                        ?> 
                                      </td>
                                      <td><?= $date_added; ?></td>
                                      <td><?= $data['acct_name']; ?></td>
                                      <td>
                                        <form action="app/actions.controller.php" method="POST">
                                          <button type="button" class="edit_unitType btn-warning btn btn-sm"
                                            id="<?= $data['id'];?>">
                                            <i class='ti-pencil-alt' >&#xE872;</i>
                                          </button>

                                          <input type="hidden" class="valUnitTypeId" 
                                            value="<?=$data['id']?>" />
                                          <button type="button" class="delUnitTypeId btn-danger btn btn-sm">
                                            <i class='ti-trash' >&#xE872;</i>
                                          </button>
                                        </form>
                                      </td> 
                                    </tr>
                                  <?php
                                }
                              } else { //if so, no data found
                                ?>
                                  <tr><td colspan="6">No Record Found</td></tr>
                                <?php
                              }
                            ?>
                          </tbody>
                        </table>
                      </div> <!--unit type card-->  
                    </div><!--p-10-->
                  </div><!--end tabpane for unit type-->

                </div> <!--end tab content-->
              </div><!--end customtab2-->
            </div><!--card body-->
          </div><!--card-->
        </div><!--container fluid-->
      </div> <!--main-->
    </div>  <!--content-wrap-->

      <div class="modal-handler">
        <!-- POP UP MODAL ADD CATEGORY -->
        <div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="addCategory" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Add Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="ti-close">&#xE5CD;</i>
                </button>
              </div>
              <form action="app/actions.controller.php" method="POST">
                <div class="modal-body">
                  <input type="text" name="category_name" class="form-control" placeholder="Category name..." autocomplete="off" required> 
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" name="add_category" class="btn btn-success">Add</button>
                </div>
              </form> 
            </div>
          </div>
        </div>
        <!--CLOSE POP UP MODAL ADD CATEGORY -->

        <!-- POP UP MODAL EDIT CATEGORY -->
        <div class="modal fade" id="category_edit_accountModal" tabindex="-1" role="edit" aria-labelledby="editCategory" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Edit Category Name</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <i class="ti-close">&#xE5CD;</i>
                </button>
              </div>
              <form action="app/actions.controller.php" method="POST">
                <input type="hidden" name="edit_id" id="edit_id"/>
                <div class="modal-body">
                  <input type="text" name="edit_category_name" id="category_name" class="form-control"autocomplete="off"/>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" name="edit_category_btn" class="btn btn-success">Save</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- CLOSE POP UP MODAL EDIT CATEGORY -->

        <!-- POP UP MODAL ADD EQUIPMENT TYPE -->
        <div class="modal fade" id="addEquipType" tabindex="-1" role="dialog" aria-labelledby="addEquipType" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Add Equipment Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <i class="ti-close">&#xE5CD;</i>
                </button>
              </div>
              <form action="app/actions.controller.php" method="POST">
                <div class="modal-body">
                  <input type="text" name="equipment_type" class="form-control" placeholder="Equipment type..." autocomplete="off" required> 
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" name="addEquipType" class="btn btn-success">Add</button>          
                </div>
              </form> 
            </div>
          </div>
        </div>
        <!--CLOSE POP UP MODAL ADD EQUIPMENT TYPE -->

        <!-- POP UP MODAL EDIT EQUIPMENT TYPE -->
        <div class="modal fade" id="equipType_edit_accountModal" tabindex="-1" role="editEquipType2"  aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Edit Equipment Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <i class="ti-close">&#xE5CD;</i>
                </button>
              </div>
              <form action="app/actions.controller.php" method="POST">
                <input type="hidden" name="editEquip_id" id="editEquip_id"/>
                <div class="modal-body">
                  <input type="text" name="edit_equip_name" id="edit_equip_name" class="form-control"autocomplete="off"/>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" name="editEquipType" class="btn btn-success">Save</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!--CLOSE POP UP MODAL EDIT EQUIPMENT TYPE -->

        <!-- POP UP MODAL ADD LOCATION RACK -->
        <div class="modal fade" id="addLocationRack" tabindex="-1" role="dialog" aria-labelledby="addLocationRack" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Add Location Rack</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <i class="ti-close">&#xE5CD;</i>
                </button>
              </div>
              <form action="app/actions.controller.php" method="POST">
                <div class="modal-body">
                  <input type="text" name="location_rack" class="form-control" placeholder="Location rack..." autocomplete="off" required> 
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" name="addLocRack" class="btn btn-success">Add</button>
                </div>
              </form> 
            </div>
          </div>
        </div>
        <!--CLOSE POP UP MODAL ADD LOCATION RACK-->


        <!-- POP UP MODAL EDIT LOCATION RACK -->
        <div class="modal fade" id="locrack_edit_accountModal" tabindex="-1" role="editLocRack"  aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Edit Location Rack</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <i class="ti-close">&#xE5CD;</i>
                </button>
              </div>
              <form action="app/actions.controller.php" method="POST">
                <input type="hidden" name="editLocRack_id" id="editLocRack_id"/>
                <div class="modal-body">
                  <input type="text" name="edit_locrack_name" id="edit_locrack_name" class="form-control"autocomplete="off"/>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" name="editLocRack" class="btn btn-success">Save</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!--CLOSE POP UP MODAL EDIT LOCATION RACK -->

        <!-- POP UP MODAL ADD UNIT TYPE -->
        <div class="modal fade" id="addUnitType" tabindex="-1" role="dialog" aria-labelledby="addUnitType" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Add Unit Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <i class="ti-close">&#xE5CD;</i>
                </button>
              </div>
              <form action="app/actions.controller.php" method="POST">
                <div class="modal-body">
                  <input type="text" name="unit_type" class="form-control" placeholder="Unit type..." autocomplete="off" required> 
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" name="addUnitType" class="btn btn-success">Add</button> 
                </div>
              </form> 
            </div>
          </div>
        </div>
        <!--CLOSE POP UP MODAL ADD UNIT TYPE-->

        <!-- POP UP MODAL EDIT UNIT TYPE -->
        <div class="modal fade" id="unitType_edit_accountModal" tabindex="-1" role="editLocRack"  aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Edit Unit type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <i class="ti-close">&#xE5CD;</i>
                </button>
              </div>
              <form action="app/actions.controller.php" method="POST">
                <input type="hidden" name="editUnitType_id" id="editUnitType_id"/>
                <div class="modal-body">
                  <input type="text" name="edit_unitType_name" id="edit_unitType_name" class="form-control"autocomplete="off"/>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" name="editUnitType" class="btn btn-success">Save</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!--CLOSE POP UP MODAL EDIT UNIT TYPE -->
      </div>

    
    <script defer>
      /********************************************************
 *  ©JEROME AVECILLA -> ICT 12 DIGNIFIED S.Y 2022-2023
 *******************************************************/


//START AJAX CODE
$(document).ready(function() {
   //DATA TABLE
   $('#tbl_category, #tbl_equipType, #tbl_location, #tbl_unitType').dataTable({
      "ordering": false
   });

   /*******************************
   /        CATEGORY LIST
   ********************************/
   //FUNCTION TO UPDATE CATEGORY IN MODAL
   $('#tbody_categories').on("click", ".edit_btn", function() {
      //alert("test");
      $('#category_edit_accountModal').modal('show'); //show modal

      $tr1 = $(this).closest('tr')
      var dataEditCategory = $tr1.children("td").map(function() {
         return $(this).text();
      }).get();
      // console.log(dataEditCategory);
      $('#edit_id').val(dataEditCategory[0]); 
      $('#category_name').val(dataEditCategory[1]);
   });
   //FUNCTION CONFIRMATION TO DELETE CATEGORY
   $('#tbody_categories').on("click", ".delCategoryId", function(category) {
      category.preventDefault();
      //alert("test");
      var deleteCategoryId = $(this).closest("tr").find('.valCategoryId').val();
      //alert(deleteCategoryId);
      swal({  //pop up confirmation
         title: "Are you sure to delete?",
         text: "Once deleted, you will not be able to recover this record!",
         type: "warning",
         showCancelButton: true,
         confirmButtonColor: "#DD6B55",
         confirmButtonText: "Yes, delete it",
         cancelButtonText: "No, cancel it",
         closeOnConfirm: false,
         closeOnCancel: false,
      },
         function(willDeleteCategory) {
            if(willDeleteCategory) { //user click ok
               $.ajax({   //send ajax request to server
                  url: "app/actions.controller.php", //file to be send request
                  method: "POST",         //send via post method
                  data: {        //retrieve data
                     deleteBtnSetCategory: 1,
                     deleteCategoryId: deleteCategoryId,
                  },
                  success:function(data1){    //if success
                     swal({
                        title: "Deleted!",
                        text: "Category data deleted successfully",
                        type: "success"
                     }, function() {
                        window.location = "categories";
                     });
                  } //end succss
               }); //end ajax
            } else {    //user click cancel
               swal("Cancelled!", "Category record is safe", "error");
            }
         }
      );
   });


   /*******************************
   /       EQUIPMENT TYPE LIST
   ********************************/
   //FUNCTION TO UPDATE EQUIPMENT TYPE IN MODAL
   $('#tbody_equipType').on("click", ".edit_equip", function() {
      //alert("test");
      $('#equipType_edit_accountModal').modal('show');

      $tr2 = $(this).closest('tr')
      var dataEditEquipmentType = $tr2.children("td").map(function() {
         return $(this).text();
      }).get();
      // console.log(dataEditEquipmentType);
      $('#editEquip_id').val(dataEditEquipmentType[0]);
      $('#edit_equip_name').val(dataEditEquipmentType[1]);
   });
   //FUNCTION CONFIRMATION TO DELETE EQUIPMENT TYPE
   $('#tbody_equipType').on("click", ".delEquipTypeId", function(equipmentType) {
      equipmentType.preventDefault();
      // alert("test");
      var deleteEquipTypeId = $(this).closest("tr").find('.valEquipTypeId').val();
      // alert(deleteEquipTypeId);
      swal({
         title: "Are you sure to delete ?",
         text: "Once deleted, you will not be able to recover this record!",
         type: "warning",
         showCancelButton: true,
         confirmButtonColor: "#DD6B55",
         confirmButtonText: "Yes, delete it",
         cancelButtonText: "No, cancel it",
         closeOnConfirm: false,
         closeOnCancel: false,
      },
         function(willDeleteEquipmentType) {
            if(willDeleteEquipmentType) {
               $.ajax({
                  url: "app/actions.controller.php",
                  method: "POST",
                  data: {
                     deleteBtnSetEquipType: 1,
                     deleteEquipTypeId: deleteEquipTypeId
                  },
                  success:function(data2) {
                     swal({
                        title: "Deleted!",
                        text: "Equipment type data deleted successfully",
                        type: "success"
                     }, function() {
                        window.location = "categories";
                     });
                  }
               });
            } else {
               swal("Cancelled!", "Equipment type record is safe", "error");
            }
         }
      );
   });


   /*******************************
   /     LOCATION RACK LIST
   ********************************/
   //FUNCTION TO UPDATE LOCATION RACK IN MODAL
   $('#tbody_location').on("click", ".edit_locrack", function() {
      $('#locrack_edit_accountModal').modal('show');

      $tr3 = $(this).closest('tr')
      var dataEditLocationRack = $tr3.children("td").map(function() {
         return $(this).text();
      }).get();
      //console.log(dataEditLocationRack);

      $('#editLocRack_id').val(dataEditLocationRack[0]);
      $('#edit_locrack_name').val(dataEditLocationRack[1]);

   });

   //FUNCTION CONFIRMATION TO DELETE LOCATION RACK
   $('#tbody_location').on("click", ".delLocationRackId", function(locationRack) {
      locationRack.preventDefault();
      //alert("test");
      var deleteLocationRackId = $(this).closest("tr").find('.valLocatonRackId').val();
      //alert(deleteLocationRackId);
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
         function(willDeleteLocationRack) {
            if(willDeleteLocationRack) {
               $.ajax({
                  url: "app/actions.controller.php",
                  method: "POST",
                  data: {
                     deleteBtnSetLocationRack: 1,
                     deleteLocationRackId: deleteLocationRackId,
                  },
                  success:function(data3){
                     swal({
                        title: "Deleted!",
                        text: "Location rack data deleted successfully",
                        type: "success"
                     }, function() {
                        window.location = "categories";
                     });
                  }
               });
            } else {
               swal("Cancelled!", "Location rack record is safe", "error");
            }
         }
      );
   });


   /*******************************
   /     UNIT TYPE LIST
   ********************************/
   //FUNCTION TO UPDATE LOCATION RACK IN MODAL
   $('#tbody_unitType').on("click", ".edit_unitType", function() {
      $('#unitType_edit_accountModal').modal('show');

      $tr4 = $(this).closest('tr')
      var dataEditUnitType = $tr4.children("td").map(function() {
         return $(this).text();
      }).get();
      // console.log(dataEditUnitType);

      $('#editUnitType_id').val(dataEditUnitType[0]);
      $('#edit_unitType_name').val(dataEditUnitType[1]);
   });
   //FUNCTION CONFIRMATION TO DELETE UNIT TYPE
   $('#tbody_unitType').on("click", ".delUnitTypeId", function(unitType) {
      unitType.preventDefault();
      // alert("test");
      let deleteUnitTypeId = $(this).closest("tr").find('.valUnitTypeId').val();
      // alert(deleteUnitTypeId);
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
         function(willDeleteUnitType) {
            if(willDeleteUnitType) {
               $.ajax({
                  url: "app/actions.controller.php",
                  method: "POST",
                  data: {
                     deleteBtnSetUnitType: 1,
                     deleteUnitTypeId: deleteUnitTypeId,
                  },
                  success:function(data4) {
                     swal({
                        title: "Deleted!",
                        text: "Unit type data deleted successfully",
                        type: "success"
                     }, function() {
                        window.location = "categories";
                     });
                  }
               });
            } else {
               swal("Cancelled!", "Unit type record is safe", "error");
            }
         }
      );
   });


}); //end document ready function
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