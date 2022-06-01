const queryString = window.location.search;

const urlParams = new URLSearchParams(queryString);

const shop = urlParams.get('shop')

console.log(shop);


// https://www.javascripttutorial.net/javascript-dom/javascript-radio-button/
const btncurrency = document.querySelector('#btn-currency');
// handle button click
// https://newbedev.com/prevent-page-reload-and-redirect-on-form-submit-ajax-jquery
btncurrency.onclick = function (e) {
    e.preventDefault();
    const rbscurrency = document.querySelectorAll('input[name="currency"]');
    let selectedCurrencyValue;
    for (const rb of rbscurrency) {
        if (rb.checked) {
            selectedCurrencyValue = rb.value;
            // alert(selectedValue);

            // https://stackoverflow.com/questions/64612746/how-would-i-do-this-ajax-jquery-in-vanilla-js	
            // https://stackoverflow.com/questions/17382579/passing-multiple-parameters-by-post-using-ajax-to-php
            // https://stackoverflow.com/questions/21884963/how-to-submit-this-form-using-ajax-without-jquery-but-pure-javascript/21885125
            var http = new XMLHttpRequest();
            // var url = 'http://localhost/wipay-credit-card-plugin/currency/currency-sql.php';
            var url = 'https://shaynhacker.com/wipay-deyah/currency/currency-sql.php';
            var params = 'currency='+selectedCurrencyValue + "&shop=" + shop;
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
    if(document.querySelector('#option-USD:checked') == null && document.querySelector('#option-TTD:checked') == null && document.querySelector('#option-JMD:checked') == null){
      alert("You need to select an option!");
    }


  

};