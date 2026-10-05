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
    <script src="./js/popup.js" defer></script>
    <link rel="icon" href="./images/logoLink.svg" type="image/x-icon">
    <title>Portfolio Ema Oudin | Recherche CDI/CDD Développement Full-Stack</title>
    <link rel="canonical" href="https://perso.univ-lemans.fr/~i2300681/portfolio/">
</head>

<body>
    <?php require("headerProjets.php"); ?>

    <main class="main-galerie">
        <?php
        $typeProjet = $_GET['type'] ?? '';
        $idProjet = $_GET['id'] ?? null;

        if (!$idProjet || !in_array($typeProjet, ['professionnel', 'personnel'])) {
            echo "<p>Type de projet ou ID non reconnu.</p>";
            exit;
        }

        $fichierJson = "projets.json";
        $jsonContenu = file_get_contents($fichierJson);
        $projets = json_decode($jsonContenu, true);

        if ($projets === null) {
            echo "<p>Erreur lors de la lecture du fichier JSON. Fichier vide<p/>";
            exit;
        }

        $projet = null;
        
        foreach ($projets as $unProjet) {
            $isSchool = $unProjet['projectForSchool'] ? 'professionnel' : 'personnel';
            if ($unProjet['id'] == $idProjet && $isSchool == $typeProjet) {
                $projet = [
                    'type' => $isSchool,
                    'id' => $unProjet['id'],
                    'titre' => $unProjet['titre'],
                    'imgPresentation' => $unProjet['images'][0] ?? '',
                    'detail' => $unProjet['detail'],
                    'detail2' => $unProjet['detail2'],
                    'keywords' => $unProjet['keywords'],
                    'images' => $unProjet['images'],
                    'etat' => $unProjet['etat'],
                    'platform' => $unProjet['platform']
                ];
                break;
            }
        }
        

        if (!$projet) {
            echo "<p>Projet non trouvé.</p>";
            exit;
        }

        ?>

        <section class="section-explication-galerie">
            <div>
                <h1 class="titre-projet-galerie"><?php echo htmlspecialchars($projet['titre']); ?></h1>
                <?php 
                if (!empty($projet['imgPresentation'])): ?>
                    <img 
                        class="img-presentation img-presentation-<?php echo htmlspecialchars($projet['platform']); ?>" 
                        src="<?php echo htmlspecialchars($projet['imgPresentation']); ?>" 
                        alt="">
                <?php endif; ?>
            </div>

            <h2> Explications </h2>
            <p class="text1-galerie">
                <?php echo htmlspecialchars($projet['detail']); ?>
            </p>

            <p class="text1-galerie">
                <?php echo htmlspecialchars($projet['detail2']); ?>
            </p>


            <p class="text2-galerie">Date : <?php echo htmlspecialchars($projet['etat']); ?></p>
        </section>

        <section class="section-competences-galerie">
            <h2> Mots clés du projet </h2>
            <p> 
                <?php foreach ($projet['keywords'] as $keyword) : ?>
                        <?php echo htmlspecialchars($keyword); ?>
                <?php endforeach; ?>
            </p>
        </section>

        <?php if (!empty($projet['images']) && is_array($projet['images'])): ?>
        <section class="section-images-galerie">
            <div class="carrousel-container">
                <button class="carrousel-btn left" title="Image précédente">
                    <i class="fas fa-chevron-left"></i>
                </button>

                <h2>Images d'illustration</h2>
                <ul class="carrousel-images">
                    <?php foreach ($projet['images'] as $image): ?>
                        <?php if (!empty($image)): ?>
                            <li class="carrousel-item">
                                <img src="<?php echo htmlspecialchars($image); ?>" alt="">
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>

                <button class="carrousel-btn right" title="Image suivante">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </section>
        <?php endif; ?>


        <button id="scrollTopBtn" title="Haut de page">
            <i class="fas fa-chevron-up"></i>
        </button>

    </main>

    <?php require("footer.php"); ?>

</body>

</html>