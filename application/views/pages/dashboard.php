<div class="row animated fadeIn">
	<div class="col-lg-6">
		<div class="card p-3 shadow dash-card1 mt-3 users-card">
			<div class="image-holder">
				<?php 
					if ($user->avatar == NULL) {
						echo '<img src="'.base_url().'assets/css/images/user-man.png" alt="" class="user-img">';
					} else {
						echo '<img src="'.base_url().'assets/user-img/'.$user->avatar.'" alt="" class="user-img">';
					}		
				?>
			</div>
			<div class="float-right">
				<?php 
					if ($this->session->userdata('fullname') != NULL) {
						echo '<p class="user-name text-right">'.$this->session->userdata('fullname').'</p>';
					} else {
						echo '<p class="user-name text-right">NAME NOT SET</p>';
					}

					if ($user->location != NULL) {
						echo '<p class="text-right f-12">'.$user->location.'</p>';
					} else {
						echo '<p class="text-right f-12">LOCATION NOT SET</p>';
					}
				?>
				<p class="text-right time-text f-12"><?= $grievance->DateNow ?></p>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="p-3 shadow dash-card1 mt-3 grievance-card">
			<div class="float-right line-1">
				<h5 class="text-right text-white">Grievance</h5>
				<h2 class="text-right text-white"><?= $grievance->countAll; ?></h2>
			</div>
			<i class="fas fa-file-alt p-2 font-con"></i>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card p-3 shadow dash-card mt-3">
			<canvas id="bar" width="400" height="400"></canvas>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card p-3 shadow dash-card mt-3">
			<canvas id="bar1" width="400" height="400"></canvas>
		</div>
	</div>
</div>
<script src="<?= base_url()?>/assets/js/dashboard.js"></script>