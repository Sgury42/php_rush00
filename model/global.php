<?php
function ft_isset($value)
{
	if (!isset($value) || !$value)
		return (false);
	return (true);
}
function is_admin($db, $login)
{
	$datas = get_database($db);
	foreach ($datas as $data) {
		if ($data['login'] == $login) {
			if ($data['role'] == 'admin')
				return (true);
		}
	}
	return (false);
}
