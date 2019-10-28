$(document).ready(function () {
	$('#staffTable').DataTable();
	$('#studentTable').DataTable();
	$('#coursesTable').DataTable();
});

$(document).ready(function () {
	$('#add_staff_form').on('submit', function (event) {
		event.preventDefault();
		$.ajax({
			url: 'add_staff',
			method: "POST",
			data: $(this).serialize(),
			dataType: "json",
			success: function (response) {
				if (response.email === 'exists') {
					$('#email_error').html('E-mail Address Taken');
				}
				if (response.mobile === 'exists') {
					$('#mobile_error').html('Mobile Number Taken');
				}
				
				if (response.email != 'exists') {
					$('#email_error').html('');
				}
				
				if (response.mobile != 'exists') {
					$('#mobile_error').html('');
				} 
				if(response.mobile === 'available' && response.mobile === 'available'){
					alert('Success');
					window.location.href = 'home';
				}
				
			}
		});
	});
})


$(document).ready(function () {
	$('#add_staff_form').on('submit', function (event) {
		event.preventDefault();
		$.ajax({
			url: 'add_staff',
			method: "POST",
			data: $(this).serialize(),
			dataType: "json",
			success: function (response) {
				if (response.email === 'exists') {
					$('#email_error').html('E-mail Address Taken');
				}
				if (response.mobile === 'exists') {
					$('#mobile_error').html('Mobile Number Taken');
				}
				
				if (response.email != 'exists') {
					$('#email_error').html('');
				}
				
				if (response.mobile != 'exists') {
					$('#mobile_error').html('');
				} 
				if(response.mobile === 'available' && response.mobile === 'available'){
					alert('Success');
					window.location.href = 'home';
				}
				
			}
		});
	});
})


