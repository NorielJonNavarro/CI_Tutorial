<div class="d-flex flex-wrap justify-content-center align-content-center login-body">
    <div class="jumbotron login-form">
    <?php echo form_open('auths/authenticate');?>
        <div class="login-form-header">
            <h1 class="text-center">User Login</h1>
        </div>
        <div class="login-form-body">
            <div class="form-group">
                <input id="username" class="form-control" type="text" name="username" placeholder="Username" required>
            </div>

            <div class="form-group">
                <input id="password" class="form-control" type="password" name="password" placeholder="Password" required>
            </div>
            <p id="validate" class="validate text-center"></p>

            <div id="login"></div>
            <div class="d-flex justify-content-center mt-4">
                <button class="btn form-button" id="submit" type="submit">Login</button>
            </div>

            <p class="text-center pt-3">Don't have a account?<a href="#register" data-toggle="modal"> Register</a></p>
        </div>
        <?php echo form_close();?>
    </div>
</div>

<div id="register" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered try" role="document">
        <div class="modal-content">
            <div class="modal-body register-form">
            <?php echo form_open('auths/register');?>
        <div class="register-form-header">
            <h1 class="text-center">User Register</h1>
        </div>
        <div class="register-form-body">
            <div class="form-group">
                <input id="username" class="form-control" type="text" name="username" placeholder="Username" required>
            </div>

            <div class="form-group">
                <input id="email" class="form-control" type="text" name="email" placeholder="E-mail Address" required>
            </div>

            <div class="form-group">
                <input id="password" class="form-control" type="password" name="password" placeholder="Password" required>
            </div>

            <div class="form-group">
                <input id="verifyPassword" class="form-control" type="password" name="verifyPassword" placeholder="Verify Password" required>
            </div>

            <div id="register"></div>
            <div class="d-flex justify-content-center mt-4">
                <button class="btn form-button" id="submit" type="submit">Register</button>
            </div>
        </div>
        <?php echo form_close();?>
            </div>
        </div>
    </div>
</div>