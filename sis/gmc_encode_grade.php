<!DOCTYPE html>
<html>
<head>
<title>Student Grades</title>
</head>

<body>

<script src="jquery-3.7.0.min.js"></script>

	<center>
		<table>
			<input type="text" id="studentName" placeholder="Enter Student Name" />
		  <tbody id="gradeInputs">
		   	<?php
			 	$cn = new mysqli('localhost', 'root', '', 'gmcbulac_db_gmc');
			   	$stmt = $cn->prepare("select * from subjects where strand = 'Technical-Vocational-Livelihood Information and Communications Technology' and semester = '1st' and yr_sec = '11' group by subj_desc order by subj_order asc;");
				
				
				
			   	$stmt->execute();
			   	$result = $stmt->get_result();
			   	$rowPKindex = 0; //initialize the row index tapos set 0 as default
		    	while($row = $result->fetch_assoc()) {
						?>
						<tr>
							<td>
								<input type="text" id="subjectName<?=$rowPKindex?>" value="<?=$row['subj_desc']?>"/>
							</td>
							<td><input type="text" class="inputFirstSemGrade" 
								id="fsemGrade<?=$rowPKindex?>" placeholder="0" maxlength="2"/></td>
							<td><input type="text" class="inputSecondSemGrade"	
								id="ssemGrade<?=$rowPKindex?>" placeholder="0" maxlength="2"/></td>
							<td><input type="text" class="finalAve readonly" id="finalAve<?=$rowPKindex?>" placeholder="0" readonly/></td>
							<td><input type="text" class="student_remarks" id="remarks<?=$rowPKindex?>" readonly/></td>
							<td>
								<button type="button" class="btnRemove" id="removeBtn<?=$rowPKindex?>">
									Remove
								</button>
							</td>
							<td>
								<button type="button" class="saveBtn2" id="secondBtnSave<?=$rowPKindex?>" style="display: none;">
									Save
								</button>
							</td>
						</tr>
						<?php
		      	$rowPKindex++; //increment the row index every data sa table
		    	}
		   	?>
		  </tbody>
  		<button type="button" class="saveBtn" id="BtnSave" >Save</button>
		</table>	
	</center>
	<!-- main scripts -->





	<script defer>
		$(document).ready(function() {
			// to auto calculate the final average and student remarks of each row data grade in table
			$(document).on('keyup', '.inputFirstSemGrade, .inputSecondSemGrade', function() {
				let id = $(this).attr('id');
				let rowPKindex = id.substr(id.length - 1);
				let fsemGrade = $('#fsemGrade' + rowPKindex).val();
				let ssemGrade = $('#ssemGrade' + rowPKindex).val();

				//remove non-numeric characters from the input value
				let sanitizedFsemGrade = fsemGrade.replace(/\D/g, '');
				let sanitizedSsemGrade = ssemGrade.replace(/\D/g, '');

				//update the input fields with sanitized values
				$('#fsemGrade' + rowPKindex).val(sanitizedFsemGrade);
				$('#ssemGrade' + rowPKindex).val(sanitizedSsemGrade);

				//calculate the final average
				let calculatedFinalAve = (parseInt(sanitizedFsemGrade) + parseInt(sanitizedSsemGrade)) / 2;
				calculatedFinalAve = Math.round(parseFloat(calculatedFinalAve)); //round off ang final average

				//check the calculated final average and show the student remarks
				let remarks = (calculatedFinalAve >= 74.5) ? 'PASSED' : 'FAILED';
				let finalAve = $('#finalAve' + rowPKindex).val(); 
				if(isNaN(finalAve)) {
					$('#finalAve' + rowPKindex).val(sanitizedFsemGrade);
					$('#remarks' + rowPKindex).val(remarks); 
				} else {
					$('#finalAve' + rowPKindex).val(calculatedFinalAve);
					$('#remarks' + rowPKindex).val(remarks); //update the student remarks input field
				}
			
				//check if input first and second sem grade has not empty then the button save will show
				if(sanitizedFsemGrade !== '' || sanitizedSsemGrade !== '') {
					$('#secondBtnSave' + rowPKindex).show();
				} else {
					$('#secondBtnSave' + rowPKindex).hide();
				}
			});


			//to save all row data grade in table
	  	$('.saveBtn').on('click', function(e) {
	    	e.preventDefault();
	    	//alert("test");
				
	    	//retrieve all data grades of students and store in array
	    	var arrDataGrades = [];
	    	$('#gradeInputs tr').each(function() {
			    let rowPKindex = $(this).index(); //get the row index
					let studentName = $('#studentName').val();
			    let subjectName = $('#subjectName' + rowPKindex).val();
			    let fsemGrade = $('#fsemGrade' + rowPKindex).val();
			    let ssemGrade = $('#ssemGrade' + rowPKindex).val();
			    let remarks = $('#remarks' + rowPKindex).val();
					let finalAve = $('#finalAve' + rowPKindex).val();
					//stored all the submitted in object
					const objDataGrades = {
						studentname: studentName,
						subjname: subjectName,
						fsemgrade: fsemGrade,
						ssemgrade: ssemGrade,
						finalave: finalAve,
						remarks: remarks
			    };
			    //push the data object into empty array para magka laman si array->dataGrades
	      	arrDataGrades.push(objDataGrades);
	    	});
	    	//console.log(JSON.stringify(arrDataGrades));

				//send the data to the server using ajax request
				$.ajax({
					method: "POST",
					url: "action.php",
					data: { arrDataGrades: arrDataGrades },
					success: function(response) {
						//console.log(response);
						alert(response);
						location.reload();
					},
					error: function(error) {
						//console.log(error);
						alert(error);
					}
				});
			});

			//to save only one row data grade in table
			$('#gradeInputs').on('click', '.saveBtn2', function(e) {
				e.preventDefault();
				let subjectName = $(this).closest('tr').find('[id^=subjectName]').val();
				let fsemGrade = $(this).closest('tr').find('[id^=fsemGrade]').val();
				let ssemGrade = $(this).closest('tr').find('[id^=ssemGrade]').val();
				let remarks = $(this).closest('tr').find('[id^=remarks]').val();
				let finalAve = $(this).closest('tr').find('[id^=finalAve]').val();
				let studentName = $('#studentName').val(); 
				
				$.ajax({
					method: "POST",
					url: "action.php",
					data: {
						toSaveOnlyOneRow: true,
						subjectName2: subjectName,
						fsemGrade2: fsemGrade,
						ssemGrade2: ssemGrade,
						remarks2: remarks,
						finalAve2: finalAve,
						studentName2: studentName
					},
					success: function(response) {
						alert(response);
						location.reload();	
					},
					error: function(error) {
						alert(error);
						location.reload();
					}
				});
			});
		});
	</script>
</body>
</html>