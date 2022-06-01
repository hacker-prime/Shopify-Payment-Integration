const queryString = window.location.search;

const urlParams = new URLSearchParams(queryString);

const shop = urlParams.get('shop')

console.log(shop);

var a = document.querySelector('a[href="https://shaynhacker.com/wipay-deyah/sandbox/sandbox2.php"]');
if (a) {
  // https://stackoverflow.com/questions/3304014/how-to-interpolate-variables-in-strings-in-javascript-without-concatenation
  a.setAttribute('href', `https://shaynhacker.com/wipay-deyah/sandbox/sandbox2.php?shop=${shop}`)
} else{
    console.log("Error");
}




// https://www.javascripttutorial.net/javascript-dom/javascript-radio-button/
const btn = document.querySelector('#btn');
// handle button click
// https://newbedev.com/prevent-page-reload-and-redirect-on-form-submit-ajax-jquery
btn.onclick = function (e) {
    e.preventDefault();
    const rbs = document.querySelectorAll('input[name="select"]');
    let selectedValue;
    for (const rb of rbs) {
        if (rb.checked) {
            selectedValue = rb.value;
            // alert(selectedValue);

            // https://stackoverflow.com/questions/64612746/how-would-i-do-this-ajax-jquery-in-vanilla-js	
            // https://stackoverflow.com/questions/17382579/passing-multiple-parameters-by-post-using-ajax-to-php
            // https://stackoverflow.com/questions/21884963/how-to-submit-this-form-using-ajax-without-jquery-but-pure-javascript/21885125
            var http = new XMLHttpRequest();
            // var url = 'http://localhost/wipay-credit-card-plugin/fee-structure/feestructure-sql.php';
            var url = 'https://shaynhacker.com/wipay-deyah/fee-structure/feestructure-sql.php';
            var params = 'fee='+selectedValue + "&shop=" + shop;
            http.open('POST', url, true);

            //Send the proper header information along with the request
            http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

            http.onreadystatechange = function() {//Call a function when the state changes.
              if(http.readyState == 4 && http.status == 200) {

                // http.responseText will be anything that the server return
                alert(http.responseText);
                console.log(http.responseText);
              } 
            }
            http.send(params);		
            // break;

        } 
      
    }

    // https://www.javascripttutorial.net/javascript-dom/javascript-checkbox/
    if(document.querySelector('#option-1:checked') == null && document.querySelector('#option-2:checked') == null && document.querySelector('#option-3:checked') == null){
      alert("You need to select an option!");
    }


  

};

