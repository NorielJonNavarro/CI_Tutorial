<div id="add-student" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="add-student-title"
	aria-hidden="true">
	<div class="modal-dialog student-form" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="add-student-title">Add Student</h5>
				<button class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?= form_open('backend/add_student', array('id' => 'add_student_form'))?>
			<div class="modal-body">
				<div class="container row">
					<div class="d-flex flex-column col-6">
						<div class="d-flex">
							<h2>User's Information</h2>
						</div>

						<div class="d-flex">
							<div class="form-group">
								<input id="first-name" class="form-control" name="firstName" type="text"
									placeholder="First Name" required>
							</div>

							<span class="ml-1 mr-1"></span>

							<div class="form-group">
								<input id="middle-name" class="form-control" name="middleName" type="text"
									placeholder="Middle Name">
							</div>

							<span class="ml-1 mr-1"></span>

							<div class="form-group">
								<input id="last-name" class="form-control" name="lastName" type="text"
									placeholder="Last Name" required>
							</div>
						</div>

						<div class="d-flex">
							<div class="form-group flex-fill">
								<input id="email" class="form-control" name="email" type="email"
									placeholder="E-mail Address" required>
							</div>

							<span class="ml-1 mr-1"></span>

							<div class="form-group flex-fill">
								<input id="password" class="form-control" name="password" type="text"
									placeholder="Password" required>
							</div>
						</div>

						<div class="d-flex">
							<div class="form-group flex-fill">
								<input id="course" class="form-control" name="course" type="text" placeholder="Course"
									required>
							</div>
						</div>
						<div class="d-flex">
							<div class="form-group flex-fill">
								<input id="mobile-number" class="form-control" name="mobileNumber" type="text"
									placeholder="Mobile No." required>
							</div>
						</div>

						<div class="d-flex">
							<h3>Address</h3>
						</div>

						<div class="d-flex">
							<div class="form-group flex-fill">
								<input id="province" class="form-control" name="province" type="text"
									placeholder="Province" required>
							</div>

							<span class="ml-1 mr-1"></span>

							<div class="form-group flex-fill">
								<input id="city" class="form-control" name="city" type="text" placeholder="City">
							</div>
						</div>

						<div class="d-flex">
							<div class="form-group flex-fill">
								<input id="municipality" class="form-control" name="guardianMunicipality" type="email"
									placeholder="Municipality">
							</div>

							<span class="ml-1 mr-1"></span>

							<div class="form-group flex-fill">
								<input id="barangay" class="form-control" name="guardianBarangay" type="email"
									placeholder="Barangay">
							</div>

							<span class="ml-1 mr-1"></span>

							<div class="form-group flex-fill">
								<input id="street" class="form-control" name="guardianStreet" type="email"
									placeholder="Street">
							</div>

							<span class="ml-1 mr-1"></span>

							<div class="form-group flex-fill">
								<input id="street-no" class="form-control" name="guardianStreetNo" type="email"
									placeholder="Street No.">
							</div>
						</div>
					</div>

					<!-- Guardian's Information -->

					<div class="d-flex flex-column col-6">
						<div class="d-flex">
							<h2>Guardian's Information</h2>
						</div>

						<div class="d-flex">
							<div class="form-group">
								<input id="first-name" class="form-control" name="guardianFirstName" type="text"
									placeholder="First Name" required>
							</div>

							<span class="ml-1 mr-1"></span>

							<div class="form-group">
								<input id="middle-name" class="form-control" name="guardianMiddleName" type="text"
									placeholder="Middle Name">
							</div>

							<span class="ml-1 mr-1"></span>

							<div class="form-group">
								<input id="last-name" class="form-control" name="guardianLastName" type="text"
									placeholder="Last Name" required>
							</div>
						</div>

						<div class="d-flex">
							<div class="form-group flex-fill">
								<input id="relationship" class="form-control" name="relationship" type="text"
									placeholder="Relationship" required>
							</div>
						</div>

						<div class="d-flex">
							<div class="form-group flex-fill">
								<input id="mobile-number" class="form-control" name="guardianMobileNumber" type="text"
									placeholder="Mobile No." required>
							</div>
						</div>

						<div class="d-flex">
							<h3>Address</h3>
						</div>

						<div class="d-flex">
							<div class="form-group flex-fill">
								<input id="province" class="form-control" name="guardianProvince" type="text"
									placeholder="Province" required>
							</div>

							<span class="ml-1 mr-1"></span>

							<div class="form-group flex-fill">
								<input id="city" class="form-control" name="guardianCity" type="text" placeholder="City">
							</div>
						</div>

						<div class="d-flex">
							<div class="form-group flex-fill">
								<input id="municipality" class="form-control" name="guardianMunicipality" type="text"
									placeholder="Municipality">
							</div>

							<span class="ml-1 mr-1"></span>

							<div class="form-group flex-fill">
								<input id="barangay" class="form-control" name="guardianBarangay" type="text"
									placeholder="Barangay">
							</div>

							<span class="ml-1 mr-1"></span>

							<div class="form-group flex-fill">
								<input id="street" class="form-control" name="guradianStreet" type="text" placeholder="Street">
							</div>

							<span class="ml-1 mr-1"></span>

							<div class="form-group flex-fill">
								<input id="street-no" class="form-control" name="guardianStreetNo" type="text"
									placeholder="Street No.">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-success">
					Add
				</button>
			</div>
			<?= form_close()?>
		</div>
	</div>
</div>
