// Initialization


	if (userLocation == '') {
		$('#myModal3').modal({
          show: true,
          backdrop: 'static',
          keyboard: false
		});
        $('#myModal3 .modal-title').html('<i class="fas fa-map-marker-alt mr-2 text-secondary"></i>Location');
        $('#myModal3 .modal-body').html('<p class="text-center">Please set your location first before adding data</p><div class="m-auto d-flex loc-dir"><p class="mr-2 text-secondary">Go to your profile and set location:</p><button id="gotoProfile-btn" class="ml-auto btn btn-sm btn-primary"><i class="fas fa-arrow-right"></i></button></div>');

        $(document).on('click', '#gotoProfile-btn', () => {
        	$('#myModal3').modal('toggle');
    		page('profile_data');
        })
	}

// end

dateTimeNow = () => {
	var today = new Date();
	var dd = String(today.getDate()).padStart(2, '0');
	var mm = String(today.getMonth() + 1).padStart(2, '0');
	var yyyy = today.getFullYear();
	var hh = today.getHours();
	var min = today.getMinutes();
	
	return today = mm + '-' + dd + '-' + yyyy + ' ' + hh + '-' +min;
}

var tbl_grievance = $('#tbl-grievance').DataTable({
	dom: 'lBfrtip',
	buttons: [
		{
			extend: 'csvHtml5',
			text: 'CSV',
			className: 'btn-export d-none',
			titleAttr: 'Export to excel file',
			title: "Grievance Data List " + dateTimeNow() + userLocation,
			footer: true,
			exportOptions: {
                columns: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 15, 17, 18, 19, 20, 21, 22, 23, 24, 26, 27, 28, 29, 36, 37, 38, 39, 40, 41, 42]
            },
			customize: function (csv) {
				var csvRows = csv.split('\n');
				csvRows[0] = csvRows[0].replace('Beneficiary ID', 'ben_id');
				csvRows[0] = csvRows[0].replace('Membership', 'membership');
				csvRows[0] = csvRows[0].replace('Tracking #', 'tracking_no');
				csvRows[0] = csvRows[0].replace('Fullname', 'fullname');
				csvRows[0] = csvRows[0].replace('Sex', 'sex');
				csvRows[0] = csvRows[0].replace('Household ID', 'hh_id');
				csvRows[0] = csvRows[0].replace('Household Set', 'hh_set');
				csvRows[0] = csvRows[0].replace('Purok', 'purok');
				csvRows[0] = csvRows[0].replace('Barangay', 'barangay');
				csvRows[0] = csvRows[0].replace('City/Muncipality', 'city_mun');
				csvRows[0] = csvRows[0].replace('Province', 'province');
				csvRows[0] = csvRows[0].replace('Region', 'region');
				csvRows[0] = csvRows[0].replace('Contact #', 'contact_no');
				csvRows[0] = csvRows[0].replace('Category ID', 'category');
				csvRows[0] = csvRows[0].replace('Sub Category ID', 'sub_category');
				csvRows[0] = csvRows[0].replace('Description', 'description');
				csvRows[0] = csvRows[0].replace('Resolution', 'resolution');
				csvRows[0] = csvRows[0].replace('Filed Location', 'filed_location');
				csvRows[0] = csvRows[0].replace('Assist By', 'assist_by');
				csvRows[0] = csvRows[0].replace('Date Encode', 'date_encode');
				csvRows[0] = csvRows[0].replace('Date Intake', 'date_intake');
				csvRows[0] = csvRows[0].replace('Subject Complaint', 'subj_complaint');
				csvRows[0] = csvRows[0].replace('RCA ID', 'rca');
				csvRows[0] = csvRows[0].replace('GBV Sex', 'gbv_sex');
				csvRows[0] = csvRows[0].replace('GBV Age', 'gbv_age');
				csvRows[0] = csvRows[0].replace('Report Mode', 'r_mode');
				csvRows[0] = csvRows[0].replace('P1 ID', 'p1');
				csvRows[0] = csvRows[0].replace('P2 ID', 'p2');
				csvRows[0] = csvRows[0].replace('P3 ID', 'p3');
				csvRows[0] = csvRows[0].replace('P4 ID', 'p4');
				csvRows[0] = csvRows[0].replace('P5 ID', 'p5');
				csvRows[0] = csvRows[0].replace('P6 ID', 'p6');
				csvRows[0] = csvRows[0].replace('IP Affiliation', 'ip');

				return csvRows.join('\n');
			}
		}
	],
	columnDefs: [
        {
            targets: [15, 17, 26, 36, 37, 38, 39, 40, 41],
            visible: false
        }
    ],
	scrollX: true,
	scrollX: "100%",
	scrollCollapse: true,
	lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
	processing: true,
    serverSide: true,
    order: [], 
    ajax: {
        url: base_url + 'Grievance/fetch_grievance_table',
        type: "post",
        data: function(data) {
        	data.fMonth = $('#from-month option:selected').val();
        	data.tMonth = $('#to-month option:selected').val();
        	data.year = $('#year option:selected').val();
        }
    },
});

$('#btn-export').click(function() {
	tbl_grievance.page.len(-1).draw().on('draw', () => {
    	$('#tbl-grievance').DataTable().buttons('.btn-export').trigger();
	});
});

$('#date-encoded').focus(function() {
	get_date_now('#date-encoded');
});

$('#date-encoded1').focus(function() {
	get_date_now('#date-encoded1');
});


