<?php
$page_title='View the Current Data';
include ('/home/a4731696/public_html/stockReport/htdocs/includes/headerR.html');
echo '<h1>Rip Saw #4</h1>';

require ('../mysqli_connect.php');

$q="SELECT date, o_len, o_wid, o_lay, i_len, i_wid, i_lay, id_num FROM r4 ORDER BY date ASC";
$r=@mysqli_query($dbc, $q);  

//count the number of returned rows

$num = mysqli_num_rows($r);
if ($num > 0)  {
	echo "<p>There are currently $num records</P>\n";
	
	echo '<table align="center" cellspacing="3" cellpadding="3" width="100%">
		<tr>
			<td align = "left"><b>Outbound Length</b></td>
			<td align = "left"><b>Outbound Width</b></td>
			<td align ="left"><b>Outbound Layers</b></td>
			<td align = "left"><b>ID</b></td>
			<td align = "left"><b>Date</b></td>
			<td align = "left"><b>Outbound Total</b></td>
		</tr>';
	echo '</br>';

while ($row=mysqli_fetch_array($r, MYSQLI_ASSOC)) {
	echo '<tr>
			<td align = "left">' . $row['o_len'] . '</td>
			<td align = "left">' . $row['o_wid'] . '</td>
			<td align = "left">' . $row['o_lay'] . '</td>
			<td align = "left">' . $row['id_num'] . '</td>
			<td align = "left">' . $row['date'] . '</td>
			<td align = "left">' . $row['o_len'] * $row['o_wid'] * $row['o_lay']/144 .'</td>
		</tr>';
}

echo '</table>';
mysqli_free_result ($r);
} else {
	echo '<p class="error">There are currently no records.</p>';
	
}
echo '</br>';
$q="SELECT date, o_len, o_wid, o_lay, i_len, i_wid, i_lay, id_num FROM r4 ORDER BY date ASC";
$r=@mysqli_query($dbc, $q);  
$num = mysqli_num_rows($r);
if ($num > 0)  {
echo '<table align="center" cellspacing="3" cellpadding="3" width="100%">
		<tr>
			<td align = "left"><b>Inbound Length </b></td>
			<td align = "left"><b>Inbound Width </b></td>
			<td align ="left"><b>Inbound Layers </b></td>
			<td align = "left"><b>ID</b></td>
			<td align = "left"><b>Date</b></td>
			<td align = "left"><b>Inbound Total</b></td>
		</tr>';
		
	while ($row=mysqli_fetch_array($r, MYSQLI_ASSOC)) {
		echo '<tr>
			<td align = "left">' . $row['i_len'] . '</td>
			<td align = "left">' . $row['i_wid'] . '</td>
			<td align = "left">' . $row['i_lay'] . '</td>
			<td align = "left">' . $row['id_num'] . '</td>
			<td align = "left">' . $row['date'] . '</td>
			<td align = "left">' . $row['i_len'] * $row['i_wid'] * $row['i_lay']/144 .'</td>
		</tr>';
	}
	
echo '</table>';


mysqli_free_result ($r);
} else {
	echo '<p class="error">There are currently no records.</p>';
	
}
mysqli_close($dbc);
?>