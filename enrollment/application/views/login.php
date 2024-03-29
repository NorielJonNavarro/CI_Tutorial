<div class="container-fluid login-container d-flex flex-wrap align-content-center">
	<div class="container login-form">
		<div class="login-form-header d-flex justify-content-center mb-4">
			<i class="fas fa-user fa-3x login-icon rounded-circle d-flex flex-wrap justify-content-center align-content-center"></i>
		</div>

		<div class=login-form-body>
		<?php echo form_open('backend/login', array('id' =>'login_form'))?>			
			<div class="form-group mb-4">
				<i class="fas fa-envelope fa login-icon"></i>
				<input id="email" class="form-control" type="text" name="email">
				<span class="incorrect" id="user_error"></span>
			</div>

			<div class="form-group">
				<i class="fas fa-unlock login-icon"></i>
				<input id="password" class="form-control" type="password" name="password" required>
				<span class="incorrect" id="password_error"></span>
			</div>
	
			<div class="d-flex justify-content-center pt-3">
				<button class="btn login-button flex-fill" id="login" type="submit">Login</button>
			</div>
		<?php echo form_close()?>
		</div>
	</div>
</div>