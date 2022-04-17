<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <form method='POST' action='/rpgnip/cadastrar/register'>
        <div class='form-group'>
            <label for='name'>Name</label>
            <input type="text" name='name' class='form-control'>
</div>
<div class='form-group'>
            <label for='email'>Email</label>
            <input type="text" name='email' id="email" class='form-control'>
</div>
<div class='form-group'>
            <label for='password'>Password</label>
            <input type="password" name="password" id="password" class='form-control'>
            <input type="submit" value="cadastrar">
</div>
        </form>
    </div>
    <script src='JS/register.js'></script>
</body>
</html>