<?php

include("../includes/config.php");




// ----------> UPDATE Sandbox API Key, Account Number & Environment <----------
if (  !empty($_POST['sandbox-apikey'])  && !empty($_POST['sandbox-accountnumber']) && !empty( $_POST['sandbox-environment'] )    ) {
    $sandboxapikey = $_POST['sandbox-apikey'];
    $sandboxaccountnumber = $_POST['sandbox-accountnumber'];
    $sandboxenvironment = $_POST['sandbox-environment'];  
    
    // $store = $_GET['shop'];
    $store = $_POST['shop'];

    // echo $sandboxapikey;
    // echo $sandboxaccountnumber;
    // echo $sandboxenvironment;

    $sql = "UPDATE shopify_stores SET SandboxAPIkey=?, SandboxAccountNumber=?, environment=? WHERE store_url=?";

    if($stmt = $con->prepare($sql)){

        $stmt->bind_param("ssss", $sandboxapikey_placeholder,$sandboxaccountnumber_placeholder,$sandboxenvironmentplaceholder,$store);
        /* Set the parameters values and execute the statement again to insert a row */
        // $store = "wipaylove.myshopify.com";
        $sandboxapikey_placeholder = $sandboxapikey;
        $sandboxaccountnumber_placeholder = $sandboxaccountnumber;
        $sandboxenvironmentplaceholder = $sandboxenvironment;
        $stmt->execute();

        echo "Sandbox updated successfully.";
        return;

    } else{
        echo "ERROR: Could not prepare query: $sql. " . $con->error;
    } 
      

}
// ----------> UPDATE Sandbox API Key, Account Number & Environment <----------

// ----------> UPDATE only the API key and sandbox number <----------
if (  !empty($_POST['sandbox-apikey']) && !empty($_POST['sandbox-accountnumber'])     ) {

    $sandboxapikey = $_POST['sandbox-apikey'];
    $sandboxaccountnumber = $_POST['sandbox-accountnumber'];


    $sandboxenvironment = $_POST['sandbox-environment'];  

    $sql = "UPDATE shopify_stores SET SandboxAPIKey=?,SandboxAccountNumber=? WHERE store_url=?";

    if($stmt = $con->prepare($sql)){

        $stmt->bind_param("sss", $sandboxapikeyplaceholder,$sandboxaccountnumberplaceholder,$store);
        /* Set the parameters values and execute the statement again to insert a row */
        // $store = "wipaylove.myshopify.com";
        $sandboxapikeyplaceholder = $sandboxapikey;
        $sandboxaccountnumberplaceholder = $sandboxaccountnumber;
        $stmt->execute();

        echo "Sandbox updated successfully.";

    } else{
        echo "ERROR: Could not prepare query: $sql. " . $con->error;
    }  


}
// ----------> UPDATE only the API key and sandbox number <----------

// I need to be able to have it where all three get updated at the same time


// ----------> UPDATE only the sandbox environment <----------
if (  !empty( $_POST['sandbox-environment'] ) ) {

    $sandboxenvironment = $_POST['sandbox-environment'];  
    
    $store = $_POST['shop'];


    $sql = "UPDATE shopify_stores SET environment=? WHERE store_url=?";

    if($stmt = $con->prepare($sql)){

        $stmt->bind_param("ss", $sandboxenvironmentplaceholder, $store);
        /* Set the parameters values and execute the statement again to insert a row */
        // $store = "wipaylove.myshopify.com";
        $sandboxenvironmentplaceholder = $sandboxenvironment;
        $stmt->execute();
        echo "Sandbox environment selected";
        return;


    } else{
        echo "ERROR: Could not prepare query: $sql. " . $con->error;
    }    
}    
// ----------> UPDATE only the sandbox environment <----------


?>