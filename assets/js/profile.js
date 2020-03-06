
$('.profile-item:eq(0)').on('click', function() {
	$('.section-setting').hide();
	$('.section-profile').show();
});

$('.profile-item:eq(1)').on('click', function() {
	$('.section-profile').hide();
	$('.section-setting').show();
});

$('.profile-item').on('click', function() {
	$('.profile-item').removeClass('active');
	$(this).toggleClass('active');
});

$('#choose-img').off().on('click', function() {
	$('.choose-img').click();
	$('.choose-img').change(() => {
		let val = $('.choose-img').val().replace(/C:\\fakepath\\/i, '');
		$('#choose-img').text(val);
	})
});



$('#img-form').submit(function(event) {
    event.preventDefault(); 
    $('#choose-img').html('<i class="loader"></i>');
    setTimeout(() => {
        $.ajax({
        url: base_url + 'profile/do_upload',
        method: 'post',
        data: new FormData(this),
        processData: false,
        contentType: false,
        cache: false,
        async: false,
        success: function(result) {
            delete_img();
            $('#choose-img').html('upload');
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status + ' => ' + thrownError);
        }
    });
    }, 1000);
});

function delete_img() {
    $.ajax({
        url: base_url + 'profile/delete_img',
        method: 'get',
        data: {img: userimg},
        error: (xhr, ajaxOptions, thrownError) => {
            alert(xhr.status + ' => ' + thrownError);
        }
    });
}

$('#save-info').off().on('click', function() {
	let fname = $('#fullname').val();
	let image = $('.choose-img').val();
	let status = 0;

	if (image != '') {
		$('#btn-subh').click();
		status = 1;
	}

	if (fname != userName) {
		$.ajax({
			url: base_url + 'Profile/update_info',
			method: 'post',
			async: false,
			data: {fullname: fname},
			success: result => {
				status = 1;
			},
			error: (xhr, ajaxOptions, thrownError) => {
				console.error('Error in update info: ' + xhr.status + ' => ' + thrownError);
			}
		});
	}

	if (status == 1) {
		$('#upload-img').html('upload');
        $('.toast-area').append('<div class="toast animated fadeInDown" role="alert" aria-live="assertive" data-delay="5000" aria-atomic="true">' +
                                    '<div class="toast-header">' +
                                    '<strong class="mr-auto toast-title">Profile</strong>' +
                                    '<button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">' +
                                    '<span aria-hidden="true">&times;</span>' +
                                    '</button>' +
                                    '</div>' +
                                    '<div class="toast-body">' +
                                    'Info updated successfully' +
                                    '</div>' +
                                    '</div>' +
        '');
        $(".toast").toast('show');
        
        $('.toast').on('hidden.bs.toast', function () {
            $(this).remove();
        });

        setTimeout(function() {
            location.reload();  
        }, 1000);
	}
 });

$('.location-input').focus(function() {
	$(this).click();
});


$('.search-location-brgy').keypress(function() {
	let id = $(this).attr('id');
	setTimeout(() => {
		let val = $(this).val();
		$.ajax({
			url: base_url + 'Grievance/search_brgy',
			method: 'get',
			data: {search: val},
			dataType: 'json',
			success: results => {
					$('.list-b').html('<img src="'+ base_url +'/assets/css/images/loading2.gif" class="location-loader" />');
				if (jQuery.isEmptyObject(results)) {
					$('.list-b').html('No results found');
				} else {
					$('.list-b').empty();
					$('.list-b').append('<span class="dropdown-menu-arrow"></span>');
					$.each(results, function(k, v) {
					  $('.list-b').append('<a class="dropdown-item" href="" onclick="fill_location(\''+ id +'\',\'' + v.BRGY_NAME +'\', event)">'+ v.BRGY_NAME +'</a>');
					});
				}
			},
			error: (xhr, ajaxOptions, thrownError) => {
				console.error('Error in searchimg brgy location: ' + xhr.status + ' => ' + thrownError);
			}
		})
	}, 100);
});

