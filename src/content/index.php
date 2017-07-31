<?php if( isset($_SESSION['logged_user'])) : ?>
	Вы авторизованы! <br>
	Привет, <?php echo $_SESSION['logged_user']->login; ?>!
	<hr>
	<a href="/logout.php">Выйти из аккаунта</a>
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