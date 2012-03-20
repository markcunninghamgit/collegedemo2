<?php
session_start(); 

$connection = mysql_connect("localhost","collegedemo2","collegedemo2");

if (!$connection)
{
        die('Could not connect: ' . mysql_error());
}

mysql_select_db("collegedemo2");



function fetchall($result)
{
	global $connection;

	$data = array();

	while ($row = mysql_fetch_assoc($result))
	{
		$data[] = $row;
	}

	return $data;
}

function showResult($result)
{
	if ($result ===true)
	{?>
	<b><font color="green">TRUE</font></b>
<?php

	}
	else
	{?>
	<font color="red">false</font>
	<?php 
	}

}

?>

