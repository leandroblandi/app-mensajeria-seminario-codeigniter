<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="<?=base_url('assets/img/favicon.ico');?>" type="image/x-icon">
	<link rel="stylesheet" href="<?=base_url('assets/css/form.css');?>">
	<title><?=$form_type;?> | WhatsMessage!</title>
</head>
<body>
	<div class="container">
		<div class="heading">
			<h2><?=$form_type;?></h2>
		</div>
		<?=form_open($url);?>
			<div class="form-area">
				<span>Username</span>
				<input autocomplete="off" placeholder="johndoe" type="text" name="username" class="username" required>
			</div>
			<div class="form-area">
				<span>Password</span>
				<input autocomplete="off" type="password" placeholder="********" name="password" class="password" required>
			</div>
			<div class="form-links">
				<!-- If the form is register, then show the login link, otherwise, show the register link -->
				<?php if($form_type === "Login"):?>
					<a href="<?=site_url('register');?>">No account? Register</a>
				<?php endif; ?>
				<?php if($form_type === "Register"):?>
					<a href="<?=site_url('login');?>">Already have an account? Login</a>
				<?php endif; ?>
			</div>
			<div class="form-area">
				<button type="submit">
					<i class="fa-solid fa-arrow-right"></i>
					<p><?=$form_type;?></p>
				</button>
			</div>
		<?=form_close();?>
	</div>
	<!-- If there are a error message -->
	<?php if(isset($message) && !empty($message)): ?>
		<div class="form-info">
				<i class="fa-solid fa-circle-exclamation"></i>
				<p class="info">
					<?=$message;?>
				</p>
		</div>
	<?php endif; ?>
	<script src="https://kit.fontawesome.com/eb66d747aa.js" crossorigin="anonymous"></script>
</body>
</html>