$('#btn-dash1').click(function() {
	$("input[name=radioBtn][value="+ $('input[name=demo]:checked').val() +"]").prop('checked', true);
	$('#hh-id1').val($('#hh-id').val());
	$('#hh-set1').val($('#hh-set').val());
	$('#date-filed1').val($('#date-filed').val());
	$('#ip-affiliation1').val($('#ip-affiliation').val());
	$('#fname1').val($('#fname').val());
	$('#mname1').val($('#mname').val());
	$('#lname1').val($('#lname').val());
	$('#gender1 option:selected').text($('#gender option:selected').text());
	$('#street1').val($('#street').val());
	$('#brgy1').val($('#brgy').val());
	$('#city-mun1').val($('#city-mun').val());
	$('#province1').val($('#province').val());
	$('#region1').val($('#region').val());
	$('#contact1').val($('#contact').val());
	$('#category1').val($('#category option:selected').val()).change();
	setTimeout(() => {
		$('#sub-category1').val($('#sub-category option:selected').val());
		$('.rca-field0').val($('.rca-field1 option:selected').val());
	}, 1000);
	$('#category1 option:selected').data('opt', $('#category option:selected').data('opt'));
	$('#category1 option:selected').data('subj', $('#category option:selected').data('subj'));
	$('#description1').val($('#description').val());
	$('#resolution1').val($('#resolution').val());
	$('#r-mode1 option:selected').text($('#r-mode option:selected').text());
	$('#assist-by1').val($('#assist-by').val());
	$('#date-assisted1').val($('#date-assisted').val());

	$('#type-1').fadeIn('slow');
	$('#type-2').hide();
	$('#btn-dash1').addClass('active');
	$('#btn-dash2').removeClass('active');

	$('.p1-1:eq(0)').val($('.p1-1:eq(1)').val());
	$('.p2-1:eq(0)').val($('.p2-1:eq(1)').val());
	$('.p3-1:eq(0)').val($('.p3-1:eq(1)').val());
	$('.p4-1:eq(0)').val($('.p4-1:eq(1)').val());
	$('.p5-1:eq(0)').val($('.p5-1:eq(1)').val());
	$('.p6-1:eq(0)').val($('.p6-1:eq(1)').val());

	$('.p1-1:eq(0)').data('id', $('.p1-1:eq(1)').data('id'));
	$('.p2-1:eq(0)').data('id', $('.p2-1:eq(1)').data('id'));
	$('.p3-1:eq(0)').data('id', $('.p3-1:eq(1)').data('id'));
	$('.p4-1:eq(0)').data('id', $('.p4-1:eq(1)').data('id'));
	$('.p5-1:eq(0)').data('id', $('.p5-1:eq(1)').data('id'));
	$('.p6-1:eq(0)').data('id', $('.p6-1:eq(1)').data('id'));

	$('.rca-age1:eq(0)').val($('.rca-age1:eq(1)').val());

	$('.rca-sex1:eq(0)').val($('.rca-sex1:eq(1) option:selected').text());

	// $('.rca-field1:eq(0) option:selected').data('id', $('.rca-field1:eq(1) option:selected').data('id'));	

	$('.subj-field1:eq(0)').val($('.subj-field1:eq(1)').val());

});
$('#btn-dash2').click(function() {
	$("input[name=demo][value="+ $('input[name=radioBtn]:checked').val() +"]").prop('checked', true);
	$('#hh-id').val($('#hh-id1').val());
	$('#hh-set').val($('#hh-set1').val());
	$('#date-filed').val($('#date-filed1').val());
	$('#ip-affiliation').val($('#ip-affiliation1').val());
	$('#fname').val($('#fname1').val());
	$('#mname').val($('#mname1').val());
	$('#lname').val($('#lname1').val());
	$('#gender option:selected').text($('#gender1 option:selected').text());
	$('#street').val($('#street1').val());
	$('#brgy').val($('#brgy1').val());
	$('#city-mun').val($('#city-mun1').val());
	$('#province').val($('#province1').val());
	$('#region').val($('#region1').val());
	$('#contact').val($('#contact1').val());
	$('#category').val($('#category1 option:selected').val()).change();
	$('#category option:selected').data('opt', $('#category1 option:selected').data('opt'));
	$('#category option:selected').data('subj', $('#category1 option:selected').data('subj'));
	setTimeout(() => {
		$('#sub-category').val($('#sub-category1 option:selected').val());
		$('.rca-field1').val($('.rca-field0 option:selected').val());
	}, 1000);
	$('#description').val($('#description1').val());
	$('#resolution').val($('#resolution1').val());
	$('#r-mode option:selected	').text($('#r-mode1 option:selected').text());
	$('#assist-by').val($('#assist-by1').val());
	$('#date-assisted').val($('#date-assisted1').val());

	$('#type-2').fadeIn('slow');
	$('#type-1').hide();
	$('#btn-dash2').addClass('active');
	$('#btn-dash1').removeClass('active');

	$('.p1-1:eq(1)').val($('.p1-1:eq(0)').val());
	$('.p2-1:eq(1)').val($('.p2-1:eq(0)').val());
	$('.p3-1:eq(1)').val($('.p3-1:eq(0)').val());
	$('.p4-1:eq(1)').val($('.p4-1:eq(0)').val());
	$('.p5-1:eq(1)').val($('.p5-1:eq(0)').val());
	$('.p6-1:eq(1)').val($('.p6-1:eq(0)').val());


	$('.p1-1:eq(1)').data('id', $('.p1-1:eq(0)').data('id'));
	$('.p2-1:eq(1)').data('id', $('.p2-1:eq(0)').data('id'));
	$('.p3-1:eq(1)').data('id', $('.p3-1:eq(0)').data('id'));
	$('.p4-1:eq(1)').data('id', $('.p4-1:eq(0)').data('id'));
	$('.p5-1:eq(1)').data('id', $('.p5-1:eq(0)').data('id'));
	$('.p6-1:eq(1)').data('id', $('.p6-1:eq(0)').data('id'));

	// $('.rca-field1:eq(1) option:selected').data('id', $('.rca-field1:eq(0) option:selected').data('id'));

	$('.rca-age1:eq(1)').val($('.rca-age1:eq(0)').val());

	$('.rca-sex1:eq(1)').val($('.rca-sex1:eq(0) option:selected').val());

	$('.subj-field1:eq(1)').val($('.subj-field1:eq(0)').val());

});


function btn_move(trig1, trig2, trig3, trig4) {
	$(trig1).removeClass('active')
	$(trig2).addClass('active');
	$(trig3).hide();
	$(trig4).show('slow');
}

datePicker('#date-filed');
datePicker('#date-assisted');
datePicker('#date-filed1');
datePicker('#date-assisted1');

function datePicker(field) {
	$(field).datepicker({ 
		dateFormat: 'MM dd, yy',
		maxDate: '0'
	});
}


function get_date_now(field) {
	$.ajax({
		url: base_url + '/grievance/get_date_now',
		method: 'post',
		success: function(result) {
			let data = JSON.parse(result);
			let date = data.dateNow;
			$(field).val(date);
		},
		error: function(xohr) {
			alert(xohr);
		}
	});
}

