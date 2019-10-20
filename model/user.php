<?php
require_once './model/database.php';

function login($login, $passwd)
{
	$log_data = get_database(DB_USERS);
	foreach ($log_data as $log) {
		if ($log['login'] == $login) {
			if ($log['passwd'] == hash('Whirlpool', $passwd)){
				$_SESSION['LOG_USR'] = $login;
				return (true);
			}
		}
	}
	return (false);
}
function newUsr ($login, $passwd, $role)
{
	$new['login'] = $login;
	$new['passwd'] = hash('Whirlpool', $passwd);
	$new['role'] = $role;
	if (data_exists(DB_USERS, 'login', $new['login']))
		return (false);
	add_datas(DB_USERS, $new, $new['login']);
	return (true);
}
function logout ()
{
	session_destroy();
}
function pwdUpdate($db, $login, $newpwd, $oldpwd)
{
	$oldpwd = hash('Whirlpool', $oldpwd);
	$datas = get_database($db);
	foreach($datas as &$data) {
		if ($data['login'] == $login && $data['passwd'] == $oldpwd) {
			$data['passwd'] = hash('Whirlpool', $newpwd);
			file_put_contents(DB_USERS, serialize($datas));
			return (true);
		}
	}
	return (false);
}
function deleteAccount($login, $pwd, $rights)
{
	if ($rights == 'user') {
		if (!login($login, $pwd))
			return (false);
		else {
			$elements = ['passwd', 'role'];
			removeDatas(DB_USERS, 'login', $login, $elements);
			logout();
			return (true);
		}
	}
	return (false);
}
