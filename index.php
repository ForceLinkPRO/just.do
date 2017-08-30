<?php 
	require 'db.php'; 

?>

<!DOCTYPE html>
<html>
<head>
    <title>React ToDos App</title>
   	<meta charset="UTF-8">
   	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
   	<script>
   	var todos = [{
	    task: 'Default',
	    isCompleted: false
	}, {
	    task: 'Default2',
	    isCompleted: false
	}];

	var i = 0;

// ==================================
	$.post(
	  "/ajaxtest.php",
	  {
	    increm: i
	  },
	);
// =======================================
	$.post(
	  "/ajaxtest.php",
	  {
	    task: "Default"
	  },
	  onAjaxTask
	);
	 
	function onAjaxTask(data)
	{
	  todos[i].task = data;
	}
// ===================================
	$.post(
	  "/ajaxtest.php",
	  {
	    isCompleted: false
	  },
	  onAjaxIsCompleted
	);

	function onAjaxIsCompleted(data)
	{
	  todos[i].isCompleted = data;
	}
// ==================================
   	</script>
</head>
<body>
	<?php if( isset($_SESSION['logged_user']) ) : ?>
	<b><?php echo $_SESSION['logged_user']->login; ?></b>, вы авторизованы! <br>
	<a href="/logout.php">Выйти из аккаунта</a><hr>
    <div id="app" />

	<?php else : ?>
	<p>Вы не авторизованы!</p>
	<a href="/login.php">Авторизация</a><br>
	<a href="/signup.php">Регистрация</a>

	<?php endif; ?>

    <script src="libs/bundle.js"></script>
</body>
</html>
