<?php
	if( $_POST['task'] ) {

		$_POST['task'] = 'test php task';
  		echo $_POST['task'];
	}

	if( $_POST['isCompleted'] ) {

		$_POST['isCompleted'] = true;
  		echo $_POST['isCompleted'];
	}

	if( $_POST['increm'] ) {

  		echo $_POST['increm'];
	}
?>