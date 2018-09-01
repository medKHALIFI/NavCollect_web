<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>NAVCollect | Récupération du mot de passe</title>
    
    <!-- Favicon-->
    <link rel="icon" href="../../images/icon.png" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../../plugins/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../../plugins/node-waves/waves.min.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../../css/style.css" rel="stylesheet">
</head>

<body class="fp-page">
    <div class="fp-box">
        <div class="logo">
            <a href="javascript:void(0);">NAVCollect</a>
            <small>Collecte des données SIG, NAVCities</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="forgot_password" method="POST" action="../../php/reset_password.php">
                    <div class="msg">
                        Entrez votre adresse e-mail ou nom d'utilisateur que vous avez utilisé pour vous inscrire. Nous vous enverrons un email avec votre nom d'utilisateur et un lien pour réinitialiser votre mot de passe.
                    </div>
                    <div class="input-group">
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" id="username" class="username" placeholder="nom d'utilisateur" required autofocus>
                        </div>
                    </div>

                    <button class="btn btn-block btn-lg bg-light-blue waves-effect submitUsername" type="submit" name="submitUsername" id="submitUsername" >Réinitialiser mon mot de passe</button>

                    <div class="row m-t-20 m-b--5 align-center">
                        <a href="sign-in.php"> Se connecter !</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="../../plugins/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../../plugins/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../../plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="../../plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="../../js/login/sign-in.js"></script>
</body>

</html>