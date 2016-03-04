<?php
// Connect to the database:
$dbc = mysqli_connect('mysql16.000webhost.com', 'a4731696_sReport', 'pob1745', 'a4731696_sReport');
echo '<select name="year">';
for ($year = 2011; $year <= 2020; $year++) {
	echo "<option value=\"$year\">$year</option>\n";
}
echo '</select>';

echo '<select name="month">';
for ($month = 1; $month <= 12; $month++) {
	echo "<option value=\"$month\">$month</option>\n";
}
echo '</select>';

echo '<select name="day">';
for ($day = 1; $day <= 31; $day++) {
	echo"<option value=\"$day\">$day</option>\n";
}
echo '</select>';
?>