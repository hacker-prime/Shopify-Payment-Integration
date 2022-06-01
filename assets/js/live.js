const liveform = document.getElementById('live-form'); const liveapikey = document.getElementById('liveapikey');const liveaccountnumber = document.getElementById('live-accountnumber');
var live_envrionment_array = [];

const queryString_live_js = window.location.search;

const urlParams_live_js = new URLSearchParams(queryString_live_js);

const shop_live_js = urlParams_live_js.get('shop')

console.log("live.js: "+shop_live_js);


liveform.addEventListener('submit', e => {
	e.preventDefault();
	
	checkInputsLiveForm();
	submitLiveFormAjax();
});

function checkInputsLiveForm() {
    // LIVE - API KEY 

	// trim to remove the whitespaces
	const liveapikeyValue = liveapikey.value.trim();	
	if(liveapikeyValue === '') {
		setErrorFor(liveapikey, 'Live API key cannot be blank');
	} else {
		setSuccessFor(liveapikey);
	}
    // LIVE - API KEY 

	// LIVE - Account Number

    // trim to remove the whitespaces
	
	const accountnumberValue = liveaccountnumber.value.trim();	
	if(accountnumberValue === '') {
		setErrorFor(liveaccountnumber, 'Live Account Number cannot be blank');
	} else {
		setSuccessFor(liveaccountnumber);
	}

    // LIVE - Account Number	
}

function setErrorFor(input, message) {
	const formControl = input.parentElement;
	const small = formControl.querySelector('small');
	formControl.className = 'live__form-control error';
	small.innerText = message;
}

function setSuccessFor(input) {
	const formControl = input.parentElement;
	formControl.className = 'live__form-control success';
}


function submitLiveFormAjax(){
	// https://stackoverflow.com/questions/154059/how-can-i-check-for-an-empty-undefined-null-string-in-javascript
	if(liveapikey.value && liveaccountnumber.value ) {
		// ACTIVATE OR INITIATE AJAX REQUEST/CALL	
		//Inspired by settingsTest.js - Phoenix

		// https://stackoverflow.com/questions/64612746/how-would-i-do-this-ajax-jquery-in-vanilla-js	
		// https://stackoverflow.com/questions/17382579/passing-multiple-parameters-by-post-using-ajax-to-php
		// https://stackoverflow.com/questions/21884963/how-to-submit-this-form-using-ajax-without-jquery-but-pure-javascript/21885125
		var http = new XMLHttpRequest();
		var url = 'https://shaynhacker.com/wipay-deyah/live/live-sql.php';
		// var url = 'https://shaynhacker.com/wipay-credit-card-plugin/live/live-sql.php';
		var params = 'live-apikey='+liveapikey.value+ "&live-accountnumber=" + liveaccountnumber.value + "&live-environment=" + live_envrionment_array[0] + "&shop=" + shop_live_js;
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
	
		
	} else {
		alert("You cannot submit empty values!");
	}
}

var live_button = document.getElementById("live_button_wrapper");

live_button.onclick = function () {


		this.classList.add('active');
		this.querySelector('input[type=checkbox]').checked = true;

		live_envrionment_array.push("live");
		console.log(live_envrionment_array);



			alert("Sandbox envrionment is no longer the value since live has been selected.");

			// Now that the live payment option has been selected we should update the environment field in the table

			// ---------->>> UPDATE ENVRIONMENT FIELD WITH AJAX <<<---------- \\
			
			// https://blog.garstasio.com/you-dont-need-jquery/ajax/#posting
			http = new XMLHttpRequest();

			endpoint = "https://shaynhacker.com/wipay-deyah/live/live-sql.php";

			http.open('POST', endpoint, true);
			http.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			http.onload = function() {
				if (http.status === 200 && http.readyState == 4) {
					alert(http.responseText);
					console.log(http.responseText);
				}
				else if (http.status !== 200) {
					alert('Request failed.  Returned status of ' + http.status);
				}
			};

			http.send( 'live-environment=' + 'live' + "&shop=" + shop_live_js );
			
	

		// ---------->>> UPDATE ENVRIONMENT FIELD WITH AJAX <<<---------- \\





		// Push live value to array initialized/created at the top of the file

}



	
