function test() {
	alert("lol");
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

	if (user.pwd !== user.pwdConf) {
		displayFormError("pwdConfErr", "Passwords must match")
	}
	if (user.pwd.length < 6) {
		displayFormError("pwdErr", "Password must be at least 6 characters long")		
	}

	var xhttp = new XMLHttpRequest();
	xhttp.open("POST", "/api/user.php", true);
	xhttp.setRequestHeader("Content-type", "application/json");
	xhttp.send(JSON.stringify(user));
}