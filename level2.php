<?php

require_once('connect.php');
require_once('level2challenges.php');


if (isset($_GET['query']))
{
	$query = $_GET['query'];

	$result = mysql_query($query);

	if (!$result)
	{
		$error = mysql_error();
	}
	else
	{
		$mysqlData = fetchall($result);
		$mysqlReturnRows = mysql_num_rows($result);
		$mysqlReturnFields = mysql_num_fields($result);
	}
}

?>


<html>

<body>

<h1>Level2: Requesting specific data</h1>
<a href="index.php">Back to main page</a>


<h3>Tables</h3>

<table border="1">
	<tr>
		<th>Table name</th>
		<th>Field</th>
	</tr>


	<tr>
		<td>users</td>
		<td>username,password,avatar</td>
	</tr>

	<tr>
		<td>movies</td>
		<td>title,rating,description</td>
	</tr>


</table>
<h2>Lesson Objective</h2>
<p>Now I want you to see if you can craft the queries to only return very specific data. When you have met the requirements of each challenge <br />
it will show as solved. 
</p>
<h2>Challenges</h2>
<p>Use a specific query to get back data so it match the following requirements</p>
<table border="1">
	<tr>
		<th>Challenge</th>
		<th>Solved by current query</th>
		<th>Previously solved</th>

	</tr>

	<tr>
		<td>Select the user bob and only bob</td>
		<td><?php showResult(challenge1()); ?> </td>
		<td><?php showResult($_SESSION['level2'][1]);?> </td>
	</tr>

	<tr>
		<td>Get 4 rows of data</td>
		<td><?php showResult(challenge2()); ?> </td>
		<td><?php showResult($_SESSION['level2'][2]);?> </td>
	</tr>


	<tr>
		<td>Get all the movies but making all their ratings 500</td>
		<td><?php showResult(challenge3()); ?> </td>
		<td><?php showResult($_SESSION['level2'][3]);?> </td>
	</tr>



	<tr>
		<td>Get all the users except ianboyle</td>
		<td><?php showResult(challenge4()); ?> </td>
		<td><?php showResult($_SESSION['level2'][4]);?> </td>
	</tr>

	<tr>
		<td>Get all the users but make ianboyles password = "abc" <br /> (based off previous challenge)</td>
		<td><?php showResult(challenge5()); ?> </td>
		<td><?php showResult($_SESSION['level2'][5]);?> </td>
	</tr>


</table>
<h2>Examples</h2>
<ul>
	<li>select * from movies</li>
	<li>select * from 'movies</li>
	<li>select * from movies order by rating</li>
	<li>select title from movies</li>
	<li>select rating,title,"myownstring" from movies</li>
	<li>select * from movies where title = "batman" or title = "matrix"</li>
	<li>select * from movies where title = "batman" or title = "matrix" or 5 &#62; 2 </li>
	<li>select * from movies where title = "batman" or title = "matrix" or 10 &#62; 4 </li>
	<li>select * from movies union select "movie that doesn't exist", 15, "the most awesome movie you've ever seen because it doesn\'t exist"</li>
	<li>show tables;</li>
	<li>select 1,2; show tables;</li> 
	<li>select * from movies limit 2</li>
	<li>select * from users</li>
	<li>select username,password from users</li>
	<li>select username, "haha-i-can-make-your-password-what-you-want" from users</li>
	<li>select title,rating from movies union select username,password from users</li>
	<li>select * from movies -- - i can put anything i want in here and it won't matter because it won't get executed, *********()()()()!!!""""!**</li>
	<li>select * from movies # also i can use # symbols as well as -- -</li>
</ul>
<p>This is a great link for more examples of sql queries<a href="http://www.w3schools.com/sql/sql_select.asp">http://www.w3schools.com/sql/sql_select.asp</a></p>
<h1>Enter your sql query</h1>
<form action="" method="GET" >
Query: <input type="text" name="query" size="100" /> <br />
</form>



<h2>Query results</h2>
<h4>Result information</h4>

<table border="1">
	<tr>
		<th>Header</th>
		<th>Data</th>
	<tr>
	
	<tr>
		<td>Number of results</td>
		<td> <?php echo $mysqlReturnRows;?></td>
	</tr>
	<tr>
		<td>Mysql error (if any)</td>
		<td><b><font color="red"> <?php echo htmlentities($error); ?></font></b></td>
	</tr>
	<tr>
		<td>Query</td>
		<td><font color="green"><?php echo htmlentities($query); ?></font></td>
	</tr>
</table>

<h4>Data returned</h4>
<?php if ($result) :?>
	<table border="1">
		<tr>
			<?php foreach ($mysqlData[0] as $column => $unwantedData) :?>
				<th><?php echo $column;?></th>
			<?php endforeach;?>
		</tr>

		<?php
		foreach ($mysqlData as $key => $mysqlRow) :?>
		<tr>
			<?php foreach ($mysqlRow as $fieldName => $mysqlCell) :?>
				<td><?php echo $mysqlRow[$fieldName];?></td>
			<?php endforeach;?>
		</tr>
		<?php endforeach;?>
	</table>	
<?php endif;?>






</html>
