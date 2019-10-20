<?php
function get_database($db)
{
	if (!($datas = file_get_contents($db)))
		$datas = array();
	else
		$datas = unserialize($datas);
	return ($datas);
}
function data_exists($db, $key, $value)
{
	$datas = get_database($db);
	if (!$key) {
		foreach ($datas as $data) {
			if ($data == $value)
				return (true);
		}
		return (false);
	}
	foreach ($datas as $data) {
		if ($data[$key] == $value)
			return (true);
	}
	return (false);
}
function add_datas($db, $new_data, $id)
{
	$datas = get_database($db);
	if (!$id)
		array_push($datas, $new_data);
	else
		$datas[$id] = $new_data;
	file_put_contents($db, serialize($datas));
}
function removeDatas($db, $key, $value, $elements)
{
	$datas = get_database($db);
	foreach($datas as &$data) {
		if ($data[$key] == $value) {
			if (ft_isset($elements)) {
				foreach($elements as $element) {
					unset($data[$element]);
				}
			}
			unset($data[$key]);
		}
	}
	file_put_contents($db, serialize($datas));
}
function find_key($db, $value)
{
	$datas = get_database($db);
	$key = array_search($value, $datas);
	return ($key);
}
function removeSingleData($db, $key, $value)
{
	$data = get_database($db);
	if ($data[$key] == $value) {
		unset($data[$key]);
		file_put_contents($db, serialize($data));
	}
}
