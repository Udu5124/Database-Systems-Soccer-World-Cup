<?php
$cname=$_POST['cname'];
$ccolor=$_POST['ccolor'];

$host="localhost";
$dbuser="root";
$dbpassword="";
$dbname="worldcup";

if(!empty($cname)||!empty($ccolor))
{
$con= mysqli_connect($host,$dbuser,$dbpassword,$dbname);
if(mysqli_connect_error())
{
	die('Connect Error ('.mysqli_connect_errno().')'.mysqli_connect_error());
}
else
{
	$result = mysqli_query($con,"SELECT C.GameID, R.PName FROM player AS R JOIN cards AS C ON R.PNo = C.PNo AND R.TeamID=C.TeamID WHERE R.PNo = C.PNo AND R.Team='$cname' AND C.Color='$ccolor'");

				echo "<table>";
				echo "<tr>";
				echo "<th>GameID</th>";
				echo "<th>Player name</th>";
				echo "</tr>";
				while($row = mysqli_fetch_array($result))
				{
				echo "<tr>";
				echo "<td>" . $row['GameID'] . "</td>";
				echo "<td>" . $row['PName'] . "</td>";
				echo "</tr>";
				}
				echo "</table>";
}
}
else
{
	echo "Enter the country name.";
}
$con->close();
?>