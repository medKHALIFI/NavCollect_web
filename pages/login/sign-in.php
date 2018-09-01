<!DOCTYPE html>
<?php  session_start();
if(isset($_SESSION["username"]))
{
 header("location: ../index.php");
}

?>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>NAVCollect</title>
    
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

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">NAVCollect</a>
            <small>Collecte des données SIG, NAVCities</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST" action="../../php/login.php" role="form" class="sign_in">
                    <div class="msg">Entrez votre email et mot de passe pour se connecter</div>
                    <div id="error"></div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control username" id="username" name="username" placeholder="Email..." value="<?php if(isset($_COOKIE["username"])) { echo $_COOKIE["username"]; } ?>" required >
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control password" id="password" name="password" placeholder="Mot de passe..." value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-7 p-t-5">
                            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink" <?php if(isset($_COOKIE["username"])) { ?> checked <?php } ?>>
                            <label for="rememberme">Me souvenir</label>
                        </div>
                        <div class="col-xs-5">
                            <button class="btn btn-block bg-light-blue waves-effect" type="submit" id="submitButton">Se connecter</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6 align-right">
                            <a href="forgot-password.php">	Mot de passe oublié?</a>
                        </div>
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