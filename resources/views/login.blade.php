<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <input type="text" name="username">
        <input type="text" name="password">
        <button type="submit">Login</button>
    </form>
</body>
<script>
var form = document.getElementsByTagName('form')[0];
form.addEventListener("submit", function (evt) {
    evt.preventDefault();
    let data = {
        username: form.elements.namedItem("username").value,
        password: form.elements.namedItem("password").value
    }
    var xhr = new XMLHttpRequest();
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
</script>
</html>