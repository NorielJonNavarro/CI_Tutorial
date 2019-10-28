<div id="add-staff" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content add-staff">
			<div class="modal-header add-staff-header">
				<h5 class="modal-title" id="my-modal-title">Add Staff</h5>
			</div>
			<?= form_open('backend/add_staff', array('id' => 'add_staff_form'))?>
			<div class="modal-body add-staff-body">
				<h2>Personal Information</h2>
				<div class="d-flex">
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
						<input id="last_name" class="form-control" type="text" name="lastName" placeholder="Last Name"
							required>
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
						<input id="password" class="form-control" type="text" name="password" placeholder="Password" minlength="8" required>
					</div>
				</div>

				<div class="d-flex">
					<div class="form-group flex-fill">
						<input id="mobile" class="form-control" type="text" name="mobile" placeholder="Mobile Number" minlength="11" maxlength="11" required>
						<span class="incorrect" id="mobile_error"></span>
					</div>

                    <span class="ml-1 mr-1"></span>

					<div class="form-group flex-fill">
						<input id="position" class="form-control" type="text" name="position" placeholder="Position"
							required>
					</div>
				</div>

				<h2>Address</h2>
				<div class="justify-content-center d-flex">
					<div class="form-group">
						<input id="province" class="form-control" type="text" name="province" placeholder="Province"
							required>
					</div>

					<span class="ml-1 mr-1"></span>

					<div class="form-group">
						<input id="city" class="form-control" type="text" name="city" placeholder="city" required>
					</div>

					<span class="ml-1 mr-1"></span>
					<div class="form-group">
						<input id="municipality" class="form-control" type="text" name="municipality"
							placeholder="Municipality" required>
					</div>
				</div>

				<div class="row">
					<div class="form-group col-5">
						<input id="barangay" class="form-control" type="text" name="barangay" placeholder="Barangay"
							required>
					</div>

					<span class=""></span>

					<div class="form-group col-4">
						<input id="street" class="form-control" type="text" name="street" placeholder="Street" required>
					</div>

					<span class=""></span>

					<div class="form-group col-3">
						<input id="streetNo" class="form-control" type="text" name="streetNo" placeholder="Street No"
							required>
					</div>
				</div>
			</div>

			<div class="modal-footer">
				<div>
					<button class="btn btn-success" type="submit">Submit & Close</button>
					<button class="btn btn-primary" type="button">Add another</button>
				</div>
			</div>
			<?= form_close();?>
		</div>
	</div>
</div>
