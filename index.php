<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include("css.php") ?>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>


    <?php
        include("includes/config.php");
    
        if(isset($_GET["shop"])) { 
            $shop = $_GET["shop"];
            // echo $shop;
            $sql = "SELECT * FROM shopify_stores WHERE store_url=?";
            $stmt = $con->prepare($sql); 
            $stmt->bind_param("s", $shop);
            // https://stackoverflow.com/questions/9521228/how-to-tell-when-query-executed-successfully-in-php-pdo
            if($stmt->execute()){
                $result = $stmt->get_result(); // get the mysqli result
                // https://stackoverflow.com/questions/4286586/best-way-to-check-if-mysql-query-returned-any-results
                if(mysqli_num_rows($result)>0){
                $shop_configurations = $result->fetch_assoc(); // fetch data  
                // echo '<script>alert("Success")</script>';
                // echo '<div style="width:100px;height:100px;margin:0 auto;background-color:red;"></div>';
                
                // ==========> WIPAY CONFIGURATIONS <==========
                
  
                        include("sandbox/sandbox2.php")
                      
                    ;    
                
                // ==========> WIPAY CONFIGURATIONS <==========
                
                }else {
                    echo '<script>alert("Your shop has not been registered. Please enter your shop name.")</script>';
                    
                        echo '
            
                             <center>
            
                                <div class="text" data-sr-id="6">
                                        <strong> <a>WiPay</a> <span class="type"></span><span class="typed-cursor"></span></strong>
                                </div>    
                    
                             </center>
            
                        
                            <!-- https://stackoverflow.com/questions/22658141/css-center-form-in-page-horizontally-and-vertically/22658297 -->
                            <form action="" method="POST">
                                <input placeholder="Your shopify store name"  type="text" value="" name="shopify-store" />  
                                <div style="padding:5px;"></div>
                                <!-- <input placeholder="Your API key"  type="text" value="" name="shopify-api-key" />   -->
                                <!-- https://stackoverflow.com/questions/4221263/center-form-submit-buttons-html-css -->            
                                <div id="input_submit">
                                    <input name="submit" type="submit" value="Submit" name="go" />
                                </div>    
                            </form>
                            
                            ';
                            
                            if(isset($_POST["submit"])) { 

                                $shop =$_POST["shopify-store"];

                                $api_key = "a739571fa3664d348072b2fc0e80fad5";
                                
                                $scopes = "read_orders,write_products,write_content";
                                
                                $redirect_uri = "https://shaynhacker.com/wipay-deyah/generate_token.php";
                                
                                $install_url = "https://" . $shop . ".myshopify.com/admin/oauth/authorize?client_id=" . $api_key . "&scope=" . $scopes . "&redirect_uri=" . urlencode($redirect_uri);
                                
                                header("Location: " . $install_url);
                                
                                die();
                                
                                
                            }
                            
                          
                }
            } else{
                
                echo '<script>alert("Error")</script>';

            }
            
        }
    
    ?>
    
        

    
        <!-- https://www.youtube.com/watch?v=fMcpordI7Wk&t=26s (Auto Text Typing Animation Effect Using HTML CSS And JavaScript) -->
    <script src="assets/js/typed.min.js"></script>
    
    
        
    <script>

        var typed = new Typed('.type', {
    
        strings: ['Shopify','Wix','Jamaican', 'USD','Trinidadian'],
        typeSpeed:100,
        backSpeed:70,
        loop:true,
        }); 
        
        const currentLocation2 = location.href;
        const menuItem2 = document.querySelectorAll('a');
        const menuLength2 = menuItem2.length;
        
        for(let i = 0; i<menuLength2; i++){
            if(menuItem2[i].href === currentLocation2){
                menuItem2[i].className = "active";
                // alert("test");
            }
        }

    </script>




</body>
</html>

