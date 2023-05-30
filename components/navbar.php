<!--Nav Start-->
<nav class="nav navbar navbar-expand-xl navbar-light iq-navbar" >
  <div class="container-fluid navbar-inner">
    <div class="row">
      <div class="col-2">
        <button data-trigger="navbar_main" class="d-xl-none menu_btn" type="button">
          <i class="fas fa-bars"></i>
        </button>
      </div>

      <div class="col-10 float-end">
        <div class="input-group d-xl-none ">
          <input type="search" class=" form-control" placeholder="Search...">
          <span class="input-group-text" id="search-input">
            <i class="fas fa-search"></i>
          </span>
        </div>
      </div>
    </div> 

    <!-- Horizontal Menu Start -->
    <nav id="navbar_main" class="mobile-offcanvas nav navbar navbar-expand-xl hover-nav horizontal-nav mx-md-auto ">
      <div class="container-fluid">
        <div class="offcanvas-header px-0">
          <div class="navbar-brand ms-0">
            <img src="resources/images/general/gmc/gmc_logo.png" width="50" alt="logo"/>  
            <h4 class="logo-title">Golden Minds</h4>
          </div>
          <button class="btn-close float-end"></button>
        </div>
        <ul class="navbar-nav nav_list" >
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
          <li class="nav-item"><a class="nav-link text-dark" href="#"> Student Life </a></li>
          <li class="nav-item"><a class="nav-link text-dark" href="#"> Alumni </a></li>
          <!-- <li class="nav-item"><a class="nav-link " href="#"> Faculty and Staff </a></li> -->
          <li class="nav-item"><a class="nav-link text-dark" href="#"> Research, Development Department</a></li>
          <li class="nav-item"><a class="nav-link text-dark" href="#"> News</a></li>
          <li class="nav-item"><a class="nav-link text-dark" href="#"> Announcements</a></li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-dark" href="#" id="online_services" data-bs-toggle="dropdown" aria-expanded="false">Online Services</a>
            <ul class="dropdown-menu" aria-labelledby="online_services">
              <li><a class="dropdown-item" href="#">Admission Requirements</a></li>
              <li><a class="dropdown-item" href="#">Online Application</a></li>
              <li><a class="dropdown-item" href="#">Student Portal</a></li>
            </ul>
          </li>
        </ul>
      </div> <!-- container-fluid.// -->
    </nav>
  </div>
</nav>      

<!--Nav End-->