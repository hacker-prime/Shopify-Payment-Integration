<?php

// Part 5 - Shopify App Development - How To Save Access Token and Shopify Store URL in MySQL Database
// https://www.youtube.com/watch?v=RhIqSrQGqWI&list=PL-k7XHuPgeIsv2Q6QtJR__h3kkpmqNpH0&index=5

// You are about to install wipay-credit-card-plugin
// wipaywilove
// wipay-credit-card-plugin can't read or write to wipaywilove
// wipay-credit-card-plugin
// This app needs to be reviewed by Shopify before it can be installed. Contact the app developer for more information about this app.

// Get our helper functions
require_once("includes/functions.php");

// https://www.youtube.com/watch?v=RhIqSrQGqWI&list=PL-k7XHuPgeIsv2Q6QtJR__h3kkpmqNpH0&index=5 - Part 5 - Shopify App Development - How To Save Access Token and Shopify Store URL in MySQL Database
require_once("includes/config.php");

// Set variables for our request
$api_key = "a739571fa3664d348072b2fc0e80fad5";
$shared_secret = "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";
$params = $_GET; // Retrieve all request parameters
$hmac = $_GET['hmac']; // Retrieve HMAC request parameter
$shop_url = $params['shop'];


$params = array_diff_key($params, array('hmac' => '')); // Remove hmac from params
ksort($params); // Sort params lexographically

$computed_hmac = hash_hmac('sha256', http_build_query($params), $shared_secret);

// Use hmac data to check that the response is from Shopify or not
if (hash_equals($hmac, $computed_hmac)) {

	// Set variables for our request
	$query = array(
		"client_id" => $api_key, // Your API key
		"client_secret" => $shared_secret, // Your app credentials (secret key)
		"code" => $params['code'] // Grab the access key from the URL
	);

	// Generate access token URL
	$access_token_url = "https://" . $params['shop'] . "/admin/oauth/access_token";

	// Configure curl client and execute request
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_URL, $access_token_url);
	curl_setopt($ch, CURLOPT_POST, count($query));
	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($query));
	$result = curl_exec($ch);
	curl_close($ch);

	// Store the access token
	$result = json_decode($result, true);
	$access_token = $result['access_token'];

	// Show the access token (don't do this in production!)
	// echo $access_token;

	
	// < ----- DATABASE OPERATION ----- > //

	// https://www.tutorialrepublic.com/php-tutorial/php-mysql-prepared-statements.php

	// Prepare an insert statement
	$sql = "INSERT INTO shopify_stores (store_url, access_token, install_date) VALUES (?, ?, ?)";
	
	if($stmt = $con->prepare($sql)){
			// Bind variables to the prepared statement as parameters
			$stmt->bind_param("sss", $shop_url_parameter, $access_token_parameter,$installation_time );
			
			/* Set the parameters values and execute the statement to insert a row */
			$shop_url_parameter = $shop_url;
			$access_token_parameter = $access_token;
			$timezone = new DateTimeZone('Jamaica');
			$datetime = new DateTime();
			$datetime->setTimezone($timezone);
			$installation_time = $datetime->format('Y-m-d H:i:s');
			$stmt->execute(); 
			
			
			// ====================> RUN WEBHOOK FILE & INSERT DATA INTO DATABASE <====================

			include("webhooks.php");

			// ====================> RUN WEBHOOK FILE & INSERT DATA INTO DATABASE <====================

			
				//https://shaynhacker.com/wipay-credit-card-plugin/generate_token.php?code=eeca136305b08b1428a05befb3e73ca0&hmac=1eebe5091f1e4b6dcd5af74ee30d37696a5c6c89101c6c56e88710bbebd2a764&host=d2lwYXlsb3ZlLm15c2hvcGlmeS5jb20vYWRtaW4&shop=wipaylove.myshopify.com&timestamp=1635115667		


		// Redirect Back to Shopify https://wipaylove.myshopify.com/admin/apps
        // https://wipaylove.myshopify.com.myshopify.com/admin/apps - I got this error after commenting out $shop_url - 'wipaylove' out of webhooks.php which is included earlier in this file. Originally there were two references to $shop_url, the first is earlier within this document in the following way $shop_url = $params['shop']; and the second is inside webhooks.php which is included inside this file and is/was used the following way $shop_url = 'wipaylove'; It seems that later down in the file where we reference $shop_url that it's referencing  the second  $shop_url but now that we commented out the only one left is the first one way up in the document and that one has .myshopify attached to the Shopify store's name and hence why we get the following url https://wipaylove.myshopify.com.myshopify.com/admin/apps wehere myshopify appears twice since we append myshopify in the redirect variable below. So the solution is to remove .myshopify.com from the variable directly below 
 

// 		$shopify_redirect = "https://" . $shop_url . ".myshopify.com/admin/apps";
		$shopify_redirect = "https://" . $shop_url . "/admin/apps";

		header("Location: " . $shopify_redirect);
		
// 		https://shaynhacker.com/wipay-credit-card-plugin/wipaylove.myshopify.com/admin/apps - Well I don't want it like this.
		
			// Part 5 - Shopify App Development - How To Save Access Token and Shopify Store URL in MySQL Database 
			// @15:42 - As soon as the merchant install our app they will be redirected to their Shopify Admin page in apps 
			// header('Location: https://' . $shop_url . '/admin/apps');  
			exit();
			
		} else{
			// echo "ERROR: Could not prepare query: $sql. " . $mysqli->error;
			echo "Error Installation: " . $con->error;
		}
		
		// Close statement
		$stmt->close();
		
		// Close connection
		$mysqli->close();

		// < ----- DATABASE OPERATION ----- > //
		
		
    




}



?>