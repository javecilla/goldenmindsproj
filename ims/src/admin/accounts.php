<?php
session_start();
require_once __DIR__ . '/config/db.connection.php';
require_once __DIR__ . '/app/check_user.php';
ini_set('display_errors',  1);
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		<title>GMCIS | User Management</title>
		<link rel="icon" type="image/png" href="resources/images/system-photo/gmc.favicon.png" sizes="16x16" />
    <?php require_once __DIR__ . '/components/css.file-links.inc.php';?>
		<link defer href="resources/css/custom.css" rel="stylesheet" />
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
                      <a href="accounts" class="active"> User Management</a>
	                  </li>
	                  <li class="breadcrumb-item">Dashboard</li>
                  </ol>
                </div>
              </div>
           	</div>     
          </div><!--end row-->				

					<div class="card">
						<div class="card-title pr">
							<button type="button"  data-target="#user_add_accountModal" data-toggle="modal" class="btn btn-light text-capitalize">
								<i class="far fa-solid fa-circle-plus text-success"></i> Add user
							</button>
            </div><hr/>
			
	          <!--start user table-->
						<table id="tbl_users" class="table table-bordered" >
							<thead>
								<tr>
									<th scope="col" style="width: 3%;">UID</th>
									<th scope="col" style="width: 15%;">Account Name</th>
									<th scope="col" style="width: 17%;">Email</th>
									<th scope="col" style="width: 10%;">Username</th>
									<th scope="col" style="width: 10%;">Status</th>
									<th scope="col">Last Login</th>
									<th scope="col" class="text-center">Action</th>
								</tr>
							</thead>		  
							<tbody id="tbody_users">
								<?php
									$query = "SELECT * FROM users";
									$stmt = mysqli_prepare($connection, $query);
								  mysqli_stmt_execute($stmt);
								  $result = mysqli_stmt_get_result($stmt);     
									if(mysqli_num_rows($result) > 0) { //check if data from result								
										while($user = mysqli_fetch_assoc($result)) { //fetch all data found
											//convert date format in db
	                    $last_login = date("M-d-Y / H:i A", strtotime($user['login_time'])); 
											?>
												<tr>
													<td class="user_id"><?= $user['id']; ?></td>
													<td><?= $user['acct_name']; ?></td>
													<td><?= $user['email']; ?></td>
													<td><?= $user['uname']; ?></td>
													<td>
														<?php
															if($user['status'] == 1) { //active
																echo '<span class="badge badge-success">
																	<a href="app/actions.controller.php?user_id='.$user['id'].'&user_status=0" class="text-white">Active
																	</a>
																</span>';
															} else { //inactive
																echo '<span class="badge badge-danger">
																	<a href="app/actions.controller.php?user_id='.$user['id'].'&user_status=1" class="text-white">Inactive
																	</a>
																</span>';
															}
														?>	
													</td>
													<td><?= $last_login; ?></td>
													<td>
														<form action="app/actions.controller.php" method="POST">
															<!--view button-->
															<button type="button" id="<?= $user['id'];?>"
																class="view_btn btn-primary btn btn-sm m-r-4">
																<i class='ti-eye'>&#xE872;</i>
															</button>
															
															<!--delete button-->
	                            <input type="hidden" class="valUserId" value="<?= $user['id'];?>" />
	                            <button class="delUserId btn btn-danger btn-sm m-r-10" type="button">
	                              <i class='ti-trash delete-icon'>&#xE872;</i>
	                            </button>
														</form>															
													</td>
												</tr>
											<?php
										}
									} else {
										?>
											<tr><td colspan="7">No Record Found</td></tr>
										<?php
									}
								?>	  
							</tbody>
						</table>
					</div> <!--end card-->

					<div class="modal-handler">
						<!-- MODAL VIEW ACCOUNT FORM -->
						<div class="modal fade" id="user_view_accountModal" tabindex="-1" role="view" aria-labelledby="viewAccount" aria-hidden="true">
							<div class="modal-dialog">
							  <div class="modal-content"><br/><br/><br/><br/><br/><br/><br/>
							    <div class="modal-header">
							      <h5 class="modal-title" id="view">VIEW ACCOUNT</h5>
							      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                    <i class="ti-close" aria-hidden="true"> </i>
	                  </button>
							    </div>
							    <div class="modal-body">
							     	<div class="user_viewing_data">
							     		<!--data came from database by ajax request-->
							     	</div>
								    <div class="modal-footer">
		                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		                </div>
							 	 </div>
								</div>
							</div>
						</div>
						<!-- END MODAL VIEW ACCOUNT FORM -->

						<!--MODAL ACCOUNT REGISTRATION FORM-->
	          <div class="modal fade" id="user_add_accountModal" tabindex="-1" role="add" aria-labelledby="addAccount" aria-hidden="true">
	            <div class="modal-dialog modal-dialog-centered" role="document">
	             	<div class="modal-content"><br/><br/><br/><br/><br/><br/><br/><br/><br/>
	             		<!--start user form-->
	                <form action="app/actions.controller.php" method="POST" enctype="multipart/form-data">
	                  <div class="modal-header m-b-10">
	                    <h5 class="modal-title" id="register">REGISTER ACCOUNT</h5>
	                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                      <i class="ti-close" aria-hidden="true"> </i>
	                    </button>
	                  </div>
	                  <div class="modal-body">
	                    <div class="img_container img d-flex justify-content-center align-items-center" >  
	                      <img src="resources/images/system-photo/default-profile.jpg" class="img-admin" alt="Admin"/>
	                    </div>
	                    <!--profile image-->
	                    <div class="form-group">
	                      <input type="hidden" name="size" value="1000000"/>
	                      <label for="CI">Profile Picture</label>
	                      <input type="file" name="profileImg" id="img_input"  accept="png, jpg, jpeg" 
	                      	class="file choose-file form-control" required 
	                      />
	                    </div>
	                    <!--account name-->
	                   	<input type="text" name="aname"	placeholder="Account name" 
	                   		class="form-control m-b-5" autocomplete="off"  required 
	                   	/>
	                   	<!--username-->
	                    <input type="text" name="uname" placeholder="Username" 
	                    	class="form-control m-b-5" autocomplete="off" required 
	                    />
	                    <!--password-->
	                    <div class="input-group" id="show_hide_password">
				                <input type="password" name="pword" id="pword" 
				                	class="password form-control m-b-5" placeholder="Password" 
				                	autocomplete="off" onpaste="false" required
				                /> 
				               <div class="btn-addon"><a href="#"><i class="fa fa-eye-slash eye-icon"></i></a></div>
				              </div> 
				              <!--confirm password-->
	                    <div class="input-group m-b-5" id="show_hide_cpassword">
				                <input type="password" name="cpword" id="cpword" 
				                	class="password form-control" placeholder="Confirm Password" 
				                	autocomplete="off" onpaste="false" required
				                /> 
				                <div class="btn-addon"><a href="#"><i class="fa fa-eye-slash eye-icon"></i></a></div>
				             	</div>
	                    <label for="CI">Contact Information</label>
	                    <!--address-->
	                    <input type="text" name="address" placeholder="Complete Address" 
	                    	class="form-control m-b-5" required 
	                    />
	                    <!--phone number-->
	                    <input type="text" name="phone_number" placeholder="Phone Number" 
	                    	class="form-control m-b-7" required 
	                    />
	                    <!--email-->
	                   	<input type="email" name="email" placeholder="Email" 
	                   		class="form-control m-b-7" required 
	                   	/>
	                   	<!--school branch-->
	                    <input list="sb" name="s_branch" placeholder="School Branch" 
	                    	class="form-control m-b-7" autocomplete="off" required 
	                    /> 
	                    <datalist id="sb">
				               	<option value="Golden Minds Colleges Sta. Maria, Bulacan">
				                  Golden Minds Colleges Sta. Maria, Bulacan
				               	</option> 
				                <option value="Golden Minds Colleges Balagtas, Bulacan">
				                  Golden Minds Colleges Balagtas, Bulacan
				                </option>
				                <option value="Golden Minds Academy Guiginto, Bulacan">
				                  Golden Minds Academy Guiginto, Bulacan
				                </option>   
			                </datalist>
	                    <label for="bod">Birthday</label>
	                    <input type="date" name="birthday" class="form-control m-b-9" required /> 

	                    <label for="gender" class="gender">Gender:</label>&nbsp;
	                   	<label class="radio-btn">
	                      <input type="radio" onclick="male()" id="m" class="radio-btn"/>&nbsp;Male
	                    </label>&nbsp;&nbsp;
	                    <label class="radio-btn">
	                      <input type="radio" onclick="female()" id="f" class="radio-btn"/>&nbsp;Female
	                    </label>
	                   	<input type="text" name="gender" id="sex" style="display: none;" required/>   
	                  </div> <!--end modal body-->
	                  <div class="modal-footer">
	                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	                    <button type="submit" name="addBtn" class="btn btn-success">Add Account</button>
	                  </div>
	                </form>
	               </div>
	              </div>
	            </div>
						</div>
						<!--END MODAL ACCOUNT REGISTRATION FORM-->
					</div> <!--end modal handlder-->

				</div><!--end container-->
   		</div><!--end main-->
   	</div> <!--end content-->

	</body>
