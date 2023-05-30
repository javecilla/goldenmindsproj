<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<title>Programs - Golden Minds Bulacan</title>
	<?php require_once __DIR__ . '/components/links.php'; ?>
	<style>
		/* Position text in the middle of the page/image */
		.bg-text {
		  /*background-color: rgb(0,0,0); /* Fallback color */
		  background-color: rgba(0,0,0, 0.2); /* Black w/opacity/see-through */*/
		  color: #fff!important;
		  font-weight: bold;
		  border: 3px solid #f1f1f1;
		  position: absolute;
		  top: 70%;
		  left: 50%;
		  transform: translate(-50%, -50%);
		  z-index: 2;
		  width: 50%;
		  padding: 20px;
		  text-align: center;
		}
		.paragraph_text {
      text-align: justify; 
      text-justify: inter-word;
    }
    .title_bordered {
      border-left: 4px solid #996515;
      background: #f3f3f3; 
      height: 45px;
      padding: 10px;
    }
    .otp_btn:active {
    	color: #996515!important;
    }
    .otp_btn:hover {
    	color: #996515!important;
    }

    .strand_icon:hover {
   		transform: scale(1.02);
   		box-shadow: 0 10px 20px rgba(0,0,0,.12), 0 4px 8px rgba(0,0,0,.06);
   		display: block;
		}
	</style>
