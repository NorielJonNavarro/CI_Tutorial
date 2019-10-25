<div id="add-staff" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content add-staff">
            <div class="modal-header add-staff-header">
                <h5 class="modal-title" id="my-modal-title">Add Staff</h5>
            </div>
            <?= form_open('backend/add_staff', array('id' => 'add_staff_form'))?>
            <div class="modal-body add-staff-body">
                <div class="justify-content-center">
                    <div class="form-group">
                        <input id="first_name" class="form-control" type="text" name="firstName" placeholder="First Name" required>
                    </div>

                    <div class="form-group">
                        <input id="middle_name" class="form-control" type="text" name="middleName" placeholder="Middle Name" required>
                    </div>
                    
                    <div class="form-group">
                        <input id="last_name" class="form-control" type="text" name="lastName" placeholder="Last Name" required>
                    </div>

                    <div class="form-group flex-fill">
                        <input id="phone" class="form-control" type="text" name="phone" placeholder="Phone Number" required>
                        <span class="incorrect" id="phone_error"></span>
                    </div>
                </div>

                <div class="d-flex">
                    <div class="form-group flex-fill">
                        <input id="email" class="form-control" type="text" name="email" placeholder="E-mail Address" required>
                        <span class="incorrect" id="email_error"></span>
                    </div>
                    
                    <span class="ml-1 mr-1"></span>

                    <div class="form-group flex-fill">
                        <input id="password" class="form-control" type="text" name="password" placeholder="Password" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <input id="position" class="form-control" type="text" name="position" placeholder="Position" required>
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