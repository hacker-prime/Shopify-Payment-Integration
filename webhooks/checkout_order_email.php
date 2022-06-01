<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';

// require 'PHPMailer/src/Exception.php';
// require 'PHPMailer/src/PHPMailer.php';
// require 'PHPMailer/src/SMTP.php';

$message = "";


    $emailTo = $contact_email_variable;
    $code = uniqid(true);



    $mail = new PHPMailer(true);
    try {
        //Server settings
        // $mail->SMTPDebug = 2; 
        $mail->isSMTP();                                            //Send using SMTP
        // https://support.flockmail.com/hc/en-us/articles/900000063683-Configure-FlockMail-on-Gmail
        $mail->Host       = 'smtp.flockmail.com';                     //Set the SMTP server to send through
        $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'customerservice@thephynix.com';                     //SMTP username
        $mail->Password   = 'Thephoenixneverdies8';                               //SMTP password
        // $mail->SMTPSecure = 'ssl';         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged

        //Recipients
        // https://www.hostinger.com/tutorials/send-emails-using-php-mail
        // https://stackoverflow.com/questions/1022472/sender-address-rejected
        $mail->setFrom('customerservice@thephynix.com', 'Shopify-WiPay');
        $mail->addAddress($emailTo);               
        $mail->addReplyTo('no-reply@thephynix.com', 'No reply');

        //Content
        $url = "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/checkout_order_complete.php?id=$last_insert_id";
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Shopify-WiPay Checkout Order';
        $mail->Body    = "
                        <center> <h1 style='font-family: monospace;color:black;'> You requested an order from $vendor_variable  </h1> </center>
                        <div style='text-align:center;list-style-position:inside;color:black;'> 
                            <ul>
                                    <li> <strong>Product Name: </strong> $product_name_variable</li>
                                    <li><strong>Product Quantity: </strong> $fulfillable_quantity_variable </li>
                                    <li><strong>Product Price: </strong> $current_total_price_variable $currency_variable </li>
                            </ul>
                        </div>
                        <center style='color: black;'> Click <a href='$url'> this link </a> to complete purchase. </center>
                        <center>    <img style='max-width: 100%;
                        height: auto;'
                        src='https://image.freepik.com/free-vector/add-cart-concept-illustration_114360-1445.jpg'   
                        >
                        </center>                             
                         ";

        $mail->send();
        $message = 'Shopify Checkout Order with WiPay';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    // exit();





?>