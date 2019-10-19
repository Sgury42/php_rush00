<?php
require_once './model/admin.php';

function adminAction()
{
	require './view/admin/admin.php';
}
function categories_exists($categories)
{
	$categories = explode(', ', $categories);
	foreach ($categories as $category) {
		if (!data_exists(DB_CATEGORY, 0, $category))
			return (false);
	}
	return (true);
}
function addItemAction()
{
	if (ft_isset($_POST['name']) && ft_isset($_POST['ref']) && ft_isset($_POST['size'])
		&& ft_isset($_POST['color']) && ft_isset($_POST['price']) && ft_isset($_POST['src_img'])
		&& ft_isset($_POST['category']) && ft_isset($_POST['description'])) {
		if (!categories_exists($_POST['category']))
			$category_msg = 'New categories must be created first.';
		else if(!addItem($_POST))
			$display_msg = 'An item is already using this #ref';
		else
			$display_msg = 'Item successfully added !';
	}
	else
		$display_msg = 'Please fill the entire form';
	require './view/admin/admin.php';
}
function addCategoryAction()
{
	if (ft_isset($_POST['newCategory']))
		if (!data_exists(DB_CATEGORY, 0, $_POST['newCategory'])) {
			add_datas(DB_CATEGORY, $_POST['newCategory']);
		}
	require './view/admin/admin.php';
}
function removeCategoryAction()
{
	if (ft_isset($_POST['remove']) && data_exists(DB_CATEGORY, 0, $_POST['remove'])) {
		$key = find_key(DB_CATEGORY, $_POST['remove']);
		removeSingleData(DB_CATEGORY, $key, $_POST['remove']);
	}
	require './view/admin/admin.php';
}
function admRemoveUserAction()
{
	if (ft_isset($_POST['admRemoveUser'])) {
		if (data_exists(DB_USERS, 'login', $_POST['admRemoveUser'])
				&& !is_admin(DB_USERS, $_POST['admRemoveUser'])) {
			removeDatas(DB_USERS, 'login', $_POST['admRemoveUser'], [passwd, role]);
			$removeUser_msg = 'User successfully deleted !';
		}
		else
			$removeUser_msg = 'User does not exists';
	}
	require './view/admin/admin.php';
}
