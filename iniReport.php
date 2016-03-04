<?php
$page_title='View the Current Data';
include ('/home/a4731696/public_html/stockReport/htdocs/includes/headerR.html');
echo '<h1>Initial Length Report</h1>';

require ('../mysqli_connect.php');

$q="SELECT id_num, lot, int_leng, int_wid FROM preCtl ORDER BY lot ASC";
$r=@mysqli_query($dbc, $q);  

//now let us see the results

if (!$r) {
	printf("Error in connection: %s\n", mysqli_error($dbc));
	exit();
}

while ($row=mysqli_fetch_assoc($r)) {
	$table[] = $row; //add each row
}
?>

<table>
	<tr>
		<td><strong>Id Number</strong></td>
		<td width="10">&nbsp;</td>
		<td><strong>Lot</strong></td>
		<td width="10">&nbsp;</td>
		<td><strong>Initial Length</strong></td>
		<td width="10">&nbsp;</td>
		<td><strong>Width</strong></td>
		<td width="10">&nbsp;</td>
	</tr>
 <?php
 if($table) {
	 foreach($table as $d_row) {
?>

	<tr>
		<td><?php echo($d_row["id_num"]);?></td>
		<td width = "10">&nbsp;</td>
		<td><?php echo($d_row["lot"]);?></td>
		<td width = "10">&nbsp;</td>
		<td><?php echo($d_row["int_leng"]);?></td>
		<td width = "10">&nbsp;</td>
		<td><?php echo($d_row["int_wid"]);?></td>
		<td width = "10">&nbsp;</td>
	</tr>
	
	<?php
	 }
 }
 ?>
</table>

<p>Number of records:<?php echo(mysqli_num_rows($r));?></P>

<?php
mysqli_close($dbc);
?>

<br/><br/><br/>
<?php 
include ('/home/a4731696/public_html/stockReport/htdocs/includes/footer.html');
?>