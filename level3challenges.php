<?php

$tablesJson = '[{"table_name":"movies"},{"table_name":"salaries2012"},{"table_name":"users"}]';
function challenge1()
{
	global $tablesJson;
	global $mysqlData;
	$usersArray = array();
	$perfectArray = array();

	$origTablesArray = json_decode($tablesJson,true);

	foreach ($origTablesArray as $key => $tableArray)
	{
		$perfectArray[$tableArray['table_name']] = $tableArray;
	}

	ksort($perfectArray);

	foreach ($mysqlData as $key => $tableArray)
	{
		$usersArray[$tableArray['table_name']] = $tableArray;
	}

	ksort($usersArray);

	$userEncoded = json_encode($usersArray);
	$perfectEncoded = json_encode($perfectArray);
	
	if ($userEncoded === $perfectEncoded)
	{
		$_SESSION['level3'][1] = true;
		return true;
	}

	//print_r($arrayDiff);
	return false;


}

