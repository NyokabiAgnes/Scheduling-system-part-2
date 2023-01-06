const form = document.getElementById('form');
		const username = document.getElementById('username');
		const email = document.getElementById('email');
		const pass = document.getElementById('pass');
		const errorElement = document.getElementById('error');

		form.addEventListener('submit',(e) =>{
			let messages = [];
			if (name.value === '' || name.value == null) {
				messages.push('Name is required');
			}

			if (email.value === '' || email.value == null) {
				messages.push('Email is required');
			}

			if (pass.value === '' || pass.value == null) {
				messages.push('Pass is required');
			}

			if (messages.length > 0) {
				e.preventDefault();
				errorElement.innerText = messages.join(', ');
			}
		});

		function ValidateEmail(input) {

		  var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

		  if (input.value.match(validRegex)) {

		    alert("Valid email address!");

		    document.form1.text1.focus();

		    return true;

		  } else {

		    alert("Invalid email address!");

		    document.form1.text1.focus();

		    return false;

		  }
		}