</head>
<body>
	<main id="main_content">
		<?php require_once __DIR__ . '/components/header.php';?>
		<?php require_once __DIR__ . '/components/navbar.php'; ?>

		<section class="programs">
			<?php
			if(isset($_GET['sp'])) {
				if($_GET['sp'] == 'pre_kinder') 
				{
					?>
					<h6>pre kinder</h6>
					<?php	
				}
				else if($_GET['sp'] == 'elementary') 
				{
					?>
					<h6>elementary</h6>
					<?php	
				} 
				else if($_GET['sp'] == 'jhs') 
				{
					?>
					<h6>junior high school</h6>
					<?php	
				}
				else if($_GET['sp'] == 'shs')
				{
					?>
					<div class="shs_wrapper">
            <div class="card mb-5">
  						<img decoding="async" src="resources/images/general/shs.png" class="card-img-top">
  						<div class="card-img-overlay" style="background: rgba(0, 0, 0, .5);">
  							<!-- <p class="card-text text-white paragraph_text text-center" style="line-height: 1; ">
  								<small>The Senior High School Department commits itself to the total formation of the person, promotion of truth and transformation of values for the service of humanity.</small>
  							</p> -->
  						</div>
  						<div class="bg-text col-md3 col-md-9"><br>
							  <h4 class="text-white">The Senior High School Department commits itself to the total formation of the person, promotion of truth and transformation of values for the service of humanity.</h4>
							  <p class="text-white">Preparing for better future...GMC</p>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<div class="card">
                  <div class="row g-0">
                    <div class="col-md-3">
                    	<aside class="mb-5 bd-aside card iq-document-card sticky-xl-top text-muted align-self-start" id="left-side-bar">
            						<nav class="small" id="elements_section">
                					<ul class="mb-0 list-unstyled">
                						<li class="mt-2">
                        			<div class="header-title title_bordered" >
                								<h5 class="card-title">&nbsp;On this page</h5>
              								</div>
                    				</li>
                    				<li class="mt-2">
                        			<a href="programs?sp=<?=$_GET['sp']?>" class="btn otp_btn d-inline-flex align-items-center">
                            		<i class="fa-solid fa-chevron-right"></i>&nbsp; Main
                        			</a>
                    				</li>
                    				<li class="mt-2">
                        			<a href="programs?sp=<?=$_GET['sp']?>&op=objectives" class="btn otp_btn d-inline-flex align-items-center">
                            		<i class="fa-solid fa-chevron-right"></i>&nbsp; Objectives
                        			</a>
                    				</li>
                    				<li class="mt-2">
                        			<a href="programs?sp=<?=$_GET['sp']?>&op=programs_offerings" class="btn otp_btn d-inline-flex align-items-center">
                            		<i class="fa-solid fa-chevron-right"></i>&nbsp; SHS Program Offerings
                        			</a>
                    				</li>
                    				<li class="mt-2">
                        			<a href="programs?sp=<?=$_GET['sp']?>&op=curriculum" class="btn otp_btn d-inline-flex align-items-center">
                            		<i class="fa-solid fa-chevron-right"></i>&nbsp; Curriculum
                        			</a>
                    				</li>
                    				<li class="mt-2">
                        			<a href="programs?sp=<?=$_GET['sp']?>&op=policies" class="btn otp_btn d-inline-flex align-items-center">
                            		<i class="fa-solid fa-chevron-right"></i>&nbsp; SHS Policies
                        			</a>
                    				</li>
                    				<li class="mt-2">
                        			<a href="programs?sp=<?=$_GET['sp']?>&op=faculty_staff" class="btn otp_btn d-inline-flex align-items-center">
                            		<i class="fa-solid fa-chevron-right"></i>&nbsp; Faculty and Staff
                        			</a>
                    				</li>
                    				<li class="mt-2">
                        			<a href="programs?sp=<?=$_GET['sp']?>&op=uniform" class="btn otp_btn d-inline-flex align-items-center">
                            		<i class="fa-solid fa-chevron-right"></i>&nbsp; Uniform
                        			</a>
                    				</li>
                					</ul>
            						</nav>
        							</aside>
                    </div>
                    <div class="col-md-9">
                    	<div class="whats_on_this_page img-thumbnail p-3" style="margin-top: -48px;">
	                      <div class="card-body">
		                      <?php
		                      if(isset($_GET['op']) && !empty($_GET['op'])) {
		                      	if($_GET['op'] == 'objectives') 
		                      	{
		                      		?>
		                      		<h3 class="card-title" style="letter-spacing: 1px;"><strong>SHS Program Objectives</strong></h3>
		                      		<p spellcheck="true" class="card-text paragraph_text">
		                      			The Senior High School department adheres and passionately affirms and practices the Vision, Mission, and Goals of the Institution. In accordance, the subsequent are the GMC-SHS program objectives:
		                      			<br/><br/>
		                      			<strong><i>After 2 years students will be able to:</i></strong><br/>
		                      			<ol>
		                      				<li>Realize their potentials in line with entrepreneurship, health, education, social work, etc. Or in any other chosen field/profession.
		                      				</li>
		                      				<li>Recognize their significance as shown by substantial contribution in the community inform of their advocacy, leadership, and profession.</li>
		                      				<li>Applies strong leadership in their chosen field as expressed by extensive output in research and other scientific studies, innovations and other significant improvements in their area/profession in terms of practice and/delivery system.</li>
		                      				<li>Develop strong sense of spirituality by actively practicing Christian values as expressed in service for humanity and in all God’s creation.</li>
		                      			</ol>
		                      		</p>
		                      		<br/><br/>
		                      		<h3 class="card-title" style="letter-spacing: 1px;"><strong>SHS Program Tri-focalization</strong></h3><hr/>
		                      		<div style="padding:15px;">
												        <ul class="li-font-awesome">
												          <li class="li-check-circle">
												            <b class="pink-text">Explore</b>
												            <p>
												              Refining foundational and advance affective, cognitive, and psychomotor aspect thru Research or scientific studies. Cultivating conscious exploration of interests and preference among students within their chosen field.
												            </p>
												          </li>
												        </ul>
												        <hr>
												        <ul class="li-font-awesome">
												          <li class="li-check-circle">
												            <b class="pink-text">Apply</b>
												            <p>
												              Appertains to affective, cognitive, and psychomotor process into an applicable platform that involves substantial contribution that promotes and improve the quality and preserves the integrity of life. 
												            </p>
												          </li>
												        </ul>
												        <hr>
												        <ul class="li-font-awesome">
												          <li class="li-check-circle">
												            <b class="pink-text">Develop</b>
												            <p>
												              Transforming academic experience into construe of becoming a relevant Christian witness who advocates faith and pursues zealously stewardship of truth.
												            </p>
												          </li>
												        </ul>
												      </div>
		                      		<?php
		                      	}
		                      	else if($_GET['op'] == 'programs_offerings') {
		                      		?>
		                      		<h3 class="card-title mb-3" style="letter-spacing: 1px;"><strong>SHS Program Offerings</strong></h3><br/>
		                      		<div class="header-title title_bordered mb-3" >
                								<h5 class="card-title">&nbsp;Academic Strands</h5>
              								</div>
              								<div class="card-group row">
              									<div class="col-md-3">
              										<a href="javascript:void" class="strand_icon">
																	  <div class="card">
																	    <img src="resources/images/general/SHS-STEM.png" class="card-img-top" width="170"/>
																	    <!-- <div class="card-body">
																	      <h5 class="card-title">STEM</h5>
																	      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
																	    </div>
																	    <div class="card-footer">
																	      <small class="text-body-secondary">Enrol Now</small>
																	    </div> -->
																	  </div>
																	</a>
              									</div>
              									<div class="col-md-3">
              										<a href="javascript:void" class="strand_icon">
																	  <div class="card">
																	    <img src="resources/images/general/SHS-ABM-LOGO.png" class="card-img-top" width="170"/>
																	    <!-- <div class="card-body">
																	      <h5 class="card-title">ABM</h5>
																	      <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
																	    </div>
																	    <div class="card-footer">
																	      <small class="text-body-secondary">Last updated 3 mins ago</small>
																	    </div> -->
																	  </div>
																	</a>
              									</div>
              									<div class="col-md-3">
              										<a href="javascript:void" class="strand_icon">
																	  <div class="card">
																	    <img src="resources/images/general/SHS-HUMSS-LOGO.png" class="card-img-top" width="170"/>
																	    <!-- <div class="card-body">
																	      <h5 class="card-title">HUMSS</h5>
																	      <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
																	    </div>
																	    <div class="card-footer">
																	      <small class="text-body-secondary">Last updated 3 mins ago</small>
																	    </div> -->
																	  </div>
																	</a>
              									</div>
																<div class="col-md-3">
																	<a href="javascript:void" class="strand_icon">
																	  <div class="card">
																	    <img src="resources/images/general/SHS-GAS.png" class="card-img-top" width="170"/>
																	    <!-- <div class="card-body">
																	      <h5 class="card-title">GAS</h5>
																	      <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
																	    </div>
																	    <div class="card-footer">
																	      <small class="text-body-secondary">Last updated 3 mins ago</small>
																	    </div> -->
																	  </div>
																	</a>
																</div>
															</div>

								              <div class="header-title title_bordered mb-3" >
                								<h5 class="card-title">&nbsp;Tech-Voc Strands</h5>
              								</div>
              								<div class="row">
              									<div class="col-md-3">
																	<a href="javascript:void" class="strand_icon">
																	  <div class="card">
																	    <img src="resources/images/general/SHS-ICT.png" class="card-img-top" width="170"/>
																	    <!-- <div class="card-body">
																	      <h5 class="card-title">GAS</h5>
																	      <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
																	    </div>
																	    <div class="card-footer">
																	      <small class="text-body-secondary">Last updated 3 mins ago</small>
																	    </div> -->
																	  </div>
																	</a>
																</div>
																<div class="col-md-3">
																	<a href="javascript:void" class="strand_icon">
																	  <div class="card">
																	    <img src="resources/images/general/SHS-FB.png" class="card-img-top" width="170"/>
																	    <!-- <div class="card-body">
																	      <h5 class="card-title">GAS</h5>
																	      <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
																	    </div>
																	    <div class="card-footer">
																	      <small class="text-body-secondary">Last updated 3 mins ago</small>
																	    </div> -->
																	  </div>
																	</a>
																</div>
              								</div>

		                      		<?php
		                      	}
		                      } 
		                      else {
		                      	?>
		                      	<h3 class="card-title mb-3" style="letter-spacing: 1px;"><strong>Senior High School Department</strong></h3>
		                      		<p spellcheck="true" class="card-text paragraph_text">
		                      			<strong>Golden Minds Colleges</strong> was started February of 2010. The school then was offering Technical-Vocational Livelihood Program regulated by TESDA. During those years the school was offering Hardware Servicing NC2, Visual Grpphic Design NC3,Bookkeeping NC2, Housekeeping NC2, Food and Beverage NC2. It was situated in barangay Tabang of Guiguinto Bulacan and with a name Golden Minds Academy and Information Technology. Two years after it moved to Balagtas Bulacan a town away from where it started with a new name Golden Minds Colleges.
		                      			<br/><br/>
																Today, the school is now Senior High ready offering tracks like General academic Strand (GAS), Accountancy, Business and Management strand (ABM) and Technical-Vocation Livelihood Strands with Majors in Home Economics (TVL-HE) and Information and Communication Technology (TVL-ICT).
																<br/><br/>

																People behind the institution believe that , it doesnt takes a genius to be successful in life. But having the passion to impart knowledge is more than enough to be able to influence young minds to pursue their dreams and thus become
		                      		</p>
		                      	<?php
		                      } 
		                      ?>
		                    </div>
                      </div>
                    </div>
                  </div>
                </div>
							</div>
						</div>
					</div>
					<?php	
				}
				else {
					echo "Bad Request!";
				}
			} else {
				echo "Bad Request!";
			}
			?>
		</section>

		<div id ="back-to-top" style="display: none;">
      <a class="p-0 btn btn-xs position-fixed top btt_btn" id="top" href="#top">
        <i class="fa-solid fa-chevron-up" style="font-size: 20px"></i>
      </a>
    </div>

		<?php require_once __DIR__ . '/components/footer.php'; ?>
	</main>


</body>
</html>