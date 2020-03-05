var base_url = $('#base-url').val();
var userimg = $('#img-user').val();
var userName = $('#name-user').val();
var userLocation = $('#location-user').val();

  
$('#toasts-field').hide();
$('.toast').on('hidden.bs.toast', function () {
	$('#toasts-field').hide();
});

function page(controller) {
	if (controller == 'dashboard_data') {
		$('.nav-dash').addClass('active');
		$('.nav-add').removeClass('active');
		$('.nav-list').removeClass('active');
		window.history.pushState('page2', 'Title', base_url + 'main/dashboard');
		document.title = 'GRTS Dashboard';
	} else if (controller == 'add_grievance_data') {
		$('.nav-dash').removeClass('active');
		$('.nav-add').addClass('active');
		$('.nav-list').removeClass('active');
		window.history.pushState('page2', 'Title', base_url + 'main/add_grievance');
		document.title = 'GRTS Add Grievance';
	} else if (controller == 'view_grievance_data') {
		$('.nav-dash').removeClass('active');
		$('.nav-add').removeClass('active');
		$('.nav-list').addClass('active');
		window.history.pushState('page2', 'Title', base_url + 'main/view_grievance');
		document.title = 'GRTS Grievance List';
	} else if (controller == 'profile_data') {
		$('.nav-dash').removeClass('active');
		$('.nav-add').removeClass('active');
		$('.nav-list').removeClass('active');
		window.history.pushState('page2', 'Title', base_url + 'main/user_profile');
		document.title = 'GRTS User Profile';
	}

	$('#content').html('<img class="loader-img" src="'+ base_url + '/assets/css/images/loading.gif" />');
	
	$.ajax({
		url: base_url + 'main/' + controller,
		dataType: "html",
		cache: true,
		async: true, 
		global: false,
		"throws": true,
		success: function(result) {
			$('#content').html(result);
		},
	});
}

$('#myModal3').on('hidden.bs.modal', function () {
	$('#myModal3 .modal-dialog').removeClass('modal-sm');
})

welcome1();
  
function welcome1() {
	setTimeout(() => {
		let welcome = $('#welcome-trig').val();
		if (welcome == 'True') {
		  $('#welcomeModal').modal('show');
		} else if(userLocation == '') {
		  $('.welcome-field').empty();
		  $('#welcomeModal .modal-title').html('<i class="fas fa-exclamation-triangle text-warning mr-2"></i>Warning')
		  $('#welcomeModal').modal('show');
		  $('#welcomeModal .modal-footer').empty();
		}
	}, 1000);
}