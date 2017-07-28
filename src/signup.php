<?php
	include 'header.php';

	$data = $_POST;
	if( isset($data['do_signup']) )
	{

		$errors = array();
		if( trim($data['login']) === '' ) {
			$errors[] = 'Введите логин!';
		}

		if( trim($data['email']) === '' ) {
			$errors[] = 'Введите Email!';
		}

		if( $data['password'] === '' ) {
			$errors[] = 'Введите пароль!';
		}

		if( $data['password2'] != $data['password'] ) {
			$errors[] = 'Повторнный пароль неверный!';
		}

		if( R::count('users', "login = ?", array($data['login'])) > 0) 
		{
			$errors[] = 'Пользователь с таким логином уже существует!';
		}

		if( R::count('users', "email = ?", array($data['email'])) > 0) 
		{
			$errors[] = 'Пользователь с таким E-mail уже существует!';
		}

		if( empty($errors) ) 
		{
			$user = R::dispense('users');
			$user->login 		= $data['login'];
			$user->email 		= $data['email'];
			$user->password = password_hash($data['password'], PASSWORD_DEFAULT);
			R::store($user);
			echo '<div style="color: green">Вы успешно зарегистрированы!</div><hr>';

		} else {
			echo '<div style="color: red">' . array_shift($errors) . '</div><hr>';
		}

	}
?>

<form action="signup.php" method="POST">
	
	<p>
		<p><strong>Логин</strong>:</p>
		<input type="text" name="login" required value="<?php echo @$data['login']; ?>">
	</p>

	<p>
		<p><strong>E-mail</strong>:</p>
		<input type="email" name="email" required value="<?php echo @$data['email']; ?>">
	</p>

	<p>
		<p><strong>Пароль</strong>:</p>
		<input type="password" name="password" required value="<?php echo @$data['password']; ?>">
	</p>

	<p>
		<p><strong>Введите ваш пароль ещё раз</strong>:</p>
		<input type="password" name="password2" required value="<?php echo @$data['password2']; ?>">
	</p>

	<p>
		<button type="sumbit" name="do_signup">Зарегистрироваться</button>
	</p>

</form>