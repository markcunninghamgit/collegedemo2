<?php
$usersJson = '[{"username":"bob","password":"freddy123","avatar":"fred.jpg","hash":""},{"username":"johnsmith","password":"og0g3u2m30","avatar":"avatar.gif","hash":""},{"username":"harry","password":"sally09","avatar":"picofme.jpg","hash":""},{"username":"sally","password":"harry03","avatar":"summer01.bmp","hash":""},{"username":"george3","password":"12345654321","avatar":"maxh04x312.bmp","hash":""},{"username":"andrew","password":"motorbike889","avatar":"","hash":""},{"username":"ianboyle","password":"05081965","avatar":"","hash":""}]';

$moviesJson = '[{"title":"iron man","rating":"5","description":"that movie about some man made of iron"},{"title":"batman","rating":"5","description":"movie about a bat"},{"title":"the social network","rating":"4","description":"facebook copy"},{"title":"matrix","rating":"5","description":"there is no spoon"},{"title":"George of the jungle","rating":"4","description":"george and his journey in the jungle"},{"title":"All about Eve","rating":"4","description":"that girl called eve"},{"title":"beauty and the beast","rating":"5","description":"classic cartoon"},{"title":"Catch 22","rating":"5","description":"where the named catch 22 was coined. Army man wants to get out of war"},{"title":"Fiddler on the roof","rating":"2","description":"musical"},{"title":"bourne identity","rating":"5","description":"amnesia assassin "},{"title":"my big fat greek wedding","rating":"3","description":"no idea didn\'t see it"},{"title":"robocop","rating":"4","description":"half robot half man"},{"title":"star wars","rating":"4","description":"war in the stars"},{"title":"10 angry men","rating":"5","description":"the whole thing is in one room"},{"title":"toy story","rating":"5","description":"classic 90s cartoon"},{"title":"Girl with the dragon tattoo","rating":"4","description":"apparently the closest you get to real hacking in the movies "},{"title":"ocean\'s 11","rating":"5","description":"the long con"}]';
$salariesJson = '[{"username":"john","password":"1500"},{"username":"harry","password":"2000"},{"username":"alanturring","password":"2300"},{"username":"george","password":"3000"},{"username":"iansmith","password":"5000"},{"username":"dudeeee","password":"20"}]';


function challenge1()
{
	global $mysqlData;
	global $mysqlReturnRows;

	if ($mysqlData[0]['username'] == "bob" and $mysqlData[0]['password'] == 'freddy123' and  $mysqlReturnRows == 1 )
	{
		$_SESSION['level5'][1] = true;
		return true;
	}
	
	return false;
}

function challenge2()
{
	global $mysqlReturnRows;
	if ($mysqlReturnRows  == 4)
	{
		$_SESSION['level5'][2] = true;
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
	$submittedArray  = array();
	foreach ($origMoviesArray as $key => $movieArray)
	{
		$movieArray['rating'] = 500;
		$perfectArray[$movieArray['title']] = $movieArray;
	}

	ksort($perfectArray);

	foreach ($mysqlData as $key => $movieArray)
	{
		$submittedArray[$movieArray['title']] = $movieArray;
	}
	
	ksort($submittedArray);
	

	$submittedEncoded = json_encode($submittedArray);
	$perfectEncoded = json_encode($perfectArray);
	
	if ($perfectEncoded == $submittedEncoded)
	{
		$_SESSION['level5'][3] = true;
		return true;
	}
	
	return false;
}

function challenge4()
{
	global $mysqlData;
	global $usersJson;

	$submittedArray = array();
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
		$submittedArray[$userArray['username']] = $userArray;
	}

	
	ksort($submittedArray);
	

	$submittedEncoded = json_encode($submittedArray);
	$perfectEncoded = json_encode($perfectArray);
	
	if ($perfectEncoded == $submittedEncoded)
	{
		$_SESSION['level5'][4] = true;
		return true;
	}

	//print_r($arrayDiff);
	return false;


	
}


function challenge5()
{
	global $mysqlData;
	global $usersJson;

	$submittedArray = array();
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
		$submittedArray[$userArray['username']] = $userArray;
	}


	
	ksort($submittedArray);
	

	$submittedEncoded = json_encode($submittedArray);
	$perfectEncoded = json_encode($perfectArray);
	if ($perfectEncoded == $submittedEncoded)


	{
		$_SESSION['level5'][5] = true;
		return true;
	}

	return false;

}


function challenge6()
{
	global $mysqlData;
	global $usersJson;

	$usersArray = array();
	$perfectArray = array();

	$origUsersArray = json_decode($salariesJson,true);

	foreach ($origUsersArray as $key => $userArray)
	{
		$perfectArray[$userArray['staffname']] = $userArray;
	}

	ksort($perfectArray);

	foreach ($mysqlData as $key => $userArray)
	{
		$usersArray[$userArray['staffname']] = $userArray;
	}

	ksort($userArray);
	$userEncoded = json_encode($userArray);
	$perfectEncoded = json_encode($perfectArray);

	if ($perfectEncoded === $userEncoded)
	{
		$_SESSION['level5'][6] = true;
		return true;
	}

	return false;


}
