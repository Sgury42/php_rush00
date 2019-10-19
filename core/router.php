<?php
require_once './controller/usrController.php';
require_once './controller/adminController.php';

function usrRoutes()
{
	switch ($_GET['action']) {
		case 'login':
			loginAction();
			break ;
		case 'createAccount':
			createUsrAction();
			break ;
		case 'logout':
			logoutAction();
			break ;
		case 'usrPanel':
			usrAction();
			break ;
		case 'pwdUpdate':
			pwdUpdateAction();
			break ;
		case 'delAccount':
			deleteAccountAction();
			break ;
	}
}

function adminRoutes()
{
	switch ($_GET['action']) {
		case 'admin':
			adminAction();
			break ;
		case 'addItem':
			addItemAction();
			break ;
		case 'addCategory':
			addCategoryAction();
			break ;
		case 'removeCategory':
			removeCategoryAction();
			break ;
		case 'admRemoveUser':
			admRemoveUserAction();
			break ;
	}
}
