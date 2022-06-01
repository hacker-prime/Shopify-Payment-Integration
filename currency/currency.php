<?php

    $shop = $_GET['shop'];
    
    include("../css.php"); 
    include("../navigation.php"); 
    include("../includes/config.php");

?>



<!-- https://www.youtube.com/watch?v=UjPSPMAHFZ0 -->

<div class="body-substitute-currency-structure">


<div class="wrapper_currency">
    <div class="title"> Currency </div>
    <div class="box">
      <form>
      <input type="radio" value="USD" name="currency" id="option-USD">
      <input type="radio" value="TTD" name="currency" id="option-TTD">
      <input type="radio" value="JMD"name="currency" id="option-JMD">
      <label for="option-USD" class="option-USD">
        <div class="dot"></div>
        <div class="text">USD</div>
      </label>
      <label for="option-TTD" class="option-TTD">
        <div class="dot"></div>
        <div class="text">TTD</div>
      </label>
      <label for="option-JMD" class="option-JMD">
        <div class="dot"></div>
        <div class="text">JMD</div>
      </label>  
      <button class="currencyBtn" id="btn-currency">Submit</button>
      </form>  
    </div>
  </div>


</div>


<script>

// https://www.youtube.com/watch?v=BI3kNsTruWo - Add Remove Active Class Based On URL Using Javascript | No jQuery

// https://www.w3schools.com/howto/howto_js_remove_class.asp
var element = document.getElementById("myDIV");
element.classList.remove("active");


const currentLocation = location.href;
const menuItem = document.querySelectorAll('a');
const menuLength = menuItem.length;

for(let i = 0; i<menuLength; i++){
    if(menuItem[i].href === currentLocation){
        menuItem[i].className = "active";
        // alert("test");
    }
}

var d = document.querySelector('a[href="https://shaynhacker.com/wipay-deyah/sandbox/sandbox2.php"]');
if (d) {
    console.log("currency found");
    d.setAttribute('href', 'https://shaynhacker.com/wipay-deyah/sandbox/sandbox2.php?shop=<?php echo $shop ?>')

} else{
    console.log("feestructure NOT found");
}




</script>

<script src="../assets/js/currency.js"></script>

