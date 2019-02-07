<?php
error_reporting(E_ALL);

include('../../modules/config.php');
include('../../modules/class.constants.php');
include('../../modules/class.account.php');
$account = new Account($con);
include('../../handlers/login-handler.php');
include('../../handlers/register-handler.php');

?>

<!DOCTYPE html>

<html lang="pl">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<title>Language app</title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,500i,600,700,800&amp;subset=latin-ext" rel="stylesheet"> 
	<meta name="keywords" content="Language app" />
	<meta name="description" content="Language app" />
	<link rel="stylesheet" href="../../assets/css/style.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>

<body>

<div class="cz-useraccount-form">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 mt-5 cz-register-form" id="cz-register-form">
                <form action="" id="register-form" method="POST">
                    <div class="form-group">
                        <label for="username">Nazwa użytkownika</label>
                        <input type="text" class="form-control cz-useraccount-input" name="username" id="username" aria-describedby="username" placeholder="Podaj nazwę użytkownika" required>
                    </div>
                        <?php echo $account->getError(Constants::$usernameCharacters) ?>
                        <?php echo $account->getError(Constants::$usernameTaken) ?>
                    <div class="form-group">
                        <label for="username">Imię</label>
                        <input type="text" class="form-control cz-useraccount-input" name="firstname" id="firstname" aria-describedby="firstname" placeholder="Podaj swoje imię" required>
                    </div>
                        <?php echo $account->getError(Constants::$firstnameCharacter) ?>
                    <div class="form-group">
                        <label for="email">E-mail</label><br>
                        <input type="email" class="form-control cz-useraccount-input" name="email" aria-describedby="emailHelp" id="email" placeholder="Podaj adres e-mail" required>
                    </div>
                    <div class="form-group">
                        <label for="email2">Potwierdź e-mail</label><br>
                        <input type="email" class="form-control cz-useraccount-input" name="email2" id="email2" aria-describedby="emailHelp2" placeholder="Potwierdź e-mail" required>
                    </div>
                        <?php echo $account->getError(Constants::$emailIsInvalid) ?>
                        <?php echo $account->getError(Constants::$emailsDoNotMatch) ?>
                        <?php echo $account->getError(Constants::$emailTaken) ?>
                    <div class="form-group">
                        <label for="password">Hasło</label><br>
                        <input type="password" class="form-control cz-useraccount-input" name="password" id="password" placeholder="Ustaw swoje hasło" required>
                    </div>
                    <div class="form-group">
                        <label for="password2">Potwierdź hasło</label><br>
                        <input type="password" class="form-control cz-useraccount-input" name="password2" id="password2" placeholder="Potwierdź hasło" required>
                    </div>
                        <?php echo $account->getError(Constants::$passwordsDoNotMatch) ?>
                        <?php echo $account->getError(Constants::$passrowdCharacters) ?>
                        <?php echo $account->getError(Constants::$passwordNotAlphaNumeric) ?>
                    <button type="submit" name="register" class="btn btn-info">Zarejestruj się</button>
                </form>
                <span id="loginToggle" class="font-weight-bold text-white">do logowania</span>
            </div>
            <div class="col-md-6 offset-md-3 mt-5 cz-login-form" id="cz-login-form">
                <form action="" id="login-form" method="POST">
                    <div class="form-group">
                        <label for="username">Nazwa użytkownika</label>
                        <input type="text" class="form-control cz-useraccount-input" id="username" name="username" aria-describedby="username" placeholder="Podaj nazwę użytkownika">
                    </div>
                    <div class="form-group">
                        <label for="password">Hasło</label><br>
                        <input type="password" class="form-control cz-useraccount-input" name="password" id="password" placeholder="Ustaw swoje hasło">
                    </div>
                    <button type="submit" name="login" class="btn btn-info">Submit</button>
                </form>
                <span id="registerToggle">do rejestracji</span>
            </div>
        </div>
    </div>
</div>

<script src="register.js"></script>

</body>
</html>