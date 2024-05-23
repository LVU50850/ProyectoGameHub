<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    <h1>Hola </h1>
    <form method = "POST" action  = "/bienvenida/registrarUsuario">
        @csrf
        <label>Nombre de usuario: <input type = "text" name = "nombre" id = "nombre"> </label><br><br>
        <label>Contraseña: <input type = "password" name = "contrasenia" id = "contrasenia"></label><br><br>
        <label>Email: <input type = "text" name = "email" id = "email"><br><br>
        <input type = "submit">
</form>
</body>
</html>
