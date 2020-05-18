<?php
$tname=$_POST['cname'];

$host="localhost";
$dbuser="root";
$dbpassword="";
$dbname="worldcup";

if(!empty($tname))
{
$con= mysqli_connect($host,$dbuser,$dbpassword,$dbname);
if(mysqli_connect_error())
{
	die('Connect Error ('.mysqli_connect_errno().')'.mysqli_connect_error());
}
else
{
	$result = mysqli_query($con,"SELECT S.GameID, S.PNo, R.PName FROM player AS R JOIN starting_lineups AS S on R.PNo = S.PNo AND R.TeamID=S.TeamID WHERE R.PNo = S.PNo AND R.Team='$tname' ORDER BY S.GameID, S.PNo");

				echo "<table>";
				echo "<tr>";
				echo "<th>GameID</th>";
				echo "<th>Player name</th>";
				echo "<th>Player number</th>";
				echo "</tr>";
				
				while($row = mysqli_fetch_array($result))
				{
				echo "<tr>";
				echo "<td>" . $row['GameID'] . "</td>";
				echo "<td>" . $row['PName'] . "</td>";
				echo "<td>" . $row['PNo'] . "</td>";
				
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