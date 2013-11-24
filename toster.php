<?php
if (isset($_GET['q']) && is_numeric($_GET['q']) && $_GET['q']>0) {
	$mysqli = mysqli_connect("localhost", "", "", "");
	if (!$mysqli) die('ошибка mysql');
	$q = $_GET['q'];
	if (isset($_GET['count'])) {
		$res = mysqli_query($mysqli, "SELECT COUNT(*) FROM minus WHERE q = $q");
		$row = mysqli_fetch_row($res);
		$callback = $_GET['callback'];
		echo $callback."({'count':$row[0]})";
	} else
		mysqli_query($mysqli, "INSERT INTO minus SET ip = INET_ATON('".$_SERVER["REMOTE_ADDR"]."'), q = $q");
	mysqli_close($mysqli);
}
?>