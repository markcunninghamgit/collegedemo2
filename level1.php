<?php

require_once('connect.php');



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

<h1>Level1: Basic sql queries</h1>
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
<p>Try out all of the following examples by copying and pasting them into the query window<br />
You'll find the names of the tables and columns above. Use these to change each query and see how the result is affected <br />
Not every query is written to work successfully. You should see a mysql error appear when that does. See what sort of information <br />
each error gives when the query has been formed badly (uneven ', or no table name specified or just bad syntax etc</p>
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
	<li>select * from movies where title = "batman" union select "movie that doesn't exist", "this isnt even a number!", "most awesome movie ever"</li>
	<li>show tables;</li>
	<li>select 1,2; show tables;</li> 
	<li>select "admin", "123456" union select "johny", "mypassword123"</li>
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
