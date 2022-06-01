<?php


// https://shaynhacker.com/wipay-deyah/webhooks/webhooks.php
// https://stackoverflow.com/questions/48404355/shopify-invalid-token-and-password-error
// https://community.shopify.com/c/shopify-apis-and-sdks/api-invalid-api-key-or-access-token/td-p/371055/highlight/false
// I even created new API secret key/access token in the Shopify Partners Account and replaced the prexisting key in webhooks.php and order_paid.php and I get the same error. - https://partners.shopify.com/2153568/apps/6214895/edit 
//  https://community.shopify.com/c/shopify-apis-and-sdks/custom-app-register-webhook-failed/td-p/665010    

// https://deyah.myshopify.com/admin/oauth/install_custom_app?client_id=90a541d4b9b90a0e150eb4a0cde2bdcc&signature=eyJfcmFpbHMiOnsibWVzc2FnZSI6ImV5SmxlSEJwY21WelgyRjBJam94TmpRd01UUTNNVGc0TENKd1pYSnRZVzVsYm5SZlpHOXRZV2x1SWpvaVpHVjVZV2d1YlhsemFHOXdhV1o1TG1OdmJTSXNJbU5zYVdWdWRGOXBaQ0k2SWprd1lUVTBNV1EwWWpsaU9UQmhNR1V4TlRCbFlqUmhNR05rWlRKaVpHTmpJaXdpY0hWeWNHOXpaU0k2SW1OMWMzUnZiVjloY0hBaWZRPT0iLCJleHAiOiIyMDIxLTEyLTI5VDA0OjI2OjI4LjAxOFoiLCJwdXIiOm51bGx9fQ%3D%3D--85bc8104c79c80f95b4132bd250b3581855c1f98
require_once("../includes/functions.php");

$array = array(
    'webhook' => array (
        'topic' => 'orders/create',
        'address' => 'https://shaynhacker.com/wipay-deyah/webhooks/order_paid.php',
        'format' => 'json'
    )
);

$access_token = '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';

$shop_url = 'deyah';

$webhooks = shopify_call($access_token, $shop_url, "/admin/api/2021-10/webhooks.json", $array, 'POST');
  

$webhooks = json_decode($webhooks['response'], true);

echo "<pre>";
        print_r($webhooks);
echo "</pre>";

header("HTTP/1.1 200 OK");


?>
