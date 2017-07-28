<?php
	include 'header.php';

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
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3 noRegist text-center">
			<form action="login.php" method="POST">		
				<p>
					<p><strong>Логин</strong>:</p>
					<input type="text" name="login" value="<?php echo @$data['login']; ?>">
				</p>
				<p>
					<p><strong>Пароль</strong>:</p>
					<input type="password" name="password" value="<?php echo @$data['password']; ?>">
				</p>
				<p>
					<button class="btn btn-danger" type="sumbit" name="do_login">Войти</button>
				</p>
			</form>
		</div>
	</div>
</div>