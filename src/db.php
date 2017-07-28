<?php

require 'libs/rb.php';
R::setup( 'mysql:host=localhost;dbname=just_do',
		'root', '' );

session_start();