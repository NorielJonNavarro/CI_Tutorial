<div id="delete_student_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body d-flex justify-content-center">
                <p>Are you sure you want to delete <span id="delete_student_name"></span> on the student's list?</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" id="student_id" onclick="delete_student()">
                    Yes
                </button>
                <button class="btn btn-danger" data-dismiss="modal" aria-label="Close">
                    No
                </button>
            </div>
        </div>
    </div>
</div>