<section class="cz-menubar">
    <a href="index.php" class="logo-mobile">
    <div class="logo-transformed">
        <span class="logo-dot logo-dot--white"></span>
        <span class="logo-dot logo-dot--red"></span>
        <span class="logo-dot logo-dot--blue"></span>
    </div>
    </a>
    <div class="text-right">
        <div class="cz-menubar__user">
            <span><?php echo $_SESSION['userLoggedIn']; ?></span>
        </div>
        
        <div id="getMobileMenu" class="cz-menubar-hamburger">
            <div class="cz-menubar-hamburger-toggle">
                <div class="cz-menubar-hamburger-toggle__line"></div>
                <div class="cz-menubar-hamburger-toggle__line"></div>
                <div class="cz-menubar-hamburger-toggle__line"></div>
            </div>
        </div>
        <div class="cz-menubar-options" style="display: none;">
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
    <div id="mobileMenu" class="cz-menubar-mainmenu">
        <div class="cz-menubar-mainmenu-link cz-menubar-mainmenu-link-dropdown">
            <a href="#" class="cz-menubar-mainmenu-link__item"><i class="fas fa-graduation-cap"></i>Ćwiczenia</a>
            <div class="cz-menubar-mainmenu-link-dropdownlist">
                <div class="cz-menubar-mainmenu-link-dropdownlist-link">
                    <a href="index.php?id=1" class="cz-menubar-mainmenu-link-dropdownlist__item"><i class="fas fa-layer-group"></i>Fiszki</a>
                </div>
                <div class="cz-menubar-mainmenu-link-dropdownlist-link">
                    <a href="index.php?id=2" class="cz-menubar-mainmenu-link-dropdownlist__item"><i class="far fa-keyboard"></i>Wisielec</a>
                </div>
            </div>
        </div>
        <div class="cz-menubar-mainmenu-link cz-menubar-mainmenu-link-dropdown">
            <a href="#" class="cz-menubar-mainmenu-link__item"><i class="fas fa-user-graduate"></i>Testy</a>
            <div class="cz-menubar-mainmenu-link-dropdownlist">
                <div class="cz-menubar-mainmenu-link-dropdownlist-link">
                    <a href="index.php?id=6" class="cz-menubar-mainmenu-link-dropdownlist__item"><i class="fas fa-layer-group"></i>Fiszki</a>
                </div>
            </div>
        </div>
        <div class="cz-menubar-mainmenu-link">
            <a href="" class="cz-menubar-mainmenu-link__item" data-toggle="modal" data-target="#addNewWord"><i class="fas fa-plus"></i>Dodaj</a>
        </div>
        <div class="cz-menubar-mainmenu-link">
            <a href="index.php?id=3" class="cz-menubar-mainmenu-link__item"><i class="fas fa-book"></i>Słownik</a>
        </div>
        <div class="cz-menubar-mainmenu-link">
            <a href="index.php?id=4" class="cz-menubar-mainmenu-link__item"><i class="far fa-comments"></i>Zwroty i wyrażenia</a>
        </div>
        <div class="cz-menubar-mainmenu-link">
            <a href="index.php?id=5" class="cz-menubar-mainmenu-link__item"><i class="fas fa-filter"></i>Kategorie</a>
        </div>
    </div>
</section>