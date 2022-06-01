const sandboxform = document.getElementById('sandbox-form');
const sandboxapikey = document.getElementById('sandbox-apikey');
const sandboxaccountnumber = document.getElementById('sandboxaccountnumber');
var sandbox_button = document.getElementById("sandbox_button_wrapper");
var sandbox_envrionment = sandbox_button.querySelector('input[type=checkbox]').value
// console.log(sandbox_envrionment);

var sand_environment = [];

const queryString = window.location.search;

const urlParams = new URLSearchParams(queryString);

const shop = urlParams.get('shop')

console.log(shop);






sandboxform.addEventListener('submit', e => {
	e.preventDefault();
	
	checkInputsSandboxForm();
	submitFormAjax();

});


function checkInputsSandboxForm() {	
	// Sandbox - API KEY 

    // trim to remove the whitespaces
	const sandboxapikeyValue = sandboxapikey.value.trim();	
	if(sandboxapikeyValue === '') {
		setErrorFor(sandboxapikey, 'API Key cannot be blank');
	} else {
		setSuccessFor(sandboxapikey);
	}
    // Sandbox - API KEY 

	// Sandbox - Account Number

	// trim to remove the whitespaces

	const accountnumberValue = sandboxaccountnumber.value.trim();	
	if(accountnumberValue === '') {
		setErrorFor(sandboxaccountnumber, 'Account Number cannot be blank');
	} else {
		setSuccessFor(sandboxaccountnumber);
	}

	// Sandbox - Account Number
}

function setErrorFor(input, message) {
	const formControl = input.parentElement;
	const small = formControl.querySelector('small');
	formControl.className = 'sandbox__form-control error';
	small.innerText = message;
}

function setSuccessFor(input) {
	const formControl = input.parentElement;
	formControl.className = 'sandbox__form-control success';
}