function btn_nxt_req(tab) {
	if (tab == 'tab1') {
		let dateFiled = $('#date-filed1').val();
		let fName = $('#fname1').val();
		let lName = $('#lname1').val();
		let gender = $('#gender1 option:selected').text();
		let brgy = $('#brgy1').val();
		let cityMun = $('#city-mun1').val();
		let province = $('#province1').val();
		let region = $('#region1').val();
		let contact = $('#contact1').val();

		if (dateFiled == '' || fName == '' || lName == '' || gender == '' || brgy == '' || cityMun == '' || province == '' || region == '') {
			if (dateFiled == '') {
				$('.date-filed1').show('slow');
			} else {
				$('.date-filed1').hide('slow');
			}
			
			if (fName == '') {
				$('.fname1').show('slow');
			} else {
				$('.fname1').hide('slow');
			}
			if (lName == '') {
				$('.lname1').show('slow');
			} else {
				$('.lname1').hide('slow');
			}
			if (gender == '') {
				$('.gender1').show('slow');
			} else {
				$('.gender1').hide('slow');
			}
			if (brgy == '') {
				$('.brgy1').show('slow');
			} else {
				$('.brgy1').hide('slow');
			}
			if (cityMun == '') {
				$('.city-mun1').show('slow');
			} else {
				$('.city-mun1').hide('slow');
			}
			if (province == '') {
				$('.province1').show('slow');
			} else {
				$('.province1').hide('slow');
			}
			if (region == '') {
				$('.region1').show('slow');
			} else {
				$('.region1').hide('slow');
			}
		} else {
			$('.text-required').hide('slow');
			btn_move('#tab1', '#tab2', '#section-1', '#section-2');
		}
	} else if (tab == 'tab2') {
		let category = $('#category1 option:selected').text();
		let subCategory = $('#sub-category1 option:selected').text();
		let description = $('#description1').val();

		let rca = $('.rca-field1:eq(0) option:selected').val();
      	let rcaAge = $('.rca-age1:eq(0)').val();
      	let rcaSex = $('.rca-sex1:eq(0) option:selected').val();
      	let subject = $('.subj-field1:eq(0)').val();
      	let catSubj = $('#category1').find(':selected').data('subj');
      	let catOpt = $('#category1').find(':selected').data('rca');

		let a = 0;
		let b = 0;
		let c = 0;
		let d = 0;
		let e = 0;
		let f = 0;
		let g = 0;

			if (category == '') {
				$('.category1').show('slow');
				a = 1;
			} else {
				$('.category1').hide('slow');
				a = 0;
			}

			if (subCategory == '') {
				$('.sub-category1').show('slow');
				b = 1;
			} else {
				$('.sub-category1').hide('slow');
				b = 0;
			}

			if (description == '') {
				$('.description1').show('slow');
				c = 1;
			} else {
				$('.description1').hide('slow');
				c = 0;
			}

			if (rca == '') {
				$('.rcaField1').show('slow');
				d = 1;
			} else {
				$('.rcaField1').hide('slow');
				d = 0;
			}

			if (rcaAge == '') {
				$('.rcaAge1').show('slow');
				e = 1;
			} else {
				$('.rcaAge1').hide('slow');
				e = 0;
			}

			if (rcaSex == '') {
				$('.rcaSex1').show('slow');
				f = 1;
			} else {
				$('.rcaSex1').hide('slow');
				f = 0;
			}

			if (subject == '') {
				$('.subjField1').show('slow');
				g = 1;
			} else {
				$('.subjField1').hide('slow');
				g = 0;
			}
		
			if (a == 0 && b == 0 && c == 0 && d == 0 && e == 0 && f == 0 && g == 0) {
				$('.text-required').hide('slow');
				btn_move('#tab2', '#tab3', '#section-2', '#section-3');
			}
			
	} else if (tab == 'tab3') {
		let resolution = $('#resolution1').val();
		let rMode = $('#r-mode1 option:selected').text();
		let assistBy = $('#assist-by1').val(); 
		let dateAssisted = $('#date-assisted1').val();
		
		
		if (resolution == '' || rMode == '' || assistBy == '' || dateAssisted == '') {
			if (resolution == '') {
				$('.resolution1').show('slow');
			} else {
				$('.resolution1').hide('slow');
			}
			

			if (rMode == '') {
				$('.r-mode1').show('slow');
			} else {
				$('.r-mode1').hide('slow');
			}

			if (assistBy == '') {
				$('.assist-by1').show('slow');
			} else {
				$('.assist-by1').hide('slow');
			}

			if (dateAssisted == '') {
				$('.date-assisted1').show('slow');
			} else {
				$('.date-assisted1').hide('slow');
			}
		} else {
			$('.text-required').hide('slow');
			let dateFiled = $('#date-filed1').val();
			let fName = $('#fname1').val();
			let lName = $('#lname1').val();
			let gender = $('#gender1 option:selected').text();
			let brgy = $('#brgy1').val();
			let cityMun = $('#city-mun1').val();
			let province = $('#province1').val();
			let region = $('#region1').val();
			let contact = $('#contact1').val();
			let category = $('#category1 option:selected').text();
			let subCategory = $('#sub-category1 option:selected').text();
			let categoryID = $('#category1 option:selected').val();
			let subCategoryID = $('#sub-category1 option:selected').val();
			let description = $('#description1').val();
			let hhID = $('#hh-id1').val();
			let hhSet = $('#hh-set1').val();
			let mName = $('#mname1').val();
			let street = $('#street1').val();
			let ipAff = $('#ip-affiliation1').val();
			let resolution = $('#resolution1').val();
			let rMode = $('#r-mode1 option:selected').text();
			let assistBy = $('#assist-by1').val(); 
			let dateAssisted = $('#date-assisted1').val();
			let type = $('input[name="radioBtn"]:checked').val();

			let p1 = $('.p1-1:eq(0)').val();
			let p2 = $('.p2-1:eq(0)').val();
			let p3 = $('.p3-1:eq(0)').val();
			let p4 = $('.p4-1:eq(0)').val();
			let p5 = $('.p5-1:eq(0)').val();
			let p6 = $('.p6-1:eq(0)').val();

			let p1ID = $('.p1-1:eq(0)').data('id');
			let p2ID = $('.p2-1:eq(0)').data('id');
			let p3ID = $('.p3-1:eq(0)').data('id');
			let p4ID = $('.p4-1:eq(0)').data('id');
			let p5ID = $('.p5-1:eq(0)').data('id');
			let p6ID = $('.p6-1:eq(0)').data('id');

			let rca = $('.rca-field0 option:selected').text();
			let rcaID = $('.rca-field0 option:selected').val();
			let rcaAge = $('.rca-age1:eq(0)').val();
			let rcaSex = $('.rca-sex1:eq(0) option:selected').text();
			let subject = $('.subj-field1:eq(0)').val();


			let catOpt = $('#category1').find(':selected').data('opt');
		  	let catSubj = $('#category1').find(':selected').data('subj');
		  	
			grievanceDataForm(type, hhID, hhSet, mName, street, ipAff, dateFiled, fName, lName, gender, brgy, cityMun, province, region, contact, category, subCategory, categoryID, subCategoryID, description, resolution, rMode, assistBy, dateAssisted, p1, p2, p3, p4, p5, p6, p1ID, p2ID, p3ID, p4ID, p5ID, p6ID, rca, rcaID, rcaAge, rcaSex, subject, catOpt, catSubj);
		}
	}
	
}

