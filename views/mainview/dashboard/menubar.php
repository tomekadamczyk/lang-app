<section class="cz-menubar">
    <div class="text-right">
        <div class="cz-menubar__user">
            <span><?php echo $_SESSION['userLoggedIn']; ?></span>
        </div>
            <div class="cz-menubar-options">
                <a href="#">
                    <div class="cz-menubar-dots">
                        <span class="cz-menubar-dots__dot"></span>
                        <span class="cz-menubar-dots__dot"></span>
                        <span class="cz-menubar-dots__dot"></span>
                    </div>
                </a>
                <div class="cz-menubar-listmenu">
                    <a class="cz-menubar-listmenu__item" href="#">Profil</a>
                    <a class="cz-menubar-listmenu__item" href="#">Wyloguj</a>
                </div>
            </div>
    </div>
</section>