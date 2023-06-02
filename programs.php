<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<title>Programs - Golden Minds Bulacan</title>
	<?php require_once __DIR__ . '/components/links.php'; ?>
	<style>
		/*.whats_on_this_page {
			background-color: #fff!important;
			color: #000;
		}*/
		/* Position text in the middle of the page/image */
		.bg-text {
		  /*background-color: rgb(0,0,0); /* Fallback color */
		  background-color: rgba(0,0,0, 0.2); /* Black w/opacity/see-through */
		  color: #fff!important;
		  font-weight: bold;
		  border: 2px solid #f1f1f1;
		  position: absolute;
		  top: 75%;
		  left: 50%;
		  transform: translate(-50%, -50%);
		  z-index: 2;
		  width: 60%;
		   height: 30%;
		  padding: 5px;
		  text-align: center;
		}
		.heading_text_img {
			font-size: 18px;
			text-align: center;
		}
		.subheading_text_img {
			font-size: 16px;
			text-align: center;
		}
		/* Turn off parallax scrolling for all tablets and phones. Increase/decrease the pixels if needed */
		@media only screen and (max-device-width: 600px) {
			.bg-text {
				background-attachment: scroll;
				width: 80%;
				height: 20%;
				padding: 40px;
				top: 68%;
			}
			.heading_text_img {
				font-size: 10px;
				position: absolute;
				top: 10%;
				left: 1%;
			}
			.subheading_text_img {
				font-size: 8px;
				position: absolute;
				top: 75%;
				left: 30%;
			}
		}

		.paragraph_text, .policies_card {
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
		.btt_btn {
        padding: 10px!important;
        border-radius: 50%; 
        background-color: #996515; 
        color: #fff;
        opacity: .6;
      }
      .btt_btn:hover {
        color: #fff;
        opacity: .7;
      }
      .policies_card {
      	padding: 8px;
      }
      .h3, .title {
      	font-weight: bold;
      	font-size: 23px;
      } 
      ul {list-style: none}
      li.li_content::before {
      	content: "•"; 
      	color: #000;
  			display: inline-block; 
  			width: 1em;
  			margin-left: -1em}
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
					<center>
						<div class="row justify-content-center">
							<div class="col-10">
								<div class="card guide">
									<img src="resources/images/general/system_update.png" class="bd-placeholder-img card-img-top img-responsive" alt="System Update" />
                    <div class="card-body">
                      <h5 class="card-title">Web site is currently under construction.</h5>
                      <p class="card-text">Thank you for understanding!</p>
                    </div>
                </div>
							</div>
						</div>
					</center>
					<?php	
				}
				else if($_GET['sp'] == 'elementary') 
				{
					?>
					<center>
						<div class="row justify-content-center">
							<div class="col-10">
								<div class="card guide">
									<img src="resources/images/general/system_update.png" class="bd-placeholder-img card-img-top img-responsive" alt="System Update" />
                    <div class="card-body">
                      <h5 class="card-title">Web site is currently under construction.</h5>
                      <p class="card-text">Thank you for understanding!</p>
                    </div>
                </div>
							</div>
						</div>
					</center>
					<?php	
				} 
				else if($_GET['sp'] == 'jhs') 
				{
					?>
					<center>
						<div class="row justify-content-center">
							<div class="col-10">
								<div class="card guide">
									<img src="resources/images/general/system_update.png" class="bd-placeholder-img card-img-top img-responsive" alt="System Update" />
                    <div class="card-body">
                      <h5 class="card-title">Web site is currently under construction.</h5>
                      <p class="card-text">Thank you for understanding!</p>
                    </div>
                </div>
							</div>
						</div>
					</center>
					<?php	
				}
				else if($_GET['sp'] == 'shs')
				{
					?>
					<div class="shs_wrapper">
            <div class="card mb-5">
  						<img decoding="async" src="resources/images/general/shs.png" class="card-img-top">
  						<div class="card-img-overlay" style="background: rgba(0, 0, 0, .2);">
  							<div class="bg-text col-md3 col-md-9"><br>
  								<div style="text-align: center;"> 
							  		<p class="text-white ">
							 			<span class="heading_text_img">The Senior High School Department commits itself to the total formation of the person, promotion of truth and transformation of values for the service of humanity.</span><br/><br/><span class="subheading_text_img">Preparing for better future...GMC</span></p>
  								</div>
								</div>
  						</div>
						</div>
						<div class="row">
							<div class="col">
								<div class="card ">
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
              										<div class="col-md-3 mb-4">
              											<a href="javascript:void" class="strand_icon">
																	  	<div class="accordion" id="accordionForSTEM">
																				<div class="accordion-item">
																					<h4 class="accordion-header" id="headingOne">
																						<img src="resources/images/general/SHS-STEM.png" class="card-img-top accordion-button" width="170" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"/>	
																					</h4>
																					<div id="collapseOne" class="accordion-collapse collapse 	" aria-labelledby="headingOne" data-bs-parent="#accordionForSTEM">
																						<div class="accordion-body">
																							<p class="card-text text-dark paragraph_text">
																	      				<strong>STEM</strong> stands for <strong>Science, Technology, Engineering, and Mathematics</strong> strand. Through the STEM strand, senior high school students are exposed to complex mathematical and science theories and concepts which will serve as a foundation for their college courses.
																	      			</p>
																						</div>
																					</div>
																				</div>
																			</div>
																		</a>
              										</div>

              										<div class="col-md-3 mb-4">
																  	<a href="javascript:void" class="strand_icon">
																	  	<div class="accordion" id="accordionForABM">
																				<div class="accordion-item">
																					<h4 class="accordion-header" id="headingTwo">
																						<img src="resources/images/general/SHS-ABM-LOGO.png" class="card-img-top accordion-button" width="170" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseOne"/>	
																					</h4>
																					<div id="collapseTwo" class="accordion-collapse collapse 	" aria-labelledby="headingTwo" data-bs-parent="#accordionForABM">
																						<div class="accordion-body">
																							<p class="card-text text-dark paragraph_text">
																								<strong>Accountancy, Business and Management (ABM)</strong> strand would focus on the basic concepts of financial management, business management, corporate operations, and all things that are accounted for. This is definitely a suggested strand for those who have their eyes set on creating a business in the future or working in the business sector.
																	      			</p>
																						</div>
																					</div>
																				</div>
																			</div>
																		</a>
              										</div>

              										<div class="col-md-3 mb-4">
																  	<a href="javascript:void" class="strand_icon">
																	  	<div class="accordion" id="accordionForHUMSS">
																				<div class="accordion-item">
																					<h4 class="accordion-header" id="headingThree">
																						<img src="resources/images/general/SHS-HUMSS-LOGO.png" class="card-img-top accordion-button" width="170" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseOne"/>	
																					</h4>
																					<div id="collapseThree" class="accordion-collapse collapse 	" aria-labelledby="headingThree" data-bs-parent="#accordionForHUMSS">
																						<div class="accordion-body">
																							<p class="card-text text-dark paragraph_text">
																								<strong>The Humanities and Social Sciences (HUMSS)</strong> strand is designed for those who wonder what is on the other side of the wall. In other words, you are ready to take on the world and talk to a lot of people. This is for those who are considering taking up journalism, communication arts, liberal arts, education, and other social science-related courses in college.
																								If you take this strand, you could be looking forward to becoming a teacher, a psychologist, a lawyer, a writer, a social worker, or a reporter someday. This strand focuses on improving your communication skills. Oh! And priesthood is a choice in here too!
																	      			</p>
																						</div>
																					</div>
																				</div>
																			</div>
																		</a>
              										</div>

																	<div class="col-md-3">
																		<a href="javascript:void" class="strand_icon">
																			<div class="accordion" id="accordionForGAS">
																				<div class="accordion-item">
																					<h4 class="accordion-header" id="headingFourth">
																						<img src="resources/images/general/SHS-GAS.png" class="card-img-top accordion-button" width="170" data-bs-toggle="collapse" data-bs-target="#collapseFourth" aria-expanded="true" aria-controls="collapseOne"/>	
																					</h4>
																						<div id="collapseFourth" class="accordion-collapse collapse 	" aria-labelledby="headingFourth" data-bs-parent="#accordionForGAS">
																							<div class="accordion-body">
																								<p class="card-text text-dark paragraph_text">										
																									<strong>General Academic Strand (GAS)</strong> is perfect for students who are still unsure about what they will take in college. Because GAS students are required to pick electives from other academic strands, they are expected to be skilled in different subjects. Usually these students must be a “jack of all trades” type of individual or simply those who can do virtually everything. someday. This strand focuses on improving your communication skills. Oh! And priesthood is a choice in here too!
																								</p>
																							</div>
																						</div>
																					</div>
																				</div>
																			</a>
																		</div>
																	</div>
																	<!-- end first row -->
								              		<div class="header-title title_bordered mb-4 mt-4"><h5 class="card-title">&nbsp;Tech-Voc Strands</h5></div>
              										<div class="row">
              											<div class="col-md-3 mb-4">
																  		<a href="javascript:void" class="strand_icon">
																	  		<div class="accordion" id="accordionForICT">
																					<div class="accordion-item">
																						<h4 class="accordion-header" id="headingFifth">
																							<img src="resources/images/general/SHS-ICT.png" class="card-img-top accordion-button" width="170" data-bs-toggle="collapse" data-bs-target="#collapseFifth" aria-expanded="true" aria-controls="collapseOne"/>
																						</h4>
																						<div id="collapseFifth" class="accordion-collapse collapse" aria-labelledby="headingFifth" data-bs-parent="#accordionForICT">
																							<div class="accordion-body">
																								<p class="card-text text-dark paragraph_text">										
																									Information Communication and Technology or ICT Strand is one of the strands offered under Technical-Vocational Livelihood (TVL) Track of K-12 curriculum. ICT strand subjects seek to teach students concepts and skills in information technology.<br/><br/>
																									ICT in Senior High School equips students with the skills and knowledge they need to qualify for TESDA-backed certifications such as the Certificate of Competency (COC) and National Certifications (NC). These ICT strand courses ensure that TVL track graduates of the ICT strand in SHS can apply for IT jobs straight out of high school.
																	      				</p>
																							</div>
																						</div>
																					</div>
																				</div>
																			</a>	
																		</div>

																		<div class="col-md-3">
																			<a href="javascript:void" class="strand_icon">
																				<div class="accordion" id="accordionForFBS">
																					<div class="accordion-item">
																						<h4 class="accordion-header" id="headingSixth">
																							<img src="resources/images/general/SHS-FB.png" class="card-img-top accordion-button" width="170" data-bs-toggle="collapse" data-bs-target="#collapseSixth" aria-expanded="true" aria-controls="collapseOneSixth"/>
																						</h4>
																						<div id="collapseSixth" class="accordion-collapse collapse" aria-labelledby="headingSixth" data-bs-parent="#accordionForFBS">
																							<div class="accordion-body">
																								<p class="card-text text-dark paragraph_text">										
																									While the ICT strand focuses on technology, the HE strand focuses on livelihood projects such as caregiving, cookery, bartending, baking, handicraft making, tourism, housekeeping, dressmaking, and such. This strand will greatly help students find jobs immediately. These are the HE strand specializations you will get.
																								</p>
																							</div>
																						</div>
																					</div>
																				</div>
																			</a>	
																		</div>
              										</div>
																	<!-- end second row -->
		                      		<?php
		                      	}
		                      	else if($_GET['op'] == 'curriculum') {
		                      		?>
		                      			<h3 class="card-title mb-3" style="letter-spacing: 1px;"><strong>Senior High School Curriculum</strong></h3>
																<div class="header-title title_bordered mb-3" >
																	<h5 class="card-title">&nbsp;CORE SUBJECTS</h5>
																</div>
																<div class="p-2 table-responsive">
																	<table class="table-bordered word-warp" > 
																		<thead>
																			<tr>
																				<th style="width: 20%; padding: 10px;">CORE LEARNING AREAS</th>
																				<th class="text-center">SUBJECTS</th>
																			</tr>
																		</thead>
																		<tbody>
																			<tr>
																				<td rowspan="4" style="padding: 10px;"><i><b>Language</b></i></td>
																				<td style="padding: 5px;">Oral Communication</td>
																			</tr>	
																			<tr>
																				<td style="padding: 5px;">Reading & Writing</td>
																			</tr>
																			<tr>
																				<td style="padding: 5px;">Komunikasyon at Pananaliksik sa Wika at Kulturang Pilipino</td>
																			</tr>
																			<tr>
																				<td style="padding: 5px;">Pagbasa at Pagsusuri ng Iba’t Ibang Teksto Tungo sa Pananaliksik</td>
																			</tr>
																			<tr>
																				<td rowspan="2" style="padding: 10px;"><i><b>Humanities</b></i></td>
																				<td style="padding: 5px;">21<sup>st</sup> Century Literature from the Philippines and the World</td>
																			</tr>
																			<tr>
																				<td style="padding: 5px;">Contemporary Philippine Arts from the Regions</td>
																			</tr>
																			<tr>
																				<td style="padding: 10px;"><i><b>Communication</b></i></td>
																				<td>Media &#038; Information Literacy</td>
																			</tr>
																			<tr>
																				<td rowspan="2" style="padding: 10px;"><i><b>Mathematics</b></i></td>
																				<td style="padding: 5px;">General Mathematics</td>
																			</tr>
																			<tr>
																				<td style="padding: 5px;">Statistics &#038; Probability</td>
																			</tr>
																			<tr>
																				<td rowspan="2" style="padding: 10px;"><i><b>Science</b></i></td>
																				<td style="padding: 5px;">
																					Earth and Life Science (Lecture and Laboratory)<br>
																					Earth Science taken by STEM
																				</td>
																			</tr>
																			<tr>
																				<td style="padding: 5px;">
																					Physical Science (Lecture and Laboratory)<br>
																					Disaster Readiness and Risk Reduction taken by STEM
																				</td>
																			</tr>
																			<tr>
																				<td rowspan="2" style="padding: 10px;"><i><b>Social Science</b></i></td>
																				<td style="padding: 5px;">Personal Development / Pansariling Kaunlaran</td>
																			</tr>
																			<tr>
																				<td style="padding: 5px;">Understanding Culture, Society and Politics</td>
																			</tr>
																			<tr>
																				<td style="padding: 10px;"><i><b>Philosophys</b></i></td>
																				<td>Introduction to the Philosophy of the Human Person / Pambungad sa Pilosopiya ng Tao</td>
																			</tr>
																			<tr>
																				<td style="padding: 10px;"><i><b>PE and Health</b></i></td>
																				<td>Physical Education and Health</td>
																			</tr>
																		</tbody>
																	</table>
  															</div>

  															<div class="applied_subject mt-5">
																	<div class="header-title title_bordered mb-4" >
																		<h5 class="card-title">&nbsp;APPLIED / CONTEXTUALIZED SUBJECTS</h5>
																	</div>
																	<ul>
																		<li class="li_content">English for Academic and Professional Purposes</li>
																		<li class="li_content">Quantitative Practical Research 1</li>
																		<li class="li_content">Qualitative Practical Research 2</li>
																		<li class="li_content">
																			Pagsulat sa Filipino sa Piling Larangan
																			<ul>
																				<li>- Akademiko</li>
																				<li>- Tech-Voc</li>
																			</ul>
																		</li>
																		<li class="li_content">Computer System Servicing (CSS): ICT for Professional Tracks</a></li>
																		<li class="li_content">Empowerment Technologies (E-Tech)</a></li>
																		<li class="li_content">Entrepreneurship</li>
																		<li class="li_content">Research Project/Culminating Activity</li>
																	</ul>
  															</div>
																<div class="specialized_subject mt-5">
																	<div class="header-title title_bordered mb-4" >
																		<h5 class="card-title">&nbsp;SPECIALIZED SUBJECTS</h5>
																	</div>												
																	<div class="gmc_callout_strands">
																		<h4>ABM: Accountancy, Business, and Management</h4>
																		<hr>
																		<p>Specialized Subjects of ABM</p>
																		<ul class="original">
																			<li>Applied Economics</li>
																			<li>Business Ethics and Social Responsibility</li>
																			<li>Fundamentals of Accountancy, Business and Management 1</li>
																			<li>Fundamentals of Accountancy, Business and Management 2</li>
																			<li>Business Math</li>
																			<li>Business Finance</li>
																			<li>Organization and Management</li>
																			<li>Principles of Marketing</li>
																			<li>Work Immersion/Research/Career Advocacy/Culminating Activity i.e. Business Enterprise Simulation</li>
																		</ul>
																	</div>

																	<div class="gmc-callout-strands">
																		<h4>GAS: General Academics</h4>
																		<hr>
																		<p>Specialized Subjects of GAS</p>
																		<ul class="original">
																			<li>Humanities 1</li>
																			<li>Humanities 2</li>
																			<li>Social Science 1</li>
																			<li>Applied Economics</li>
																			<li>Organization and Management</li>
																			<li>Disaster Readiness and Risk Reduction</li>
																			<li>Elective 1 (from any Track/Strand)</li>
																			<li>Elective 2 (from any Track/Strand)</li>
																			<li>Work Immersion/Career Advocacy/Culminating Activity</li>
																		</ul>
																	</div>

																	<div class="gmc-callout-strands">
																		<h4>HUMSS: Humanities and Social Sciences</h4>
																		<hr>
																		<p>Specialized Subjects of HUMSS</p>
																		<ul class="original">
																			<li>Creative Writing</li>
																			<li>Creative Nonfiction: The Literary Essay</li>
																			<li>World Religions and Belief Systems</li>
																			<li>Megatrends and Critical Thinking in the 21st Century Culture</li>
																			<li>Philippine Politics and Governance</li>
																			<li>Community Involvement and Social Issues</li>
																			<li>Introducing the Social Sciences</li>
																			<li>Introducing the Applied Social Sciences</li>
																			<li>(Communication, Journalism, Guidance and Counseling, Social Work)</li>
																			<li>Work Immersion/Career Advocacy/Culminating Activity</li>
																		</ul>
																	</div>

																	<div class="gmc-callout-strands">
																		<h4>STEM: Science, Technology, Engineering, and Mathematics</h4>
																		<hr>
																		<p>Specialized Subjects of STEM</p>
																		<ul class="original">
																			<li>Pre-Calculus</li>
																			<li>Basic Calculus</li>
																			<li>General Biology 1</li>
																			<li>General Biology 2</li>
																			<li>General Physics 1</li>
																			<li>General Physics 2</li>
																			<li>General Chemistry 1</li>
																			<li>General Chemistry 2</li>
																			<li>Work Immersion/Career Advocacy/Culminating Activity Research</li>
																		</ul>
																	</div>

																	<div class="gmc-callout-strands">
																		<h4>ICT: Information and Communication Technology</h4>
																		<hr>
																		<p>Specialized Subjects of ICT</p>
																		<ul class="original">
																			<li>Computer System Servicing 1 (Information Technology Fundamentals)</li>
																			<li>Computer System Servicing 2 (Computer Assembly)</li>
																			<li>Computer System Servicing 3 (Net Working)</li>
																			<li>Computer System Servicing 4 (Web Development)</li>
																			<li>Work Immersion/Career Advocacy/Culminating Activity Research</li>
																		</ul>
																	</div>

																	<div class="gmc-callout-strands">
																		<h4>FBS: Food and Beverages + Bread and Pastry + Cookery</h4>
																		<hr>
																		<p>Specialized Subjects of FBS</p>
																		<ul class="original">
																			<li>Food &#038; Beverages 1</li>
																			<li>Fundamentals of Accountancy, Business, and Management 1</li>
																			<li>Food &#038; Beverages 2 (Procedure)</li>
																			<li>Food &#038; Beverages 3 (Production)</li>
																			<li>Bread and Pastry Production NCII</li>
																			<li>Cookery NCII</li>
																		</ul>
																	</div>
																</div>
															</div>
		                      		<?php
		                      	}
		                      	else if($_GET['op'] == 'policies') {
		                      		?>
		                      		<h3 class="card-title mb-3" style="letter-spacing: 1px;"><strong>SHS Program Expectations, Academic and Disciplinary Policies</strong></h3>
		                      		<div class="policies_card">
		                      			    <ol class="history-ol" style="list-style-type: decimal;">
												      <li class="h3"> <h3 class="title">Classroom Instruction</h3></li>
												        <ul class="original">
												          <li class="li_content">
												            One subject consumes 80 hours per semester.
												          </li>

												          <li class="li_content">
												            54 hours classroom instruction, 26 hours of related learning experiences.
												          </li>

												          <li class="li_content">
												            Trainings and seminars will be scheduled throughout the academic year. 
												          </li>

												        </ul>

												      <hr>

												      <li class="h3"> <h3 style="font-weight: 550">Books for Applied and Specialized Subjects are required.</h3></li>
												 
												      <hr>
												      <li class="h3"> <h3 class="title">Dropping of SHS Monitoring Card</h3></li>
												        <ul class="original">
												          <li class="li_content">
												            Monitoring cards will be dropped for acquiring three cumulative unexcused absences. An absence is treated as an excused absence when the following elements or evidences are present:
												            <ol class="history-ol" style="list-style-type: lower-alpha;">
												              <li>
												                Medical Certificate signed by the Health Office
												              </li>
												              <li>
												                Death Certificate of deceased family member
												              </li>
												              <li>
												                Official School Activities/ Programs signed and approved by the School Administrator
												              </li>
												              <li>
												                Excused letter signed by the parent/guardian
												              </li>
												            </ol>
												          </li>
												        </ul>
												      <hr>
												      <li class="h3"> <h3 class="title">Tardiness</h3></li>
												        <ol class="history-ol" style="list-style-type: lower-alpha;">
												          <li>
												            Attending classes 10 minutes (MWF Classes) 15 minutes (TTH Classes) late or as specified by the subject facilitator as a classroom rule shall be marked “tardy”.
												          </li>
												          <li >
												            Acquiring <b>3 tardy marks</b> is equivalent to <b>one absence</b>.
												          </li>
												        </ol>

												      <hr>
												      <li class="h3"> <h3 class="title">General Guidelines during Examination Week</h3></li>
												        <ol class="history-ol" style="list-style-type: lower-alpha;">
												          <li >
												            Conduct of Examinations
												            <ol class="history-ol" style="list-style-type: lower-roman;">
												              <li>
												                Examinations for core subjects are departmentalized.
												              </li>
												            </ol>
												          </li>
												          <li>
												           During the examination week: bags, cellular phones, review materials and papers are prohibited.
												          </li>
												          <li>
												            Students are only allowed to bring the following paraphernalia:
												            <ol class="history-ol" style="list-style-type: lower-roman;">
												              <li>Calculator</li>
												              <li>Pen</li>
												              <li>Exam Permit</li>
												            </ol>
												          </li>
												        </ol>

												      <hr>
												      <li class="h3"> <h3 class="title">Exam Permits</h3></li>
												        <ol class="history-ol" style="list-style-type: lower-alpha;">
												          <li>
												            NO PERMIT – NO EXAM. Secure your exam permits before the examination week.
												          </li>
												          <li>
												           Examination permits <span style="text-decoration: underline;">are not</span> equated or equivalent to payments
												           <ol class="history-ol" style="list-style-type: lower-roman;">
												              <li>
												                Provision of promissory note is the <span style="text-decoration: underline;"><i>responsibility of the parent or guardian</i></span> of legal age that can make official transactions in behalf of the student or parent/s.
												              </li>
												            </ol>
												          </li>
												          <li>
												            Schedule for releasing of permits is 2 weeks before examination week 
												          </li>
												          <li>
												            No permits will be released after the specified schedule
												          </li>
												        </ol>

												      <hr>
												      <li class="h3"> <h3 class="title">Completion of Missed Major Examination/s</h3></li>
												        <ol class="history-ol" style="list-style-type: lower-alpha;">
												          <li>
												            Application for completion to take major exams must be filed at the SHS-Coordinating office, validated by the subject facilitator and approved by the Assistant Principal.
												          </li>
												          <li>
												           Students will only be allowed to take major examinations after the specified schedule for the consequent reason:
												           <ol class="history-ol" style="list-style-type: lower-roman;">
												              <li>
												                Demise of an immediate family member 
												              </li>
												              <li>
												                Sickness 
												              </li>
												              <li>
												                Official school activities approved by the Administrator
												              </li>
												              <li>
												                Other valid reason constituting an emergency beyond the student’s control. <i>Credibility of the reason presented will be determined by the Assistant Principal</i>. 
												              </li>
												            </ol>
												          </li>
												        </ol>

												      <hr>
												      <li class="h3"> <h3 class="title">Lunch-Out Passes</h3></li>
												        <ol class="history-ol" style="list-style-type: lower-alpha;">
												          <li>
												            To secure students’ safety, going out during lunch break is prohibited.
												          </li>
												          <li>
												            Students who wish to spend their lunch/break hour outside the school premises must ask their parent/guardian to sign a lunch-out pass, which will then be noted by their respective advisers.
												          </li>
												          <li>
												            Effective for <b><i>ONE semester only</i></b>
												          </li><br>
												          <p><i>These passes will be provided by the students&#8217; adviser.</i></p>
												        </ol>

												      <hr>
												      <li class="h3"> <h3 class="title">Clearance Signing</h3></li>
												        <ol class="history-ol" style="list-style-type: lower-alpha;">
												          <li>
												            Must be <span style="font-weight: bold; font-style: italic; text-decoration: underline;">individualized</span>
												          </li>
												          <li>
												            Must be completed before the Final Examination Week
												          </li>
												        </ol>

												      <hr>
												      <li class="h3"> <h3 class="title">General Retention Policy</h3></li>
												        <ol class="history-ol" style="list-style-type: lower-alpha;">
												          <li>
												            <i>Grade 12</i> – Students should not acquire more than 2 failing grades in one school year as this will barred the student from enrolling in the Institution or non-admission for the next school year. Further, the student will not be promoted for the next grade level.
												          </li>
												          <li>
												            <i>Grade 11</i> – No grades below 80 in all specialized courses.
												          </li>
												        </ol>
		                      		</div>
		                      		<?php
		                      	}
														else if($_GET['op'] == 'faculty_staff') 
														{
															?>
															<center>
																<div class="row justify-content-center">
																	<div class="col-10">
																		<div class="card guide">
																			<img src="resources/images/general/system_update.png" class="bd-placeholder-img card-img-top img-responsive" alt="System Update" />
																			<div class="card-body">
																				<h5 class="card-title">Web site is currently under construction.</h5>
																				<p class="card-text">Thank you for understanding!</p>
																			</div>
																		</div>
																	</div>
																</div>
															</center>
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
					require_once __DIR__ . '/components/404.php';
				}
			} else {
				require_once __DIR__ . '/components/404.php';
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