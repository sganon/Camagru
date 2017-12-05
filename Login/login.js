function login () {
    var request = {
        user: {
            pwd: document.getElementById('pwd').value,
            login: document.getElementById('login').value,
        },
        requestType: "login"
    };

    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "/Login/controller.php", true);

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
                
            }
        }
    }
}