</html>

<script defer>
	//gender selection
  function male(){
    document.getElementById("f").checked = false;
    document.getElementById("sex").value = "Male";
  }
      
  function female(){
    document.getElementById("m").checked = false;
    document.getElementById("sex").value = "Female";
  }	

	//onchnage user profile image select
	let selector_input = document.querySelector("#img_input");
  let image_profile = document.querySelector(".img_container img");
  selector_input.addEventListener("change", function() {
    const file = this.files[0];
    if(file) { //check file
      let reader = new FileReader();
         
      reader.addEventListener("load", function() { //get user file
        //display result
        image_profile.setAttribute("src", this.result);
      })
      //show file url
     	reader.readAsDataURL(file)  
     }
   });

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
  }, 10000); //check user session every seconds
   
	//start jquery
	$(document).ready(function() {
		//user data table
		$('#tbl_users').dataTable({ ordering: false }); 

		//to confirm delete
		$('#tbody_users').on("click", ".delUserId", function(deleteEvent) {
			deleteEvent.preventDefault();
			// alert("test");
			var deleteUserId = $(this).closest("tr").find('.valUserId').val();
			// console.log(deleteUserId);
			swal({ //pop up confirmation
				title: "Are you sure to delete?",
	      text: "Once deleted, you will not be able to recover this user record!",
	      type: "warning",
	      showCancelButton: true,
	      confirmButtonColor: "#DD6B55",
	      confirmButtonText: "Yes, delete it!",
	      cancelButtonText: "No, cancel it!",
	      closeOnConfirm: false,
	      closeOnCancel: false
			},
				function(willDeleteUser) {
					if(willDeleteUser) { //if user click delete
						//send ajax request to server
						$.ajax({
							method: "POST", //send via post method
							url: "app/actions.controller.php", //file to be send request
							data: { //data to be retrieve via $_POST[]
								deleteUserBtnSet: true, 		
								deleteUserId: deleteUserId	
							},
							success:function(result) { //if success
								//console.log(data);
								swal({
		              title: "Deleted!",
		              text: "User record deleted successfully",
		              type: "success"
		            }, function() {
		              window.location = "accounts"; //redirect to same page
		            });
							}
						});
					} else { //user click cancel
						swal("Cancelled!", "User record is safe!", "error");
					}
				}
			);
		});

		//show user data on modal
		$('#tbody_users').on("click", ".view_btn", function(viewEvent) {
			viewEvent.preventDefault();
			// alert("test");
			$('#user_view_accountModal').modal('show'); //show modal
			var user_id = $(this).closest('tr').find('.user_id').text();
			//console.log(user_id);

			//send ajax request
			$.ajax({
				method: "POST",
				url: "app/actions.controller.php",
				data: {
					checking_viewbtn:true,
					user_id:user_id
				},
				success: function(response) {
					//console.log(response);
					$('.user_viewing_data').html(response);
				}
			});
		});

		//hide and show password
		$("#show_hide_password a, #show_hide_cpassword a").on('click', function(event) {
		  event.preventDefault();
		  if($('#show_hide_password input, #show_hide_cpassword input').attr("type") == "text"){
		    $('#show_hide_password input, #show_hide_cpassword input').attr('type', 'password');
		    $('#show_hide_password i, #show_hide_cpassword i').addClass( "fa-eye-slash" );
		    $('#show_hide_password i, #show_hide_cpassword i').removeClass( "fa-eye" );
		  } else if($('#show_hide_password input, #show_hide_cpassword input').attr("type") == "password"){
		    $('#show_hide_password input, #show_hide_cpassword input').attr('type', 'text');
		    $('#show_hide_password i, #show_hide_cpassword i').removeClass( "fa-eye-slash" );
		    $('#show_hide_password i, #show_hide_cpassword i').addClass( "fa-eye" );
		  }
		});
	}); //end document ready()
</script>