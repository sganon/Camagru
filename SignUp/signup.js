function signUp() {
    var request = {
        user: {
            firstname: document.getElementById('firstname').value,
            lastname: document.getElementById('lastname').value,
            email: document.getElementById('email').value,
            pwd: document.getElementById('pwd').value,
            login: document.getElementById('login').value,
        },
        requestType: "creation"
    };

    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "/SignUp/controller.php", true);

    xhttp.setRequestHeader("Content-type", "application/json");
    xhttp.send(JSON.stringify(request));

    xhttp.onload = function () {
        if (xhttp.readyState === 4) {
            res = JSON.parse(xhttp.response);
            if (xhttp.status === 200) {
                document.cookie = "user_id=" + res.ID + ";";
                document.cookie = "token=" + res.token + ";";
                location.reload();
            } else {
                if (res[1] === 1062) {
                    displayFormError("emailErr", "Email is already in use");
                }
            }
        }
    }
}