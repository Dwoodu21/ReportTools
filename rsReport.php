<?php
$page_title='View the Current Data';
include ('/home/a4731696/public_html/stockReport/htdocs/includes/headerR.html');
echo '<h1>Cut To Length Report</h1>';

require ('../mysqli_connect.php');

$q="SELECT date, out_len, out_wid, out_lay, id_num FROM ctl ORDER BY date ASC";
$r=@mysqli_query($dbc, $q);  

//count the number of returned rows

$num = mysqli_num_rows($r);
if ($num > 0)  {
	echo "<p>There are currently $num records</P>\n";
	
	echo '<table align="center" cellspacing="3" cellpadding="3" width="80%">
		<tr>
			<td align = "left"><b>Length</b></td>
			<td align = "left"><b>Width</b></td>
			<td align ="left"><b>Layers</b></td>
			<td align = "left"><b>ID</b></td>
			<td align = "left"><b>Date</b></td>
			<td align = "left"><b>Total</b></td>
		</tr>';

while ($row=mysqli_fetch_array($r, MYSQLI_ASSOC)) {
	echo '<tr>
			<td align = "left">' . $row['out_len'] . '</td>
			<td align = "left">' . $row['out_wid'] . '</td>
			<td align = "left">' . $row['out_lay'] . '</td>
			<td align = "left">' . $row['id_num'] . '</td>
			<td align = "left">' . $row['date'] . '</td>
			<td align = "left">' . $row['out_len'] * $row['out_wid'] * $row['out_lay']/144 .'</td>
		</tr>';
	
}
echo '</table>';

mysqli_free_result ($r);
} else {
	echo '<p class="error">There are currently no records.</p>';
	
}
mysqli_close($dbc);
?>