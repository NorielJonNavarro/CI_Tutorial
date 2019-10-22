<div class="login d-flex flex-wrap justify-content-center align-content-center">
    <div class="login-form">
        <div class="login-form-header d-flex justify-content-center">
            <i class="fas fa-user fa-3x flex-wrap d-flex align-items-center justify-content-center rounded-circle"></i>    
        </div>
        
        <div class="login-form-body">
            <?php echo form_open('backend/login') ?>
                <div class="form-group d-flex">
                    <i class="fas fa-envelope fa user-icon"></i>    
                    <input id="email" class="form-control" type="email" name="email" required>
                </div>

                <div class="form-group">
                    <i class="fas fa-unlock user-icon"></i>
                    <input id="my-input" class="form-control" type="password" name="password" required>
                </div>

                <div class="d-flex justify-content-center pt-3">
                    <button class="btn btn-primary login-button" id="validate" type="submit">Login</button>
                </div>                
            <?php echo form_close()?>
        </div>
    </div>
</div>