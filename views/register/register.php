<?php
if(empty($_GET['id'])) {
    $_GET['id'] === 1;
}

?>
<div class="cz-useraccount-form">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 mt-5 cz-register-form" id="cz-register-form">
                <form action="" id="register-form">
                    <div class="form-group">
                        <label for="username">Nazwa użytkownika</label>
                        <input type="text" class="form-control cz-useraccount-input" id="username" aria-describedby="username" placeholder="Podaj nazwę użytkownika">
                    </div>
                    <div class="alert alert-danger text-center">
                        <span><strong>Treść</strong> komunikatu błędu</span>
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label><br>
                        <input type="email" class="form-control cz-useraccount-input" name="email" aria-describedby="emailHelp" id="email" placeholder="Podaj adres e-mail">
                    </div>
                    <div class="form-group">
                        <label for="email2">Potwierdź e-mail</label><br>
                        <input type="email" class="form-control cz-useraccount-input" name="email2" id="email2" aria-describedby="emailHelp2" placeholder="Potwierdź e-mail">
                    </div>
                    <div class="form-group">
                        <label for="password">Hasło</label><br>
                        <input type="password" class="form-control cz-useraccount-input" name="password" id="password" placeholder="Ustaw swoje hasło">
                    </div>
                    <div class="form-group">
                        <label for="password2">Potwierdź hasło</label><br>
                        <input type="password" class="form-control cz-useraccount-input" name="password2" id="password2" placeholder="Potwierdź hasło">
                    </div>
                    <button type="submit" class="btn btn-info">Submit</button>
                </form>
                <span id="loginToggle">do logowania</span>
            </div>
            <div class="col-md-6 offset-md-3 mt-5 cz-login-form" id="cz-login-form">
                <form action="" id="login-form">
                    <div class="form-group">
                        <label for="username">Nazwa użytkownika</label>
                        <input type="text" class="form-control cz-useraccount-input" id="username" aria-describedby="username" placeholder="Podaj nazwę użytkownika">
                    </div>
                    <div class="form-group">
                        <label for="password">Hasło</label><br>
                        <input type="password" class="form-control cz-useraccount-input" name="password" id="password" placeholder="Ustaw swoje hasło">
                    </div>
                    <button type="submit" class="btn btn-info">Submit</button>
                </form>
                <span id="registerToggle">do rejestracji</span>
            </div>
        </div>
    </div>
</div>

<script src="views/register/register.js"></script>