$('.search-location-city').keypress(function() {
	let id = $(this).attr('id');
	setTimeout(() => {
		let val = $(this).val();
		$.ajax({
			url: base_url + 'Grievance/search_mun_city',
			method: 'get',
			data: {search: val},
			dataType: 'json',
			success: results => {
					$('.list-c').html('<img src="'+ base_url +'/assets/css/images/loading2.gif" class="location-loader" />');
				if (jQuery.isEmptyObject(results)) {
					$('.list-c').html('No results found');
				} else {
					$('.list-c').empty();
					$('.list-c').append('<span class="dropdown-menu-arrow"></span>');
					$.each(results, function(k, v) {
					  $('.list-c').append('<a class="dropdown-item" href="" onclick="fill_location(\''+ id +'\',\'' + v.CITY_NAME +'\', event)">'+ v.CITY_NAME +'</a>');
					});
				}
			},
			error: (xhr, ajaxOptions, thrownError) => {
				console.error('Error in searchimg city location: ' + xhr.status + ' => ' + thrownError);
			}
		})
	}, 100);
});

$('.search-location-prov').keypress(function() {
	let id = $(this).attr('id');
	setTimeout(() => {
		let val = $(this).val();
		$.ajax({
			url: base_url + 'Grievance/search_provinces',
			method: 'get',
			data: {search: val},
			dataType: 'json',
			success: results => {
					$('.list-p').html('<img src="'+ base_url +'/assets/css/images/loading2.gif" class="location-loader" />');
				if (jQuery.isEmptyObject(results)) {
					$('.list-p').html('No results found');
				} else {
					$('.list-p').empty();
					$('.list-p').append('<span class="dropdown-menu-arrow"></span>');
					$.each(results, function(k, v) {
					  $('.list-p').append('<a class="dropdown-item" href="" onclick="fill_location(\''+ id +'\',\'' + v.PROVINCE_NAME +'\', event)">'+ v.PROVINCE_NAME +'</a>');
					});
				}
			},
			error: (xhr, ajaxOptions, thrownError) => {
				console.error('Error in searchimg provinces location: ' + xhr.status + ' => ' + thrownError);
			}
		})
	}, 100);
});


$('.search-location-reg').keypress(function() {
	let id = $(this).attr('id');
	setTimeout(() => {
		let val = $(this).val();
		$.ajax({
			url: base_url + 'Grievance/search_regions',
			method: 'get',
			data: {search: val},
			dataType: 'json',
			success: results => {
					$('.list-r').html('<img src="'+ base_url +'/assets/css/images/loading2.gif" class="location-loader" />');
				if (jQuery.isEmptyObject(results)) {
					$('.list-r').html('No results found');
				} else {
					$('.list-r').empty();
					$('.list-r').append('<span class="dropdown-menu-arrow"></span>');
					$.each(results, function(k, v) {
					  $('.list-r').append('<a class="dropdown-item" href="" onclick="fill_location(\''+ id +'\',\'' + v.REGION_NAME +'\', event)">'+ v.REGION_NAME +'</a>');
					});
				}
			},
			error: (xhr, ajaxOptions, thrownError) => {
				console.error('Error in searchimg region location: ' + xhr.status + ' => ' + thrownError);
			}
		})
	}, 100);
});

function fill_location(field, value, event) {
	event.preventDefault();
	$('#' + field).val(value);
	$('.list-b').empty();
	$('.list-b').html('<img src="'+ base_url +'/assets/css/images/loading2.gif" class="location-loader" />');
	$('.list-c').empty();	
	$('.list-c').html('<img src="'+ base_url +'/assets/css/images/loading2.gif" class="location-loader" />');
	$('.list-p').empty();
	$('.list-p').html('<img src="'+ base_url +'/assets/css/images/loading2.gif" class="location-loader" />');
	$('.list-r').empty();
	$('.list-r').html('<img src="'+ base_url +'/assets/css/images/loading2.gif" class="location-loader" />');
}

