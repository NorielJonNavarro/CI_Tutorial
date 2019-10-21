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
                <button class="btn login-form-button" id="submit" type="submit">Login</button>
            </div>

            <p class="text-center pt-3">Don't have a account?<a href="#"> Register</a></p>
        </div>
    </div>
</div>