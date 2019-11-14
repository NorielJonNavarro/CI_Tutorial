// ########################################################################
$(document).ready(function () {
	$('#add_course').on('submit', function (event) {
		event.preventDefault();
		$.ajax({
			url: 'courses/add_course',
			method: "POST",
			data: $(this).serialize(),
			dataType: "json",
			success: function (response) {
				console.log(response);
				if (response.description === 0 && response.course_conflict === null 
					&& response.code === 0 && response.time === true && response.schedule === true
					&& response.room === null && response.instructor_conflict === true && response.schedule === true
					&& response.room === null) {
					alert("Succesfully Added a Course")
					window.location.href = 'courses';
				}

				if (response.description === 1 && (response.course_conflict === null || response.course_conflict != null)) {
					$('#description').html('Course description is already taken');
					$('#course-description').css({'border': '1px solid red'});
				}
				else if (response.description != 1 && response.course_conflict != null)
				{
					$('#description').html('Schedule conflict with ' + response.course_conflict);
					$('#course-description').css({'border': '1px solid red'});
					$('#start').css({'border': '1px solid red'});
					$('#end').css({'border': '1px solid red'});
				}
				else
				{
					$('#description').html('');
					$('#course-description').css({'border': '1px solid green'});
					$('#start').css({'border': '1px solid green'});
					$('#end').css({'border': '1px solid green'});
				}

				if (response.code === 1) {
					$('#code').html('Course Code Taken');
					$('#course-code').css({'border': '1px solid red'});
				}
				else
				{
					$('#code').html('');
					$('#course-code').css({'border': '1px solid green'});
				}

				if (response.time === false) {
					$('#time').html('There is something wrong with your time');
					$('#start').css({'border': '1px solid red'});
					$('#end').css({'border': '1px solid red'});
				}
				else
				{
					$('#time').html('');
					$('#start').css({'border': '1px solid green'});
					$('#end').css({'border': '1px solid green'});
				}

				if (response.room_conflict === false) 
				{
					$('#room_conflict').html('Room conflict');
					$('#room_field').css({'border': '1px solid red'});
				}
				else
				{
					$('#room_conflict').html('');	
					$('#room_field').css({'border': '1px solid green'});
				}

				if(response.instructor_conflict === false)
				{
					$('#instructor_field').css({'border': '1px solid red'});
				}
				else
				{
					$('#instructor_field').css({'border': '1px solid green'});
				}


				if (response.schedule === false) 
				{
					$('#schedule').html('You must select at least one day');
				}
				else
				{
					$('#schedule').html('');	
				}
			}
		});
	});
})
// ########################################################################
$(document).ready(function () {
	$(document).on('click', '.edit_course', function () {
		$('#edit-course').modal('show');
		var course_id = $(this).attr("id");
		$.ajax({
			url: 'courses/get_course/' + course_id,
			method: 'POST',
			dataType: 'json',
			success: function (data) {
				$('#edit-course-id').val(data.course_id);
				$('#units').val(data.unit);
				$('#course_description').val(data.course_description);
				$('#course_code').val(data.course_code);
				$('#instructor').val(data.instructor);
				$('#room').val(data.room);
				$('#start_time').val(data.start);
				$('#end_time').val(data.end);
			}
		})
	});
});
// ########################################################################
$(document).ready(function () {
	$('#edit_course').on('submit', function (event) {
		event.preventDefault();
		var course_id = document.getElementById("edit-course-id").value;
		$.ajax({
			url: 'courses/edit_course/' + course_id,
			method: "POST",
			data: $(this).serialize(),
			dataType: "json",
			success: function (response) {
				if (response.code !== true && response.description !== true && response.time !== true && response.data === 0) {
					alert('Success');
					console.log(response)
					window.location.href = 'courses';
				}

				if (response.time === true) {
					$('#error_time').html('There is something wrong with your time');
				}

				if (response.time !== true) {
					$('#error_time').html('');
				}
				

				if (response.description === true && response.data === 0) {
					$('#description_error').html('Course description is already taken');
				}

				if (response.description !== true) {
					$('#description_error').html('');
				}

				if (response.code === true) {
					$('#error_code').html('Course Code Taken');
					console.log(response)
				}

				if (response.code !== true) {
					$('#code_course').html('');
				}


				if (response.description != true && response.data === 1) {
					$('#error_room').html('Room and time conflict');
				}

				if (response.description != true && response.data === 0) {
					$('#error_room').html('');
				}
			}
		});
	});
})
//#########################################################################
$(document).ready(function () {
	$(document).on('click', '.delete_course', function yes() {
		$('#delete_course_modal').modal('show');
		var course_id = $(this).attr("id");

		$.ajax({
			url: 'courses/get_course/' + course_id,
			method: 'POST',
			dataType: 'json',
			success: function (data) {
				$('#course_id').val(data.course_id);
				$('#delete_course_description').html(data.course_description);
			}
		})
	})
});
// ########################################################################
function delete_course() {
	var course_id = document.getElementById("course_id").value;
	window.location.href = "courses/delete_course/" + course_id;
}
// ########################################################################
function course_dir() {
	$(location).attr('href', 'http://enrollment.test/courses')
}
// ########################################################################
$(document).ready(function () {
	$('#search_student_form').on('submit', function (event) {
		event.preventDefault();
		$.ajax({
			url: '../search_student',
			method: "POST",
			data: $(this).serialize(),
			dataType: "json",
			success: function (response) {
				if(response.error)
				{
					$('#search_content').empty(); 
					$('#search_students').css({'visibility': 'hidden'});
					$('#search_error').html('You must fill at least one search field');
				}
				else
				{
					if(response.length === 0)
					{
						$('#search_error').html('No match found');
					}
					else
					{
						$('#search_error').html('');
						$('#search_content').empty(); 
						$('#search_students').css({'visibility': 'visible'});
						var student_list = '';
						$(response).each(function(index, students){
							student_list += '<tr>';
							student_list += '<td>' + students.student_id + '</td>';
							student_list += '<td>' + students.first_name + '</td>';
							student_list += '<td>' + students.middle_name + '</td>';
							student_list += '<td>' + students.last_name + '</td>';
							student_list += '<td>' + students.course + '</td>';
							student_list += '<td>' + students.unit + '</td>';
							student_list += '<td class="text-center"><a href="#" class="enroll_student" id="'+ students.student_id +'"><i class="fas fa-user-plus fa-lg"></i></a></td>';
							student_list += '</tr>';
						});
						$('#search_students').append(student_list);
					}
				}
			}
		});
	});

	$(document).on('click', '.enroll_student', function () {
		var student_id = $(this).attr("id");
		var course_id = document.getElementById("course_number").value;
		var instructor_id = document.getElementById("instructor_number").value;
		var data = 'course_id=' + course_id + '&instructor_id=' + instructor_id + '&student_id=' + student_id;
		// $('#'+ student_id + '').unbind().click(function(event) {
			event.preventDefault();
			$.ajax({
				url: '../enroll_student',
				method: "POST",
				data: data,
				dataType: "json",
				success: function (response) {

					if(response.student_error === true && response.result === 0 && response.validate_units < 24 && response.no_of_students <= response.max)
					{
						alert('Student is already enrolled');
						console.log(response);
					}
					else if (response.student_error === false && response.result === 1 && response.validate_units < 24 && response.no_of_students <= response.max)
					{
						alert('Schedule Conflict');
						console.log(response);
					}
					else if (response.student_error === false && response.result === 0 && response.validate_units > 24 && response.no_of_students <= response.max)
					{
						alert('Unit Overload');
						console.log(response);
					}

					else if (response.student_error === false && response.result === 0 && response.validate_units < 24 && response.no_of_students >= response.max)
					{
						alert('Course is already full');
						console.log(response);
					}
					else
					{
						alert('Student is successfully enrolled');
						console.log(response);
					}

				}
			});
		// })
	});
	
	$('#enroll-student').on('hidden.bs.modal', function () { 
		location.reload();
	});
})