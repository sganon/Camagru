function test() {
	alert("lol");
}

function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

function displayFormError(elemId, text) {
	var elem = document.getElementById(elemId);
	elem.innerHTML = text;
}

function cleanErrMessage() {
	var errs = document.getElementsByClassName("err");
	for (var i = 0; i < errs.length; i++) {
		err = errs.item(i);
		err.innerHTML = "";
	}
}

function createUser() {
	cleanErrMessage();

	var user = {
		login: document.getElementById('suLogin').value,
		email: document.getElementById('suEmail').value,
		pwd: document.getElementById('suPwd').value,
		pwdConf: document.getElementById('suPwdConf').value
	};

	var e;
	if (user.pwd !== user.pwdConf) {
		e = true;
		displayFormError("pwdConfErr", "Passwords must match");
	}
	if (user.pwd.length < 6) {
		e = true;
		displayFormError("pwdErr", "Password must be at least 6 characters long");
	}
	if (!validateEmail(user.email)) {
		e = true;
		displayFormError("emailErr", "Please enter a correct email");
	}
	if (!/^[a-z0-9]+$/i.test(user.login)) {
		e = true;
		displayFormError("loginErr", "Login can only contain letters or numbers");
	}

	if (e !== true) {
		var xhttp = new XMLHttpRequest();
		xhttp.open("POST", "/api/user.php", true);

		xhttp.setRequestHeader("Content-type", "application/json");
		xhttp.send(JSON.stringify(user));

		xhttp.onload = function () {
			console.log(xhttp);
			if (xhttp.readyState === 4) {
				res = JSON.parse(xhttp.response);
				console.log(res);
				if (xhttp.status === 200) {
					document.cookie = "user_id=" + res.ID + ";";
					location.reload();
				} else {
					if (res[1] === 1062) {
						displayFormError("emailErr", "Email is already in use");
					}
				}	
			}
		}
	}
}