function grievanceDataForm(comT, householdID, householdSet, middleN, purok, ip, dateF, firstN, lastN, sex, barangay, cityM, provinces, regions, contactNo, cat, subCat, catID, subCatID, desc, reso,  report, assist, dateA, p1, p2, p3, p4, p5, p6, p1ID, p2ID, p3ID, p4ID, p5ID, p6ID, rca, rcaID, rcaAge, rcaSex, subject, catOpt, catSubj) {
	let add = purok + ', ' + barangay + ', ' + cityM + ', ' + provinces + ', ' + regions;
	let name = firstN + ' ' + middleN + ' ' + lastN;
		

	$('#com-type').text(comT);
	$('#rep-mode').text(report);
	$('#d-filed').text(dateF);
	$('#house-id').text(householdID);
	$('#house-set').text(householdSet);
	$('#client-stats').text('On-going');
	$('#fullname').text(name);
	$('#sex').text(sex);
	$('#ip').text(ip);
	$('#address').text(add);
	$('#contact-num').text(contactNo);
	$('#categ').text(cat);
	$('#sub-categ').text(subCat);
	$('#com-des').text(desc);
	$('#ini-res').text(reso);
	$('#assist').text(assist);
	$('#d-assist').text(dateA);

	$('#tblModal').modal({
		show: true,
		backdrop: 'static',
		keyboard: false
	});

	$('.optRow1').empty();
  	$('.optRow2').empty();
  	$('.optRow3').empty();
  	if (catOpt == 'rca1') {
		$('.optRow1').html('<td class="font-weight-bold">P1:</td>' +
                            '<td>' + p1 + '</td>' +
                            '<td class="font-weight-bold">P2:</td>' +
                            '<td>' + p2 + '</td>' +
                            '<td class="font-weight-bold">p3:</td>' +
                            '<td>' + p3 + '</td>');

		$('.optRow2').html('<td class="font-weight-bold">P4:</td>' +
                            '<td>' + p4 + '</td>' +
                            '<td class="font-weight-bold">P5:</td>' +
                            '<td>' + p5 + '</td>' +
                            '<td class="font-weight-bold">P6:</td>' +
                            '<td>' + p6 + '</td>');
  	} else if (catOpt == 'rca2') {
  		$('.optRow1').html('<td class="font-weight-bold">RCA:</td>' +
                            '<td>' + rca + '</td>' +
                            '<td class="font-weight-bold">RCA Age:</td>' +
                            '<td>' + rcaAge + '</td>' +
                            '<td class="font-weight-bold">RCA Sex:</td>' +
                            '<td>' + rcaSex + '</td>');
  	}

  	if (catSubj == 'Yes') {
        $('.optRow3').html('<td class="font-weight-bold">Subject:</td>' +
                            '<td colspan="5">' + subject + '</td>');
  	}


	
	
	$('.submit-modal').off().on('click', function() {

		if (userLocation != '') {
			$.ajax({
				url: base_url + 'grievance/add_grievance',
				method: 'post',
				data: {
					ben_id: $beneficiary_id,
					member: comT,
					fname: firstN,
					mname: middleN,
					lname: lastN,
					purok: purok,
					brgy: barangay,
					mun_city: cityM,
					province: provinces,
					region: regions,
					sex: sex,
					household_id: householdID,
					hh_set: householdSet,
					contact: contactNo,
					ip: ip,
					category: catID,
					sub_category: subCatID,
					comp_des: desc,
					in_reso: reso,
					assist_by: assist,
					date_filed: dateF,
					r_mode: report,
					p1: p1ID,
					p2: p2ID,
					p3: p3ID,
					p4: p4ID,
					p5: p5ID,
					p6: p6ID,
					rca: rcaID,
					rcaAge: rcaAge,
					rcaSex: rcaSex,
					subject: subject,
					location: userLocation

				},
				success: function(result) {
					if (result == 1) {
						$('#myModal3').modal({
		                  show: true,
		                  backdrop: 'static',
		                  keyboard: false
		                });
		                $('#myModal3 .modal-header .close').remove();
		                $('#myModal3 .modal-title').html('<i class="fas text-danger fa-exclamation-triangle mr-2"></i>Duplicate Error');
		                $('#myModal3 .modal-body').html('<p class="text-center">The Grievance Data is already exist and still Ongoing this year.</p><div class="timerDiv"></div>');
						$('#myModal3 .modal-body .timerDiv').html('<p class="text-center">Please check the information again!</p>');
						
						setTimeout(() => {
							$('#tblModal').modal('toggle');
							$('#myModal3').modal('toggle');
						}, 3000);

					} else {
						$('#tblModal').modal('toggle');
						$('.toast-area').append('<div class="toast animated fadeInDown" role="alert" aria-live="assertive" data-delay="5000" aria-atomic="true">' +
		                                        '<div class="toast-header">' +
		                                        '<strong class="mr-auto toast-title">Grievance</strong>' +
		                                        '<button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">' +
		                                        '<span aria-hidden="true">&times;</span>' +
		                                        '</button>' +
		                                        '</div>' +
		                                        '<div class="toast-body">' +
		                                        'Grievance added successfully' +
		                                        '</div>' +
		                                        '</div>' +
		                '');
		                $(".toast").toast('show');
		                
		                $('.toast').on('hidden.bs.toast', function () {
		                    $(this).remove();
		                });

		                setTimeout(() => {
							page("add_grievance_data");
		                }, 1000);
					}
				},
				error: function(xhr, ajaxOptions, thrownError) {
					console.error('Error in submit grievance data: ' + xhr.status + ' => ' + thrownError);
				}
			  
			});

			
		} else {
			$('#myModal3').modal({
              show: true,
              backdrop: 'static',
              keyboard: false
			});
            $('#myModal3 .modal-title').html('<i class="fas fa-map-marker-alt mr-2 text-secondary"></i>Location');
            $('#myModal3 .modal-body').html('<p class="text-center">Please set your location first before adding data</p><div class="m-auto d-flex loc-dir"><p class="mr-2 text-secondary">Go to your profile and set location:</p><button id="gotoProfile-btn" class="ml-auto btn btn-sm btn-primary"><i class="fas fa-arrow-right"></i></button></div>');

            $(document).on('click', '#gotoProfile-btn', () => {
            	$('#tblModal').modal('toggle');
            	$('#myModal3').modal('toggle');
            	setTimeout(() => {
            		page('profile_data');
            	}, 500);
            })
		}	
		
	});
}

