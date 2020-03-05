<div class="row">
	<div class="col-lg-3">
		<div class="card shadow p-3 animated fadeIn">
			<div class="header-area d-flex">
				<div class="image-area">
					<div class="img-holder">
						<?php 
							if ($user->avatar == NULL) {
								echo '<img src="'.base_url().'assets/css/images/user-man.png" alt="" class="user-img">';
							} else {
								echo '<img src="'.base_url().'assets/user-img/'.$user->avatar.'" alt="" class="user-img">';
							}		
						?>
					</div>
				</div>
				<p><?= $user->fullname ?></p>
			</div>
			<hr>
			<div class="body-area">
				<ul>
					<li class="profile-item active">
						<a><i class="fas fa-user mr-2"></i>Profile</a>
					</li>
					<li class="profile-item">
						<a><i class="fas fa-cog mr-2"></i>Setting</a>
					</li>
					<li class="profile-item">
						<a href="<?php echo base_url() ?>/main/request_logout"><i class="fas fa-sign-out-alt mr-2"></i>Logout </a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="col-lg-9">
		<div class="card shadow p-2 animated fadeIn mb-5">
			<section class="section-profile p-3 animated fadeIn">
				<div class="profile-area">
					<h6><i class="fas fa-user-cog mr-2 text-secondary fa-fw"></i>Info</h6>
					<div class="row">
						<div class="col-lg-6">
							<div class="change-img-holder">
								<?php 
									if ($user->avatar == NULL) {
										echo '<img src="'.base_url().'assets/css/images/user-man.png" alt="" class="user-img">';
									} else {
										echo '<img src="'.base_url().'assets/user-img/'.$user->avatar.'" alt="" class="user-img">';
									}		
								?>
							</div>
							<div class="upload-img-area">
								
								<div class="btn-upload-area">
									<form id="img-form">
										<input class="choose-img" type="file" name="file" required accept=".png, .jpg, .jpeg" hidden>
										<input id="btn-subh" type="submit" name="hiddenBtn" hidden>
									</form>
									<button id="choose-img" class="btn btn-sm btn-primary mr-auto btn-choose">Choose</button>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="info-area">
								<label for="fullname">Fullname:</label>
								<input type="text" id="fullname" value="<?= $user->fullname ?>" class="w-100">
							</div>
							
						</div>
					</div>
					<button id="save-info" class="btn btn-sm btn-primary float-right btn-float"><i class="fas fa-save"></i></button>
				</div>
				<hr>
				<div class="location-area">
					<h6><i class="fas fa-map-marker-alt mr-2 text-secondary fa-fw"></i>Location</h6>
					<?php 
    
					    if ($user->location != '') {
					        $str_arr = explode(",", $user->location); 
					    } else {
					        $str_arr = array('', '', '', '', '');
					    }

					?>
					<div class="row p-5">
						<div class="col-lg-6">
							<label class="location-lbl" for="brgy">Barangay:</label>
							<div class="dropdown">
								<input type="text" id="brgy" class="w-100 location-input search-location-brgy" value="<?php if (sizeof($str_arr) == 4) {echo $str_arr[0];} ?>"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<div class="dropdown-menu list-b animated fadeIn" aria-labelledby="brgy">
							    	<img class="location-loader" src="<?= base_url() ?>assets/css/images/loading2.gif">
							  	</div>
							</div>
						</div>
						<div class="col-lg-6">
							<label class="location-lbl" for="city">City/Muncipality:</label>
							<div class="dropdown">
								<input type="text" id="city" class="w-100 location-input search-location-city" value="<?php if (sizeof($str_arr) == 4) {echo substr($str_arr[1], 1);} else {echo substr($str_arr[0], 1);} ?>"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<div class="dropdown-menu list-c animated fadeIn" aria-labelledby="city">
							    	<img class="location-loader" src="<?= base_url() ?>assets/css/images/loading2.gif">
							  	</div>
							</div>
						</div>
						<div class="col-lg-6">
							<label class="location-lbl" for="province">Province:</label>
							<div class="dropdown">
								<input type="text" id="province" class="w-100 location-input search-location-prov" value="<?php if (sizeof($str_arr) == 4) {echo substr($str_arr[2], 1);} else {echo substr($str_arr[1], 1);} ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<div class="dropdown-menu list-p animated fadeIn" aria-labelledby="province">
							    	<img class="location-loader" src="<?= base_url() ?>assets/css/images/loading2.gif">
							  	</div>
							</div>
						</div>
						<div class="col-lg-6">
							<label class="location-lbl" for="region">Region:</label>
							<div class="dropdown">
								<input type="text" id="region" class="w-100 location-input search-location-reg" value="<?php if (sizeof($str_arr) == 4) {echo substr($str_arr[3], 1);} else {echo substr($str_arr[2], 1);} ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<div class="dropdown-menu list-r animated fadeIn" aria-labelledby="region">
							    	<img class="location-loader" src="<?= base_url() ?>assets/css/images/loading2.gif">
							  	</div>
							</div>
						</div>
					</div>
					<button id="save-location" class="btn btn-sm btn-primary float-right btn-float"><i class="fas fa-save"></i></button>
				</div>
				<hr>
				<div class="password-area">
					<h6><i class="fas fa-key mr-2 text-secondary fa-fw"></i>Password</h6>
					<div class="password-form p-5">
						<div class="d-flex pass-container">
							<label class="password-lbl mr-auto" for="pass1">Current Password:</label>
							<div class="password-clone d-flex ml-auto" id="pass1">
								<input type="password" id="cur-pass" class="password-input">
								<i class="fas"></i>
							</div>
						</div> 	

						<div class="d-flex pass-container">
							<label class="password-lbl mr-auto" for="pass2">New Password:</label>
							<div class="password-clone d-flex ml-auto disabled" id="pass2">
								<input type="password" id="new-pass" class="password-input" disabled>
								<i class="fas"></i>
							</div>
						</div> 	

						<div class="d-flex pass-container">
							<label class="password-lbl mr-auto" for="pass3">Confirm Password:</label>
							<div class="password-clone d-flex ml-auto disabled" id="pass3">
								<input type="password" id="conf-pass" class="password-input" disabled>
								<i class="fas"></i>
							</div>
						</div> 	
					</div>
					<button id="save-pass" class="btn btn-sm btn-primary float-right btn-float"><i class="fas fa-save"></i></button>
				</div>
			</section>
			<section class="section-setting p-3 hidden animated fadeIn p-5">
				<h6><i class="fas fa-trash-alt text-secondary mr-2 fa-fw"></i>Delete grievance records</h6>
				<div class="delete-area d-flex mt-5">
					<label for="delete-fMonth" class="delete-lbl">From</label>
					<select id="delete-fMonth" class="delete-field ml-auto">
						<option value="0"></option>
						<option value="1">January</option>
						<option value="2">February</option>
						<option value="3">March</option>
						<option value="4">April</option>
						<option value="5">May</option>
						<option value="6">June</option>
						<option value="7">July</option>
						<option value="8">August</option>
						<option value="9">September</option>
						<option value="10">October</option>
						<option value="11">November</option>
						<option value="12">December</option>
					</select>
				</div>

				<div class="delete-area d-flex mt-3">
					<label for="delete-tMonth" class="delete-lbl">To</label>
					<select id="delete-tMonth" class="delete-field ml-auto">
						<option value="0"></option>
						<option value="1">January</option>
						<option value="2">February</option>
						<option value="3">March</option>
						<option value="4">April</option>
						<option value="5">May</option>
						<option value="6">June</option>
						<option value="7">July</option>
						<option value="8">August</option>
						<option value="9">September</option>
						<option value="10">October</option>
						<option value="11">November</option>
						<option value="12">December</option>
					</select>
				</div>

				<div class="delete-area d-flex mt-3 mb-5">
					<label for="delete-year" class="delete-lbl">Year</label>
					<select id="delete-year" class="delete-field ml-auto">
						<option></option>
						<?php 
							foreach ($year as $key => $value) {
								echo '<option value="'. $value->years .'">'. $value->years .'</option>';
							}
						?>
					</select>
				</div>

				<button id="delete-btn" class="btn btn-sm btn-primary d-block m-auto">Delete</button>
			</section>
		</div>
	</div>
</div>

<script src="<?= base_url() ?>assets/js/profile.js"></script>
