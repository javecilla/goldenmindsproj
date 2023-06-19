<?php 
//start the session to use $_SESSION super global variable
session_start();
?>
<!DOCTYPE html>
<html lang="en">

  	<head>

    	<meta charset="UTF-8" />
    	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    	<meta http-equiv="X-UA-Compatible" content="ie-edge"/>
    	<!--<meta http-equiv="refresh" content="60" />--> <!--refresh the page every 1 minute-->

    	<link rel="icon" type="image/png" href="gmc home/images/gmc-logo.png" />

		<!--CSS File(includes bootstrap)-->	
		<link rel="stylesheet" href="gmc home/css/bootstrap/bootstrap.style.css" />
		<link rel="stylesheet" href="gmc home/css/bootstrap/bootstrap.animate.css" />
		<link rel="stylesheet" href="gmc home/css/bootstrap/bootstrap.preloader.css" />
	
		<!--Icons LSibrary-->
		<link rel="stylesheet" href="gmc home/icons/all.min.css" />
		<link rel="stylesheet" href="gmc home/icons/fontawesome.min.css" />

		<!--CSS core-->
		<link async rel="stylesheet" type="text/css" href="gmc home/css/header.css" defer/>
		<link async rel="stylesheet" type="text/css" href="gmc home/css/navbar.css" defer/>
		<link async rel="stylesheet" type="text/css" href="gmc home/css/main.css" defer/>

    	<title> Home | Golden Minds Colleges</title>
 	</head>

 	<body onload ="login()">
 		<!--SCROLL BACKTOP TOP BUTTON-->
		<button id="back_to_top_btn" class="btn-back-to-top">
			<i class="fa-sharp fa-solid fa-caret-up"></i>
		</button>

		<!-- username -->
		<input type = 'hidden' name = 'txtusername' id = 'txtusername'>

		<?php
			//DB connection
			$cn = mysqli_connect('localhost', 'root', '', 'gmcbulac_db_gmc');
			//$cn = mysqli_connect('localhost', 'gmcbulac_derek03', 'derek030872', 'gmcbulac_db_gmc');

			$txtusername = $_POST['txtusername'];
			$sql = mysqli_query($cn, "select * from account_registration where username = '$txtusername'");
			while($row = mysqli_fetch_assoc($sql))
			{
				$username = $row['username'];
				$acctname = $row['account_name'];
				$acclevel = $row['access_level'];
				$imageName = $row['img_profile'];
				$imageExtension = $row['file_format'];
			}
		?>
		
 		<!------------HEADER CONTENT------------>
		<header class="header">
			<div class="navbar navbar-inverse main-nav">
				<div class="header container">
				   <div class="navbar-header">
				      <small id="school-branch-label">&nbsp;&nbsp;&nbsp;&nbsp;STA. MARIA - BALAGTAS, BULACAN.</small>
				      <a href="gmc home.php" class="school-name-nav">
				         <span class="navbar-logo text-uppercase ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				            G<small>olden</small> M<small>inds</small> C<small>olleges</small>
				         </span>
				      </a>
				   </div>
				</div><!--header container-->
			</div><!--navbar inverse-->
		</header>
		<!------------END HEADER CONTENT------------>
		
		<!------------NAVIGATION CONTENT------------>
		<nav class="navbar navbar-expand-lg ftco-navbar-light" id="navbar">

			<!--USER PROFILE DROPDOWN NAV-->
			<li class="user-profile-nav nav-item dropdown">
           <a id="userProfile_dropdown" class="nav-link dropdown-toggle user-profile" href="#"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           		<form action= 'gmc home.php' method='post'>
	            	<div class="profile-container">
						
						<!--USER PROFILE-->
						
	              		<img src="gmc home/user-upload-photo/<?php echo $imageName. '.' . $imageExtension;?>" alt=""  class="rounded-pill user-photo"/> 

	              		<!--USER ACCOUNT NAME-->
	              		
	              			<label class="user-account-name">
	              				<?php echo $acctname;?>
	              			</label> <i class="fa-solid fa-caret-down"></i>
							
							<input type = 'hidden' name = 'txtacctname' id = 'txtacctname'>
							<input type = 'hidden' name = 'txtaccesslevel' id = 'txtaccesslevel'>

	              		<input type = 'hidden' name = 'txtusername' value = '<?php echo $username;?>' /> 
	              	</div>
	            </form>	
            </a>
            <div class="dropdown-menu" aria-labelledby="userProfile_dropdown">

            	<?php
						//DB Connection
						$cn = mysqli_connect('localhost', 'root', '', 'gmcbulac_db_gmc');
						//$cn = mysqli_connect('localhost', 'gmcbulac_derek03', 'derek030872', 'gmcbulac_db_gmc');

						#CHECK IF INPUT FILE HAS CLICK
   					if(isset($_FILES['profile_img']['name']))
   					{
   						//retrieve file submitted by user 
						   $imageName = $_FILES['profile_img']['name'];
						   //data initialization
						   $imageSize = $_FILES['profile_img']['size'];
						   $tmpName = $_FILES['profile_img']['tmp_name'];

						  //valididate image uploaded by user

						   //limit the user to upload file, by setting an array for file format extension e.g jpeg, jpg, png
						   $validImageExtension = ['jpeg', 'jpg', 'png'];
						   $imageExtension = explode('.', $imageName); //get image extension
						   $imageName = $imageExtension[0]; //get image name
						   $imageExtension = strtolower(end($imageExtension)); 
						   //explode, split a file name string submitetd by users into two parts,[e.g.imageName.imageExtension]
						   //strtolower, ensure all image inserted in db the extension file is always lowercase
						   //end, return or get  the last element of '$imageExtension' array

						   //check if submited file is said in an array $validImageExtension (e.g. jpeg, jpg, png)
						   if(!in_array($imageExtension, $validImageExtension)) 
						   {
						      //if it is not then display this error message
						      $_SESSION['danger_message'] = "Only 'jpeg, jpg, png' format will accept.";
						      header("Location: gmc home.php");
						      exit();
						   }
						   else //if so, user submited valid image format
						   {
						     	//then the submited images stored in 'user-upload-photo' folder
         					move_uploaded_file($tmpName, "gmc home/user-upload-photo/" .$imageName.'.'.$imageExtension);
							  
							  $query = mysqli_query($cn, "update account_registration set img_profile = '$imageName', file_format = '$imageExtension' where username = '$username'");
							  
							  $query = mysqli_query($cn, "update wallpost set img_profile = '$imageName', file_format = '$imageExtension' where username = '$username'");
							
							echo"<script>
							history.go(-1)
							</script>";

							
						    //prepare statement
         					//check if the result successfully executed
         					//if($result)
         					//{
         						//if it is success, execute this statement
         						//$_SESSION['success_message'] = "Profile photo updated successfully.";
								//echo"<script>history.go(-1)</script>";
							      //header("Location: gmc home.php");
							      //exit();
         					//}
         					//else
         					//{
         						//$_SESSION['danger_message'] = "Failed to update profile photo.";
         						//header("Location: gmc home.php");
							      //exit();
         					//}
						   } //else
   					}//isset[] 
   					// Close the database connection
						mysqli_close($cn);
					?>

            	<!--FORM FOR UPLOAD USER PHOTO-->
              	<form action="" method="POST" enctype="multipart/form-data">
              		<label for="chgprofile_btn" class="dropdown-item">
              			<i class="fa-regular fa-pen-to-square"></i> Change Profile
              			<input type="file" accept=".jpeg, .jpg, .png"  
                       id="chgprofile_btn" name="profile_img" class="upload-photo" />
              		</label>
              		<button type="submit" id="submit_btn" class="dropdown-item" disabled>
              			<i class="fa-regular fa-floppy-disk"></i> Save Changes
              		</button>

              		<input type = 'hidden' name = 'txtusername' value = '<?php echo $username;?>' /> 
              	</form>

            </div>
         </li>
 
			<!--MENU BUTTON [button show for tablet and cellphone screenview]-->
			<label class="navbar-toggler" data-toggle="collapse" data-target="#menu-btn" aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
				<input type="checkbox" name="menu-bar" />
				<div class="bars">
					<span class="bot"></span>
					<span class="mid"></span>
					<span class="top"></span>
				</div>
			</label>


			<!--container for collapsable nav-->
			<div class="collapse navbar-collapse" id="menu-btn"><hr/>

	        	<!--BUTTON MENU LIST-->
	        	<ul class="navbar-nav mr-auto">

	        		<!--FOR HOME BUTTON-->
	        		<li class="nav-item">
	        			<form action = 'gmc home.php' method = 'post' class="nav-form-btn">
	        				<input type = 'submit' value = 'HOME' class="home-btn "/>
	        				<input type = 'hidden' name = 'txtusername' value = '<?php echo $username;?>' />
	        			</form>
	        		</li>

	        		<!--FOR ACCOUNT BUTTON-->
	        		<li class="nav-item">	
	        			<form action = 'gmc account.php' method = 'post'>
	        				<input type = "submit" name = 'btnacct' id ='btnacct' value ='ACCOUNT' class="acc-btn btn-nav" />
	        				<input type = 'hidden' name = 'txtusername' value = '<?php echo $username;?>'> 
	        			</form>
	        		</li>

	        		<!--FOR LOGOUT BUTTON-->
	        		<li class="nav-item">
	        			<form action = '' method = ''> 
	        				<input type = 'button' value = 'LOGOUT' onclick = 'logout()' class="logout-btn">
	        			</form>
	        		</li>

	        		<!--USER ACCESS DROPDOWN BUTTON-->
	        		<li class="nav-item dropdown">

              		<a class="nav-link dropdown-toggle user-access" href="#" id="userAccess_dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              		 	<?php echo $acclevel;?> Access <i class="fa-solid fa-caret-down"></i>
              		</a>

              		<!--container for dropwon user access-->
              		<div class="dropdown-menu user-access-dropdown" aria-labelledby="userAccess_dropdown" 
              		style="background: #765341;">

              			<!--TABLE FOR ADMIN -->
              			<table id = 'tbladmin' border = 2>
              				<tr>
              					<!--FOR USER ACCOUNT BUTTON-->
              					<th>
              						<form action = 'gmc user accounts.php' method = 'post'>
              							<input type = 'submit' name = 'useraccounts' id = 'btnuseraccounts' value = 'User Accounts' class="admin-btn-user-account" />
              							<input type = 'hidden' name = 'txtusername' value = '<?php echo $username;?>' />
              						</form>
              					</th>
									<!--FOR S.O.A BUTTON-->
              					<th>
										<form action = 'gmc soa.php' method = 'post'>
											<input type = 'submit' name = 'soa' id = 'btnsoa' value = 'S.O.A.' class="admin-btn-soa" />
											&nbsp;&nbsp;&nbsp;
											<input type = 'hidden' name = 'txtusername' value = '<?php echo $username;?>' />
										</form>
									</th>
									<!--FOR SETTINGS BUTTON-->
									<th>
										<form action = 'gmc settings.php' method = 'post'>
											<input type = 'submit' name = 'settings' id = 'btnsettings' value = 'Settings' class="admin-btn-settings" />
											<input type = 'hidden' name = 'txtusername' value = '<?php echo $username;?>' />
										</form>
									</th>
              				</tr>
              			</table><!--table admin-->

              			<hr/>

              			<!--TABLE FOR TEACHER-->
              			<table id = 'tblteacher' border = 2>
              				<tr>
              					<!--FOR REGISTRATION BUTTON-->
              					<th>
              						<form action = 'gmc registration.php' method = 'post'>
											<input type = 'submit' name = 'btnregistration' id = 'btnregistration' value = 'Registration' class="teacher-btn-registration" />
											<input type = 'hidden' name = 'txtusername' value = '<?php echo $username;?>'>
										</form>
              					</th>
              					<!--FOR STUDENT LIST BUTTON-->
              					<th>
              						<form action = 'gmc student list.php' method = 'post'>
											<input type = 'submit' name = 'btnstudlist' id = 'btnstudlist' value = 'Student List' class="teacher-btn-student-list" />
											<input type = 'hidden' name = 'txtusername' value = '<?php echo $username;?>'>
										</form>
              					</th>
              					<!--FOR SUMMARY BUTTON-->
              					<th>
              						<form action = 'gmc sog.php' method = 'post'>
											<input type = 'submit' name = 'sog' id = 'btnsog' value = 'Summary' class="teacher-btn-summary" />
											<input type = 'hidden' name = 'txtusername' value = '<?php echo $username;?>'>
										</form>
              					</th>
              				</tr>
              			</table><!--table teacher-->

              			<hr/>

              			<!--TABLE FOR STUDENT-->
              			<table id = 'tblstudent' border = 2>
              				<tr>
              					<!--FOR PROFILE BUTTON-->
              					<th>
              						<form action = 'gmc profile.php' method = 'post'>
											<input type = 'submit' name = 'profile' id = 'btnprofile' value = 'Profile' class="student-btn-profile"/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											<input type = 'hidden' name = 'txtusername' value = '<?php echo $username;?>' />
										</form>
              					</th>
              					<!--FOR GRADES BUTTON-->
              					<th>
              						<form action = 'gmc grades.php' method = 'post'>
											<input type = 'submit' name = 'grades' id = 'btngrades' value = 'Grades' class="student-btn-grades"/>&nbsp;&nbsp;&nbsp;&nbsp;
											<input type = 'hidden' name = 'txtusername' value = '<?php echo $username;?>' />
										</form>
              					</th>
              					<!--FOR PAYMENTS BUTTON-->
              					<th>
              						<form action = 'gmc payments.php' method = 'post'>
											<input type = 'submit' name = 'payments' id = 'btnpayments' value = 'Payments' class="student-btn-payments" />
											<input type = 'hidden' name = 'txtusername' value = '<?php echo $username;?>' />
										</form>
              					</th>
              				</tr>
              			</table>

              		</div><!--dropdown menu container-->
            	</li><!--nav item-->
	        	</ul><!--menu button list-->

	        	<!--GMC POST TIMELINE-->	
	        	<div class="input-text-field">
					<form action='gmc home.php' method='post' class="d-flex input-group w-auto my-auto mb-3 mb-md-0">
						<!--FOR INPUT TYPE FIELD-->
						<input type = 'text' name = 'txtpost' id = 'txtpost' placeholder = "What's on your Golden Minds?" class="form-control mr-sm-2 rounded write-post" required>
                      
						<!--FOR INPUT 'POST' BUTTON-->
						<input type='submit' name='btnpost' id='btnpost' value="Post" class="btn-post rounded text-uppercase">

						<input type = 'hidden' name = 'txtusername' value = '<?php echo $username;?>'>
						<input type = 'hidden' name = 'txtacctname' value = '<?php echo $acctname;?>'>
					</form>
				</div>
			</div>
	  	</nav>
	  	<!------------END NAVIGATION CONTENT------------>


	  	<!--MESSAGE ALERT-->
	  	<?php include('gmc home/includes/success.message.alert.php');?>
	  	<?php include('gmc home/includes/danger.message.alert.php');?>


	  	<!------------MAIN CONTENT------------>
	  	<main class="main-content">
	  		<!------------ANNOUCEMENT------------>
	  		
			<!--<div class="my-5">
				<div class="announcement container">
					<section class="section-a">
						<h4 class="mb-5-left announcement-heading text-center"><strong>ANNOUNCEMENT</strong></h4><br/>
						<div class="row text-left">

							<!--LEFT ANNOUNCEMENT-->
			<!--				<div class="col-lg-6 mb-4">
								<div class="card-announcement">
									<div class="card-body">
										<table>
											<form action="" method="">
												<!--TABLE ROW FOR ANNOUNCEMENT HEADING TITLE-->
			<!--									<tr>
													<th>
														<img src="gmc home/images/announcement.png" class="announcement rounded-circle "/>
														<label for="date" class="announcement-date">February 26</label>
													</th>
												</tr>
												<!--TABLE ROW FOR ANNOUNCEMENT CONTENT-->
			<!--									<td class="announcement-content"><hr/>
													Attention GMCians! test test tests annoncement test announcement
												</td>
												<!--TABLE ROW FOR ANNOUNCEMENT ADMIN ACTION BUTTON-->
			<!--									<tr>
													<td><hr/>
														<button type="submit" class="btn btn-edit-announcement" data-toggle="tooltip" data-placement="bottom" title="Edit Announcement">
															<i class="fa-regular fa-pen-to-square"></i>
														</button>

														<button type="submit" class="btn btn-delete-announcement" data-toggle="tooltip" data-placement="bottom" title="Delete Announcement">
															<i class="fa-sharp fa-regular fa-trash-can"></i>
														</button>
													</td>
												</tr>
											</form>
										</table>
									</div><!--card-body-->
			<!--					</div><!--card-announcement-->
			<!--				</div><!--col-6-->
							<!--END LEFT ANNOUNCEMENT-->

							<!--RIGHT ANNOUNCEMENT-->
			<!--				<div class="col-lg-6 mb-4">
								<div class="card-announcement">
									<div class="card-body">
										<table>
											<form action="" method="">
												<!--TABLE ROW FOR ANNOUNCEMENT HEADING TITLE-->
			<!--									<tr>
													<th>
														<img src="gmc home/images/announcement.png" class="announcement rounded-circle "/>
														<label for="date" class="announcement-date">February 23</label>
													</th>
												</tr>
												<!--TABLE ROW FOR ANNOUNCEMENT CONTENT-->
			<!--									<td class="announcement-content"><hr/>
													GMC Happy tot. test announcement etst announcement goes here test test
												</td>
												<!--TABLE ROW FOR ANNOUNCEMENT ADMIN ACTION BUTTON-->
			<!--									<tr>
													<td><hr/>
														<button type="submit" class="btn btn-edit-announcement" data-toggle="tooltip" data-placement="bottom" title="Edit Announcement">
															<i class="fa-regular fa-pen-to-square"></i>
														</button>

														<button type="submit" class="btn btn-delete-announcement" data-toggle="tooltip" data-placement="bottom" title="Delete Announcement">
															<i class="fa-sharp fa-regular fa-trash-can"></i>
														</button>
													</td>
												</tr>
											</form>
										</table>
									</div><!--card-body-->
			<!--					</div><!--card-announcement-->
			<!--				</div><!--col-6-->
							<!--END RIGHT ANNOUNCEMENT-->

			<!--			</div><!--row-->
			<!--		</section>
				</div><!--announcement container-->
			<!--</div><!--my-5-->
			<!------------END ANNOUCEMENT------------>


			<!------------WALLPOST------------>
			<div class="wallpost container">
				<div class="row">
					<section class="section-b">
						<h4 class="mb-5-left wallpost-heading text-center"><strong>WALLPOST</strong></h4><br/>


						<?php
							//DB Connection
							$cn = mysqli_connect('localhost', 'root', '', 'gmcbulac_db_gmc');
							//$cn = mysqli_connect('localhost', 'gmcbulac_derek03', 'derek030872', 'gmcbulac_db_gmc');

							// Login
							if(isset($_POST['btnlogin']))
							{
								$txtusername = $_POST['txtusername'];
								$txtpass = $_POST['txtpass'];

								$sql = mysqli_query($cn, "select * from account_registration where username = '$txtusername' and pass = '$txtpass' and (status = 'Approved' or status = 'Active')");
								$login = mysqli_num_rows($sql);

								if(!empty($txtusername) && !empty($txtpass) && $login == 1)
								{
									// Login Successful
								}
								else
								{
									echo"<script>window.location.href = 'gmc login.html'</script>";
								}
							}


							// Account Info
							$txtusername = $_POST['txtusername'];

							$sql = mysqli_query($cn, "select * from account_registration where username = '$txtusername'");
							$username = mysqli_num_rows($sql);

							while($row = mysqli_fetch_assoc($sql))
							{
								$username = $row['username'];
								$accesslevel = $row['access_level'];
								echo"<script>document.getElementById('txtacctname').value = '$row[account_name]'</script>";
								echo"<script>document.getElementById('txtaccesslevel').value = '$row[access_level]'</script>";
							}


							//Button Post
							if(isset($_POST['btnpost']))
							{
								$txtusername = $_POST['txtusername'];
								$txtacctname = $_POST['txtacctname'];
								$txtpost = $_POST['txtpost'];

								$sql = mysqli_query($cn, "insert into wallpost (username, account_name, user_post, img_profile, file_format) values ('$txtusername', '$txtacctname', '$txtpost', '$imageName', '$imageExtension')");
							}


							//Button Delete
							if(isset($_POST['btndelete']))
							{
								$txtaccesslevel = $_POST['txtaccesslevel'];
								$txtusername = $_POST['txtusername'];
								$txtpostno = $_POST['txtpostno'];
								$txtuser = $_POST['txtuser'];

								if($txtaccesslevel == 'Admin')
								{
									$sql = mysqli_query($cn, "delete from wallpost where post_no = '$txtpostno' and username = '$txtuser'");
								}
								else
								{
									$sql = mysqli_query($cn, "delete from wallpost where post_no = '$txtpostno' and username = '$txtusername'");
								}
							}

						?>
						
						<?php
						
							//fetching all user post
							$sql = mysqli_query($cn, "select * from wallpost order by post_no desc;");
							$search = mysqli_num_rows($sql);	

							while($row = mysqli_fetch_assoc($sql))
							{
							
								//divide php
								?>
								
									<div class="card-wallpost mb-3">
										<div class="card-body wow fadeInUp">
											<table cellspacing = 0>
												<form action = 'gmc home.php' method = 'post'>
													<tr>					    
													<td>
													<input type='text'  name = 'txtpostno' style = 'display: none;' value="<?= $row['post_no']; ?>">
														
													<input type='text' style = 'display: none;' name = 'txtuser'  value="<?= $row['username']; ?>">
													</td>
													
													</tr>
													<!--USER PROFILE PHOTO AND ACCOUNT NAME HERE-->
													<tr>	
													<td>

													<img src="gmc home/user-upload-photo/<?= $row['img_profile'] . '.' . $row['file_format']; ?>" class="user-profile-wallpost rounded-circle"/>
															
													<input type='text' value="<?= $row['account_name']; ?>" class="user-account-name-wallpost"/><hr/>
												 		
														</td>
													</tr>
													<!--USER WALLPOST CONTENT HERE-->
													<tr>
														<td class="wallpost-content">
															<?= $row['user_post']; ?>
														</td>
													</tr>
													<!--WALLPOST ACTION [Edit, Delete] BUTTON-->
													<tr>
														<td><hr/>	
															<button type='submit' name='btnedit' id='btnedit' class="btn-edit-wallpost"
																data-toggle='tooltip' data-placement='bottom' title='Edit Post' disabled>
												   			<i class="fa-regular fa-pen-to-square"></i>
												   		</button>

														   <button type='submit' name='btndelete' id='btndelete' class="btn-delete-wallpost"
																data-toggle='tooltip' data-placement='bottom' title='Delete Post'>
														   	<i class="fa-sharp fa-regular fa-trash-can"></i>
														   </button>
														   
													<input type = 'hidden' name = 'txtaccesslevel' value = '<?php echo $accesslevel;?>'>
															
													<input type = 'hidden' name = 'txtusername' value = '<?php echo $username;?>'>
														   
														</td>
													</tr>
												</form>
											</table>
										</div><!--card-body-->
									</div><!--card-wallpost-->
								<?php //end php divide
							} //end while
				
   						// Close the database connection
							mysqli_close($cn);
						?>

					</section>
				</div><!--row-->
			</div><!--wallpost container-->
			<!------------END WALLPOST------------>
	  	</main>	
	  	<!------------END MAIN CONTENT------------>
	  	

	  	<!------------FOOTER CONTENT------------>
	  	<footer class="footer text-center"><br/>
	  		&copy;2010-2023 Golden Minds Colleges Bulacan, Inc.
	  	</footer>
	  	<!------------END FOOTER CONTENT------------>
 		
 		<!-- JS core -->
		<script async src="gmc home/js/main.js" defer></script>

		<!-- JS File(includes bootstrap)-->
		<script src="gmc home/js/bootstrap/bootstrap.jquery.min.js"></script>
		<script src="gmc home/js/bootstrap/bootstrap.wow.min.js"></script>
		<script src="gmc home/js/bootstrap/bootstrap.preloader.js"></script>
		<script src="gmc home/js/bootstrap/bootstrap.min.js"></script>
		<script src="gmc home/js/bootstrap/bootstrap.index.js" defer></script>

 	</body>
</html>

<script>

document.getElementById('txtusername').value = localStorage['objectToPass'];

	function login()
	{
		if(document.getElementById('txtusername').value == 'undefined' || 
			document.getElementById('txtacctname').value == '')
		{
			window.location.href = 'gmc login.html';
		}
	}


	// Logout
	function logout()
	{
		localStorage.removeItem('objectToPass');
		window.location.href = 'gmc login.html';
	}

	if(document.getElementById('txtaccesslevel').value == 'Admin')
	{
		document.getElementById('tbladmin').style.display = 'table';
		document.getElementById('tblteacher').style.display = 'table';
		document.getElementById('tblstudent').style.display = 'table';
	}
	else if(document.getElementById('txtaccesslevel').value == 'Teacher')
	{
		document.getElementById('tbladmin').style.display = 'none';
		document.getElementById('tblteacher').style.display = 'table';
		document.getElementById('tblstudent').style.display = 'none';
	}
	else
	{
		document.getElementById('tbladmin').style.display = 'none';
		document.getElementById('tblteacher').style.display = 'none';
		document.getElementById('tblstudent').style.display = 'table';
	}

</script>