$('#save-location').off().on('click', function() {
	let brgy = $('#brgy').val();
	let city = $('#city').val();
	let prov = $('#province').val();
	let reg = $('#region').val();

	$.ajax({
		url: base_url + 'Profile/update_location',
		method: 'post',
		data: {brgy: brgy, city: city, prov: prov, reg: reg},
		success: results => {
			$('.toast-area').append('<div class="toast animated fadeInDown" role="alert" aria-live="assertive" data-delay="5000" aria-atomic="true">' +
	                                    '<div class="toast-header">' +
	                                    '<strong class="mr-auto toast-title">Profile</strong>' +
	                                    '<button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">' +
	                                    '<span aria-hidden="true">&times;</span>' +
	                                    '</button>' +
	                                    '</div>' +
	                                    '<div class="toast-body">' +
	                                    'Location updated successfully' +
	                                    '</div>' +
	                                    '</div>');
	        $(".toast").toast('show');
	        
	        $('.toast').on('hidden.bs.toast', function () {
	            $(this).remove();
			});
			
			setTimeout(() => {
				location.reload();
			}, 1500);
		},
		error: (xhr, ajaxOptions, thrownError) => {
			console.error('Error in updating user location: ' + xhr.status + ' => ' + thrownError);
		}
	});
});

$('#cur-pass').keydown(function() {
	setTimeout(() => {
		
	}, 100);
});


var keyInterval;
var keyTime = 0;

 $('.password-input').on('keypress', function() {
	$(this).siblings().addClass('loader');
	$(this).siblings().removeClass('fa-times');
	$(this).siblings().removeClass('fa-check');
	keyTime = 0;
 }).on('keydown', function(e) {
   if (e.keyCode==8)
     $(this).trigger('keypress');
 });

$('.password-input').focus(function() {
	keyInterval = setInterval(() => {
		keyTime++;
		if (keyTime === 1) {
			let id = $(this).attr('id');
			$(this).siblings().removeClass('loader');
			// $(this).siblings().removeClass('fa-times');
			// $(this).siblings().removeClass('fa-check');
			if (id == 'cur-pass') {
				let match = $('#cur-pass').val();
				$('#new-pass').val('');
				$('#conf-pass').val('');
				$('#conf-pass').siblings().removeClass('fa-times');
				$('#new-pass').siblings().removeClass('fa-times');
				$('#conf-pass').siblings().removeClass('fa-check');
				$('#new-pass').siblings().removeClass('fa-check');
				$('#conf-pass').siblings().removeClass('loader');
				$('#new-pass').siblings().removeClass('loader');
				if (match != '') {
					$.ajax({
						url: base_url + 'Profile/match_password',
						method: 'get',
						data: {match: match},
						success: results => {
							$('#cur-pass').siblings().removeClass('loader');
							if (results == 1) {
								$('#cur-pass').siblings().addClass('fa-check');
								$('#cur-pass').siblings().removeClass('fa-times');
								$('#new-pass').removeAttr('disabled');
								$('#new-pass').parent().removeClass('disabled');
							} else {
								$('#cur-pass').siblings().addClass('fa-times');
								$('#cur-pass').siblings().removeClass('fa-check');
								$('#new-pass').attr('disabled', true);
								$('#conf-pass').attr('disabled', true);
								$('#new-pass').parent().addClass('disabled');
								$('#conf-pass').parent().addClass('disabled');
							}
						},
						error: (xhr, ajaxOptions, thrownError) => {
							console.error('Error in matching current password: ' + xhr.status + ' => ' + thrownError);
						}
					});
				} else {
					$('#cur-pass').siblings().removeClass('loader');
					$('#cur-pass').siblings().removeClass('fa-times');
					$('#cur-pass').siblings().removeClass('fa-check');
					$('#new-pass').attr('disabled', true);
					$('#new-pass').parent().addClass('disabled');
				}
			} else if (id == 'new-pass') {
				let val = $('#new-pass').val();
				$('#new-pass').siblings().removeClass('loader');
				$('#conf-pass').val('');
				$('#conf-pass').siblings().removeClass('fa-times');
				$('#conf-pass').siblings().removeClass('fa-check');
				$('#conf-pass').siblings().removeClass('loader');
				if (val != '') {
					$('#new-pass').siblings().addClass('fa-check');
					$('#conf-pass').removeAttr('disabled');
					$('#conf-pass').parent().removeClass('disabled');
				} else {
					$('#conf-pass').attr('disabled', true);
					$('#conf-pass').parent().addClass('disabled');
				}
			} else if (id == 'conf-pass') {
				let match = $('#new-pass').val();
				let val = $('#conf-pass').val();
				$('#new-pass').siblings().removeClass('loader');
				if (val != '') {
					if (val == match) {
						$('#conf-pass').siblings().addClass('fa-check');
						$('#conf-pass').siblings().removeClass('fa-times');
					} else {
						$('#conf-pass').siblings().removeClass('fa-check');
						$('#conf-pass').siblings().addClass('fa-times');
					}
				} else {
					$('#conf-pass').siblings().removeClass('fa-times');
					$('#conf-pass').siblings().removeClass('fa-check');
				}
				
			}
		}
	}, 1000)
});

