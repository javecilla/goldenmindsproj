<nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-top: -15px!important; border-bottom: 2px solid #996515; opacity: .8; margin-bottom: 5px;">
  <div class="container-fluid">
    <div class="row">
      <div class="col-3">
        <a class="navbar-brand" onclick="location.reload();" style="cursor: pointer;">
          <img src="resources/images/general/gmc/gmc_logo.png" width="40" />
          <label class="school_name logo-title text-uppercase" style="cursor: pointer; font-size: 25px!important;">
            <span>G<small>olden</small></span>
            <span>M<small>inds</small></span>
            <!-- <span class="">B<small>ulacan Inc.</small></span> -->
          </label>
        </a>
      </div>
    </div>
    <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fas fa-bars"></i>
    </button>  -->
    <style>
      input[type="checkbox"] {
        -webkit-appearance: none;
        visibility: hidden!important;
        display: none!important;
        background: transparent;
      }
      .bar {
        position: relative;
        cursor: pointer;
        display: flex;
        justify-content: right;
        opacity: .8;
      }
      .bar .mid {
        height: 3px;
        width: 28px;
        background: #000;
        border-radius: 50px;
        position: absolute;
        transition: 0.3s ease;
      }
      .bar .top {
        bottom: 3px;
        height: 3px;
        width: 28px;
        background: #000;
        border-radius: 50px;
        position: absolute;
        transition: 0.3s ease;
      }
      .bar .bot {
        top: 7px;
        height: 3px;
        width: 28px;
        background: #000;
        border-radius: 50px;
        position: absolute;
        transition: 0.3s ease;
      }
      input[type="checkbox"]:checked ~ .bar .top {
        transform: rotate(-45deg);
        width: 27px;
        transform-origin: right;
        top: -10px;
      }
      input[type="checkbox"]:checked ~ .bar .bot {
        transform: rotate(45deg);
        width: 27px;
        transform-origin: right;
        top: 10px;
      }
      input[type="checkbox"]:checked ~ .bar .mid {
        transform: translateX(20px);
        opacity: 0;
      }
    </style>
    <label class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <input type="checkbox" />
      <div class ="bar">
        <span class="top"></span>
        <span class="mid"></span>
        <span class="bot"></span>
      </div>
    </label>   
    <div class="col-9">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link text-dark" href="home"> Home </a></li>
          <li class="nav-item"><a class="nav-link text-dark" href="about"> About </a></li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-dark" href="#" id="program_list" data-bs-toggle="dropdown" aria-expanded="false">Programs</a>
            <ul class="dropdown-menu" aria-labelledby="program_list">
              <li><a class="dropdown-item" href="programs?sp=pre_kinder">Pre-Kinder</a></li>
              <li><a class="dropdown-item" href="programs?sp=elementary">Elementary</a></li>
              <li><a class="dropdown-item" href="programs?sp=jhs">Junior High School</a></li>
              <li><a class="dropdown-item" href="programs?sp=shs">Senior High School</a></li>
            </ul>
          </li>   
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-dark" href="#" id="online_services" data-bs-toggle="dropdown" aria-expanded="false">Online Services</a>
            <ul class="dropdown-menu" aria-labelledby="online_services">
              <li><a class="dropdown-item" href="#">Admission Requirements</a></li>
              <li><a class="dropdown-item" href="online_application?at=main">Online Application</a></li>
              <li><a class="dropdown-item" href="#">Student Portal</a></li>
            </ul>
          </li>      
          <li class="nav-item"><a class="nav-link text-dark" href="student_life"> Student Life </a></li>
          <li class="nav-item"><a class="nav-link text-dark" href="alumni"> Alumni </a></li>
          <!-- <li class="nav-item"><a class="nav-link " href="#"> Faculty and Staff </a></li> -->
          <li class="nav-item"><a class="nav-link text-dark" href="research_development_department"> Research, Development Department</a></li>
          <li class="nav-item"><a class="nav-link text-dark" href="#"> News</a></li>
          <li class="nav-item"><a class="nav-link text-dark" href="#"> Announcements</a></li>
        </ul>      
      </div>
    </div>
  </div>
</nav>