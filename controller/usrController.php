<?php
require_once './model/user.php';

function usrAction()
{
	require './view/usr/usrPanel.php';
}
function loginAction()
{
	if (ft_isset($_POST['login']) && ft_isset($_POST['passwd'])) {
		if (!login($_POST['login'], $_POST['passwd']))
			$error_msg = 'Oups, something went wrong !';
		if ($_SESSION['LOG_USR'])
			header('Location: index.php?action=index');
	}
	require './view/usr/login.php';
}
function createUsrAction()
{
	if (ft_isset($_SESSION['LOG_USR']))
		header('Location: index.php?action=index');
	if (ft_isset($_POST['login']) && ft_isset($_POST['passwd'])) {
		if (!newUsr($_POST['login'], $_POST['passwd'], 'user'))
			$error_msg = "Oups, try again!";
		else
			return (header('Location: index.php?action=login'));
	}
	require './view/usr/createUsr.php';
}
function logoutAction()
{
	logout();
	header('Location: index.php?action=index');
}
function pwdUpdateAction() {
	if (ft_isset($_POST['newpwd']) && ft_isset($_POST['oldpwd'])) {
		if(!pwdUpdate(DB_USERS, $_SESSION['LOG_USR'], $_POST['newpwd'], $_POST['oldpwd']))
			$display_msg = "Oups, try again!";
		else
			$display_msg = "Password changed successfully";
	}
	require './view/usr/usrPanel.php';
}
function deleteAccountAction() {
	if (!ft_isset($_SESSION['LOG_USR']) || isset($_POST['cancel']))
		return (header ('Location: index.php?action=index'));
	else if (isset($_POST['validDel']) && ft_isset($_POST['passwd'])) {
		if (!deleteAccount($_SESSION['LOG_USR'], $_POST['passwd'], 'user')) {
			$tryagain = "Try Again !";
		}
		else
			header('Location: index.php?action=index');
	}
	require './view/usr/usrPanel.php';
}
