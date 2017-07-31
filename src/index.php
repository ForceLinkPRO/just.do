<?php
	include 'header.php';
?>
<?php // Авторизация
	$data = $_POST;
	if( isset($data['do_login']) )
	{
		$errors = array();
		$user = R::findOne('users', 'login = ?', array($data['login']));
		if( $user )
		{
			if( password_verify($data['password'], $user->password) )
			{
				$_SESSION['logged_user'] = $user;
				echo '
				<div class="container">
				 	<div class="row">
				 		<div class="col-md-6 col-md-offset-3 text-center">
							<div style="color: green">Вы успешно авторизованы! <br /> Можете перейти на <a href="/">главную</a> страницу!</div>
				 		</div>
				 	</div>
				 </div>
				 <hr>
				 ';
			} else 
			{
				$errors[] = 'Неверно введен пароль!';
			}
		} else 
		{
			$errors[] = 'Пользователь с таким логином не найден!';
		}

		if( ! empty($errors) ) 
		{
			echo '<div style="color: red">' . array_shift($errors) . '</div><hr>';
		}
	}
?>

<div id="content">
	<?php if( isset($_SESSION['logged_user'])) : ?>
		Вы авторизованы! <br>
		Привет, <?php echo $_SESSION['logged_user']->login; ?>!
		<hr>
		<a href="content/logout.php">Выйти из аккаунта</a>
	<?php else : ?>
	<h2 style="display: none;" class="errors">Вы не авторизовались!</h2>
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<button class="btn btn-login btn-primary">Войти</button>
				<button class="btn btn-signup btn-success">Регистрация</button>
			</div>
		</div>
	</div>
	<?php endif; ?>
</div>

<?php
	include 'footer.php';
?>