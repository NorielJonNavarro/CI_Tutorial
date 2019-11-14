// ########################################################################
$(document).ready(function () {
	$('#staff_form_submit').on('submit', function (event) {
		event.preventDefault();
		$.ajax({
			url: 'add_staff',
			method: "POST",
			data: $(this).serialize(),
			dataType: "json",
			success: function (response) {
				if (response.email === 'exists' && response.mobile === 'exists') {
					$('#email_error1').html('E-mail Address Taken');
					$('#mobile_error1').html('Mobile Number Taken');
				} else if (response.email === 'exists' && response.mobile === 'available') {
					$('#email_error1').html('E-mail Address Taken');
					$('#mobile_error1').html('');
				} else if (response.email === 'available' && response.mobile === 'exists') {
					$('#email_error1').html('');
					$('#mobile_error1').html('Mobile Number Taken');
				} else {
					alert('Successfully added staff');
					window.location.href = '';
				}
			},
			error: function(response) {
				console.log(response)
			}
		});
	})
})
// ########################################################################


$(document).ready(function () {
	$(document).on('click', '.edit_staff', function() {
		$('#edit_staff_modal').modal('show');
		var staff_id = $(this).attr("id");

		$.ajax({
			url: 'get_staff/' + staff_id,
			method: 'POST',
			dataType: 'json',
			success: function (data) {
				$('#staff_id').val(data.staff_id);
				$('#first_name').val(data.first_name);
				$('#middle_name').val(data.middle_name);
				$('#last_name').val(data.last_name);
				$('#email').val(data.email);
				$('#mobile').val(data.mobile_number);
				$('#position').val(data.position);
				$('#province').val(data.province);
				$('#city').val(data.city);
				$('#municipality').val(data.municipality);
				$('#barangay').val(data.barangay);
				$('#street').val(data.street);
				$('#streetNo').val(data.street_no);
			}
		})
	});
})
// ########################################################################
$(document).ready(function () {
	$('#edit_staff_form').on('submit', function (event) {
		event.preventDefault();
		var staff_id = document.getElementById("staff_id").value;
		$.ajax({
			url: 'edit_staff/' + staff_id,
			method: "POST",
			data: $(this).serialize(),
			dataType: "json",
			success: function (response) {
				if (response.email === false && response.mobile === false) {
					$('#email_error').html('E-mail Address Taken');
					$('#mobile_error').html('Mobile Number Taken');
				} else if (response.email === false && response.mobile === true) {
					$('#email_error').html('E-mail Address Taken');
					$('#mobile_error').html('');
				} else if (response.email === true && response.mobile === false) {
					$('#email_error').html('');
					$('#mobile_error').html('Mobile Number Taken');
				} else {
					$('#email_error').html('');
					$('#mobile_error').html('');
					alert('Successfully Edited');
					window.location.href = '';
				}
			}
		});
	});
});
// ########################################################################
$(document).ready(function () {
	$(document).on('click', '.delete_staff', function () {
		$('#delete_staff_modal').modal('show');
		var staff_id = $(this).attr("id");

		$.ajax({
			url: 'get_staff/' + staff_id,
			method: 'POST',
			dataType: 'json',
			success: function (data) {
				$('#staff_id').val(data.staff_id);
				$('#delete_staff_name').html(data.first_name);
			}
		})
	})
});
// ########################################################################
function delete_staff() {
	var staff_id = document.getElementById("staff_id").value;
	window.location.href = "delete_staff/" + staff_id;
}













// ########################################################################

// function add_another() {
// 	$('#add_staff_form').on('submit', function (event) {
// 		event.preventDefault();
// 		$.ajax({
// 			url: 'add_staff',
// 			method: "POST",
// 			data: $(this).serialize(),
// 			dataType: "json",
// 			success: function (response) {
// 				if (response.email === 'exists' && response.mobile === 'exists') {
// 					$('#email_error1').html('E-mail Address Taken');
// 					$('#mobile_error1').html('Mobile Number Taken');
// 				} else if (response.email === 'exists' && response.mobile === 'available') {
// 					$('#email_error1').html('E-mail Address Taken');
// 					$('#mobile_error1').html('');
// 				} else if (response.email === 'available' && response.mobile === 'exists') {
// 					$('#email_error1').html('');
// 					$('#mobile_error1').html('Mobile Number Taken');
// 				} else {
// 					alert('Successs');
// 					document.getElementById("add_staff_form").reset();
// 				}
// 			}
// 		});
// 	})
// }

// ########################################################################