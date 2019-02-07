<?php
include('base.php');
?>

<div class="col-md-8 col-lg-6 col-xl-4 mt-sm-5 mx-auto cz-useraccount-form">
    <div class="container">
        <div class="row">
            <div class="mx-auto cz-register-form" id="cz-register-form">
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
                    <button type="submit" name="register" class="btn btn-outline cz-button">Zarejestruj się</button>
                </form>
                <span id="loginToggle" class="font-weight-bold text-muted cz-form-label">Jeśli masz już konto, kliknij tutaj i się zaloguj</span>
            </div>
            <div class="mx-auto cz-login-form" id="cz-login-form">
                <form action="" id="login-form" method="POST">
                    <div class="form-group">
                        <label for="username">Nazwa użytkownika</label>
                        <input type="text" class="form-control cz-useraccount-input" id="username" name="username" aria-describedby="username" placeholder="Podaj nazwę użytkownika">
                    </div>
                    <div class="form-group">
                        <label for="password">Hasło</label><br>
                        <input type="password" class="form-control cz-useraccount-input" name="password" id="password" placeholder="Podaj hasło">
                    </div>
                    <button type="submit" name="login" class="btn btn-outline cz-button">Zaloguj się</button>
                </form>
                <span id="registerToggle" class="font-weight-bold text-muted cz-form-label">Nie masz jeszcze konta? Wypełnij formularz i zarejestruj się!</span>
                <a href="change-password.php" class="cz-password-reminder">Zapomniałem hasła</a>
            </div>
        </div>
    </div>
</div>

<script src="register.js"></script>

</body>
</html>