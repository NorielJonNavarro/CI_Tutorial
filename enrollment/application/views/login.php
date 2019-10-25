<div class="login-page d-flex flex-wrap justify-content-center align-content-center">
	<div class="login-form">
		<div class="login-form-header d-flex justify-content-center">
            <i class="fas fa-user fa-3x flex-wrap d-flex align-items-center justify-content-center rounded-circle login-icon"></i>
            <span class="incorrect" id="user_error"></span>
		</div>

		<div class="login-form-body">
			<h1 id="error-message"></h1>
			<?php echo form_open('backend/login', array('id' =>'login_form')) ?>
			<div class="form-group mb-4">
				<i class="fas fa-envelope fa user-icon"></i>
				<input id="email" class="form-control" type="email" name="email" required>
				<span class="incorrect" id="email_error"></span>
			</div>
			<div class="form-group">
				<i class="fas fa-unlock user-icon"></i>
                <input id="password" class="form-control" type="password" name="password" required>
                <span class="incorrect" id="password_error"></span>
			</div>
			<div class="d-flex justify-content-center pt-3">
				<button class="btn btn-primary login-button" id="login" type="submit">Login</button>
			</div>
			<?php echo form_close()?>
		</div>
	</div>
</div>
