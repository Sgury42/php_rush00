<?php
require_once './model/cart.php';
function cartPanelAction()
{
	require_once './view/cart/panel.php';
}
function addToCartAction()
{
	if (ft_isset($_POST['addToCart'])) {
		addToSessionCart(DB_ITEMS, $_POST['addToCart'], 1);
	}
	else if (ft_isset($_POST['delFromCart'])) {
		delFromSessionCart(DB_ITEMS, $_POST['delFromCart'], 1);
	}
	print_r($_SESSION);
	require_once './view/default/default.php';
}
function cartEditAction()
{
	if (ft_isset($_POST['addToCart'])) {
		addToSessionCart(DB_ITEMS, $_POST['addToCart'], 1);
	}
	else if (ft_isset($_POST['delFromCart'])) {
		delFromSessionCart(DB_ITEMS, $_POST['delFromCart'], 1);
	}
	else if (ft_isset($_POST['remove']))
		removeFromSessionCart($_POST['remove']);
	print_r($_SESSION);
	require_once './view/cart/panel.php';
}
function placeOrderAction()
{
	if (isset($_POST['placeOrder']) && ft_isset($_SESSION['CART'])) {
		if (!ft_isset($_SESSION['LOG_USR']))
			$_SESSION['CART']['login'] = 'guest';
		else
			$_SESSION['CART']['login'] = $_SESSION['LOG_USR'];
		$_SESSION['CART']['sent'] = false;
		add_datas(DB_ORDERS, $_SESSION['CART'], 0);
		unset($_SESSION['CART']);
		return (header('Location: index.php/action=index'));
	}
	require_once './view/cart/panel.php';
}
