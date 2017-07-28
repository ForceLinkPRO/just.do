<?php
	include 'header.php';
?>

<?php if( isset($_SESSION['logged_user'])) : ?>
	Вы авторизованы! <br>
	Привет, <?php echo $_SESSION['logged_user']->login; ?>!
	<hr>
	<a href="/logout.php">Выйти из аккаунта</a>
<?php else : ?>
<div class="container">
	<div class="row text-center">
		<div class="col-md-6 col-md-offset-3 noRegist">
			<h2>Вы не авторизованы!</h2>
			<a class="btn btn-primary" href="/login.php">Авторизация</a>
			<a class="btn btn-danger" href="/signup.php">Регистрация</a>
		</div>
	</div>
</div>
<?php endif; ?>