$('.password-input').focusout(function() {
	$('.password-input').siblings().removeClass('loader');
	clearInterval(keyInterval);
});

$('#save-pass').off().on('click', function() {
	let curPass = $('#cur-pass').siblings().attr('class');
	let newPass = $('#new-pass').siblings().attr('class');
	let confPass = $('#conf-pass').siblings().attr('class');

	let newPassword = $('#new-pass').val();

	if (curPass.search('fa-check') != -1) {
		if (newPass.search('fa-check') != -1) {
			if (confPass.search('fa-check') != -1) {
				$.ajax({
					url: base_url + 'Profile/update_password',
					method: 'post',
					data: {newPass: newPassword},
					success: results => {
						$('.toast-area').append('<div class="toast animated fadeInDown" role="alert" aria-live="assertive" data-delay="5000" aria-atomic="true">' +
	                                    '<div class="toast-header">' +
	                                    '<strong class="mr-auto toast-title">Profile</strong>' +
	                                    '<button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">' +
	                                    '<span aria-hidden="true">&times;</span>' +
	                                    '</button>' +
	                                    '</div>' +
	                                    '<div class="toast-body">' +
	                                    'Password updated successfully' +
	                                    '</div>' +
	                                    '</div>');
				        $(".toast").toast('show');
				        
				        $('.toast').on('hidden.bs.toast', function () {
				            $(this).remove();
				        });

				        $('.password-input').val('');
				        $('.password-input').siblings().removeClass('loader');
				        $('.password-input').siblings().removeClass('fa-check');
				        $('.password-input').siblings().removeClass('fa-times');
				        $('#new-pass').attr('disabled', true);
				        $('#new-pass').parent().addClass('disabled');
				        $('#conf-pass').attr('disabled', true);
				        $('#conf-pass').parent().addClass('disabled');
					},
					error: (xhr, ajaxOptions, thrownError) => {
						console.error('Error on updating password: ' + xhr.status + ' => ' + thrownError);
					}
				})
			}
		}
	}

	
});

$('#delete-btn').off().on('click', function() {
	let fromMonth = $('#delete-fMonth').val();
	let toMonth = $('#delete-tMonth').val();
	let year = $('#delete-year').val();
	if (fromMonth != '' && toMonth != '' && year != '') {
		$.ajax({
			url: base_url + 'Profile/delete_grievance',
			method: 'get',
			data: {fromMonth: fromMonth, toMonth: toMonth, year: year},
			success: result => {
				$('.toast-area').append('<div class="toast animated fadeInDown" role="alert" aria-live="assertive" data-delay="5000" aria-atomic="true">' +
		                                    '<div class="toast-header">' +
		                                    '<strong class="mr-auto toast-title">Profile</strong>' +
		                                    '<button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">' +
		                                    '<span aria-hidden="true">&times;</span>' +
		                                    '</button>' +
		                                    '</div>' +
		                                    '<div class="toast-body">' +
		                                    'Grievance deleted successfully' +
		                                    '</div>' +
		                                    '</div>');
		        $(".toast").toast('show');
		        
		        $('.toast').on('hidden.bs.toast', function () {
		            $(this).remove();
		        });
			},
			error: (xhr, ajaxOptions, thrownError) => {
				console.error('Error in deleting grievance: ' + xhr.status + ' => ' + thrownError);
			}
		})
	}
});