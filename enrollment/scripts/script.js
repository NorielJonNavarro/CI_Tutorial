$(document).ready(function () {
	$('#login_form').on('submit', function (event) {
		event.preventDefault();
		$.ajax({
			url: 'backend/login',
			method: "POST",
			data: $(this).serialize(),
			dataType: "json",
			success: function (response) {
				console.log(response);
				if (response.email === 'not validated') {
					$('#email_error').html('user does not exists');
					$('#password_error').html('');
				} else if (response.email === 'validated' && response.password === 'not validated') {
					$('#password_error').html('Incorrect Password');
				} else if (response.email === 'validated' && response.password === 'validated' && response.user === 'not validated') {
					$('#email_error').html('User is not an admin');
				} else {
					window.location.href = 'backend/home';
				}

				if (response.email === 'validated') {
					$('#email_error').html('');
				}

			}
		});
	});
})