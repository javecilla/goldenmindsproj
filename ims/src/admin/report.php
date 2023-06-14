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

    <title>GMCIS | Report</title>
    <link rel="icon" type="image/png" href="resources/images/system-photo/gmc.favicon.png" sizes="16x16" />

    <?php require_once __DIR__ . '/components/css.file-links.inc.php';?>
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
                  <h6 class="clock m-t-30"><?php echo date("M-d-Y")?> /<?php echo date(" h: i A");?></h6>
                </div> 
              </div> 
            </div>
            <div class="col-lg-4 p-l-0 title-margin-left">
              <div class="page-header">
                <div class="page-title">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item" style="margin-left: -90px;">
                      <a href="report" class="active"> Generate Report </a>
                    </li>
                    <li class="breadcrumb-item">Dashboard</li>
                  </ol>
                </div>
              </div>
            </div>     
          </div>
          <!-- start main content -->
          <section id="main-content">
            <div class="card">
              <h6 class="card-title">Filter Equipment Record</h6><hr>
                <div class="row">
                  <div class="col-4">
                    <input type="hidden" id="lr">
                    <!-- filter the equipments by location rack-->
                    <small>SELECT LOCATION RACK OF EQUIPMENT</small>
                    <select class="form-control" id="locationRack" onchange="fetchEquipmentByLR()">
                      <option selected>All Record</option>
                      <?php //fetch the unique location rack of equipment -> DISTINCT
                        $query = "SELECT DISTINCT e.location_id, lb.* FROM equipment e
                          INNER JOIN location_branch lb ON e.location_id = lb.id";
                        $stmt = mysqli_prepare($connection, $query);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        if(mysqli_num_rows($result) > 0) { //check data from result
                          while($row = mysqli_fetch_assoc($result)) {
                            ?>
                              <option value="<?= $row['id']; ?>"><?= $row['location']; ?></option>
                            <?php
                          }
                        } else {
                          echo "No data found :(";
                        }
                        mysqli_stmt_close($stmt);
                      ?>
                    </select>
                  </div><!--first col-->
                  <!-- filter th equipments by date -->
                  <div class="col-4">
                    <small>FROM DATE</small><br/>
                    <input type="date" class="form-control" id="from_date" />
                  </div>
                  <div class="col-4">
                    <small>TO DATE</small><br/>
                    <input type="date" class="form-control" id="to_date"
                    onchange="filterByDate()" />
                  </div>
                </div><!--row-->
              <br/> 
            </div><!--end first card-->
            <div class="card"> 
              <div class="row">
                <div class="col-1">
                    <button type="button" class="btn btn-light text-capitalize border-0" 
                      id="excel" onclick="generateReport('excel')" disabled> 
                      <i class="fas fa-regular fa-file-excel text-success"></i> Excel
                    </button>
                </div>
                <div class="col-1">
                    <button type="button" class="btn btn-light text-capitalize border-0" 
                    id="pdf" onclick="generateReport('pdf')" disabled> 
                      <i class="fas fa-solid fa-file-pdf text-danger"></i> PDF
                    </button>
                </div>
                <div class="col-0 mr-5">
                    <button type="button" id="print" class="btn btn-light text-capitalize border-0" 
                    onclick="generateReport('print')" disabled> 
                      <i class="fas fa-solid fa-print text-primary"></i> Print
                    </button>
                </div>
                <div class="col-8 ml-5">
                  <input type="search" class="form-control search"  placeholder="Search" 
                   onkeyup="searchEquipment()" />
                </div>
              </div><br/><!--row-->
              <!--start data table for equipments--> <!--display nowrap-->
              <table id="tblEquipmentsRecord" class="table table-bordered table-responsive " style="width:100%">
                <thead>
                  <tr>
                    <th style="width: 1%;">EID</th>
                    <th style="width: 14%;">Equipment Name</th>
                    <th style="width: 8%;">Category</th>
                    <th style="width: 14%;">Type</th>
                    <th style="width: 6%;">Unit</th>
                    <th style="width: 2%;">Stock</th>
                    <th style="width: 2%;">Borrowed</th>
                    <th style="width: 2%;">Qty</th>
                    <th style="width: 3%;">Condition</th>
                  </tr>
                </thead>
                <tbody id="tbodyEquipmentsRecord">
                  <!-- data fetch by ajax request -->
                </tbody>
              </table>
            </div> <!--end card-->
          </section>
        </div>
      </div>
    </div>
    
    <?php require_once __DIR__ . '/components/js.file-links.inc.php';?>
    <script defer>
      //call the getAllEquipmentData function to 
      //fetch all data of equipment when page is load
      window.onload = getAllEquipmentData();
      var findBtn = document.getElementById('findEquipment');
      var printBtn = document.getElementById('print');
      var pdfBtn = document.getElementById('pdf');
      var excelBtn = document.getElementById('excel');
      function isEmpty(field) {
        return field === '';
      }

      //function to get all equipmennt data in db
      function getAllEquipmentData() {
        //send ajax request to server
        $.ajax({
          method: "GET", //send request via http GET method
          url: "app/actions.controller.php", //file to be send
          dataType: "html", //set html as datatype
          data: { displayEquipments: true }, //data to be retrieve in server
          success: function(data) { //if success
            $('#tbodyEquipmentsRecord').html(data); //fetch all data
          }
        }); 
      }
      
      //fetch equipment data depends on location rack selected
      function fetchEquipmentByLR() {
        //alert("test");
        const locationRack = document.getElementById('locationRack').value;
        document.getElementById('lr').value = locationRack;
        //if location rack change set button to undisabled and clear value from input dates
        printBtn.disabled = false;
        pdfBtn.disabled = false;
        excelBtn.disabled = false;
        document.getElementById('from_date').value = '';
        document.getElementById('to_date').value = '';
        //alert(locationRack);
        $.ajax({
          method: "GET",
          url: "app/actions.controller.php",
          dataType: "html",
          data: { locationRack: locationRack },
          success: function(data) {
            //console.log(data);
            $('#tbodyEquipmentsRecord').html(data);
          }
        });
      }

      //filter equipment by date and location
      function filterByDate() {
        //alert("test");
        const fromDate = document.getElementById('from_date').value;
        const toDate = document.getElementById('to_date').value;
        let selectedLR = document.getElementById('lr').value;
        $.ajax({
          method: "GET",
          url: "app/actions.controller.php",
          dataType: "html",
          data: {
            findBtnSet: true,
            fromDate: fromDate,
            toDate: toDate,
            selectedLR: selectedLR
          },
          success: function(data) {
            $('#tbodyEquipmentsRecord').html(data);
          }
        });
      }

      //search equipment
      function searchEquipment() {
        const searchInput = document.querySelector('.search').value;
        //alert(searchInput);
        if(!isEmpty(searchInput)) { //if this field is not empty
          $.ajax({
            method: "GET",
            url: "app/actions.controller.php",
            dataType: "html",
            data: { searchInput: searchInput },
            success: function(data) {
              //alert(response);
              $('#tbodyEquipmentsRecord').html(data);
            }
          });
        } else { //return and call the default data that stored in getAllEquipmentData()
          getAllEquipmentData();
        }
      }

      //generate report
      function generateReport(gr) {
        //window.print();
        const fd = document.getElementById('from_date').value;
        const td = document.getElementById('to_date').value;
        const lr = document.getElementById('lr').value;

        if(gr === 'print') {
          //alert("print");
          window.location.href = 'app/print.report?gr=' + gr + '&lr=' + lr + '&fd=' + fd + '&td=' + td;
        }
        else if(gr === 'pdf') {
          //alert("pdf");
          window.location.href = 'app/pdf.maker?gr=' + gr + '&lr=' + lr + '&fd=' + fd + '&td=' + td;
        } 
        else if(gr === 'excel') {
          // alert("excel");
          window.location.href = 'app/export.excel?gr=' + gr + '&lr=' + lr + '&fd=' + fd + '&td=' + td;
        }
        else {
          alert("test");
        }
      }

      //check loggedin user, prevent login one acc in two diff device
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