<div id="add-student" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">Add Student</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('backend/add_student/')?>
            <div class="modal-body">
                <div class=" d-flex justify-content-center">
                    <div class="form-group">
                        <input id="first_name" class="form-control" type="text" name="firstName" placeholder="First Name">
                    </div>
                    
                    <span class="ml-1 mr-1"></span>

                    <div class="form-group">
                        <input id="middle_name" class="form-control" type="text" name="middleName" placeholder="Middle Name">
                    </div>
                        
                    <span class="ml-1 mr-1"></span>
                    
                    <div class="form-group">
                        <input id="last_name" class="form-control" type="text" name="lastName" placeholder="Last Name">
                    </div>
                </div>

                <div class="d-flex">
                    <div class="form-group flex-fill">
                        <input id="email" class="form-control" type="text" name="email" placeholder="E-mail Address">
                    </div>
                    
                    <span class="ml-1 mr-1"></span>

                    <div class="form-group flex-fill">
                        <input id="password" class="form-control" type="text" name="password" placeholder="Password">
                    </div>
                </div>
                
                <div class="form-group">
                    <input id="position" class="form-control" type="text" name="position" placeholder="Position">
                </div>
            </div>
            
            <div class="modal-footer">
                <div>
                    <button class="btn submit-edit" type="submit">Submit</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Close</button>
                </div>
            </div>
            <?= form_close();?>
        </div>
    </div>
</div>