<div class="add-grievance shadow card pb-3 animated fadeIn">
	<h3 class="text-center mt-3 ">Grievance Form</h3>
	<div class="btn-type p-3">
		<button id="btn-dash2" class="btn btn-dash ml-1 btn-sm float-right"><i class="fas fa-bars"></i></button>
		<button id="btn-dash1" class="btn btn-dash active btn-sm float-right"><i class="fas fa-grip-horizontal"></i></button>
	</div>
	<div id="type-1">
		<header class="row mt-4 ml-3 mr-3">
			<h6 id="tab1" class="col-sm-4 section-title active">COMPLAINT INFORMATION</h6>
			<h6 id="tab2" class="col-sm-4 section-title">GRIEVANCE INFORMATION</h6>
			<h6 id="tab3" class="col-sm-4 section-title">RESOLUTION INFORMATION</h6>
		</header>
		<section id="section-1" class="p-3">
			<div class="row">
				<div class="col-sm-4">
					<div class="radio-field">
						<input type="radio" name="radioBtn" value="RCCT" id="" class="form-radio" checked><label class="radio-btn-lbl" for="radioBtn">RCCT</label>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="radio-field">
						<input type="radio" name="radioBtn" value="MCCT" id="" class="form-radio"><label class="radio-btn-lbl" for="radioBtn">MCCT</label>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="radio-field">
						<input type="radio" name="radioBtn" value="Non-beneficiary" id="" class="form-radio"><label class="radio-btn-lbl" for="radioBtn	">Non-beneficiary</label>
					</div>
				</div>

			</div>
			<div class="field-set mt-3 p-3">
				<div class="row">
					<div class="col-lg-9 input-container mt-3">
						<i class="fa-fw fas fa-home"></i>
						<div class="group dropdown compliant">
							<div class="group" id="searchHH1" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<input id="hh-id1" class="google-input add-field search-field" type="text" required>
								<span class="highlight"></span>
								<span class="bar"></span>
								<label class="google-lbl">Household ID</label>
							</div>
							<div class="dropdown-menu animated slideIn search-result search-location" aria-labelledby="searchHH1">
								<img class="search-loader" src="<?php echo base_url() ?>/assets/css/images/loading2.gif" />
							</div>
						</div>
						<div class="group">
							<input id="hh-set1" class="google-input add-field" type="text" required>
							<span class="highlight"></span>
							<span class="bar"></span>
							<label class="google-lbl">Set</label>
						</div>
					</div>
					<div class="col-lg-3 input-container mt-3">
						<i class="fa-fw fas fa-user-friends"></i>
						<div class="group">
							<input id="ip-affiliation1" class="google-input add-field" type="text" required>
							<span class="highlight"></span>
							<span class="bar"></span>
							<label class="google-lbl">IP Affiliation</label>
						</div>
					</div>
					<div class="col-lg-9 input-container mt-3">
						<i class="fa-fw fas fa-user"></i>
						<div class="group dropdown compliant">
							<div class="group" id="searchFname1" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<input id="fname1" class="google-input add-field search-field" type="text" required>
								<span class="highlight"></span>
								<span class="bar"></span>
								<label class="google-lbl">First Name<span class="text-danger h6 ml-1">*</span></label>
								<p class="fname1 text-danger text-required">This field is required.</p>
							</div>
							<div class="dropdown-menu animated slideIn search-result search-location" aria-labelledby="searchFname1">
								<img class="search-loader" src="<?php echo base_url() ?>/assets/css/images/loading2.gif" />
							</div>
						</div>

						<div class="group">
							<input id="mname1" class="google-input add-field" type="text" required>
							<span class="highlight"></span>
							<span class="bar"></span>
							<label class="google-lbl">Middle Name</label>
							<p class="mname1 text-danger text-required">This field is required.</p>
						</div>
						<div class="group dropdown compliant">
							<div class="group" id="searchLname1" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<input id="lname1" class="google-input add-field search-field" type="text" required>
								<span class="highlight"></span>
								<span class="bar"></span>
								<label class="google-lbl">Last Name<span class="text-danger h6 ml-1">*</span></label>
								<p class="lname1 text-danger text-required">This field is required.</p>
								<div class="dropdown-menu animated slideIn search-result search-location" aria-labelledby="searchLname1">
									<img class="search-loader" src="<?php echo base_url() ?>/assets/css/images/loading2.gif" />
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 input-container mt-3">
						<i class="fa-fw fas fa-restroom"></i>
						<div class="group">
							<select id="gender1" class="google-input add-field" required>
							<option disabled selected></option>
							<option>Male</option>
							<option>Female</option>
							</select>
							<span class="highlight"></span>
							<span class="bar"></span>
							<label class="google-lbl">Sex<span class="text-danger h6 ml-1">*</span></label>
							<p class="gender1 text-danger text-required">This field is required.</p>
						</div>
					</div>
					<div class="col-lg-12 input-container mt-3">
						<i class="fa-fw fas fa-map-marker-alt"></i>
						<div class="group">
							<input id="street1" class="google-input add-field" type="text" required>
							<span class="highlight"></span>
							<span class="bar"></span>
							<label class="google-lbl">Street</label>
						</div>
						<div class="group dropdown">
							<div class="group" id="searchBrgy1" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<input id="brgy1" class="google-input add-field search-brgy" type="text" required>
								<span class="highlight"></span>
								<span class="bar"></span>
								<label class="google-lbl">Barangay<span class="text-danger h6 ml-1">*</span></label>
								<p class="brgy1 text-danger text-required">This field is required.</p>
							</div>
							<div class="dropdown-menu animated slideIn list-brgy search-location" aria-labelledby="searchBrgy1">
								<img class="search-loader" src="<?php echo base_url() ?>/assets/css/images/loading2.gif" />
							</div>
						</div>

						<div class="group dropdown">
							<div class="group" id="searchMunCity1" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<input id="city-mun1" class="google-input add-field search-city-mun" type="text" required>
								<span class="highlight"></span>
								<span class="bar"></span>
								<label class="google-lbl">City/Muni<span class="text-danger h6 ml-1">*</span></label>
								<p class="city-mun1 text-danger text-required">This field is required.</p>
							</div>
							<div class="dropdown-menu animated slideIn list-city-mun search-location" aria-labelledby="searchMunCity1">
								<img class="search-loader" src="<?php echo base_url() ?>/assets/css/images/loading2.gif" />
							</div>
						</div>

						<div class="group dropdown">
							<div class="group" id="searchProvince1" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<input id="province1" class="google-input add-field search-provinces" type="text" required>
								<span class="highlight"></span>
								<span class="bar"></span>
								<label class="google-lbl">Province<span class="text-danger h6 ml-1">*</span></label>
								<p class="province1 text-danger text-required">This field is required.</p>
							</div>
							<div class="dropdown-menu animated slideIn list-provinces search-location" aria-labelledby="searchProvince1">
								<img class="search-loader" src="<?php echo base_url() ?>/assets/css/images/loading2.gif" />
							</div>
						</div>

						<div class="group dropdown">
							<div class="group"  id="searchRegion1" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<input id="region1" class="google-input add-field search-regions" type="text" required>
								<span class="highlight"></span>
								<span class="bar"></span>
								<label class="google-lbl">Region<span class="text-danger h6 ml-1">*</span></label>
								<p class="region1 text-danger text-required">This field is required.</p>
							</div>
							<div class="dropdown-menu animated slideIn list-regions search-location" aria-labelledby="searchRegion1">
								<img class="search-loader" src="<?php echo base_url() ?>/assets/css/images/loading2.gif" />
							</div>
						</div>

					</div>
					<div class="col-lg-6 input-container mt-3">
						<i class="fa-fw fas fa-mobile"></i>
						<div class="group">
							<input id="contact1" class="google-input add-field" type="text" required>
							<span class="highlight"></span>
							<span class="bar"></span>
							<label class="google-lbl">Contact #</label>
						</div>
					</div>
					<div class="col-lg-6 input-container mt-3">
						<i class="fa-fw far fa-calendar-alt"></i>
						<div class="group">
							<input id="date-filed1" class="google-input add-field" type="text" required>
							<span class="highlight"></span>
							<span class="bar"></span>
							<label class="google-lbl">Date Filed<span class="text-danger h6 ml-1">*</span></label>
							<p class="date-filed1 text-danger text-required">This field is required.</p>
						</div>
					</div>
				</div>
			</div>
			<button onclick="btn_nxt_req('tab1')" class="btn btn-nxt float-right mr-2">Next</button>
		</section>
		<section id="section-2" class="display-none p-4">
			<div class="field-set p-3">
				<div class="row">
					<div class="col-lg-6 input-container">
						<i class="fa-fw fas fa-folder"></i>
						<div class="group">
							<select id="category1" class="google-input add-field" required>
							<option disabled selected></option>
							<?php
								foreach ($res as $key => $value) {
								echo '<option data-opt="'. $value->category_opt .'" data-subj="'. $value->category_subj .'" value="'. $value->category_id .'">'. $value->category_name .'</option>';
								}
							?>
							</select>
							<span class="highlight"></span>
							<span class="bar"></span>
							<label class="google-lbl">Category<span class="text-danger h6 ml-1">*</span></label>
							<p class="category1 text-danger text-required">This field is required.</p>
						</div>
					</div>
					<div class="col-lg-6 input-container">
						<i class="fa-fw fas fa-folder-open"></i>
						<div class="group">
							<select id="sub-category1" class="google-input add-field" required>
							</select>
							<span class="highlight"></span>
							<span class="bar"></span>
							<label class="google-lbl">Sub-category<span class="text-danger h6 ml-1">*</span></label>
							<p class="sub-category1 text-danger text-required">This field is required.</p>
						</div>
					</div>

					<div class="col-lg-12 mt-3 category-option"></div>

					<div class="col-lg-12 input-container mt-3">
						<i class="fa-fw fas fa-file-signature"></i>
						<div class="group">
							<textarea id="description1" class="google-input add-field"></textarea>
							<span class="highlight"></span>
							<span class="bar"></span>
							<label class="google-lbl txtarea-lbl">Grievance Description<span class="text-danger h6 ml-1">*</span></label>
							<p class="description1 text-danger text-required">This field is required.</p>
						</div>
					</div>
				</div>
			</div>
			<button onclick="btn_nxt_req('tab2')" class="btn btn-nxt float-right mr-2">Next</button>
			<button onclick="btn_move('#tab2', '#tab1', '#section-2', '#section-1')" class="btn btn-nxt float-left ml-2">back</button>
		</section>
		<section id="section-3" class="display-none">
			<div class="field-set p-4 ">
				<div class="row p-3">
					<div class="col-lg-12 input-container mt-3">
						<i class="fa-fw far fa-handshake"></i>
						<div class="group">
							<textarea id="resolution1" class="google-input add-field"></textarea>
							<span class="highlight"></span>
							<span class="bar"></span>
							<label class="google-lbl txtarea-lbl">Initial Resolution<span class="text-danger h6 ml-1">*</span></label>
							<p class="resolution1 text-danger text-required">This field is required.</p>
						</div>
					</div>

					<div class="col-lg-4 mt-4 mb-4 input-container">
						<i class="fa-fw fas fa-file-invoice"></i>
						<div class="group">
							<select id="r-mode1" class="google-input add-field" required>
							<option disabled selected></option>
								<?php
									foreach ($res1 as $key => $value) {
									echo "<option value=". $value->mode_name .">". $value->mode_name ."</option>";
									}
								?>
							</select>
							<span class="highlight"></span>
							<span class="bar"></span>
							<label class="google-lbl">Report Mode<span class="text-danger h6 ml-1">*</span></label>
							<p class="r-mode1 text-danger text-required">This field is required.</p>
						</div>
					</div>
					<div class="col-lg-4 mt-4 mb-4 input-container">
						<i class="fa-fw fas fa-street-view"></i>
						<div class="group">
							<input id="assist-by1" class="google-input add-field" type="text" required>
							<span class="highlight"></span>
							<span class="bar"></span>
							<label class="google-lbl">Assist By<span class="text-danger h6 ml-1">*</span></label>
							<p class="assist-by1 text-danger text-required">This field is required.</p>
						</div>
					</div>
					<div class="col-lg-4 mt-4 mb-4 input-container">
						<i class="fa-fw far fa-calendar-alt"></i>
						<div class="group">
							<input id="date-assisted1" class="google-input add-field" type="text" required>
							<span class="highlight"></span>
							<span class="bar"></span>
							<label class="google-lbl">Date Assisted<span class="text-danger h6 ml-1">*</span></label>
							<p class="date-assisted1 text-danger text-required">This field is required.</p>
						</div>
					</div>
				</div>
				<button class="btn btn-submit float-right"  onclick="btn_nxt_req('tab3')">Submit</button>
				<button onclick="btn_move('#tab3', '#tab2', '#section-3', '#section-2')" class="btn btn-nxt float-left ml-2">back</button>
			</div>
		</section>
	</div>

	<div id="type-2">
		<div class="card-body">
			<section>
				<div class="row">
					<div class="col-lg-9">
						<p>Please fill in all the required fields that indicates "<sub class="text-danger h4">*</sub>"</p>
					</div>
					<div class="col-lg-3 input-container">
						<i class="fa-fw far fa-calendar-alt"></i>
						<div class="group">
							<input id="date-filed" class="google-input" type="text" required>
							<span class="highlight"></span>
							<span class="bar"></span>
							<label class="google-lbl">Date Filed<span class="text-danger h6 ml-1">*</span></label>
							<p class="date-filed text-danger text-required">This field is required.</p>
						</div>
					</div>
				</div>
				<hr>
				<h5 class="font-weight-bold">Complainant Information</h5>

				<div class="row p-3">
					<div class="col-lg-9 mt-3 ">
						<label for="demo">Complainant Type<span class="text-danger p">*</span> :</label>
						<input type="radio" name="demo" value="RCCT" id="radio-one" class="form-radio ml-2" checked><label class="radio-btn-lbl" for="radio-one">RCCT</label>
						<input type="radio" name="demo" value="MCCT" id="radio-two" class="form-radio ml-2"><label class="radio-btn-lbl" for="radio-two">MCCT</label>
						<input type="radio" name="demo" value="Non-beneficiary" id="radio-three" class="form-radio ml-2"><label class="radio-btn-lbl" for="radio-three">Non-beneficiary</label>
					</div>

					<div class="col-lg-6  mt-3 input-container">
						<i class="fa-fw fas fa-home"></i>
						<div class="group dropdown compliant">
							<div class="group" id="searchHH" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<input id="hh-id" class="google-input add-field search-field" type="text" required>
								<span class="highlight"></span>
								<span class="bar"></span>
								<label class="google-lbl">Household ID</label>
							</div>
							<div class="dropdown-menu animated slideIn search-result search-location" aria-labelledby="searchHH">
								<img class="search-loader" src="<?php echo base_url() ?>/assets/css/images/loading2.gif" />
							</div>
						</div>
					</div>
					<div class="col-lg-3  mt-3 input-container">
						<i class="fa-fw fas fa-users"></i>
						<div class="group">
							<input id="hh-set" class="google-input add-field" type="text" required>
							<span class="highlight"></span>
							<span class="bar"></span>
							<label class="google-lbl">Set</label>
						</div>
					</div>
					<div class="col-lg-3 mt-3 input-container">
						<i class="fa-fw fas fa-user-friends"></i>
						<div class="group">
							<input id="ip-affiliation" class="google-input add-field" type="text" required>
							<span class="highlight"></span>
							<span class="bar"></span>
							<label class="google-lbl">IP Affiliation</label>
						</div>
					</div>

					<div class="col-lg-9 mt-3 input-container">
						<i class="fa-fw fas fa-user"></i>
						<div class="group dropdown compliant">
							<div class="group" id="searchFname" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<input id="fname" class="google-input add-field search-field" type="text" required>
								<span class="highlight"></span>
								<span class="bar"></span>
								<label class="google-lbl">First Name<span class="text-danger h6 ml-1">*</span></label>
								<p class="fname text-danger text-required">This field is required.</p>
							</div>
							<div class="dropdown-menu animated slideIn search-result search-location" aria-labelledby="searchFname">
								<img class="search-loader" src="<?php echo base_url() ?>/assets/css/images/loading2.gif" />
							</div>
						</div>
						<div class="group">
							<input id="mname" class="google-input add-field" type="text" required>
							<span class="highlight"></span>
							<span class="bar"></span>
							<label class="google-lbl">Middle Name</label>
						</div>
						<div class="group dropdown compliant">
							<div class="group" id="searchLname" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<input id="lname" class="google-input add-field search-field" type="text" required>
								<span class="highlight"></span>
								<span class="bar"></span>
								<label class="google-lbl">Last Name<span class="text-danger h6 ml-1">*</span></label>
								<p class="lname text-danger text-required">This field is required.</p>
							</div>
							<div class="dropdown-menu animated slideIn search-result search-location" aria-labelledby="searchLname">
									<img class="search-loader" src="<?php echo base_url() ?>/assets/css/images/loading2.gif" />
							</div>
						</div>
					</div>
					<div class="col-lg-3 mt-3 input-container">
						<i class="fa-fw fas fa-restroom"></i>
						<div class="group">
							<select id="gender" class="google-input add-field" required>
							<option disabled selected></option>
							<option>Male</option>
							<option>Female</option>
							</select>
							<span class="highlight"></span>
							<span class="bar"></span>
							<label class="google-lbl">Sex<span class="text-danger h6 ml-1">*</span></label>
							<p class="gender text-danger text-required">This field is required.</p>
						</div>
					</div>

					<div class="col-lg-9 mt-3 input-container">
						<i class="fa-fw fas fa-map-marker-alt"></i>
						<div class="group">
							<input id="street" class="google-input add-field" type="text" required>
							<span class="highlight"></span>
							<span class="bar"></span>
							<label class="google-lbl">Street</label>
						</div>
						<div class="group dropdown">
							<div class="group" id="searchBrgy" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<input id="brgy" class="google-input add-field search-brgy" type="text" required>
								<span class="highlight"></span>
								<span class="bar"></span>
								<label class="google-lbl">Barangay<span class="text-danger h6 ml-1">*</span></label>
								<p class="brgy text-danger text-required">This field is required.</p>
							</div>
							<div class="dropdown-menu animated slideIn list-brgy search-location" aria-labelledby="searchBrgy">
								<img class="search-loader" src="<?php echo base_url() ?>/assets/css/images/loading2.gif" />
							</div>
						</div>
						<div class="group dropdown">
							<div class="group" id="searchMunCity" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<input id="city-mun" class="google-input add-field search-city-mun" type="text" required>
								<span class="highlight"></span>
								<span class="bar"></span>
								<label class="google-lbl">City/Muni<span class="text-danger h6 ml-1">*</span></label>
								<p class="city-mun text-danger text-required">This field is required.</p>
							</div>
							<div class="dropdown-menu animated slideIn list-city-mun search-location" aria-labelledby="searchMunCity">
								<img class="search-loader" src="<?php echo base_url() ?>/assets/css/images/loading2.gif" />
							</div>
						</div>
						<div class="group dropdown">
							<div class="group" id="searchProvince" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<input id="province" class="google-input add-field search-provinces" type="text" required>
								<span class="highlight"></span>
								<span class="bar"></span>
								<label class="google-lbl">Province<span class="text-danger h6 ml-1">*</span></label>
								<p class="province text-danger text-required">This field is required.</p>
							</div>
							<div class="dropdown-menu animated slideIn list-provinces search-location" aria-labelledby="searchProvince">
								<img class="search-loader" src="<?php echo base_url() ?>/assets/css/images/loading2.gif" />
							</div>
						</div>
						<div class="group dropdown">
							<div class="group" id="searchRegion" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<input id="region" class="google-input add-field search-regions" type="text" required>
								<span class="highlight"></span>
								<span class="bar"></span>
								<label class="google-lbl">Region<span class="text-danger h6 ml-1">*</span></label>
								<p class="region text-danger text-required">This field is required.</p>
							</div>
							<div class="dropdown-menu animated slideIn list-regions search-location" aria-labelledby="searchRegion">
								<img class="search-loader" src="<?php echo base_url() ?>/assets/css/images/loading2.gif" />
							</div>
						</div>
					</div>
					<div class="col-lg-3 mt-3 input-container">
						<i class="fa-fw fas fa-mobile"></i>
						<div class="group">
							<input id="contact" class="google-input add-field" type="text" required>
							<span class="highlight"></span>
							<span class="bar"></span>
							<label class="google-lbl">Contact #</label>
						</div>
					</div>
				</div>
			</section>
			<hr>
			<section>
				<h5 class="font-weight-bold">Grievance Information</h5>
				<div class="row p-3">
					<div class="col-lg-6 mt-3 input-container">
						<i class="fa-fw fas fa-folder"></i>
						<div class="group">
							<select id="category" class="google-input add-field" required>
							<option disabled selected></option>
							<?php
								foreach ($res as $key => $value) {
								echo '<option data-opt="'. $value->category_opt .'" data-subj="'. $value->category_subj .'" value="'. $value->category_id .'">'. $value->category_name .'</option>';
								}
							?>
							</select>
							<span class="highlight"></span>
							<span class="bar"></span>
							<label class="google-lbl">Category<span class="text-danger h6 ml-1">*</span></label>
							<p class="category text-danger text-required">This field is required.</p>
						</div>
					</div>
					<div class="col-lg-6 mt-3 input-container">
						<i class="fa-fw fas fa-folder-open"></i>
						<div class="group">
							<select id="sub-category" class="google-input add-field" required>
							</select>
							<span class="highlight"></span>
							<span class="bar"></span>
							<label class="google-lbl">Sub-category<span class="text-danger h6 ml-1">*</span></label>
							<p class="sub-category text-danger text-required">This field is required.</p>
						</div>
					</div>

					<div class="col-lg-12 mt-3 category-option1"></div>

					<div class="col-lg-12 mt-3 input-container mt-3">
						<i class="fa-fw fas fa-file-signature"></i>
						<div class="group">
							<textarea id="description" class="google-input add-field"></textarea>
							<span class="highlight"></span>
							<span class="bar"></span>
							<label class="google-lbl txtarea-lbl">Grievance Description<span class="text-danger h6 ml-1">*</span></label>
							<p class="description text-danger text-required">This field is required.</p>
						</div>
					</div>
				</div>
			</section>
			<hr>
			<section>
				<h5 class="font-weight-bold">Resolution Information</h5>
				<div class="row p-3">
					<div class="col-lg-12 mt-3 input-container mt-3">
						<i class="fa-fw far fa-handshake"></i>
						<div class="group">
							<textarea id="resolution" class="google-input add-field"></textarea>
							<span class="highlight"></span>
							<span class="bar"></span>
							<label class="google-lbl txtarea-lbl">Initial Resolution<span class="text-danger h6 ml-1">*</span></label>
							<p class="resolution text-danger text-required">This field is required.</p>
						</div>
					</div>

					<div class="col-lg-4 mt-3 input-container">
						<i class="fa-fw fas fa-file-invoice"></i>
						<div class="group">
							<select id="r-mode" class="google-input add-field" required>
							<option disabled selected></option>
							<?php
								foreach ($res1 as $key => $value) {
								echo "<option value=". $value->mode_name .">". $value->mode_name ."</option>";
								}
							?>
							</select>
							<span class="highlight"></span>
							<span class="bar"></span>
							<label class="google-lbl">Report Mode<span class="text-danger h6 ml-1">*</span></label>
							<p class="r-mode text-danger text-required">This field is required.</p>
						</div>
					</div>
					<div class="col-lg-4 mt-3 input-container">
						<i class="fa-fw fas fa-street-view"></i>
						<div class="group">
							<input id="assist-by" class="google-input add-field" type="text" required>
							<span class="highlight"></span>
							<span class="bar"></span>
							<label class="google-lbl">Assist By<span class="text-danger h6 ml-1">*</span></label>
							<p class="assist-by text-danger text-required">This field is required.</p>
						</div>
					</div>
					<div class="col-lg-4 mt-3 input-container">
						<i class="fa-fw far fa-calendar-alt"></i>
						<div class="group">
							<input id="date-assisted" class="google-input add-field" type="text" required>
							<span class="highlight"></span>
							<span class="bar"></span>
							<label class="google-lbl">Date Assisted<span class="text-danger h6 ml-1">*</span></label>
							<p class="date-assisted text-danger text-required">This field is required.</p>
						</div>
					</div>
				</div>
			</section>
				<button id="btn-submit" class="btn btn-submit float-right">Submit</button>
			</div>
		</div>
	</div>
