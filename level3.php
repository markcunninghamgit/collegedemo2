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

<h1>Level3: Retrieving table/column names </h1>
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
<h2>Lesson objective</h2>
<p>There's a special virtual table in mysql (not in other sql servers) that can show you all the information about the tables/columns/fields<br />
In the previous example, I gave you 2 table names. Now i want you to retrieve the rest. First start executing the following statements<br />
and having a glance through the result. See if you can find the tables and column names stated above? Are there any extra?</p>
<p>You might be wondering, why do we need to do this? What about the "show tables" command? You might note, when you used this in the previous <br />
example, that it only worked when it was the only query you used. If you tried to string it together with something else it fails, making it <br />
unsuitable when we can only append to a query and not write the whole thing ourselves </p>
<h2>Examples</h2>
<ul>
	<li>select * from information_schema.tables</li>
	<li>select * from information_schema.columns</li>
<ul>
<p>This is a great link for more examples of sql queries<a href="http://www.w3schools.com/sql/sql_select.asp">http://www.w3schools.com/sql/sql_select.asp</a></p>
<h1>Enter your sql query</h1>
<form action="level1.php" method="GET" >
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