$('#btn-submit').click(function() {
	let dateFiled = $('#date-filed').val();
	let fName = $('#fname').val();
	let lName = $('#lname').val();
	let gender = $('#gender option:selected').text();
	let brgy = $('#brgy').val();
	let cityMun = $('#city-mun').val();
	let province = $('#province').val();
	let region = $('#region').val();
	let contact = $('#contact').val();
	let category = $('#category option:selected').text();
	let subCategory = $('#sub-category option:selected').text();
	let categoryID = $('#category option:selected').val();
	let subCategoryID = $('#sub-category option:selected').val();
	let description = $('#description').val();
	let resolution = $('#resolution').val();
	let rMode = $('#r-mode option:selected').text();
	let assistBy = $('#assist-by').val();
	let dateAssisted = $('#date-assisted').val();
	
	let rcaAge;
	let rcaSex;
	let subject;

	let age44 = 0;
	let sex44 = 0;
	let subject44 = 0;

	if ($('.rca-field1').html() != undefined) {
		rcaAge = $('.rca-age1').val();
		rcaSex = $('.rca-sex1 option:selected').text();
		if (rcaAge == '') {
			$('.rcaAge1').show('slow');
			age44 = 1;
		} else {
			$('.rcaAge1').hide('slow');
			age44 = 0;
		}

		if (rcaSex == '') {
			$('.rcaSex1').show('slow');
			sex44 = 1;
		} else {
			$('.rcaSex1').hide('slow');
			sex44 = 0;
		}
	}

	if ($('.subj-field1').html() != undefined) {
		subject = $('.subj-field1').val();
		if (subject == '') {
			$('.subjField1').show('slow');
			subject44 = 1;
		} else {
			$('.subjField1').hide('slow');
			subject44 = 0;
		}
		
	}

	if (dateFiled == '' || fName == '' || lName == '' || gender == '' || brgy == '' || cityMun == '' || province == '' || region == '' ||  category == '' || subCategory == '' || description == '' || resolution == '' || rMode == '' || assistBy == '' || dateAssisted == '') {

		if (dateFiled == '') {
			$('.date-filed').show('slow');
		} else {
			$('.date-filed').hide('slow');
		}

		if (fName == '') {
			$('.fname').show('slow');
		} else {
			$('.fname').hide('slow');
		}

		if (lName == '') {
			$('.lname').show('slow');
		} else {
			$('.lname').hide('slow');
		}

		if (gender == '') {
			$('.gender').show('slow');
		} else {
			$('.gender').hide('slow');
		}

		if (brgy == '') {
			$('.brgy').show('slow');
		} else {
			$('.brgy').hide('slow');
		}

		if (cityMun == '') {
			$('.city-mun').show('slow');
		} else {
			$('.city-mun').hide('slow');
		}

		if (province == '') {
			$('.province').show('slow');
		} else {
			$('.province').hide('slow');
		}

		if (region == '') {
			$('.region').show('slow');
		} else {
			$('.region').hide('slow');
		}

		if (category == '') {
			$('.category').show('slow');
		} else {
			$('.category').hide('slow');
		}

		if (subCategory == '') {
			$('.sub-category').show('slow');
		} else {
			$('.sub-category').hide('slow');
		}

		if (description == '') {
			$('.description').show('slow');
		} else {
			$('.description').hide('slow');
		}

		if (resolution == '') {
			$('.resolution').show('slow');
		} else {
			$('.resolution').hide('slow');
		}

		if (rMode == '') {
			$('.r-mode').show('slow');
		} else {
			$('.r-mode').hide('slow');
		}

		if (assistBy == '') {
			$('.assist-by').show('slow');
		} else {
			$('.assist-by').hide('slow');
		}

		if (dateAssisted == '') {
			$('.date-assisted').show('slow');
		} else {
			$('.date-assisted').hide('slow');
		}

		
	} else {
		let dateFiled = $('#date-filed').val();
		let fName = $('#fname').val();
		let lName = $('#lname').val();
		let gender = $('#gender option:selected').text();
		let brgy = $('#brgy').val();
		let cityMun = $('#city-mun').val();
		let province = $('#province').val();
		let region = $('#region').val();
		let contact = $('#contact').val();
		let category = $('#category option:selected').text();
		let subCategory = $('#sub-category option:selected').text();
		let description = $('#description').val();
		let hhID = $('#hh-id').val();
		let hhSet = $('#hh-set').val();
		let mName = $('#mname').val();
		let street = $('#street').val();
		let ipAff = $('#ip-affiliation').val();
		let resolution = $('#resolution').val();
		let rMode = $('#r-mode option:selected').text();
		let assistBy = $('#assist-by').val(); 
		let dateAssisted = $('#date-assisted').val();
		let type = $('input[name="demo"]:checked').val();

		let p1 = $('.p1-1:eq(1)').val();
		let p2 = $('.p2-1:eq(1)').val();
		let p3 = $('.p3-1:eq(1)').val();
		let p4 = $('.p4-1:eq(1)').val();
		let p5 = $('.p5-1:eq(1)').val();
		let p6 = $('.p6-1:eq(1)').val();

		let p1ID = $('.p1-1:eq(1)').data('id');
		let p2ID = $('.p2-1:eq(1)').data('id');
		let p3ID = $('.p3-1:eq(1)').data('id');
		let p4ID = $('.p4-1:eq(1)').data('id');
		let p5ID = $('.p5-1:eq(1)').data('id');
		let p6ID = $('.p6-1:eq(1)').data('id');

		let catOpt = $('#category').find(':selected').data('opt');
	  	let catSubj = $('#category').find(':selected').data('subj');

		let rca = $('.rca-field1 option:selected').text();
		let rcaID = $('.rca-field1 option:selected').val();
		
	  	if (age44 == 0 && sex44 == 0 && subject44 == 0) {
			$('.text-required').hide('slow');
			grievanceDataForm(type, hhID, hhSet, mName, street, ipAff, dateFiled, fName, lName, gender, brgy, cityMun, province, region, contact, category, subCategory, categoryID, subCategoryID, description, resolution, rMode, assistBy, dateAssisted, p1, p2, p3, p4, p5, p6, p1ID, p2ID, p3ID, p4ID, p5ID, p6ID, rca, rcaID, rcaAge, rcaSex, subject, catOpt, catSubj);
	  	}
	}
});

$(".search-field").keypress(function(){
	setTimeout(() => {
		if ($('input[type=radio]:checked').val() == 'RCCT' || $('input[type=radio]:checked').val() == 'MCCT') {
			let search = $(this).val();
			let typeGrant = $('input[type=radio]:checked').val();
			$('.search-result').html('<img src="'+ base_url +'/assets/css/images/loading2.gif" class="search-loader" />');
			  $.ajax({
				  url: base_url + "grievance/search_beneficiary",
				  method:"get",
				  dataType: 'json',
				  data:{query: search, typeGrant: typeGrant},
				  success:function(data){
					if (jQuery.isEmptyObject(data)) {
						$('.search-result').html('No results found');
					} else { 
						$('.search-result').empty();
						$('.search-result').append('<span class="dropdown-menu-arrow"></span>');
						$.each(data, function(k, v) {
						  $('.search-result').append('<a href="" class="dropdown-item"  onclick="search_data(\'' + v.grant_id +'\', \'' + v.grant_firstname +'\' , \'' + v.grant_middlename +'\', \'' + v.grant_lastname +'\', \'' + v.grant_hh_id +'\', \'' + v.grant_hh_set +'\', \'' + v.grant_ip_affiliation +'\', \'' + v.grant_sex +'\', \'' + v.grant_purok +'\', \'' + v.grant_barangay +'\', \'' + v.grant_muncipality +'\', \'' + v.grant_province +'\', \'' + v.grant_region +'\', event)">'+ v.grant_hh_id + '<br>' +v.grant_firstname+ ' ' + v.grant_middlename + ' ' + v.grant_lastname +'</a>');
						});
					}
				  }
			  });
		  }
	}, 100);
}).on('keydown', function(e) {
 if (e.keyCode == 8)
   $(this).trigger('keypress');
});

