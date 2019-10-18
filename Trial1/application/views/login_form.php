<div class="login-body d-flex flex-wrap justify-content-center align-content-center">
    <div class="jumbotron login-form">
        <h1 class="mb-4 text-center">CodeIgniter Tutorial</h1>
        <?php echo form_open('logins/validation');?>
            <div class="form-group">
                <label for="username">Username</label>
                <input id="username" class="form-control" type="text" name="username" placeholder="Username" required>
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" class="form-control" type="password" name="password" placeholder="Password" required>
            </div> 

            <button class="btn btn-primary float-right mt-2">Login</button>
        <p>No Account?<a href="#" data-toggle="modal" data-target="#register"> Register</a></p>
        <?php echo form_close();?>
    </div>
</div>

<div id="register" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="register-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header register-head">
                <h5 class="modal-title" id="my-modal-title">Register</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open('registers/');?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input id="username" class="form-control" type="text" name="username" placeholder="Username" required>
                </div>

                <div class="form-group">
                    <label for="email">E-mail Address</label>
                    <input id="email" class="form-control" type="email" name="email" placeholder="E-mail Address" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" class="form-control" type="password" name="password" placeholder="Password" required>
                </div>

            <div class="form-group">
                    <label for="verifyPassword">Verify Password</label>
                    <input id="verifyPassword" class="form-control" type="password" name="verifyPassword" placeholder="Verify Password" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Register</button>
            </div>
            <?php echo form_close();?>
        </div>
    </div>
</div>