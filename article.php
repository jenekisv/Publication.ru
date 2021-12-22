<?php 
	if($_COOKIE['login'] == ''){
		header('Location: /reg.php');
		exit();
	}
?>	
<!doctype html>
<html lang="ru">
<head>
	<?php 
		$website_title = 'Добавление статьи';
		include_once 'blocks/head.php'; 
	?>			
</head>
<body>
	<?php include_once 'blocks/header.php'; ?>		
	<main class="container mt-5">		
		<div class="row">
			<div class="col-md-8 mb-3">
				<h4 class="mt-3">Добавление статьи</h4>
				<br>
				<form action="" method="post">
					<label for="title">Заголовок статьи</label>
					<input type="text" name="title" id="title" class="form-control">
					
					<label for="intro">Интро статьи</label>
					<textarea name="intro" id="intro" class="form-control"></textarea>
					
					<label for="text">Текст статьи</label>
					<textarea name="text" id="text" class="form-control"></textarea>
															
					<div class="alert alert-danger mt-4" id="errorBlock"></div>
					
					<button type="button" id="article_send" class="btn btn-success mt-3">
					Добавить
					</button>
				</form>
			</div>	
	<?php include_once 'blocks/aside.php'; ?>		
		</div>					
	</main>		
	<?php include_once 'blocks/footer.php'; ?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script>
		$('#article_send').click(function(){
			var title = $('#title').val();
			var intro = $('#intro').val();
			var text = $('#text').val();
			
			$.ajax({
				url: 'ajax/add_article.php',
				type: 'POST',
				cache: false,
				data: {'title' : title, 'intro' : intro, 'text' : text},
				dataType: 'html',
				success: function(data) {
					if(data == 'Готово'){
						$('#article_send').text('Все, добавили!').attr('disabled',true);
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