<?php
include 'db.php';



$link = mysql_connect('localhost', $username, $password);
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
if (!mysql_select_db('vote')) {
    die('Could not select database: ' . mysql_error());
}
$result = mysql_query('select handle, COUNT(*) as C  from voters group by handle  ORDER BY C DESC');
if (!$result) {
    die('Could not query:' . mysql_error());
}
?>
<table>
<td>HANDLE</td><td>VOTES</td>
<?php
   while ($row = mysql_fetch_assoc($result)) {
		echo "<tr><td>";
                echo $row["handle"] . "</td><td>".$row["C"]."</td>";
        }
?>
</table>
<?php
 mysql_close($link);

?>

