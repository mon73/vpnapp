<?php
$extention = '.ovpn';
$valid_app_signature = "enJcF/72sWyLizbU2vucFyTVKX0="; // DEV KEY

if(isset($_GET['server_type']) && isset($_GET['secret_key']) && strcmp($valid_app_signature,$_GET['secret_key'])==0)
{
	$file = $_GET['server_type'].$extention;
	if (file_exists($file)) {
	    header('Content-Description: File Transfer');
	    header('Content-Type: application/octet-stream');
	    header('Content-Disposition: attachment; filename="'.basename($file).'"');
	    header('Expires: 0');
	    header('Cache-Control: must-revalidate');
	    header('Pragma: public');
	    header('Content-Length: ' . filesize($file));
	    readfile($file);
	    exit;
	}
}
else
{
	echo "Unauthenticated access to VPN server.";
}
?>