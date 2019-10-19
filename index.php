<?php
session_start();
// defines
define('DB_USERS', './private/usr'); 
define('DB_ITEMS', './private/items');
define('DB_CATEGORY', './private/categories');

//requires
require_once './core/router.php';
require_once './model/global.php';

if (isset($_GET['action'])) {
	if ($_GET['action'] == 'index')
		require_once './view/default/default.php';
	if ($_GET['action'] == 'ToCart')
		require_once './view/default/default.php';    // NEED TO CREATE FUNCTIONS !
	usrRoutes();
	adminRoutes();
}
else
	require_once './view/default/default.php';

?>
