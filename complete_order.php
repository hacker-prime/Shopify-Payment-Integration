<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/install.css">
</head>
<body>

        <center>

            <div class="text" data-sr-id="6">
                    <strong> <a>WiPay</a> <span class="type"></span><span class="typed-cursor"></span></strong>
            </div>    

         </center>


<!-- https://stackoverflow.com/questions/22658141/css-center-form-in-page-horizontally-and-vertically/22658297 -->
        <form action="" method="POST">
            <input placeholder="Enter your email here."  type="text" value="" name="email" />  
            <div style="padding:5px;"></div>
            <!-- <input placeholder="Your API key"  type="text" value="" name="shopify-api-key" />   -->
            <!-- https://stackoverflow.com/questions/4221263/center-form-submit-buttons-html-css -->            
            <div id="input_submit">
                <input name="submit" type="submit" value="Submit" name="go" />
            </div>    
        </form>

        
    <!-- https://www.youtube.com/watch?v=fMcpordI7Wk&t=26s (Auto Text Typing Animation Effect Using HTML CSS And JavaScript) -->
    <script src="assets/js/typed.min.js"></script>
        
    <script>

    var typed = new Typed('.type', {

    strings: ['Shopify','Wix','Jamaican', 'USD','Trinidadian'],
    typeSpeed:100,
    backSpeed:70,
    loop:true,
    }); 

    </script>


</body>
</html>

<?php

include("includes/config.php");


if(isset($_GET["email"])) { 

//Instead of having a user type the name of the store in the url we would make them do so via a form
$email =$_GET["email"];

// echo $email;


// echo $email;

$sql = "SELECT * FROM shopify_orders WHERE contact_email=?"; // SQL with parameters
$stmt = $con->prepare($sql); 
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result(); // get the mysqli result
$shop = $result->fetch_assoc(); // fetch data  
$stmt->close();

$shop_addition = ".myshopify.com";

$shop_modified = $shop["shopify_shop"].$shop_addition;

// echo $shop_modified;

$sql = "SELECT * FROM shopify_stores WHERE store_url=?";
$stmt = $con->prepare($sql); 
$stmt->bind_param("s", $shop_modified);
$stmt->execute();
$result = $stmt->get_result(); // get the mysqli result
$shop_configurations = $result->fetch_assoc(); // fetch data  
$stmt->close();


// echo $shop_configurations; Outputs Array

// echo $shop_configurations["store_url"]; // Outputs wipaylove.myshopify.com
// echo $shop_configurations["currency"];


// --------------------> WIPAY API <-------------------- //

// The url passed into curl_init will have to change dependent on the currency value in the database.
// So if the currency is JMD then change the url to https://jm.wipayfinancial.com/plugins/payments/request (Page 11)
//The value for response_url will have to change as well in relation to the value in the currency column    
//The value of country_code would have to change too.


// https://stackoverflow.com/questions/16377363/php-replace-all-dots-to-comma
//Replace all dots (.) to underscore (_)
//$str = str_replace('.', '_', $str)
$str = str_replace('.', '_', $shop_configurations["store_url"]);

if ( $shop_configurations["environment"] == "sandbox" ) {
    $environment = "sandbox";
    $account_number = $shop_configurations["SandboxAccountNumber"];
}

if ( $shop_configurations["environment"] == "live" ) {
    $environment = "live";
    $account_number = $shop_configurations["LiveAccountNumber"];
}

if ( $shop_configurations["currency"] == "JMD" ) {
    $curl_init_variable = "https://jm.wipayfinancial.com/plugins/payments/request";
    $country_code = "JM";
    $response_url = "https://jm.wipayfinancial.com/response/";
}


if ( $shop_configurations["currency"] == "TTD" ) {
    $curl_init_variable = "https://tt.wipayfinancial.com/plugins/payments/request";
    $country_code = "TT";
    $response_url = "https://tt.wipayfinancial.com/response/";
}

if ( $shop_configurations["currency"] == "USD" ) {
    $curl_init_variable = "https://tt.wipayfinancial.com/plugins/payments/request";
    $country_code = "TT";
    $response_url = "https://tt.wipayfinancial.com/response/";
}




$curl =
curl_init($curl_init_variable);
curl_setopt_array($curl, [
CURLOPT_FOLLOWLOCATION => false,
CURLOPT_HEADER => false,
CURLOPT_HTTPHEADER => [
'Accept: application/json',
'Content-Type: application/x-www-form-urlencoded'
],
CURLOPT_POST => true,
CURLOPT_POSTFIELDS => http_build_query([
'account_number' => $account_number,
'avs' => '0',
'country_code' => $country_code,
// Page 22 - WiPay API Documents
'currency' => $shop_configurations["currency"],
'data' => '{"a":"b"}',
'environment' => $environment,
'fee_structure' => $shop_configurations["FeeStructure"],
'method' => 'credit_card',
'order_id' => $shop["checkout_id"],
'origin' => $str,
'response_url' => 'https://jm.wipayfinancial.com/response/',
'total' => $shop["current_total_price"]
]),
CURLOPT_RETURNTRANSFER => true
]);
$result = curl_exec($curl);
curl_close($curl);
# result in JSON format (header)
$result = json_decode($result);
# perform redirect
header("Location: {$result->url}");
die();


// --------------------> WIPAY API <-------------------- //





}




?>

