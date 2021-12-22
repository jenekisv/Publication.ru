<!doctype html>
<html lang="ru">
<head>	
	<?php 
		$website_title = 'Публикация статей';
		include_once 'blocks/head.php'; 
	?>		
</head>
<body>
	<?php include_once 'blocks/header.php'; ?>		
	<main class="container mt-5">		
		<div class="row">
			<div class="col-md-8 mb-3">
				<?php 
					include_once 'mysql_connect.php'; 
					
					$sql = 'SELECT * FROM `articles` ORDER BY `date` DESC';
					$query = $pdo->query($sql);
					while($row = $query->fetch(PDO::FETCH_OBJ)){
						echo "<h2>$row->title</h2>
							<p>$row->intro</p>
							<p><b>Автор статьи:</b><mark>$row->avtor</mark></p>
							<a href='/news.php?id=$row->id' title='$row->title'>
								<button class='btn btn-warning mb-5'>Читать статью</button>
							</a>";
					}
					
				?>						
			</div>	
	<?php include_once 'blocks/aside.php'; ?>		
		</div>					
	</main>		
	<?php include_once 'blocks/footer.php'; ?>
</body>
</html>