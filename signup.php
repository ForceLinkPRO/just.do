<?php 
	require 'db.php'; 

	if( isset($_SESSION['logged_user']) )
	{
		echo '<div style="color: red;">Вы уже авторизованы!</div><a href="/">Главная</a><br><a href="/logout.php">Выйти из аккаунта</a><hr>';
	} else {
?>
<form action="/signup.php" method="POST">
	
	<p>
		<p><strong>Ваш логин</strong></p>
		<input type="text" name="login" value="<?php echo @$data['login']; ?>">
	</p>

	<p>
		<p><strong>Ваш пароль</strong></p>
		<input type="password" name="password">
	</p>

	<p>
		<p><strong>Введите ваш пароль еще раз</strong></p>
		<input type="password" name="password2">
	</p>

	<p>
		<button type="sumbit" name="do_signup">Зарегистрироваться</button>
	</p>

</form>
<?php
		$data = $_POST;
		if( isset($data['do_signup']) )
		{

			$errors = array();
			if( trim($data['login']) == '' )
			{
				$errors[] = 'Введите логин!';
			}
			if( trim($data['password']) == '' )
			{
				$errors[] = 'Введите пароль!';
			}
			if( $data['password2'] != $data['password'] )
			{
				$errors[] = 'Повторный пароль введен неверно!';
			}
			if( R::count('users', "login = ?", array($data['login'])) > 0 )
			{
				$errors[] = 'Пользователь с таким логином уже существует!';
			}

			if( empty($errors) )
			{

				$user = R::dispense('users');
				$user->login = $data['login'];
				$user->password = password_hash($data['password'], PASSWORD_DEFAULT);
				R::store($user);
				echo '<div style="color: green;">Вы успешно зарегистрировались!</div><hr>';

			} else {
				echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';
			}

		}
	}

?>