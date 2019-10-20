<?php
require_once './model/database.php';

function addToSessionCart($db, $ref, $qty)
{
	$datas = get_database($db);
	if (!isset($_SESSION['CART']))
		$_SESSION['CART'] = array();
	if (!isset($_SESSION['CART'][$ref]))
		$_SESSION['CART'][$ref] = array();
	foreach ($datas as $data) {
		if ($data['ref'] == $ref) {
			$_SESSION['CART'][$ref]['ref'] = $ref;
			$qty = $qty + $_SESSION['CART'][$ref]['qty'];
			$_SESSION['CART'][$ref]['qty'] = $qty;
			$_SESSION['CART'][$ref]['unitPrice'] = $data['price'];
			$_SESSION['CART'][$ref]['price'] = $qty * $data['price'];
		}
	}
	foreach ($_SESSION['CART'] as $item) {
		$total += $item['price'];
	}
	$_SESSION['CART']['total'] = $total;
}
function delFromSessionCart($db, $ref, $qty)
{
	$datas = get_database($db);
	if (!isset($_SESSION['CART'][$ref]))
		return ;
	foreach ($datas as $data) {
		if ($data['ref'] == $ref) {
			$qty = $_SESSION['CART'][$ref]['qty'] - $qty;
			if ($qty <= 0) {
				unset($_SESSION['CART'][$ref]);
				break ;
			}
			$_SESSION['CART'][$ref]['qty'] = $qty;
			$_SESSION['CART'][$ref]['unitPrice'] = $data['price'];
			$_SESSION['CART'][$ref]['price'] = $qty * $data['price'];
		}
	}
	foreach ($_SESSION['CART'] as $item) {
		$total += $item['price'];
	}
	$_SESSION['CART']['total'] = $total;
}
function removeFromSessionCart($ref)
{
	if (!isset($_SESSION['CART'][$ref]))
		return ;
	unset($_SESSION['CART'][$ref]);
}
