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

    <title>GMCIS | Invoice</title>
    <link rel="icon" type="image/png" href="../resources/images/system-photo/gmc.favicon.png" sizes="16x16" />

    <link href="../../../vendor/libs/icons/all.min.css" rel="stylesheet">
    <link href="../../../vendor/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link defer href="../resources/css/style.css" rel="stylesheet" />
    <style type="text/css" media="print">
      @media print{
        .noprint, .noprint *{
          display: none!important;
        }
      }
    </style>
    <style type="text/css">
      .noedit {
        border: none;
        pointer-events: none;
      }
    </style>
  </head>
  <body onload="print()">
    <section id="main-content">
      <div class="card">
        <div class="card-body">
          <div class="container mb-5 mt-3">
            <div class="container"><br/>
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

              <div class="row">
                <div class="col-xl-8">
                  <ul class="list-unstyled">
                    <li class="text-muted m-b-3"><b>Name:</b> <?=$costumer['name']?></li>
                    <li class="text-muted m-b-3"><b>Email:</b> <?=$costumer['email']?></li>
                    <li class="text-muted m-b-3"><b>Address:</b> <?=$costumer['address']?></li>
                    <li class="text-muted m-b-3"><b>Contact no:</b> (+63) <?=$costumer['phone_number']?></li>
                  </ul>
                </div>
                <div class="col-xl-4">
                  <ul class="list-unstyled">
                    <li class="text-muted m-b-3"><span class="fw-bold">
                      <b>School:</b> </span><?=$costumer['location']?>
                    </li>
                    <li class="text-muted m-b-3"><span class="fw-bold">
                      <b>Payment Date:</b> </span><?= date("M-d-Y / h: i A")?>
                    </li>
                    <li class="text-muted m-b-3"><span class="me-1 fw-bold">
                      <b>Status:</b>&nbsp;&nbsp;</span>_______________
                    </li>
                    <li class="text-muted m-b-3"><span class="me-1 fw-bold">
                      <b>Issued by:</b>&nbsp;&nbsp;</span><?=$_SESSION['acct_name']?>
                    </li>
                  </ul>
                </div>
              </div><br/><!--row-->
              <div class="row my-2 mx-1 justify-content-center">
                <table class="table table-bordered">
                  <thead style="background:#e9e9e9;">
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Equipment Name</th>
                      <th scope="col">Equipment Price</th>
                      <th scope="col">Barrow Quantity</th>
                      <th scope="col">Subtotal</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $total = 0;
                      if(isset($_GET['id'])) {
                        $query = "SELECT be.*, c.*, e.* FROM barrowed_equipment be
                          INNER JOIN costumers c ON be.costumer_id = c.costumer_id
                          INNER JOIN equipment e ON be.equipment_id = e.id
                          WHERE c.costumer_id = ? AND be.barrow_status = 1
                          ORDER BY be.barrow_date DESC";
                        $stmt = mysqli_prepare($connection, $query);
                        mysqli_stmt_bind_param($stmt, "i", $_GET['id']);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        if(mysqli_num_rows($result) > 0) {
                          while($row = mysqli_fetch_array($result)) {
                            $subtotal = $row['subtotal_amount'];
                            $total += $subtotal;
                            ?>
                            <tr>
                              <th scope="row"><?=$row['barrow_id']?></th>
                              <td><?=$row['equipment_name']?></td>
                              <td>₱<?=$row['price']?></td>
                              <td><?=$row['barrow_qty']?></td>
                              <td>
                                <input type="text" class="noedit form-control"
                                id="subtotal<?=$row['barrow_id']?>"
                                oninput="calc('<?=$row['barrow_id']?>')" 
                                value="₱<?=$subtotal?>"/>
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
                      <th colspan="4" class="text-right">Total Amount: </th>
                      <th class="text-right">
                        <input type="text" class="noedit form-control"
                        id="totalamount" value="₱<?=$total?>" />
                      </th>
                    </tr>
                  </tfoot>
                  <script>
                    function calc(subtotalID) {
                      var subtotal = parseInt(document.getElementById('subtotal' + subtotalID).value);
                      var total = parseInt(document.getElementById('totalamount').value);
                      var newTotal = total - subtotal + parseInt(subtotal);
                      document.getElementById('totalamount').value = newTotal;
                    }
                  </script>
                </table>
              </div>
              <p spellcheck="true" class="ms-3 justify">
                By borrowing equipment from Golden Minds, I agree to pay for any damages or losses incurred during my use of the equipment, as well as any failure to return it in a timely manner. I understand that failure to pay for any damages or losses may result in sanctions, including but not limited to legal action or the suspension of borrowing privileges.
                <br/><br/>
                Additionally, I acknowledge that the equipment is the property of the Golden Minds and that I am responsible for its safekeeping and appropriate use. I agree to comply with all applicable laws and regulations, as well as any specific terms and conditions set forth by the establishment.
                <br/><br/>
                By signing below, I acknowledge that I have read, understood, and agreed to all of the above terms and conditions.
              </p>
              <label>Signature: ___________________</label><hr>
              <button type="button" class="btn btn-light text-capitalize border-0 noprint"
              onclick="window.location.replace('costumer.record?id=<?=$_GET['id']?>')">
                <i class="fa-sharp fa-solid fa-arrow-left"></i> Back
              </button> 
            </div><!--container-->
          </div><!--con-->
        </div><!--card body-->
      </div><!--card-->
    </section>
  </body>
</html>