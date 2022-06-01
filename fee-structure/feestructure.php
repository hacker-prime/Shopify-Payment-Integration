<?php

    $shop = $_GET['shop'];
    include("../css.php");
    include("../navigation.php");
    include("../includes/config.php");

?>



<!-- https://www.youtube.com/watch?v=UjPSPMAHFZ0 -->

<div class="body-substitute-fee-structure">


<div class="wrapper">
    <div class="title">Fee Structure</div>
    <div class="box">
      <form>
      <input type="radio" value="merchant_absorb" name="select" id="option-1">
      <input type="radio" value="split" name="select" id="option-2">
      <input type="radio" value="customer_pay"name="select" id="option-3">
      <label for="option-1" class="option-1">
        <div class="dot"></div>
        <div class="text">Merchant</div>
      </label>
      <label for="option-2" class="option-2">
        <div class="dot"></div>
        <div class="text">Split</div>
      </label>
      <label for="option-3" class="option-3">
        <div class="dot"></div>
        <div class="text">Customer</div>
      </label>  
      <button class="feestructureBtn" id="btn">Submit</button>
      </form>  
    </div>
  </div>


</div>


<script>

// https://www.youtube.com/watch?v=BI3kNsTruWo - Add Remove Active Class Based On URL Using Javascript | No jQuery

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

</script>

<script src="../assets/js/feestructure.js"></script>

