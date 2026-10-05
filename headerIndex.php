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
                    <a href="#presentation" class="menu-link"> Présentation </a>
                </li>
                <li class="menu-item">
                    <a href="#parcours" class="menu-link"> Parcours </a>
                </li>
                <li class="menu-item">
                    <a href="#competences" class="menu-link"> Compétences </a>
                </li>
                <li class="menu-item">
                    <a href="#projets" class="menu-link"> Projets </a>
                </li>
                <!--
                <li class="menu-item">
                    <a href="#contact" class="menu-link"> Contact </a>
                </li>
-->
            </ul>
        </nav>
    </header>