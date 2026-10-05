<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
header("Content-type: text/html; charset=utf-8");
?>

    <header class="page-header">
        <a href="index.html" class="logo-link" rel="home">
            <img src="./images/emaLogo.svg" alt="Logo d'un loup dans le texte Ema">
        </a>
        <nav class="main-menu">
            <button class="btn-menu">
                <i class="fa fa-bars" aria-hidden="true"></i>
                <span class="sr-only">MENU</span>
            </button>
            <ul class="menu-list">
                <li class="menu-item">
                    <a href="./index.html" class="menu-link"> Accueil </a>
                </li>
                <li class="menu-item">
                    <a href="./projets-personnels.html" class="menu-link"> Personnels </a>
                </li>
                <li class="menu-item">
                    <a href="./projets-professionnels.html" class="menu-link"> Professionnels </a>
                </li>
            </ul>
        </nav>
    </header>