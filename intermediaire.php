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

<body class="body-intermediaire">
    <?php require("headerProjets.php"); ?>

    <main>

        <?php
        $type = $_GET['type'] ?? '';
        if ($type !== 'professionnel' && $type !== 'personnel') {
            echo "<p>Type de projet non reconnu.</p>";
            exit;
        }

        $fichierJson = "projets.json";
        $jsonContenu = file_get_contents($fichierJson);
        $projets = json_decode($jsonContenu, true);

        if ($projets === null) {
            echo "<p>Erreur lors de la lecture du fichier JSON.</p>";
            exit;
        }

        $projetsTrouves = [];

        foreach ($projets as $unProjet) {
            $isSchool = $unProjet['projectForSchool'] ? 'professionnel' : 'personnel';
            if ($isSchool == $type) {
                $projetsTrouves[] = [
                    'id' => $unProjet['id'],
                    'nom' => $unProjet['titre'],
                    'resume' => $unProjet['resume'],
                    'img1' => $unProjet['images'][0] ?? ''
                ];
            }
        }

        ?>
            <h1 class="titrePrincipalProjets">Projets <?php echo htmlspecialchars($type); ?>s</h1>

        <section class="container-projet-intermediaire">
            <?php foreach ($projetsTrouves as $projet): ?>
                <div id="<?php echo htmlspecialchars($projet['id']); ?>" class="projet">
                    <a href="./projet-<?php echo htmlspecialchars($type); ?>-<?php echo htmlspecialchars($projet['id']); ?>.html">
                        <h2><?php echo htmlspecialchars($projet['nom']); ?></h2>
                        <p><?php echo htmlspecialchars($projet['resume']); ?></p>

                        <?php if (!empty($projet['img1'])): ?>
                            <img src="<?php echo htmlspecialchars($projet['img1']); ?>" alt="">
                        <?php endif; ?>
                    </a>
                </div>
            <?php endforeach; ?>
        </section>


        <button id="scrollTopBtn" title="Haut de page">
            <i class="fas fa-chevron-up"></i>
        </button>

    </main>

    <?php require("footer.php"); ?>

</body>

</html>