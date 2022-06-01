<?php

define('SHOPIFY_APP_SECRET', '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'); 

function verify_webhook($data, $hmac_header){
  $calculated_hmac = base64_encode(hash_hmac('sha256', $data, SHOPIFY_APP_SECRET, true));
  return hash_equals($hmac_header, $calculated_hmac);
}

$hmac_header = $_SERVER['HTTP_X_SHOPIFY_HMAC_SHA256'];

$data = file_get_contents('php://input');

$verified = verify_webhook($data, $hmac_header);

error_log('Webhook verified: '.var_export($verified, true)); //check error.log to see the result

if($verified) {
    
    http_response_code(200);
    
    $data_json = json_decode( $data, true );
    
    $response = $data_json;
    
    $shop_domain = $_SERVER['HTTP_X_SHOPIFY_SHOP_DOMAIN'];

    $log = fopen( $shop_domain . ".json", "w") or die("Cannot open or create this file😭");
    
    $fwrite = fwrite( $log, json_encode($response) );
    

    include("../includes/config.php");

        
     // Prepare an insert statement
    $sql = "INSERT INTO shopify_orders (shopify_id, app_id, checkout_id, checkout_token, confirmed, contact_email, created_at,currency, current_total_price, gateway,first_name,last_name,fulfillable_quantity, product_name, shopify_shop) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
     
    if($stmt = $con->prepare($sql)){

    // Bind variables to the prepared statement as parameters
    $stmt->bind_param("sssssssssssssss", $shopify_id_variable,$app_id_variable, $checkout_id_variable, $checkout_token_variable,$confirmed_variable, $contact_email_variable,$created_at_variable,$currency_variable,$current_total_price_variable,$gateway_variable,$first_name_variable,$last_name_variable, $fulfillable_quantity_variable, $product_name_variable, $vendor_variable);    
    
    /* Set the parameters values and execute the statement to insert a row */
    $shopify_id_variable = $data_json['id'];
    $app_id_variable = $data_json['app_id'];
    $checkout_id_variable = $data_json['checkout_id'];    
    $checkout_token_variable = $data_json['checkout_token'];
    $confirmed_variable = $data_json['confirmed'];
    $contact_email_variable = $data_json['contact_email'];
    $created_at_variable = $data_json['created_at'];
    $currency_variable = $data_json['currency'];
    $current_total_price_variable = $data_json['current_total_price'];
    $gateway_variable = $data_json['gateway'];
    $first_name_variable = $data_json['billing_address']['first_name'];
    $last_name_variable = $data_json['billing_address']['last_name'];
    
    $line_items = [];
    foreach($data_json["line_items"] as $item) {
             $line_items["quantity"] = $item["fulfillable_quantity"];
             $line_items["product_name"] = $item["name"];
             $line_items["vendor"] = $item["vendor"];
         }
         
    $fulfillable_quantity_variable = $line_items["quantity"];   
    $product_name_variable = $line_items["product_name"];     
    $vendor_variable = $line_items["vendor"];           
     
         
    $stmt->execute();

    }else{
        error_log('Response: '. "ERROR: Could not prepare query: $sql. " . $con->error); //check error.log to see the result
    }
    
} else {

  $response = 'The request is not from Shopify ⚠️';
  
  $shop_domain = $_SERVER['HTTP_X_SHOPIFY_SHOP_DOMAIN'];
  
  $log = fopen( $shop_domain . ".json", "w") or die("Cannot open or create this file😭");
    
  $fwrite = fwrite( $log, json_encode($response) );

}

?>