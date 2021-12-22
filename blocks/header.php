<div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
	<a href="/" class="d-flex align-items-center text-dark text-decoration-none">
		<span class="fs-4 mt-2">&nbsp Публикация Статей</span>
	</a>
    <nav class="d-inline-flex mt-3 mt-md-3 ms-md-auto">
        <a class="me-3 py-2 text-dark text-decoration-none" href="/">Главная</a>
		<a class="me-3 py-2 text-dark text-decoration-none" href="/contacts.php">Контакты</a>
		<?php
			if($_COOKIE['login'] != '')
				echo '<a class="me-3 py-2 text-dark text-decoration-none" href="/article.php">Добавить статью</a>';
		?>
    </nav>
		<?php
			if($_COOKIE['login'] == ''):
		?>
		<a class="btn btn-outline-primary mt-4 me-2 mb-2" href="/auth.php">Войти</a>
		<a class="btn btn-outline-primary mt-4 me-2 mb-2" href="/reg.php">Регистрация</a>
		<?php
			else:
		?>
		<a class="btn btn-outline-primary mt-4 me-2 mb-2" href="/auth.php">Кабинет пользователя</a>
		<?php
			endif;
		?>
    </div>