<?php
require_once './model/database.php';

function addItem($properties)
{
	foreach ($properties as $key => $value)
		$new_item[$key] = $value;
	if (data_exists(DB_ITEMS, 'ref', $new_item['ref']))
		return (false);
	add_datas(DB_ITEMS, $new_item);
	return (true);
}
