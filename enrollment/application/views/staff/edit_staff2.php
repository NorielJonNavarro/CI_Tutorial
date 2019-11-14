<div id="edit_staff_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content edit-staff">
			<?=form_open('staffs/edit_staff/', array('id' => 'edit_staff_form'))?>
			<div class="modal-header edit-staff-header">
				<h3 class="modal-title" id="my-modal-title">Edit Staff</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body edit-staff-body">
				<div class="personal-information">
					<h2>Personal Information</h2>
					<div class="d-flex">
						<div class="form-group">
							<input id="staff_id" class="form-control-plaintext staff_id" type="text" name="staffID">
						</div>

						<div class="form-group">
							<input id="first_name" class="form-control" type="text" name="firstName"
								placeholder="First Name" required>
						</div>

						<span class="ml-1 mr-1"></span>

						<div class="form-group">
							<input id="middle_name" class="form-control" type="text" name="middleName"
								placeholder="Middle Name" required>
						</div>

						<span class="ml-1 mr-1"></span>
						<div class="form-group">
							<input id="last_name" class="form-control" type="text" name="lastName"
								placeholder="Last Name" required>
						</div>
					</div>

					<div class="d-flex">
						<div class="form-group flex-fill">
							<input id="email" class="form-control" type="text" name="email" placeholder="E-mail Address"
								required>
							<span class="incorrect" id="email_error"></span>
						</div>

						<span class="ml-1 mr-1"></span>

						<div class="form-group flex-fill">
							<input id="password" class="form-control" type="text" name="password" placeholder="Password"
								minlength="8">
						</div>
					</div>

					<div class="d-flex">
						<div class="form-group flex-fill">
							<input id="mobile" class="form-control" type="text" name="mobile"
								placeholder="Mobile Number" minlength="11" maxlength="11" required>
							<span class="incorrect" id="mobile_error"></span>
						</div>

						<span class="ml-1 mr-1"></span>

						<div class="form-group flex-fill">
							<input id="position" class="form-control" type="text" name="position" placeholder="Position"
								required>
						</div>
					</div>
				</div>

				<div class="address">
					<h2>Address</h2>
					<div class="d-flex">
						<div class="form-group flex-fill">
							<input id="streetNo" class="form-control street-number" type="text" name="streetNo"
								placeholder="Street No" required>
						</div>

						<span class="ml-1 mr-1"></span>

						<div class="form-group flex-fill">
							<input id="street" class="form-control" type="text" name="street" placeholder="Street"
								required>
						</div>
						
						<span class="ml-1 mr-1"></span>

						<div class="form-group flex-fill">
							<input id="barangay" class="form-control" type="text" name="barangay" placeholder="Barangay"
								required>
						</div>
					</div>
					<div class="justify-content-center d-flex">
						<div class="form-group">
							<input id="municipality" class="form-control" type="text" name="municipality"
								placeholder="Municipality" required>
						</div>					

						<span class="ml-1 mr-1"></span>

						<div class="form-group">
							<input id="city" class="form-control" type="text" name="city" placeholder="city" required>
						</div>

						<span class="ml-1 mr-1"></span>

						<div class="form-group">
							<input id="province" class="form-control" type="text" name="province" placeholder="Province"
								required>
						</div>						
					</div>
				</div>
			</div>

			<div class="modal-footer">
				<div>
					<button class="btn btn-success" type="submit">Submit</button>
				</div>
			</div>
			<?= form_close();?>
		</div>
	</div>