function search_data($id1, $fname1, $mname2, $lname3, $hh_id4, $hh_set5, $ip_affiliation6, $sex7, $purok8, $brgy9, $muncipality10, $provinces11, $region12, event) {
	event.preventDefault();
	$beneficiary_id = $id1;
	$('#fname1').val($fname1);
	$('#mname1').val($mname2);
	$('#lname1').val($lname3);
	$('#hh-id1').val($hh_id4);
	$('#hh-set1').val($hh_set5);
	$('#ip-affiliation1').val($ip_affiliation6);
	$('#street1').val($purok8);
	$('#brgy1').val($brgy9);
	$('#city-mun1').val($muncipality10);
	$('#province1').val($provinces11);
	$('#region1').val($region12);
	
	$('#fname').val($fname1);
	$('#mname').val($mname2);
	$('#lname').val($lname3);
	$('#hh-id').val($hh_id4);
	$('#hh-set').val($hh_set5);
	$('#ip-affiliation').val($ip_affiliation6);
	$('#street').val($purok8);
	$('#brgy').val($brgy9);
	$('#city-mun').val($muncipality10);
	$('#province').val($provinces11);
	$('#region').val($region12);

	if ($sex7 === 'MALE') {
	  $('#gender1').val('Male').change();
	  $('#gender').val('Male').change();
	} else if ($sex7 === 'FEMALE') {
	  $('#gender1').val('Female').change();
	  $('#gender').val('Female').change();
	}

	$('.search-result').empty();
	$('.search-result').html('<img src="'+ base_url +'/assets/css/images/loading2.gif" class="search-loader" />');
  }


  $('input[type=radio]').click(function() {
	$('.add-field').val(null);
	if ($('input[type=radio]:checked').val() == 'RCCT' || $('input[type=radio]:checked').val() == 'MCCT') {
	  $('.compliant .dropdown-menu').css('display', '');
	} else if ($('input[type=radio]:checked').val() == 'Non-beneficiary') {
	  $('.compliant .dropdown-menu').hide();
	}
  });

  $(".search-brgy").keypress(function(){
	  let id = $(this).attr('id');
	  setTimeout(() => {
		let search = $(this).val();
		$('.list-brgy').html('<img src="'+ base_url +'/assets/css/images/loading2.gif" class="search-loader" />');
		  $.ajax({
			  url: base_url + "grievance/search_brgy",
			  method:"POST",
			  data:{search: search},
			  success:function(data){
				var d = JSON.parse(data);
				if (jQuery.isEmptyObject(d)) {
					$('.list-brgy').html('No results found');
				} else {
					$('.list-brgy').empty();
					$('.list-brgy').append('<span class="dropdown-menu-arrow"></span>');
					$.each(d, function(k, v) {
					  $('.list-brgy').append('<a class="dropdown-item" href="" onclick="fill_location(\''+ id +'\',\'' + v.BRGY_NAME +'\', event)">'+ v.BRGY_NAME +'</a>');
					});
				}
			  }
		  });
	  }, 100);
}).on('keydown', function(e) {
 if (e.keyCode == 8)
   $(this).trigger('keypress');
});



$(".search-city-mun").keypress(function(){
	let id = $(this).attr('id');
	setTimeout(() => {
		let search = $(this).val();
		$('.list-city-mun').html('<img src="'+ base_url +'/assets/css/images/loading2.gif" class="search-loader" />');
		$.ajax({
			url: base_url + "grievance/search_mun_city",
			method:"POST",
			data:{search: search},
			success:function(data){
				var d = JSON.parse(data);
				if (jQuery.isEmptyObject(d)) {
					$('.list-city-mun').html('No results found');
				} else {
					$('.list-city-mun').empty();
					$('.list-city-mun').append('<span class="dropdown-menu-arrow"></span>');
					$.each(d, function(k, v) {
					$('.list-city-mun').append('<a class="dropdown-item" href="" onclick="fill_location(\''+ id +'\',\'' + v.CITY_NAME +'\', event)">'+ v.CITY_NAME +'</a>');
					});
				}
			}
		});
	}, 100);
}).on('keydown', function(e) {
 if (e.keyCode == 8)
   $(this).trigger('keypress');
});

$(".search-provinces").keypress(function(){
	let id = $(this).attr('id');
	setTimeout(() => {
		let search = $(this).val();
		$('.search-provinces').html('<img src="'+ base_url +'/assets/css/images/loading2.gif" class="search-loader" />');
		$.ajax({
			url: base_url + "grievance/search_provinces",
			method:"POST",
			data:{search: search},
			success:function(data){
				var d = JSON.parse(data);
				if (jQuery.isEmptyObject(d)) {
					$('.list-provinces').html('No results found');
				} else { 
					$('.list-provinces').empty();
					$('.list-provinces').append('<span class="dropdown-menu-arrow"></span>');
					$.each(d, function(k, v) {
					$('.list-provinces').append('<a class="dropdown-item" href="" onclick="fill_location(\''+ id +'\',\'' + v.PROVINCE_NAME +'\', event)">'+ v.PROVINCE_NAME +'</a>');
					});
				}
			}
		});
	}, 100);
	
}).on('keydown', function(e) {
 if (e.keyCode == 8)
   $(this).trigger('keypress');
});

$(".search-regions").keypress(function(){
	let id = $(this).attr('id');
	setTimeout(() => {
		let search = $(this).val();
		$('.search-regions').html('<img src="'+ base_url +'/assets/css/images/loading2.gif" class="search-loader" />');
		$.ajax({
			url: base_url + "grievance/search_regions",
			method:"POST",
			data:{search: search},
			success:function(data){
			  var d = JSON.parse(data);
			  if (jQuery.isEmptyObject(d)) {
				$('.list-regions').html('No results found');
			} else { 
				$('.list-regions').empty();
				$('.list-regions').append('<span class="dropdown-menu-arrow"></span>');
				$.each(d, function(k, v) {
				  $('.list-regions').append('<a class="dropdown-item" href="" onclick="fill_location(\''+ id +'\',\'' + v.REGION_NAME +'\', event)">'+ v.REGION_NAME +'</a>');
				});
			}
			}
		});
	}, 100);
}).on('keydown', function(e) {
 if (e.keyCode == 8)
   $(this).trigger('keypress');
});

