$(document).ready(function () {
	$('#login_form').on('submit', function (event) {
		event.preventDefault();
		$.ajax({
			url: 'backend/login',
			method: "POST",
			data: $(this).serialize(),
			dataType: "json",
			success: function (response) {
				if (response.email === true && response.password === true && response.user_type === true) {
					window.location.href = "staffs/";
				} else if (response.email === true && response.password === true && response.user_type === false) {
					$('#user_error').html('User is not admin');
					$('#password_error').html('');
				} else if (response.email === true && response.password === false) {
					$('#user_error').html('');
					$('#password_error').html('Incorrect Password');
				} else {
					$('#user_error').html('E-mail not recognized');
					$('#password_error').html('');
				}
			}
		});
	});
})
