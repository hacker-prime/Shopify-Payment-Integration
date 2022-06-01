<?php


require_once("../includes/functions.php");


//https://shopify.dev/api/admin-rest/2021-10/resources/webhook#[get]/admin/api/2021-10/webhooks.json

$array = array(
    'webhooks/1119429460209'
);

$access_token = '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';
$shop_url = 'deyah'; 


$webhooks = shopify_call($access_token, $shop_url, "/admin/api/2021-10/webhooks/1119429460209.json", $array, 'DELETE');


$webhooks = json_decode($webhooks['response'], true);

echo "<pre>";
        print_r($webhooks);
echo "</pre>";

?>
