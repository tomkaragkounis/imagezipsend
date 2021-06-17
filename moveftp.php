<?php

$zip_dir="***".$orderid.'.zip';
$file = $zip_dir;
$remote_file = "ftp/".$orderid.'.zip';
$ftp_server = "****";
$ftp_user_name = "***";
$ftp_user_pass = "***";
// set up basic connection
$conn_id = ftp_connect($ftp_server);

// login with username and password
$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);
ftp_pasv($conn_id, true); 
// upload a file
if (ftp_put($conn_id, $remote_file, $file, FTP_BINARY)) {

} else {
 
}

// close the connection
ftp_close($conn_id);
?>