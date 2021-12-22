<!doctype html>
<html lang="ru">
<head>
	<?php 
		$website_title = 'Авторизация';
		include_once 'blocks/head.php'; 
	?>			
</head>
<body>
	<?php include_once 'blocks/header.php'; ?>		
	<main class="container mt-5">		
		<div class="row">
			<div class="col-md-8 mb-3">
			<?php
				if($_COOKIE['login'] == ''):
			?>
				<h4 class="mt-3">Форма авторизации</h4>
				<br>
				<form action="" method="post">
				
					<label for="login">Логин</label>
					<input type="text" name="login" id="login" class="form-control">
					
					<label for="pass">Пароль</label>
					<input type="password" name="pass" id="pass" class="form-control">
					
					<div class="alert alert-danger mt-4" id="errorBlock"></div>
					
					<button type="button" id="auth_user" class="btn btn-success mt-3">
					Войти
					</button>
				</form>
			<?php
				else:
			?>
			<h4 class="mt-3">Добро пожаловать <?=$_COOKIE['login']?>!</h4>
			<button class="btn btn-danger mt-3" id="exit_btn">Выйти</button>
			<?php
				endif;
			?>
			</div>	
	<?php include_once 'blocks/aside.php'; ?>		
		</div>					
	</main>		
	<?php include_once 'blocks/footer.php'; ?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script>
		$('#exit_btn').click(function(){
			$.ajax({
				url: 'ajax/exit.php',
				type: 'POST',
				cache: false,
				data: {},
				dataType: 'html',
				success: function(data) {
					document.location.reload(true);
				}
			});
		});
		
		
		$('#auth_user').click(function(){
			var login = $('#login').val();
			var pass = $('#pass').val();
			
			$.ajax({
				url: 'ajax/fauth.php',
				type: 'POST',
				cache: false,
				data: {'login' : login, 'pass' : pass},
				dataType: 'html',
				success: function(data) {
					if(data == 'Готово'){
						$('#auth_user').text('Готово!').attr('disabled',true);
						$('#errorBlock').hide();
						document.location.reload(true);
				}
					else {
						$('#errorBlock').show();
						$('#errorBlock').text(data);
					}
				}
			});
		});
	</script>
</body>
</html>