$(document).ready(function () {
	$('#staffTable').DataTable({
		rowReorder: true,
		initComplete: function () {
			self = this.api(),
				$addStaff = $('<button type="button" class="btn add-staff-button ml-2" data-toggle="modal" data-target="#add-staff"><i class="fas fa-user-plus"></i></button>')
			$('.dataTables_filter').append($addStaff);
		}
	});
});

$(document).ready(function () {
	$('#studentTable').DataTable({
		rowReorder: true,
		initComplete: function () {
			self = this.api(),
				$addStudent = $('<button type="button" class="btn add-student-button ml-2" data-toggle="modal" data-target="#add-student"><i class="fas fa-user-plus"></i></button>')
			$('.dataTables_filter').append($addStudent);
		}
	});
});

$(document).ready(function () {
	$('#coursesTable').DataTable({
		rowReorder: true,
		initComplete: function () {
			self = this.api(),
				$addCourses = $('<button type="button" class="btn add-course ml-2" data-toggle="modal" data-target="#add-course"><i class="far fa-calendar-plus"></i></button>')
			$('.dataTables_filter').append($addCourses);
		}
	});
});

$(document).ready(function () {
	$('#enrollmentTable').DataTable({
		rowReorder: true,
		initComplete: function () {
			self = this.api(),
				$addCourses = $('<button type="button" class="btn btn-primary ml-2" data-toggle="modal" data-target="#enroll-student"><i class="fas fa-user-plus"></i></button>')
			$('.dataTables_filter').append($addCourses);
		}
	});
});

$(document).ready(function () {
	$('#search_students').DataTable({
		"searching": false,
		"ordering": false
	});
});