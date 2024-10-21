<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('css/base.css') ?>">
    <style>
        body {
            background-color: whitesmoke;
        }

        .container {
            display: flex;
            height: 100vh;
            width: 950px;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .wrapper-login {
            display: flex;
            height: 400px;
            width: 750px;
            border-radius: 20px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.295);
        }

        .sidePanel {
            background-image: url('<?= base_url('assets/bg-img.png') ?>');
            background-position: center;
            background-size: cover;
            width: 50%;
        }

        .form {
            border-top-right-radius: 20px;
            border-bottom-right-radius: 20px;
            background-color: white;
        }

        hr {
            margin-top: 0;
        }
    </style>
    <title>Gestion-RH | Login</title>
</head>

<body>
    <div class="container">
        <div class="">
            <div class="black-logo">
                <img src="https://softio-App.com/public/images/logo/logo_noire.png" alt="logo...">
            </div>
        </div>
        <div class="wrapper-login">
            <div class="sidePanel text-center">
            </div>
            <div class="form w-50  d-flex flex-column justify-content-center px-4">
                <div class="form-title">
                    <h2 class="align-self-start ms-5">Inscription</h2>
                    <hr>
                </div>
                <form action="<?= base_url('home/registration'); ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="mb-3">
                        <label for="username" class="form-label">Nom d'utilisateur</label>
                        <input type="text" class="form-control" id="username" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" id="password" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3 d-flex align-items-center">
                        <button type="submit" class="btn btn-primary w-50 m-2">Submit</button>
                        <a href="<?= base_url('auth/login') ?>">Se connecter</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</body>

</html>