<?php
//declare(strict_types=1); //enable stict mode for declaring variable
ini_set('display_errors',  1); //show verbose error if occured
session_start();  
require_once __DIR__ . '/../config/db.connection.php'; 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    
    <title>GMCIS Borrower Record</title>
    <link rel="icon" type="image/png" href="../resources/images/system-photo/gmc.favicon.png" sizes="16x16" />

       <!--LIBRARY ICONS FILE-->
    <link href="../../../vendor/libs/bootstrap/css/icons/themify-icons.css" rel="stylesheet">
    <link href="../../../vendor/libs/bootstrap/css/icons/helper.css" rel="stylesheet">
    <link href="../../../vendor/libs/icons/all.min.css" rel="stylesheet">
    <link href="../../../vendor/libs/icons/fontawesome.min.css" rel="stylesheet">
   
    <!--LIBRARY FRAMEWORK[BOOTSTRAP] FILE-->
    <link href="../../../vendor/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../../vendor/libs/bootstrap/css/owl.carousel.min.css" rel="stylesheet" />
    <link href="../../../vendor/libs/bootstrap/css/bootstrap.animate.css" rel="stylesheet">

    <link href="../../../vendor/plugins/sweetalert/sweetalert.css" rel="stylesheet">
    <link href="../../../vendor/libs/datatables/datatables.min.css" rel="stylesheet"/>
    <link href="../../../vendor/libs/datatables/datatables.css" rel="stylesheet"/>

    <!-- CSS CORE FILE -->
    <link defer href="../resources/css/style.css" rel="stylesheet" />
    <link defer href="../resources/css/sidebar.css" rel="stylesheet" />
    
    <!--LIBRARY FRAMEWORK[JQUERY] FILE-->
    <script src="../../../vendor/plugins/jquery/jquery.min.js"></script>
    <script src="../../../vendor/plugins/jquery/jquery.nanoscroller.min.js"></script>

    <!--LIBRARY FRAMEWORK[BOOTSTRAP] FILE-->
    <script src="../../../vendor/libs/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../../vendor/libs/bootstrap/js/bootstrap.wow.min.js"></script>

    <script src="../../../vendor/plugins/sweetalert/sweetalert.min.js"></script>
    <script src="../../../vendor/libs/bootstrap/js/menubar/sidebar.js"></script>
    <script src="../../../vendor/libs/bootstrap/js/preloader/pace.min.js"></script>

    <script src="../../../vendor/libs/datatables/datatables.min.js"></script>
    <script src="../../../vendor/libs/datatables/datatables.js"></script>

    <!-- JS CORE FILE -->
    <script async src="../resources/js/scripts.js" defer></script>
    <style type="text/css">
      label {
        font-size: 16px;
      }
      input.readonly {
        pointer-events: none;
      }
      input.borderno {
        border: none;
      }
    </style>
  </head>
  <body style="background: url('../resources/images/system-photo/gmc-bg.png');">
     <?php require_once __DIR__ . './../components/msgalert.contr.inc.php';?>

    <div class="content-wrap">
      <div class="main">
        <div class="container-fluid">
          <section id="main-content" style="margin-left: 10%;">
            <?php 
              $query = "SELECT c.*, lb.* FROM costumers c
                INNER JOIN location_branch lb ON c.school_id = lb.id
                WHERE c.costumer_id = ?";
              $stmt = mysqli_prepare($connection, $query);
              mysqli_stmt_bind_param($stmt, "i", $_GET['id']);
              mysqli_stmt_execute($stmt);
              $result = mysqli_stmt_get_result($stmt);
              $costumer = mysqli_fetch_assoc($result);
            ?>

            <!--start costumer-profile-->
            <div class="costumer-profile card" style="width: 90%;">
              <div class="card-title pr">
                <!-- back btn -->
                <button type="button" onclick="window.location.href='../return'" class="btn btn-light text-capitalize border-0"><i class="fa-sharp fa-solid fa-arrow-left"></i> Back</button> 
                <!-- print btn -->
                <button type="button" onclick="window.location.href='costumer.invoice?id=<?=$costumer['costumer_id']?>'" class="btn btn-light text-capitalize border-0" ><i
                  class="fas fa-print text-primary"></i> Print</button> 
                <!-- export -->
                <button type="button" class="btn btn-light text-capitalize border-0"><i
                  class="far fa-file-pdf text-danger"></i> Export</button><hr/>               
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-3">
                    <div class=" profile-container">
                      <img src="../resources/images/system-photo/default-profile-c.jpg" alt="Costumer profile" class="rounded-circle img-responsive" width="200"/>
                    </div>
                  </div>
                  <div class="col-7 m-t-25">
                    <label class=""><b>Name:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <?=$costumer['name']?>
                    </label><br/>
                    <label class=""><b>Email:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <?=$costumer['email']?>
                    </label><br/>
                    <label class=""><b>Contact no:</b>&nbsp;&nbsp;&nbsp;&nbsp;
                      (+63) <?=$costumer['phone_number']?>
                    </label><br/>
                    <label class=""><b>Address:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <?=$costumer['address']?>
                    </label><br/>
                    <label class=""><b>School:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <?=$costumer['location']?>
                    </label><br/>
                  </div>
                </div><!--row-->
              </div> <!--end card body-->
            </div> <!--end costumer-profile-->

            <!--start costumer-record-->
            <div class="costumer-record card" style="width: 90%;">
              <div class="customtab2"> <!-- start customtab2 -->
                <ul class="nav nav-tabs " role="tablist"> 
                  <li class="nav-item"> 
                    <a class="nav-link active" data-toggle="tab" href="#pending" role="tab">
                      <?php
                        //count the number of pending equipment
                        $query = "SELECT COUNT(*) FROM barrowed_equipment 
                          WHERE costumer_id = ? AND barrow_status = 1";
                        $stmt = mysqli_prepare($connection, $query);
                        mysqli_stmt_bind_param($stmt, "i", $_GET['id']);
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_bind_result($stmt, $count);
                        mysqli_stmt_fetch($stmt);
                        mysqli_stmt_close($stmt);
                        ?>
                        <span class="hidden-down">Pending
                          <?php
                            if($count) {
                              ?>
                                <span class="badge bg-secondary"><?=$count;?></span>
                              <?php
                            }
                          ?>
                        </span>
                        <?php
                      ?>
                    </a> 
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#allRecord" role="tab">
                      <span class="hidden-down">All Record</span> 
                    </a> 
                  </li>
                </ul>
              </div> <!-- end customtab2 -->

              <!-- start tab content -->
              <div class="tab-content">
                <div class="tab-pane active" id="pending" role="tabpanel">
                  <div class="p-7">
                    <div class="card-body m-t-30">
                      <table id="tbl_pending" class="table table-bordered table-responsive">
                        <thead>
                          <tr>
                            <th style="width: 4%;">BI</th>
                            <th style="width: 15%;">Equipment</th>
                            <th style="width: 8%;">Borrow Qty</th>
                            <th style="width: 9%;">Returned Qty</th>
                            <th style="width: 6%;">Price</th>
                            <th style="width: 8%;">Sub total</th>
                            <th style="width: 10%;">Status</th>
                            <th style="width: 15%;">Borrow Date</th>
                            <th style="width: 10%;">Return Qty</th>
                          </tr>
                        </thead>
                        <tbody id="tbody_barrowed_list">
                        <?php
                          //fetch all pending return equipment
                          if(isset($_GET['id'])) {
                            $query = "SELECT be.*, c.*, e.* 
                              FROM barrowed_equipment be
                              INNER JOIN costumers c ON be.costumer_id = c.costumer_id
                              INNER JOIN equipment e ON be.equipment_id = e.id
                              WHERE c.costumer_id = ? AND be.barrow_status = 1
                              ORDER BY be.barrow_date DESC";
                            $stmt = mysqli_prepare($connection, $query);
                            mysqli_stmt_bind_param($stmt, "i", $_GET['id']);
                            mysqli_stmt_execute($stmt);
                            $result = mysqli_stmt_get_result($stmt);
                            //check data from result
                            if(mysqli_num_rows($result) > 0) {
                              while($row = mysqli_fetch_array($result)) {
                                //convert date format in db
                                $barrow_date = date("M-d-Y / H:i A", strtotime($row['barrow_date'])); 
                                ?>
                                <tr>
                                  <td>
                                    <?=$row['barrow_id']?>
                                    <!--hidden barrow id-->
                                    <input type="hidden" class="form-control"
                                    id="hiddenBarrowId<?=$row['barrow_id']?>" value="<?=$row['barrow_id']?>"/>
                                  </td>
                                  <td>
                                    <?=$row['equipment_name']?>
                                    <!--hidden equipment id-->
                                    <input type="hidden" class="form-control"
                                    id="hiddenEquipmentId<?=$row['barrow_id']?>" value="<?=$row['id']?>" />
                                  </td>
                                  <td>
                                    <!--barrow qty display in tbl-->
                                    <input type="text" class="form-control borderno"
                                    id="displayBarrowQty<?=$row['barrow_id']?>" value="<?=$row['barrow_qty']?>" style= "pointer-events: none;"/>
                                    <!--hidden barrow qty-->
                                    <input type="hidden"  class="form-control"
                                    id="hiddenBarrowQty<?=$row['barrow_id']?>" value="<?=$row['barrow_qty']?>"/>
                                  </td>
                                  <td>
                                    <input type="text" id="displayReturnedQty<?=$row['barrow_id']?>" value="<?=$row['returned_qty']?>" class="form-control borderno"
                                    onkeyup="makeChanges('<?= $row['barrow_id'] ?>')" name="returnedQty"/>

                                    <input type="hidden" id="prevReturnedQty<?=$row['barrow_id']?>"
                                     value="<?=$row['returned_qty']?>" >
                                  </td>
                                  <td>
                                    <?=$row['price']?>
                                    <!--hidden equipment price-->
                                    <input type="hidden" class="form-control"
                                      id="hiddenEquipmentPrice<?=$row['barrow_id']?>" value="<?=$row['price']?>"
                                    />
                                  </td>
                                  <td>
                                    <!--sub total amount display in tbl-->
                                    <input type="text" class="form-control borderno"
                                    id="displaySubtotal<?=$row['barrow_id']?>" value="<?=$row['subtotal_amount']?>" style= "pointer-events: none;"/>

                                    <!--hidden subtotal amt-->
                                    <input type="hidden" class="form-control"
                                    id="subTotalforCalc<?=$row['barrow_id']?>" 
                                    value="<?=$row['subtotal_amount']?>"
                                    onkeyup="makeChanges('<?= $row['barrow_id'] ?>')" />
                                  </td>
                                  <td>
                                    <?php
                                      if($row['barrow_status'] == 1){ //pending
                                        echo '<span class="badge badge-warning ">Pending</span>';
                                      }
                                    ?>            
                                  </td>
                                  <td><?=$barrow_date?></td>
                                  <td>
                                    <input type="text" class="form-control"
                                    id="returnQty<?=$row['barrow_id']?>"
                                    onkeyup="makeChanges('<?= $row['barrow_id'] ?>')"/>
                                    <!--hidden subtotal amt to insert-->
                                    <input type="hidden" class="form-control"
                                    id="hiddenReturnSubtotalToInsert<?=$row['barrow_id']?>" 
                                    value="<?=$row['subtotal_amount']?>"
                                    onkeyup="makeChanges('<?= $row['barrow_id'] ?>')" />
                                  </td>
                                </tr>   
                                <?php
                              }
                            }  
                          }
                        ?>
                        </tbody>
                        <tfoot>
                          <tr>
                            <th colspan="9" class="text-center">
                              <!--hidden id for users or admin-->
                              <input type="hidden" id="usersId" value="<?=$_SESSION['user_id']?>"/>
                              <!--hidden id for costumer-->
                              <input type="hidden" id="costumerId" class="costumerId"
                              value="<?=$costumer['costumer_id']?>" />
                              <!-- action button -->
                              <button type="button" id="returnBtn" class="return_barrow btn btn-secondary" disabled>
                                Return Equipment
                              </button>
                            </th>
                          </tr>
                        </tfoot> 

                      </table> <!--end table 1-->
                    </div> <!--end card body-->
                  </div> <!--end p-7-->
                </div> <!--end first tab-->
                <div class="tab-pane" id="allRecord" role="tabpanel">
                  <div class="p-7">
                    <div class="card-body m-t-30">
                      <table id="tbl_all_records" class="table table-bordered display">
                        <thead>
                          <tr>
                            <th style="width: 1%;">BI</th>
                            <th style="width: 20%;">Equipment</th>
                            <th style="width: 4%;">Status</th>
                            <th style="width: 20%;">Barrow Date</th>
                            <th style="width: 20%;">Return Date</th>
                            <th style="width: 10%;">Issue by</th>
                          </tr>
                        </thead>
                        <tbody id="tbody_all_records">
                        <?php
                          //fetch all pending return equipment
                          if(isset($_GET['id'])) {
                            $query = "SELECT be.*, c.*, e.*, u.* FROM barrowed_equipment be
                              INNER JOIN costumers c ON be.costumer_id = c.costumer_id
                              INNER JOIN equipment e ON be.equipment_id = e.id
                              INNER JOIN users u ON be.user_id = u.id
                              WHERE c.costumer_id = ? AND be.barrow_status = 0
                              ORDER BY be.return_date DESC";
                            $stmt = mysqli_prepare($connection, $query);
                            mysqli_stmt_bind_param($stmt, "i", $_GET['id']);
                            mysqli_stmt_execute($stmt);
                            $result = mysqli_stmt_get_result($stmt);
                            //check data from result
                            if(mysqli_num_rows($result) > 0) {
                              while($row = mysqli_fetch_array($result)) {
                                //convert date format in db
                                $barrow_date = date("M-d-Y / H:i A", strtotime($row['barrow_date']));
                                $return_date = date("M-d-Y / H:i A", strtotime($row['return_date'])); 
                                ?>
                                <tr>
                                  <td><?=$row['barrow_id']?></td>
                                  <td><?=$row['equipment_name']?></td>
                                  <td>
                                    <?php
                                      if($row['barrow_status'] == 0) {
                                        echo '<span class="badge badge-success">Complete</span>';
                                      }
                                    ?>
                                  </td>
                                  <td><?=$barrow_date?></td>
                                  <td><?=$return_date?></td>
                                  <td><?=$row['acct_name']?></td>
                                </tr>  
                                <?php
                              }
                            }  
                          }
                        ?>
                        </tbody>
                      </table> <!--end table 2-->
                    </div>
                  </div>
                </div> <!--end second tab-->
              </div> <!-- end tab content -->
            </div> <!--end costumer-record-->
          </section>
        </div> <!--end container fluid-->
      </div> <!--end div main-->
    </div> <!--end content-wrap-->

    <script defer>
      function makeChanges(barrowId) {
        //retrieve data
        const barrowQty = document.getElementById("hiddenBarrowQty" + barrowId).value;
        const returnQty = document.getElementById("returnQty" + barrowId).value;
        const equipmentPrice = document.getElementById("hiddenEquipmentPrice" + barrowId).value;
        const subTotalforCalc = document.getElementById("subTotalforCalc" + barrowId).value;
        const returnBtn = document.getElementById("returnBtn");
        const prevReturnedQty = document.getElementById("prevReturnedQty" + barrowId).value;

        let displayBarrowQty = document.getElementById("displayBarrowQty" + barrowId).value;
        let displaySubtotal= document.getElementById("displaySubtotal" + barrowId).value;
        let subTotalToInsert = document.getElementById("hiddenReturnSubtotalToInsert" + barrowId).value;
        let displayReturnedQty = document.getElementById("displayReturnedQty" + barrowId).value;
      
        var updateBarrowQty = 0;
        var updateSubTotal = 0;
        var insertUpdatedSubTotal = 0;
        var updateReturnedQty = 0;

        if (returnQty > barrowQty) {
          updateBarrowQty = 0;
          updateSubTotal= 0;
          insertUpdatedSubTotal = 0;
          updateReturnedQty = 0;

          //alert("Return quantity cannot exceed borrowed quantity.");
          swal({
            title: "Opps!",
            text: "Return quantity cannot exceed borrowed quantity.",
            type: "info",
          });
          //clear input after triggered alert
          document.getElementById("returnQty" + barrowId).value = "";
        } 
        else if(returnQty === ''){ 

          document.getElementById("displayBarrowQty" + barrowId).value = barrowQty;
          document.getElementById("displaySubtotal" + barrowId).value = subTotalforCalc;
          document.getElementById("hiddenReturnSubtotalToInsert" + barrowId).value = subTotalforCalc;
          document.getElementById("displayReturnedQty" + barrowId).value = prevReturnedQty;
          returnBtn.disabled = true;

        } 
        else if(isNaN(returnQty) || isNaN(displayBarrowQty) || isNaN(displaySubtotal) || isNaN(subTotalToInsert) || isNaN(displayReturnedQty)){

          //check if return qty input is empty, back the original value of the ff:
          document.getElementById("displayBarrowQty" + barrowId).value = barrowQty;
          document.getElementById("displaySubtotal" + barrowId).value = subTotalforCalc;
          document.getElementById("hiddenReturnSubtotalToInsert" + barrowId).value = subTotalforCalc;
          document.getElementById("displayReturnedQty" + barrowId).value = prevReturnedQty;
          returnBtn.disabled = true;
        } else {
          if(document.getElementById("returnQty" + barrowId).value ==  0) {
            returnBtn.disabled = true;
          } else {
            //start calculating
            updateBarrowQty = parseInt(barrowQty) - parseInt(returnQty);
            updateSubTotal = parseInt(subTotalforCalc) - (parseInt(returnQty) * parseInt(equipmentPrice));
            insertUpdatedSubTotal = parseInt(returnQty) * parseInt(equipmentPrice);
            updateReturnedQty = parseInt(returnQty) + parseInt(prevReturnedQty);
            returnBtn.disabled = false;
   
            //display updated value  
            document.getElementById("displayBarrowQty" + barrowId).value = updateBarrowQty;
            document.getElementById("displaySubtotal" + barrowId).value = updateSubTotal;
            document.getElementById("hiddenReturnSubtotalToInsert" + barrowId).value = insertUpdatedSubTotal;
            document.getElementById("displayReturnedQty" + barrowId).value = updateReturnedQty;
          }
        }
      }

    
      $(document).ready(function() {
        //data table for pending barrowed equipments
        $('#tbl_pending, #tbl_all_records').DataTable({
          ordering: false,
          bJQueryUI: true,
          sPaginationType: "full_numbers"
        });

        //function to return equipment
        $('.return_barrow').on("click", function(e) {
          e.preventDefault();
          //alert("test");
          const url = "<?= $_GET['id']; ?>";
          //alert(url);
          let costumer_id = $(this).closest('tr').find('.costumerId').val();
          let usersAdminId = $(this).closest('tr').find('#usersId').val();
          //alert(usersAdminId);

          //retrieve all pending data equipment in table and store in array
          let toReturnData = [];
          $('#tbody_barrowed_list tr').each(function() {
            let barrowId = $(this).find('[id^=hiddenBarrowId]').val();
            let EquipmentId = $(this).find('[id^=hiddenEquipmentId]').val();
            let returnQty = $(this).find('[id^=returnQty]').val();
            let returnSubtotal = $(this).find('[id^=hiddenReturnSubtotalToInsert]').val();
            let returnedQty = $(this).find('[id^=displayReturnedQty]').val();
            const barrowedEquipment = { 
              barrow_id: barrowId,
              equipment_id: EquipmentId,
              quantity: returnQty,
              subTotal: returnSubtotal,
              returnedQty: returnedQty
            }; 
            toReturnData.push(barrowedEquipment);
          }); 
          // alert(JSON.stringify(toReturnData));

          //send ajax request to send data into server 
          $.ajax({
            url: "actions.controller.php", //file to be send request
            method: "POST", //send via post method
            data: { //data to be retrieve to $_POST[]
              returnDataBtn: true,
              costumer_id:costumer_id,
              usersAdminId:usersAdminId,
              toReturnData:toReturnData
            }, 
            success:function(response) { //if success
              // console.log(response);
              setTimeout(function() { //set time 3 seeconds to processed multiple query
                window.location = "costumer.record?id=" + url;
              }, 3000); 
            },
            error: function(xhr, status, error) {
              console.log(xhr.responseText);
            }
          });

        });

      }); //end document ready()
    </script>
  </body>
</html>