<?php
ini_set('display_errors',  1); //show verbose error if occured
session_start();  
require_once __DIR__ . '/../config/db.connection.php'; 
if(isset($_GET['lr'])) {
	if(!empty($_GET['lr'])) {
		$query = "SELECT e.*, l.* FROM equipment e 
	    INNER JOIN location_branch l ON e.location_id = l.id
	    WHERE l.id = ?";
	  $stmt = mysqli_prepare($connection, $query);
	  mysqli_stmt_bind_param($stmt, "i", $_GET['lr']);
	  mysqli_stmt_execute($stmt);
	  $result = mysqli_stmt_get_result($stmt);
	  $row = mysqli_fetch_assoc($result);
	  $locationRack = $row['location'];
  }
}

if(isset($_GET['fd']) && isset($_GET['td'])) {
	$fromDate = date('F d, Y', strtotime($_GET['fd']));
  $toDate = date('F d, Y', strtotime($_GET['td']));
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>GMCIS | PDF Report</title>
  <link rel="icon" type="image/png" href="../resources/images/system-photo/gmc.favicon.png" sizes="16x16" />

  <link href="../../../vendor/libs/icons/all.min.css" rel="stylesheet">
  <link href="../../../vendor/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link defer href="../resources/css/style.css" rel="stylesheet" />
  <!-- c: https://ekoopmans.github.io/html2pdf.js/ -->
  <script src="../../../vendor/plugins/html2pdf/html2pdf.bundle.min.js"></script>
</head>
<body onload="generatePDF()" style="width:100%; background: url('../resources/images/system-photo/gmc-bg.png');" >
	
	<div class="card" id="pdfcontent" > 
		<center>
			<div class="card-title">
				<img src="../resources/images/system-photo/gmc.png" class="img-responsive" width="70" />
				<h5>Inventory Report of 
					<?php 
					if(isset($_GET['lr'])) { 
						if(!empty($_GET['lr']))
						echo $locationRack; 
					} else {
						echo "All Record";
					}
					?></h5>
				<?php
				if(isset($_GET['fd']) && isset($_GET['td'])) {
					if(!empty($_GET['fd']) && !empty($_GET['td'])) {
						echo "<h6>FROM DATE: ".$fromDate." &nbsp;&nbsp;&nbsp;&nbsp; TO DATE: ".$toDate."</h6>";
					}
				} else {
					echo "";
				}
				?>
				
			</div><hr/>
      <table id="tblPrint" class="table table-bordered table-responsive " style="width:100%">
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
	      <tbody id="tbodyPrint">
	      	<?php
	      		//check generate report action [print? pdf? excel?]
	      		if(isset($_GET['gr']) && $_GET['gr'] == 'pdf') {
		      	 	$query = "SELECT e.*, c.category_name, t.equip_type, l.location, u.unit_type
					      FROM equipment e 
					      INNER JOIN categories c ON e.category_id = c.category_id 
					      INNER JOIN equipment_type t ON e.type_id = t.equip_id
					      INNER JOIN location_branch l ON e.location_id = l.id
					      INNER JOIN equipment_unit u ON e.unit_id = u.id
					      WHERE l.id = ?";
					     //check if from_date and to_date are both set and not empty
					    if(isset($_GET['fd']) && isset($_GET['td'])) {
					    	if(!empty($_GET['fd']) && !empty($_GET['td'])) {
					    		//then concatenate this code, in where clause condition
					    		$query .= " AND e.date_added BETWEEN ? AND ?";
					    	}
							}
							$query .= " ORDER BY e.date_added ASC";
					   	$stmt = mysqli_prepare($connection, $query);
					   	 /*check if from_date and to_date are both set and not empty then the query
   						 will filter the equipment table by both location rack and date.*/
					   	if(isset($_GET['fd']) && isset($_GET['td'])) {
					   		if(!empty($_GET['fd']) && !empty($_GET['td'])) {
					   			mysqli_stmt_bind_param($stmt, "iss", $_GET['lr'], $_GET['fd'], $_GET['td']);
					   		} 
					   		else { //otherwise, the query will only filter by location
					   			mysqli_stmt_bind_param($stmt, "i", $_GET['lr']);
					   		}
					   	} 
					   	mysqli_stmt_execute($stmt);
					   	$result = mysqli_stmt_get_result($stmt);
					   	if(mysqli_num_rows($result) > 0) { //check if data exist
					   		///fetch all data found from result
					      while($equipment = mysqli_fetch_assoc($result)) {
					        ?>
					        <tr>
					          <td><?=$equipment['id']?></td>
					          <td><?=$equipment['equipment_name']?></td>
					          <td><?=$equipment['category_name']?></td>
					          <td><?=$equipment['equip_type']?></td>
					          <td><?=$equipment['unit_type']?></td>
					          <td><?=$equipment['stock']?></td>
					          <td><?=$equipment['in_use']?></td>
					          <td><?=$equipment['quantity']?></td>
					          <td>
					            <?php
					            	if($equipment['quantity'] < $equipment['conditions']) {
					                echo '<i style="font-size: 14px;">Critical</i>';
					              } else {
					                echo '<i style="font-size: 14px;">Good</i>';
					              }
					            ?>
					          </td>
					        </tr>
					        <?php
					      }
					   	}
				   	} 
	      	?>
	      </tbody>
      </table><br/>
    </center>
  </div> <!--end card-->
	
	<center>
		<button type="button" class="btn btn-secondary text-capitalize border-0"
		  onclick="window.location.replace('../report')">
		  <i class="fa-sharp fa-solid fa-arrow-left"></i> Back
    </button> 
	</center>
	<script type="text/javascript">
		function generatePDF() {
			//console.log("test");
  		var location = "<?php echo $locationRack; ?>";
  		var pdfcontent = document.getElementById('pdfcontent');
  		//alert(location);
  		//start customizing pdf content
  		var opt = {	
  			margin: 			0.1,
  			filename:     'INVENTORY-REPORT_' + location + '.pdf',
  			image: 				{ type: 'jpeg', quality: 0.98 },
  			html2canvas: 	{ scale: 2 },
  			jsPDF: 				{ unit: 'in', format: 'letter', orientation: 'landscape' }
  		};
  		//new promise-based usage
  		html2pdf().set(opt).from(pdfcontent).save();
		}
  </script>
</body>
</html>