</div>


<!-- MODAL AREA -->
<div class="modal fade" id="tblModal">
	<div class="modal-dialog ">
		<div class="modal-content">
			<div class="modal-header text-center">
				<h4 class="modal-title w-100 ">GRIEVANCE FORM</h4>
				<button type="button" style="outline:none" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body p-3">
				<table class="w-100 flex-nowrap tbl-grievance">
					<tbody>
						<tr>
							<th colspan="6" class="text-center">I. COMPLAINANT INFORMATION</th>
						</tr>
						<tr>
							<td>Complainant Type:</td>
							<td id="com-type"></td>
							<td>Report Mode:</td>
							<td id="rep-mode"></td>
							<td>Date Filed:</td>
							<td id="d-filed"></td>
						</tr>
						<tr>
							<td>Household ID #:</td>
							<td id="house-id"></td>
							<td>Set:</td>
							<td id="house-set"></td>
							<td>Client Status:</td>
							<td id="client-stats"></td>
						</tr>
						<tr>
							<td>Name:</td>
							<td id="fullname"></td>
							<td>Sex:</td>
							<td id="sex"></td>
							<td>IP Affiliation:</td>
							<td id="ip"></td>
						</tr>
						<tr>
							<td>Address:</td>
							<td id="address" colspan="3"></td>
							<td>Contact #:</td>
							<td id="contact-num"></td>
						</tr>
						<tr>
							<th colspan="6" class="text-center">II. GRIEVANCE INFORMATION</th>
						</tr>
						<tr>
							<td>Category:</td>
							<td id="categ" colspan="2"></td>
							<td>Sub-category:</td>
							<td id="sub-categ" colspan="2"></td>
						</tr>

						<tr class="optRow1"></tr>
						<tr class="optRow2"></tr>
						<tr class="optRow3"></tr>

						<tr>
							<td colspan="6">Please describe the complaint here:</td>
						</tr>
						<tr>
							<td id="com-des" colspan="6" class="font-weight-normal"></td>
						</tr>
						<tr>
							<th colspan="6" class="text-center">III. RESOLUTION INFORMATION</th>
						</tr>
						<tr>
							<td colspan="6">Initial Resolution:</td>
						</tr>
						<tr>
							<td id="ini-res" colspan="6" class="font-weight-normal"></td>
						</tr>
						<tr>
							<td>Assist By:</td>
							<td id="assist" colspan="2"></td>
							<td>Date Assisted:</td>
							<td id="d-assist" colspan="2"></td>
						</tr>
						<tr>
							<td>Filed Location:</td>
							<td id="f-location" colspan="5"><?= $user_data->location ?></td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button data-dismiss="modal" class="btn-tbl btn btn-nxt mr-auto">Cancel</button>
				<button class="btn-tbl btn btn-submit submit-modal">Submit</button>
			</div>
		</div>
	</div>
</div>

<script src="<?php echo base_url()?>/assets/js/grievance.js"></script>
