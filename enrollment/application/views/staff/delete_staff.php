<div id="delete_staff" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog try" role="document">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-center delete-header">
                <h3>Are you sure?</h3>
            </div>
            <div class="modal-body d-flex justify-content-center">
                <button class="btn btn-success mr-1" href="<?base_url()?>/backend/delete_staff/<?$row['staff_id']?>">Yes</button>
                <button class="btn btn-danger ml-1" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>