<!doctype html>
<html lang="ru">
<head>
	<?php 
		$website_title = 'Регистрация';
		include_once 'blocks/head.php'; 
	?>			
</head>
<body>
	<?php include_once 'blocks/header.php'; ?>		
	<main class="container mt-5">		
		<div class="row">
			<div class="col-md-8 mb-3">
				<h4 class="mt-3">Форма регистрации</h4>
				<br>
				<form action="" method="post">
					<label for="username">Ваше имя</label>
					<input type="text" name="username" id="username" class="form-control">
					
					<label for="email">Email</label>
					<input type="email" name="email" id="email" class="form-control">
				
					<label for="login">Логин</label>
					<input type="text" name="login" id="login" class="form-control">
					
					<label for="pass">Пароль</label>
					<input type="password" name="pass" id="pass" class="form-control">
					
					<div class="alert alert-danger mt-4" id="errorBlock"></div>
					
					<button type="button" id="reg_user" class="btn btn-success mt-3">
					Зарегистрироваться
					</button>
				</form>
			</div>	
	<?php include_once 'blocks/aside.php'; ?>		
		</div>					
	</main>		
	<?php include_once 'blocks/footer.php'; ?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script>
		$('#reg_user').click(function(){
			var name = $('#username').val();
			var email = $('#email').val();
			var login = $('#login').val();
			var pass = $('#pass').val();
			
			$.ajax({
				url: 'ajax/freg.php',
				type: 'POST',
				cache: false,
				data: {'username' : name, 'email' : email, 'login' : login, 'pass' : pass},
				dataType: 'html',
				success: function(data) {
					if(data == 'Готово'){
						$('#reg_user').text('Все, зарегались!').attr('disabled',true);
						$('#errorBlock').hide();
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