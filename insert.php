<?php
$check1 = $_POST['insert'];
$check2 = $_POST['display'];
$con = mysql_connect("localhost" ,"root","");
if (!$con)
{
die('Could not connect: ' . mysql_error());
}
// Create database
if(mysql_query("CREATE DATABASE my_db",$con))
{
echo "Database created";
}
else
{
echo "Error creating database: " . mysql_error();
}
// Create table in my_db database
mysql_select_db("my_db", $con);
$sql = "CREATE TABLE Person( FirstName varchar(15), LastName varchar(15), Age int )";
mysql_query($sql,$con);
if($check1 == 1)
{
mysql_select_db("my_db", $con);
$sql="INSERT INTO person (FirstName, LastName, Age) VALUES('$_POST[firstname]','$_POST[lastname]','$_POST[age]')";
if (!mysql_query($sql,$con))
{
die('Error: ' . mysql_error());
}
echo "1 record added";
}
if ($check2 == 2) {
mysql_select_db("my_db", $con);
$result = mysql_query("SELECT * FROM person");
echo "<table border='1'>
<tr>
<th>Firstname</th>
<th>Lastname</th>
<th>Age</th>
</tr>";
while($row = mysql_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['FirstName'] . "</td>";
echo "<td>" . $row['LastName'] . "</td>";
echo "<td>" . $row['Age'] . "</td>";
echo "</tr>";
}
echo "</table>";
}
mysql_close($con);
?>