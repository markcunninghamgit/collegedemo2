<?php

require_once('connect.php');
require_once('level5challenges.php');


if (isset($_GET['queryTarget']))
{
	if ($_GET['queryTarget'] == 'users')
	{
		$query = "select username,password from users where username = '" . mysql_real_escape_string($_GET['username']) . "' and password = '" .
			mysql_real_escape_string($_GET['password']) . "'";
	}

	if ($_GET['queryTarget'] == 'salaries')
	{
		$query = "select * from salaries2012 where position = '" . mysql_real_escape_string($_GET['position']) . "' and salary > " . mysql_real_escape_string($_GET['salary']) . "'";
	}
	
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

<h1>Level 5: Incorrect input validation</h1>
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
<p>You'll find now that instead of inputting the whole query, part of the query has already been written for you. There are 2 query boxes each with
the query written around them to make it easier. In the real world, you'd just have a username/password box or just a movie title search box. <br />
see if you can complete the same challenges as level2 with these restrictions in place</p>
</p>
<h2>Challenges</h2>
<p>Use a specific query to get back data so it match the following requirements. Remember, the number of columns returned needs to be the same <br />
so you may need to use either on query or the other in order to return the data you want</p>
<table border="1">
	<tr>
		<th>Challenge</th>
		<th>Solved by current query</th>
		<th>Previously solved</th>

	</tr>

<!--	<tr>
		<td>get the usernamd + password for user bob and bob only</td>
		<td><?php showResult(challenge1()); ?> </td>
		<td><?php showResult($_SESSION['level4'][1]);?> </td>
	</tr>
-->
	<tr>
		<td>Get 4 rows of data</td>
		<td><?php showResult(challenge2()); ?> </td>
		<td><?php showResult($_SESSION['level4'][2]);?> </td>
	</tr>


	<tr>
		<td>Get all the movies but making all their ratings 500</td>
		<td><?php showResult(challenge3()); ?> </td>
		<td><?php showResult($_SESSION['level4'][3]);?> </td>
	</tr>



	<tr>
		<td>Get all the users except ianboyle</td>
		<td><?php showResult(challenge4()); ?> </td>
		<td><?php showResult($_SESSION['level4'][4]);?> </td>
	</tr>

	<tr>
		<td>Get all the users but make ianboyles password = "abc" <br /> (based off previous challenge)</td>
		<td><?php showResult(challenge5()); ?> </td>
		<td><?php showResult($_SESSION['level4'][5]);?> </td>
	</tr>

	<tr>
		<td>Get the 2 most interesting fields of all the data from the table you discovered in lesson 3 <br />
HINT: This is a table we haven't disclosed in the list above (ie not users or movies)</td>
		<td><?php showResult(challenge6()); ?> </td>
		<td><?php showResult($_SESSION['level4'][6]);?> </td>
	</tr>



</table>
<p>This is a great link for more examples of sql queries<a href="http://www.w3schools.com/sql/sql_select.asp">http://www.w3schools.com/sql/sql_select.asp</a></p>
<h1>Enter your sql query</h1>
<form action="" method="GET" >
Query: select username,password from users where username = 'mysql_real_escape(<input type="text" name="username" size="40" />)'  
and password = ' mysql_real_escape_string(<input type="text" name="password" size="40" />)';
<input type="hidden" value="users" size="40" name="queryTarget" />
<input type="submit">
</form>


<h1>Enter your sql query 2</h1>
<form action="" method="GET" >
Query: select * from salaries2012 where position = ' mysql_real_escape_string(<input type="text" name="position" size="50" />)' and
salary &#62 mysql_real_escape_string(<input type="text" name ="salary" size="40" />);
<input type="hidden" value="salaries" name="queryTarget" />
<input type="submit">
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
