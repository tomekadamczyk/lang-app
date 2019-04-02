<?php
include('views/words/add-word.php');
?>

<div class="cz-sidebar">
    <div class="cz-main-logo-container">
        <a href="index.php" class="logo">
        <div class="logo-transformed">
            <span class="logo-dot logo-dot--white"></span>
            <span class="logo-dot logo-dot--red"></span>
            <span class="logo-dot logo-dot--blue"></span>
        </div>
        </a>
    </div>
    <div class="cz-sidebar-link">
        <span class="cz-sidebar-link__label"><i class="fas fa-graduation-cap"></i>Ćwiczenia</span>
        <div class="cz-sidebar-link-dropdown">
            <div class="cz-sidebar-link">
                <a href="index.php?id=1" class="cz-sidebar-link__item"><i class="fas fa-layer-group"></i>Fiszki</a>
            </div>
            <div class="cz-sidebar-link">
                <a href="index.php?id=2" class="cz-sidebar-link__item"><i class="far fa-keyboard"></i>Wisielec</a>
            </div>
        </div>
    </div>
    <div class="cz-sidebar-link">
        <span class="cz-sidebar-link__label"><i class="fas fa-user-graduate"></i>Testy</span>
        <div class="cz-sidebar-link-dropdown">
            <div class="cz-sidebar-link">
                <a href="index.php?id=6" class="cz-sidebar-link__item"><i class="fas fa-layer-group"></i>Fiszki</a>
            </div>
        </div>
    </div>
    <div class="cz-sidebar-link">
        <a href="" class="cz-sidebar-link__item" data-toggle="modal" data-target="#addNewWord"><i class="fas fa-plus"></i>Dodaj</a>
    </div>
    <div class="cz-sidebar-link">
        <a href="index.php?id=3" class="cz-sidebar-link__item"><i class="fas fa-book"></i>Słownik</a>
    </div>
    <div class="cz-sidebar-link">
        <a href="index.php?id=4" class="cz-sidebar-link__item"><i class="far fa-comments"></i>Zwroty i wyrażenia</a>
    </div>
    <div class="cz-sidebar-link">
        <a href="index.php?id=5" class="cz-sidebar-link__item"><i class="fas fa-filter"></i>Kategorie</a>
    </div>
    <div class="cz-sidebar-link">
        <span class="cz-sidebar-link__label"><i class="far fa-star"></i>Ulubione</span>
        <div class="cz-sidebar-link-dropdown">
            <div class="cz-sidebar-link">
                <a href="index.php?id=7" class="cz-sidebar-link__item"><i class="fas fa-layer-group"></i>Podróże</a>
            </div>
            <div class="cz-sidebar-link">
                <a href="index.php?id=6" class="cz-sidebar-link__item"><i class="far fa-newspaper"></i>Książki, filmy, artykuły</a>
            </div>
        </div>
    </div>
</div>