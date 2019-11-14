// ########################################################################
$(document).ready(function () {
	$('#add_student_form').on('submit', function (event) {
		event.preventDefault();
		$.ajax({
			url: 'students/add_student',
			method: "POST",
			data: $(this).serialize(),
			dataType: "json",
			success: function (response) {
				if (response.email === false && response.mobile === false) {
					$('#add_student_email').html('E-mail Address Taken');
					$('#add_student_mobile').html('Mobile Number Taken');
				} else if (response.email === false && response.mobile === true) {
					$('#add_student_email').html('E-mail Address Taken');
					$('#add_student_mobile').html('');
				} else if (response.email === true && response.mobile === false) {
					$('#add_student_email').html('');
					$('#add_student_mobile').html('Mobile Number Taken');
				} else {
					$('#add_student_email').html('');
					$('#add_student_mobile').html('');
					alert('Success');
					window.location.href = '';
				}
			}
		});
	});
})
// ########################################################################
$(document).ready(function () {
	$(document).on('click', '.edit_student', function yes() {
		$('#edit_student_modal').modal('show');
		var student_id = $(this).attr("id");

		$.ajax({
			url: 'students/get_student/' + student_id,
			method: 'POST',
			dataType: 'json',
			success: function (data) {
				$('#student_id').val(data.student_id);
				$('#first_name').val(data.first_name);
				$('#middle_name').val(data.middle_name);
				$('#last_name').val(data.last_name);
				$('#email').val(data.email);
				$('#course').val(data.course);
				$('#mobile_number').val(data.mobile_number);
				$('#province').val(data.province);
				$('#city').val(data.city);
				$('#municipality').val(data.municipality);
				$('#barangay').val(data.barangay);
				$('#street').val(data.street);
				$('#street_number').val(data.street_no);
				$('#guardian_name').val(data.guardian_name);
				$('#relationship').val(data.guardian_relationship);
				$('#guardian_mobile_number').val(data.guardian_no);
				$('#guardian_street_number').val(data.guardian_street_no);
				$('#guardian_street').val(data.guardian_street);
				$('#guardian_barangay').val(data.guardian_barangay);
				$('#guardian_municipality').val(data.guardian_municipality);
				$('#guardian_city').val(data.guardian_city);
				$('#guardian_province').val(data.guardian_province);
				// $('#guardian_address').val(data.guardian_address);
			}
		})
	});
})
// ################################EDIT##################################
$(document).ready(function () {
	$('#edit_student_form').on('submit', function (event) {
		event.preventDefault();
		var student_id = document.getElementById("student_id").value;
		$.ajax({
			url: 'students/edit_student/' + student_id,
			method: "POST",
			data: $(this).serialize(),
			dataType: "json",
			success: function (response) {
				if (response.email === false && response.mobile === false) {
					$('#student_email').html('E-mail Address Taken');
					$('#student_mobile').html('Mobile Number Taken');
				} else if (response.email === false && response.mobile === true) {
					$('#student_email').html('E-mail Address Taken');
					$('#student_mobile').html('');
				} else if (response.email === true && response.mobile === false) {
					$('#student_email').html('');
					$('#student_mobile').html('Mobile Number Taken');
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
//###############################DELETE###################################
$(document).ready(function () {
	$(document).on('click', '.delete_student', function yes() {
		$('#delete_student_modal').modal('show');
		var student_id = $(this).attr("id");

		$.ajax({
			url: 'students/get_student/' + student_id,
			method: 'POST',
			dataType: 'json',
			success: function (data) {
				$('#student_id').val(data.student_id);
				$('#delete_student_name').html(data.first_name);
			}
		})
	})
});
// ############################FUNCTIONS###################################
function student_dir() {
	$(location).attr('href', 'http://enrollment.test/students');
}

function delete_student() {
	var student_id = document.getElementById("student_id").value;
	window.location.href = "students/delete_student/" + student_id;
}
// ########################################################################