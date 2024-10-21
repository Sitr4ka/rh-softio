<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('css/base.css') ?>">
    <style>
        .container {
            display: flex;
            height: 100vh;
            width: 950px;
            align-items: center;
            justify-content: center;
        }

        .wrapper1 {
            display: flex;
            height: 500px;
            width: 750px;
            border: solid grey 1px;
            border-radius: 20px;
        }

        .sidePanel {
            background-image: url('<?= base_url('assets/bg-img.png') ?>');
            background-position: center;
            background-size: cover;
            width: 50%;
        }
        
        .login-form {
            border-top-right-radius: 20px;
            border-bottom-right-radius: 20px;
            background-color: whitesmoke;
        }


    </style>
    <title>Gestion-RH | Login</title>
</head>

<body>
    <div class="container">
        <div class="wrapper1">
            <div class="sidePanel text-center">
            </div>
            <form action="" class="login-form text-center w-50 flex-column align-items-center justify-content-center d-flex">
                <h5 class="">Admin</h5>
                <div class="form-group w-75 d-flex flex-column">
                    <input type="text" class="form-control mb-3" name="username" id="username" placeholder="Entrer le nom d'utilisateur" value="admin" >
                    <input type="password" class="form-control mb-3" name="username" id="username" placeholder="Entrer votre mot de passe" >
                    <button type="submit" class="btn btn-primary">Se connecter</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>