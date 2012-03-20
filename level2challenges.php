<?php
$usersJson = '[{"username":"bob","password":"freddy123","avatar":"fred.jpg","hash":""},{"username":"johnsmith","password":"og0g3u2m30","avatar":"avatar.gif","hash":""},{"username":"harry","password":"sally09","avatar":"picofme.jpg","hash":""},{"username":"sally","password":"harry03","avatar":"summer01.bmp","hash":""},{"username":"george3","password":"12345654321","avatar":"maxh04x312.bmp","hash":""},{"username":"andrew","password":"motorbike889","avatar":"","hash":""},{"username":"ianboyle","password":"05081965","avatar":"","hash":""}]';

$moviesJson = '[{"title":"iron man","rating":"5","description":"that movie about some man made of iron"},{"title":"batman","rating":"5","description":"movie about a bat"},{"title":"the social network","rating":"4","description":"facebook copy"},{"title":"matrix","rating":"5","description":"there is no spoon"},{"title":"George of the jungle","rating":"4","description":"george and his journey in the jungle"},{"title":"All about Eve","rating":"4","description":"that girl called eve"},{"title":"beauty and the beast","rating":"5","description":"classic cartoon"},{"title":"Catch 22","rating":"5","description":"where the named catch 22 was coined. Army man wants to get out of war"},{"title":"Fiddler on the roof","rating":"2","description":"musical"},{"title":"bourne identity","rating":"5","description":"amnesia assassin "},{"title":"my big fat greek wedding","rating":"3","description":"no idea didn\'t see it"},{"title":"robocop","rating":"4","description":"half robot half man"},{"title":"star wars","rating":"4","description":"war in the stars"},{"title":"10 angry men","rating":"5","description":"the whole thing is in one room"},{"title":"toy story","rating":"5","description":"classic 90s cartoon"},{"title":"Girl with the dragon tattoo","rating":"4","description":"apparently the closest you get to real hacking in the movies "},{"title":"ocean\'s 11","rating":"5","description":"the long con"}]';

function challenge1()
{
	global $mysqlData;
	global $mysqlReturnRows;


	if ($mysqlData[0]['username'] == "bob" and $mysqlData[0]['password'] == 'freddy123' and $mysqlData[0]['avatar'] == "fred.jpg" and $mysqlReturnRows == 1 )
	{
		$_SESSION['level2'][1] = true;
		return true;
	}
	
	return false;
}

function challenge2()
{
	global $mysqlReturnRows;
	if ($mysqlReturnRows  == 4)
	{
		$_SESSION['level2'][2] = true;
		return true;
	}

	return false;
}


function challenge3()
{
	global $mysqlData;
	global $moviesJson;

	$origMoviesArray = json_decode($moviesJson, true);

	$perfectArray = array();
	$userArray  = array();
	foreach ($origMoviesArray as $key => $movieArray)
	{
		$movieArray['rating'] = 500;
		$perfectArray[$movieArray['title']] = $movieArray;
	}

	ksort($perfectArray);

	foreach ($mysqlData as $key => $movieArray)
	{
		$userArray[$movieArray['title']] = $movieArray;
	}
	
	ksort($userArray);

	$arrayDiff = array_diff($userArray,$perfectArray);
	$arrayDiffRev = array_diff($perfectArray,$userArray);
	if (empty($arrayDiff) and empty($arrayDiffRev))
	{
		$_SESSION['level2'][3] = true;
		return true;
	}
	
	return false;
}

function challenge4()
{
	global $mysqlData;
	global $usersJson;

	$usersArray = array();
	$perfectArray = array();

	$origUsersArray = json_decode($usersJson,true);

	foreach ($origUsersArray as $key => $userArray)
	{
		if ($userArray['username'] == 'ianboyle')
		{
			continue;
		}

		$perfectArray[$userArray['username']] = $userArray;
	}

	ksort($perfectArray);

	foreach ($mysqlData as $key => $userArray)
	{
		$usersArray[$userArray['username']] = $userArray;
	}

	ksort($userArray);
	$arrayDiff = array_diff($usersArray, $perfectArray);
	$arrayDiffRev = array_diff($perfectArray, $usersArray);

	if (empty($arrayDiff) and empty($arrayDiffRev))
	{
		$_SESSION['level2'][4] = true;
		return true;
	}

	//print_r($arrayDiff);
	return false;


	
}


function challenge5()
{
	global $mysqlData;
	global $usersJson;

	$usersArray = array();
	$perfectArray = array();

	$origUsersArray = json_decode($usersJson,true);

	foreach ($origUsersArray as $key => $userArray)
	{
		if ($userArray['username'] == 'ianboyle')
		{
			$userArray['password'] = "abc";
		}

		$perfectArray[$userArray['username']] = $userArray;
	}

	ksort($perfectArray);

	foreach ($mysqlData as $key => $userArray)
	{
		$usersArray[$userArray['username']] = $userArray;
	}

	ksort($userArray);
	$arrayDiff = array_diff($usersArray, $perfectArray);
	$arrayDiffRev = array_diff($perfectArray, $usersArray);

	if (empty($arrayDiff) and empty($arrayDiffRev))
	{
		$_SESSION['level2'][5] = true;
		return true;
	}

	return false;




}