function submitFormAjax(){
	if(sandboxapikey.value && sandboxaccountnumber.value) {
		// ACTIVATE OR INITIATE AJAX REQUEST/CALL	
		//Inspired by settingsTest.js - Phoenix

		// https://stackoverflow.com/questions/64612746/how-would-i-do-this-ajax-jquery-in-vanilla-js	
		// https://stackoverflow.com/questions/17382579/passing-multiple-parameters-by-post-using-ajax-to-php
		// https://stackoverflow.com/questions/21884963/how-to-submit-this-form-using-ajax-without-jquery-but-pure-javascript/21885125
		var http = new XMLHttpRequest();
// 		var url = 'http://localhost/wipay-credit-card-plugin/sandbox/sandbox-sql.php';
		var url = 'https://shaynhacker.com/wipay-deyah/sandbox/sandbox-sql.php';
		var params = 'sandbox-apikey='+sandboxapikey.value+ "&sandbox-accountnumber=" + sandboxaccountnumber.value + "&sandbox-environment=" + sand_environment[0] + "&shop=" + shop;
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


// https://www.youtube.com/watch?v=KJKcup31kw0 (How to Build iOS Style Switch or Toggle Using Only HTML, CSS, & Vanilla JS)
// https://stackoverflow.com/questions/47619637/how-to-remove-class-from-button-when-another-button-is-clicked-using-pure-javasc

// let switches = document.querySelectorAll('.ios-switch');

// for (var i = 0; i < switches.length; i++) {
//   switches[i].addEventListener('click', function(event) {
//     if (this.classList.contains('active')) {
//       this.classList.remove('active');
//       this.querySelector('input[type=checkbox]').checked = false
//     } else {
//       this.classList.add('active');
//       this.querySelector('input[type=checkbox]').checked = true
// 	  console.log(this.querySelector('input[type=checkbox]').value);
//     }
//   })
// }

// https://stackoverflow.com/questions/20941160/javascript-document-getelementbyid-with-onclick
// https://stackoverflow.com/questions/21477717/how-to-call-a-js-function-using-onclick-event
// https://stackoverflow.com/questions/12845680/how-can-i-run-a-javascript-function-with-any-click-on-the-page

var sandbox_button = document.getElementById("sandbox_button_wrapper");

sandbox_button.onclick = function () {
	if (this.classList.contains('active')) {
		this.classList.remove('active');
		this.querySelector('input[type=checkbox]').checked = false

		console.log(this.querySelector('input[type=checkbox]').value = "");

		var live_button_wrapper = document.getElementById("live_button_wrapper");
		live_button_wrapper.classList.add('active');

		// ---------->>> UPDATE ENVRIONMENT FIELD WITH AJAX <<<---------- \\

		// The envrionment can never be empty or null, only before anything has been inserted into the table.
		// However after the first INSERT into the table, the environment field/column must have a value,either
		// sandbox or live. If we deselect the sandbox button then it has to be changed to live and vice versa

		//https://stackoverflow.com/questions/4257545/how-can-i-check-in-javascript-if-a-dom-element-contains-a-class
		if(document.getElementById('live_button_wrapper').classList.contains("active")) {
			alert("Live envrionment is the new value since sandbox has been unselected.");
			
			// https://blog.garstasio.com/you-dont-need-jquery/ajax/#posting
			xhr = new XMLHttpRequest();

			endpoint = "https://shaynhacker.com/wipay-deyah/live/live-sql.php"

			xhr.open('POST', endpoint, true);
			xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			xhr.onload = function() {
				if (xhr.status === 200 && xhr.readyState == 4) {
					alert(xhr.responseText);
					console.log(xhr.responseText);
				}
				else if (xhr.status !== 200) {
					alert('Request failed.  Returned status of ' + xhr.status);
				}
			};
			xhr.send('live-environment=' + 'live');
			
	
		}

		// ---------->>> UPDATE ENVRIONMENT FIELD WITH AJAX <<<---------- \\

		

	} else {
	    
		this.classList.add('active');
		this.querySelector('input[type=checkbox]').checked = true

		console.log(this.querySelector('input[type=checkbox]').value = "sandbox");

		var test = this.querySelector('input[type=checkbox]').value = "sandbox";

		sand_environment.push(test);

		console.log(sand_environment);
		
		
	
		// ---------->>> UPDATE ENVRIONMENT FIELD WITH AJAX <<<---------- \\
		
		// https://blog.garstasio.com/you-dont-need-jquery/ajax/#posting
		http = new XMLHttpRequest();

		endpoint = "https://shaynhacker.com/wipay-deyah/sandbox/sandbox-sql.php";

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

	    http.send( 'sandbox-environment=' + 'sandbox'  + "&shop=" + shop);
    		


	// ---------->>> UPDATE ENVRIONMENT FIELD WITH AJAX <<<---------- \\








		var live_button_wrapper = document.getElementById("live_button_wrapper");
		// https://stackoverflow.com/questions/47619637/how-to-remove-class-from-button-when-another-button-is-clicked-using-pure-javasc
		live_button_wrapper.classList.remove("active");	
	}
}

var live_button_wrapper = document.getElementById("live_button_wrapper");

live_button_wrapper.onclick = function () {
	if (this.classList.contains('active')) {
		this.classList.remove('active');
		this.querySelector('input[type=checkbox]').checked = false

		console.log(this.querySelector('input[type=checkbox]').value = "");

		var sandbox_button = document.getElementById("sandbox_button_wrapper");
		sandbox_button.classList.add("active");

	} else {
		this.classList.add('active');
		this.querySelector('input[type=checkbox]').checked = true

		console.log(this.querySelector('input[type=checkbox]').value = "live");

		var sandbox_button = document.getElementById("sandbox_button_wrapper");
		// https://stackoverflow.com/questions/47619637/how-to-remove-class-from-button-when-another-button-is-clicked-using-pure-javasc
		sandbox_button.classList.remove("active");
	}
}