$('#category1').change(function(){
	get_subCategory('category1');
	category_option('#category1', 0);
});
$('#category').change(function(){
	get_subCategory('category');
	category_option('#category', 1);
});

function category_option(fieldID, fieldType) {
	var fieldName;
	var rcaClassID;

	if (fieldType == 0) {
		fieldName = $('.category-option');
		rcaClassID = 0;
	} else if (fieldType == 1) {
		fieldName = $('.category-option1');
		rcaClassID = 1;
	}

	fieldName.empty();

	let val = $(fieldID).val();
   	let valTxt = $(fieldID).text();

	let catSubj = $(fieldID).find(':selected').data('subj');
	let catOpt = $(fieldID).find(':selected').data('opt');

	 if (catOpt == 'rca1' || valTxt == 'Payment-related issues') {
	 		fieldName.html('<div class="row">' +
	 								'<div class="col-lg-4 mt-2 input-container">' +
	 								'<i class="fa-fw fas fa-file-alt"></i>' +
                          			'<div class="group dropdown">' +
	 								'<div class="group" id="root1" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' +
	 								'<input data-id="" type="text" class="p1-1 google-input search-root" required>' +
	 								'<span class="highlight"></span>' +
	 								'<span class="bar"></span>' +
	 								'<label class="google-lbl">P1</label>' +
	 								'</div>' +
	 								'<div class="dropdown-menu animated slideIn list-root margin-drop1 search-location" aria-labelledby="root1">' +
		                          	'<img class="search-loader" src="'+base_url+'/assets/css/images/loading2.gif" />' +
		                          	'</div>' +
	 								'</div>' +
	 								'</div>' +
	 								'<div class="col-lg-4 mt-2  input-container">' +
	 								'<i class="fa-fw fas fa-file-alt"></i>' +
                          			'<div class="group dropdown">' +
	 								'<div class="group" id="root2" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' +
	 								'<input data-id="" type="text" class="p2-1 google-input search-root" required>' +
	 								'<span class="highlight"></span>' +
	 								'<span class="bar"></span>' +
	 								'<label class="google-lbl">P2</label>' +
	 								'</div>' +
	 								'<div class="dropdown-menu animated slideIn list-root margin-drop1 search-location" aria-labelledby="root2">' +
		                          	'<img class="search-loader" src="'+base_url+'/assets/css/images/loading2.gif" />' +
		                          	'</div>' +
		                          	'</div>' +
	 								'</div>' +
	 								'<div class="col-lg-4 mt-2 input-container">' +
	 								'<i class="fa-fw fas fa-file-alt"></i>' +
                          			'<div class="group dropdown">' +
	 								'<div class="group" id="root3" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' +
	 								'<input data-id="" type="text" class="p3-1 google-input search-root" required>' +
	 								'<span class="highlight"></span>' +
	 								'<span class="bar"></span>' +
	 								'<label class="google-lbl">P3</label>' +
	 								'</div>' +
	 								'<div class="dropdown-menu animated slideIn list-root margin-drop1 search-location" aria-labelledby="root3">' +
		                          	'<img class="search-loader" src="'+base_url+'/assets/css/images/loading2.gif" />' +
		                          	'</div>' +
		                          	'</div>' +
	 								'</div>' +
	 								'<div class="col-lg-4 mt-2 input-container">' +
	 								'<i class="fa-fw fas fa-file-alt"></i>' +
                          			'<div class="group dropdown">' +
	 								'<div class="group" id="root4" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' +
	 								'<input data-id="" type="text" class="p4-1 google-input search-root" required>' +
	 								'<span class="highlight"></span>' +
	 								'<span class="bar"></span>' +
	 								'<label class="google-lbl">P4</label>' +
	 								'</div>' +
	 								'<div class="dropdown-menu animated slideIn list-root margin-drop1 search-location" aria-labelledby="root4">' +
		                          	'<img class="search-loader" src="'+base_url+'/assets/css/images/loading2.gif" />' +
		                          	'</div>' +
		                          	'</div>' +
	 								'</div>' +
	 								'<div class="col-lg-4 mt-2 input-container">' +
	 								'<i class="fa-fw fas fa-file-alt"></i>' +
                          			'<div class="group dropdown">' +
	 								'<div class="group" id="root5" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' +
	 								'<input data-id="" type="text" class="p5-1 google-input search-root" required>' +
	 								'<span class="highlight"></span>' +
	 								'<span class="bar"></span>' +
	 								'<label class="google-lbl">P5</label>' +
	 								'</div>' +
	 								'<div class="dropdown-menu animated slideIn list-root margin-drop1 search-location" aria-labelledby="root5">' +
		                          	'<img class="search-loader" src="'+base_url+'/assets/css/images/loading2.gif" />' +
		                          	'</div>' +
		                          	'</div>' +
	 								'</div>' +
	 								'<div class="col-lg-4 mt-2 input-container">' +
	 								'<i class="fa-fw fas fa-file-alt"></i>' +
                          			'<div class="group dropdown">' +
	 								'<div class="group" id="root6" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' +
	 								'<input data-id="" type="text" class="p6-1 google-input search-root" required>' +
	 								'<span class="highlight"></span>' +
	 								'<span class="bar"></span>' +
	 								'<label class="google-lbl">P6</label>' +
	 								'</div>' +
	 								'<div class="dropdown-menu animated slideIn list-root margin-drop1 search-location" aria-labelledby="root6">' +
		                          	'<img class="search-loader" src="'+base_url+'/assets/css/images/loading2.gif" />' +
		                          	'</div>' +
		                          	'</div>' +
	 								'</div>' +
	 								'</div>');

		$(".search-root").keypress(function(){
		    This = this;
		      setTimeout(() => {
		        let search = $(This).val();
		          $.ajax({
		              url: base_url + "grievance/search_root", 
		              method:"get",
		              data:{search: search},
		              dataType: 'json',
		              success:function(data){
		                  if (jQuery.isEmptyObject(data)) {
		                      $('.list-root').html('No results found');
		                  } else { 
		                      $('.list-root').empty();
		                      $('.list-root').append('<span class="dropdown-menu-arrow"></span>');
		                      $.each(data, function(k, v) {
		                        $('.list-root').append('<a href="" class="dropdown-item" onclick="root_data(\'' + v.root_id + '\',\'' + v.root_code + '\', \'' + v.root_description +'\', event)">' + v.root_code + ': ' + v.root_description +'</a>');
		                      });
		                  }   
		              },
		              error: (xhr, ajaxOptions, thrownError) => {
		              	console.error('Error in search root: ' + xhr.status + ' => ' + thrownError);
		              }
		          });
		      }, 100);
	  	}).on('keydown', function(e) {
		     if (e.keyCode == 8)
		       $(this).trigger('keypress');
		  });

	  	$(".search-root").on("focus",function(e) {
			e.stopPropagation();
			$(this).click();
	  	});



	 } else if (catOpt == 'rca2' || valTxt == 'Gender-related issues') {
	 	fieldName.html('<div class="row">' +
	 								'<div class="col-lg-6 mt-2 input-container">' +
	 								'<i class="fa-fw far fa-file"></i>' +
	 								'<div class="group">' +
	 								'<select class="rca-field'+ rcaClassID +' google-input" required></select>' +
	 								'<span class="highlight"></span>' +
	 								'<span class="bar"></span>' +
	 								'<label class="google-lbl">RCA<span class="text-danger h6 ml-1">*</span></label>' +
	 								'<p class="rcaField1 text-danger text-required">This field is required.</p>' +
	 								'</div>' +
	 								'</div>' +
	 								'<div class="col-lg-3 mt-2  input-container">' +
	 								'<i class="fa-fw fas fa-portrait"></i>' +
	 								'<div class="group">' +
	 								'<input type="number" class="rca-age1 google-input" required>' +
	 								'<span class="highlight"></span>' +
	 								'<span class="bar"></span>' +
	 								'<label class="google-lbl">Age<span class="text-danger h6 ml-1">*</span></label>' +
	 								'<p class="rcaAge1 text-danger text-required">This field is required.</p>' +
	 								'</div>' +
	 								'</div>' +
	 								'<div class="col-lg-3 mt-2 input-container">' +
	 								'<i class="fa-fw fas fa-venus-mars"></i>' +
	 								'<div class="group">' +
	 								'<select class="rca-sex1 google-input" required>' +
	 								'<option selected></option>' + 
	 								'<option value="Male">Male</option>' + 
	 								'<option value="Female">Female</option>' + 
	 								'</select>' +
	 								'<span class="highlight"></span>' +
	 								'<span class="bar"></span>' +
	 								'<label class="google-lbl">Sex<span class="text-danger h6 ml-1">*</span></label>' +
	 								'<p class="rcaSex1 text-danger text-required">This field is required.</p>' +
	 								'</div>' +
	 								'</div>' +
	 								'</div>');

		 	$.ajax({
		 		url: base_url + 'Grievance/fetch_rca2',
		 		method:'get',
		 		dataType: 'json',
		 		data: { cat_id: val },
		 		success: results => {
		 			$('.rca-field' + rcaClassID).empty();
		 			$.each(results, function(k, v) {
		 				$('.rca-field' + rcaClassID).append('<option value="'+v.root_id+'">'+v.root_code+ ': ' + v.root_description + '</option>')
		 			});
		 		},
		 		error: (xhr, ajaxOptions, thrownError) => {
		 			console.error('Error in fetch rca 2: ' + xhr.status + ' => ' + thrownError);
		 		}
		 	})

	 }

	if (catSubj == 'Yes') {
	 	fieldName.append('<div class="row">' +
						'<div class="col-lg-12 mt-3 mb-3 input-container">' +
						'<i class="fa-fw fas fa-file-alt"></i>' +
						'<div class="group">' +
						'<input type="text" class="subj-field1 google-input" required>' +
						'<span class="highlight"></span>' +
						'<span class="bar"></span>' +
						'<label class="google-lbl">Subject of Complaint<span class="text-danger h6 ml-1">*</span></label>' +
						'<p class="subjField1 text-danger text-required">This field is required.</p>' +
						'</div>' +
						'</div>' +
						'</div>');
	}

	 
}

