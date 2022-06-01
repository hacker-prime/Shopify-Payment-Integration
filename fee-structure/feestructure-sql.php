<?php

include("../includes/config.php");

if ( isset($_POST['fee']) ) {
    $fee = $_POST['fee'];
    $store = $_POST['shop'];

    // Database Operations
    // https://phpdelusions.net/mysqli_examples/prepared_select
    $sql = "SELECT * FROM shopify_stores WHERE store_url = ?";
    $stmt = $con->prepare($sql); 
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
        $sql = "INSERT INTO shopify_stores (store_url,FeeStructure) VALUES (?, ?)";
        
        if($stmt = $con->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ss", $store, $feeplaceholder);
            
            /* Set the parameters values and execute the statement */
            // $store_url = "wipaylove.myshopify.com";
            $feeplaceholder = $fee;
            $stmt->execute();    

            echo "Fee structure inserted successfully.";
        } else{
            echo "ERROR: Could not prepare query: $sql. " . $con->error;
        }
    } else {

        $stmt->close();
        // echo "There's already a row in the table/database with information";

        $sql = "UPDATE shopify_stores SET FeeStructure=? WHERE store_url=?";

        if($stmt = $con->prepare($sql)){
            $stmt= $con->prepare($sql);
            $stmt->bind_param("ss", $feeplaceholder, $store);
            /* Set the parameters values and execute
            the statement again to insert a row */
            // $store_url = "wipaylove.myshopify.com";
            $feeplaceholder = $fee;
            $stmt->execute();

            echo "Fee structure updated successfully.";
        } else{
            echo "ERROR: Could not prepare query: $sql. " . $con->error;
        }    

    }



}

?>