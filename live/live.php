<?php

    include("../css.php"); 

    include("../includes/config.php");

    include("../navigation.php");
    
    $shop = $_GET['shop'];



    // https://stackoverflow.com/questions/33806268/change-class-depending-on-php-variable-value
    // Database Operations
    // https://phpdelusions.net/mysqli_examples/prepared_select
    $sql = "SELECT * FROM shopify_stores WHERE store_url = ?";
    $stmt = $con->prepare($sql); 
    $stmt->bind_param("s", $shop);

    $stmt->execute();
    $result = $stmt->get_result(); // get the mysqli result
    $user = $result->fetch_assoc(); // fetch data   
    
    // https://stackoverflow.com/questions/59336951/message-trying-to-access-array-offset-on-value-of-type-null
    if( isset($user['environment']) ){

        if($user['environment']  == "live"){
            $active = "active";
        } else{
            $active = "";
        }

    }




?>

<div class="body-substitute">

    <div class="live__container">
        <div class="live__header">
            <h2>Live Payment</h2>
        </div>
        <form id="live-form" class="live__form">
            <div class="live__form-control">
                <label for="Live API Key">API Key</label>
                <input type="text" placeholder="aa0bd7506c72e93c62d20e3b25aa9048" id="liveapikey" />
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error message</small>
            </div>

            <div class="live__form-control">
                <label for="username">Account Number</label>
                <input type="text" placeholder="1234567890" id="live-accountnumber" />
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error message</small>
            </div>
            
                <!-- https://codepen.io/jacurtis/pen/EGOgqY -->
            <!-- https://www.youtube.com/watch?v=KJKcup31kw0  How to Build iOS Style Switch or Toggle Using Only HTML, CSS, & Vanilla JS -->
            <!-- https://stackoverflow.com/questions/33806268/change-class-depending-on-php-variable-value -->
            <div id="live_button_wrapper" class="ios-switch <?php echo $active ?>">
                    <div class="switch-body">
                    <div class="toggle"></div>
                    </div>
                    <input value="live" type="checkbox" name="example">
            </div> 

            <button>Submit</button>
        </form>
    </div>

</div>


<script>

// https://www.youtube.com/watch?v=BI3kNsTruWo - Add Remove Active Class Based On URL Using Javascript | No jQuery

var element = document.getElementById("myDIV");
element.classList.remove("active");

// https://stackoverflow.com/questions/31129159/how-to-replace-a-specific-href-link-using-javascript/31129226

var a = document.querySelector('a[href="https://shaynhacker.com/wipay-deyah/live/live.php?shop="]');
if (a) {
  console.log("We found the link");
  a.setAttribute('href', 'https://shaynhacker.com/wipay-deyah/live/live.php?shop=<?php echo $shop ?>')
} else{
    console.log("Error:Link not found");
}

var b = document.querySelector('a[href="https://shaynhacker.com/wipay-deyah/sandbox/sandbox2.php"]');
if (a) {
  b.setAttribute('href', 'https://shaynhacker.com/wipay-deyah/sandbox/sandbox2.php?shop=<?php echo $shop ?>')
} else{
    console.log("Error");
}

var c = document.querySelector('a[href="https://shaynhacker.com/wipay-deyah/fee-structure/feestructure.php?shop="]');
if (c) {
    console.log("feestructure found");
    c.setAttribute('href', 'https://shaynhacker.com/wipay-deyah/fee-structure/feestructure.php?shop=<?php echo $shop ?>')

} else{
    console.log("feestructure NOT found");
}


var d = document.querySelector('a[href="https://shaynhacker.com/wipay-deyah/currency/currency.php?shop="]');
if (d) {
    console.log("currency found");
    d.setAttribute('href', 'https://shaynhacker.com/wipay-deyah/currency/currency.php?shop=<?php echo $shop ?>')

} else{
    console.log("feestructure NOT found");
}



const currentLocation = location.href;
console.log("Current Location: " + currentLocation);
const menuItem = document.querySelectorAll('a');
const menuLength = menuItem.length;

for(let i = 0; i<menuLength; i++){
    if(menuItem[i].href === currentLocation){
        menuItem[i].className = "active";
        // alert("test");
    }
}


</script>


    <script src="../assets/js/live.js"></script>

