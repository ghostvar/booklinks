<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
    <style>
    body {
        font-family: sans-serif;
        padding: 0;
        margin: 0;
    }
    .main-wrap {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-image: url('./img/bg.png');
    }
    .panel {
        position: absolute;
        top: 0;
        padding: 18% 0;
        right: 0;
        bottom: 0;
        width: 350px;
        background-color: rgba(255, 255, 255, 0.5);
    }
    form {
        padding: 10px 50px;
    }
    input {
        width: 100%;
        font-size: 14px;
        padding: 10px 12px;
        margin-bottom: 8px;
        box-sizing: border-box;
        border: none;
        outline: none;
    }
    p {
        text-align: right;
        padding: 0;
        margin: 0;
    }
    button {
        padding: 8px 20px;
        font-size: 14px;
        background-color: #0a7;
        color: #fff;
        border: 2px solid #0a7;
        outline: none;
    }
    </style>
</head>
<body>
    <div class="main-wrap">
        <div class="panel">
            <form method="post">
                <input type="text" name="username" required placeholder="Username ...">
                <input type="password" name="password" required placeholder="Password ...">
                <p>
                    <button type="submit">LOGIN</button>
                </p>
            </form>
        </div>
    </div>
</body>
<script>
if (window.XMLHttpRequest)
    var xhr = new XMLHttpRequest();
else
    var xhr = new ActiveXObject("Microsoft.XMLHTTP"); 

if (sessionStorage.getItem("token")) {
    xhr.open('GET', '/api/log', true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.setRequestHeader('Authorization', sessionStorage.getItem("token"));
    xhr.send();
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            window.location = '/'
        }
    };
} else {
    var form = document.getElementsByTagName('form')[0];
    form.addEventListener("submit", function (evt) {
        evt.preventDefault();
        let data = {
            username: form.elements.namedItem("username").value,
            password: form.elements.namedItem("password").value
        }
        xhr.open('POST', '/api/auth/login');
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.onload = function() {
            if (xhr.status === 200) {
                let response = JSON.parse(xhr.responseText)
                sessionStorage.setItem("token", response.token);
                window.location = '/'
            }
            else {
                alert('Request failed.  Returned status of ' + xhr.status);
            }
        };
        xhr.send(JSON.stringify(data));
    });
}
</script>
</html>