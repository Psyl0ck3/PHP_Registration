<?php  

if (isset($_GET['doctorName'])) {
	echo "<h2>Doctor Name: " . $_GET['doctorName']. "</h2>";
}

if (isset($_GET['yearLevel'])) {
	echo "<h2>Specialization: " . $_GET['specialization'] . "</h2>";
}
?>