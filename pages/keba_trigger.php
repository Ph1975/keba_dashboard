<?php
$ip = "192.168.50.185";
$port = 7090;

$fp = stream_socket_client("udp://$ip:$port", $errno, $errstr);

if (isset($_GET["a"]) && $_GET["a"] == "history") {
	for ($i = 101; $i < 120; $i++) {
		usleep(500);
		fwrite($fp, "report $i");
	}
}

if (isset($_GET["a"]) && $_GET["a"] == "current") {
	usleep(100);
	fwrite($fp, "report 2");
	usleep(100);
	fwrite($fp, "report 3");
	usleep(100);
	fwrite($fp, "report 1");
}

if (isset($_GET["a"]) && $_GET["a"] == "currtime") {
	
	if (isset($_GET["current"]) && isset($_GET["delay"])) {
		$current = (int)$_GET["current"];
		$delay = (int)$_GET["delay"];
		if ($delay < 0 || $delay > 82800) {
			$delay = 0;
		}
		fwrite($fp, "currtime " . $current . " " . $delay);
	}
	
}


fclose($fp);
