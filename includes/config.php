<?php

	$timezone = date_default_timezone_set("Jamaica");

	$con = mysqli_connect("localhost", "u588490941_wipayhacker", "Everymicklemakeamuckle_876", "u588490941_wipay");
    //The database configurations are the same on both the local and remoteeserver
    //Localhost - CREATE USER 'u588490941_wipayhacker'@'localhost' IDENTIFIED VIA mysql_native_password USING '***';GRANT ALL PRIVILEGES ON *.* TO 'u588490941_wipayhacker'@'localhost' REQUIRE NONE WITH GRANT OPTION MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;GRANT ALL PRIVILEGES ON `u588490941_wipay`.* TO 'u588490941_wipayhacker'@'localhost';
    
	if(mysqli_connect_errno()) {
		echo "Failed to connect: " . mysqli_connect_errno();
	}
?>
