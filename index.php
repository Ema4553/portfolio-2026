<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
header("Content-type: text/html; charset=utf-8");
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Étudiante en MMI, à la recherche d'un stage de 10 semaines (du 10 février au 18 avril 2025) à proximité de Laval(53000) ou d'Orléans(45000). Découvrez mon portfolio de projets. Prête à relever de nouveaux défis !" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"><!--POUR LE BOUTON BURGER-->
    <link href="https://fonts.googleapis.com/css2?family=Iceland&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css" type="text/css" />
    <script src="./js/menu.js"></script>
    <script src="./js/scrollTop.js"></script>
    <script src="./js/carrousel.js"></script>
    <link rel="icon" href="./images/logoLink.svg" type="image/x-icon">
    <title>Portfolio Ema Oudin | Recherche CDI/CDD Développement Full-Stack</title>
    <link rel="canonical" href="https://perso.univ-lemans.fr/~i2300681/portfolio/">
</head>

<body>
    <?php require("headerIndex.php"); ?>

    <main>
        <section id="presentation" class="section1">
            <h1> Ema Oudin <span>-</span> À la recherche d'un poste de développeuse junior</h1>
            <div class="presentation-contenu">
                <div class="presentation">
                    <h2>Qui suis-je ? Hello ! Moi c'est Ema</h2>
                    <p class="presentation-texte1">
                        Je suis une jeune développeuse de 21 ans tout juste diplômée d'un <strong>BUT MMI</strong>. 
                        Cette formation m'a permis de développer des compétences variées allant du <strong>développement web </strong>
                        à la <strong>communication digitale</strong> en passant par la <strong>création de contenus</strong>.
                    </p>
                    <p>
                        Curieuse, polyvalente et attentive aux détails, 
                        j'accorde beaucoup d'importance à la qualité du travail que je fournis tout 
                        en gardant cette pointe d'humour et de bonne humeur.
                    </p>
                    <p>
                        Pendant mon temps libre, j'aime découvrir de nouvelles cultures et <strong>explorer une multitude 
                        de centres d'intérêts</strong> (guitare, skateboard, dessin, peinture, photo) mais les samedis après-midis 
                        sont réservés à ma session <strong>gaming avec mes amis</strong>. 
                        La musique a une place importante dans mon quotidien : 
                        pour me concentrer mais aussi pour me vider la tête.
                    </p>
                    <a href="./src/CV_Ema_Oudin.pdf" download class="btn-cv">
                        Téléchargez mon CV !
                    </a>
                </div>
                <img src="./images/emaLogo.svg" alt="" />
            </div>
        </section>


        <section id="parcours" class="section2">
            <h2>Mon parcours</h2>

            <ul class="timeline">
                <li class="timeline-item" style="--timeline-icon:url(images/coding.svg)">
                    <h3 class="timeline-heading">B.U.T MMI (Mayenne)</h3>
                    <p class="timeline-date">IUT DE LAVAL : 2022 - 2026</p>
                    <p class="timeline-description">HTML, CSS, Javascript, PHP, Java, ... </p>
                </li>
                <li class="timeline-item" style="--timeline-icon:url(images/bac.svg)">
                    <h3 class="timeline-heading">Baccalauréat Général Scientifique : NSI, Mathématiques & Physique-Chimie (Loiret)</h3>
                    <p class="timeline-date">LYCÉE JACQUES MONOD : 2019 - 2022</p>
                    <p class="timeline-description">Python</p>
                </li>
            </ul>

            <p class="parcours-texte1">
                J'ai étudié pendant <strong>3 ans</strong> au lycée Jacques Monod,
                situé à Saint-Jean-de-Braye, dans le Loiret. C'est ici que j'ai appris
                à coder des programmes basiques en <strong>Python</strong> grâce à ma
                spécialité <strong><abbr title="Numérique et Sciences de l'Informatique">NSI</abbr></strong>.
                J'ai aussi choisi les spécialités <strong>Physique-Chimie</strong> et <strong>Mathématiques</strong>.
            </p>

           <!-- TODO : Ajouter les compétences apprises depuis l'an dernier --> 
            <p class="parcours-texte2">
                Je prépare mon <strong><abbr title="Bachelor Universitaire de Technologie">BUT</abbr></strong> <strong><abbr title="Métiers du Multimédia et de l'Internet">MMI</abbr></strong> à l'IUT de Laval, en Mayenne.
                J'apprends à coder avec divers langages de programmation notamment <strong>Java</strong>, <strong>PHP</strong>, <strong>Javascript</strong> et <strong>Dart</strong>.
                Je développe également mes compétences en HTML et en CSS.
                J'utilise des logiciels comme la suite Affinity, Da Vinci Resolve, VS Code, Android Studio et Jira.
            </p>

        </section>

        <!-- TODO : Ajouter les compétences et logiciels appris et utilisés -->
        <section id="competences" class="section3">
            <h2>Compétences et logiciels</h2>
            <ul class="comp">
                <?php
                $lecteur = new SplFileObject("competences.csv", "r");
                while ($lecteur->eof() == false) {
                    $ligne = $lecteur->fgets();
                    if ($ligne != "") {
                        $tab = explode(";", $ligne);
                        $idCompetence = $tab[0];
                        $nomCompetence = $tab[1];
                        $lienImg = $tab[2];
                        $alt = $tab[3];
                ?>
                        <li class="liste-comp">
                            <article class="logiciel">
                                <figure>
                                    <h3 class="titre-comp"><?php echo ($nomCompetence) ?></h3>
                                    <img src="<?php echo ($lienImg) ?>" alt="<?php echo ($alt) ?>" class="logo-<?php echo ($nomCompetence) ?>">
                                </figure>
                            </article>
                        </li>
                <?php
                    }
                }
                ?>
            </ul>
        </section>


        <section id="projets" class="section4">
            <div class="titre-projet">
                <h2> Projets </h2>
                <p> Explorez mes différents projets universitaires et personnels ! </p>             
            </div>

            <div class="projets-content">
                <a class="projets-galerie projet-univ" href="./projets-professionnels.html">
                    <h3> Projets professionnels </h3>
                    <figure class="projet-figure projets-univ-figure">
                        <img src="./images/logo-projet-univ.svg" alt="Feuilles de laurier entourant un chapeau de remise de diplôme">
                        <figcaption>Découvrez plusieurs de mes projets professionnels</figcaption>
                    </figure>
                </a>

                <a class="projets-galerie projet-perso" href="./projets-personnels.html">
                    <h3> Projets personnels </h3>
                    <figure class="projet-figure projets-perso-figure">
                        <img src="./images/logo-projet-perso.svg" alt="Feuilles de laurier entourant une ampoule, dans laquelle se trouve un stylo à plume">
                        <figcaption>Découvrez plusieurs de mes projets personnels</figcaption>
                    </figure>
                </a>
            </div>
        </section>

        <button id="scrollTopBtn" title="Haut de page">
            <i class="fas fa-chevron-up"></i>
        </button>

    </main>

    <?php require("footer.php"); ?>

</body>

</html>