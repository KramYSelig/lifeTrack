<?php
// Turn on error reporting
ini_set('display_errors', 'On');

// I do have the correct password here. Edited just for this post.
$mysqli = new mysqli($dbHostname, $dbUser, $dbPassword, "test");

// Connect to database
if ($mysqli->connect_errno) {
	echo "Connection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
}

if(!($stmt = $mysqli->prepare("INSERT INTO benefits (category, option, amount, units, time) VALUES (?, ?, ?, ?, ?)"))) {
	echo "Prepare failed: " . $stmt->errno . " " . $stmt->error;
}

// $_POST[]: use form names
if(!($stmt->bind_param("ssiss", $_POST['category'], $_POST['option'], $_POST['amount'], $_POST['units'], $_POST['time']))) {
	echo "Bind failed: " . $stmt->errno . " " . $stmt->error;
}

if(!($stmt->execute())) {
	echo "Execute failed: " . $stmt->errno . " " . $stmt->error;
}
else {
	echo "Added " . $stmt->affected_rows . " rows to benefits.";
}

$stmt->close();

?>