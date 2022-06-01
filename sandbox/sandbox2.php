
<!--<link rel="stylesheet" href="assets/css/sandbox.css">-->

<?php

    $shop = $_GET['shop'];
    
    include("../css.php"); 

    include("../includes/config.php");

    include("navigation.php");
    
    include("../navigation.php");
    

    // https://stackoverflow.com/questions/33806268/change-class-depending-on-php-variable-value
    // Database Operations
    // https://phpdelusions.net/mysqli_examples/prepared_select
    $sql = "SELECT * FROM shopify_stores WHERE store_url = ?";
    $stmt = $con->prepare($sql); 
    $stmt->bind_param("s", $shop);

    // $store = "wipaylove.myshopify.com";

    $stmt->execute();
    $result = $stmt->get_result(); // get the mysqli result
    $user = $result->fetch_assoc(); // fetch data   

    if($user['environment']  == "sandbox"){
        $active = "active";
    } else{
        $active = "";
    }


?>



<div class="body-substitute">

    <div class="sandbox__container">
        <div class="sandbox__header">
            <h2>Sandbox Payment</h2>
        </div>
        <form id="sandbox-form" class="sandbox__form">
            <div class="sandbox__form-control">
                <label for="apikey">API Key</label>
                <input type="text" value="123" id="sandbox-apikey" />
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error message</small>
            </div>

            <div class="sandbox__form-control">
                <label for="accountnumber">Account Number</label>
                <input type="text" value="1234567890" id="sandboxaccountnumber" />
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error message</small>
            </div>
            <!-- https://codepen.io/jacurtis/pen/EGOgqY -->
            <!-- https://www.youtube.com/watch?v=KJKcup31kw0  How to Build iOS Style Switch or Toggle Using Only HTML, CSS, & Vanilla JS -->
            <!-- https://stackoverflow.com/questions/33806268/change-class-depending-on-php-variable-value -->
            <div id="sandbox_button_wrapper"  class="ios-switch <?php echo $active ?>">
                    <div class="switch-body">
                    <div class="toggle"></div>
                    </div>
                    <input id="sandbox_button" type="checkbox" name="example">
            </div> 

            <button>Submit</button>            


        </form>
    </div>

    
 

</div>

<script>

// https://stackoverflow.com/questions/31129159/how-to-replace-a-specific-href-link-using-javascript/31129226

// var a = document.querySelector('a[href="https://shaynhacker.com/wipay-deyah/live/live.php?shop="]');
// if (a) {
//   console.log("We found the link");
//   a.setAttribute('href', 'https://shaynhacker.com/wipay-deyah/live/live.php?shop=<?php echo $shop ?>')
// } else{
//     console.log("Error:Link not found");
// }


// https://www.youtube.com/watch?v=BI3kNsTruWo - Add Remove Active Class Based On URL Using Javascript | No jQuery

const currentLocation = location.href;
const menuItem = document.querySelectorAll('a');
const menuLength = menuItem.length;

for(let i = 0; i<menuLength; i++){
    if(menuItem[i].href === currentLocation){
        menuItem[i].className = "active";
        // alert("test");
    }
}

var d = document.querySelector('a[href="https://shaynhacker.com/wipay-deyah/currency/currency.php?shop="]');
if (d) {
    console.log("currency found");
    d.setAttribute('href', 'https://shaynhacker.com/wipay-deyah/currency/currency.php?shop=<?php echo $shop ?>')

} else{
    console.log("feestructure NOT found");
}


</script>

<script src="assets/js/sandbox.js"></script>
<script src="../assets/js/sandbox.js"></script>


