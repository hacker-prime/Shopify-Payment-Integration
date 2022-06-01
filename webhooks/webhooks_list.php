<?php


require_once("../includes/functions.php");


//https://shopify.dev/api/admin-rest/2021-10/resources/webhook#[get]/admin/api/2021-10/webhooks.json

$array = array(
    'webhooks'
);

$access_token_webhook = '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';

// $access_token = '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';

// This no longer works because the $shop_url I used in generate_token.php is the one at the very top rather than from webhooks.php where I change it's value/reassignes its' value to a hardercoded one which was 'wipaylove' but now  it's no longer just 'wipay' because I only use $shop_url = $params['shop']; which attaches .myshopify.com to the shop name
$shop_url = 'deyah';

// $shop_url = 'wipaylove.myshopify.com'; - This isn't working because it doesn't accept .myshopify.com

$webhooks = shopify_call($access_token_webhook, $shop_url, "/admin/api/2021-10/webhooks.json", $array, 'GET');

// $webhooks = shopify_call($access_token, $shop_url, "/admin/api/2021-10/webhooks.json", $array, 'GET');


$webhooks = json_decode($webhooks['response'], true);

echo "<pre>";
        print_r($webhooks);
echo "</pre>";

?>
