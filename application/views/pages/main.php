<!DOCTYPE html>
<html>
<head>
	<title>GRTS</title>
  	<link rel="icon" type="image/x-icon" href="<?= base_url() ?>assets/css/images/grs_logo.ico" />

  	<meta charset="UTF-8">
	<meta name="description" content="Grievance Redress Tracking System">
	<meta name="keywords" content="HTML,CSS,JavaScript,PHP,AJAX">
	<meta name="author" content="DSWD-4P's">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/assets/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/assets/fontawesome/css/all.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/assets/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/assets/css/Chart.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/assets/css/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/assets/css/animate.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/assets/css/main.css">

	<input id="img-user" type="text"  value="<?php echo $data->avatar ?>" hidden>
	<input id="name-user" type="text"  value="<?php echo $data->fullname ?>" hidden>
	<input id="location-user" type="text"  value="<?php echo $data->location ?>" hidden>
  	<input id="welcome-trig" type="text"  value="<?php echo $this->session->flashdata('welcome') ?>" hidden>
	<input id="base-url" type="text" value="<?php echo base_url()?>" hidden>
</head>
<body>
	<nav class="navbar navbar-expand-lg nav-color shadow">
	  <div class="container">
		  <a class="navbar-brand nav-custom d-flex" href="#">
		  	<img src="<?= base_url() ?>assets/css/images/grs_logo.png">
		  	<p>GRTS</p>
		  </a>
		  <button class="navbar-toggler  mr-3" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="fas fa-bars"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav mr-auto">
		    </ul>
		    <ul class="nav-1 navbar-nav mr-5">
				<li class="nav-dash nav-item nav-main-item">
					 <a class="cursor-point nav-link nav-custom" onclick="page('dashboard_data')">Dashboard</a>
				</li>
				<li class="nav-add nav-item nav-main-item">
					 <a class="cursor-point nav-link nav-custom" onclick="page('add_grievance_data')">Add</a>
				</li>
				<li class="nav-list nav-item nav-main-item">
					 <a class="cursor-point nav-link nav-custom" onclick="page('view_grievance_data')">List</a>
				</li>
		    </ul>
		    <ul class="navbar-nav">
		    	<li class="nav-item dropdown">
		    		<div class="utility p-1">
		    			<div class="utility-div" id="utility" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		    				<?php 
								if ($data->avatar == NULL) {
									echo '<img src="'.base_url().'assets/css/images/user-man.png" alt="" class="nav-img">';
								} else {
									echo '<img src="'.base_url().'assets/user-img/'.$data->avatar.'" alt="" class="nav-img">';
								}		
							?>
				    	</div>
				        <div class="dropdown-menu animated fadeIn" aria-labelledby="utility">
				          <a class="cursor-point dropdown-item" onclick="page('profile_data')"><i class="fas fa-user-cog mr-2 fa-fw"></i>Profile</a>
				          <div class="dropdown-divider"></div>
				          <a class="cursor-point dropdown-item" href="<?php echo base_url() ?>/main/request_logout"><i class="fas fa-sign-out-alt  mr-2 fa-fw"></i>Sign out</a>
				        </div>
		    			<i class="font-down fas fa-caret-down"></i>
		    		</div>
		      	</li>
			</ul>
		  </div>
	  </div>
	</nav>
	<div id="content" class="container mt-4 mb-2"></div>

	<div aria-live="polite" aria-atomic="true" style="position: fixed; min-height: 200px; right: 10px; top: 60px; z-index: 99999">
      <div class="toast-area" style="position: absolute; top: 0; right: 0;">
      </div>
    </div>
    
	<footer class="p-3 content-footer text-center shadow">Department of Social Welfare and Development &#9679; GRS Tracking © All rights reserved - 2019</footer>

	<div aria-live="polite" id="toasts-field" aria-atomic="true">
		<div class="toast" data-delay="3000" >
			<div class="toast-header">
			<strong class="mr-auto">Bootstrap</strong>
			<button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>
			<div class="toast-body">
			Hello, world! This is a toast message.
			</div>
		</div>
	</div>

	<div class="modal fade" id="myModal3">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header p-2">
            <h6 class="modal-title m-0 pl-2"></h6>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <!-- Modal body -->
          <div class="modal-body modal-body2 p-3">
            <img class="loading2" src="<?php echo base_url() ?>/assets/css/images/loading2.gif" />
          </div>
          <!-- Modal footer -->
          <div class="modal-footer modal-footer2">

          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="loadingModal">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <!-- Modal Header -->
          <!-- Modal body -->
            <img class="loadMod" src="<?php echo base_url() ?>/assets/css/images/loading.gif" />
            <p class="loadText text-white">Importing Files...</p>
          <!-- Modal footer -->
        </div>
      </div>
    </div>

    <div class="modal fade" id="welcomeModal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header modal-header2 text-center">
            <h4 class="modal-title w-100"><i class="fas fa-door-open mr-1 text-primary"></i>Welcome</h4>
            <button type="button" style="outline:none" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <div class="d-flex welcome-field pt-3">
              <div class="welcome-img-holder">
                <?php 
                  if ($data->avatar != '') {
                      echo '<img class="welcome-img" src="'. base_url() .'assets/user-img/'. $data->avatar .'" alt="user image">';
                  } else {
                      echo '<img class="welcome-img" src="'. base_url() .'assets/css/images/user-man.png" alt="user image">';
                  }
                ?>
              </div>
              <div class="p-2">
                <h5 class="mb-0"><?php echo $this->session->userdata('fullname'); ?></h5>
                <p class="text-center"><?php echo $this->session->userdata('access'); ?></p>
              </div>
            </div>
            <?php 
                if ($data->location == null) {
                  echo '<hr>';
                  echo '<h6 class="text-center">Please fill-in your current location on your profile!</h6>';
                  echo '<button class="m-auto d-block btn btn-primary btn-profile" data-dismiss="modal" onclick="page(\'profile_data\')">Go to Profile <i class="fas fa-arrow-right"></i></button>';
                }
            ?>
          </div>
          <div class="modal-footer modal-footer2">

          </div>
        </div>
      </div>
    </div>

	<script src="<?php echo base_url()?>/assets/js/jquery.js"></script>
	<script src="<?php echo base_url()?>/assets/js/popper.js"></script>
	<script src="<?php echo base_url()?>/assets/bootstrap/js/bootstrap.js"></script>
	<script src="<?php echo base_url()?>/assets/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url()?>/assets/js/Chart.js"></script>
	<script src="<?php echo base_url()?>/assets/js/jquery-ui.js"></script>
	<script src="<?php echo base_url()?>/assets/js/dataTables.buttons.min.js"></script>
	<script src="<?php echo base_url()?>/assets/js/buttons.flash.min.js"></script>
	<script src="<?php echo base_url()?>/assets/js/jszip.min.js"></script>
	<script src="<?php echo base_url()?>/assets/js/pdfmake.min.js"></script>
	<script src="<?php echo base_url()?>/assets/js/vfs_fonts.js"></script>
	<script src="<?php echo base_url()?>/assets/js/buttons.html5.min.js"></script>
	<script src="<?php echo base_url()?>/assets/js/buttons.print.min.js"></script>
	<script src="<?php echo base_url()?>/assets/js/main.js"></script>
	
	<?php 
		echo $load;
	?>
<script>
</script>
</body>
</html>