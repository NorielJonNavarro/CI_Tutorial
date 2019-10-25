<table class="table table-light" id="staffMemberTable">
    <button class="btn btn-primary float-right mb-2" type="button" data-toggle='modal' data-target="#create-staff">Add User</button>
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Last Name</th>
            <th>E-Mail</th>
            <th>Position</th>
            <th></th>
        </tr>
    </thead>
    
    <tbody>
        <?php
            foreach($staffs as $staff_information){
                echo '<tr>';
                echo "<td>".$staff_information['staff_id']."</td>";
                echo "<td>".$staff_information['first_name']."</td>";
                echo "<td>".$staff_information['middle_name']."</td>";
                echo "<td>".$staff_information['last_name']."</td>";
                echo "<td>".$staff_information['email']."</td>";
                echo "<td>".$staff_information['position']."</td>";
                echo "<td>
                        <a href='".base_url()."backend/get_staff/".$staff_information['staff_id']."' onclick='getStaff()'><i class='fas fa-user-edit fa-lg mr-2 edit-button' data-toggle='modal' href='#edit-staff'></i></>
                        <a data-toggle='modal' href='#delete-staff'><i class='fas fa-user-minus fa-lg delete-button'></i></a>
                        </td>";
                echo "</tr>";
            }
        ?>
    </tbody>
</table>






























<!-- <div id="create-staff" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog d-flex" role="document">
        <div class="modal-content edit-form edit-content">
            <div class="modal-header edit-form-header d-flex justify-content-center">
                <h1 class="">Add Staff</h1>
            </div>
            
            <?= form_open('backend/add_staff/')?>
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
</div>

<div id="edit-staff" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog d-flex" role="document">
        <div class="modal-content edit-form edit-content">
            <div class="modal-header edit-form-header d-flex justify-content-center">
                <h1 class="">Edit User's Information</h1>
            </div>
            
            <?= form_open('backend/update_staff/'.$staff_information['staff_id'])?>
            <div class="modal-body">
                <div class=" d-flex justify-content-center">
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input id="first_name" class="form-control" type="text" name="firstName" value="<?= $staff_information['first_name']?>" readonly>
                    </div>
                    
                    <span class="ml-1 mr-1"></span>

                    <div class="form-group">
                        <label for="middle_name">Middle Name</label>
                        <input id="middle_name" class="form-control" type="text" name="middleName" value="<?= $staff_information['middle_name']?>" readonly>
                    </div>
                        
                    <span class="ml-1 mr-1"></span>
                    
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input id="last_name" class="form-control" type="text" name="lastName" value="<?= $staff_information['last_name']?>" readonly>
                    </div>
                </div>

                <div class="d-flex">
                    <div class="form-group">
                        <label for="email">E-mail Adress</label>
                        <input id="email" class="form-control" type="text" name="email" value="<?= $staff_information['email']?>">
                    </div>
                    
                    <span class="ml-1 mr-1"></span>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input id="password" class="form-control" type="text" name="lastName">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="position">Position</label>
                    <input id="position" class="form-control" type="text" name="position" value="<?= $staff_information['position']?>">
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
</div>

<div id="delete-staff" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Are you sure?</h3>
            </div>
        
            <div class="modal-body d-flex justify-content-center">
                <button class="btn submit-edit" type="button" href="<?=base_url()?>backend/delet_staff"><a href="<?=base_url()?>backend/delete_staff/<?=$staff_information['staff_id']?>" style="color:white;">Yes</a></button>
                <span class="ml-1 mr-1"></span>
                <button class="btn btn-danger" type="button" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div> -->
