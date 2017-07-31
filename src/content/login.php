<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3 noRegist text-center">
			<form action="index.php" method="POST">		
				<p>
					<p><strong>Логин</strong>:</p>
					<input type="text" name="login" value="<?php echo @$data['login']; ?>">
				</p>
				<p>
					<p><strong>Пароль</strong>:</p>
					<input type="password" name="password" value="<?php echo @$data['password']; ?>">
				</p>
				<p>
					<button class="btn btn-danger" id="form-login">Войти</button>
				</p>
			</form>
		</div>
	</div>
</div>