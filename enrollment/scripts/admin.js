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
				if (response.phone === 'exists') {
					$('#phone_error').html('Phone Number Taken');
				}
				
				if (response.email != 'exists') {
					$('#email_error').html('');
				}
				
				if (response.phone != 'exists') {
					$('#phone_error').html('');
				} 
				if(response.phone === 'available' && response.phone === 'available'){
					alert('Success');
					window.location.href = 'home';
				}
				
			}
		});
	});
})
