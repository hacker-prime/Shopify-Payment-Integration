<?php

include("../includes/config.php");

// ----------> INSERT with all values filled out at the same time <----------
if ( isset($_POST['live-apikey'])  && isset($_POST['live-accountnumber']) && !empty( $_POST['live-environment'] ) ) {
    
    $store = $_POST['shop'];

    $liveapikey = $_POST['live-apikey'];
    $liveaccountnumber = $_POST['live-accountnumber'];
    $liveenvironment = $_POST['live-environment'];  


    // Database Operations
    // https://phpdelusions.net/mysqli_examples/prepared_select
    $sql = "SELECT * FROM shopify_stores WHERE store_url = ?";
    $stmt = $con->prepare($sql); 
    // The bind_param originally used the hardcoded value below of $store_url but we have to make it dynamic so it will change values based on any given store using the plugin and that's done by taking the value from the url parameter of shop which is added there by Shopify when the iframe is inserted into the Shopify Admin
    $stmt->bind_param("s", $store);

    // $store_url = "wipaylove.myshopify.com";

    $stmt->execute();
    $result = $stmt->get_result(); // get the mysqli result
    $user = $result->fetch_assoc(); // fetch data   
    // echo $user; //Gives an empty result via the alert and console.log method on the frontend because in the very beginning there wouldn't be any values in the databse for any specific store_url

    if(empty($user)){
        $stmt->close();
        // echo "The user variable is empty.";
        // Prepare an insert statement
        $sql = "INSERT INTO shopify_stores (store_url, LiveAPIKey, LiveAccountNumber, environment) VALUES (?, ?, ?, ?)";
        
        if($stmt = $con->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ssss", $store, $liveapikeyplaceholder, $liveaccountnumberplaceholder, $liveenvironmentplaceholder);
            
            /* Set the parameters values and execute the statement */
            // $store_url = "wipaylove.myshopify.com";
            $liveapikeyplaceholder = $liveapikey;
            $liveaccountnumberplaceholder = $liveaccountnumber;
            $liveenvironmentplaceholder = $liveenvironment;

            $stmt->execute();    

            echo "Live credentials inserted successfully.";

            return;
        } else{
            echo "ERROR: Could not prepare query: $sql. " . $con->error;
        }
    } 
    
    // else {

    //     $stmt->close();
    //     // echo "There's already a row in the table/database with information";

    //     $sql = "UPDATE shopify_stores SET LiveAPIKey=?, LiveAccountNumber=? WHERE store_url=?";

    //     if($stmt = $con->prepare($sql)){
    //         $stmt= $con->prepare($sql);
    //         $stmt->bind_param("sss", $liveapikeyplaceholder, $liveaccountnumberplaceholder, $store_url);
    //         /* Set the parameters values and execute
    //         the statement again to insert a row */
    //         $store_url = "wipaylove.myshopify.com";
    //         $liveapikeyplaceholder = $liveapikey;
    //         $liveaccountnumberplaceholder = $liveaccountnumber;
    //         $stmt->execute();

    //         echo "Live credentials updated successfully.";
    //     } else{
    //         echo "ERROR: Could not prepare query: $sql. " . $con->error;
    //     }    

    // }



}


// ----------> UPDATE only the API key and live number <----------
if (  !empty($_POST['live-apikey']) || !empty($_POST['live-accountnumber'])     ) {
    
    $store = $_POST['shop'];


    $liveapikey = $_POST['live-apikey'];
    $liveaccountnumber = $_POST['live-accountnumber'];


    $liveenvironment = $_POST['live-environment'];  

    $sql = "UPDATE shopify_stores SET liveAPIKey=?,liveAccountNumber=? WHERE store_url=?";

    if($stmt = $con->prepare($sql)){

        $stmt->bind_param("sss", $liveapikeyplaceholder,$liveaccountnumberplaceholder,$store);
        /* Set the parameters values and execute the statement again to insert a row */
        // $store = "wipaylove.myshopify.com";
        $liveapikeyplaceholder = $liveapikey;
        $liveaccountnumberplaceholder = $liveaccountnumber;
        $stmt->execute();

        echo "live updated successfully.";
        return;

    } else{
        echo "ERROR: Could not prepare query: $sql. " . $con->error;
    }  


}
// ----------> UPDATE only the API key and live number <----------

// ----------> UPDATE only the live environment <----------

if (  !empty( $_POST['live-environment'] )  ) {
    
    $store = $_POST['shop'];

    $liveenvironment = $_POST['live-environment'];  

    $sql = "UPDATE shopify_stores SET environment=? WHERE store_url=?";

    if($stmt = $con->prepare($sql)){

        $stmt->bind_param("ss", $liveenvironmentplaceholder, $store);
        /* Set the parameters values and execute the statement again to insert a row */
        // $store = "wipaylove.myshopify.com";
        $liveenvironmentplaceholder = $liveenvironment;
        $stmt->execute();

        echo "live updated successfully.";

    } else{
        echo "ERROR: Could not prepare query: $sql. " . $con->error;
    } 
}

// ----------> UPDATE only the live environment <----------






?>