function root_data(id, code, description, event) {
  event.preventDefault();
  $(This).val(code + ': ' + description);
  $(This).data('id', id);
  $('.list-root').html('<img class="search-loader" src="'+base_url+'/assets/css/images/loading2.gif" />');
}

function get_subCategory(field) {
	let val = $('#' + field).val();
	$.ajax({
		url: base_url + "grievance/sub_category",
		method: 'get',
		data: { cat_id: val },
		dataType: 'json',
		success: result => {
			$('#sub-' + field).empty();
			$.each(result, function(k, v) {
				$('#sub-' + field).append('<option value="'+v.sub_category_id+'">'+ v.sub_category_name + '</option>');
			});
		},
		error: (xhr, ajaxOptions, thrownError) => {
			console.error('Error in fetch sub category: ' + xhr.status + ' => ' + thrownError);
		}
	});
}

$(".search-field").on("focus",function() {
	let id = $(this).closest('div').attr('id');
	$('#' + id).dropdown('toggle');
});
$(".search-brgy").on("focus",function() {
	let id = $(this).closest('div').attr('id');
	$('#' + id).dropdown('toggle');
});
$(".search-city-mun").on("focus",function() {
	let id = $(this).closest('div').attr('id');
	$('#' + id).dropdown('toggle');
});
$(".search-provinces").on("focus",function() {
	let id = $(this).closest('div').attr('id');
	$('#' + id).dropdown('toggle');
});
$(".search-regions").on("focus",function() {
	let id = $(this).closest('div').attr('id');
	$('#' + id).dropdown('toggle');
});

function fill_location(field, value, event) {
	event.preventDefault();
	$('#' + field).val(value);
	$('.list-brgy').empty();
	$('.list-brgy').html('<img src="'+ base_url +'/assets/css/images/loading2.gif" class="search-loader" />');
	$('.list-city-mun').empty();	
	$('.list-city-mun').html('<img src="'+ base_url +'/assets/css/images/loading2.gif" class="search-loader" />');
	$('.list-provinces').empty();
	$('.list-provinces').html('<img src="'+ base_url +'/assets/css/images/loading2.gif" class="search-loader" />');
	$('.list-regions').empty();
	$('.list-regions').html('<img src="'+ base_url +'/assets/css/images/loading2.gif" class="search-loader" />');
}

$('#btn-filter').off().on('click', function() {
	$('.loadText').html('Generating records...');
	$('#loadingModal').modal({
	  show: true,
	  backdrop: 'static',
	  keyboard: false
	});
	tbl_grievance.ajax.reload(() => {
	setTimeout(() => {
	  $('#loadingModal').modal('toggle');
	}, 1000);

	});
	// dateRange();
})

// function dateRange() {
//   let fromMonth = $('#fromMonth option:selected').text();
//   let toMonth = $('#toMonth option:selected').text();
//   let onYear = $('#year option:selected').text();
  
//   // $('#rangeLbl').html('<i class="fas fa-calendar mr-2"></i>'+fromMonth+' to '+toMonth+', '+onYear+'');
// }