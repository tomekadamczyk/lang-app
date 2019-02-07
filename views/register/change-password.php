<?php
include('base.php');
include('../../handlers/change-password-handler.php');
?>

<div class="col-md-8 col-lg-6 col-xl-4 mt-sm-5 mx-auto cz-useraccount-form">
    <div class="container">
        <div class="row">
            <div class="mx-auto cz-register-form" id="cz-register-form">
                <div class="cz-form-header-container">
                    <h3>Ustaw nowe hasło</h3>
                </div>
                <form action="" id="change-password-form" method="POST">
                    <div class="form-group">
                        <label for="username">Nazwa użytkownika</label>
                        <input type="text" class="form-control cz-useraccount-input" id="username" name="username" aria-describedby="username" placeholder="Podaj nazwę użytkownika">
                    </div>
                    <?php echo $account->getError(Constants::$usernameNotFound) ?>
                    <div class="form-group">
                        <label for="password">Nowe hasło</label><br>
                        <input type="password" class="form-control cz-useraccount-input" name="password" id="password" placeholder="Podaj nowe hasło">
                    </div>
                    <div class="form-group">
                        <label for="password">Powtórz hasło</label><br>
                        <input type="password" class="form-control cz-useraccount-input" name="password2" id="password2" placeholder="Powtórz hasło">
                    </div>
                        <?php echo $account->getError(Constants::$passwordsDoNotMatch) ?>
                        <?php echo $account->getError(Constants::$passrowdCharacters) ?>
                        <?php echo $account->getError(Constants::$passwordNotAlphaNumeric) ?>
                    <button type="submit" name="changePassword" class="btn btn-outline cz-button">Zmień hasło</button>
                </form>
            </div>
        </div>
    </div>
</div>